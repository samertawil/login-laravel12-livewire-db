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
        Schema::create('aid_citizen_registrations', function (Blueprint $table) {
            $table->integer('idc');
            $table->primary('idc');
            $table->string('full_name');
            $table->date('birthday');
            $table->string('mobile_primary');
            $table->string('mobile_secondary')->nullable();
            $table->foreignId('gender')->constrained('statuses');
            $table->foreignId('marital_status')->constrained('statuses');
            $table->smallInteger('family_count')->default(0);
            $table->foreignId('provider')->nullable()->constrained('users');
        
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aid_citizen_registrations');
    }
};
