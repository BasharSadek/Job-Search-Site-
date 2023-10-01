@extends('layoutAdmin.layout')
@section('title')  الملف الشخصي@endsection
@section('body')
<div class="container">
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
     <h3>  تعديل على الملف الشخصي</h3>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success m-2 p-1 text-lg ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
         {{session()->get('message')}}
    </div>
    @endif
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <form action="{{url('storeProfileAdmin')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <img src="{{asset($user->selfie)}}" alt="" class="profile">
            </div>
        <table class="table" >
        
            <tr>
                <td class="table-active"> <b>اسم</b></td>
                <td ><input type="text" name="name" class="selectoption" required value="{{$user->name}}"></td>
                <div class="red">@error('name'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>البريد الالكتروني</b></td>
                <td ><input type="email" class="selectoption" name="email" required value="{{$user->email}}"></td>
                <div class="red">@error('email'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> كلمة المرور</b></td>
                <td ><input type="password" class="selectoption" name="password" ></td>
                <div class="red">@error('password'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>  تخصص </b>  </td>
                <td ><input type="text" class="selectoption" name="specialy" required value="{{$user->specialy}}"></td>
                <div class="red">@error('specialy'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>وصف الموقع</b>  </td>
                <td ><textarea name="description" class="selectoption" id="" cols="30" rows="5">{{$user->description}}</textarea></td>
                <div class="red">@error('description'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>  الموقع الشركة الرئيسية</b>  </td>
                <td ><textarea name="location" class="selectoption" cols="30" rows="5">{{$user->location}}</textarea></td>
                <div class="red">@error('location'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> الهاتف</b>  </td>
                <td ><input type="tel" class="selectoption" name="phone"  value="{{$user->phone}}"></td>
                <div class="red">@error('phone'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> الصورة</b>  </td>
                <td ><input type="file" class="selectoption" name="selfie" accept="image/*" id=""></td>
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