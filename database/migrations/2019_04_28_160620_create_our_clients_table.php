<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOurClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_clients', function (Blueprint $table) {
            $table->bigIncrements('client_id');
            $table->string('client_comp_name')->nullable();
            $table->string('client_website')->nullable();
            $table->text('client_logo')->nullable();
            $table->longText('client_details')->nullable();
            $table->char('client_status')->nullable()->default('A')->comment('A=Active, D=Delete');
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
        Schema::dropIfExists('our_clients');
    }
}
