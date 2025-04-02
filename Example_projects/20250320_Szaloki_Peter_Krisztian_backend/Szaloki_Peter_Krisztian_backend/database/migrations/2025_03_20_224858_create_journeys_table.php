<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('journeys', function (Blueprint $table) {
            $table->id();
            $table->foreignId("vehicle");  //->constrained("vehicles", "id")->onDelete('cascade'); // ez mindenképpen cascade delete-et fog végrehajtani nem paraméterezhető
            $table->string("country");
            $table->string("description");
            $table->date("departure");
            $table->integer("capacity")->default(1);
            $table->string("pictureUrl")->nullable();

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journeys');
    }
};
