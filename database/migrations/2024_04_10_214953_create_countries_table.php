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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();

            $table->string('name')->comment('Country name');
            $table->tinyText('code')->unique()->nullable()->comment('Country code');
            $table->string('call_code')->nullable()->comment('Country calling code');
            $table->string('currency')->nullable()->comment('Country currency');

            $table->decimal('north', 10, 8)->nullable()->comment('Northernmost point');
            $table->decimal('south', 10, 8)->nullable()->comment('Southernmost point');
            $table->decimal('east', 11, 8)->nullable()->comment('Easternmost point');
            $table->decimal('west', 11, 8)->nullable()->comment('Westernmost point');

            $table->string('capital')->nullable()->comment('Country capital');

            $table->timestamps();


            /* indexes */
            $table->index('name');
            $table->index('code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
