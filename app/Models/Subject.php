<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'name',
        'color',
        'description'
    ];

    use HasFactory;
    use HasTimestamps;

    public function instances()
    {
        return $this->hasMany(SubjectInstance::class);
    }

    public function lecturers()
    {
        return $this->BelongsToMany(User::class);
    }
}
