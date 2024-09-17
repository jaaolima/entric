<!DOCTYPE html>
<html lang="en" class="h-100" id="login-page2">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo TITLE;?></title>
    <base href="<?php echo BASE_PATH;?>/" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css?rnd=1" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link href="assets/plugins/toastr/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="js/jquery/jquery-confirm/jquery-confirm.min.css">
    <?php if (isset($css_extras)) if ($css_extras<>"") include ($css_extras); ?>
	<script>
		var url_raiz = "<?php echo BASE_PATH.'/';?>";
	</script>
    <style>
        @media only screen and (max-width: 1399px) {
            body{
                font-size: 1.2rem !important;
            }
            .menu-home .card-body h4 {
                font-size: 1.5rem;
            }
            .login-bg .container{
                margin-right: 15px;
                margin-left: 15px;
            }
            .entric .nav-tabs .nav-link{
                font-size: 12px;
                padding: .6rem 1rem;
            }
        }
        .menu-home{
            height:  150px;
            border-radius: 15px;
            box-shadow: 1px 6px 10px -2px rgba(0,0,0,0.20);
            -webkit-box-shadow: 1px 6px 10px -2px rgba(0,0,0,0.20);
            -moz-box-shadow: 1px 6px 10px -2px rgba(0,0,0,0.20);
        }
        .menu-home .card-body{
            display: table;
            height: 150px;
            width: 100%;
            text-align: center;
        }
        .menu-home .card-body h4{
            display: table-cell;
            vertical-align: middle;
            text-align: left;
            padding-left: 45%;
        }
        .menu-home a:link, a:active, a:visited{
            color:  #0092c5;
        }
        .menu-paciente{
            background-image: url("assets/images/menu_paciente.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center; 
        }
        .menu-prescritor{
            background-image: url("assets/images/menu_prescritor.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center; 
        }
        .menu-administrador{
            background-image: url("assets/images/menu_administrador.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center; 
        }
        .menu-patrocinador{
            background-image: url("assets/images/menu_patrocinador.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center; 
        }
        .login-prescritor .input-group > .input-group-prepend > .input-group-text {
            border-color: transparent;
            color:  #42bdbd;
            background-color: transparent;
        }
        .login-prescritor .form-control {
            border:  0px;
        }
        .login-prescritor .form-control::placeholder {
            color: #5ac5c5 !important;
            opacity: 1; 
        }
        .login-prescritor .form-control:-ms-input-placeholder {
            color: #5ac5c5 !important;
        }
        .login-prescritor .form-control::-ms-input-placeholder {
            color: #5ac5c5 !important;
        }
        .login-prescritor .input-group {
            border-bottom: 1px solid #ff8e27;
        }




.entric .form-group label{
    font-size: 1.14rem;
}
.entric .form-group input{
    font-size: 13px;
    min-height: auto;
    border: 1px solid #e0edef;
    font-weight: 300;
}
.entric .form-group input:focus {
    border: 1px solid #7fdecb;
}
.entric .form-group .checkbox{
    position: absolute;
    bottom: 0px;
}
.entric .form-group .radio{
    margin-top: 10px;
}
.entric .btn-icon-right{
    border-left:  0px;
    margin: -.8rem 0.8rem -.8rem -0.5rem;
    font-size: 13px !important;
}
.entric .btn{
    font-size: 13px !important;
    border-radius: 5px;
}
.entric .btn-warning {
    background: #eda349;
    border-color: #eda349;
    color: #fff;
}
.entric .btn-secondary {
    background: #42bdbd;
    border-color: #42bdbd;
    color: #fff;
}
.entric .input-group .input-group-text {
    font-size: 13px;
}
.entric .input-group .input-group-prepend,  .entric .input-group .input-group-append{
    height:  4.5rem;
}
.entric .form-control{
    font-size: 13px;
}
.entric .form-control textarea::-webkit-input-placeholder {
    font-size: 13px;
}
.entric .form-control textarea:-moz-placeholder {
    font-size: 13px;
}
.entric .form-control textarea::-moz-placeholder {  /* Firefox 19+ */
    font-size: 13px;
}
.entric .form-control textarea:-ms-input-placeholder {
    font-size: 13px;
}
.entric .form-control textarea::placeholder {
    font-size: 13px;
}
.entric .form-group .entric_radio{
    background-color: #edf4f5;
    padding: 10px;
    border: 1px solid #e2edf0;
    font-size: 13px;
}
.entric .form-group .entric_radio{
    background-color: #edf4f5;
    padding: 10px;
    border: 1px solid #e2edf0;
    font-size: 13px;
}
.entric .btn{
    padding: .7rem 0.8rem;
}
.entric .entric_group_radio{
    margin: 0px;
    border: 1px solid #e2edf0;
}
.entric .entric_group_radio .form-group{
    background-color: #edf4f5;
    border: 0px solid #e2edf0;
    font-size: 13px;
    margin-bottom: 0px;
}
.entric .entric_group_radio .form-group label{
    font-size: 14px;
    color: #417ca2;
    font-weight: bold;
    line-height: 2.5rem;
}
.entric .entric_group_radio .entric_radio{
    background-color: #edf4f5;
    border: 0px solid #e2edf0;
    font-size: 13px;
}
.entric .entric_grid{
    background-color: #ffffff;
    border: 0px solid #e2edf0;
    font-size: 13px;
}
.entric .entric_grid .form-group{
    /*border: 1px solid #e2edf0;*/
}
.entric .entric_grid .entric_group{
    border: 1px solid #e2edf0;
}
.entric .entric_grid .input-group{
    border: 0px solid #e2edf0;
}
.entric .entric_grid .input-group-text{
    padding: .1rem 0.8rem;
}
.entric .entric_grid .input-group-text .form-radio{
    margin-top:  5px;
}
.entric .entric_grid .grid_label{
    font-size: 14px;
    color: #417ca2;
    font-weight: bold;
    line-height: 2.5rem;
}
.entric .entric_grid .form-check-label{
    font-size: 13px;
    color: #417ca2;
    font-weight: normal;
}
.entric .entric_group_radio .entric_group_destaque{
    background-color: #42bdbd;
    border: 0px solid #e2edf0;
    font-size: 13px;
    margin-bottom: 0px;
}
.entric .entric_group_radio .entric_group_destaque .entric_radio{
    background-color: transparent;
}
.entric .entric_group_radio .entric_group_destaque .entric_radio label{
    color: #ffffff;
}
.entric .entric_group_radio .entric_group_destaque .entric_radio .entric_sec{
    color: #42bdbd !important;
}
.separator {
  display: flex;
  align-items: center;
  text-align: center;
  color:  #417ca2;
  font-weight: bold;
}
.separator::before,
.separator::after {
  content: '';
  flex: 1;
  border-bottom: 1px solid #e3eef0;
}

.separator:not(:empty)::before {
  margin-right: .25em;
}

.separator:not(:empty)::after {
  margin-left: .25em;
}
.dataTable{
    width: 100% !important;
}
input[type="radio"] + label {
    padding-left: 2.6rem !important;
    padding-right: 3rem !important;
}
.p-11{
    padding: .35rem !important;
}
.cart_bordas{
    border: 1px dashed #d4e6e9;
}
.table-responsive label{
    font-size: 12px;
    color: #a7cad7 !important;    
}
.table-responsive table thead tr th span{
    font-size: 14px;
    color:  #417c8c;
}
.form_blue {
  background-color: #edf4f5;
  padding: 15px;
  font-size: 13px;
  color: #417ca2;
}
.form-check-label {
  font-size: 13px !important;
  color: #417ca2;
  font-weight: normal;
}
input[type="radio"]:checked + label {
    font-size: 1.14rem;
}
input[type="radio"]:not(:checked) + label {
    font-size: 1.14rem;
}
.plr{
    padding-left: 12px;
    padding-right: 12px;
}
.mlr{
    margin-left: 9px;
    margin-right: 9px;
}
.mlr-12{
    margin-left: -12px;
    margin-right: -12px;
}
</style>

</head>