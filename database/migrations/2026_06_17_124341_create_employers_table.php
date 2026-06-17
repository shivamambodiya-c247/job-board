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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->foreignIdFor(\App\Model\User::class)->constrained();
            $table->timestamps();
        });

        Schema::table('jobs', function (Blueprint $table) {
            $table->foreignIdFor(\App\Model\Employer::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Model\Employer::class);
        });
        Schema::dropIfExists('employers');
    }
};
