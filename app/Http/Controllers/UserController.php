<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function UserDashboard(){

        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('index',compact('userData'));
    }

  
    public function UserDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );


        return redirect('/login')->with($notification);
    } // End Method

   
    public function UserProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        
        $data->save();


        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method


    ////////////// chart //////////////

    public function UserChat() {
        return view('frontend.home.chat');

    }

    public function UserSameCourse()
    {   
        $user = Auth::user()->id;
        $Members = Members::where('user_id', $user)->get();
        $courses = $Members->pluck('course_id')->toArray();
        $All_Users = collect();
        foreach ($courses as $course) {
            $users_Same_Course = Members::where('course_id', $course)
                ->where('user_id', '!=', $user)
                ->pluck('user_id')
                ->toArray();
            $All_Users = $All_Users->merge(User::whereIn('id', $users_Same_Course)->get());
        }
        // return $Members->unique()->toJson();
        return $All_Users;
        

        
    }
}
