@extends('layoutClient.layout')
@section('body')
<section id="hero" class="">
  
    <div class="container mx-auto flex flex-col items-center mt-4 border-slate-400 w-[320px] md:w-[540px] border-4 rounded-lg">
        {{-- @if (session()->has('message'))
        <div class=" w-[332px] h-[80px] bg-lime-400 text-white rounded-md">
            <button type="button" class="close text-xl text-black font-bold" data-dismiss="alert" aria-hidden="true">x</button>
            <h1 class="text-xl text-black mt-1">{{session()->get('message')}}</h1>
        </div>
        @endif --}}
        <div class="flex justify-center">
            <img src="{{asset($user->selfie)}}" class="w-[160px] h-[160px] mt-2 rounded-full" alt="">
        </div>
        <div class="flex flex-col justify-center items-center m-4 w-[310px] md:w-[540px]">
            <form action="{{url('saveProfileClient')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="block">
                    <h1 class="font-bold text-xl m-4 w-[120px]">الاسم</h1>
                    <input required value="{{$user->name}}" class="text-xl m-4 w-[240px]   border border-black" type="text" class="border" name="name"
                        id="">
                          <div class="text-red-600">@error('name'){{$message}}@enderror</div>
                </div>
                <div class="block">
                    <h1 class="font-bold text-xl m-4 w-[120px]">الكنية</h1>
                    <input required value="{{$user->last_name}}" class="text-xl m-4 w-[240px]   border border-black" type="text" class="border" name="last_name"
                        id="">
                          <div class="text-red-600">@error('last_name'){{$message}}@enderror</div>
                </div>
                <div class="block">
                    <h1 class="font-bold text-xl m-4 w-[120px]">البريد الالكتروني</h1>
                    <input required value="{{$user->email}}" class="text-xl m-4 w-[240px]   border border-black" type="email" class="border" name="email"
                        id="">
                          <div class="text-red-600">@error('email'){{$message}}@enderror</div>
                </div>
                <div class="block">
                    <h1 class="font-bold text-xl m-4 w-[120px]">الهاتف</h1>
                    <input required value="{{$user->phone}}" class="text-xl m-4 w-[240px]   border border-black" type="tel" class="border" name="phone"
                        id="">
                          <div class="text-red-600">@error('phone'){{$message}}@enderror</div>
                </div>
                <div class="block">
                    <h1 class="font-bold text-xl m-4 w-[120px]">صورة الشخصية</h1>
                    <input  class="text-xl m-4 w-[240px]   border border-black" type="file" class="border" name="selfie"
                        id="">
                          <div class="text-red-600">@error('selfie'){{$message}}@enderror</div>
                </div>
                <div class="block">
                    <button type="submit" class="px-4 py-2 bg-lime-500 text-white rounded-xl hover:bg-lime-4 required00 duration-300">حفظ</button>
                    <button type="reset" class="px-4 py-2 bg-red-500 text-white rounded-xl hover:bg-red-400 duration-300">مسح</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
