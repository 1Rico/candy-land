<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->increments('id');
            $table->double('neck')->default(0.0);
            $table->double('chest_bust')->default(0.0);
            $table->double('high_bust')->default(0.0);
            $table->double('under_bust')->default(0.0);
            $table->double('waist')->default(0.0);
            $table->double('hips')->default(0.0);
            $table->double('shoulder_width')->default(0.0);
            $table->double('arm_hole')->default(0.0);
            $table->double('arm_or_sleeve_length')->default(0.0);
            $table->double('pant_or_skirt_length')->default(0.0);
            $table->double('inseam')->default(0.0);
            $table->double('wrist')->default(0.0);
            $table->integer('user_id');
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
        Schema::dropIfExists('measurements');
    }
}
