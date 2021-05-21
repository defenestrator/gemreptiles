<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyAnimals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('animals', 'cost')) {
            Schema::table('animals', function(Blueprint $table) {
                $table->renameColumn('cost', 'acquisition_cost');
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
        if (Schema::hasColumn('animals', 'acquisition_cost')) {
            Schema::table('animals', function(Blueprint $table) {
                $table->renameColumn('acquisition_cost', 'cost');
            });
        }
    }
}
