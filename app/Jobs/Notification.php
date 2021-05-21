<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Exceptions\NotificationErrorExceptions;
use App\Services\Notification\NotificationService;
use App\Repositories\Notifications\NotificationsRepositoryInterface;

class Notification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private   $notificationService;
    protected $notificationsRepository;
    protected $transaction;

    public $tries = 5;
    public $maxExceptions = 3;

    public function __construct($transaction)
    {
        $this->notificationService     = app(NotificationService::class);
        $this->notificationsRepository = app(NotificationsRepositoryInterface::class);
        $this->transaction             = $transaction;
    }

    public function handle()
    {
        $notification = $this->notificationService->notification();
        if($notification === true) {
            $this->notificationsRepository->create($this->transaction->id);

            return;
        } 

        throw new NotificationErrorExceptions("Serviço indisponível");
    }
}
