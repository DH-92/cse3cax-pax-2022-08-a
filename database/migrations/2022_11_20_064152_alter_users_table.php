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
        Schema::table('users', function (Blueprint $table) {
            // $table->renameColumn('id', 'userId');
            $table->renameColumn('name', 'firstName');
            $table->string('lastName')->nullable();
            $table->string('phone')->nullable();
            $table->longText('notes')->nullable();
            $table->float('maxLoad')->default(config('defaults.maxLoad'));
            $table->string('employmentType');
            $table->integer('userType');
            $table->string('color')->nullable();
            $table->boolean('active')->default(true);
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
            $table->renameColumn('userId', 'id');
            $table->renameColumn('firstName', 'name');
            $table->dropColumn('lastName');
            $table->dropColumn('phone');
            $table->dropColumn('notes');
            $table->dropColumn('maxLoad');
            $table->dropColumn('employmentType');
            $table->dropColumn('userType');
            $table->dropColumn('color');
            $table->dropColumn('active');
        });
    }
};
