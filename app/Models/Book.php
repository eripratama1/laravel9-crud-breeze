<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Untuk mendapatkan data author berdasarkan author_id yang ada pada tabel books
     * kita akan melakukan relasi one to one dari tabel books ke tabel authors
     * seperti pada method getAuthors dibawah. 
     */
    public function getAuthor()
    {
        return $this->belongsTo(Author::class,'author_id');
    }
}
