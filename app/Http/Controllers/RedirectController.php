<?php
// app/Http/Controllers/RedirectController.php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'staff':
                return redirect()->route('staff.dashboard');
            case 'user':
                return redirect()->route('user.dashboard');
            default:
                Auth::logout();
                return redirect('/login')->withErrors(['email' => 'Role tidak dikenali']);
        }
    }
}
