@extends('admin.layout')

@section('main')
<section class="panel">
    <h1>
        <center>( {{ Auth::user()->firstname }}-panel)</center>
    </h1>
    {{-- <br /><br />

    <div class="row">
        
        <div class="col-md-4">

             <!-- START NEW USERS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>New Users last 12 Months</h3>
                    </div>                                    
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="user-signup-last-year-donut" ></div>
                </div>                                    
            </div>
            <!-- END NEW USERS BLOCK -->

                            
            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='{{action('Users@buyersTravelers')}}';">
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">{{\App\User::buyerTraveler()->count()}}</div>
                    <div class="widget-title">Total Users</div>
                    <div class="widget-subtitle">{{\App\User::joinedToday()->count()}} Today, {{\App\User::joinedThisWeek()->count()}} Last week, {{\App\User::joinedLastMonth()->count()}} Last 30 Days</div>
                </div>
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove section"><span class="fa fa-times"></span></a>
                </div>                            
            </div>                            
            <!-- END WIDGET REGISTRED -->
            
        </div>
        
        
        
        <div class="col-md-4">

             <!-- START NEW USERS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Payments (Paid and Verified) last 12 Months</h3>
                    </div>                                    
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="user-payments-last-year-donut" ></div>
                </div>                                    
            </div>
            <!-- END NEW USERS BLOCK -->

                            
            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='{{action('AwsProductPaymentsController@index')}}';">
                <div class="widget-item-left">
                    <span class="fa fa-money"></span>
                </div>
                <div class="widget-data">
                    
                    <div class="widget-int num-count">{{\App\AwsProductPayment::verified()->count()}} / {{\App\AwsProductPayment::count()}}</div>
                    <div class="widget-title">Total Payments</div>


                    <div class="widget-subtitle">{{\App\AwsProductPayment::today()->verified()->count()}}/{{\App\AwsProductPayment::today()->count()}} Today, {{\App\AwsProductPayment::thisWeek()->verified()->count()}}/{{\App\AwsProductPayment::thisWeek()->count()}} Last week</div>
                </div>
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove section"><span class="fa fa-times"></span></a>
                </div>                            
            </div>                            
            <!-- END WIDGET REGISTRED -->
            
        </div>

       <!--  <div class="col-md-3"> -->
                            
            <!-- START WIDGET REGISTRED -->
           <!--  <div class="widget widget-default widget-item-icon" onclick="location.href='{{action('Offers@index')}}';">
                <div class="widget-item-left">
                    <span class="fa fa-archive"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">{{\App\Offer::agreed()->notReply()->count()}} / {{\App\Offer::notReply()->count()}}</div>
                    <div class="widget-title">Total Offers</div>
                    <div class="widget-subtitle">{{\App\Offer::agreed()->notReply()->today()->count()}}/{{\App\Offer::today()->notReply()->count()}} Today, {{\App\Offer::agreed()->notReply()->thisWeek()->count()}}/{{\App\Offer::thisWeek()->notReply()->count()}} Last week</div>
                </div>
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove section"><span class="fa fa-times"></span></a>
                </div>                            
            </div>   -->                          
            <!-- END WIDGET REGISTRED -->
            
       <!--  </div> -->
        
        <!-- <div class="col-md-4"> -->
                            
            <!-- START WIDGET REGISTRED -->
            <!-- <div class="widget widget-default widget-item-icon" onclick="location.href='{{action('Buyers@index')}}';">
                <div class="widget-item-left">
                    <span class="fa fa-shopping-cart"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">{{\App\Buyer::count()}}</div>
                    <div class="widget-title">Total Buy Posts</div>
                    <div class="widget-subtitle">{{\App\Buyer::today()->count()}} Today, {{\App\Buyer::thisWeek()->count()}} Last week, {{\App\Buyer::lastMonth()->count()}} Last 30 Days</div>
                </div>
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove section"><span class="fa fa-times"></span></a>
                </div>                            
            </div>   -->                          
            <!-- END WIDGET REGISTRED -->
            
        <!-- </div> -->
        
        <div class="col-md-4">

             <!-- START NEW USERS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Travels Post last 12 Months</h3>
                    </div>                                    
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="user-travels-last-year-donut" ></div>
                </div>                                    
            </div>
            <!-- END NEW USERS BLOCK -->

                            
            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='{{action('Travels@index')}}';">
                <div class="widget-item-left">
                    <span class="fa fa-plane"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">{{\App\Travel::count()}}</div>
                    <div class="widget-title">Total Travels Post</div>
                    <div class="widget-subtitle">{{\App\Travel::today()->count()}} Today, {{\App\Travel::thisWeek()->count()}} Last week, {{\App\Travel::lastMonth()->count()}} Last 30 Days</div>
                </div>
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove section"><span class="fa fa-times"></span></a>
                </div>                            
            </div>                            
            <!-- END WIDGET REGISTRED -->
            
        </div>
        
        <div class="col-md-4">

           
                            
            <!-- START WIDGET REGISTRED -->
            <!-- <div class="widget widget-default widget-item-icon" onclick="location.href='{{action('Travels@index')}}';">
                <div class="widget-item-left">
                    <span class="fa fa-comment"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">{{\App\Chat::count()}}</div>
                    <div class="widget-title">Total Chat</div>
                    <div class="widget-subtitle">{{\App\Chat::today()->count()}} Today, {{\App\Chat::thisWeek()->count()}} Last week</div>
                </div>
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove section"><span class="fa fa-times"></span></a>
                </div>                            
            </div>    -->                         
            <!-- END WIDGET REGISTRED -->
            
        </div>
        
        
    </div>
    
    <div class="row">
        
        <div class="col-xs-12">

             <h2 class="page-heading">Monthly Graphs</h2>
                            
            <!-- START NEW USERS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>New Users last 30 days</h3>
                    </div>                                    
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="user-signup-month-graph" ></div>
                </div>                                    
            </div>
            <!-- END NEW USERS BLOCK -->
                            
        </div>


        <div class="col-xs-12">
                            
            <!-- START NEW USERS BLOCK -->
           <!--  <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>New Android/iOS App Users last 30 days </h3>
                    </div>                                    
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="user-signup-month-graph-app" ></div>
                </div>                                    
            </div> -->
            <!-- END NEW USERS BLOCK -->
                            
        </div>


                
        
        <div class="col-xs-12">
                            
            <!-- START NEW USERS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Orders last 30 days (Paid and Verified)</h3>
                    </div>                                    
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="order-month-graph-app" ></div>
                </div>                                    
            </div>
            <!-- END NEW USERS BLOCK -->
            
        </div>

        <div class="col-xs-12">
                            
            <!-- START NEW USERS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Orders last 30 days (Paid and Unpaid)</h3>
                    </div>                                    
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="order-month-graph" ></div>
                </div>                                    
            </div>
            <!-- END NEW USERS BLOCK -->
            
        </div>


        <div class="col-xs-12">
                            
            <!-- START NEW USERS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3> Customer's Orders last 30 days</h3>
                    </div>                                    
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="order-month-graph-by-user" ></div>
                </div>                                    
            </div>
            <!-- END NEW USERS BLOCK -->
            
        </div>
        
        <div class="col-xs-12">
                            
            <!-- START NEW USERS BLOCK -->
            <!-- <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Chats last 30 days</h3>
                    </div>                                    
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="chat-month-graph" ></div>
                </div>                                    
            </div> -->
            <!-- END NEW USERS BLOCK -->
            
        </div>
        
        <div class="col-xs-12">
                            
            <!-- START NEW USERS BLOCK -->
            <!-- <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Signup stat by Country</h3>
                    </div>                                    
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="users-by-country" ></div>
                </div>                                    
            </div> -->
            <!-- END NEW USERS BLOCK -->
            
        </div>
        
        <div class="col-xs-12">
                            
            <!-- START NEW USERS BLOCK -->
            <!-- <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Travels (From) by Country</h3>
                    </div>                                    
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="travel-by-country" ></div>
                </div>                                    
            </div> -->
            <!-- END NEW USERS BLOCK -->
            
        </div>
        
        <div class="col-xs-12">
                            
            <!-- START NEW USERS BLOCK -->
            <!-- <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>buys by Country</h3>
                    </div>                                    
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="buy-by-country" ></div>
                </div>                                    
            </div> -->
            <!-- END NEW USERS BLOCK -->
            
        </div>
        
        
        <div class="col-xs-12">
            <h2 class="page-heading">Yearly Graphs</h2>
            
            <!-- START NEW USERS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>New Users last 12 Months</h3>
                    </div>                                    
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="user-signup-year-graph" ></div>
                </div>                                    
            </div>
            <!-- END NEW USERS BLOCK -->
            
            <!-- START NEW USERS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Orders last 12 Months (Paid and Verified) </h3>
                    </div>                                    
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="buys-year-graph" ></div>
                </div>                                    
            </div>
            <!-- END NEW USERS BLOCK -->
            
            
            <!-- START NEW USERS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Travels Post last 12 Months</h3>
                    </div>                                    
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="travel-year-graph" ></div>
                </div>                                    
            </div>
            <!-- END NEW USERS BLOCK -->
            
            
        </div>
        
    </div>
    
    <br /> <br /> --}}
</section>

@stop