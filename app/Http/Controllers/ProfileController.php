<?php
namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller {
    public function index() {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->latest()->get();
        return view('profile', compact('user', 'orders'));
    }
    public function update(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.Auth::id(),
            'password' => 'nullable|min:6|confirmed',
        ]);
        $user = Auth::user();
        $user->name = $data['name'];
        $user->email = $data['email'];
        if (!empty($data['password'])) $user->password = Hash::make($data['password']);
        $user->save();
        return redirect()->back()->with('success', 'Профиль обновлен');
    }
}