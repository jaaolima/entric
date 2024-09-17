<body class="h-100">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div class="login-bg h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-between h-100">

                <div class="col-xl-5">
                    <div class="row h-100 justify-content-center align-items-center bg-login">
                        <a href="login">
                            <img src="assets/images/login-logo-horizontal.png" border="0" width="250" />
                        </a>
                    </div>
                </div>

                <div class="col-xl-7 p-0 login-menu">
                    <div class="container h-100">
                        
                        <div class="row align-items-center h-100 pt-5 pb-5">
                            
                            <div class="col-md-12 col-xl-6 mx-auto">
                                <div class="form-input-content login-form bg-white">
                                    <div class="card">
                                        <div class="card-body login-prescritor">
                                            <h4 class="text-center mt-4 t-verde line-bottom pb-4">Prescritor, seja bem-vindo!</h4>
                                            <form class="mt-5 mb-5" action="login/prescritor" method="post">
                                                <input type="hidden" name="_token" value="<?php echo generateFormToken('loginPrescritor'); ?>">
                                                <input type="hidden" name="_ac" value="login">

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                                                    </div>
                                                    <input type="text" name="login" class="form-control" placeholder="Login">
                                                </div>

                                                <div class="input-group mb-5">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                                                    </div>
                                                    <input type="password" name="senha" class="form-control" placeholder="Senha">
                                                </div>

                                                <div class="text-center mb-4 mt-5">
                                                    <button type="submit" class="btn btn-warning btn-block button4">ENTRAR</button>
                                                </div>
                                            </form>
                                            <div class="text-center">
                                                <p class="mt-5 t-verde"><a href="javascript:void()" class="t-verde">Esqueceu a senha?</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <footer class="page-footer font-small text-white position-absolute fixed-bottom">
                            <div class="footer-copyright text-center py-3 p-2">
                                <?php echo VERFOOTER;?>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>