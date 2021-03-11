<?php

namespace App\Repositories;

use App\MerchantInfo;
use Auth;


class MerchantInfoRepository
{

        /**      
     * @var Model      
     */
    protected $user;

    /**      
     * BaseRepository constructor.      
     *      
     * @param Model $model      
     */
 /**
     * @param array $attributes
     *
     * @return Model
     */
    public function createMerchantInfo($data)
    {

        $bussinessName = $data['bussiness-name'];
        $bussinessType = $data['bussiness-type'];
        $bussinessPhone = $data['company-phone'];
        $bussinessEmail = $data['bussiness-email'];
        $bussinessWebsite = $data['bussiness-website'];
        $bussinessAddress = $data['bussiness-address'];
        $district = $data['district'];
        $thana = $data['thana'];
        $keyContact = $data['key-contact'];
        $KeyPhone = $data['key-phone'];
        $designation = $data['designation'];

        $nidFront = $data['nid-front'];
        $nidBack  = $data['nidback'];

        if(array_key_exists('bussiness-logo', $data)){

            $logo = $data['bussiness-logo'];
        }
        else{
            $logo = "";
        }
      







        if ($nidFront &&  $nidBack) {


            $nid1 = date('Ymdhis') . '.' .  $nidFront->getClientOriginalExtension();
            $nid2 = date('Ymdhis') . '.' .  $nidBack->getClientOriginalExtension();

            if ($nidFront->move(public_path() . '/image/MerchantInfo/', $nid1)) {

                $nidFront = '/image/MerchantInfo/' . $nid1;
            }

            if ($nidBack ->move(public_path() . '/image/MerchantInfo/', $nid2)) {

                $nidBack = '/image/MerchantInfo/' . $nid2;
            }
        }

        if( $logo != "" ){

            $logo1= date('Ymdhis') . '.' .  $logo->getClientOriginalExtension();
            if ($logo->move(public_path() . '/image/MerchantInfo/', $logo1)) {

                $logo = '/image/MerchantInfo/' . $logo1;
            }
        }else{

            $logo ="";
        }

        


        MerchantInfo::create([
            'business_name' => $bussinessName,
            'business_type' => $bussinessType,
            'contact_number' => $bussinessPhone,
            'website' => $bussinessWebsite,
            'details_address' => $bussinessAddress,
            'district' =>  $district,
            'thana' =>  $thana,
            'nid_front' => $nidFront,
            'nid_back' => $nidBack,
            'user_id' => Auth::user()->id,
            'secondary_contact_number' => $KeyPhone,
            'key_contact_name' => $keyContact,
            'designation' => $designation,
            'logo' =>  $logo,
            'email'=> $bussinessEmail,
         
        ]);


        return "success";

     
    }
}
