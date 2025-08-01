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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            
            $table->foreignId('lead_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->comment('Sales yang membuat proyek')->constrained()->onDelete('cascade');

            $table->decimal('value', 15, 2)->default(0);
            $table->string('status')->default('Menunggu Approval');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
