<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;

use App\Http\Controllers\Controller;
use App\User;
use App\Offer;
use App\AwsProductPayment;
use App\GiftProduct;
use Storage;
use Excel;
use Validator;
use Auth;
use STDclass;
use Session;
use Redirect;
use DB;


class Users extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view( 'admin.users.index', [ 'users' => User::buyerTraveler()->latest()->paginate(20) ]);
        
    }
    
    
    /**
     * Display a listing of the Buyers and Travelers (Role = 3).
     *
     * @return Response
     */
    public function buyersTravelers()
    {
        return view( 'admin.users.buyers-travelers', [ 'users' => User::buyerTraveler()->latest()->paginate(20) ]);
        
    }
    
    
    /**
     * Display a listing of the Buyers and Travelers (Role = 3).
     *
     * @return Response
     */
    public function viewAdmins()
    {
        dd('chandan');
        $users = User::admins()->latest()->paginate(20);
        return view( 'admin.users.admin-list',compact('users'));
        
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function createBuyersTravelers()
    {
        
        return view('admin.users.create-buyer-traveler');
    
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function createAdmins()
    {
        
        return view('admin.users.create-admins');
    
    }
    
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('picture'))
        {
            if($request->file('picture')->isValid())
            {

                $photo  = date('Ymdhis').'.'.$request->file('picture')->getClientOriginalExtension();
                
                if($request->file('picture')->move(public_path().'/img/users/', $photo))
                {
                    
                    $request['user_photo'] = '/public/img/users/'.$photo;
                    
                }
                
            }
                        
        }

        $request['name'] = $request->input('firstname')." ".$request->input('lastname');
        
        if(User::create($request->all()))
        {
            
            return redirect(action('Users@index'));
            
        } else
        {
            
            return back()->withErrors('Failed to process request.')->withInput();
            
        }
        
    
    }
    
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
        return view('admin.users.show', ['user'=>User::find($id)]);
        
    }
    
    
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        
        return view('admin.users.edit', ['user'=>User::find($id) , 'roles'=> \App\Role::all() ]);
        
    }


     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function buyersTravelerLogin($id)
    {
        if((auth()->user()->role==1 || auth()->user()->role==2) && Auth::id()):

            if($data = User::find($id)){

               if(Auth::loginUsingId($id, true)){

                   /* return [
                        'status' => 'success',
                        'message' => 'Sign up has been sucessful. Redirecting you to login page.',
                        'url' => route('home')
                       // 'url' => route('login')
                    ];*/

                    //echo'ok';

                   return redirect()->action('StaticPageController@home')->withErrors('Please try again....');
               }else{
               return back()->withErrors('Failed to login. Please retry.');     
               }
            }else{
             return back()->withErrors('Failed to login. Please retry.');     
            }
        else:
          return back()->withErrors('Failed to login. Please retry.');       
        endif;


       // return view('admin.users.show', ['user'=>User::find($id)]);
        
    }
    
    
    
    

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        
        if( 
            
            User::where( ['id' => $id, 'email' => $request->email] )->count() == 1
            
            ||
            
            User::where( 'id', '!=', $id )->where( 'email', $request->email )->count() == 0
        
        )
        {
            
            
            if(!$request->input('password')) unset($request['password']);
            
            $request['name'] = $request->input('firstname')." ".$request->input('lastname');
            
            if($request->hasFile('picture'))
            {
                if($request->file('picture')->isValid())
                {
    
                    if(Storage::has(User::find($id)->user_photo))
                    {
                        
                        Storage::delete(User::find($id)->user_photo);
                        
                    }
                    
                    $photo  = date('Ymdhis').'.'.$request->file('picture')->getClientOriginalExtension();
                    
                    if($request->file('picture')->move(public_path().'/img/users/', $photo))
                    {
                        
                        $request['user_photo'] = '/public/img/users/'.$photo;
                        
                    }
                    
                }
                            
            }
            
            if(User::find($id)->update($request->all()))
            {
            
                return back()->withErrors('Request processed successfully');
            
            } else{
                
                return back()->withErrors('Failed to update record. Please retry.');
                
            }
            
        } else{
            
            return back()->withErrors('Email address is already in use. Please try another one.');
            
        }
        
        
    }
    
    
    
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        
        /**
        *
        *
        *   If User is found, remove it.
        * 
        * 
        */

        if(auth()->user()->role==1){
         
            if(User::find($request->id)->delete())
            {
                
                return back()->withErrors('Success');
                
            } else{
                
                return back()->withErrors('Failed to delete the user');
                
            }
        }

        return back()->withErrors('Failed to delete the user');
        
        
    }
    
    
    public function postSearch(Request $request)
    {
        
        $users = new User;
        
        (strlen($request->input('name')) > 0) ? $users = $users->where('name', 'like', '%'.$request->input('name').'%') : false;
        (strlen($request->input('email')) > 0) ? $users = $users->where('email', 'like', '%'.$request->input('email').'%') : false;
        (strlen($request->input('phone')) > 0) ? $users = $users->where('contact', 'like', '%'.$request->input('phone').'%') : false;
        (strlen($request->input('address')) > 0) ? $users = $users->where('address', 'like', '%'.$request->input('address').'%') : false;
        //(strlen($request->input('role')) > 0) ? $users = $users->where('role', $request->input('role')) : false;
        (strlen($request->input('country_id')) > 0) ? $users = $users->where('country_id', $request->input('country_id')) : false;
        (strlen($request->input('active')) > 0) ? $users = $users->where('active', $request->input('active')) : false;
        
        $users = $users->where('role',3);
        $users = $users->latest()->paginate(20);
        
        return view( 'admin.users.index', compact('users') );
    }
    public function productsSearch(Request $request)
    {
        $search = array_filter($request->all());
        unset($search['_token']);

        // $products = new GiftProduct;

        $products = DB::table("gift_products")
            ->leftjoin('gift_sub_category', 'gift_sub_category.id', '=', 'gift_products.product_sub_category')
            // ->select('gift_sub_category.*' , "gift_sub_category.name as sub_category_name")
            ->leftjoin('gift_category', 'gift_category.id', '=', 'gift_products.product_category')
            ->select('gift_products.*', 'gift_category.*', 'gift_sub_category.*', 'gift_products.id as product_id', "gift_category.name as category_name", "gift_sub_category.name as sub_category_name");

        if($request->has('product_name') && $request->product_name !=''){
            $products->where('gift_products.product_name', 'like', '%'. $request->product_name. '%');
        }

        $products = $products->paginate(20);
        
        return view('admin.giftpanel.gift_product_list', compact('products'));
    }
    public function productsGiftSearch(Request $request)
    {
        $search = array_filter($request->all());
        unset($search['_token']);

        // $giftItem = new GiftProduct;

        // $giftItem = DB::table('payment_pre_orders');
        
        // (strlen($request->input('product_name')) > 0) ? $giftItem = $giftItem->where('product_name', 'like', '%'.$request->input('product_name').'%') : false;

        // (strlen($request->input('invoice_no')) > 0) ? $giftItem = $giftItem->where('invoice_no', 'like', '%'.$request->input('invoice_no').'%') : false;

        $giftItem = DB::table('payment_pre_orders')->leftjoin('buyers', 'buyers.id', '=', 'payment_pre_orders.buyer_id')
            ->leftjoin('gift_products', 'gift_products.id', '=', 'buyers.product_id')
            ->leftjoin('users', 'users.id', '=', 'buyers.user_id')
            ->leftjoin('gift_category', 'gift_category.id', '=', 'gift_products.product_category')
            ->leftjoin('gift_sub_category', 'gift_sub_category.id', '=', 'gift_products.product_sub_category')
            ->select('payment_pre_orders.*', 'payment_pre_orders.status as payment_status','payment_pre_orders.created_at as payment_created' ,'buyers.*', 'gift_products.*', 'users.name as name', 'users.email as email', 'users.contact as phone', 'gift_category.name as catname','gift_sub_category.name as subcat')
            ->where('buyers.gift_status', 1)
            ->orderby('payment_pre_orders.id', 'desc');

        // dd($giftItem);

        if($request->has('product_name') && $request->product_name !=''){
            $giftItem->where('payment_pre_orders.product_name', 'like', '%'. $request->product_name. '%');
        }
        if($request->has('invoice_no') && $request->invoice_no !=''){
            $giftItem->where('payment_pre_orders.invoice_no', 'like', '%'. $request->invoice_no. '%');
        }

        
        // $giftItem->orderby('payment_pre_orders.id', 'desc');
            

        

        $giftItem = $giftItem->paginate(20);
        
        return view('admin.giftpanel.gift_order', compact('giftItem'));
    }
    
    
    public function ajaxSearch($param)
    {
        
        return \App\User::where('name', 'like', '%'.$param.'%')->orWhere('email', 'like', '%'.$param.'%')->select('id', 'name as text')->take(20)->get()->toArray();
        
    }
    
    
    public function getExport()
    {
        
        return view('admin.users.export');
        
    }
    
    
    public function postExport(Request $request, User $users)
    {

        $users = $users->where('role', 3);
        
        ( strlen(trim( $request->input('joined_after') )) > 0 ) ? $users = $users->where('users.created_at', '>', trim($request->input('joined_after')).' 00:00:00') : false;
        ( strlen(trim( $request->input('joined_before') )) > 0 ) ? $users = $users->where('users.created_at', '<', trim($request->input('joined_before')).' 23:59:59') : false;



        $format = ( $request->has('format') ) ? $request->input('format') : 'csv' ;
        
        $users = $users ->select('email','name')
                        ->take(10000)
                        ->get();
                        
        
        return Excel::create('buyers_travelers', function($excel) use($users) {
            
            // Set the title
            $excel->setTitle('Airposted Buyers and Travelers');
        
            // Chain the setters
            $excel->setCreator('Airposted')
                  ->setCompany('Airposted');
        
            // Call them separately
            $excel->setDescription('Users data of Airposted users');
            
            $excel->sheet('user_data', function($sheet) use($users) {
                
                $sheet  ->fromArray($users)
                        ->setFreeze('A2')
                        ->setAutoFilter();
                
            });
            
        })->download( $format );
        
    }


    public function getPurchasedExport()
    {
        
        return view('admin.users.export_purchased');
        
    }


     public function postPurchasedExport(Request $request, Offer $offers)
    {

        $start_date = $request->input('joined_after').' 00:00:01';
        $end_date = $request->input('joined_before').' 23:59:59';


        $format = 'csv' ;      
        $offers =   $offers->select('offers.id','offers.device_type','payment_pre_orders.invoice_no','buyers.name as buyer_name','travelers.name as traveler_name','offers.offer_price as product_price','offers.transaction_charge as traveler_earn', 'airposted_commission as airposted_earn','offers.product_price as total_payment','payment_pre_orders.created_at as order_payment_date','offers.created_at as offer_accepted_date','offers.name as product_name','offers.link as product_link','offers.image_url as product_image_url');

        $offers =   $offers->leftjoin('payment_pre_orders','payment_pre_orders.buyer_id','=','offers.buyers_id');
        $offers =   $offers->leftjoin('users as buyers','buyers.id','=','offers.buyer_id');
        $offers =   $offers->leftjoin('users as travelers','travelers.id','=','offers.traveller_id');

        if( $request->input('joined_after'))
        $offers = $offers->where('offers.created_at', '>=', $start_date);

        if( $request->input('joined_before'))
        $offers = $offers->where('offers.created_at', '<=', $end_date);

        $offers =   $offers->where('payment_pre_orders.payment_type','=',2)->get();


        //pr($offers->count(),1);


        if( $offers->count()):
            foreach ($offers as $key => $orders) {

                if($orders->device_type==2){
                    $orders->device_type='APP';
                    
                }else{
                    $orders->device_type='WEB';
                } 

                //if($orders->airposted_earn == 0.00){
                $orders->airposted_earn = ($orders->total_payment - ($orders->product_price + $orders->traveler_earn));
               // }      
            }


            return Excel::create('airposted_purchased_product_list', function($excel) use($offers) {
            
            // Set the title
            $excel->setTitle('Airposted Offer\'s Product List');
        
            // Chain the setters
            $excel->setCreator('Airposted')
                  ->setCompany('Airposted');
        
            // Call them separately
            $excel->setDescription('Airposted purchased Product List that had been accepted by traveler');
            
            $excel->sheet('user_data', function($sheet) use($offers) {
                
                $sheet  ->fromArray($offers)
                        ->setFreeze('A2')
                        ->setAutoFilter();
                
            });
                
            })->download($format);
        else:    

          return back()->withInput()->withErrors('No data found, Please try again....');  

        endif;


       // pr($offers,1 );
    }



    public function getPaymentExport()
    {
        
        return view('admin.users.export_payment');
        
    }


     public function postPaymentExport(Request $request, AwsProductPayment $payments)
    {

        $start_date = $request->input('joined_after').' 00:00:01';
        $end_date = $request->input('joined_before').' 23:59:59';


        $format = 'csv' ;      
        $payments =   $payments->select(
            'payment_pre_orders.created_at as order_date',
            'payment_pre_orders.*',
            'products.qty as Product_quantity_no',
            

            'products.remarks as shopper_remarks',
            'products.traveler_note as shopper_note_for_traveler',
            'products.is_deal as purchase_poduct_type',

            'from_countries.name as from_contry_name',
            'to_countries.name as to_contry_name',
            'buyers.name as shopper_name',
            'buyers.email as shopper_email',
            'buyers.contact as shopper_contact',
            'updated_user.name as last_updated_user_name',
            'updated_user.email as last_updated_user_email',
            'updated_user.contact as last_updated_user_contact',
            'accept_user.name as manual_accepted_name',
            'accept_user.email as manual_accepted_email',
            'accept_user.contact as manual_accepted_contact', 
            'payment_pre_orders.manual_accept_type as manual_accepted_type',
            'payment_pre_orders.manual_accept_note as manual_accepted_note',
            'payment_pre_orders.manual_accept_date as manual_accepted_date',
            'payment_pre_orders.created_at as payment_date',
            'payment_pre_orders.updated_at as last_updated_date',
            'products.amazon_url as Product_url_name' 
        );

        $payments =   $payments->leftjoin('buyers as products','products.id','=','payment_pre_orders.buyer_id');
        $payments =   $payments->leftjoin('countries as from_countries','from_countries.id','=','payment_pre_orders.from_country');
        $payments =   $payments->leftjoin('countries as to_countries','to_countries.id','=','payment_pre_orders.to_country');
        $payments =   $payments->leftjoin('users as buyers','buyers.id','=','payment_pre_orders.user_id');
        $payments =   $payments->leftjoin('users as updated_user','updated_user.id','=','payment_pre_orders.updated_by');
        $payments =   $payments->leftjoin('users as accept_user','accept_user.id','=','payment_pre_orders.manual_accept_by');

        if( $request->input('joined_after'))
        $payments = $payments->where('payment_pre_orders.created_at', '>=', $start_date);

        if( $request->input('joined_before'))
        $payments = $payments->where('payment_pre_orders.created_at', '<=', $end_date);


        if( $request->input('shipping'))
         $payments =   $payments->where('payment_pre_orders.shipping_status','=', $request->input('shipping')-1);

        if( $request->input('status'))
         $payments =   $payments->where('payment_pre_orders.payment_type','=', $request->input('status'));

       
        $payments =   $payments->get();

       // pr($payments->count(),1);

        
       

        if( $payments->count()):
            foreach ($payments as $key => $orders) {

                if($orders->device_type==2){
                    $orders->device_type='APP';
                    
                }else{
                    $orders->device_type='WEB';
                } 

                if($orders->payment_type==1){
                    $orders->payment_type='Unpaid';
                }elseif($orders->payment_type==2){
                    $orders->payment_type='Paid and Verified';   
                }else{
                    $orders->payment_type='Cancelled';
                }


                if($orders->shipping_status==0){
                    $orders->shipping_status='Pending';
                }elseif($orders->shipping_status==1){
                    $orders->shipping_status='Processing';   
                }elseif($orders->shipping_status==2){
                    $orders->shipping_status='Shipped';   
                }elseif($orders->shipping_status==3){
                    $orders->shipping_status='Arrived';   
                }elseif($orders->shipping_status==4){
                    $orders->shipping_status='Delivered';   
                }elseif($orders->shipping_status==5){
                    $orders->shipping_status='Cancelled';   
                }elseif($orders->shipping_status==7){
                    $orders->shipping_status='Arrived at New York Off.';   
                }elseif($orders->shipping_status==8){
                    $orders->shipping_status='Arrived at Chicago Off.';   
                }


                if($orders->manual_accepted_type==''){
                    $orders->manual_accepted_type='N/A';
                }elseif($orders->manual_accepted_type==1){
                    $orders->manual_accepted_type='Cash Deposit';   
                }elseif($orders->manual_accepted_type==2){
                    $orders->manual_accepted_type='Bank Deposit BD';   
                }elseif($orders->manual_accepted_type==7){
                    $orders->manual_accepted_type='Bank Deposit US';   
                }elseif($orders->manual_accepted_type==3){
                    $orders->manual_accepted_type='Bkash';   
                }elseif($orders->manual_accepted_type==4){
                    $orders->manual_accepted_type='Rocket';   
                }elseif($orders->manual_accepted_type==5){
                    $orders->manual_accepted_type='Bd Smart';   
                }elseif($orders->manual_accepted_type==6){
                    $orders->manual_accepted_type='Other Internet Banking';   
                }elseif($orders->manual_accepted_type==8){
                    $orders->manual_accepted_type='Cash On Delivery (COD)';   
                }


                if($orders->purchase_poduct_type==1){
                    $orders->purchase_poduct_type='Hot deal product';
                    
                }else{
                    $orders->purchase_poduct_type='Regular product';
                } 



                unset($orders->buyer_id);unset($orders->manual_accept_by);unset($orders->user_id);unset($orders->updated_by);
                unset($orders->published_date);unset($orders->from_country);unset($orders->to_country);
                unset($orders->manual_accept_type);unset($orders->manual_accept_note);unset($orders->manual_accept_date);
                unset($orders->created_at);unset($orders->updated_at);unset($orders->status);unset($orders->coupon_code);
                unset($orders->transaction_fees);unset($orders->total_transaction_fees);unset($orders->total_transaction_fees);
                unset($orders->gateway_id);unset($orders->gateway_payment_id);unset($orders->gateway_payer_id);unset($orders->gateway_logs);
            }

            //pr($payments,1);

            return Excel::create('airposted_product_payment_list', function($excel) use($payments) {
            
            // Set the title
            $excel->setTitle('Airposted Product List');
        
            // Chain the setters
            $excel->setCreator('Airposted')
                  ->setCompany('Airposted');
        
            // Call them separately
            $excel->setDescription('Airposted Product List that had been paid by shopper');
            
            $excel->sheet('user_data', function($sheet) use($payments) {
                
                $sheet  ->fromArray($payments)
                        ->setFreeze('A2')
                        ->setAutoFilter();
                
            });
                
            })->download($format);
        else:    

          return back()->withInput()->withErrors('No data found, Please try again....');  

        endif;


       // pr($offers,1 );
    }
    
}
