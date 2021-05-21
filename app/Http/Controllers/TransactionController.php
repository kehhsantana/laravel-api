<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Services\Transaction\TransactionService;
use App\Exceptions\TransactionErrorExceptions;

class TransactionController extends Controller
{
    private $transactionService;

    const STATUS_NOT_AUTHORIZED = 3;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function transaction(TransactionRequest $request)
    {
        $payer_user_id = $request->get('payer_user_id');
        $payee_user_id = $request->get('payee_user_id');
        $value         = $request->get('value');

        try {

            $transaction = $this->transactionService->execute($payer_user_id, $payee_user_id, $value);

            if($transaction->transaction_status_id == self::STATUS_NOT_AUTHORIZED) {
                return response()->json([ 
                    'message' => 'Transação não autorizada',
                    'transaction' => $transaction 
                ], 401);
            } 
            
            return response()->json([
                'message' => 'Transação concluída',
                'transaction' => $transaction
            ], 201);

        } catch (\Exception $e){
            throw new TransactionErrorExceptions("Ocorreu um erro durante a transação!");
        }
    }
}