<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'author',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('has_read')
                    ->withTimestamps();
    }
    

}

