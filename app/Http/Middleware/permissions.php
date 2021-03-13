<?php

namespace App\Http\Middleware;



use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class Permissions
{

    private $route;
    private $is_controlled_access = false;


    public function __construct(\Illuminate\Routing\Router $route)
    {

        $this->route = $route;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        if (Auth::user()->role == 2) {
            return Redirect::to('http://localhost:8000/');
        } elseif (Auth::user()->role == 4 || Auth::user()->role == 5) {

            $permission = DB::table('permission_role')->where('role_id', Auth::user()->role)->get();

            //dd($permission);
            $per_list = [];
            for ($i = 0; $i < count($permission); $i++) {
                $per_list[] = $permission[$i]->permission_id;
            }
            // $list = [];
            // foreach($per_list as $per_lists){
            //     $list[] = DB::table('permissions')->where('id',$per_lists)->first()->name;
            //     if(DB::table('permissions')->where('id',$per_lists)->first()->name == app('request')->route()->getAction()['controller']){
            //         $this->is_controlled_access = true;
            //     }

            // }


            for ($j = 0; $j < count($per_list); $j++) {
                $list[] = DB::table('permissions')->where('id', $per_list[$j])->first()->name;
                if ($list[$j] === app('request')->route()->getAction()['controller']) {
                    $this->is_controlled_access = true;
                }
            }
        } elseif (Auth::user()->role == 1 || Auth::user()->role == 3) {
            $this->is_controlled_access = true;
        }




        if ($this->is_controlled_access == true) {

            return $next($request);
        } else {

            return abort('404');
        }
    }
}
