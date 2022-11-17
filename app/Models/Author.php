<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    use HasFactory;
    
    /**
     * Melakukan Mass Assignment dengan variabel guarded
     * dimana attribut yang ada pada variabel tersebut tidak diizinkan untuk 
     * di lakukan mass assignment
     * 
     * Jadi jika kita kosongkan seperti dibawah maka semua attribut / field
     * yang ada pada tabel tersebut bisa kita isi dengan data nantinya.
     */
    protected $guarded = [];
}
