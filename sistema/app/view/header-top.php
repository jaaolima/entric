    <div class="nav-header">
        <div class="brand-logo">

            <a href="">
                <b><img src="assets/images/symbol.png" width="auto"></b>
                <span class="brand-title"><img src="assets/images/logo-text.png"></span>
            </a>
        </div>
    </div>

    <div class="header">    
        <div class="header-content">
            <div class="header-left">
                <ul>
                    <li class="icons position-relative">
                        <div class="nav-control">
                            <div class="hamburger"><span class="line"></span>  <span class="line"></span>  <span class="line"></span> </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="header-right">
                <ul>
                    <li class="icons">
                        <?php 
                        if (isset($bruker->usuario['nome'])){
                        ?>
                        <a href="javascript:void(0)">
                            <i class="mdi mdi-bell"></i>
                            <div class="pulse-css"></div>
                        </a>
                        <div class="drop-down animated bounceInDown">
                            <div class="dropdown-content-heading">
                                <span class="pull-left">Notificações</span>  
                                <a href="javascript:void()" class="pull-right text-white">Ver todas</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="drop-down animated bounceInDown dropdown-notfication">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2">
                                                    <i class="fa fa-close"></i>
                                                </span>
                                                <div class="notification-content">
                                                    <div class="notification-heading">Nenhuma notificação</div>
                                                    <span class="notification-text">&nbsp;</span>
                                                    <small class="notification-timestamp"> &nbsp;</small>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php 
                        }
                        ?>
                    </li>

                    <li class="icons">
                        <?php 
                        if (isset($bruker->usuario['nome'])){
                        ?>
                        <a href="javascript:void(0)" class="log-user">
                            <img src="assets/images/usuario.png" alt=""> Olá,<span><?php echo strtok($bruker->usuario['nome'], " ");?></span>  
                            <i class="fa fa-caret-down f-s-14" aria-hidden="true"></i>
                        </a>
                        <div class="drop-down dropdown-profile animated bounceInDown">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li><a href="javascript:void()"><i class="icon-user"></i> <span>Minha Conta</span></a>
                                    </li>
                                    <li><a href="config"><i class="fa fa-cog"></i> <span>Configurações</span></a>
                                    </li>
                                    <li><a href="logout"><i class="icon-power"></i> <span>Sair</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php 
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>