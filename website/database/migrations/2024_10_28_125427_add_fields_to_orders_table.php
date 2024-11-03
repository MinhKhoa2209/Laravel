<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->time('check_time')->nullable()->after('status');
            $table->date('check_date')->nullable()->after('check_time');
            $table->text('order_note')->nullable()->after('check_date');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['check_date', 'check_time', 'order_note']);
        });
    }
}
