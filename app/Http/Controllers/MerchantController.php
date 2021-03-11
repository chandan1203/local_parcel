<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Merchant\AuthenticationService;
use App\Services\Merchant\ShopService;
use App\Services\Merchant\CreateParcelService;
use Exception;
use Session;



//Use Alert;
use RealRashid\SweetAlert\Facades\Alert;


class MerchantController extends Controller
{

    protected $authService;
    protected $ShopService;
    protected $CreateParcelService;

    public function __construct(AuthenticationService $authenticationService, ShopService $ShopService, CreateParcelService $CreateParcelService)
    {
        $this->authService =  $authenticationService;
        $this->ShopService = $ShopService;
        $this->CreateParcelService = $CreateParcelService;
    }

    public function index()
    {
        return view('Dashboard.marchant-home');
    }

    public function signup()
    {

        return view('Landing.sign-up');
    }

    public function postSignup(Request $request)
    {
        $data =  $request->all();
        $phone = $request->get('phone');
        $code = $request->get("code");
        $password = $request->get('password');
        $confirmPassword = $request->get('confirm_password');
        $acknowledge = $request->get('acknowlege');

        if ($password == $confirmPassword && Session::get('code') == $code) {
            $data =  $request->all();
            $status = $this->authService->postSignup($data);

            if ($status == "success") {
                return view('Parcel.merchant-registration-form');
            }
        }
    }


    public function merchantRegister()
    {
        return view('Parcel.merchant-registration-form');
    }

    public function merchantRegisterSubmit(Request $request)
    {
        try {
            $data = $request->all();
            $status = $this->authService->merchantRegistration($data);
            if ($status == "success") {
                return view('Dashboard.marchant-home');
            }
        } catch (Exception $e) {
            Alert::error('Opps', $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }
    }

    public function sendSigninOTP(Request $request)
    {

        $number = $request->number;
        $data = $this->authService->sendSignUpOtp($number);
        return $data;
    }

    public function myShop()
    {

        $shopInfo = $this->ShopService->getAllShop();
        return view("Dashboard.my-shop")->with('shopinfo', $shopInfo);
    }

    public function findShop($id)
    {
        $shopData = $this->ShopService->findshop($id);
        return $shopData;
    }

    public function updateShop(Request $request)
    {
        $data = $request->all();
        $shopData = $this->ShopService->updateShop($data);
        return $shopData;
    }

    public function createMyShop(Request $request)
    {
        $data = $request->all();
        $shopData  =  $this->ShopService->createShop($data);
        return "success";
        //dd($request->all());
    }

    public function getCreateParcel()
    {
        $activeShop =$this->ShopService->activeShop();
        $charges= $this->ShopService->charges();
        return view('Parcel.create-parcel');
    }

    public function createParcel()
    {
    }
}
