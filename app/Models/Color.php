<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = "colors";

    protected $fillable = ['kind_id', 'color'];

    public function kind()
    {
        return $this->belongsTo(Kind::class);
    }
}
