<?php
namespace App\Http\Controllers;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller {
    public function index() {
        $reviews = Review::where('is_approved', true)->latest()->get();
        $avg = $reviews->avg('rating') ?? 0;
        return view('reviews', compact('reviews', 'avg'));
    }
public function store(Request $request)
{
    try {
        $data = $request->validate([
            'name' => 'required|string|max:255|required',
            'rating' => 'required|integer|min:1|max:5|required',
            'text' => 'required|string|min:0|max:1000|required', 
        ]);

        \App\Models\Review::create([
            'user_id' => auth()->id(),
            'name' => $data['name'],
            'rating' => $data['rating'],
            'text' => $data['text'],
            'is_approved' => false,
        ]);

        return redirect()->back()->with('success', 'Отзыв отправлен на модерацию');
        
    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        \Log::error('Review create error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Ошибка: ' . $e->getMessage());
    }
}
}