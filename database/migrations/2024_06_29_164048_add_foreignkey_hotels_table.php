<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        //
        Schema::table('hotels', function (Blueprint $table) {
            $table->unsignedBigInteger('hotel_type_id');

            $table->foreign('hotel_type_id')->references('id')->on('hotel_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        //
        Schema::table('hotels', function (Blueprint $table) {
            $table->dropForeign(['hotel_type_id']);
            $table->dropColumn(['hotel_type_id']);
        });
    }
};
