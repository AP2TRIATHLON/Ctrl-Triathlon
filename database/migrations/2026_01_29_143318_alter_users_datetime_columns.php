<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dateTime('created_at', 3)->change();
            $table->dateTime('updated_at', 3)->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dateTime('created_at')->change();
            $table->dateTime('updated_at')->change();
        });
    }
};
