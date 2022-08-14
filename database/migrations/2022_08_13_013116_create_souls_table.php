<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zone_id')->constrained()->cascadeOnDelete();
            $table->foreignId('church_id')->constrained()->cascadeOnDelete();
            $table->foreignId('group_id')->constrained()->cascadeOnDelete();
            $table->foreignId('pcf_id')->constrained()->cascadeOnDelete();
            $table->foreignId('cell_id')->constrained()->cascadeOnDelete();
            $table->foreignId('bscg_id')->constrained()->cascadeOnDelete();

            $table->foreignId('soul_winner_id')->constrained()->cascadeOnDelete();

            $table->string('soul_name');
            $table->string('contact');
            $table->string('email')->unique();
            $table->string('residence');
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
        Schema::dropIfExists('souls');
    }
};
