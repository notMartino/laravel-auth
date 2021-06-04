<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table){
            $table -> foreign('brand_id', 'brand_car')
                    -> references('id')
                    -> on ('brands');
        });

        Schema::table('car_pilot', function (Blueprint $table){
            $table -> foreign('car_id', 'cars_pilots')
                    -> references('id')
                    -> on ('cars');
        });
        Schema::table('car_pilot', function (Blueprint $table){
            $table -> foreign('pilot_id', 'pilot_car')
                    -> references('id')
                    -> on ('pilots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('cars', function (Blueprint $table){
        //     $table -> dropForeign('brand_car');
        // });

        // Schema::table('car_pilot', function (Blueprint $table){
        //     $table -> dropForeign('cars_pilots');
        // });
        // Schema::table('car_pilot', function (Blueprint $table){
        //     $table -> dropForeign('pilot_car');
        // });
    }
}
