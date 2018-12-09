<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info" style="text-align:center;">
                <div class="image">
                    <img src="{{asset('img/logooficialisss.png')}}"   alt="User" />  
                </div>
                <div class="info-container" style="background: rgba(0,0,0,.3); padding:1rem; margin-bottom:1rem; border-radius:3px;">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nombre del usuario</div>
                    <div class="email">john.doe@example.com</div>
                    <div class="btn-group user-helper-dropdown" style="padding:1rem;">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <br>
            <br>
            <br>
            <br>

            <!-- Menu -->
            <div class="menu" style="margin-top:1.8rem;">
                <ul class="list">
                    <li class="header">MENU DE NAVEGACIÓN</li>
                    <li>
                        <a href="/">
                            <i class="material-icons ">dashboard</i>
                            <span class="">Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons ">group</i>
                            <span class="">Usuarios</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/usuarios">
                                    <i class="material-icons">build</i>
                                    <span class="">Mantenimiento</span>
                                </a>
                            </li>
                            <li>
                                <a href="/tiposusuarios">
                                    <i class="material-icons">supervisor_account</i>
                                    <span class="">Tipos de Usuarios</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">list_alt</i>
                            <span class="">Citas</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/asignacion">
                                    <i class="material-icons">folder_shared</i>
                                    <span class="">Asignación de citas</span>
                                </a>
                            </li>
                            <li>
                                <a href="/confirmacion">
                                    <i class="material-icons">how_to_reg</i>
                                    <span class="">Confirmación de citas</span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person_pin</i>
                            <span class="">Personas</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/pacientes">
                                    <i class="material-icons ">airline_seat_flat</i>
                                    <span class="">Pacientes</span>
                                </a>
                            </li>                            
                            <li>
                                <a href="/donantes">
                                    <i class="material-icons ">airline_seat_recline_normal</i>
                                    <span class="">Donantes</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons ">library_books</i>
                            <span >Cupos</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/cupos">
                                    <i class="material-icons">person_add</i>
                                    <span class="">Asignación de cupos</span>
                                </a>
                            </li>
                            <li>
                                <a href="/horarios">
                                    <i class="material-icons">person_add</i>
                                    <span class="">Asignación de horarios</span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">picture_as_pdf</i>
                            <span class="">Reportes</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/reportes">
                                    <i class="material-icons">airline_seat_recline_extra</i>
                                    <span class="">Donantes</span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                  
                   
                </ul>
            </div>
            <!-- #Menu -->
            @include('partials.footer');
        </aside>
        <!-- #END# Left Sidebar -->
</section>
