<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard(){
        $user_id = Auth::user()->id;
        $messages = Notification::where('user_id',$user_id)->where('type','message')->latest()->get();
        if(count($messages) > 0){
            foreach($messages as $mm){
                $mm->deliver_time = Carbon::parse($mm->created_at)->diffForHumans();
                if($mm->message != null){
                    $mm->message = json_decode($mm->message);
                }
            }
        }

        $app_users = User::all();
        return view('admin.index',compact('messages','app_users'));
    }


    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminLogin(){

        return view('admin.admin_login');
    }

    public function AdminProfile(){
        $user_id = Auth::user()->id;
        $userData = User::find($user_id);

        return view('admin.admin_profile_view', compact('userData'));

    }

    public function AdminProfileUpdate(Request $request){
        $user_id = Auth::user()->id;
        $userData = User::find($user_id);

        $userData->name = $request->name;
        $userData->username = $request->username;
        $userData->email = $request->email;
        $userData->phone = $request->phone;
        $userData->address = $request->address;

        if($request->hasfile('photo')){
            $destination = 'upload/admin_images/'.$userData->photo;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $userData['photo'] = $filename;
        }
        $userData->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword(){
        $user_id = Auth::user()->id;
        $userData = User::find($user_id);

        return view('admin.admin_change_password', compact('userData'));

    }

    public function AdminPasswordUpdate(Request $request){
        // Validation
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|same:reNewPassword|min:6',
            'reNewPassword' => 'required|min:6'
        ]);

        // Match old password
        if(!Hash::check($request->oldPassword, auth::user()->password)){
            $notification = array(
                'message' => 'Current password does not match!',
                'alert-type' => 'error',
            );
    
            return back()->with($notification);
        }

        // Update new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->newPassword)
        ]);

        $notification = array(
            'message' => 'Password Changed Successfully',
            'alert-type' => 'success',
        );

        return back()->with($notification);

    }

    public function MessageSeen(){
        $user_id = Auth::user()->id;
        $unseen_messages = Notification::where('user_id',$user_id)->where('type','message')->where('status','unseen')->latest()->get();
        if(count($unseen_messages) > 0){
            foreach($unseen_messages as $message){
                $message->status = 'seen';
                $message->save();
            }
        }
        return back();
    }

    public function AppUserCreateView(){
        return view('admin.appUser_create');
    }

    public function AppUserCreatePost(Request $request){
        // Validation
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username|min:4',
            'email' => 'required|unique:users,email|min:6',
            'password' => 'required|min:6',
            'phone' => 'required|min:11',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        $notification = array(
            'message' => 'New User Created Successfully',
            'alert-type' => 'success',
        );

        return redirect('/admin/dashboard')->with($notification);


    }


    public function AppUserEditView($id){
        $app_user = User::findOrFail($id);
        return view('admin.appUser_edit',compact('app_user'));
    }

    public function AppUserEditPost(Request $request){
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'username' => 'required|min:4|unique:users,username,'.$request->id,
            'email' => 'required|min:6|unique:users,email,'.$request->id,
            'phone' => 'required|min:11',
        ]);

        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        $notification = array(
            'message' => 'User Info Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect('/admin/dashboard')->with($notification);
    }

    public function AppUserStatusUpdate($id, $status){
        $app_user = User::findOrFail($id);
        if($status === 'active'){
            $app_user->status = 'active';
        }else if($status === 'inactive'){
            $app_user->status = 'inactive';
        }
        $app_user->save();

        return back();
    }


}
