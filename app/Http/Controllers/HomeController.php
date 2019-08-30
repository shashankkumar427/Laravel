<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return Factory|View
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('home', ['users' => $users]);
    }

    /**
     * Shows the Profile Page
     * @return Factory|View
     */
    function profile()
    {
        /*$socialUser = Socialite::driver('facebook')->stateless()->fields(['id', 'email', 'cover', 'name', 'first_name', 'last_name', 'age_range', 'link', 'gender', 'locale', 'picture', 'timezone', 'updated_time', 'verified', 'birthday', 'friends', 'relationship_status', 'significant_other','context','taggable_friends'])->scopes(['email','user_birthday','user_friends','user_relationships','user_relationship_details'])->user();
        print_r($socialUser);
        die();*/
        $userInfo = Auth::user();
        return view('profile', ['userInfo' => $userInfo]);
    }

    /**
     * Shows the Change Password Page
     * @return Factory|View
     */
    function change_password(Request $request)
    {
        if ($request->all()) {
            $request->validate([
                'password' => 'required|min:8'
            ]);
            $user = User::find(Auth::id());
            $user->password = $request->all()['password'];
            $user->save();
        }
        return view('change_password');
    }
}
