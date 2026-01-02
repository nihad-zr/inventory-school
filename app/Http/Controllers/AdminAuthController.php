<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Admin;
use App\Models\LoginHistory;
use App\Models\Item;


class AdminAuthController extends Controller
{
    /**
     * عرض صفحة تسجيل الدخول
     */
    public function showLogin()
    {
        return view ('admin.login');
    }

    /**
     * عملية تسجيل الدخول
     */
    public function login(Request $request)
    {
        // التحقق من المدخلات
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // حفظ سجل الدخول
            LoginHistory::create([
                'admin_id' => Auth::guard('admin')->user()->id,
            ]); 

            return redirect('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email or password is incorrect.',
        ]);
    }

    /**
     * عرض Dashboard
     */
   public function dashboard()
{
    $totalItems = Item::count();

    $maintenance = Item::where('etat', 'broken')->count();

    $storage = Item::where('location', 'Stock')->count();

    $loginHistory = LoginHistory::with('admin')->orderBy('created_at', 'desc')->get();

    return view('admin.dashboard', compact(
        'totalItems',
        'maintenance',
        'storage',
        'loginHistory'
    ));
}


    /**
     * تسجيل الخروج
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
