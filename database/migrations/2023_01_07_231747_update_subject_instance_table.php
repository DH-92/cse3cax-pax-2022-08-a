<?php

use App\Models\User;
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
        Schema::table('subject_instance', function (Blueprint $table) {
            $table->integer('lecturer_load')->after('user_id')->default(100);
            $table->foreignIdFor(User::class, 'support_id')->after('lecturer_load')->nullable()->constrained('users', 'id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('subject_instance', 'lecturer_load')) {
            Schema::table('subject_instance', function (Blueprint $table) {
                $table->dropColumn('lecturer_load');
            });
        }
        if (Schema::hasColumn('subject_instance', 'support_id')) {
            Schema::table('subject_instance', function (Blueprint $table) {
                $table->dropForeign(['support_id']);
                $table->dropColumn('support_id');
            });
        }
    }
};
