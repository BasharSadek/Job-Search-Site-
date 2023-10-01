@extends('layoutAdmin.layout')
@section('title')  تعديل على الوظيفة @endsection
@section('body')
<div class="container">
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
     <h3>تعديل على الوظيفة </h3>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success m-2 p-1 text-lg ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
         {{session()->get('message')}}
    </div>
    @endif
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <form action="{{url('UpdateJobAdmin',$job->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
        <table class="table">

            <tr>
                <td class="table-active"> <b>اسم</b></td>
                <td ><input type="text" class="selectoption" name="name" required value="{{$job->name}}"></td>
                <div class="red">@error('name'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> وصف الوظيفة</b></td>
                <td ><textarea name="des_job_course" class="selectoption"  cols="30" rows="5" required>
                    {{$job->des_job_course}}
                </textarea></td>
                <div class="red">@error('des_job_course'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> نوع الوظيفة</b>  </td>
                <td>
                    <select value="" name="jobtype_id" class="selectoption" required >
                        @foreach ($job_type as $item)
                        <option value="{{$item->id}}" name="jobtype_id" @if ($job->jobtype_id == $item->id)selected @endif> {{$item->name_job_type}}</option>
                        @endforeach
                 </select></td>
            </tr>
            <tr>
                <td class="table-active"> <b>  بداية التقديم على الوظيفة</b></td>
                <td ><input type="date" name="start" class="selectoption" value="{{$job->start}}" required></td>
                <div class="red">@error('start'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>  تاريخ انتهاء التقدم </b>  </td>
                <td ><input type="date" class="selectoption" value="{{$job->end}}"  name="end" required></td>
                <div class="red">@error('end'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> الجنس</b>  </td>
                <td>
                    <select value="" name="gender" class="selectoption" required>
                    <option value="ذكر" name="gender" @if ($job->gender == 'ذكر')selected @endif> ذكر</option>
                    <option value="أنثى" name="gender" @if ($job->gender == 'أنثى')selected @endif> أنثى</option>
                    <option value="كلاهما" name="gender" @if ($job->gender == 'كلاهما')selected @endif> كلاهما</option>
                 </select></td>
            </tr>
            <tr>
                <td class="table-active"> <b>  الجنسية</b>  </td>
                 <td>
                    <select value="" name="nationality" class="selectoption" required>
                    <option value="السورية" name="nationality"  @if ($job->nationality == 'السورية')selected @endif> السورية</option>
                    <option value="اللبنانية" name="nationality"  @if ($job->nationality == 'اللبنانية')selected @endif> اللبنانية</option>
                    <option value="العراقية" name="nationality"  @if ($job->nationality == 'العراقية')selected @endif> العراقية</option>
                    <option value="الأردنية" name="nationality"  @if ($job->nationality == 'الأردنية')selected @endif> الأردنية</option>
                    <option value="الاماراتية" name="nationality"  @if ($job->nationality == 'الاماراتية')selected @endif> الاماراتية</option>
                 </select></td>
            </tr>
            <tr>
                <td class="table-active"> <b> العمر</b>  </td>
                <td ><input type="text" class="selectoption" value="{{$job->age}}"  name="age" required></td>
                <div class="red">@error('age'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>  الجنسية</b>  </td>
                 <td>
                    <select value="" name="type_of_working" class="selectoption" required>
                    <option value="جزئي" name="type_of_working"  @if ($job->type_of_working == 'جزئي') selected @endif> جزئي</option>
                    <option value="كامل" name="type_of_working"  @if ($job->type_of_working == 'كامل') selected @endif> كامل</option>
                </select></td>
            </tr>
            <tr>
                <td class="table-active"> <b> سنوات الخبرة</b>  </td>
                <td ><input type="text" class="selectoption" name="years_of_experience" required value="{{$job->years_of_experience}}></td>
                <div class="red">@error('years_of_experience'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> الوثائق المطلوبة </b>  </td>
                <td ><textarea name="required_documents" class="selectoption" required cols="30" rows="5">{{$job->required_documents}}</textarea></td>
                <div class="red">@error('required_documents'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> المهارات المطلوبة</b>  </td>
                <td ><textarea name="skill" class="selectoption"  required cols="30" rows="5">{{$job->skill}}</textarea></td>
                <div class="red">@error('skill'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>  مستويات المتقدم</b>  </td>
                <td ><textarea name="responsibilities" class="selectoption" required cols="30" rows="5">{{$job->responsibilities}}</textarea></td>
                <div class="red">@error('responsibilities'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <button type="reset" class="btn btn-danger">مسح</button>
                </td>
            </tr>
          </table>
        </form>
    </div>
 </div>
@endsection