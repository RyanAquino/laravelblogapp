<?php

namespace App\Http\Controllers;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;

class ProfileController extends Controller
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

    public function index(){
        return view('profile.index');
    }

    //
    public function editProfile(){
    	return view('profile.edit');
    }

    public function update(Request $request){
    	//validate
        $this->validate($request,[
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'avatar' => 'image|nullable|max:5000'
        ]);

        //handle profile upload
        if ($request->hasFile('avatar')) {
            //get filename with extension
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();;
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('avatar')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('avatar')->move('avatars', $fileNameToStore);
        }else{
            $fileNameToStore = 'default.png';
        }

        //update profile
        $user = User::find(Auth::user()->id);
        $user->name =$request->input('fname');
        $user->lname =$request->input('lname');
        $user->email =$request->input('email');

        if ($request->hasFile('avatar')) {
            //delete old image
        if ($user->avatar != 'default.png') {
            Cloudder::destroyImage('avatars/'. $user->avatar);
            Cloudder::delete('avatars/' . $user->avatar);    
        }
            //upload new image
            $user->avatar = $fileNameToStore;
            Cloudder::upload("avatars/" . $fileNameToStore,$fileNameToStore,['folder' => 'avatars']);
        }
        $user->save();

        return redirect('/profile')->with('success', 'Profile Updated!');
    }

    //CHANGE PASSWORD
    public function passwordIndex(){
        return view('profile.password');
    }

    public function changePassword(Request $request){

        //validate to the old password
        if (Hash::check($request->input('oldPassword'), Auth::user()->password)) {

             //validate 'confirm password'(matches)
             $this->validate($request,[
                'password' => 'confirmed|different:oldPassword|min:6|max:255',
              ]);

            //save the new password
            $user = User::find(Auth::user()->id);
            $password = $request->input('password');
            $user->password= Hash::make($password);
            $user->save();
            //redirect with a success
           return redirect('/profile')->with('success', 'Password Changed!');
        }else{
              return redirect('/profile/change_password')->with('error', 'Old Password does not match!');
        }




    }

}
