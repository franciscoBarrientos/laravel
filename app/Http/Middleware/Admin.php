<?php

namespace Veterinaria\Http\Middleware;

use Closure;
use Session;
use Illuminate\Contracts\Auth\Guard;
use Veterinaria\Administrator;

class Admin
{
    protected $auth;

    public function __construct(Guard $auth){
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $administrators = Administrator::all();

        $flag = 0;

        foreach($administrators as $administrator){
            if($administrator->user_id == $this->auth->user()->id){
                $flag = 1;
            }
        }

        if($flag == 0){
            Session::flash('message-error','Sin privilegios de administrador');
            return redirect()->to('home');
        }

        return $next($request);
    }
}
