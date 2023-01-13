<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id')->on('application_categories')->onDelete('cascade');
            $table->string('subject');
            $table->text('question');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('id_client');
            $table->foreign('id_client')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_lawyer')->nullable();
            $table->foreign('id_lawyer')->references('id')->on('users')->onDelete('cascade');
            $table->string('status');
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
        Schema::dropIfExists('applications');
    }
};
