@extends('layoutAdmin.layout')
@section('title')  دورات الموقع @endsection
@section('body')
<div class="container">
    <div class="mx-3  shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <h3 class="text-center"> الدورات </h3>
        <h4 class="text-left btn btn-primary"><a class="addElem" href="{{url('addCourseAdmin')}}"><b>اضافة</b></a></h4>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success m-2 p-1 text-lg ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
         {{session()->get('message')}}
    </div>
    @endif
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="bg-body-tertiary">
            <form action="{{url('searchCourse')}}" method="get" class="m-3">
                @csrf
                <input type="search" name="search" class="text-lg rounded-sm" placeholder="بحث عن دورات">
                <button type="submit" class="text-lg btn btn-warning">بحث</button>
            </form>
          </div>
            {{-- <div>
                <img src="{{$user->selfie}}" alt="" class="profile">
            </div> --}}
        
            <table class="table">
                <tr class="table-active">
                    <td><b>اسم الدورة</b></td>
                    <td><b>الوصف </b></td>
                    <td><b> نوع الدورة</b></td>
                    <td><b>بداية  الدورة</b></td>
                    <td><b> انتهاء الدورة</b></td>
                    <td><b>الجنس </b></td>
                    <td><b>  الجنسية</b></td>
                    <td><b>العمر  </b></td>
                    <td><b>تكلفة الدورة</b></td>
                    <td><b>اللغة</b></td>
                    <td><b>المهارات </b></td>
                    <td><b> اسم الشركة </b></td>
                    <td><b>العمليات</b></td>
                </tr>
        @foreach ($course as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{substr($item->des_job_course,0,25)}}..</td>
                <td>{{$item->name_job_type}}</td>
                <td>{{$item->start}}</td>
                <td>{{$item->end}}</td>
                <td>{{$item->gender}}</td>
                <td>{{$item->nationality}}</td>
                <td>{{$item->age}}</td>
                <td>{{$item->course_cost}}</td>
                <td>{{$item->lang}}</td>
                <td>{{substr($item->skill,0,25)}}..</td>
                <td>{{$item->nameCompany}}</td>
                <td>
                    <a onclick="return confirm('هل أنت متأكد من الحذف ؟')" class="btn btn-danger" href="{{url('deleteCourseAdmin',$item->id)}}">حذف</a>
                    <a class="btn btn-success" href="{{url('editCourseAdmin',$item->id)}}">تعديل</a>
                  </td>
            </tr>
        @endforeach
            </table>
            {{$course->onEachSide(1)->links()}}
    </div>
 </div>
@endsection