<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1494477814AppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('appointments')) {
            Schema::create('appointments', function (Blueprint $table) {
                $table->bigincrements('id');
                $table->biginteger('client_id')->unsigned()->nullable();
                $table->foreign('client_id', '35989_5913ebf64ed0b')->references('id')->on('clients')->onDelete('cascade');
                $table->biginteger('employee_id')->unsigned()->nullable();
                $table->foreign('employee_id', '35989_5913ebf652b9b')->references('id')->on('employees')->onDelete('cascade');
                $table->biginteger('service_id')->unsigned()->nullable();
                $table->datetime('start_time')->nullable();
                $table->datetime('finish_time')->nullable();
                $table->text('comments')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
