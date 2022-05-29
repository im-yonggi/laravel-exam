<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = array(
        'content', 
        'created_at',
        'updated_at'
    );

    public static $rules = array(
        'content' => 'required|max:20',
    );
}
