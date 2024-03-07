<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPontoTimeToUserTimeLogsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('user_time_logs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->timestamp('ponto_time')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_time_logs', function (Blueprint $table) {
            $table->dropColumn('ponto_time');
        });
    }

}
