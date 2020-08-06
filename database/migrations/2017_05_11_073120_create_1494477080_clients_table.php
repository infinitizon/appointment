<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1494477080ClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('clients')) {
            Schema::create('clients', function (Blueprint $table) {
                $table->bigincrements('id');
                $table->string('card_number')->unique()->nullable(false);
                $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                $table->string('phone')->nullable();
                $table->string('email')->nullable();
                $table->date('dob')->nullable();
                $table->biginteger('sex')->unsigned()->nullable();
                $table->foreign('sex')->references('id')->on('lovs')->onDelete('cascade');
                $table->string('addr_line_1')->nullable();
                $table->string('addr_line_2')->nullable();
                $table->string('addr_city')->nullable();
                $table->biginteger('addr_state')->unsigned()->nullable();
                $table->foreign('addr_state')->references('id')->on('lovs')->onDelete('cascade');
                $table->biginteger('addr_country')->unsigned()->nullable();
                $table->foreign('addr_country')->references('id')->on('lovs')->onDelete('cascade');
                $table->string('place_of_origin')->nullable();
                $table->string('nok_name')->nullable();
                $table->string('nok_address')->nullable();
                $table->biginteger('nok_relationship')->unsigned()->nullable();
                $table->foreign('nok_relationship')->references('id')->on('lovs')->onDelete('cascade');
                
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
        Schema::dropIfExists('clients');
    }
}
