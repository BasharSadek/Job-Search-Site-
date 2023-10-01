@extends('layoutClient.layout')
@section('body')
<section id="hero">
    <div class="container mx-auto px-6 space-x-6 flex flex-col  md:flex-row justify-center">
        <div class="md:w-1/2 flex flex-col justify-center  py-8 text-center  text-slate-900  ">
            <h1 class="font-bold text-3xl md:text-5xl text-center ">دليلك لتوفير فرص عمل</h1>
            <p class="py-5 text-2xl text-center ">بناء المهارات والقدرات وتوفير فرص عمل من حيث التوظيف والتدريب في عدة
                دول عربية
            </p>
        </div>   
    </div>
    <div class="flex flex-col items-center mx-auto md:flex-row justify-center space-y-4 space-x-2 mb-8">
        <a href="{{url('jobClient')}}" class="bg-amber-500 text-white duration-300 hover:bg-amber-400 px-6 py-2 mx-4 text-center rounded-md font-bold w-40">استكشاف الوظائف</a>
        <a href="{{url('courseClient')}}" class="bg-amber-500 text-white duration-300 hover:bg-amber-400 px-6 py-2 mx-4 text-center rounded-md font-bold w-40">استكشاف الدورات</a>
    </div>
    <div class="md:w-1/2 flex flex-col items-center xl:mr-[400px] lg:mr-[300px] md:mr-[200px] mx-4">
        <img src="{{ asset('website/images/work.svg')}}" alt="" class="w-[500px] md:w-full h-[460px]">
    </div>
</section>
@endsection
