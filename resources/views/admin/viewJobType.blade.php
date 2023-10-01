@extends('layoutAdmin.layout')
@section('title')  أنواع التخصصات @endsection
@section('body')
<div class="container">
    <div class="mx-3  shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <h3 class="text-center">     أنواع التخصصات </h3>
        <h4 class="text-left btn btn-primary"><a class="addElem" href="{{url('addJobType')}}"><b>اضافة</b></a></h4>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success m-2 p-1 text-lg ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
         {{session()->get('message')}}
    </div>
    @endif
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
      <div class="bg-body-tertiary">
        <form action="{{url('searchJobType')}}" method="get" class="m-3">
            @csrf
            <input type="search" name="search" class="text-lg rounded-sm" placeholder="بحث عن تخصص">
            <button type="submit" class="text-lg btn btn-warning">بحث</button>
        </form>
      </div>
        <table class="table">
            <tr class="table-active">
                <td><b>لوغو</b></td>
                <td><b>اسم التخصص</b></td>
                <td><b>الوصف </b></td>
                <td><b>العمليات</b></td>
            </tr>
    @foreach ($job_type as $item)
        <tr>
            <td><img src="{{$item->image}}" alt="" class="logoDashboard"></td>
            <td>{{$item->name_job_type}}</td>
            <td>{{$item->des_job_type}}</td>
            <td>
                <a onclick="return confirm('هل أنت متأكد من الحذف ؟')" class="btn btn-danger" href="{{url('deleteJobType',$item->id)}}">حذف</a>
              <a class="btn btn-success" href="{{url('editJobType',$item->id)}}">تعديل</a>
              </td>
        </tr>
    @endforeach
        </table>
       {{$job_type->onEachSide(1)->links()}}
    </div>
 </div>
@endsection