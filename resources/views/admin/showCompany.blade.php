@extends('layoutAdmin.layout')
@section('title')  تعديل على بيانات الشركة@endsection
@section('body')
<div class="container">
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
     <h3>  تعديل على بيانات الشركة</h3>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success m-2 p-1 text-lg ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
         {{session()->get('message')}}
    </div>
    @endif
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <form action="{{url('updateCompany',$company->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <img src="{{asset($company->selfie)}}" alt="" class="profile">
            </div>
        <table class="table">
            <tr >
                <td class="table-active"> <b>اسم الشركة</b></td>
                <td ><input type="text" name="name" class="selectoption" required value="{{$company->name}}"></td>
                <div class="red">@error('name'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>البريد الالكتروني</b></td>
                <td ><input type="email" name="email" class="selectoption" required value="{{$company->email}}"></td>
                <div class="red">@error('email'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>تخصص الشركة</b>  </td>
                <td ><input type="text" name="specialy" class="selectoption" required value="{{$company->specialy}}"></td>
                <div class="red">@error('specialy'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>وصف الشركة</b>  </td>
                <td ><textarea name="description" class="selectoption" cols="30" rows="5">{{$company->description}}</textarea></td>
                <div class="red">@error('description'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>موقع الشركة</b>  </td>
                <td ><textarea name="location" class="selectoption" cols="30" rows="5">{{$company->location}}</textarea></td>
                <div class="red">@error('location'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> الهاتف</b>  </td>
                <td ><input type="tel" name="phone" class="selectoption" required value="{{$company->phone}}"></td>
                <div class="red">@error('phone'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> صورة الشركة</b>  </td>
                <td ><input type="file" class="selectoption" name="selfie"></td>
                <div class="red">@error('selfie'){{$message}}@enderror</div>
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