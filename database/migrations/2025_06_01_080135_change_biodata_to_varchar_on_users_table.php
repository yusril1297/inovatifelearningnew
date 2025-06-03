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
        Schema::table('varchar_on_users', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('varchar_on_users', function (Blueprint $table) {
            //
        });
    }

     public function ups()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('biodata', 255)->change(); // ubah ke VARCHAR(255)
        });
    }

    public function downs()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('biodata')->change(); // rollback ke TEXT jika sebelumnya TEXT
        });
    }
};
