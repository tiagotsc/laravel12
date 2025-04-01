<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proposed_sale_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proposed_sale_id')->constrained('proposed_sales');
            $table->foreignId('user_id_create')->constrained('users');
            $table->foreignId('user_id_edit')->constrained('users');
            $table->string('obs')->comment('Observação');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE proposed_sale_logs comment 'Armazena log das alterações das propostas de vendas'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposed_sale_logs');
    }
};
