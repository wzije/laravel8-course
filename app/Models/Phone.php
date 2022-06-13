<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Phone extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "phones";

    protected $fillable = ["name", "founded", "description"];

    public function kinds()
    {
        return $this->hasMany(Kind::class)->select('id', 'name');
    }

    public function colors()
    {
        return $this->hasManyThrough(
            Color::class,
            Kind::class,
            'phone_id',
            "kind_id"
        );
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    function findByName($name)
    {
        return $this->where('name', $name)->first();
    }

    function maxId()
    {
        return $this->max('id');
    }

    function scopeFilter($query, Request $request)
    {
        $key = $request->get('key');
        if ($key) $query = $query->where('name', 'like', '%' . $key . '%');

        return $query;
    }
}
