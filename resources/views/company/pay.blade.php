@extends('layoutCompany.layout')
@section('title') طلبات للدفع @endsection
@section('body')
<div class="container">
    <div class="mx-3  shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <h3 class="text-center">   تأكيد النشر داخل الموقع  </h3>
        <h4 class="text-left btn btn-primary"><a class="addElem" href="{{url('addJobAdmin')}}"><b>اضافة</b></a></h4>
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
                    <td><b>اسم الوظيفة</b></td>
                    <td><b>الوصف </b></td>
                    <td><b> نوع الوظيفة</b></td>
                    <td><b>بداية  التوظيف</b></td>
                    <td><b> انتهاء التوظيف</b></td>
                    <td><b>الدوام</b></td>
                    <td><b>سنوات الخبرة</b></td>
                    <td><b>الوثائق المطلوبة</b></td>
                    <td><b>المهارات </b></td>
                    <td><b>النوع</b></td>
                    <td><b>اسم البنك</b></td>
                    <td><b>قيمة الدفع </b></td>
                    <td><b> رقم العملية</b></td>
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
                <td>{{$item->type}}</td>
                <td>{{$item->bank_name}}</td>
                <td>{{$item->money}}</td>
                <td>
                    <form action="{{url('payCompany',$item->id)}}" method="post">
                        @csrf
                        <input type="text" name="process_number" required value="{{$item->process_number}}">
                        <button type="submit" class="btn btn-success">دفع</button>
                      </form>
                </td>
                <td>
                    <a onclick="return confirm('هل أنت متأكد من الحذف ؟')" class="btn btn-danger" href="{{url('deleteJobCompany',$item->id)}}">حذف</a>
                
                    {{-- <a class="btn btn-success" href="{{url('editJobAdmin',$item->id)}}"></a> --}}
                  </td>
            </tr>
        @endforeach
            </table>
        {{-- </form> --}}
    </div>
</div>
@endsection