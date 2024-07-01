<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            if (!Schema::hasColumn('leads', 'user_id')) {
                $table->foreignId('user_id')->nullable()->constrained();
            }
            if (!Schema::hasColumn('leads', 'nome')) {
                $table->string('nome');
            }
            if (!Schema::hasColumn('leads', 'telefone')) {
                $table->string('telefone')->nullable();
            }
            if (!Schema::hasColumn('leads', 'email')) {
                $table->string('email')->nullable();
            }
            if (!Schema::hasColumn('leads', 'endereco')) {
                $table->string('endereco')->nullable();
            }
            if (!Schema::hasColumn('leads', 'setor')) {
                $table->string('setor')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leads', function (Blueprint $table) {
            if (Schema::hasColumn('leads', 'user_id')) {
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('leads', 'nome')) {
                $table->dropColumn('nome');
            }
            if (Schema::hasColumn('leads', 'telefone')) {
                $table->dropColumn('telefone');
            }
            if (Schema::hasColumn('leads', 'email')) {
                $table->dropColumn('email');
            }
            if (Schema::hasColumn('leads', 'endereco')) {
                $table->dropColumn('endereco');
            }
            if (Schema::hasColumn('leads', 'setor')) {
                $table->dropColumn('setor');
            }
        });
    }
};
