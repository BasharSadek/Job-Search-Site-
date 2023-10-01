@extends('layoutAdmin.layout')
@section('title')  بيانات العملاء @endsection
@section('body')
<div class="container">
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
     <h3>   بيانات العملاء </h3>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success m-2 p-1 text-lg ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
         {{session()->get('message')}}
    </div>
    @endif
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="bg-body-tertiary">
            <form action="{{url('searchClient')}}" method="get" class="m-3">
                @csrf
                <input type="search" name="search" class="text-lg rounded-sm" placeholder="بحث عن عميل">
                <button type="submit" class="text-lg btn btn-warning">بحث</button>
            </form>
          </div>
        <table class="table">
            <tr class="table-active">
                <td><b>سيلفي</b></td>
                <td><b>اسم </b></td>
                <td><b> الكنية</b></td>
                <td><b>البريد الالكتروني</b></td>
                <td><b>الهاتف</b></td>
                <td><b>العمليات</b></td>
            </tr>
    @foreach ($users as $item)
        <tr>
            <td><img src="{{$item->selfie}}" alt="" class="logoDashboard"></td>
            <td>{{$item->name}}</td>
            <td>{{$item->last_name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->phone}}</td>
            <td>
                <a onclick="return confirm('هل أنت متأكد من الحذف ؟')" class="btn btn-danger" href="{{url('deleteUser',$item->id)}}">حذف</a>
              <a class="btn btn-success" href="{{url('editUser',$item->id)}}">تعديل</a>
              </td>
        </tr>
    @endforeach
        </table>
        {{$users->onEachSide(1)->links()}}
    </div>
 </div>
@endsection