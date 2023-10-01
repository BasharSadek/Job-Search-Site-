<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JobType;
use App\Models\JobCourse;
use Illuminate\Http\Request;
use App\Http\Trait\UploadFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    use UploadFile;
    public function homeAdmin()
    {
        $company = User::where('status', '=', 'company')->count();
        $client = User::where('status', '=', 'client')->count();
        $job = JobCourse::where('type', '=', 'job')->count();
        $course = JobCourse::where('type', '=', 'course')->count();
        return view('admin.index', compact('company', 'client', 'job', 'course'));
    }
    public function addCompany()
    {
        return view('admin.addCompany');
    }
    public function storeCompanyAdmin(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string'],
            'selfie' => ['required', 'image', 'mimes:jpg,png,jpeg,ico'],
            'phone' => ['required', 'integer'],
            'location' => ['required', 'string'],
            'specialy' => ['required', 'string'],
        ]);

        $company = new User();
        $company->name = strip_tags($request->name);
        $company->email = strip_tags($request->email);
        $company->password = strip_tags(bcrypt($request->password));
        $company->specialy = strip_tags($request->specialy);
        $company->phone = strip_tags($request->phone);
        if ($request->location != null) {
            $company->location = strip_tags($request->location);
        }
        if ($request->file('selfie')) {
            $company->selfie = $this->upload($request->file('selfie'), 'images');
        }
        if ($request->description != null) {
            $company->description = strip_tags($request->description);
        }
        $company->status = 'company';
        $company->save();
        return redirect()->back()->with('message', 'تم الاضافة البيانات بنجاح');
    }
    public function viewCompanies()
    {
        $companies = User::where('status', '=', 'company')
            ->limit(200)->OrderBy('users.id', 'DESC')->paginate(5);
        return view('admin.viewCompany', compact('companies'));
    }
    public function searchCompany(Request $request)
    {
        if ($request->search == '') {
            $companies = User::where('status', '=', 'company')
                ->limit(200)->OrderBy('users.id', 'DESC')->paginate(5);
            return view('admin.viewCompany', compact('companies'));
        }
        $search =  strip_tags($request->search);
        $companies = User::where('name', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->where('status', '=', 'company')
            ->OrderBy('id', 'DESC')
            ->paginate(5);
        return view('admin.viewCompany', compact('companies'));
    }

    public function deleteCompany($id)
    {
        $company = User::findOrFail($id);
        if ($company->status == 'company') {
            $image_path = public_path($company->selfie);
            if (file_exists($company->selfie)) {
                unlink($image_path);
            }
            $company->delete();
        } else {
            return view('admin.index');
        }
        return redirect()->back()->with('message', 'تم الحذف بنجاح');
    }

    public function editCompany($id)
    {
        $company = User::findOrFail($id);
        if ($company->status == 'company') {
            return view('admin.showCompany', compact('company'));
        } else {
            return view('admin.index');
        }
        return redirect()->back();
    }
    public function updateCompany(Request $request, $id)
    {
        $company = User::findOrFail($id);
        if ($company->status == 'company') {
            $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'email'],
                'selfie' => ['nullable', 'image', 'mimes:jpg,png,jpeg,ico'],
                'phone' =>  ['required', 'integer'],
            ]);
            $company->name = strip_tags($request->name);
            $company->email = strip_tags($request->email);
            $company->specialy = strip_tags($request->specialy);
            $company->location = strip_tags($request->location);
            if ($request->file('selfie')) {
                $company->selfie = $this->upload($request->file('selfie'), 'images');
            }
            $company->phone = strip_tags($request->phone);
            $company->description = strip_tags($request->description);
            $company->save();
        } else {
            return view('admin.index');
        }
        return redirect()->back()->with('message', 'تم التعديل بنجاح');
    }
    public function showProfileAdmin()
    {
        $user = User::findOrFail(Auth::id());
        return view('admin.profile', compact('user'));
    }
    public function storeProfileAdmin(Request $request)
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

    public function viewClients()
    {
        $users = User::where('status', '=', 'client')
            ->limit(200)->OrderBy('users.id', 'DESC')->paginate(7);
        return view('admin.viewUsers', compact('users'));
    }
    public function searchClient(Request $request)
    {
        if ($request->search == '') {
            $users = User::where('status', '=', 'client')
                ->limit(200)->OrderBy('users.id', 'DESC')->paginate(7);
            return view('admin.viewUsers', compact('users'));
        }
        $search =  strip_tags($request->search);
        $users =  User::where('name', 'like', "%$search%")
            ->orWhere('last_name', 'like', "%$search%")
            ->where('status', '=', 'client')
            ->OrderBy('id', 'DESC')
            ->paginate(5);
        return view('admin.viewUsers', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        if ($user->status == 'client') {
            $image_path = public_path($user->selfie);
            if (isset($user->selfie)) {
                unlink($image_path);
            }
            $user->delete();
        } else {
            return view('admin.index');
        }
        return redirect()->back()->with('message', 'تم الحذف بنجاح');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        if ($user->status == 'client') {
            return view('admin.showUser', compact('user'));
        } else {
            return view('admin.index');
        }
        return redirect()->back();
    }
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->status == 'client') {
            $request->validate([
                'name' => ['required', 'string'],
                'last_name' => ['required', 'string'],
                'selfie' => ['nullable', 'image', 'mimes:jpg,png,jpeg,ico'],
            ]);
            $user->name = strip_tags($request->name);
            $user->last_name = strip_tags($request->last_name);
            $user->email = strip_tags($request->email);
            $user->password = strip_tags(bcrypt($request->password));
            $user->phone = strip_tags($request->phone);
            if ($request->file('selfie')) {
                $user->selfie = $this->upload($request->file('selfie'), 'images');
            }
            $user->save();
        } else {
            return view('admin.index');
        }
        return redirect()->back()->with('message', 'تم التعديل بنجاح');
    }

    public function addJobType()
    {
        return view('admin.addJobType');
    }
    public function storeJobType(Request $request)
    {
        $request->validate([
            'name_job_type' => ['required', 'string'],
            'des_job_type' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,ico'],
        ]);
        $job_type = new JobType();
        $job_type->name_job_type = strip_tags($request->name_job_type);
        $job_type->des_job_type = strip_tags($request->des_job_type);
        if ($request->file('image')) {
            $job_type->image = $this->upload($request->file('image'), 'images');
        }
        $job_type->save();
        return redirect()->back()->with('message', 'تم الاضافة البيانات بنجاح');
    }
    public function viewJobsType()
    {
        $job_type = JobType::OrderBy('id', 'DESC')->paginate(5);
        return view('admin.viewJobType', compact('job_type'));
    }
    public function searchJobType(Request $request)
    {
        if ($request->search == '') {
            $job_type = JobType::OrderBy('id', 'DESC')->paginate(5);
            return view('admin.viewJobType', compact('job_type'));
        }
        $search =  strip_tags($request->search);
        $job_type = JobType::where('name_job_type', 'like', "%$search%")
            ->orWhere('des_job_type', 'like', "%$search%")
            ->OrderBy('id', 'DESC')
            ->paginate(5);
        return view('admin.viewJobType', compact('job_type'));
    }
    public function deleteJobType($id)
    {
        $job_type = JobType::findOrFail($id);
        $image_path = public_path($job_type->image);
        if (file_exists($job_type->image)) {
            unlink($image_path);
        }
        $job_type->delete();
        return redirect()->back()->with('message', 'تم الحذف بنجاح');
    }
    public function editJobType($id)
    {
        $job_type = JobType::findOrFail($id);
        return view('admin.showJobType', compact('job_type'));
    }
    public function updateJobType(Request $request, $id)
    {
        $request->validate([
            'name_job_type' => ['required', 'string'],
            'des_job_type' => ['required', 'string'],
            'image' => ['image', 'mimes:jpg,png,jpeg,ico'],
        ]);
        $job_type = JobType::findOrFail($id);
        $job_type->name_job_type = strip_tags($request->name_job_type);
        $job_type->des_job_type = strip_tags($request->des_job_type);
        if ($request->file('image')) {
            $job_type->image = $this->upload($request->file('image'), 'images');
        }
        $job_type->save();
        return redirect()->back()->with('message', 'تم التعديل بنجاح');
    }
    public function viewJobAdmin()
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
            ->limit(200)->OrderBy('job_courses.id', 'DESC')
            ->paginate(5);
        // $job_type = JobType::all();
        return view('admin.viewJob', compact('job'));
    }

    public function searchJob(Request $request)
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
                ->limit(200)->OrderBy('job_courses.id', 'DESC')
                ->paginate(5);
            return view('admin.viewJob', compact('job'));
        }
        $search =  strip_tags($request->search);
        $job = JobCourse::where('name', 'like', "%$search%")
            ->orWhere('des_job_course', 'like', "%$search%")
            ->OrderBy('id', 'DESC')
            ->paginate(5);
        return view('admin.viewJob', compact('job'));
    }
    public function deleteJobAdmin($id)
    {
        $job = JobCourse::findOrFail($id);
        $job->delete();
        return redirect()->back()->with('message', 'تم الحذف بنجاح');
    }
    public function addJobAdmin()
    {
        $job_type = JobType::all();
        return view('admin.addJob', compact('job_type'));
    }
    public function storeJobAdmin(Request $request)
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
        $job->accept = 1;
        $job->see = 1;
        $job->type = 'job';
        $job->company_id = auth()->user()->id;
        $job->save();
        return redirect()->back()->with('message', 'تم الاضافة البيانات بنجاح');
    }
    public function editJobAdmin($id)
    {
        $job_type = JobType::all();
        $job = JobCourse::findOrFail($id);
        return view('admin.showJob', compact('job', 'job_type'));
    }
    public function UpdateJobAdmin(Request $request, $id)
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
        $job->skill = strip_tags($request->skill);
        $job->responsibilities = strip_tags($request->responsibilities);
        $job->save();
        return redirect()->back()->with('message', 'تم التعديل بنجاح');
    }

    public function viewCourseAdmin()
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
            ->limit(200)->OrderBy('job_courses.id', 'DESC')
            ->paginate(5);
        return view('admin.viewCourse', compact('course'));
    }
    public function searchCourse(Request $request)
    {
        // if ($request->search == '') {
        //     $course =  DB::table('job_courses')
        //         ->select(
        //             'job_courses.*',
        //             'job_types.name_job_type',
        //             'users.name as nameCompany',
        //         )
        //         ->join('job_types', 'job_courses.jobtype_id', 'job_types.id')
        //         ->join('users', 'users.id', 'job_courses.company_id')
        //         ->where('type', '=', 'course')
        //         ->limit(200)->OrderBy('job_courses.id', 'DESC')
        //         ->paginate(5);
        //     return view('admin.viewCourse', compact('course'));
        // }
        $search =  strip_tags($request->search);
        $course = JobCourse::where('name', 'like', "%$search%")
            ->orWhere('des_job_course', 'like', "%$search%")
            ->OrderBy('id', 'DESC')
            ->paginate(5);
        return view('admin.viewCourse', compact('course'));
    }

    public function deleteCourseAdmin($id)
    {
        $course = JobCourse::findOrFail($id);
        $course->delete();
        return redirect()->back()->with('message', 'تم حذف البيانات بنجاح');
    }

    public function editCourseAdmin($id)
    {
        $job_type = JobType::all();
        $course = JobCourse::findOrFail($id);
        return view('admin.showCourse', compact('course', 'job_type'));
    }
    public function UpdateCourseAdmin(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'des_job_course' => ['required', 'string'],
            'jobtype_id' => ['required', 'integer'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'age' => ['required', 'string'],
            'skill' => ['required', 'string'],
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
        $job->course_cost =  strip_tags($request->course_cost);
        $job->lang = strip_tags($request->lang);
        $job->skill = strip_tags($request->skill);
        $job->save();
        return redirect()->back()->with('message', 'تم التعديل بنجاح');
    }
    public function addCourseAdmin()
    {
        $job_type = JobType::all();
        return view('admin.addCourse', compact('job_type'));
    }
    public function storeCourseAdmin(Request $request)
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
        $job->type_of_working = '';
        $job->years_of_experience = '';
        $job->required_documents = '';
        $job->course_cost =  strip_tags($request->course_cost);
        $job->lang = strip_tags($request->lang);
        $job->age = strip_tags($request->age);
        $job->skill = strip_tags($request->skill);
        $job->responsibilities = '';
        $job->accept = 1;
        $job->see = 1;
        $job->type = 'course';
        $job->company_id = auth()->user()->id;
        $job->save();
        return redirect()->back()->with('message', 'تم الاضافة البيانات بنجاح');
    }
    public function viewRequests()
    {
        $job =  DB::table('job_courses')
            ->select(
                'job_courses.*',
                'job_types.name_job_type',
                'users.name as nameCompany',
                'users.id as idCompany'
            )
            ->join('job_types', 'job_courses.jobtype_id', 'job_types.id')
            ->join('users', 'users.id', 'job_courses.company_id')
            ->where('accept', '=', '0')->where('see', '=', 0)
            ->limit(200)->OrderBy('job_courses.id', 'DESC')
            ->paginate(5);
        return view('admin.viewRequests', compact('job'));
    }
  
    public function accept(Request $request, $id)
    {
        $request->validate([
            'account' => ['required', 'string'],
            'bank_name' => ['required', 'string'],
            'money' => ['required', 'integer'],
        ]);
        $job = JobCourse::findOrFail($id);
        $job->account = strip_tags($request->account);
        $job->bank_name = strip_tags($request->bank_name);
        $job->money = strip_tags($request->money);
        $job->accept = 1;
        $job->save();
        return redirect()->back()->with('message', 'تم العملية بنجاح');
    }
    public function viewAccept()
    {
        $job =  DB::table('job_courses')
            ->select(
                'job_courses.*',
                'job_types.name_job_type',
                'users.name as nameCompany',
                'users.id as idCompany'
            )
            ->join('job_types', 'job_courses.jobtype_id', 'job_types.id')
            ->join('users', 'users.id', 'job_courses.company_id')
            ->where('accept', '=', '1')->where('see', '=', 0)
            ->where('process_number', '!=', null)
            ->limit(200)->OrderBy('job_courses.id', 'DESC')
            ->get();
        return view('admin.viewAccept', compact('job'));
    }
    public function acceptToPost($id)
    {
        $job = JobCourse::findOrFail($id);
        $job->see = 1;
        $job->save();
        return redirect()->back()->with('message', 'تم العملية بنجاح');
    }
}
