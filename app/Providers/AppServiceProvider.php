<?php

namespace App\Providers;

use App\Models\JobCourse;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // User::checkUsers();
        Paginator::useBootstrap();

        // $user = User::where('status', '=', 'admin')->first();
        // setcookie('email', $user->email);
        // setcookie('phone', $user->phone);

        // $request = JobCourse::where('accept', '=', 0)
        //     ->where('see', '=', 0)->get();
        // setcookie('requestAdmin', count($request));
        // $acceptAdmin = JobCourse::where('accept', '=', 1)
        //     ->where('process_number', '!=', null)->get();
        // setcookie('acceptAdmin', count($acceptAdmin));
        // $acceptAdmin = JobCourse::where('accept', '=', 1)
        //     ->where('see', '=', 0)->get();
        // setcookie('acceptCompany', count($acceptAdmin));
    }
}
