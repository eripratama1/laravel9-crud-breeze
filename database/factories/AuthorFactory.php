<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    /**
     * Mendefinisikan seperti apa data yang akan di inputkan ke tabel authors
     * menggunakan method fake() dan name() untuk menambahkan data pada field name
     * dan untuk field slug menggunakan helper Str::slug untuk mengubah hasil dari $name 
     * menjadi slug lalu, menambahkannya pada field slug.
     */
    public function definition()
    {
        $name = fake()->name(); /**  */
        $slug = Str::slug($name, '-');
        
        return [
            'name' => $name,
            'slug' => $slug
        ];
    }
}
