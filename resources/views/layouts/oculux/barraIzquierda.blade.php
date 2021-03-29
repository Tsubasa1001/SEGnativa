<div id="left-sidebar" class="sidebar">

    <div class="navbar-brand">
        <a href="index.html"><img src="https://www.tecnoweb.org.bo/inf513/grupo06sc/SEGnativa/public/xor/up/assets/images/icon.svg" alt="Oculux Logo" class="img-fluid logo"><span>Oculux</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
    </div>

    <div class="sidebar-scroll">

        <div class="user-account">
            <div class="user_div">
                <img src="https://www.tecnoweb.org.bo/inf513/grupo06sc/SEGnativa/public/xor/up/assets/images/user.png" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Louis Pierce</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="page-profile.html"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="{{url('/logout')}}"><i class="icon-power"></i>Logout</a></li>
                </ul>
            </div>
        </div>

        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">

                <!-- BLOQUE -->
                <li class="header">== NATIVA ==</li>
                <li class="active open">
                    <a href="#myPage" class="has-arrow"><i class="icon-home"></i><span>INDEX</span></a>
                    <ul>
                        <li><a href="{{route("usuario_index")}}">INDEX USUARIO</a></li>
                        <li><a href="{{route("paciente_index")}}">INDEX PACIENTE</a></li>
                        <li><a href="{{route("trabajador_index")}}">INDEX TRABAJADOR</a></li>
                        <li><a href="{{route("estadistica_index")}}">ESTADISTICA</a></li>
                        <li><a href="{{route("reporte_index")}}">REPORTE</a></li>
                        
                        <li><a href="{{route("promocion_index")}}">INDEX PROMOCION</a></li>
                        <li><a href="{{route("equipamiento_index")}}">INDEX EQUIPAMIENTO</a></li>
                        <li><a href="{{route("servicio_index")}}">INDEX SERVICIO</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
