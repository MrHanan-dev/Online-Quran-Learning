<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemoClassInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo_class_invitations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('learner_id');
            $table->foreign('learner_id')->references('id')->on('learners')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->nullable()->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('tutor_id');
            $table->foreign('tutor_id')->references('id')->on('tutors')->onUpdate('cascade')->onDelete('cascade');

            $table->string('appovre')->default('0');

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
        Schema::dropIfExists('demo_class_invitations');
    }
}
