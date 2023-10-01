@extends('layoutAdmin.layout')
@section('title')  تعديل على بيانات المستخدم @endsection
@section('body')
<div class="container">
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <h3>  تعديل  على بيانات المستخدم</h3>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success m-2 p-1 text-lg ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
         {{session()->get('message')}}
    </div>
    @endif
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <form action="{{url('updateUser',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <img src="{{asset($user->selfie)}}" alt=""  class="profile">
            </div>
        <table class="table">
            <tr >
                <td class="table-active"> <b>اسم </b></td>
                <td ><input type="text" name="name" class="selectoption" required  value="{{$user->name}}"></td>
                <div class="red">@error('name'){{$message}}@enderror</div>
            </tr>
            <tr >
                <td class="table-active"> <b>الكنية </b></td>
                <td ><input type="text" name="last_name" class="selectoption" required  value="{{$user->last_name}}"></td>
                <div class="red">@error('last_name'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>البريد الالكتروني</b></td>
                <td ><input type="email" name="email" class="selectoption" required  value="{{$user->email}}"></td>
                <div class="red">@error('email'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> كلمة المرور</b></td>
                <td ><input type="password" class="selectoption" name="password"  ></td>
                <div class="red">@error('password'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> الهاتف</b>  </td>
                <td ><input type="tel" name="phone" class="selectoption" required  value="{{$user->phone}}"></td>
                <div class="red">@error('phone'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>صورة المستخدم </b></td>
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






















{{-- @extends('layoutAdmin.layout')
@section('body')
<div class="container">
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
     <h3>  تعديل  على بيانات المستخدم</h3>
    </div>
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <form action="{{url('updateUser',$user->id)}}" method="POST">
            @csrf
            <div>
                <img src="{{$user->selfie}}" alt="" class="profile">
            </div>
        <table class="table">    
            <tr >
                <td class="table-active"> <b>اسم المستخدم</b></td>
                <td ><input type="text" name="name" required value="{{$user->name}}"></td>
                <div class="red">@error('name'){{$message}}@enderror</div>
            </tr>
            <tr >
                <td class="table-active"> <b>الكنية </b></td>
                <td ><input type="text" name="last_name" required value="{{$user->last_name}}"></td>
                <div class="red">@error('last_name'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>البريد الالكتروني</b></td>
                <td ><input type="email" name="email" required value="{{$user->email}}"></td>
                <div class="red">@error('email'){{$message}}@enderror</div>
            </tr>

            <tr>
                <td class="table-active"> <b> الهاتف</b>  </td>
                <td ><input type="number" name="phone" required value="{{$user->phone}}"></td>
                <div class="red">@error('phone'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td><button type="submit" class="btn btn-primary">حفظ</button></td>
                <td><button type="reset" class="btn btn-danger">مسح</button></td>
            </tr>
          </table>
        </form>
    </div>
 </div>
@endsection --}}