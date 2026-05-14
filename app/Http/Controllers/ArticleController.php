<?php
namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Setting;

class ArticleController extends Controller {
    public function index() {
        $articles = Article::where('is_published', true)->orderBy('published_at', 'desc')->paginate(6);
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('articles', compact('articles', 'settings'));
    }
    public function show($slug) {
        $article = Article::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $article->increment('views');
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('article-show', compact('article', 'settings'));
    }
}