<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyAppellationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appellations', function (Blueprint $table) {
            $table->longText('description')->nullable()->after('id');
            $table->string('slug')->unique()->index()->after('id');
            $table->string('name')->unique()->after('id');
            $table->efficientUuid('uuid')->unique()->index()->after('id');
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
