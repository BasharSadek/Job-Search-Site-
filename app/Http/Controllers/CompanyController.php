<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JobType;

use App\Models\JobCourse;
use Illuminate\Http\Request;
use App\Http\Trait\UploadFile;
use App\Models\Follow;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    use UploadFile;
    public function homeCompany()
    {
        $job = JobCourse::where('type', '=', 'job')->where('company_id', '=', auth()->user()->id)->count();
        $course = JobCourse::where('type', '=', 'course')->where('company_id', '=', auth()->user()->id)->count();
        $client = Follow::where('company_id', '=', auth()->user()->id)->count();
        return view('company.index', compact('job', 'course', 'client'));
    }
    public function showProfileCompany()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('company.profile', compact('user'));
    }
    public function storeProfileCompany(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' =>  ['required', 'integer'],
            'selfie' => ['image', 'mimes:jpg,png,jpeg,ico'],
            'specialy' => ['required', 'string'],
        ]);
        $user = User::findOrFail(auth()->user()->id);
        $user->name = strip_tags($request->name);
        $user->email = strip_tags($request->email);
        $user->password = strip_tags(bcrypt($request->password));

        if ($request->specialy != null) {
            $user->specialy = strip_tags($request->specialy);
        }
        if ($request->description != null) {
            $user->description = strip_tags($request->description);
        }

        if ($request->location != null) {
            $user->location = strip_tags($request->location);
        }
        if ($request->phone != null) {
            $user->phone = strip_tags($request->phone);
        }
        if ($request->file('selfie')) {
            $image_path = public_path($user->selfie);
            if (isset($user->selfie)) {
                unlink($image_path);
            }
            $user->selfie = $this->upload($request->file('selfie'), 'images');
        }
        $user->save();
        return redirect()->back()->with('message', 'تم التعديل على الملف الشخصي');
    }
    public function addJob()
    {
        $job_type = JobType::all();
        return view('company.addJob', compact('job_type'));
    }
    public function viewJobCompany()
    {
        $job =  DB::table('job_courses')
            ->select(
                'job_courses.*',
                'job_types.name_job_type',
                'users.name as nameCompany',
            )
            ->join('job_types', 'job_courses.jobtype_id', 'job_types.id')
            ->join('users', 'users.id', 'job_courses.company_id')
            ->where('type', '=', 'job')
            ->where('company_id', '=', auth()->user()->id)
            ->limit(200)->OrderBy('job_courses.id', 'DESC')
            ->paginate(5);
        return view('company.viewJob', compact('job'));
    }

    public function searchCourseCompany(Request $request)
    {
        if ($request->search == '') {
            $job =  DB::table('job_courses')
                ->select(
                    'job_courses.*',
                    'job_types.name_job_type',
                    'users.name as nameCompany',
                )
                ->join('job_types', 'job_courses.jobtype_id', 'job_types.id')
                ->join('users', 'users.id', 'job_courses.company_id')
                ->where('type', '=', 'job')
                ->where('company_id', '=', auth()->user()->id)
                ->limit(200)->OrderBy('job_courses.id', 'DESC')
                ->paginate(5);
            return view('company.viewJob', compact('job'));
        }
        $search =  strip_tags($request->search);

        $job =  DB::table('job_courses')
            ->select(
                'job_courses.*',
                'job_types.name_job_type',
                'users.name as nameCompany',
            )
            ->join('job_types', 'job_courses.jobtype_id', 'job_types.id')
            ->join('users', 'users.id', 'job_courses.company_id')
            ->where('type', '=', 'job')
            ->where('company_id', '=', auth()->user()->id)
            ->where('name', 'like', "%$search%")
            ->orWhere('des_job_course', 'like', "%$search%")
            ->limit(200)->OrderBy('job_courses.id', 'DESC')
            ->paginate(5);


        // $job_type = Job::where('name', 'like', "%$search%")
        //     ->orWhere('des_job_course', 'like', "%$search%")
        //     ->where('company_id', '=', auth()->user()->id)
        //     ->limit(200)->OrderBy('job_courses.id', 'DESC')
        //     ->paginate(5);
        return view('company.viewJob', compact('job'));
    }
    public function storeJob(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'des_job_course' => ['required', 'string'],
            'jobtype_id' => ['required', 'integer'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'age' => ['required', 'string'],
            'skill' => ['required', 'string'],
            'responsibilities' => ['required', 'string'],
        ]);
        $job = new JobCourse();
        $job->name = strip_tags($request->name);
        $job->des_job_course = strip_tags($request->des_job_course);
        $job->jobtype_id = strip_tags($request->jobtype_id);
        $job->start = strip_tags($request->start);
        $job->end = strip_tags($request->end);
        $job->gender = strip_tags($request->gender);
        $job->nationality = strip_tags($request->nationality);
        $job->age = strip_tags($request->age);
        $job->type_of_working = strip_tags($request->type_of_working);
        $job->years_of_experience = strip_tags($request->years_of_experience);
        $job->required_documents = strip_tags($request->required_documents);
        $job->course_cost = 0;
        $job->lang = '';
        $job->skill = strip_tags($request->skill);
        $job->responsibilities = strip_tags($request->responsibilities);
        $job->type = 'job';
        $job->company_id = auth()->user()->id;
        $job->save();
        return redirect()->back()->with('message', 'تم الاضافة البيانات بنجاح');
    }
    public function deleteJobCompany($id)
    {
        $job = JobCourse::finzdOrFail($id);
        if ($job->company_id == auth()->user()->id) {
            $job->delete();
            return redirect()->back();
        } else {
            return redirect()->back()->with('message', 'لا يمكنك حذف هذا السجل');
        }
    }

    public function editJob($id)
    {
        $job_type = JobType::all();
        $job = JobCourse::findOrFail($id);
        return view('company.showJob', compact('job', 'job_type'));
    }
    public function UpdateJob(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'des_job_course' => ['required', 'string'],
            'jobtype_id' => ['required', 'integer'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'age' => ['required', 'string'],
            'skill' => ['required', 'string'],
            'responsibilities' => ['required', 'string'],
        ]);
        $job = JobCourse::findOrFail($id);
        $job->name = strip_tags($request->name);
        $job->des_job_course = strip_tags($request->des_job_course);
        $job->jobtype_id = strip_tags($request->jobtype_id);
        $job->start = strip_tags($request->start);
        $job->end = strip_tags($request->end);
        $job->gender = strip_tags($request->gender);
        $job->nationality = strip_tags($request->nationality);
        $job->age = strip_tags($request->age);
        $job->type_of_working = strip_tags($request->type_of_working);
        $job->years_of_experience = strip_tags($request->years_of_experience);
        $job->required_documents = strip_tags($request->required_documents);
        $job->course_cost = 0;
        $job->lang = '';
        $job->skill = strip_tags($request->skill);
        $job->responsibilities = strip_tags($request->responsibilities);
        $job->save();
        return redirect()->back()->with('message', 'تم التعديل بنجاح');
    }
    public function viewCourseCompany()
    {
        $course =  DB::table('job_courses')
            ->select(
                'job_courses.*',
                'job_types.name_job_type',
                'users.name as nameCompany',
            )
            ->join('job_types', 'job_courses.jobtype_id', 'job_types.id')
            ->join('users', 'users.id', 'job_courses.company_id')
            ->where('type', '=', 'course')
            ->where('company_id', '=', auth()->user()->id)
            ->limit(200)->OrderBy('job_courses.id', 'DESC')
            ->get();
        return view('company.viewCourse', compact('course'));
    }
    public function addCourse()
    {
        $job_type = JobType::all();
        return view('company.addCourse', compact('job_type'));
    }
    public function storeCourse(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'des_job_course' => ['required', 'string'],
            'jobtype_id' => ['required', 'integer'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'age' => ['required', 'string'],
            'skill' => ['required', 'string'],
            'course_cost' => ['required', 'integer'],
        ]);
        $job = new JobCourse();
        $job->name = strip_tags($request->name);
        $job->des_job_course = strip_tags($request->des_job_course);
        $job->jobtype_id = strip_tags($request->jobtype_id);
        $job->start = strip_tags($request->start);
        $job->end = strip_tags($request->end);
        $job->gender = strip_tags($request->gender);
        $job->nationality = strip_tags($request->nationality);
        $job->age = strip_tags($request->age);
        $job->skill = strip_tags($request->skill);
        $job->responsibilities = '';
        $job->type_of_working = '';
        $job->years_of_experience = '';
        $job->required_documents = '';
        $job->course_cost = strip_tags($request->course_cost);
        $job->lang = strip_tags($request->lang);
        $job->type = 'course';
        $job->company_id = auth()->user()->id;
        $job->save();
        return redirect()->back()->with('message', 'تم الاضافة البيانات بنجاح');
    }
    public function deleteCourseCompany($id)
    {
        $course = JobCourse::findOrFail($id);
        if ($course->company_id == auth()->user()->id) {
            $course->delete();
            return redirect()->back()->with('mesaage', 'تم الحذف بنجاح');
        } else {
            return redirect()->back()->with('message', 'لا يمكنك حذف هذا السجل');
        }
    }
    public function editCourse($id)
    {
        $job_type = JobType::all();
        $course = JobCourse::findOrFail($id);
        return view('company.showCourse', compact('course', 'job_type'));
    }
    public function UpdateCourse(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'des_job_course' => ['required', 'string'],
            'jobtype_id' => ['required', 'integer'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'age' => ['required', 'string'],
            'skill' => ['required', 'string'],
            'course_cost' => ['required', 'integer'],
        ]);
        $job = JobCourse::findOrFail($id);
        $job->name = strip_tags($request->name);
        $job->des_job_course = strip_tags($request->des_job_course);
        $job->jobtype_id = strip_tags($request->jobtype_id);
        $job->start = strip_tags($request->start);
        $job->end = strip_tags($request->end);
        $job->gender = strip_tags($request->gender);
        $job->nationality = strip_tags($request->nationality);
        $job->age = strip_tags($request->age);
        $job->course_cost = strip_tags($request->course_cost);
        $job->lang = strip_tags($request->lang);
        $job->skill = strip_tags($request->skill);
        $job->save();
        return redirect()->back()->with('message', 'تم التعديل بنجاح');
    }

    public function viewPay()
    {
        $job =  DB::table('job_courses')
            ->select(
                'job_courses.*',
                'job_types.name_job_type',
            )
            ->join('job_types', 'job_courses.jobtype_id', 'job_types.id')
            ->join('users', 'users.id', 'job_courses.company_id')
            ->where('accept', '=', '1')->where('see', '=', 0)
            ->where('company_id', '=', auth()->user()->id)
            ->where('process_number', '=', null)
            ->limit(200)->OrderBy('job_courses.id', 'DESC')
            ->get();
        return view('company.pay', compact('job'));
    }
    public function payCompany(Request $request, $id)
    {
        $request->validate([
            'process_number' => ['required', 'string'],
        ]);
        $job = JobCourse::findOrFail($id);
        $job->process_number = strip_tags($request->process_number);
        $job->save();
        return redirect()->back()->with('message', 'تم العملية بنجاح');
    }
}
