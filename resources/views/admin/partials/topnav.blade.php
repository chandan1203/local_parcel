<!-- START X-NAVIGATION VERTICAL -->
    <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
        <!-- TOGGLE NAVIGATION -->
        <li class="xn-icon-button">
            <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
        </li>
        <!-- END TOGGLE NAVIGATION -->
        
        <!--MY PROFILE-->
        <li class="xn-openable nav-profile pull-right">
            <a href="#"><img src="@if(auth()->user()){{auth()->user()->user_photo}} @else @endif" > @if(auth()->user()){{auth()->user()->name}} @endif</a>
            <ul>                            
                <li>
                    <a href="">My Profile</a>
                </li>
                <li>
                    <a href="">Change Password</a>
                </li>
                <li>
                    <a href="#" class="mb-control" data-box="#mb-signout">
                        Logout <span class="fa fa-sign-out"></span>
                    </a> 
                </li>                            
            </ul>
        </li>
        <!--MY PROFILE ENDS HERE-->
        
        
    </ul>
    <!-- END X-NAVIGATION VERTICAL -->  