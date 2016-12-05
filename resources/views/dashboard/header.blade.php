<nav class="navbar navbar-default">
    <div class="header" style="background-color:#00CC99;padding:0px;">
        <div class="container">
            <img src="{{ asset('resources/img/ro7.png') }}" class="img-responsive center-block"  style="height: 150px;"/>
        </div>
    </div>
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ asset('dashboard') }}">DOH DTR</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav" style="font-weight: bold;">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DTR<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ asset('upload')  }}">Upload file</a></li>
                        <li><a href="#">DTR Reports</a></li>
                        <li><a href="#">DTR Absences</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Payroll<span class="caret"></span></a>
                    <ul class="dropdown-menu">
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
                    <ul class="dropdown-menu">
                        <li><a href="#">Upload file</a></li>
                        <li><a href="#">DTR Reports</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Account Settings</a></li>
                        <li><a href="{{ asset('logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>