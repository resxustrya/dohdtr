
<div class="header" style="background-color:#00CC99;padding:0px;">
    <div class="container">
        <img src="{{ asset('resources/img/ro7.png') }}" class="img-responsive center-block"  style="height: 150px;"/>
    </div>
</div>
<nav id="main-nav" role="navigation" class="text-center container-fluid">
    <input id="main-menu-state" type="checkbox" />
    <label class="main-menu-btn" for="main-menu-state">
        <span class="main-menu-btn-icon"></span>Toggle menu
    </label>
    <ul id="main-menu" class="sm sm-mint">
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DTR<span class="caret"></span></a>
            <ul>
                <li><a href="{{ asset('attendance')  }}">Attendance</a></li>
                <li><a href="{{ asset('print') }}">Print Attendance</a> </li>
                <li><a href="">Leave</a>
                    <ul>
                        <li><a href="{{ asset('cdo') }}">CDO</a></li>
                        <li><a href="{{ asset('sickness') }}">Sickness leave</a></li>
                        <li><a href="{{ asset('vication') }}">Vication leave</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
            <ul>
                <li><a href="#">Account Settings</a></li>
                <li><a href="{{ asset('user') }}">Users</a></li>
                <li><a href="{{ asset('logout') }}">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
