
<?php
            $navrole = App\NavRole::where('role_id',Auth::user()->role)->first();
            $leftnav_parent = $navrole->auth()->parent()->leftnav()->active()->get();
            $leftnav_child  = $navrole->auth()->child()->leftnav()->active()->get();

            $topnav_parent  = $navrole->public()->parent()->topnav()->active()->get();
            $topnav_child   = $navrole->public()->child()->topnav()->active()->get();

            // $permissions    = auth()->user()->roles()->first()->permissions()->lists('permissions.name', 'permissions.id');

            session(['leftnav_parent' => $leftnav_parent, 'leftnav_child' => $leftnav_child]);
            session(['topnav_parent' => $topnav_parent, 'topnav_child' => $topnav_child]);


    $leftnav_parents    = session('leftnav_parent');
    $leftnav_children   = json_decode(json_encode(session('leftnav_child')), true);
?>

<!-- START PAGE SIDEBAR -->
<div class="bg-light border-right  col sidebar" id="sidebar-wrapper">
    <!-- START X-NAVIGATION -->
        <div class="list-group list-group-flush">
        @if($leftnav_parents)
            @foreach($leftnav_parents as $nav)
                @if(array_search($nav->id, array_column($leftnav_children,'parent')) > -1)
                <a href="#homeSubmenu{{$nav->id}}" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action"> <span class="item-logo"><i class="{{$nav->icon}}"></i></span> {{ $nav->name  }}</a>
                <ul class="collapse sub-menu" id="homeSubmenu{{$nav->id}}">
                    @foreach($leftnav_children as $child)
                        @if($child['parent'] == $nav->id)
                            <li><a href="{{url($child['route'])}}"><span class="{{$child['icon']}} child-nav"></span>{{$child['name']}}</a></li>
                        @endif
                    @endforeach
                </ul>

                @else
                        <a href="{{$nav->route}}" class="list-group-item list-group-item-action" aria-expanded="false"><span class="{{$nav->icon}}"></span> <span class="item-logo">{{$nav->name}}</span></a>
                @endif
            @endforeach
        @endif
        <a href="{{ route('logout') }}" class="list-group-item list-group-item-action  "> <span class="item-logo"> <img src="{{asset('image/home/log-out.png')}}" class="img-fluid"></span> Sign Out</a>
        </div>
</div>
    <!-- END X-NAVIGATION -->

<!-- END PAGE SIDEBAR -->

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

