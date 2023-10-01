@extends('layoutAdmin.layout')
@section('title') اضافة وظيفة@endsection
@section('body')
<div class="container">
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
     <h3>اضافة الوظيفة</h3>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success m-2 p-1 text-lg ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
         {{session()->get('message')}}
    </div>
    @endif
    <div class="mx-3 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <form action="{{url('storeJobAdmin')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <table class="table">

            <tr>
                <td class="table-active"> <b>اسم</b></td>
                <td ><input type="text" class="selectoption" name="name" required value="{{old('name')}}"></td>
                <div class="red">@error('name'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> وصف الوظيفة</b></td>
                <td ><textarea name="des_job_course" class="selectoption"  cols="30" rows="5" required></textarea></td>
                <div class="red">@error('des_job_course'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> نوع الوظيفة</b>  </td>
                <td>
                    <select value="" name="jobtype_id" class="selectoption" required >
                        @foreach ($job_type as $item)
                        <option value="{{$item->id}}" name="jobtype_id" > {{$item->name_job_type}}</option>
                        @endforeach
                 </select></td>
            </tr>
            <tr>
                <td class="table-active"> <b>  بداية التقديم على الوظيفة</b></td>
                <td ><input type="date" name="start" class="selectoption" required value="{{old('start')}}"></td>
                <div class="red">@error('start'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>  تاريخ انتهاء التقدم </b>  </td>
                <td ><input type="date" class="selectoption" name="end" required value="{{old('end')}}"></td>
                <div class="red">@error('end'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> الجنس</b>  </td>
                <td>
                    <select value="" name="gender" class="selectoption" required>
                    <option value="ذكر" name="gender" > ذكر</option>
                    <option value="أنثى" name="gender" > أنثى</option>
                    <option value="كلاهما" name="gender" > كلاهما</option>
                 </select></td>
            </tr>
            <tr>
                <td class="table-active"> <b>  الجنسية</b>  </td>
                 <td>
                    <select value="" name="nationality" class="selectoption" required>
                    <option value="السورية" name="nationality" > السورية</option>
                    <option value="اللبنانية" name="nationality" > اللبنانية</option>
                    <option value="العراقية" name="nationality" > العراقية</option>
                    <option value="الأردنية" name="nationality" > الأردنية</option>
                    <option value="الاماراتية" name="nationality" > الاماراتية</option>
                 </select></td>
            </tr>
            <tr>
                <td class="table-active"> <b> العمر</b>  </td>
                <td ><input type="text" class="selectoption" name="age" required value="{{old('age')}}"></td>
                <div class="red">@error('age'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>  الدوام</b>  </td>
                 <td>
                    <select value="" name="type_of_working" class="selectoption" required>
                    <option value="جزئي" name="type_of_working" > جزئي</option>
                    <option value="كامل" name="type_of_working" > كامل</option>
                </select></td>
            </tr>
            <tr>
                <td class="table-active"> <b> سنوات الخبرة</b>  </td>
                <td ><input type="text" class="selectoption" name="years_of_experience" required value="{{old('years_of_experience')}}" ></td>
                <div class="red">@error('years_of_experience'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> الوثائق المطلوبة </b>  </td>
                <td ><textarea name="required_documents" class="selectoption" required cols="30" rows="5"></textarea></td>
                <div class="red">@error('required_documents'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b> المهارات المطلوبة</b>  </td>
                <td ><textarea name="skill"  class="selectoption" required cols="30" rows="5"></textarea></td>
                <div class="red">@error('skill'){{$message}}@enderror</div>
            </tr>
            <tr>
                <td class="table-active"> <b>  مستويات المتقدم</b>  </td>
                <td ><textarea name="responsibilities" class="selectoption" required cols="30" rows="5"></textarea></td>
                <div class="red">@error('responsibilities'){{$message}}@enderror</div>
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