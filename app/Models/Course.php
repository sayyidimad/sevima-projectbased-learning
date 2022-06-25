<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['teacher_id', 'category', 'name', 'start_date', 'end_date'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
