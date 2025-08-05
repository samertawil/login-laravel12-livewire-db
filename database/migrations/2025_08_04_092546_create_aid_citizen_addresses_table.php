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
        Schema::create('aid_citizen_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('idc');
            $table->foreign('idc')->references('idc')->on('aid_citizen_registrations');
            $table->foreignId('region_id')->constrained('regions');
            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('neighbourhood_id')->constrained('neighbourhoods');
            $table->foreignId('e_home_type')->constrained('statuses');

            $table->foreignId('e_region_id')->nullable()->constrained('regions'); // مكان الاخلاء
            $table->foreignId('e_city_id')->nullable()->constrained('cities');
            $table->foreignId('e_neighbourhood_id')->nullable()->constrained('neighbourhoods');
            $table->string('e_full_address')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aid_citizen_addresses');
    }
};
