<?php

namespace App\Services\Merchant;


use App\Services\SmsService;

use App\Repositories\UserRepository;
use App\Repositories\MerchantInfoRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Session;


class AuthenticationService
{

    protected $UserRepository;
    protected $MerchantInfoRepository;

    public function __construct(UserRepository $UserRepository, MerchantInfoRepository $MerchantInfoRepository  )
    {
        $this->UserRepository = $UserRepository;
        $this->MerchantInfoRepository = $MerchantInfoRepository;
    }

    public function  sendSignUpOtp($number)
    {

        $sms = app(SmsService::class);
        $random_number = rand(1000, 9999);
        Session::put('code', $random_number);
        // $body = " your Phone verification code is " . $random_number;
        $phone_number  = $sms->send($number, $random_number);
        return "success";
    }

    public function postSignup($data)
    {
        $status = $this->UserRepository->create($data);
        return  $status;
    }


    public function merchantRegistration( $data){

        $validator = Validator::make($data,[
            'bussiness-name' => 'required',
            'bussiness-type' => 'required',
            'company-phone' => 'required|numeric',
        //    'bussiness-website' => 'required',
            'bussiness-address' => 'required',
            'bussiness-email' => 'required',
            'district' => 'required',
            'thana' => 'required',
            'key-contact' => 'required',
            'key-phone' => 'required',
            'designation' => 'required',
            'nid-front' => 'required',
            'nidback' => 'required',

        ]);


        if($validator->fails()){

            throw new InvalidArgumentException($validator->errors()->first());
        }

        $status = $this->MerchantInfoRepository->createMerchantInfo($data);

        return $status;


    }


}
