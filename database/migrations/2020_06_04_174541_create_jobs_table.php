<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->unsignedBigInteger('company_id');
            $table->enum('type', ['full time', 'part time', 'full time/part time'])->default('full time');
            $table->boolean('is_remote')->default(false);
            $table->unsignedBigInteger('location_id');
            $table->string('contact_person')->nullable();
            $table->string('contact_person_email')->nullable();
            $table->string('apply_url')->nullable();
            $table->string('salary')->nullable();
            $table->text('description');
            $table->dateTime('published_at');
            $table->timestamps();


            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
