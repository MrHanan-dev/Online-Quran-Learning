<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learners', function (Blueprint $table) {
            $table->id();
            $table->string('learner_name');
            $table->string('email')->unique();
            $table->string('photo')->default('learnerAvatar.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('age')->nullable();
            $table->string('gender');
            $table->string('phone');
            $table->string('country');
            $table->json('toLearn');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learners');
    }
}
