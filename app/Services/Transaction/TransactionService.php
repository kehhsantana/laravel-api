<?php

namespace App\Services\Transaction;

use App\Jobs\Notification;
use Illuminate\Support\Facades\DB;
use App\Services\Wallet\WalletService;
use App\Exceptions\TransactionErrorExceptions;
use App\Services\Notification\NotificationService;
use App\Repositories\Users\UsersRepositoryInterface;
use App\Services\Authorization\AuthorizationService;
use App\Repositories\Transactions\TransactionsRepositoryInterface;

class TransactionService
{
    protected $userRepository;
    protected $transactionRepository;
    protected $authorizationService;
    protected $notificationService;
    protected $walletService;

    public function __construct(UsersRepositoryInterface $userRepository,
                                TransactionsRepositoryInterface $transactionRepository,
                                AuthorizationService $authorizationService,
                                NotificationService $notificationService,
                                WalletService $walletService)
    {
        $this->transactionRepository = $transactionRepository;
        $this->userRepository        = $userRepository;
        $this->authorizationService  = $authorizationService;
        $this->notificationService   = $notificationService;
        $this->walletService         = $walletService;
    }

    public function execute($payer_user_id, $payee_user_id, $value)
    {
        $payee_user    = $this->userRepository->find($payee_user_id);
        $payer_user    = $this->userRepository->find($payer_user_id);  

        \DB::beginTransaction();
        try {

            $transaction = $this->transactionRepository->create($payer_user->id,$payee_user->id,$value);

            $authorized = $this->authorizationService->authorization();
            if($authorized === true) {

                $this->walletService->transfer($payer_user, $payee_user, $value);
                $transaction = $this->transactionRepository->authorized($transaction->id);

                dispatch(new Notification($transaction));
                \DB::commit();
                return $transaction;

            } 

            $transaction = $this->transactionRepository->unauthorized($transaction->id);
            \DB::commit();
            return $transaction;

        } catch (\Exception $e) {
            throw new TransactionErrorExceptions("Ocorreu um erro na transação");
        }
    }
}