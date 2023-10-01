@extends('layoutClient.layout')
@section('body')
<section id="hero">
    <div class="flex flex-col items-center mt-5 py-2 px-4 space-x-4 space-y-4">
        <h1 class="font-bold text-2xl md:text-3xl ">دليل التخصصات الجامعية</h1>
        <p class="text-lg">
            دليل التخصصات الجامعية و تخصصات المستقبل.
        </p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 my-8 mx-4">
        @foreach ($speciality as $item)
        <div class="w-[340px] rounded-lg bg-gray-200 py-4 px-2">
            <img src="{{asset($item->image)}}" class="w-[300px] h-[200px] rounded-lg mt-2 mr-3" alt="image">
            <h1 class="font-bold text-2xl mt-2 text-center"> {{$item->name_job_type}}</h1>
            <p class="text-xl">{{$item->des_job_type}}</p>
        </div>      
        @endforeach
  
    </div>
</section>
@endsection
