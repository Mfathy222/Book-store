<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "desc",
        "image"
    ];


    public function books(){
        return $this->hasmany(Book::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }






}
