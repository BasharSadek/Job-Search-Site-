@extends('layoutAdmin.layout')
@section('title') اضافة تخصص@endsection
@section('body')
<div class="container">
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
     <h3> اضافة نوع التخصص</h3>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success m-2 p-1 text-lg ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
         {{session()->get('message')}}
    </div>
    @endif
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <form action="{{url('storeJobType')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <table class="table">
            <tr >
                <td class="table-active"> <b>اسم نوع الوظيفة</b></td>
                <td ><input type="text" name="name_job_type" class="selectoption" required value="{{old('name_job_type')}}"></td>
                <div class="red">@error('name_job_type'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> الوصف الوظيفة</b></td>
                <td ><textarea name="des_job_type" class="selectoption" cols="30" rows="6"></textarea></td>
                <div class="red">@error('des_job_type'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> الصورة الوظيفة</b> </td>
                <td ><input type="file" name="image" class="selectoption" required value="{{old('image')}}"></td>
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