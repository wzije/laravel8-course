<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Phone extends Model
{
    use HasFactory;

    protected $table = "phones";

    protected $fillable = ["name", "founded", "description"];


    function findByName($name)
    {
        return $this->where('name', $name)->first();
    }

    function maxId()
    {
        return $this->max('id');
    }

    function filter(Request $request)
    {

        $data = $this
            ->where('name', 'like', `%` . $request->get('name') . `%`)
            ->orWhere('founded', $request->get('founded'))
            ->get();

        return $data;
    }
}
