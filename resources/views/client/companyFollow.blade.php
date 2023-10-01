@extends('layoutClient.layout')
@section('body')
<section id="hero">
    <div class="flex flex-col items-start mt-5 py-2 px-4 space-x-4 space-y-4">
        <h1 class="font-bold text-2xl md:text-3xl ">  المؤسسات المشاركة بالموقع </h1>
        <p class="text-lg">تصفح جميع المؤسسات المسجّلة على فرصة، وتعرّف على الفرص التي تقدّمها كلّ مؤسسة. يمكنك أيضًا متابعة المؤسسة المفضلة لديك لرؤية الفرص التي يتم إضافتها أولا بأول، والتقديم إليها قبل مباشرة.</p>
    </div>
    <div class="flex flex-wrap justify-center">
        <img src="{{ asset('website/images/undraw_co-working_re_w93t.svg')}}" alt="image world" class="w-[340px]">
    </div>
    {{-- <div class="flex flex-row justify-center my-10">
        <form action="" method="get">
            @csrf
            <input type="text" name="" class="w-[200px] px-4 py-2 border border-black" placeholder="بحث عن مؤسسة" id="">
            <button type="submit" class="font-semibold bg-yellow-400 text-black hover:bg-yellow-300 duration-300 px-4 py-2 rounded-lg">بحث</button>
        </form>
    </div> --}}
    <div class="container  mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-2 gap-y-10 mt-10">
       @foreach ($company as $item)
       <div class="flex flex-col space-x-2 items-start p-4 shadow-xl  w-[300px] bg-gray-200 mr-6 md:mr-0 ">
        <img src="{{asset($item->selfie)}}" alt="" title="image job" class="w-[100px] h-[100px]  rounded-full   mt-2">
        <h1 class="font-bold text-2xl text-right px-4 py-2"> {{$item->name}}</h1>
        <h1 class="text-xl text-right"> {{$item->specialy}}</h1>
        <p class="px-4 py-2 text-lg">{{$item->description}}</p>
        <span class="w-full h-[2px] bg-slate-400 my-2"></span>
        <div class="flex flex-row justify-around ">
            <a href="{{url('followCancel',$item->idFollow)}}"
                class="text-lg font-bold  border border-e-4 hover:bg-gray-100 hover:border-amber-500 text-gray-100 bg-amber-500 hover:text-amber-500 duration-300 text-center   px-4 py-2 mb-4 rounded-lg">
                 الغاء المتابعة</a>
        </div>
    </div>
        @endforeach


    </div>
</section>
@endsection
