<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Members;
use App\Models\Message;
use App\Models\StudentMark;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Datatables ;

class AdminController extends Controller
{
    public function index(Request $request)
    {
      
        $users = User::where('role' , "!=", 'admin')->get();
        if (! $users) {
            abort(404);
        }
        return $users;

        
    }

    public function AdminDashboard() {
        
        return view('admin.index');

    } // End Method

    public function AdminLogin() {
        return view('auth.login');
    } // End Method

    public function AdminDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    } // End Method

    
   
    public function UserStore(Request $request ){
        
        if ($request->user_id != null) {

            $user = User::find($request->user_id);
            if (! $user) {
                abort(404);
            }

            $user->update([
                'username' => $request->input('username'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
            ]);
    
            return response()->json([
                'success' => 'User Updated Successfully'
            ],201);

        } else {

            $request->validate([
                'username' => 'required|min:2|max:30' ,
                'name' => 'required' ,
                'email' => 'required' ,
                'password' => 'required' ,
                'phone' => 'required' ,
                'address' => 'required' ,
    
            ]);
    
            User::insert([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'address' => $request->address, 
            ]);
    
            return response()->json([
                'success' => 'User Add Successfully'
            ],201);
        }
    


    }

    public function In_Active(Request $request ){
        if ($request->user_id != null) {

            $user = User::find($request->user_id);
            if (! $user) {
                abort(404);
            }
            
            $user->update([
                'status' => 'active',   
            ]);
               
            return response()->json([
                'success' => 'active User Successfully'
            ],201);
           
        }
    }

    public function Active(Request $request ){
        if ($request->user_id != null) {

            $user = User::find($request->user_id);
            if (! $user) {
                abort(404);
            }
            
            $user->update([
                'status' => 'inactive',   
            ]);

            return response()->json([
                'success' => 'inactive User Successfully'
            ],201);
           
    
            

        }
    }
   
    public function UserEdit($id) {
        $user = User::find($id);
        if (! $user) {
            abort(404);
        }
        return $user;
    }

    public function UserDelete($id) {
        $user = User::find($id);
        if (! $user) {
            abort(404);
        }
        $user->delete();
        return response()->json([
            'success' => 'User Deleted Successfully'
        ],201);
    }

    ////////// Courses ////////

    public function CoursesStore(Request $request) {
        $request->validate([
            'coursename' => 'required' ,
            'mark' => 'required' ,
        ]);

        Courses::insert([
            'coursename' => $request->coursename,
            'mark' => $request->mark,
            'created_at' =>Carbon::now(),

        ]);

        return response()->json([
            'success' => 'Courses Created Successfully'
        ],201);
    }

    public function CourseIndex()
    {
      
        $course = Courses::all();;
        if (! $course) {
            abort(404);
        }
        return $course;

        
    }


    public function MemberStore(Request $request) {
        $request->validate([
            'AllCourse' => 'required' ,
            'Student' => 'required' ,
        ]);

        Members::create([
            'course_id' => $request->AllCourse,
            'user_id' => $request->Student,
            'created_at' =>Carbon::now(),

        ]);

        return response()->json([
            'success' => 'Member Created Successfully'
        ],201);

        
    }




    public function StudentMark(Request $request)
    {
      
        $users = User::where('role' , "!=", 'admin')->get();
        if (! $users) {
            abort(404);
        }
        return $users;

        
    }

    public function StudentAllAjax($AllCourse) {
     
        $Members = Members::where('course_id', $AllCourse)->get();
        $userMem = $Members->pluck('user_id')->toArray();
        $users = User::whereNotIn('id', $userMem)->get();

        return json_encode($users);

      

    }

    public function CoursesGetAjax($courses_id) {

        $Members = Members::where('course_id', $courses_id)->get();
        $userMem = $Members->pluck('user_id')->toArray();
        $users = User::findOrFail($userMem);
        return json_encode($users);

      

    }

    
    public function StudentStoreMark(Request $request) {
        $request->validate([
            'courses_id' => 'required' ,
            'student_id' => 'required' ,
            'mark' => 'required' ,
        ]);

        StudentMark::updateOrCreate([
            'course_id' => $request->courses_id,
            'user_id' => $request->student_id,
            'mark' => $request->mark,
            'created_at' =>Carbon::now(),

        ]);

        return response()->json([
            'success' => 'Mark Created Successfully'
        ],201);
        
   
    }

    ////////// chat ////////

    public function adminChat() {
        return view('backend.chat.chatview');

    }

     
    public function MessageSendStore(Request $request) {
        $request->validate([
            'sender_id' => 'required' ,
            'receiver_id' => 'required' ,
            'message' => 'required' ,
        ]);

        Message::insert([
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
            'created_at' =>Carbon::now(),

        ]);

        return $request->receiver_id;
        // return $request ;
        
   
    }

    public function ReceiverGetData($receiver_id) {
     
        $user = User::where('id', $receiver_id)->get();

        // return $user;
        return response()->json($user);

      

    }

    public function ReceiverMessage($receiver_id,$sender_id) {
     
        $ReceiverMessage = Message::where('sender_id', $receiver_id)->where('receiver_id', $sender_id)->get();

        return $ReceiverMessage;

      

    }


    public function SenderMessage($receiver_id,$sender_id) {
     
        $SenderMessage = Message::where('sender_id', $sender_id)->where('receiver_id', $receiver_id)->get();

        return $SenderMessage;

      

    }


}
