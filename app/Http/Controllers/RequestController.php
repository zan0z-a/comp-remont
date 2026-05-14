<?php
namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller {
    public function create() {
        $services = Service::where('is_active', true)->orderBy('id')->get();
        return view('request', compact('services'));
    }
public function store(Request $request)
{
    try {
        $data = $request->validate([
            'service_id' => 'nullable|exists:services,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|min:1|max:20',
            'email' => 'nullable|email|max:255',
            'problem_description' => 'required|string|min:1', // Минимум 10 символов!
        ]);

        $data['user_id'] = auth()->id();
        $data['status'] = 'pending';

        $order = \App\Models\Order::create($data);

        return redirect()->back()->with('success', 'Заявка #'.$order->id.' отправлена');
        
    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
        
    } catch (\Exception $e) {
        \Log::error('Order create error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Ошибка: ' . $e->getMessage());
    }
}
}