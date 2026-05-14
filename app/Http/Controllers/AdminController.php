<?php
namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Order;
use App\Models\Article;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    private function checkAdmin() {
        if (!auth()->check() || !auth()->user()->is_admin) {
            return redirect('/')->with('error', 'Доступ запрещен');
        }
    }

    public function index() {
        $this->checkAdmin();
        $services = Service::latest()->get();
        $requests = Order::latest()->get();
        $pendingReviews = Review::where('is_approved', false)->latest()->get();
        return view('admin', compact('services', 'requests', 'pendingReviews'));
    }

    public function serviceStore(Request $request) {
        $this->checkAdmin();
        $data = $request->validate([
            'title' => 'required', 'slug' => 'required|unique:services',
            'description' => 'nullable', 'full_description' => 'nullable',
            'price' => 'required|numeric', 'image' => 'nullable|image',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/services'), $imageName);
            $data['image'] = 'images/services/' . $imageName;
        }
        Service::create($data);
        return redirect()->back()->with('success', 'Услуга добавлена');
    }

    public function serviceUpdate(Request $request, $id) {
        $this->checkAdmin();
        $service = Service::findOrFail($id);
        $data = $request->validate([
            'title' => 'required', 'slug' => 'required',
            'description' => 'nullable', 'full_description' => 'nullable',
            'price' => 'required|numeric', 'image' => 'nullable|image',
        ]);
        if ($request->hasFile('image')) {
            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/services'), $imageName);
            $data['image'] = 'images/services/' . $imageName;
        }
        $service->update($data);
        return redirect()->back()->with('success', 'Услуга обновлена');
    }

    public function serviceDelete($id) {
        $this->checkAdmin();
        $service = Service::findOrFail($id);
        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }
        $service->delete();
        return redirect()->back()->with('success', 'Удалено');
    }

    public function requestStatus(Request $request, $id) {
        $this->checkAdmin();
        Order::findOrFail($id)->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Статус изменен');
    }

    public function requestDelete($id) {
        $this->checkAdmin();
        Order::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Заявка удалена');
    }

    public function articleStore(Request $request) {
        $this->checkAdmin();
        $data = $request->validate([
            'title' => 'required', 'slug' => 'required|unique:articles',
            'preview_text' => 'nullable', 'content' => 'required',
            'image' => 'nullable|image',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/articles'), $imageName);
            $data['image'] = 'images/articles/' . $imageName;
        }
        $data['is_published'] = true;
        $data['published_at'] = now();
        Article::create($data);
        return redirect()->back()->with('success', 'Статья опубликована');
    }

    public function reviewApprove($id) {
        $this->checkAdmin();
        Review::findOrFail($id)->update(['is_approved' => true]);
        return redirect()->back()->with('success', 'Отзыв одобрен');
    }

    public function reviewDelete($id) {
        $this->checkAdmin();
        Review::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Отзыв удален');
    }
}