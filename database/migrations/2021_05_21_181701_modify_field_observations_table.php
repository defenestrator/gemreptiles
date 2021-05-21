<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyFieldObservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('field_observations', function(Blueprint $table) {
            $table->foreignId('species_id')->constrain()->index()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('field_observations', 'species_id')) {
            Schema::table('field_observations', function(Blueprint $table) {
                $table->dropColumn('species_id');
            });
        }
    }
}
