@extends('layoutClient.layout')
@section('body')
<section id="hero">
    <div class="flex flex-col items-start mt-5 py-2 px-4 space-x-4 space-y-4">
        <h1 class="font-bold text-2xl md:text-3xl ">وظائف المتواجدة بالموقع </h1>
        <p class="text-lg">وظائف وفرص عمل لحديثي التخرج وأصحاب الخبرات في مختلف المجالات والتخصصات والدول العربية
            والأجنبية- تقدّم لوظائف محلية ووظائف عن بعد عن طريق موقع فرصة.</p>
    </div>
    <div class="flex flex-wrap justify-center">
        <img src="{{ asset('website/images/undraw_co-working_re_w93t.svg')}}" alt="image world" class="w-[340px]">
    </div>
    <div class="flex flex-row justify-center my-10">
        <form action="{{url('searchJobClient')}}" method="get">
            @csrf
            <input type="text" name="search" class="w-[200px] px-4 py-2 border border-black" placeholder="بحث عن وظيفة" id="">
            <button type="submit" class="font-semibold bg-slate-900 text-white hover:bg-slate-700 duration-300 px-4 py-2 rounded-lg">بحث</button>
        </form>
    </div>
    <div class="container  mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-2 gap-y-10">
       @foreach ($job as $item)
        <div class="flex flex-col space-x-2 items-center shadow-xl  w-[300px] bg-gray-200 mr-6 md:mr-0">
            <img src="{{asset($item->selfie)}}" alt="" title="image job" class="w-[260px] rounded-md mt-2">
            <h1 class="font-bold text-2xl text-center px-4 py-2">{{$item->name}}</h1>
            <h1 class="text-xl text-center px-4 py-2">{{$item->name_job_type}}</h1>
            <h1 class="text-xl text-center px-4 py-2">بداية التقديم :{{$item->start}}</h1>
            <h1 class="text-xl text-center px-4 py-2">الانتهاء :{{$item->end}}</h1>
            <a href="{{url('showJob',$item->id)}}"
                class="font-semibold bg-blue-500 hover:bg-blue-400 duration-300 text-center  text-white px-4 py-2 mb-4 rounded-lg">عرض
                التفاصيل</a>
        </div>
        @endforeach


    </div>
</section>
@endsection
