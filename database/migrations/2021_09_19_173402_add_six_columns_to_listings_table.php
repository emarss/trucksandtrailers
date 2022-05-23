<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSixColumnsToListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->string("image_4")->nullable();
            $table->string("image_5")->nullable();
            $table->string("image_6")->nullable();
            $table->string("image_7")->nullable();
            $table->string("image_8")->nullable();
            $table->string("image_9")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->dropColumn([
                "image_4",
                "image_5",
                "image_6",
                "image_7",
                "image_8",
                "image_9",
            ]);
        });
    }
}
