<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNasarawas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nasarawas', function (Blueprint $table) {
            $table->id();
            $table->string('pid')->nullable();
            $table->string('occupant')->nullable();
            $table->string('prop_addr')->nullable();
            $table->string('street_name')->nullable();
            $table->string('asset_no')->nullable();
            $table->string('cadastral_zone')->nullable();
            $table->string('prop_type')->nullable();
            $table->string('prop_use')->nullable();
            $table->string('rating_dist')->nullable();
            $table->string('annual_value')->nullable();
            $table->string('rate_payable')->nullable();
            $table->string('arrears')->nullable();
            $table->string('penalty')->nullable();
            $table->string('grand_total')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('category')->nullable();
            $table->string('group')->nullable();
            $table->string('active')->nullable();
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
        Schema::dropIfExists('nasarawas');
    }
}
