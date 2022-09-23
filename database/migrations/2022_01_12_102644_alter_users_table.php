<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('expiry_date')->nullable()->after('status');
            $table->string('stripe_card_id',45)->nullable()->after('status');
            $table->string('stripe_token_id',45)->nullable()->after('status');
            $table->string('stripe_customer_id',45)->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('expiry_date');
            $table->dropColumn('stripe_card_id');
            $table->dropColumn('stripe_token_id');
            $table->dropColumn('stripe_customer_id');
        });
    }
}
