<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_uses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('address')->nullable();
            $table->text('phone_no')->nullable();
            $table->text('email')->nullable();
            $table->text('maps')->nullable();
            $table->text('image_path')->nullable();
            $table->text('details')->nullable();
            $table->char('status')->nullable()->default('A')->comment('A=Active, I=Inactive, D=Delete');
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
        Schema::dropIfExists('contact_uses');
    }
}
