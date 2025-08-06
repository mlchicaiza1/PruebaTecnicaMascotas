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
        Schema::create('dentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('contractor_id');
            $table->string('insured_name');
            $table->string('identification')->unique();
            $table->unsignedTinyInteger('affiliate_type_id'); // 1 = HOLDER, 2 = DEPENDENT
            $table->unsignedTinyInteger('family_composition_id'); // 1 = T, 2 = T+1, 3 = T+F
            $table->unsignedBigInteger('service_id');
            $table->string('holder_id')->nullable();
            $table->json('dependents')->nullable();
            $table->string('registration_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dentals');
    }
};
