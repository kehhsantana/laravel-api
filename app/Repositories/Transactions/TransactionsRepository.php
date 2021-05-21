<?php

namespace App\Repositories\Transactions;

use DB;
use App\Models\Transactions\Transactions;
use App\Repositories\Transactions\TransactionsRepositoryInterface;

class TransactionsRepository implements TransactionsRepositoryInterface
{
        protected $model;
        
        public function __construct(Transactions $model)
        {
                $this->model = $model;
        }
        
        public function find($id)
        {
                return $this->model->find($id);
        }

        public function create($payer_user_id, $payee_user_id, $value)
        {
                //Transaction_status_id 1 means Pending
                $data = [
                        'payer_user_id'         => $payer_user_id,
                        'payee_user_id'         => $payee_user_id,
                        'value'                 => $value,
                        'transaction_status_id' => 1 
                ];

                $transaction = $this->model->create($data);
                return $transaction;
                
        }

        public function authorized($id)
        {
                $transaction = $this->find($id);
                //Transaction_status_id 1 means Authorized

                $transaction->transaction_status_id = 2;
                $transaction->save();
                return $transaction;
        }

        public function unauthorized($id)
        {
                $transaction = $this->find($id);
                //Transaction_status_id 1 means Unauthorized

                $transaction->transaction_status_id = 3; 
                $transaction->save();
                return $transaction;
        }        
}