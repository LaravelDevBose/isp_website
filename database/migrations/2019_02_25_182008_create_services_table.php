<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('service_id');
            $table->string('service_title');
            $table->string('service_heading')->nullable();
            $table->text('service_details')->nullable();
            $table->text('service_logo')->nullable();
            $table->char('service_status')->default('A')->nullable()->comment('A=Active, I=Inactive, D=delete');
            $table->created_updated_by();
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
        Schema::dropIfExists('services');
    }
}
