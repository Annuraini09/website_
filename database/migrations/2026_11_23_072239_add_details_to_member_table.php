<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('member', function (Blueprint $table) {
            $table->string('jabatan')->default('Anggota')->after('name'); 
            $table->string('angkatan')->nullable()->after('jabatan');
            $table->string('foto')->nullable()->after('phone');
        });
    }

    public function down(): void
    {
        Schema::table('member', function (Blueprint $table) {
            $table->dropColumn(['jabatan', 'angkatan', 'foto']);
        });
    }
};