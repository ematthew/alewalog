<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('pid');
            $table->string('occupant');
            $table->string('prop_addr');
            $table->string('street_name');
            $table->string('asset_no');
            $table->string('cadastral_zone');
            $table->string('prop_type');
            $table->string('prop_use');
            $table->string('rating_dist');
            $table->string('annual_value');
            $table->string('rate_payable');
            $table->string('arrears');
            $table->string('penalty');
            $table->string('grand_total');
            $table->string('category');
            $table->string('group');
            $table->string('active');
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
        Schema::dropIfExists('offices');
    }
}
