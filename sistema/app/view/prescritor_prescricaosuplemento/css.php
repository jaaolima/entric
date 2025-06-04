<link href="js/jquery/select2/css/select2.min.css" rel="stylesheet">
<link href="js/bootstrap/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="js/jquery/bootstrap-slider/css/bootstrap-slider.min.css" rel="stylesheet">
<link rel="stylesheet" href="js/jquery/jquery-confirm/jquery-confirm.min.css">
<style>
[id^="count_"] {
    font-weight: 100;
}
      /* Estilos para o contêiner do form-check, se necessário */
.form-toggle {
    display: flex; /* Para alinhar o toggle e o label */
    align-items: center; /* Centraliza verticalmente */
    margin-bottom: 15px; /* Adicione algum espaçamento, se quiser */
}

/* Oculta o input checkbox original */
.toggle-checkbox {
    opacity: 0;
    width: 0;
    height: 0;
    position: absolute; /* Para tirá-lo do fluxo e permitir que o label ocupe seu espaço */
}

/* Estilo para o label que contém o toggle visual e o texto */
.toggle-label {
    position: relative; /* Essencial para posicionar o toggle-switch absolutamente dentro dele */
    cursor: pointer;
    padding-left: 50px; /* Espaço para o toggle visual à esquerda do texto/imagem */
    display: flex;
    align-items: center;
    font-size: 1rem; /* Ajuste o tamanho da fonte conforme necessário */
    color: #333; /* Cor do texto padrão */
}

.toggle-label img {
    margin-right: 8px; /* Espaçamento entre a imagem e o texto */
    vertical-align: middle; /* Alinha a imagem com o texto */
}

/* O elemento visual do toggle (o trilho e o círculo) */
.toggle-switch {
    position: absolute;
    left: 0; /* Alinha à esquerda do padding-left do label */
    top: 50%;
    transform: translateY(-50%); /* Centraliza verticalmente */
    width: 40px;
    height: 20px;
    background-color: #ccc; /* Cor cinza quando desligado */
    border-radius: 34px; /* Arredonda o trilho */
    transition: background-color 0.4s; /* Suaviza a transição de cor */
}

/* O círculo (thumb) dentro do trilho */
.toggle-switch::before {
    content: "";
    position: absolute;
    height: 15px;
    width: 15px;
    left: 3px;
    bottom: 3px; /* Ajuste para alinhar verticalmente */
    background-color: white;
    border-radius: 50%; /* Faz o círculo */
    transition: transform 0.4s; /* Suaviza a transição de movimento */
}

/* Quando o checkbox está checado: muda a cor do trilho */
.toggle-checkbox:checked + .toggle-label .toggle-switch {
    background-color: #2196F3; /* Cor azul quando ligado (ou sua cor desejada) */
}

/* Quando o checkbox está checado: move o círculo para a direita */
.toggle-checkbox:checked + .toggle-label .toggle-switch::before {
    transform: translateX(20px); /* Move o círculo */
}

