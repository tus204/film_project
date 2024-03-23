<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    public $timestamps = false;
    // protected $guarded = ['_token'];
    public function category() {
        return $this->beLongsto(Category::class, 'category_id');
    }
    public function country() {
        return $this->beLongsto(Country::class, 'country_id');
    }
    public function genre() {
        return $this->beLongsto(Genre::class, 'genre_id');
    }
}
