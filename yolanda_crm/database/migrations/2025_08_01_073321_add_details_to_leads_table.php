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
        Schema::table('leads', function (Blueprint $table) {
            $table->text('notes')->nullable()->after('phone');
            $table->string('source')->nullable()->after('notes');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null')->after('source');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['notes', 'source', 'user_id']);
        });
    }
};
