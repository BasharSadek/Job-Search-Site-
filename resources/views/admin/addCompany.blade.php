@extends('layoutAdmin.layout')
@section('title') اضافة شركة@endsection
@section('body')
<div class="container">
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
     <h3> اضافة شركة</h3>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success m-2 p-1 text-lg ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
         {{session()->get('message')}}
    </div>
    @endif
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <form action="{{url('storeCompanyAdmin')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <table class="table">
            <tr >
                <td class="table-active"> <b>اسم الشركة</b></td>
                <td ><input type="text" name="name" class="selectoption" required value="{{old('name')}}"></td>
                <div class="red">@error('name'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>البريد الالكتروني</b></td>
                <td ><input type="email" name="email" class="selectoption" required value="{{old('email')}}"></td>
                <div class="red">@error('email'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>الكلمة المرور</b> </td>
                <td ><input type="password" name="password" class="selectoption" required value="{{old('password')}}"></td>
                <div class="red">@error('password'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>تخصص الشركة</b>  </td>
                <td ><input type="text" name="specialy" class="selectoption" required value="{{old('specialy')}}"></td>
                <div class="red">@error('specialy'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> موقع الشركة</b>  </td>
                <td ><input type="text" name="location" class="selectoption" required value="{{old('location')}}"></td>
                <div class="red">@error('location'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>الوصف </b>  </td>
                <td ><textarea name="description" class="selectoption" cols="30" rows="5"></textarea></td>
                <div class="red">@error('description'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> الهاتف</b>  </td>
                <td ><input type="tel" name="phone" class="selectoption" required value="{{old('phone')}}"></td>
                <div class="red">@error('phone'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> صورة الشركة</b>  </td>
                <td ><input type="file" name="selfie" class="selectoption" required value="{{old('selfie')}}"></td>
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