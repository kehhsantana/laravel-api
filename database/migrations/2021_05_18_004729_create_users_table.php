<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('first_name', 50);
            $table->string('last_name', 80);
            $table->string('document', 14)->unique('document_UNIQUE');
            $table->string('email', 50)->unique('email_UNIQUE');
            $table->string('password', 100);
            $table->timestamp('creation_date')->useCurrent();
            $table->integer('user_type_id')->default(1)->index('user_type_idx');
            $table->decimal('wallet', 10, 0)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