/* Opcional: Efeito de foco para acessibilidade */
.toggle-checkbox:focus + .toggle-label .toggle-switch {
    box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.5); /* Exemplo de foco azul */
}
.entric .nav-tabs .nav-link{
    font-size: 13px;
    border-radius: 5px 5px 0px 0px !important;
    min-height: 55px;
    text-align: center;
    padding: .6rem 2.2rem;
}
.entric .nav-link {
    background-color: #dbeaec;
    color: #82aeb3;    
}
.entric .nav-tabs .nav-item {
    padding: 0 3px 0 0px;    
}
.entric .nav-tabs .nav-link.active {
    color:  #ffffff;
    font-size: 13px;
    background-color: #0798c3 !important;
    border-color: #0798c3 #0798c3 #0798c3;
}
.entric .nav-tabs .nav-link:hover {
    background-color: #e5f0f2;
}
.entric .form-group label{
    font-size: 1.25rem;
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
    margin:  -.8rem 1.2rem -.8rem -0.5rem;
    font-size: 13px !important;
}
.entric .btn{
    font-size: 12px !important;
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
.entric .form_blue {
  background-color: #edf4f5;
  padding: 15px;
  font-size: 13px;
  color: #417ca2;
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
.disabledTab{
    pointer-events: none;
}
.entric .form-group .entric_radio{
    /*background-color: #edf4f5;*/
    padding: 10px;
    border: 1px solid #e2edf0;
    font-size: 13px;
}
.entric .form-group .entric_radio label{
    font-size: 14px;
    color: #417ca2;
    font-weight: bold;
    line-height: 2.5rem;
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
    /*background-color: #edf4f5;*/
    border: 0px solid #e2edf0;
    font-size: 13px;
}
.entric .entric_grid{
    background-color: transparent;
    border: 0px solid #e2edf0;
    font-size: 13px;
}
.entric .entric_grid .entric_group{
    background-color: #ffffff;
    border: 1px solid #e2edf0;
}
.entric .entric_grid .form-group{
    /*border: 1px solid #e2edf0;*/
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


.entric_necessidades{
    padding:  20px;
}
.entric_necessidades .b_ltr{
    border-left: 2px solid #e8f2f3;
    border-top: 2px solid #e8f2f3;
    border-right: 2px solid #e8f2f3;
}
.entric_necessidades .b_ltrb{
    border-left: 2px solid #e8f2f3;
    border-top: 2px solid #e8f2f3;
    border-right: 2px solid #e8f2f3;
    border-bottom: 2px solid #e8f2f3;
}
.entric_necessidades .b_r{
    border-right: 2px solid #e8f2f3;
}
.entric_necessidades .b_t{
    border-top: 2px solid #e8f2f3;
}
.entric_necessidades .bg-azul{
    background-color: #42bdbd;
    color: #ffffff;
    font-weight: bold;
    line-height: 40px;
}
.entric_necessidades .bg-azul2{
    background-color: #edf4f5;
}
.entric_necessidades .text-azul{
    color: #42bdc7;
    font-weight: bold;
    line-height: 40px;
}
.entric_necessidades .bg-cinza{
    background-color: #faf7f7;
}
.entric_necessidades .bg-branco{
    background-color: #ffffff;
}
.entric_necessidades select{
    border: 0px solid #dddfe1;
}
.entric_necessidades .ln-40{
    line-height: 40px;
}
.entric_necessidades .text-azulescuro{
    color: #2d6d7a;
    font-weight: bold;
    line-height: 40px;
}
.entric_necessidades .input-total{
    background: transparent;border: 0px;width: 100%;
    /*display: initial;*/
    text-align: center;color: #2d6d7a;font-size: 1.4rem;
    font-weight:  bold;
}
.entric .tabcalorias .nav-item{
    padding: 1px 1px 1px 1px;
}
.entric .tabcalorias .nav-link{
    min-height: 40px;
    border-color: #42bdbd;
    background-color: #42bdbd !important;
    color: #ffffff;
}
.entric .tabcalorias .nav-link.active{
    background-color: #eda349 !important;
    border-color: #eda349;
}
.entric_necessidades .bd-cinza{
    background-color: #f3f6f9;
}
.entric .btn-minus, .entric .btn-plus{
    border-radius: 0px;
    border-color: #42bdbd;
    color: #42bdbd;
}
.entric .btn-minus{
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}
.entric .btn-plus{
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
}
.entric .btn-minus:hover, .entric .btn-plus:hover{
    border-radius: 0px;
    border-color: #42bdbd;
    background-color: #42bdbd;
    color: #ffffff;
}
.entric .btn-minus:hover{
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}
.entric .btn-plus:hover{
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
}
#avaliacao .input-group-text{
    border-radius:  0px;
    background-color: #dbeaec;
    border: 1px solid #d1e4e7;
    color: #a9c9ca;
}
#avaliacao .form-check-label{
    padding-left: 10px;
    color: #a9c9ca;
}
#avaliacao .circunferencias_valor_div .row{
    border-bottom:  1px solid #e0edef;
    font-size: 11px;
}
#avaliacao .dobras_valor_div .row{
    border-bottom:  1px solid #e0edef;
    font-size: 11px;
}
#modal_fracionamento .entric_group_destaque{
    background-color: #42bdbd;
    border: 0px solid #e2edf0;
    font-size: 14px;
    color: #ffffff;
    font-weight: bold;
}
#modal_fracionamento .entric_group_destaque2{
    border: 0px solid #e2edf0;
    font-size: 14px;
    color: #2d6d77;
    font-weight: bold;
}
#modal_fracionamento .row{
    font-size: 12px;
}
#modal_selecao .form-check .form-check-label{
    font-size: 13px;    
}
#modal_selecao .collapseSistema{
    padding-left:  10px !important;
    margin-left: 5px;        
}
#modal_selecao td{
    font-size: 13px;    
}
#modal_selecao .entric_group_destaque3{
    background-color: #42bdbd;
    border: 0px solid #e2edf0;
    font-size: 14px;
    color: #ffffff;
    font-weight: bold;
}
.table-clique tr{
    cursor: pointer;
}
.entric_ofertotal{
    padding-right: 1.2rem;
}
.entric_ofertotal .b_ltr{
    border-left: 2px solid #e8f2f3;
    border-top: 2px solid #e8f2f3;
    border-right: 2px solid #e8f2f3;
}
.entric_ofertotal .b_ltrb{
    border-left: 2px solid #e8f2f3;
    border-top: 2px solid #e8f2f3;
    border-right: 2px solid #e8f2f3;
    border-bottom: 2px solid #e8f2f3;
}
.entric_ofertotal .b_r{
    border-right: 2px solid #e8f2f3;
}
.entric_ofertotal .b_t{
    border-top: 2px solid #e8f2f3;
}
.entric_ofertotal .bg-laranja{
    background-color: #eda349;
    color: #ffffff;
    font-weight: bold;
    line-height: 40px;
}
.entric_ofertotal .ln-40{
    line-height: 40px;
}
.entric_ofertotal .bgwhite{
    background-color: #ffffff;
}
.sticky {
    background-color: #ffffff;
    text-align: center;
    top: 0;
    z-index: 1000;
}
.entric .combinacoes .nav-tabs .nav-link{
    min-height: 35px;
}
.entric .combinacoes .nova-combinacao{
    min-height: 35px;
    border-radius: 5px 5px 0px 0px !important
}
.entric_grid .accordion .card{
    border: 1px solid #e2edf0;
}
.entric_grid .accordion h2 .btn {
    padding: 0px;
}
.entric_grid .accordion h2 .btn label{
    cursor: pointer;
}
.entric_grid .accordion .card .card-header .btn-header-link {
    font-size: 14px;
    display: block;
    text-align: left;
    padding: 0px;
    color: #417ca2;
    font-weight: bold;
    line-height: 2.5rem;
}
.entric_grid .accordion .card .card-header .btn-header-link:after {
    content: "\f062";
    font-family: 'FontAwesome';
    font-weight: 900;
    float: right;
}
.entric_grid .accordion .card-header .btn-header-link.collapsed {
}
.entric_grid .accordion .card-header .btn-header-link.collapsed:after {
    content: "\f063";
}


