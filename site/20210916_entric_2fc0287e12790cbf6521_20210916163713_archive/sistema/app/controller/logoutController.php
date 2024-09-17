<?php
 
class LogoutController extends Controller {

    function beforeAction () {

    }  
    
    function index() {
        unset($_SESSION['admin_session_id']);
        unset($_SESSION['admin_session_auth']);
        unset($_SESSION['admin_session_key']);
        unset($_SESSION['admin_session_type']);
        
        //@session_destroy();
        Redirect(BASE_PATH . '/login');
    }

    function afterAction() {

    }
 
}