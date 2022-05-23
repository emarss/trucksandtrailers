<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("slug");
            $table->string("name");
            $table->text("description");
            $table->string("condition");
            $table->string("whatsapp_number")->nullable();
            $table->string("cell_number");
            $table->string("email")->nullable();
            $table->string("location");
            $table->string("category");
            $table->string("price");
            $table->integer("priority");
            $table->string("currency");
            $table->string("status")->default(0);
            $table->string("featured_image")->nullable();
            $table->string("image_2")->nullable();
            $table->string("image_3")->nullable();
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
        Schema::dropIfExists('listings');
    }
}
