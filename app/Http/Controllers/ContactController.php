<?php
namespace App\Http\Controllers;
use App\Models\Setting;

class ContactController extends Controller {
    public function index() {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('contacts', compact('settings'));
    }
}