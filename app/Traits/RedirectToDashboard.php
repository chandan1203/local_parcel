<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait RedirectToDashboard
{

    /**
     * @param Request $request
     * @return $this|false|string
     */


    public  function redirectToDashboard($role)
    {

       
        $admin     = "admin";     // admin dashboard route name 
        $merchant  = "merchant";  // merchant dashboard route name 
        $warehouse = "warehouse"; // warehouse dashboard route name
        $logistic  = "logistic";  // logistic dashboard route name

        switch ($role) {
            case '1':
                return $admin; 
            case '2':
                return $merchant;
            case '3':
                return $warehouse;
            case '4':
                return $logistic;
        }
    }
}
