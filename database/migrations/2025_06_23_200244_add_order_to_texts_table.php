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
        Schema::table('texts', function (Blueprint $table) {
             $table->integer('order')->default(0)->after('text'); // Places column after 'text'
    });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('texts', function (Blueprint $table) {
             $table->dropColumn('order');
        });
    }
};
