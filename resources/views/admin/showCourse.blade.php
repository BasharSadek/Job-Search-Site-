@extends('layoutAdmin.layout')
@section('title')  تعديل على الدورة @endsection
@section('body')
<div class="container">
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
     <h3>تعديل على الدورة </h3>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success m-2 p-1 text-lg ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
         {{session()->get('message')}}
    </div>
    @endif
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <form action="{{url('UpdateCourseAdmin',$course->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
        <table class="table">
        
            <tr>
                <td class="table-active"> <b>اسم</b></td>
                <td ><input type="text" class="selectoption" name="name" required value="{{$course->name}}"></td>
                <div class="red">@error('name'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> وصف الدورة</b></td>
                <td ><textarea name="des_job_course" class="selectoption"  cols="30" rows="5" required>
                    {{$course->des_job_course}}
                </textarea></td>
                <div class="red">@error('des_job_course'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> نوع الدورة</b>  </td>
                <td>
                    <select value="" name="jobtype_id" class="selectoption" required >
                        @foreach ($job_type as $item)
                        <option value="{{$item->id}}" name="jobtype_id" @if ($course->jobtype_id == $item->id) selected @endif> {{$item->name_job_type}}</option>
                        @endforeach
                 </select></td>
            </tr>
            <tr>
                <td class="table-active"> <b>  بداية التقديم على الدورة</b></td>
                <td ><input type="date" name="start" class="selectoption" value="{{$course->start}}" required></td>
                <div class="red">@error('start'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>  تاريخ انتهاء التقدم </b>  </td>
                <td ><input type="date" class="selectoption" value="{{$course->end}}"  name="end" required></td>
                <div class="red">@error('end'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> الجنس</b>  </td>
                <td>
                    <select value="" name="gender" class="selectoption" required>
                    <option value="ذكر" name="gender" @if ($course->gender == 'ذكر')selected @endif> ذكر</option>
                    <option value="أنثى" name="gender" @if ($course->gender == 'أنثى')selected @endif> أنثى</option>
                    <option value="كلاهما" name="gender" @if ($course->gender == 'كلاهما')selected @endif> كلاهما</option>
                 </select></td>
            </tr>
            <tr>
                <td class="table-active"> <b>  الجنسية</b>  </td>
                 <td>
                    <select value="" name="nationality" class="selectoption" required>
                    <option value="السورية" name="nationality"  @if ($course->nationality == 'السورية')selected @endif> السورية</option>
                    <option value="اللبنانية" name="nationality"  @if ($course->nationality == 'اللبنانية')selected @endif> اللبنانية</option>
                    <option value="العراقية" name="nationality"  @if ($course->nationality == 'العراقية')selected @endif> العراقية</option>
                    <option value="الأردنية" name="nationality"  @if ($course->nationality == 'الأردنية')selected @endif> الأردنية</option>
                    <option value="الاماراتية" name="nationality"  @if ($course->nationality == 'الاماراتية')selected @endif> الاماراتية</option>
                 </select></td>
            </tr>
            <tr>
                <td class="table-active"> <b> العمر</b>  </td>
                <td ><input type="text" class="selectoption" value="{{$course->age}}"  name="age" required></td>
                <div class="red">@error('age'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> تكلفة الدورة</b>  </td>
                <td ><input type="text" class="selectoption" name="course_cost" required value="{{$course->course_cost}}"></td>
                <div class="red">@error('course_cost'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>  اللغة</b>  </td>
                 <td>
                    <select value="" name="lang" class="selectoption" required>
                    <option value="العربية" name="lang"  @if ($course->lang == 'العربية') selected @endif> العربية</option>
                    <option value="الانكليزية" name="lang"  @if ($course->lang == 'الانكليزية') selected @endif> الانكليزية</option>
                 </select></td>
            </tr>
            <tr>
                <td class="table-active"> <b> المهارات المطلوبة</b>  </td>
                <td ><textarea name="skill" class="selectoption"  required cols="30" rows="5">{{$course->skill}}</textarea></td>
                <div class="red">@error('skill'){{$message}}@enderror</div>
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