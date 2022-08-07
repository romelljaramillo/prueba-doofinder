<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
    	'title', 
    	'description', 
    	'image',
        'author',
        'publisher',
        'isbn',
        'price',
        'quantity',
        'active'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function categories()
    {
    	return $this->belongsTo(Category::class);
    }

    public function getExcerptAttribute() 
    {
        return substr($this->description, 0, 80) . "...";
    }

    public function similar() 
    {
        return $this->where('category_id', $this->category_id)->with('user')->take(2)->get();
    }
}
