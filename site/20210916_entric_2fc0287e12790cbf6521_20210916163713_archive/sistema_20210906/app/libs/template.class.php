<?php
class Template {    
    protected $variables = array();
    public $_controller;
    public $_action;
    
    function __construct($controller,$action) {
        $this->_controller = $controller;
        $this->_action = $action;
    }

    function set($name,$value) {
        $this->variables[$name] = $value;
    }
    
    function render($doNotRenderHeader = 0) {
        if (($this->_controller == "ajax") OR ($this->_controller == "pdf") OR ($this->_controller == "warpdrive") OR ($this->_controller == "v")){
            /*if (file_exists(ROOT . DS . 'app' . DS . 'view' . DS . $this->_controller . DS . $this->_action . '.php')) {
                include (ROOT . DS . 'app' . DS . 'view' . DS . $this->_controller . DS . $this->_action . '.php');         
            }*/
        }else{

            $html = new HTML;
            extract($this->variables);

            if ($doNotRenderHeader == 0) {
                if (file_exists(ROOT . DS . 'app' . DS . 'view' . DS . $this->_controller . DS . 'header.php')) {
                    include (ROOT . DS . 'app' . DS . 'view' . DS . $this->_controller . DS . 'header.php');
                } else {
                    if (file_exists(ROOT . DS . 'app' . DS . 'view' . DS . $this->_controller . DS . 'css.php'))
                        $css_extras = ROOT . DS . 'app' . DS . 'view' . DS . $this->_controller . DS . 'css.php';
                    else
                        $css_extras = '';

                    include (ROOT . DS . 'app' . DS . 'view' . DS . 'header.php');
                }
            }

            if (file_exists(ROOT . DS . 'app' . DS . 'view' . DS . $this->_controller . DS . $this->_action . '.php')) {
                include (ROOT . DS . 'app' . DS . 'view' . DS . $this->_controller . DS . $this->_action . '.php');         
            }else{
                echo '<meta http-equiv="Refresh" content="0; url=' . BASE_PATH . '/">';
                echo '<script type="text/javascript">window.location.href = "' . BASE_PATH . '/";</script>';
            }
                
            if ($doNotRenderHeader == 0) {
                if (file_exists(ROOT . DS . 'app' . DS . 'view' . DS . $this->_controller . DS . 'footer.php')) {
                    include (ROOT . DS . 'app' . DS . 'view' . DS . $this->_controller . DS . 'footer.php');
                } else {                    
                    if (file_exists(ROOT . DS . 'app' . DS . 'view' . DS . $this->_controller . DS . 'js.php'))
                        $js_extras = ROOT . DS . 'app' . DS . 'view' . DS . $this->_controller . DS . 'js.php';
                    else
                        $js_extras = '';

                    include (ROOT . DS . 'app' . DS . 'view' . DS . 'footer.php');
                }
            }
        }
    }
}