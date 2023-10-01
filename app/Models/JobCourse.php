<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'des_job_course', 'start', 'end', 'nationality',
        'age', 'gender', 'skill', 'responsibilities', 'type_of_working',
        'years_of_experience', 'required_documents', 'course_cost', 'lang',
        'accept', 'see', 'account', 'process_number', 'type',
        'jobtype_id', 'company_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sp()
    {
        return $this->belongsTo(JobType::class);
    }
}
