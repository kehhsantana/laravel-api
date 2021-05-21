<?php

namespace App\Repositories\Users;

use DB;
use App\Models\Users\Users;
use App\Repositories\Users\UsersRepositoryInterface;

class UsersRepository implements UsersRepositoryInterface
{
        protected $model;
        
        public function __construct(Users $model)
        {
            $this->model = $model;
        }
        
        public function find($id)
        {
            $user = $this->model
                ->find($id);

            return $user;
        }

        public function updateWallet($id, $value) 
        {
            return $this->model
                ->where('id', $id)
                ->update([
                    'wallet' => $value
                ]);
        }
        
}