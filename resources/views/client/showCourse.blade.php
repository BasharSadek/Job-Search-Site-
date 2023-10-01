@extends('layoutClient.layout')
@section('body')
<section id="hero">
    <div class="container mx-auto px-6 space-x-6 space-y-4 flex flex-col  lg:flex-row justify-between">
        <div class=" flex flex-col justify-start  py-8 text-right  text-slate-900  ">
            <h1 class="font-bold text-3xl md:text-5xl">  {{$course->name}} </h1>
            <h1 class="text-2xl mt-4"> cs </h1>
            <div class="flex flex-row mt-4">
                <a href="mailto:{{$course->email}}"
                    class="text-lg mx-2 font-bold  border border-e-4 hover:bg-gray-100 hover:border-amber-500 text-gray-100 bg-amber-500 hover:text-amber-500 duration-300 text-center  w-1/3 px-4 py-2 mb-4 rounded-lg">
                    تقديم</a>
                <a href="{{url('saveJob',$course->id)}}"
                    class="text-lg mx-2 font-bold  border border-e-4 hover:bg-gray-100 hover:border-amber-500 text-gray-100 bg-amber-500 hover:text-amber-500 duration-300 text-center w-1/3   px-4 py-2 mb-4 rounded-lg">
                    حفظ</a>
            </div>
            <span class="border-slate-300 md:w-[400px] w-[300px] m-8 rounded-lg border-4"></span>
            <p class="text-2xl font-semibold"> وصف الدورة :</p>
            <p class="py-5 text-xl">{{$course->des_job_course}}
            </p>
            <p class="text-2xl font-semibold "> المهارات  :</p>
            <p class="py-5 text-xl">{{$course->skill}}
            </p>
            {{-- <p class="text-2xl font-semibold"> معايير التقديم :</p>
            <p class="py-5 text-xl">{{$course->required_documents}}
            </p> --}}
         
            <div class="border-slate-300 md:w-[400px] w-[340px] my-4 rounded-lg border-4 flex flex-row">
                <div class="m-4">
                    <div class="flex flex-row p-2">
                        <div class=""> <img src="{{asset('website/images/red-flag.png')}}" class="w-12" alt=""></div>
                        <div class="m-1">                        <h1 class="text-xl font-bold">الجنسية</h1>
                         <h1 class="text-xl font-serif">{{$course->nationality}}</h1></div>
                     </div>
                     <div class="flex flex-row p-2">
                        <div class=""> <img src="{{asset('website/images/sex.png')}}" class="w-12" alt=""></div>
                        <div class="m-1">                        <h1 class="text-xl font-bold">الجنس</h1>
                         <h1 class="text-xl font-serif">{{$course->gender}}</h1></div>
                     </div>
                     <div class="flex flex-row p-2">
                        <div class=""> <img src="{{asset('website/images/bell1.png')}}" class="w-12" alt=""></div>
                        <div class="m-1">                        <h1 class="text-xl font-bold">بداية التقديم</h1>
                         <h1 class="text-xl font-serif">{{$course->start}}</h1></div>
                     </div>
                     <div class="flex flex-row p-2">
                        <div class=""> <img src="{{asset('website/images/bell.png')}}" class="w-12" alt=""></div>
                        <div class="m-1">                        <h1 class="text-xl font-bold">انتهاء التقديم</h1>
                         <h1 class="text-xl font-serif">{{$course->end}}</h1></div>
                     </div>
                </div>
                <div class="m-4">
                     <div class="flex flex-row p-2">
                        <div class=""> <img src="{{asset('website/images/age-group.png')}}" class="w-12" alt=""></div>
                        <div class="m-1">                        <h1 class="text-xl font-bold">العمر</h1>
                         <h1 class="text-xl font-serif">{{$course->age}}</h1></div>
                     </div>
                     <div class="flex flex-row p-2">
                        <div class=""> <img src="{{asset('website/images/language.png')}}" class="w-12" alt=""></div>
                        <div class="m-1">                        <h1 class="text-xl font-bold"> اللغة</h1>
                         <h1 class="text-xl font-serif">{{$course->lang}}</h1></div>
                     </div>
                     <div class="flex flex-row p-2">
                        <div class=""> <img src="{{asset('website/images/money.png')}}" class="w-12" alt=""></div>
                        <div class="m-1">                        <h1 class="text-xl font-bold">التكلفة </h1>
                         <h1 class="text-xl font-serif">{{$course->money}}</h1></div>
                     </div>
                </div>
                
            </div>
        </div>
        <div class=" border-slate-300  w-[308px] h-[508px] rounded-lg border-4">
            <div class="flex flex-col  items-start h-[500px] shadow-xl  w-[300px] bg-gray-200  md:mr-0 ">
                <img src="{{asset($course->selfie)}}" alt="" title="image job"
                    class="w-[100px] h-[100px]  rounded-full   mt-2">
                <h1 class="font-bold text-2xl text-right px-4 py-2"> {{$course->nameCompany}}</h1>
                <h1 class="text-xl text-right">{{$course->specialy}} </h1>
                <p class="px-4 py-2 text-lg">{{$course->desCompany}}</p>
                <span class="w-full h-[2px] bg-slate-400 my-2"></span>
                <div class="flex flex-row justify-around m-2">
                    <a href="{{url('followCompany',$course->idCompany)}}"
                        class="text-lg font-bold  border border-e-4 hover:bg-gray-100 hover:border-amber-500 text-gray-100 bg-amber-500 hover:text-amber-500 duration-300 text-center mx-10  px-4 py-2  rounded-lg">
                        تابع المؤسسة</a>
                </div>
            </div>
        </div>
    </div>


</section>
@endsection
