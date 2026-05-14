<?php
namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Review;
use App\Models\Setting;

class HomeController extends Controller {
    public function index() {
        $services = Service::where('is_active', true)->orderBy('sort_order')->limit(4)->get();
        $reviews = Review::where('is_approved', true)->latest()->limit(2)->get();
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('home', compact('services', 'reviews', 'settings'));
    }
}