<?php
namespace App\Http\Controllers;
use App\Models\Service;

class ProductController extends Controller {
    public function index() {
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        return view('products', compact('services'));
    }
    public function show($slug) {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('product-show', compact('service'));
    }
}