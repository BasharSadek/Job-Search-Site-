@extends('layoutAdmin.layout')
@section('title')  تأكيدات لنشر في الموقع @endsection
@section('body')
<div class="container">
    <div class="mx-3  shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <h3 class="text-center"> تأكيد النشر في الموقع </h3>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success m-2 p-1 text-lg ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
         {{session()->get('message')}}
    </div>
    @endif
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        {{-- <form action="" method="POST" enctype="multipart/form-data">
            @csrf --}}
            {{-- <div>
                <img src="{{$user->selfie}}" alt="" class="profile">
            </div> --}}
        
            <table class="table">
                <tr class="table-active">
                    <td><b>اسم </b></td>
                    <td><b>الوصف </b></td>
                    <td><b> نوع التخصص </b></td>
                    <td><b>تاريخ بداية التقديم   </b></td>
                    <td><b> تاريخ انتهاء </b></td>
                    <td><b>المهارات </b></td>
                    <td><b> اسم الشركة </b></td>
                    <td><b>النوع</b></td>
                    <td><b>اسم البنك</b></td>
                    <td><b>رقم العملية</b></td>
                    <td><b>الموافقة على النشر </b></td>
                    <td><b>العمليات</b></td>
                </tr>
        @foreach ($job as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{substr($item->des_job_course,0,25)}}..</td>
                <td>{{$item->name_job_type}}</td>
                <td>{{$item->start}}</td>
                <td>{{$item->end}}</td>
                <td>{{substr($item->skill,0,25)}}..</td>
                <td>{{$item->nameCompany}}</td>
                <td>{{$item->type}}</td>
                <td>{{$item->bank_name}}</td>
                <td>{{$item->process_number}}</td>
                <td>
                      <a class="btn btn-success" href="{{url('acceptToPost',$item->id)}}">تأكيد</a>
                </td>
                <td>
                    <a onclick="return confirm('هل أنت متأكد من الحذف ؟')" class="btn btn-danger" href="{{url('deleteJobAdmin',$item->id)}}">حذف</a>
                
                    {{-- <a class="btn btn-success" href="{{url('editJobAdmin',$item->id)}}"></a> --}}
                  </td>
            </tr>
        @endforeach
            </table>
        {{-- </form> --}}
    </div>
</div>
@endsection