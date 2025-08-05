<?php

use App\Models\AidCitizenRegistration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aidcitizen_health', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('idc');
            $table->foreign('idc')->references('idc')->on('aid_citizen_registrations');
            $table->foreignId('wife_pregnant')->constrained('statuses','id');
            $table->foreignId('wife_breastfeeding')->constrained('statuses','id');
            $table->foreignId('mental_disability')->constrained('statuses','id')->comment('اعاقة ذهنية');
            $table->integer('count_mental_disability')->default(0);
            $table->foreignId('physical_impairment')->constrained('statuses','id')->comment('اعاقة حركية');
            $table->integer('count_physical_impairment')->default(0);
            $table->foreignId('hearing_impairment')->constrained('statuses','id')->comment('اعاقة سمعية');
            $table->integer('count_hearing_impairment')->default(0);
            $table->foreignId('visual_impairment')->constrained('statuses','id')->comment('اعاقة بصرية');
            $table->integer('count_visual_impairment')->default(0);

            $table->foreignId('diabetes')->constrained('statuses','id')->comment('مرض السكر');
            $table->integer('count_diabetes')->default(0);

            $table->foreignId('blood_pressure')->constrained('statuses','id')->comment('مرض الضغط');
            $table->integer('count_blood_pressure')->default(0);

            $table->foreignId('cancer')->constrained('statuses','id')->comment('سرطان');
            $table->integer('count_cancer')->default(0);

            $table->foreignId('Kidney_failure')->constrained('statuses','id')->comment('فشل كلوي');
            $table->integer('count_Kidney_failure')->default(0);

            $table->integer('provider')->nullable()->constrained('users','id')->comment('ادخال البيانات بواسطة');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aidcitizen_healths');
    }
};
