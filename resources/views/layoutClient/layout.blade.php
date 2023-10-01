<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دليل</title>
    <script src="{{ asset('website/cdn.tailwindcss.com_3.3.2.js') }}"></script>
    <script src="{{ asset('website/tailwind.config.js') }}"></script>
</head>
 
<body dir="rtl">
    <nav class=" mx-auto p-6 bg-slate-100 sticky top-0">
        <div class="flex items-center justify-between">
            <div class="">
                <h1 class="font-bold italic text-3xl md:text-5xl">دليل</h1>
                <!-- <img src="images/logoDalil.jpg" alt="logo" width="100px"> -->
            </div>
            <div class="hidden md:flex py-96 md:py-8 space-x-6 items-center ml-6">
                <a href="{{url('/')}}" class="text-neutral-500 font-bold text-xl ml-4 hover:text-cyan-400 ">الرئيسية </a>
                <a href="{{url('jobClient')}}" class="text-neutral-500 font-bold text-xl  hover:text-cyan-400 ">وظائف </a>
                <a href="{{url('courseClient')}}" class="text-neutral-500 font-bold text-xl  hover:text-cyan-400 ">دورات أونلاين</a>
                <a href="{{url('specialities')}}" class="text-neutral-500 font-bold text-xl  hover:text-cyan-400 ">دليل التخصصات</a>
                <a href="{{url('viewOrganizations')}}" class="text-neutral-500 font-bold text-xl  hover:text-cyan-400 ">دليل المؤسسات</a>
            </div>
            @if (Route::has('login'))
            @auth
            
                <div class="flex flex-row">
                    <div class="flex flex-col">
                    <div class="flex flex-row gap-2">
                        <a href="{{route('profileClient')}}" class="bg-amber-500 text-white duration-300 hover:bg-amber-400 px-1 py-1 mb-1 text-center rounded-md font-bold "> الملف الشخصي </a>
                        <a href="{{url('archive')}}" class="bg-amber-500 text-white duration-300 hover:bg-amber-400 px-1 py-1 mb-1 text-center rounded-md font-bold "> المحفوظات  </a>
                    </div>
                    <div class="flex flex-row gap-2">
                        <a href="{{url('companyFollow')}}" class="bg-amber-500 text-white duration-300 hover:bg-amber-400 px-1 py-1 mb-1 text-center rounded-md font-bold "> سجل المتابعة  </a>
                        <p class="">  
                            <form action="{{url('logoutWebsite')}}" class=" bg-amber-500 text-white duration-300 hover:bg-amber-400 px-1 py-1 mb-1 text-center rounded-md font-bold " method="post">
                                @csrf
                                <button type="submit" class=""> تسجيل خروج</button>
                               </form> </p>
                    </div>

                     
                        </div>
                    <div class="hidden md:flex mr-2">
                       <img src="{{asset(auth()->user()->selfie)}}" alt="profile" id="" class="w-16 h-16 rounded-full" />
                    </div>
                </div>
            @else
             <div class="hidden md:flex">
                <a href="{{route('login')}}"
                    class="bg-lime-500 text-white duration-300 hover:bg-lime-400 px-2 py-2  text-center rounded-md font-bold w-40">تسجيل
                    دخول
                </a>
                @if (Route::has('register'))
                <a href="{{url('registerCompany')}}"
                    class="bg-lime-500 text-white duration-300 hover:bg-lime-400 px-2 py-1 mr-2 text-center rounded-md font-bold w-40">
                    انشاء حساب شركة
                </a>
                <a href="{{url('registerClient')}}"
                class="bg-lime-500 text-white duration-300 hover:bg-lime-400 px-2 py-1 mr-2 text-center rounded-md font-bold w-40">
                انشاء حساب عميل
            </a>
            </div>
            @endif
            @endauth
            @endif
              @if (Route::has('login'))
                @auth
                
               <button id="mobile-btn" class="md:hidden">
                <img src="{{asset(auth()->user()->selfie)}}" alt="profile" class="w-16 h-16 rounded-full" >
              </button>
              @else
              <button id="mobile-btn" class="md:hidden">
              <img src="{{asset('website/images/menu-line.svg')}}" alt="profile" class="w-8 h-10 rounded-full" >
            </button>
                   @endauth 
               
                   @endif
            
            
        </div>

        <div class="md:hidden">
            <div id="mobile-menu"
                class="absolute flex hidden flex-col items-center space-y-4 font-bold bg-gray-50 py-8 left-6 right-6 drop-shadow-lg border-gray-300">
                <a href="{{url('/')}}" class=" ">الرئيسية </a>
                <a href="{{url('jobClient')}}" class=" ">وظائف </a>
                <a href="{{url('courseClient')}}" class=" ">دورات أونلاين</a>
                <a href="{{url('specialities')}}" class=" ">دليل التخصصات</a>
                <a href="{{url('viewOrganizations')}}" class=" ">دليل المؤسسات</a>
                @if (Route::has('login'))
                @auth
                <form action="{{url('logoutWebsite')}}" class="m-4" method="post">
                    @csrf
                    <button type="submit" class="text-white font-bold text-xl bg-lime-500 rounded-lg px-2 py-1 hover:bg-lime-400 "> تسجيل خروج</button>
                   </form>
                   @endauth 
                   @endif
            </div>

        </div>
 
    </nav>
    <hr>
 
    @yield('body')

    <footer id="footer" class="bg-slate-900 mt-8">
        <div
            class="container mx-auto flex flex-col-reverse items-center justify-evenly space-y-12 md:space-y-2 md:items-start md:flex-row  text-white px-5 py-10">
            <div class="mt-4">
                <h1 class="font-bold text-xl md:text-2xl text-center">دليل {{date("Y")}} © حقوق النشر محفوظة</h1>
            </div>
            <div class="flex m-11">
                <h1 class="font-bold text-xl md:text-2xl mx-4">تواصل معنا</h1>
                {{-- <a href="mailto:{{$_COOKIE['email']}}" class="w-6 bg-white mx-2"><img src="{{ asset('website/images/mail-line.svg')}}" alt=""></a> --}}
                {{-- <a href="tel:{{$_COOKIE['phone']}}" class="w-6 bg-white mx-2"><img src="{{ asset('website/images/phone-fill.svg')}}" alt=""></a> --}}
            </div>
        </div>
    </footer>
    <script>
        const mobileBtn = document.getElementById("mobile-btn");
        const mobileMenu = document.getElementById("mobile-menu");
        mobileBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

    </script>
</body>

</html>