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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->string("url");
            $table->string("name");
            $table->foreignId("seasonId")->constrained("seasons", "id");
            $table->integer("number");
            $table->string("airstamp");
            $table->integer("runtime");
            $table->string("image-medium")->default("https://bgs.jedlik.eu/no_image.png");
            $table->string("image-original")->default("https://bgs.jedlik.eu/no_image.png");
            $table->string("summary");


            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
