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
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link href="assets/plugins/toastr/css/toastr.min.css" rel="stylesheet">
    <?php if (isset($css_extras)) if ($css_extras<>"") include ($css_extras); ?>
	<script>
		var url_raiz = "<?php echo BASE_PATH.'/';?>";
	</script>
    <style>
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
    </style>
</head>