<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1494476956RolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->bigincrements('id');
                $table->string('title');
                
                $table->timestamps();
                
            });
        }
        
        if(! Schema::hasTable('lovs')) {
            Schema::create('lovs', function (Blueprint $table) {
                $table->bigincrements('id');
                $table->string('par_id')->nullable(false);
                $table->string('def_id')->nullable();
                $table->string('val_id')->nullable();
                $table->string('val_dsc')->nullable();
                
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
        Schema::dropIfExists('roles');
    }
}
