<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    use HasFactory;

    protected $table = 'kinds';

    protected $fillable = ['name', 'phone_id'];


    public function phone()
    {
        return $this->belongsTo(Phone::class);
    }

    public function colors()
    {
        return $this->hasMany(Color::class);
    }

    public function releaseDate()
    {
        return $this->hasOne(ReleaseDate::class);
    }
}
