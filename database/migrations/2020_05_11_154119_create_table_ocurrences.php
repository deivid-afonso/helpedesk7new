<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOcurrences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occurrences', function (Blueprint $table) {
            $table->id();

            //chaves estrangeiras deram problema
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('occurrence_type_id');
			$table->unsignedBigInteger('device_id');
			$table->unsignedBigInteger('place_id');

			$table->string('solution', 200)->nullable();
			$table->string('obs', 200)->nullable();
			$table->string('status', 50)->nullable();
			$table->timestamps();
            
            
			//stranger keys agora vai
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('occurrence_type_id')->references('id')->on('occurrences_type');
            $table->foreign('device_id')->references('id')->on('devices');
            
            $table->foreign('place_id')->references('id')->on('places');



           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocurrences');
    }
}
