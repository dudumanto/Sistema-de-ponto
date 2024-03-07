<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('user_time_logs', function (Blueprint $table) {
        $table->timestamp('entrada')->nullable();
        $table->timestamp('saida')->nullable();
    });
}

public function down()
{
    Schema::table('user_time_logs', function (Blueprint $table) {
        $table->dropColumn('entrada');
        $table->dropColumn('saida');
    });
}
};
