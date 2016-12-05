
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
                <li><a href="{{ asset('upload')  }}">Upload file</a></li>
                <li><a href="{{ asset('list') }}">Attendance List</a> </li>
                <li><a href="#">DTR Reports</a></li>
                <li><a href="#">DTR Absences</a>
                    <ul>
                        <li><a href="">Google.com</a> </li>
                        <li><a href="">Oracle.com</a> </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Payroll<span class="caret"></span></a>
            <ul>
                <li><a href="#">Upload file</a></li>
                <li><a href="#">DTR Reports</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Employees<span class="caret"></span></a>
            <ul>
                <li><a href="#">Upload file</a></li>
                <li><a href="#">DTR Reports</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DTS<span class="caret"></span></a>
            <ul>
                <li><a href="#">Account Settings</a></li>
                <li><a href="{{ asset('logout') }}">Logout</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
            <ul>
                <li><a href="#">Account Settings</a></li>
                <li><a href="{{ asset('logout') }}">Logout</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Purchase Request<span class="caret"></span></a>
            <ul>
                <li><a href="#">Account Settings</a></li>
                <li><a href="{{ asset('logout') }}">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
