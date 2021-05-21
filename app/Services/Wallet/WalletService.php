<?php

namespace App\Services\Wallet;

use App\Repositories\Users\UsersRepositoryInterface;
use App\Exceptions\TransactionErrorExceptions;
use App\Traits\CalcValue;

class WalletService
{
    private $userRepository;

    use CalcValue;

    public function __construct(UsersRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function transfer($payer_user, $payee_user, $value) 
    {
        \DB::beginTransaction();
        try {

            $wallet_payer_user =  $this->subCalc($payer_user->wallet, $value);
            $this->userRepository->updateWallet($payer_user->id, $wallet_payer_user);

            $wallet_payee_user =  $this->addCalc($payee_user->wallet, $value);
            $this->userRepository->updateWallet($payee_user->id, $wallet_payee_user);

            \DB::commit();
        }
        catch (\Exception $e) {
            throw new TransactionErrorExceptions("Ocorreu um erro na transferência");
        }
    }
}