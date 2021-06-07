<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVetVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veterinarians', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_name');
            $table->string('clinic_name')->nullable();
            $table->timestamps();
        });

        Schema::create('vet_visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id')->constrain()->index();
            $table->foreignId('veterinarian_id')->constrain()->index();
            $table->unsignedMediumInteger('cost');
            $table->date('date_of_visit');
            $table->string('reason_for_visit');
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
        Schema::dropIfExists('veterinarians');
        Schema::dropIfExists('vet_visits');
    }
}
