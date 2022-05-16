<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EBook extends Model
{
    use HasFactory;

    protected $table = 'e_books';
    protected $fillable = ['id', 'title', 'author', 'description'];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
