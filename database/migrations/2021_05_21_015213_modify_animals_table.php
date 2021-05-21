<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if(! Schema::hasColumn('animals', 'cost')) {
            Schema::table('animals', function (Blueprint $table) {
                $table->unsignedInteger('cost')->after('acquisition_date')->nullable();
                $table->foreignId('field_observation_id')->after('original_breeder_id')->nullable();
            });
        }

        Schema::table('addresses', function (Blueprint $table) {
            $table->float('longitude', 11, 8)->after('postal_code')->nullable();
            $table->float('latitude', 10, 8)->after('postal_code')->nullable();
        });

        Schema::table('animals', function(Blueprint $table) {
            $table->dropColumn('collection_geopoint');
        });

        Schema::table('addresses', function(Blueprint $table) {
            $table->dropColumn('geopoint');
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
