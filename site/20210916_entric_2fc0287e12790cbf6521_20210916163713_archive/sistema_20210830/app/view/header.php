<!DOCTYPE html>
<html lang="en">
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
</head>
<body>
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    