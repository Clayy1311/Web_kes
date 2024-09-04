<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;
class Post extends Model
{
    protected $fillable = [
        'title', // tambahkan 'title' di sini
        'body',
        'image',
        'slug',
        'author'

    ];  
protected $table = 'articles';
use HasFactory;

public function category()
    {
        return $this->belongsTo(Category::class);
    }
}