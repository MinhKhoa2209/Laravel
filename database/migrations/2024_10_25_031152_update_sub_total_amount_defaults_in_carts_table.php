<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSubTotalAmountDefaultsInCartsTable extends Migration
{
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            // Update sub_amount and total_amount to have default values
            $table->decimal('sub_amount', 10, 2)->default(0)->change();
            $table->decimal('total_amount', 10, 2)->default(0)->change();
        });
    }

    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            // Revert the changes if needed
            $table->decimal('sub_amount', 10, 2)->change();
            $table->decimal('total_amount', 10, 2)->change();
        });
    }
}
