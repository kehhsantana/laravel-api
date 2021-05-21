<?php

namespace App\Repositories\Notifications;

use DB;
use App\Models\Notifications\Notifications;
use App\Repositories\Notifications\NotificationsRepositoryInterface;

class NotificationsRepository implements NotificationsRepositoryInterface
{
        protected $model;
        
        public function __construct(Notifications $model)
        {
                $this->model = $model;
        }

        public function create($transaction_id)
        {
                // notification_status_id 1 means created
                $data = [
                        'transaction_id'          => $transaction_id,
                        'notification_status_id'  => 1
                ];
                
                $notifications = $this->model->create($data);
                return $notifications;
        }
}