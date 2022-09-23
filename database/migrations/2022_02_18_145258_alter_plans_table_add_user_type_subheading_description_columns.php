<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPlansTableAddUserTypeSubheadingDescriptionColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->unsignedBigInteger('user_type')->nullable()->after('is_active');
            $table->string('sub_heading', 65)->nullable()->after('plan_name');
            $table->text('description')->nullable()->after('plan_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('user_type');
            $table->dropColumn('sub_heading');
            $table->dropColumn('description');
        });
    }
}
