<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    use HasFactory;
    protected $table        = "book";
    protected $primaryKey   = "book_id";
    protected $fillable     = ['book_id','book_code','title','author','category'];
}