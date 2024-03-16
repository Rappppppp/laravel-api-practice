<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function genres(){
        return [
            "pop",
            "rock",
            "hip hop/rap",
            "jazz",
            "classical",
            "electronic",
            "r&b/soul",
            "country",
            "blues",
            "reggae",
            "metal",
            "punk",
            "folk",
            "funk",
            "indie",
            "alternative",
            "dance",
            "gospel",
            "latin",
            "world",
            "ambient",
            "techno",
            "house",
            "disco",
            "dubstep"
        ];

    }

    public function up(): void
    {
        Schema::create('cds', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('artist');
            $table->enum('genre', $this->genres());
            $table->integer('release_year');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cds');
    }
};
