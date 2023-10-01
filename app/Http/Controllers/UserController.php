<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\JobCourse;
use Illuminate\Http\Request;
use App\Http\Trait\UploadFile;
use App\Models\JobType;
use App\Models\Save;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use UploadFile;

    public function jobClient()
    {
        $job =  DB::table('job_courses')
            ->select(
                'job_courses.*',
                'job_types.name_job_type',
                'users.name as nameCompany',
                'users.selfie as selfie',
                'users.id as idCompany'
            )
            ->join('job_types', 'job_courses.jobtype_id', 'job_types.id')
            ->join('users', 'users.id', 'job_courses.company_id')
            ->where('accept', '=', '1')->where('see', '=', '1')
            ->where('type', '=', 'job')
            ->limit(200)->OrderBy('job_courses.id', 'DESC')
            ->get();
        return view('client.jobs', compact('job'));
    }

    public function searchJobClient(Request $request)
    {
        $search =  strip_tags($request->search);
        $job = JobCourse::where('name', 'like', "%$search%")
            // ->orWhere('des_job_course', 'like', "%$search%")
            ->where('type', '=', 'job')
            ->where('see', '=', 1)
            ->where('accept', '=', 1)
            ->get();
        return view('client.jobs', compact('job'));
    }
    public function searchCourseClient(Request $request)
    {
        $search =  strip_tags($request->search);
        $course = JobCourse::where('name', 'like', "%$search%")
            // ->orWhere('des_job_course', 'like', "%$search%")
            ->where('type', '=', 'course')
            ->where('see', '=', 1)
            ->where('accept', '=', 1)
            ->get();
        return view('client.course', compact('course'));
    }
    public function searchCompanyClient(Request $request)
    {
        $search =  strip_tags($request->search);
        $company = User::where('name', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->get();
        return view('client.organizations', compact('company'));
    }
    public function courseClient()
    {
        $course =  DB::table('job_courses')
            ->select(
                'job_courses.*',
                'job_types.name_job_type',
                'users.name as nameCompany',
                'users.selfie as selfie',
                'users.id as idCompany'
            )
            ->join('job_types', 'job_courses.jobtype_id', 'job_types.id')
            ->join('users', 'users.id', 'job_courses.company_id')
            ->where('accept', '=', '1')->where('see', '=', '1')
            ->where('type', '=', 'course')
            ->limit(200)->OrderBy('job_courses.id', 'DESC')
            ->get();
        return view('client.course', compact('course'));
    }


    public function viewOrganizations()
    {
        $company = DB::table('users')
            ->select(
                'users.*',
                // 'count(follows.id)'
            )
            ->leftJoin('follows', 'follows.user_id', 'users.id')
            ->where('status', '!=', 'client')
            // ->groupBy('users.id')
            ->get();
        return view('client.organizations', compact('company'));
    }
    public function followCompany($id)
    {
        if (Auth::id()) {

            $found = DB::table('follows')
                ->select('follows.company_id', 'follows.user_id')
                ->where('follows.company_id', '=', $id)
                ->where('follows.user_id', '=', auth()->user()->id)
                ->get();

            // dd($found);
            if (count($found) == 0) {
                Follow::create([
                    'company_id' => $id,
                    'user_id' => auth()->user()->id,
                ]);
            }
            return redirect()->back();
        } else {
            return redirect()->route('login');
        }
    }

    public function showJob($id)
    {

        $job = DB::table('job_courses')
            ->select(
                'job_courses.*',
                'users.name as nameCompany',
                'users.description as desCompany',
                'users.id as idCompany',
                'job_types.name_job_type as typeName',
                'users.specialy',
                'users.selfie as selfie',
                'users.email as email'
            )
            ->join('job_types', 'job_types.id', '=', 'job_courses.jobtype_id')
            ->join('users', 'users.id', '=', 'job_courses.company_id')
            ->where('job_courses.id', '=', $id)
            ->first();


        // return $job;
        return view('client.showJob', compact('job'));
    }
    public function profileClient()
    {
        $user = User::find(auth()->user()->id);
        // return $user;
        return view('client.profile', compact('user'));
    }
    public function saveProfileClient(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' =>  ['required', 'integer'],
            'selfie' => ['image', 'mimes:jpg,png,jpeg,ico'],
        ]);
        $user = User::findOrFail(auth()->user()->id);
        $user->name = strip_tags($request->name);
        $user->last_name = strip_tags($request->last_name);
        $user->email = strip_tags($request->email);
        $user->phone = strip_tags($request->phone);
        if ($request->file('selfie')) {
            // $image_path = public_path($user->selfie);
            // if (isset($user->selfie)) {
            //     unlink($image_path);
            // }
            $user->selfie = $this->upload($request->file('selfie'), 'images');
        }

        $user->save();
        return redirect()->back()->with('message', 'تم التعديل على الملف الشخصي');
    }

    public function saveJob($id)
    {
        if (Auth::id()) {

            $found = DB::table('saves')
                ->select('saves.job_id', 'saves.user_id')
                ->where('saves.job_id', '=', $id)
                ->where('saves.user_id', '=', auth()->user()->id)
                ->get();

            // dd($found);
            if (count($found) == 0) {
                Save::create([
                    'job_id' => $id,
                    'user_id' => auth()->user()->id,
                ]);
            }
            return redirect()->back();
        } else {
            return redirect()->route('login');
        }
    }
    public function showCourse($id)
    {

        $course = DB::table('job_courses')
            ->select(
                'job_courses.*',
                'users.name as nameCompany',
                'users.description as desCompany',
                'users.id as idCompany',
                'job_types.name_job_type as typeName',
                'users.specialy',
                'users.selfie as selfie',
                'users.email as email'
            )
            ->join('job_types', 'job_types.id', '=', 'job_courses.jobtype_id')
            ->join('users', 'users.id', '=', 'job_courses.company_id')
            ->where('job_courses.id', '=', $id)
            ->first();


        // return $job;
        return view('client.showCourse', compact('course'));
    }

    public function registerCompany()
    {
        setcookie('status', 'company');
        return redirect()->route('register');
    }

    public function registerClient()
    {
        setcookie('status', 'client');
        return redirect()->route('register');
    }
    public function archive()
    {
        $job =  DB::table('job_courses')
            ->select(
                'job_courses.*',
                'job_types.name_job_type',
                'users.selfie as selfie',
                'saves.id as idSave'
            )
            ->join('users', 'users.id', '=', 'job_courses.company_id')
            ->join('job_types', 'job_courses.jobtype_id', 'job_types.id')
            ->join('saves', 'saves.job_id', 'job_courses.id')
            ->where('user_id', '=', auth()->user()->id)
            ->OrderBy('job_courses.id', 'DESC')
            ->get();
        return view('client.archives', compact('job'));
    }

    public function companyFollow()
    {
        $company =  DB::table('users')
            ->select(
                'users.*',
                'follows.id as idFollow'
            )
            ->join('follows', 'follows.user_id', '=', 'users.id')
            // ->OrderBy('users.id', 'DESC')
            // ->where('users.id', '=', 'follows.company_id')
            ->get();
        return view('client.companyFollow', compact('company'));
    }
    public function deleteArchives($id)
    {
        $save =  Save::findOrFail($id);
        $save->delete();
        return redirect()->back();
    }
    public function specialities()
    {
        $speciality = JobType::all();
        return view('client.specialities', compact('speciality'));
    }

    public function followCancel($id)
    {
        $company = Follow::findOrFail($id);
        $company->delete();
        return redirect()->back();
    }
}
