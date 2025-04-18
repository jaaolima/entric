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
                                            <h4 class="text-center mt-4 t-verde line-bottom pb-4">Patrocinador, não conseguiu entrar?</h4>
                                            <form class="mt-5 mb-5" action="senha/patrocinador" method="post">
                                                <input type="hidden" name="_token" value="<?php echo generateFormToken('senhaPatrocinador'); ?>">
                                                <input type="hidden" name="_ac" value="senha">

                                                <div class="text-center mb-4">
                                                    <small class="text-center">Enviaremos um link de recuperação para</small>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-user-o" aria-hidden="true"></i> </span>
                                                    </div>
                                                    <input type="text" name="email_cpf" class="form-control" placeholder="E-mail ou CPF / CNPJ" value="">
                                                </div>

                                                <div class="text-center mb-4 mt-5">
                                                    <button type="submit" class="btn btn-warning btn-block button4">Enviar link de recuperação</button>
                                                </div>
                                            </form>
                                            <div class="text-center">
                                                <p class="mt-5 t-verde"><a href="login/patrocinador" class="t-verde">Efetuar Login</a></p>
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