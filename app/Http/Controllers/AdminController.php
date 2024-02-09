<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        $users = User::latest()->paginate(10);

        $company = User::where('role', '=', 'company')->get();
        $applicants = User::where('role', '=', 'user')->get();
        $jobs = Post::all();
        return view('admin.index', compact('users', 'posts', 'company', 'applicants', 'jobs'));
    }

    /**
     * Show all the posts.
     */
    public function showPosts()
    {
        $posts = Post::latest()->paginate(15);
        return view('admin.posts', compact('posts'));
    }
    public function showApplicants()
    {
        $applicants = User::latest()->where('role', '=', 'user')->paginate(15);
        return view('admin.applicants', compact('applicants'));
    }
    public function showCompanies()
    {
        $companies = User::latest()->where('role', '=', 'company')->paginate(15);
        return view('admin.company', compact('companies'));
    }

    /**
     * Block an user.
     */
    public function blockUser(User $user)
    {

        if ($user->is_banned) {
            $user->update([
                'is_banned' => false,
                'status' => 'active'
            ]);
            $notification = array(
                'message' => 'User Enabled',
                'alert-type' => 'success'
            );
        } else {
            $user->update(['is_banned' => true, 'status' => 'inactive']);
            $notification = array(
                'message' => 'User Banned',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);
    } //End Method


    /**
     * Delete the specified user.
     */
    public function deleteUser(User $user)
    {
        $user->delete();
        $notification = array(
            'message' => 'User Deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    /* Admin Logout */
    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
