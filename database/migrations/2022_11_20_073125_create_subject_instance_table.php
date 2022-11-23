<?php

use App\Models\Subject;
use App\Models\Term;
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
        Schema::create('subject_instance', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subject::class,'subjectId')->constrained();
            $table->foreignIdFor(Term::class,'termId')->constrained();
            $table->integer('version');
            $table->foreignIdFor(User::class,'userId')->constrained();
            $table->boolean('published')->default(true);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->unique(['subjectId','termId','version']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_instance');
    }
};
