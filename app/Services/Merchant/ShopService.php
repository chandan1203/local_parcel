<?php

namespace App\Services\Merchant;


use App\Services\SmsService;

use App\Repositories\UserRepository;
use App\Repositories\MerchantShopRepo;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Session;


class ShopService
{

    protected $MerchantShopRepo;

    public function __construct(MerchantShopRepo $MerchantShopRepo)
    {
        $this->MerchantShopRepo = $MerchantShopRepo;
    }

    public function createShop($data)
    {
        $shopData = $this->MerchantShopRepo->create($data);
        return $shopData;
    }

    public function updateShop($data)
    {
        $shopData  = $this->MerchantShopRepo->updateShop($data);
        return $shopData;
    }
    public function findshop($id)
    {
        $shopData = $this->MerchantShopRepo->findShop($id);
        return $shopData;
    }

    public function getAllShop()
    {
        $shopInfo = $this->MerchantShopRepo->getAllShop();
        return $shopInfo;
    }

    public function activeShop(){
        $activeShop =  $this->MerchantShopRepo->activeShop();
        return $activeShop;
    }

    public function charges(){
        $merchantCharges =  $this->MerchantShopRepo->merchantcharges();
        return $merchantCharges;

    }
}
