<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('about_pages', function (Blueprint $table) {

            $table->text('intro')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->text('values')->nullable();
            $table->text('strategic_axes')->nullable();
            $table->text('strategic_goals')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('about_pages', function (Blueprint $table) {

            $table->dropColumn([
                'intro',
                'vision',
                'mission',
                'values',
                'strategic_axes',
                'strategic_goals',
            ]);

        });
    }
};