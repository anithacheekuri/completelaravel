<?php

namespace App\Http\Middleware;


use Session;
use Closure;

class Test
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
       

       
            $session = $request->session()->get('user');



                if(!empty($session)){
    
            return redirect('home2');
       
                 }
                 return $next($request);
    }
}
