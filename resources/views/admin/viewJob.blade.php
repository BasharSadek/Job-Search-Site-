@extends('layoutAdmin.layout')
@section('title')  وظائف الموقع @endsection
@section('body')
<div class="container">
    <div class="mx-3  shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <h3 class="text-center"> الوظائف </h3>
        <h4 class="text-left btn btn-primary"><a class="addElem" href="{{url('addJobAdmin')}}"><b>اضافة</b></a></h4>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success m-2 p-1 text-lg ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
         {{session()->get('message')}}
    </div>
    @endif
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        
            {{-- <div>
                <img src="{{$user->selfie}}" alt="" class="profile">
            </div> --}}
            <div class="bg-body-tertiary">
                <form action="{{url('searchJob')}}" method="get" class="m-3">
                    @csrf
                    <input type="search" name="search" class="text-lg rounded-sm" placeholder="بحث عن وظيفة">
                    <button type="submit" class="text-lg btn btn-warning">بحث</button>
                </form>
              </div>
            <table class="table">
                <tr class="table-active">
                    <td><b>اسم الوظيفة</b></td>
                    <td><b>الوصف </b></td>
                    <td><b> نوع الوظيفة</b></td>
                    <td><b>بداية  التوظيف</b></td>
                    <td><b> انتهاء التوظيف</b></td>
                    <td><b>الجنس </b></td>
                    <td><b>  الجنسية</b></td>
                    <td><b>العمر  </b></td>
                    <td><b>الدوام</b></td>
                    <td><b>سنوات الخبرة</b></td>
                    <td><b>الوثائق المطلوبة</b></td>
                    <td><b>المهارات </b></td>
                    <td><b>مسؤوليات المتقدم </b></td>
                    <td><b> اسم الشركة </b></td>
                    <td><b>العمليات</b></td>
                </tr>
        @foreach ($job as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{substr($item->des_job_course,0,25)}}..</td>
                <td>{{$item->name_job_type}}</td>
                <td>{{$item->start}}</td>
                <td>{{$item->end}}</td>
                <td>{{$item->gender}}</td>
                <td>{{$item->nationality}}</td>
                <td>{{$item->age}}</td>
                <td>{{$item->type_of_working}}</td>
                <td>{{$item->years_of_experience}}</td>
                <td>{{substr($item->required_documents,0,25)}}..</td>
                <td>{{substr($item->skill,0,25)}}..</td>
                <td>{{substr($item->responsibilities,0,25)}}..</td>
                <td>{{$item->nameCompany}}</td>
                <td>
                    <a onclick="return confirm('هل أنت متأكد من الحذف ؟')" class="btn btn-danger" href="{{url('deleteJobAdmin',$item->id)}}">حذف</a>
                    <a class="btn btn-success" href="{{url('editJobAdmin',$item->id)}}">تعديل</a>
                  </td>
            </tr>
        @endforeach
            </table>
            {{$job->onEachSide(1)->links()}}
    </div>
</div>
@endsection