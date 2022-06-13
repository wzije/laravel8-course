<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReleaseDate extends Model
{
    use HasFactory;

    protected $table = "release_dates";

    protected $fillable = ['kind_id', 'date'];

    public function kind()
    {
        return $this->belongsTo(Kind::class);
    }
}
