<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'name', 'video', 'assignment'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
