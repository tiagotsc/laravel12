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
        Schema::create('proposed_sales', function (Blueprint $table) {
            $table->id();
            $table->string('item_sold')->comment('Item vendido');
            $table->decimal('price',10,2)->comment('Valor item');
            $table->date('end_date')->nullable()->comment('Data finalização');
            $table->foreignId('status_id')->constrained('status')->comment('Status da proposta');
            $table->foreignId('user_id_create')->constrained('users');
            $table->string('obs')->nullable()->comment('observação');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE proposed_sales comment 'Armazena dados das propostas de vendas'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposed_sales');
    }
};
