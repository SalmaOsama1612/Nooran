<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('volunteer_opportunities', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name')->default('جمعية نوران التعليمية');
            $table->string('organization_description')->nullable();
            $table->string('title');
            $table->date('start_date')->nullable();
            $table->unsignedInteger('current_volunteers')->default(0);
            $table->unsignedInteger('max_volunteers')->default(50);
            $table->string('external_url')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('volunteer_opportunities');
    }
};