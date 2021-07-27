<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('settings_description')->nullable();
            $table->string('settings_key')->nullable();
            $table->text('settings_value')->nullable();
            $table->string('settings_type')->nullable();
            $table->integer('settings_must');
            $table->enum('settings_delete',['0','1']);
            $table->enum('settings_status',['0','1']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
