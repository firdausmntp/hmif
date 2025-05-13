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
        Schema::table('events', function (Blueprint $table) {
            $table->date('event_date')->nullable()->after('image');
            $table->time('start_time')->nullable()->after('event_date');
            $table->time('end_time')->nullable()->after('start_time');
            $table->string('location')->nullable()->after('end_time');
            $table->string('status')->default('upcoming')->after('location');
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['event_date', 'start_time', 'end_time', 'location', 'status']);
        });
    }
};
