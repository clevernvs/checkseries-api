<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $table = 'episodes';
    // protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['number',];

    protected $casts = ['watched' => 'boolean',];
}
