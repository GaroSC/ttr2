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
        Schema::table('events', function (Blueprint $table) {
            //
            $table->dropColumn('end_date');
            $table->dropColumn('start_date');
            $table->string('description')->nullable()->after('title');
            $table->date('date')->nullable()->after('description');
            $table->time('starts_at')->nullable()->after('date');
            $table->time('ends_at')->nullable()->after('starts_at');
            $table->enum('status_event', ['aprobada', 'cancelada', 'pendiente'])->default('pendiente')->after('ends_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            //
            $table->date('end_date');
            $table->dropColumn('description');
            $table->dropColumn('date');
            $table->dropColumn('starts_at');
            $table->dropColumn('ends_at');
            $table->dropColumn('status_event');
        });
    }
};
