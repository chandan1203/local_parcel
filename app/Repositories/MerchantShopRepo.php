<?php

namespace App\Repositories;

use App\Shop;
use Auth;


class MerchantShopRepo
{


    public function getAllShop()
    {
        $shopInfo = Shop::where('user_id', Auth::user()->id)->get();
        return $shopInfo;
    }


    public function findShop($id)
    {

        $shopData = Shop::find($id)->first();
        return $shopData;
    }

    public function updateShop($data)
    {


        $logo = $data['shopLogo1'] ?? "";
        if ($logo) {
            $logo1 = date('Ymdhis') . '.' .  $logo->getClientOriginalExtension();
            if ($logo->move(public_path() . '/image/MerchantInfo/', $logo1)) {
                $logo = '/image/MerchantInfo/' . $logo1;
            }
        }

        $shopData = Shop::where('id', $data['id']);

        if ($logo != "") {
            $shopData->update([
                'name' => $data['name1'],
                'shop_type' => $data['shopType1'],
                'address' => $data['shopAddress1'],
                'hot_number' => $data['shopNumber1'],
                'user_id' => Auth::user()->id,
                'logo' =>  $logo,
                'active' => $data['shopStatus1']
            ]);
        } else {
            $shopData->update([
                'name' => $data['name1'],
                'shop_type' => $data['shopType1'],
                'address' => $data['shopAddress1'],
                'hot_number' => $data['shopNumber1'],
                'user_id' => Auth::user()->id,
                'active' => $data['shopStatus1']
            ]);
        }




        return "success";
    }

    public function create($data)
    {

        $logo = $data['shopLogo'];
        if ($logo) {
            $logo1 = date('Ymdhis') . '.' .  $logo->getClientOriginalExtension();
            if ($logo->move(public_path() . '/image/MerchantInfo/', $logo1)) {
                $logo = '/image/MerchantInfo/' . $logo1;
            }
        }


        Shop::create([
            'name' => $data['name'],
            'shop_type' => $data['shopType'],
            'address' => $data['shopAddress'],
            'hot_number' => $data['shopNumber'],
            'user_id' => Auth::user()->id,
            'logo' =>  $logo,
            'active' => $data['shopStatus']
        ]);

        return "success";
    }
 


    public function activeShop()
    {
        $id = Auth::user()->id;
        $activeShop = Shop::where('user_id', $id)->where('active', 1)->first();
        return  $activeShop;
    }

    public function merchantcharges(){
        return "ok";
    }
}
