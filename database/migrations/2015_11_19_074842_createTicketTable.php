<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ticket_id');
            $table->string('identifier');
            $table->time('start_time');
            $table->string('delay');
            $table->smallInteger('is_check');
            $table->string('arrive_due');       // 到场超时
            $table->string('content');
            $table->string('org');
            $table->string('install_addr');
            $table->string('model');            
            $table->string('brand');

            // repair
            $table->time('reqair_create');
            $table->string('enginner');
            $table->time('responsed_at');            
            $table->time('arrived_at');
            $table->smallInteger('response_status');
            $table->string('maintain_tel');
            $table->string('eta');
            $table->string('report_mobile');

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
        //
    }
}
