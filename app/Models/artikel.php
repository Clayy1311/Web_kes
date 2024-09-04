<?php
use App\Models\Article;

$articles = Article::whereHas('category', function ($query) {
    $query->where('name', 'kesehatan');
})->get();