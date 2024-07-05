<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterLeadIdInCampanhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campanhas', function (Blueprint $table) {
            // Remove a foreign key antiga (se existir)
            $table->dropForeign(['lead_id']);
            
            // Altera a coluna lead_id para UUID
            $table->uuid('lead_id')->change();

            // Adiciona a foreign key para garantir o relacionamento
            $table->foreign('lead_id')->references('hash_lista')->on('leads')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campanhas', function (Blueprint $table) {
            // Reverte a coluna lead_id para BIGINT
            $table->unsignedBigInteger('lead_id')->change();
            $table->dropForeign(['lead_id']);
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
        });
    }
}
