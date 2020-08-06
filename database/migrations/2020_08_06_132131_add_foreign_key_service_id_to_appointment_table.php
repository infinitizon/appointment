<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyServiceIdToAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
            if(! Schema::hasTable('appointments')) {
                Schema::table('appointments', function(Blueprint $table)
                {
                    $table->foreign('service_id', '35109_5913ebf652b9b')->references('id')->on('services')->onDelete('cascade');
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
        Schema::table('appointments', function(Blueprint $table)
        {
            $table->dropForeign('service_id'); //
        });
    }
}
