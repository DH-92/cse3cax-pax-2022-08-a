<?php

use App\Models\Subject;
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
        Schema::create('user_qualification', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subject::class,'subjectId')->constrained();
            $table->foreignIdFor(User::class,'userId')->constrained();
            $table->timestamps();

            $table->unique(['subjectId','userId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_qualification');
    }
};
