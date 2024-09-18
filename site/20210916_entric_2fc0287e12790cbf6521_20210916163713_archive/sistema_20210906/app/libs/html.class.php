<?php
class HTML {
    private $js = array();
 
    function shortenUrls($data) {
        $data = preg_replace_callback('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)@', array(get_class($this), '_fetchTinyUrl'), $data);
        return $data;
    }
 
    private function _fetchTinyUrl($url) {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url[0]);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return '<a href="'.$data.'" target = "_blank" >'.$data.'</a>';
    }
 
    function sanitize($data) {
        return mysql_real_escape_string($data);
    }
 
    function link($text,$path,$prompt = null,$confirmMessage = "Are you sure?") {
        $path = str_replace(' ','-',$path);
        if ($prompt) {
            $data = '<a href="javascript:void(0);" onclick="javascript:jumpTo(\''.BASE_PATH.'/'.$path.'\',\''.$confirmMessage.'\')">'.$text.'</a>';
        } else {
            $data = '<a href="'.BASE_PATH.'/'.$path.'">'.$text.'</a>';
        }
        return $data;
    }
 
    function includeJs($fileName) {
        $data = '<script src="'.BASE_PATH.'/public/js/'.$fileName.'.js"></script>';
        return $data;
    } 
 
    function includeCss($fileName) {
        $data = '<link rel="stylesheet" href="'.BASE_PATH.'/public/css/'.$fileName.'.css">';
        return $data;
    }
 
    /* funções para criação de formulários baseados em Bootstrap3*/
    function addRow($array, $dbdados = null, $show = null) {
        $row_id = '';
        if ($show){
            $row_display = ''; if ( $show[key($show)] == 1) $row_display = ' style="display: block;"'; else $row_display = ' style="display: none;"';
            $row_id = 'id="'.key($show).'" '.$row_display;
        }
 
        $data = '<div class="row" '.$row_id.'>';
            foreach ($array as $field => $dados) {

                $data .=  '<div class="form-group col-sm-'.(isset($array[$field]['col']) ? $array[$field]['col'] : '12').' '.(isset($array[$field]['form-class']) ? $array[$field]['form-class'] : '').'  '.(isset($array[$field]['input-group-append']) ? 'input-group' : '').'   '.(isset($array[$field]['input-group-append-group']) ? 'input-group' : '').'">';
                $valid = '';
                if (isset($array[$field]['valid']) == TRUE) $valid = $array[$field]['valid'];
 
                if (isset($array[$field]['checkbox']) == FALSE){
                    if (isset($array[$field]['type'])) {
                        if ($array[$field]['type'] == 'div'){
                        }else{
                            if ($array[$field]['label'] === false){
                            }else{
                                $data .=  '<label for="'.$field.'">'.$array[$field]['label'].'</label>';
                            }                            
                        }
                    }else{
                        if ($array[$field]['label'] === false){
                        }else{
                            $data .=  '<label for="'.$field.'">'.(isset($array[$field]['label']) ? $array[$field]['label'] : '').'</label>';
                        }                        
                    }
                }
 
                if (isset($array[$field]['uploadfiles']) == TRUE){
 
                    $data.='<div class="row">
                                <div class="col-md-3 nopadding">
                                    <span class="btn btn-xs btn-info fileinput-button">
                                        <i class="fa fa-paperclip pull-left" style="display: block !important;"></i> &nbsp; Anexar
                                        <input type="file" name="files[]" class="file" multiple>
                                    </span>
                                </div>

                                <div class="col-md-3 nopadding fileupload-progress fade hide">
                                    <div class="progress progress-striped active" style="margin-top: 10px;" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                    </div>
                                    <div class="progress-extended" style="font-size: 10px !important;">&nbsp;</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 nopadding padder-h">
                                    <table role="presentation" class="table table-striped m-n"><tbody class="files"></tbody></table>
                                </div>
                            </div>
 
                            <input type="hidden" class="filesuploaded" name="filesuploaded" value="" />

                             <script id="template-upload" type="text/x-tmpl">
                                {% for (var i=0, file; file=o.files[i]; i++) { %}
                                    <tr class="template-upload fade">
                                        <td>
                                            <span class="preview"></span>
                                        </td>
                                        <td>
                                            <p class="name">{%=file.name%}</p>
                                            <strong class="error text-danger"></strong>
                                        </td>
                                        <td>
                                            <p class="size" style="margin: 0px;">Processing...</p>
                                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
                                        </td>
                                        <td>
                                            {% if (!i && !o.options.autoUpload) { %}
                                                <button class="btn btn-primary start btn-sm btn-smicon" disabled>
                                                    <i class="fa fa-upload"></i>
                                                </button>
                                            {% } %}
                                            {% if (!i) { %}
                                                <button class="btn btn-warning btn-sm btn-smicon cancel">
                                                    <i class="fa fa-ban"></i>
                                                </button>
                                            {% } %}
                                        </td>
                                    </tr>
                                {% } %}
                            </script>
 
                            <script id="template-download" type="text/x-tmpl">
                                {% for (var i=0, file; file=o.files[i]; i++) { %}
                                    <tr class="template-download fade">
                                        <td>
                                            <span class="preview">
                                                {% if (file.thumbnailUrl) { %}
                                                    <img src="{%=file.thumbnailUrl%}">
                                                {% }else{ %}
                                                    <img src="imagens/pdf.png">
                                                {% } %}
                                            </span>
                                        </td>
                                        <td>
                                            <p class="name">
                                                <span>{%=file.name%}</span>
                                            </p>
                                            {% if (file.error) { %}
                                                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                                            {% } %}
                                        </td>
                                        <td>
                                            &nbsp;
                                        </td>
                                        <td>
                                            {% if (file.deleteUrl) { %}
                                                <button class="btn btn-danger btn-sm btn-smicon delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields=\'{"withCredentials":true}\'{% } %}>
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            {% } else { %}
                                                <button class="btn btn-warning btn-sm btn-smicon cancel">
                                                    <i class="fa fa-ban"></i>
                                                </button>
                                            {% } %}
                                        </td>
                                    </tr>
                                {% } %}
                            </script>
                            ';
 
                }elseif (isset($array[$field]['select']) == TRUE){
 
                    $data .= '<select id="'.$field.'" name="'.$field.'" '.$valid.' aria-controls="'.$field.'" '.(isset($array[$field]['readonly']) ? 'readonly="'.$array[$field]['readonly'].'"' : '').' '.(isset($array[$field]['disabled']) ? 'disabled="'.$array[$field]['disabled'].'"' : '').' class="form-control input-sm '.(isset($array[$field]['class']) ? $array[$field]['class'] : '').'">';
                    foreach ($array[$field]['select'] as $sfield => $sdados) {
                        $selected = "";
                        if (isset($dbdados[$field])) if ($dbdados[$field] == $sfield) $selected = 'selected="selected"';
                        $data .= '<option value="'.$sfield.'" '.$selected.'>'.$sdados.'</option>';
                    }
                    $data .= '</select>';
 
                }else if (isset($array[$field]['checkbox']) == TRUE){
                    $checked = "";
                    $valued = 1;
                    if (isset($dbdados[$field])){ if ($dbdados[$field] == 1){ $checked = 'checked'; $valued = 1;}}
 
                    $data .=   '<div class="checkbox">
                                    <label>
                                        <input type="hidden" name="'.$field.'" value="0">
                                        <input type="checkbox" name="'.$field.'" '.$checked.' value="'.$valued.'">
                                        '.$array[$field]['label'].'
                                    </label>
                                </div>';

                }else if (isset($array[$field]['number']) == TRUE){
 
                    $data .=   '<input type="number" value="4.5" data-decimals="2" min="0" max="9" step="0.1"/>


                            <div class="checkbox">
                                    <label>
                                        <input type="hidden" name="'.$field.'" value="0">
                                        <input type="checkbox" name="'.$field.'" '.$checked.' value="'.$valued.'">
                                        '.$array[$field]['label'].'
                                    </label>
                                </div>';
 
 
                }else if (isset($array[$field]['textarea']) == TRUE){
                    $valued = "";
                    if (isset($array[$field]['value'])){
                        $valued = $array[$field]['value'];
 
                    }else{
                        if (isset($dbdados[$field]))
                            $valued = $dbdados[$field];
                    }
 
                    $data .=   '<textarea 
                                class="form-control "
                                '.$valid.'
                                '.(isset($array[$field]['readonly']) ? 'readonly="'.$array[$field]['readonly'].'"' : '').'
                                name="'.$field.'"
                                style="'.$array[$field]['textarea'].'"
                                placeholder="'.(isset($array[$field]['placeholder']) ? $array[$field]['placeholder'] : '').'"
                                >'.str_replace("<br>", "\n", $valued).'</textarea>';
 
                }else if (isset($array[$field]['radiobutton']) == TRUE){
                   
                    $data .= '<div class="form-radio ">';
                        foreach ($array[$field]['radiobutton'] as $rbfield => $rbdados) {
                            $checked = "";
                            if (isset($dbdados[$field])) if ($dbdados[$field] == $rbfield) $checked = 'checked';
                            if (isset($array[$field]['checked'])){
                                if ($array[$field]['checked'] == $rbfield) $checked = 'checked';
                            }
                            $forcoderadio = randomCode(10);
                            $data .= '<input type="radio" id="radio'.$forcoderadio.'" class="radio-outlined" name="'.$field.'" value="'.$rbfield.'" '.$checked.'>  <label for="radio'.$forcoderadio.'" class="radio-green">'.$rbdados.'</label> ';
                        }
                    $data .= '</div>';

                    /*
                    $data .= '<div class="radio ">';
                        foreach ($array[$field]['radiobutton'] as $rbfield => $rbdados) {
                            $checked = "";
                            if (isset($dbdados[$field])) if ($dbdados[$field] == $rbfield) $checked = 'checked';
                            $data .= '<label class="form-check-label"><input type="radio" name="'.$field.'" value="'.$rbfield.'" '.$checked.'>  '.$rbdados.'</label> &nbsp;&nbsp; ';
                        }
                    $data .= '</div>';
                    */
 
                }else{
                    $diver = 0;
                    if (isset($array[$field]['type'])){
                        if ($array[$field]['type'] == 'div'){
                            if (isset($array[$field]['content'])){
                                $fieldpreview = str_replace("preview", "", $field);
                                $valued = "";
                                if ($fieldpreview == $field){
                                    $label = "";
                                    if (isset($array[$field]['label'])) $label = '<label>'.$array[$field]['label'].'</label>';
                                    $textarea_style1 = ""; $textarea_style2 = "";
                                    if (isset($array[$field]['textarea_style'])){ $textarea_style1 = "<div>"; $textarea_style2 = "</div>"; }

                                    $data .=  $label.$textarea_style1.$array[$field]['content'].$textarea_style2;
 
                                }else{
                                    if (isset($array[$fieldpreview]['class'])){
                                        if ($array[$fieldpreview]['class'] == "uploadimg"){
                                            if (isset($dbdados[$fieldpreview]) and ($dbdados[$fieldpreview]<>"")){
                                                $path_parts = pathinfo($dbdados[$fieldpreview]);
                                                if (isset($path_parts['extension'])){
                                                    $valued = "<img src='".$dbdados[$fieldpreview]."' width='100%'/>";
                                                }
 
                                            }else{
                                                $valued = "";
                                            }
                                            $data .=  "<div id='".$fieldpreview."preview'>".$valued."</div>";
                                            $data .=  "<h2><center><label id='img_dimensao'></label></center></h2>";
                                        }else{
                                            $valued = $dbdados[$fieldpreview];
                                            $data .=  "<div id='".$fieldpreview."preview'>".$valued."</div>";
                                        }
                                    }
                                }
                            }
                            $diver = 1;
                        }
                    }
 
                    if ($diver == 0){
                        $valued = "";
                        if (isset($array[$field]['value'])){
                            if (isset($array[$field]['type']) and ($array[$field]['type'] == "email")){
                                $valued = 'value="'.mb_convert_case($array[$field]['value'], MB_CASE_LOWER, "UTF-8").'"';
                            }else{
                                $valued = 'value="'.mb_convert_case($array[$field]['value'], MB_CASE_UPPER, "UTF-8").'"';
                            }
 
                        }else{
                            if (isset($dbdados[$field])){
                                if (isset($array[$field]['type']) and ($array[$field]['type'] == "email")){
                                    $valued = 'value="'.mb_convert_case($dbdados[$field], MB_CASE_LOWER, "UTF-8").'"';
                                }else{
                                    $valued = 'value="'.mb_convert_case($dbdados[$field], MB_CASE_UPPER, "UTF-8").'"';
                                }
                            }
                        }
 
                        $filetitle = ""; if (isset($array[$field]['type'])) if ($array[$field]['type'] == "file") $filetitle = ' title="Anexar"';
 
                       $class_control = "form-control";
                           if (isset($array[$field]['type'])){
                               if ($array[$field]['type'] == "hidden"){
                                  $class_control = "";
                                }
                        }
 
                        if (isset($array[$field]['input-group-prepend'])){
                            $data .= ' <div class="input-group-prepend"><span class="input-group-text">'.$array[$field]['input-group-prepend'].'</span></div>';
                        }
 
                        if (isset($array[$field]['input-group-prepend-select'])){
                            $data .= ' <div class="input-group-prepend">'.$array[$field]['input-group-prepend-select'].'</div>';
                        }

                        $data .=  '<input type="'.(isset($array[$field]['type']) ? $array[$field]['type'] : 'text').'"
                                    '.(isset($array[$field]['autocomplete']) ? 'autocomplete="'.$array[$field]['autocomplete'].'"' : '').'
                                    '.$filetitle.'
                                    placeholder="'.(isset($array[$field]['placeholder']) ? $array[$field]['placeholder'] : '').'"
                                    '.(isset($array[$field]['readonly']) ? 'readonly="'.$array[$field]['readonly'].'"' : '').'
                                    '.(isset($array[$field]['rel']) ? 'rel="'.$array[$field]['rel'].'"' : '').'
                                    '.(isset($array[$field]['required']) ? 'required="'.$array[$field]['required'].'"' : '').'
                                    '.(isset($array[$field]['parameters']) ? $array[$field]['parameters'] : '').'
                                    name="'.$field.'"
                                    id="'.$field.'"
                                    '.$valued.'
                                    '.$valid.'
                                    class="'.$class_control.' '.(isset($array[$field]['class']) ? $array[$field]['class'] : '').'">';

                        if (isset($array[$field]['input-group-append'])){
                            $data .= ' <div class="input-group-append"><span class="input-group-text">'.$array[$field]['input-group-append'].'</span></div>';
                        }
                        if (isset($array[$field]['input-group-append-group'])){
                            $data .= ' <div class="input-group-append">'.$array[$field]['input-group-append-group'].'</div>';
                        }
                    }
                }
 
                $data .=  '</div>';
            }
        $data .= '</div>';
        return $data;
    }
 
    function addSubmit($array) {
        $data = '<div class="col-sm-'.(isset($array['col']) ? $array['col'] : '12').'">';
            $data .= '<div class="form-group">';
                $data .= '<a href="'.BASE_PATH.'/'.(isset($array['back']) ? $array['back'] : '').'" class="btn btn-default">Voltar</a> ';
                $data .= '<button type="submit" class="btn btn-success">'.(isset($array['label']) ? $array['label'] : 'Submit').'</button>';
            $data .= '</div>';
        $data .= '</div>';
        return $data;
    }
 
    function addTable($parametros, $array=null, $class=null) {
        $modal = "";
        $ajaxfc = "";
        if (isset($parametros["modal"])){
            if (isset($parametros["modal"]["data-ajax-fc"])) $ajaxfc = 'data-ajax-fc="'.$parametros["modal"]["data-ajax-fc"].'"';
            $modal = " modal_info ";
        }
 
        $th_class = array();
 
        $data = '<div class="table-responsive">';
            if ($modal <> "") $rel_title = ' rel="'.$parametros["modal"]["title"].'" '; else $rel_title = '';
            $data .= '<table class="table table-striped table-hover '.($class<>null ? $class : '').'" '.$rel_title.' '.$ajaxfc.'>';
                $data .= '<thead> <tr>';
                    $cont = 1;
                    foreach ($parametros["title"] as $header => $dados) {
                        $data .= '<th '.($dados ? $dados : '').'><span>'.$header.'</span></th>';
                        $dados ? ($th_class[$cont]=$dados) : '';
                        $cont++;
                    }
 
                    if (isset($parametros["option"])){
                        $data .= '<th><span>Opções</span></th>';
                    }
 
                $data .= '</tr> </thead>';
                $data .= '<tbody>';
 
                    if (isset($array)){
                        for ($i = 0; $i < count($array); $i++) {
                            $inativo = "";
                            // if (isset($array[$i]["status"])){
                            //  if ($array[$i]["status"] == "Inativo"){
                            //      $inativo = 'style="color: #ff0000;"';
                            //  }
                            // }
 
                            $data .= '<tr '.$inativo.'>';
                            $cont = 1;
 
                            if (isset($array[$i])){
                                foreach ($array[$i] as $header => $dados) {
                                    $rel_modal = '';
                                    
                                    if (strpos($dados, '@') !== false) {
                                        $campo = mb_convert_case($dados, MB_CASE_LOWER, "UTF-8");
                                    }else{
                                        $campo = mb_convert_case($dados, MB_CASE_UPPER, "UTF-8");
                                    }

                                    $data .= '<td '.(isset($th_class[$cont]) ? $th_class[$cont] : '').' class="'.$modal.'" '.$rel_modal.'> '.$campo.' </td>';
                                    $cont++;
                                }
 
                                if (isset($parametros["option"])){
                                    $data .= '<td style="text-align: center;"> ';
                                    foreach ($parametros["option"] as $opkey => $opval) {
                                        $chaveitem = array_keys($array[$i]);
                                        $linkoption = 'href="'.$opkey.$array[$i][ $chaveitem[0] ].'"';
                                        if (strpos($opkey,'delet') !== false) {
                                            $linkoption = 'href="'.$opkey.$array[$i][ $chaveitem[0] ].'" class="confirm"';
                                        }
                                        $data .= '<a '.$linkoption.'>'.$opval."</a> &nbsp;";
                                    }
                                    $data .= '</td> ';
                                }
                            }
 
                            $data .= '</tr>';
                        }
                    }
 
                $data .= '</tbody>';
            $data .= '</table>';
        $data .= '</div>';
        return $data;
    }
 
    function addTabs($array) {
        $data = '<div class="tabs-wrapper">';
 
            $data .= '<ul class="nav nav-tabs">';
            foreach ($array as $field => $dados) {
                $data .=  '<li '.(isset($array[$field]["active"]) ? 'class="active"' : '').'><a data-toggle="tab" href="#tab-'.$field.'" aria-expanded="'.(isset($array[$field]["active"]) ? 'true' : 'false').'">'.$array[$field]["label"].' <i class="fa"></i></a></li>';
            }
            $data .=  '</ul>';
 
            $data .= '<div class="tab-content">';
            foreach ($array as $field => $dados) {
                $data .=  '<div id="tab-'.$field.'" class="tab-pane fade '.(isset($array[$field]["active"]) ? 'active in' : '').'"> '.$array[$field]["content"].' </div>';
            }
            $data .=  '</div>';
 
        $data .= '</div>';
        return $data;
    }
 
    function addCol($array) {
        $data = '<div class="row">';
 
            foreach ($array as $field => $dados) {
                $data .= '<div class="form-group col-sm-'.$array[$field]["col"].'">';
 
                        $data .= $array[$field]["content"];
 
 
                $data .=  '</div>';
            }
 
        $data .= '</div>';
        return $data;
    }
 
    function addColModal($array){
        $data = '<div class="row">';
 
            foreach ($array as $field => $dados) {
                $data .= '<div class="form-group col-sm-'.$array[$field]["col"].'">';
                    if($array[$field]['type'] == "imagem"){
                        $data .= $array[$field]["content"];
                    }else{$data .=  "<b>".$array[$field]['label'] ."</b>".' : '.   $array[$field]["content"];}
 
                $data .=  '</div>';
            }
 
        $data .= '</div>';
        return $data;
    }
 
    function addPagination($paginacao, $pagina) {
        $data = "";
        if ($paginacao){
            $data = '<li><a href="produtos/'.(($pagina-1)<=0 ? 1 : ($pagina-1)).'"><i class="fa fa-chevron-left"></i></a></li>';
            foreach ($paginacao as $key => $val) {
                $data .= '<li '.($val=="active"? 'class="active"' : '').'><a href="produtos/'.$key.'">'.$key.'</a></li>';
            }
            $data .= '<li><a href="produtos/'.(($pagina+1)>count($paginacao) ? count($paginacao) : ($pagina+1)).'"><i class="fa fa-chevron-right"></i></a></li>';
        }
        return $data;
    }
 
    function addHr() {
        $data = '<div class="hr"></div>';
        return $data;
    }
 
    function addHrbt() {
        $data = '<hr class="mb-0 mt-0">';
        return $data;
    }
}