.custom-switch {
    padding-left: 2.25rem;
}
.custom-control {
    position: relative;
    display: block;
    min-height: 1.5rem;
    padding-left: 1.5rem;
}
.custom-control-input {
    position: absolute;
    z-index: -1;
    opacity: 0;
}
.custom-control-label {
    position: relative;
    margin-bottom: 0;
    vertical-align: top;
}
.custom-control-input:checked ~ .custom-control-label::before {
    color: #fff;
    border-color: #26da87;
    background-color: #26da87;
}
.custom-switch .custom-control-label::before {
    left: -2.25rem;
    width: 4rem;
    pointer-events: all;
    border-radius: .5rem;
}
.custom-control-label::before, .custom-file-label, .custom-select {
    transition: background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.custom-control-label::before {
    position: absolute;
    top: .25rem;
    left: -1.5rem;
    display: block;
    width: 1rem;
    height: 2rem;
    pointer-events: none;
    content: "";
    background-color: #fff;
    border: #adb5bd solid 1px;
        border-top-color: rgb(173, 181, 189);
        border-right-color: rgb(173, 181, 189);
        border-bottom-color: rgb(173, 181, 189);
        border-left-color: rgb(173, 181, 189);
}
.custom-switch .custom-control-input:checked ~ .custom-control-label::after {
    background-color: #fff;
    -webkit-transform: translateX(2rem);
    transform: translateX(2rem);
}
.custom-switch .custom-control-label::after {
    top: calc(.25rem + 2px);
    left: calc(-2.25rem + 2px);
    width: calc(2rem - 4px);
    height: calc(2rem - 4px);
    background-color: #adb5bd;
    border-radius: .5rem;
    transition: background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-transform .15s ease-in-out;
    transition: transform .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: transform .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-transform .15s ease-in-out;
}
.custom-control-label::after {
    position: absolute;
    top: .25rem;
    left: -1.5rem;
    display: block;
    width: 1rem;
    height: 1rem;
    content: "";
    background-repeat: no-repeat;
    background-position: center center;
    background-size: 50% 50%;
}
.entric .btrbl{
    border: 1px solid #e2edf0;
}




#exSliderKcal .slider-selection {
    background: #BABABA;
}
#exSliderPtn .slider-selection {
    background: #BABABA;
}
.slider .tooltip.bs-tooltip-top {
  margin-top: -35px;
}
.slider .bs-tooltip-top .tooltip-inner{
    font-size: 12px;
    border-radius: 1.5rem;
}
#modal_selecao .entric_group_destaque4{
    background-color: #0798c3;
    color: #fff;
    font-size: 14px;
    font-weight: bold;
}
#modal_selecao .entric_group_destaque5{
    background-color: #edf4f5;
    border: 0px solid #e2edf0;
    font-size: 13px;
    color: #417ca2;
    font-weight: normal;
}
#exSliderKcal .arrow{
    /*display: none;*/
    border-top-color: #42bdbd;
}
#exSliderKcal .tooltip-inner{
    background-color: #42bdbd;
    color: #ffffff;
    font-weight: bold;
    /*
    background-color: transparent;
    color: #000;
    font-weight: bold;*/
}

