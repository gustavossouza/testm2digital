<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_campaign', function (Blueprint $table) {
            $table->id();
            $table->integer('campaign_id');
            $table->integer('product_id');
            $table->string('product_campaign_type');
            $table->timestamps();

            $table->foreign('campaign_id')->references("id")->on('campaigns');
            $table->foreign('product_id')->references("id")->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_campaign');
    }
};
