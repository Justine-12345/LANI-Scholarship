<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       // dd($request->path());
        $confirm = "";
        $forCon= $request->path();
        $elements = explode('/',$forCon);
        
        foreach ($elements as $element) {
            if ($element == "confirm_passwordAdmin") {
                $confirm = $element;
            }
        }

        if(!session()->has('UserId') && ($request->path() != 'login/admin' && $request->path() != 'admin/create' && $request->path() != 'forgot_passwordAdmin' && $confirm != "confirm_passwordAdmin")){

            return redirect('/login/admin')->with('needlog','You need to log in first or create new account by clicking ');
        }
        if(session()->has('UserId') && ($request->path() == 'login/admin' || $request->path() == 'admin/create' || $request->path() == 'forgot_passwordAdmin' || $confirm == "confirm_passwordAdmin")){

            return back();
        }


        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate'    )
            ->header('Pragma','no-cache')
            ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