#exSliderPtn .arrow::before{
    border-top-color: #42bdbd;
}
#exSliderPtn .tooltip-inner{
    background-color: #42bdbd;
    color: #ffffff;
    font-weight: bold;
}
input[type="checkbox"].check_apagado + label::before{
    border: 1px solid #eee !important;
}
.fracio_horario input.hora{
    margin-bottom: 10px;
}
.hidratacao_horarios input.hora{
    margin-bottom: 10px;
}

#dispositivos .form-group{
    background-color: #ffffff;
}

#apresentacao .form-group{
    background-color: #ffffff;
}
#row_categoria {
    margin-left: -9px;
    margin-right: -9px;
}


#map {
    display: none;
}

#map .state {
    cursor: pointer;
}

#map .state .shape {
    cursor: pointer;
    -width: 0;
}

#map .state .label_icon_state {
    fill: #fff;
    font-family: Arial;
    font-size: 11px;
    line-height: 12px;
    font-weight: normal;
}

#map .state .label_state {
    display: none;
    font-family: Arial;
    font-size: 14px;
    line-height: 16px;
    font-weight: bold;
}

#map .state:hover .label_state,
#map .state.hover .label_state {
    display: block;
}

#map .model-green .state .shape {
    fill: #42bdbd;
}

#map .model-green .state .icon_state {
    fill: #10592f;
}

#map .model-green .state .label_icon_state {
    fill: #fff;
}

#map .model-green .state .label_state {
    fill: #666;
}

#map .model-green .state:hover .shape,
#map .model-green .state.hover .shape {
    fill: #e29f4b;
}

#map .model-green .state_selected .shape{
    fill: #e29f4b;
}

#map .model-green .state_selected .icon_state{
    fill: #e29f4b;
}

#map .model-green .state:hover .icon_state,
#map .model-green .state.hover .icon_state {
    fill: #e29f4b;
}

#map .model-orange .state .shape {
    fill: #fd7132;
}

#map .model-orange .state .icon_state {
    fill: #6cb361;
}

#map .model-orange .state .label_icon_state {
    fill: #fff;
}

#map .model-orange .state .label_state {
    fill: #666;
}

#map .model-orange .state:hover .shape,
#map .model-orange .state.hover .shape {
    fill: #c93f04;
}

#map .model-orange .state:hover .icon_state,
#map .model-orange .state.hover .icon_state {
    fill: #10592f;
}

#map .model-darkgreen .state .shape {
    fill: #366823;
}

#map .model-darkgreen .state .icon_state {
    fill: #2779c6;
}

#map .model-darkgreen .state .label_icon_state {
    fill: #fff;
}

#map .model-darkgreen .state .label_state {
    fill: #666;
}

#map .model-darkgreen .state:hover .shape,
#map .model-darkgreen .state.hover .shape {
    fill: #4a8c31;
}

#map .model-darkgreen .state:hover .icon_state,
#map .model-darkgreen .state.hover .icon_state {
    fill: #5a95ce;
}


.entric .nav-tabs .nav-link{
    font-size: 13px;
    border-radius: 5px 5px 0px 0px !important;
    min-height: 55px;
    text-align: center;
    padding: .6rem 2.2rem;
}
.entric .nav-link {
    background-color: #dbeaec;
    color: #82aeb3;    
}
.entric .nav-tabs .nav-item {
    padding: 0 3px 0 0px;    
}
.entric .nav-tabs .nav-link.active {
    color:  #ffffff;
    font-size: 13px;
    background-color: #0798c3 !important;
    border-color: #0798c3 #0798c3 #0798c3;
}
.entric .nav-tabs .nav-link:hover {
    background-color: #e5f0f2;
}
.entric .form-group label{
    font-size: 1.25rem;
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
    margin:  -.8rem 1.2rem -.8rem -0.5rem;
    font-size: 13px !important;
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
.disabledTab{
    pointer-events: none;
}
.entric .entric_group_radio{
    margin: 0px;
    border: 1px solid #e2edf0;
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
.input[type="checkbox"].styled-checkbox + label {
    padding-left: 0 !important;
}

.error{
    border: 1px solid #ff0000 !important;
    color: #000;
    font-weight: 300;
}
.tabambos {
    margin-top: -10px;
    margin-right: -10px;
}
.tabnook {
    width: 10px;
    height: 10px;
    background-color: #a94442;
    content: "\e014";
}
.tabok {
    width: 10px;
    height: 10px;
    background-color: #3c763d;
    content: "\e013";
}
</style>