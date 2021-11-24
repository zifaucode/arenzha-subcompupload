<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcompanies', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('company_name');
                $table->string('address');
                $table->string('phone_number');
                $table->string('fax_number');
                $table->string('email');
                $table->string('npwp');
                $table->string('akte_pendirian_terakhir');
                $table->string('nib');
                $table->string('jenis_usaha');
                $table->string('no_klu');
                $table->string('directur');
                $table->string('npwp_directur');
                
                
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
        Schema::dropIfExists('subcompanies');
    }
}
