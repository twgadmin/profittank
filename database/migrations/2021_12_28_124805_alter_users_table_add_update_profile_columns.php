<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableAddUpdateProfileColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address_1', 64)->nullable()->after('company_name');
            $table->string('address_2', 64)->nullable()->after('company_name');
            $table->string('city', 24)->nullable()->after('company_name');
            $table->string('state', 24)->nullable()->after('company_name');
            $table->string('zip_code', 24)->nullable()->after('company_name');
            $table->string('summary', 64)->nullable()->after('company_name');
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
            $table->dropColumn('address_1');
            $table->dropColumn('address_2');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('zip_code');
            $table->dropColumn('summary');
        });
    }
}
