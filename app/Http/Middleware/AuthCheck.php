<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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
        $confirm = "";
        $forCon= $request->path();
        $elements = explode('/',$forCon);
        
        foreach ($elements as $element) {
            if ($element == "confirm_password") {
                $confirm = $element;
            }
        }

        if(session()->has('UserId') && $request->path() == 'visitor' ){
        	return Redirect::route('userhome');
        }

      

        if(!session()->has('UserId') && ($request->path() != 'login' && $request->path() != 'scholar/create' && $request->path() != 'scholar' && $request->path() != 'forgot_password' && $request->url() != 'confirm_password' && $confirm != "confirm_password")){

            return redirect('/login')->with('needlog','You need to log in first or create new account by clicking ');
        }

        if(session()->has('UserId') && ($request->path() == 'login' || $request->path() == 'scholar/create' || $request->path() == "forgot_password" || $request->path() == "reset_password" || $request->path() == "validate_password" || $confirm == "confirm_password") ){
            return back();
        }

        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate'    )
            ->header('Pragma','no-cache')
            ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
