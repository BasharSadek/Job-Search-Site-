<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use App\Models\JobCourse;
use Illuminate\Http\Request;
use App\Http\Trait\UploadFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use UploadFile;
    use AuthorizesRequests, ValidatesRequests;
    public function main()
    {
        return view('client.index');
    }
    public function logoutWebsite()
    {
        Auth::logout();
        return redirect('/');
    }
    public function redirect()
    {
        if (Auth::id()) {
            if (auth()->user()->status == 'admin') {
                $company = User::where('status', '=', 'company')->count();
                $client = User::where('status', '=', 'client')->count();
                $job = JobCourse::where('type', '=', 'job')->count();
                $course = JobCourse::where('type', '=', 'course')->count();
                return view('admin.index', compact('company', 'client', 'job', 'course'));
            }
            if (auth()->user()->status == 'company') {
                $job = JobCourse::where('type', '=', 'job')->where('company_id', '=', auth()->user()->id)->count();
                $course = JobCourse::where('type', '=', 'course')->where('company_id', '=', auth()->user()->id)->count();
                $client = Follow::where('company_id', '=', auth()->user()->id)->count();
                return view('company.index', compact('job', 'course', 'client'));
            }
            if (auth()->user()->status == 'client') {
                return redirect()->route('/');
            }
        } else {
            return redirect()->route('login');
        }
    }
    public function homeUser()
    {
        return view('user.index');
    }
    // public function showProfileUser()
    // {
    //     if (Auth::id()) {
    //         $user = User::findOrFail(auth()->user()->id);
    //         if (auth()->user()->status == 'client') {
    //             return view('user.profile', compact('user'));
    //         }
    //         if (auth()->user()->status == 'company') {
    //             return view('company.profile', compact('user'));
    //         }
    //         if (auth()->user()->status == 'admin') {
    //             return view('admin.profile', compact('user'));
    //         }
    //     } else {
    //         return redirect()->route('login');
    //     }
    // }
    // public function storeProfileUser(Request $request)
    // {
    //     $request->validate([
    //         'name' => ['required', 'string'],
    //         'email' => ['required', 'email'],
    //         'phone' =>  ['required', 'integer'],
    //         'selfie' => ['image', 'mimes:jpg,png,jpeg,ico'],
    //         'specialy' => ['required', 'string'],
    //     ]);
    //     $user = User::findOrFail(auth()->user()->id);
    //     $user->name = strip_tags($request->name);
    //     if ($request->last_name != null) {
    //         $user->last_name = strip_tags($request->last_name);
    //     }
    //     $user->email = strip_tags($request->email);
    //     $user->password = strip_tags(bcrypt($request->password));

    //     if ($request->specialy != null) {
    //         $user->specialy = strip_tags($request->specialy);
    //     }

    //     if ($request->description != null) {
    //         $user->description = strip_tags($request->description);
    //     }

    //     if ($request->location != null) {
    //         $user->location = strip_tags($request->location);
    //     }
    //     if ($request->phone != null) {
    //         $user->phone = strip_tags($request->phone);
    //     }
    //     if ($request->file('selfie')) {
    //         $image_path = public_path($user->selfie);
    //         if (isset($user->selfie)) {
    //             unlink($image_path);
    //         }
    //         $user->sezlfie = $this->upload($request->file('selfie'), 'images');
    //     }
    //     $user->save();
    //     return redirect()->back()->with('message', 'تم التعديل على الملف الشخصي');
    // }
}
