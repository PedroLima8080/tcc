<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePassword extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_password', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('email_user', 100);
            $table->integer('user_or_lib')->comment('0->user, 1->lib');
            $table->integer('used')->comment('0->nao, 1->sim')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('change_password');
    }
}
