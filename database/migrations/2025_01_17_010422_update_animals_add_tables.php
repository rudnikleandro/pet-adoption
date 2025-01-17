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
        Schema::table('animals', function (Blueprint $table) {
            $table->float('weight')->nullable()->after('size');
        });

        Schema::create('veterinary_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id')->constained('animals')->onDelete('cascade');
            $table->boolean('rabies_vaccine')->default(false);
            $table->boolean('polyvalent_vaccine')->default(false);
            $table->boolean('giardia_vaccine')->default(false);
            $table->boolean('flu_vaccine')->default(false);
            $table->boolean('antiparasitic')->default(false);
            $table->boolean('neutered')->default(false);
            $table->timestamps();
        });

        Schema::create('temperaments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id')->constrained('animals')->onDelete('cascade');
            $table->boolean('calm')->default(false);
            $table->boolean('playful')->default(false);
            $table->boolean('protective')->default(false);
            $table->boolean('agressive')->default(false);
            $table->timestamps();
        });

        Schema::create('energy_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id')->constrained('animals')->onDelete('cascade');
            $table->boolean('high_energy')->default(false);
            $table->boolean('moderate_energy')->default(false);
            $table->boolean('low_energy')->default(false);
            $table->timestamps();
        });

        Schema::create('animal_relationships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id')->constrained('animals')->onDelete('cascade');
            $table->boolean('good_with_others')->default(false);
            $table->boolean('dominant_with_others')->default(false);
            $table->boolean('better_alone')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->dropColumn('weight');
        });
        Schema::dropIfExists('veterinary_infos');
        Schema::dropIfExists('temperaments');
        Schema::dropIfExists('energy_levels');
        Schema::dropIfExists('animal_relationships');
    }
};
