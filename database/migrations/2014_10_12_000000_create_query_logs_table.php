<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('query_logs', function (Blueprint $table) {
            $table->id();
            $table->string('type', 16);
            $table->integer('causer_id');
            $table->string('subject_type', 128);
            $table->bigInteger('subject_id');
            $table->text('subject_detail');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('query_logs');
    }
};
