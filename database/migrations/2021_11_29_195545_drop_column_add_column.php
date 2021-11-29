<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnAddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['product_id', 'product_name', 'description', 'qty', 'product_price', 'sub_total']);

            $table->string('total')->after('status');
            $table->string('courier')->after('total');
            $table->integer('shiping_cost')->after('courier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->string('product_name');
            $table->text('description');
            $table->integer('qty');
            $table->integer('product_price');
            $table->integer('sub_total');

            $table->dropColumn(['total', 'courier', 'shiping_cost']);
        });
    }
}
