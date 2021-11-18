<?php

namespace App\Http\Controllers\Learner;

use Password;
use Auth;
use DB;
use Carbon\Carbon;
use App\Models\Learner;
use Mail;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;


class LearnerResetPasswordController extends Controller
{
  /**
  * Write code on Method
  *
  * @return response()
  */
 public function showForgetPasswordForm()
 {
    return view('learner.authentication.forgetPassword');
 }

 protected function guard()
  {
      return Auth::guard('web');
  }

 /**
  * Write code on Method
  *
  * @return response()
  */
 public function submitForgetPasswordForm(Request $request)
 {
     $request->validate([
         'email' => 'required|email|exists:learners',
     ]);

     $token = Str::random(64);

     DB::table('password_resets')->insert([
         'email' => $request->email,
         'token' => $token,
         'created_at' => Carbon::now()
       ]);

     Mail::send('forgetPasswordLearner', ['token' => $token], function($message) use($request){
         $message->to($request->email);
         $message->subject('Reset Password');
     });

     return back()->with('message', 'We have e-mailed your password reset link!');
 }
 /**
  * Write code on Method
  *
  * @return response()
  */
 public function showResetPasswordForm($token) {
    return view('learner.authentication.forgetPasswordLink', ['token' => $token]);
 }

 public function __construct()
  {
      $this->middleware('guest:web');
  }

 /**
  * Write code on Method
  *
  * @return response()
  */
 public function submitResetPasswordForm(Request $request)
 {
     $request->validate([
         'email' => 'required|email|exists:learners',
         'password' => 'required|string|min:6|confirmed',
         'password_confirmation' => 'required'
     ]);

     $updatePassword = DB::table('password_resets')
                         ->where([
                           'email' => $request->email,
                           'token' => $request->token
                         ])
                         ->first();

     if(!$updatePassword){
         return back()->withInput()->with('error', 'Invalid token!');
     }

     $user = Learner::where('email', $request->email)
                 ->update(['password' => Hash::make($request->password)]);

     DB::table('password_resets')->where(['email'=> $request->email])->delete();

     return redirect('/learner/login')->with('message', 'Your password has been changed!');

 }

 protected function broker()
  {
      return Password::broker('learners');
  }
}
