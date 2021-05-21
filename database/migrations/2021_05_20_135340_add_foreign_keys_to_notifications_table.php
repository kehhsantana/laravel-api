<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->foreign('notification_status_id', 'notification_status')->references('id')->on('notification_status')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign('transaction_id', 'transactions')->references('id')->on('transactions')->onUpdate('CASCADE')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign('notification_status');
            $table->dropForeign('transactions');
        });
    }
}
