@extends('layoutAdmin.layout')
@section('title')  طلبات للنشر في الموقع @endsection
@section('body')
<div class="container">
    <div class="mx-3  shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <h3 class="text-center"> الطلبات للنشر في الموقع </h3>
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
            <table class="table">
                <tr class="table-active">
                    <td><b>اسم </b></td>
                    <td><b>الوصف </b></td>
                    <td><b> نوع التخصص </b></td>
                    <td><b>تاريخ بداية التقديم   </b></td>
                    <td><b> تاريخ انتهاء </b></td>
                    <td><b>الدوام</b></td>
                    <td><b>سنوات الخبرة</b></td>
                    <td><b>الوثائق المطلوبة</b></td>
                    <td><b>المهارات </b></td>
                    <td><b> اسم الشركة </b></td>
                    <td><b>النوع</b></td>
                   
                    <td><b>عملية الدفع </b></td>
                    <td><b>العمليات</b></td>
                </tr>
        @foreach ($job as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{substr($item->des_job_course,0,25)}}..</td>
                <td>{{$item->name_job_type}}</td>
                <td>{{$item->start}}</td>
                <td>{{$item->end}}</td>
                <td>{{$item->type_of_working}}</td>
                <td>{{$item->years_of_experience}}</td>
                <td>{{substr($item->required_documents,0,25)}}..</td>
                <td>{{substr($item->skill,0,25)}}..</td>
                <td>{{$item->nameCompany}}</td>
                <td>{{$item->type}}</td>
                <td>  
                <form action="{{url('accept',$item->id)}}" method="post">
                    @csrf
                    <input type="text" name="bank_name" required placeholder="اسم البنك" style="margin : 3px;"> 
                    <div class="red">@error('bank_name'){{$message}}@enderror</div> 
                        <input type="text" name="account" required placeholder="الحساب البنكي" style="margin : 3px;">
                        <div class="red">@error('account'){{$message}}@enderror</div>
                        <input type="text" name="money" required placeholder=" قيمة الدفع" style="margin : 3px;"> 
                        <div class="red">@error('money'){{$message}}@enderror</div> 
                        <button type="submit" class="btn btn-success">السماح</button>
                        </form>
                </td>
               
                <td>
                    <a onclick="return confirm('هل أنت متأكد من الحذف ؟')" class="btn btn-danger" href="{{url('deleteJobAdmin',$item->id)}}">حذف</a>
                  </td>
            </tr>
        @endforeach
            </table>
            {{$job->onEachSide(1)->links()}}
    </div>
</div>
@endsection