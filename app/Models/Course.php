<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    protected $guarded = [
        'id'
    ];

    use SoftDeletes;
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function question() {
        return $this->hasMany(CourseQuestion::class, 'course_id', 'id' );
    }

    public function student() {
        return $this->belongsToMany(Course::class, 'course_student', 'user_id', 'course_id');
    }
}
