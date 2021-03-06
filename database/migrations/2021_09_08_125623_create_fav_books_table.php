<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fav_books', function (Blueprint $table) {
            $table->id();
            $table->string('identification', 200);
            $table->foreignId('id_user')->constrained('users');
            $table->integer('user_or_lib')->comment('0->user 1->lib')->default(0);
            $table->integer('api_or_db')->comment('0->api 1->db')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fav_books');
    }
}
