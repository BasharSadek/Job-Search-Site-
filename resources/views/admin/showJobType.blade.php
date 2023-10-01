@extends('layoutAdmin.layout')
@section('title')  تعديل على تخصص @endsection
@section('body')
<div class="container">
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
     <h3> تعديل على نوع الوظيفة </h3>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success m-2 p-1 text-lg ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
         {{session()->get('message')}}
    </div>
    @endif
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <form action="{{url('updateJobType',$job_type->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <img src="{{asset($job_type->image)}}" alt="" title="logo" class="profile">
            </div>
        <table class="table">
            <tr >
                <td class="table-active"> <b>اسم النوع </b></td>
                <td ><input type="text" name="name_job_type" class="selectoption" required value="{{$job_type->name_job_type}}"></td>
                <div class="red">@error('name_job_type'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> الوصف</b></td>
                <td ><textarea name="des_job_type" class="selectoption" cols="30" rows="5">{{$job_type->des_job_type}}</textarea></td>
                <div class="red">@error('des_job_type'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> الصورة</b> </td>
                <td ><input type="file" class="selectoption" name="image" ></td>
                <div class="red">@error('image'){{$message}}@enderror</div>
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