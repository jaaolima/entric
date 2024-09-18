<!DOCTYPE html>
<html lang="pt-BR" class="notranslate" translate="no">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo TITLE;?></title>
    <base href="<?php echo BASE_PATH;?>/" />
    <meta name="google" value="notranslate">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css?rnd=1" rel="stylesheet">  
    <link href="assets/css/custom.css" rel="stylesheet">
    <link href="assets/plugins/toastr/css/toastr.min.css" rel="stylesheet">

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
            .entric .nav-tabs .nav-link.active{
                font-size: 12px;
                padding: .6rem 1rem;
            }
            .circle-counter.prescritor {
                left: 28% !important;
            }
            .entric .btn-minus{
                min-width: 1.5rem !important;
                padding: .5rem 1rem !important;
                left: 28% !important;
            }
            .entric .btn-increment{
                min-width: 1.5rem !important;
                padding: .5rem 1rem !important;
            }
            input[type="radio"] + label {
                font-size: 12px !important;
            }
            .entric .entric_grid .form-check-label {
                font-size: 12px !important;
            }
        }
    </style>
</head>
<body>
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    