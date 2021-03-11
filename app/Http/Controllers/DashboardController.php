<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(!Auth::user()){
            return redirect()->route('logout');
        }
        if(auth()->user())
        {
           
            switch(auth()->user()->role)
            {
                
                case '1': 
                    return $this->dev();
                    break;
                    
                case '2': 
                    return $this->admin();
                    break;
                    
                case '3': 
                  //  if($prefix != "user") return redirect()->route('userDashboard');
                    return $this->client();
                    break;
                    
                case '4': 
                    return $this->editor();
                    break;
                case '5':
                    return $this->logistics();
                    break;
                default:
                    return redirect()->route('logout'); 
                    //return $this->client();
                    break;         
            }
            
        } else{     
            return redirect()->route('login');    
        }
    }
    private function dev()
    {
        
        return view('admin.dashboards.dev');    
    }
    
    
    private function admin()
    { 
        return view('admin.dashboards.admin');  
    }

    private function editor()
    {   
        return view('admin.dashboards.editor');  
    }
    
    
       private function logistics(){

        return view('admin.dashboards.Logistics');
    }

    public function client()
    {
        return view('admin.dashboard.clients');
    }

}
