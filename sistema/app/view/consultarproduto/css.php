<link href="js/jquery/select2/css/select2.min.css" rel="stylesheet">
<link rel="stylesheet" href="js/jquery/jquery-confirm/jquery-confirm.min.css">
<style>
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
    padding-left: 70px; /* Espaço para o toggle visual à esquerda do texto/imagem */
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
    width: 60px;
    height: 34px;
    background-color: #ccc; /* Cor cinza quando desligado */
    border-radius: 34px; /* Arredonda o trilho */
    transition: background-color 0.4s; /* Suaviza a transição de cor */
}

/* O círculo (thumb) dentro do trilho */
.toggle-switch::before {
    content: "";
    position: absolute;
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px; /* Ajuste para alinhar verticalmente */
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
    transform: translateX(26px); /* Move o círculo */
}

/* Opcional: Efeito de foco para acessibilidade */
.toggle-checkbox:focus + .toggle-label .toggle-switch {
    box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.5); /* Exemplo de foco azul */
}

#add_fabricante {
    pointer-events: auto !important;
    opacity: 1 !important;
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
    font-size: 14px;
    color: #417ca2;
    font-weight: bold;
    line-height: 2.5rem;
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
.disabledTab{
    pointer-events: none;
}
.entric .form-group .entric_radio{
    background-color: #edf4f5;
    padding: 10px;
    border: 1px solid #e2edf0;
    font-size: 13px;
}
.entric .form-radio .entric_radio label{
    font-size: 13px;
    color: #417ca2;
    font-weight: normal;
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
    background-color: #edf4f5;
    border: 0px solid #e2edf0;
    font-size: 13px;
}
.entric .entric_grid{
    background-color: #ffffff;
    border: 0px solid #e2edf0;
    font-size: 13px;
}
.entric .entric_filtrogrid{
    background-color: transparent;
}
.entric .entric_filtrogrid .entric_group {
    background-color: #fff;
}
.entric .btrbl {
  border: 1px solid #e2edf0;
}
.entric .entric_grid .form-group{
    border: 1px solid #e2edf0;
}
.entric_filtrogrid .form-group {
    border: 0px solid #e2edf0 !important;
}
.entric_filtrogridapres .form-group{
    border: 1px solid #e2edf0 !important;
    background-color: #fff;    
}
.entric .entric_grid .grid_label{
    font-size: 14px;
    color: #417ca2;
    font-weight: bold;
    line-height: 2.5rem;
}
#frmfiltroproduto .entric .form-group .entric_group {
    background-color: #edf4f5;
    padding: 10px;
    border: 1px solid #e2edf0;
    font-size: 13px;
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
.entric .form_blue{
    background-color: #edf4f5;
    padding:  15px;
    font-size:  13px;
    color:  #417ca2;;
}
.entric .entric_composicao{
    background-color: #fcf9f9;
}
.entric .entric_composicao table > tbody > tr > td{
    font-size: 11px;
    line-height: normal;
    font-family: Verdana;
    padding: .15rem 0 0.15rem 0.55rem !important;
}
.entric .entric_composicao table > tbody > tr > td:nth-child(2){
    text-align: center;
}
.entric .entric_comptitulo{
    text-align: center;
    color: #417ca2;
}
.entric .bb-line2{
    border-bottom: 1px solid #ebf2f3;
}
input.info_nutri{
    padding-left: 0rem !important;
    height: 17px !important;
    border: 0px solid #dddfe1 !important;
    padding: 0 !important;
    min-height: 0 !important;
    font-size: 11px !important;
    font-weight: normal !important;
    font-family: Verdana;
}
textarea.info_nutri{
    padding-left: 0rem !important;
    border: 0px solid #dddfe1 !important;
    padding: 0 !important;
    min-height: 0 !important;
    font-size: 11px !important;
    font-weight: normal !important;
    font-family: Verdana;
}
.textareacentered textarea.info_nutri{
    text-align: center;
}
.row.equal-cols {
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
}
.entric_grid .table td {
    line-height: normal;
}
.row.equal-cols:before,
.row.equal-cols:after {
  display: block;
}
.row.equal-cols > [class*='col-'] {
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
}
.row.equal-cols > [class*='col-'] > * {
  -webkit-flex: 1 1 auto;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto; 
}

.entric_compo table .input-group-text{
    padding: 0.11rem 0.5rem !important;
    font-size: 11px !important;
}
.entric_compo table input{
    height: 22px !important;
}
.entric_compo table .input-group-append{
    height: 100% !important;
    margin-left: 0px !important;
}

.entric_composicao table .input-group-text{
    padding: 0.11rem 0.5rem !important;
    font-size: 11px !important;
}
.entric_composicao table input{
    height: 22px !important;
}
.entric_composicao table .input-group-append{
    height: 100% !important;
    margin-left: 0px !important;
}
.entric .plr12{
    padding-left: 12px;
    padding-right: 12px;
}
.entric .plborder{
    border: 1px solid #e2edf0;
}
.entric .plr12 .label-3{
    margin-left: -3px;
    font-size: 12px;
    font-weight:  bold;
}
.entric_table > thead > tr > th {
    font-size: 13px;
}
.entric_table td {
    line-height: 2.5rem !important;
    font-size: 12px !important;
}
.toast-top-center {
    top: 12px;
    margin: 0 auto;
}
.entric .densidades .nav-tabs .nav-link{
    min-height: 35px;
}
.entric .densidades .nav-tabs .nav-link{
    min-height: 35px;
}
.entric .densidades .tab-pane.active{
    background: #fff !important;
}
.entric .apresentacao .nav-tabs .nav-link{
    min-height: 35px;
}
.entric .apresentacao .nav-tabs .nav-link{
    min-height: 35px;
}
.entric .apresentacao .tab-pane.active{
    background: #fff !important;
}
/*
.jconfirm .jconfirm-title{
    font-size: 1.6rem !important;
    color: #abafb3;
}
-*/
.jconfirm .control-label{
    font-size: 13px;
    color: #417c8c;
}
.jconfirm .jconfirm-box .jconfirm-buttons button{
    font-size: 13px !important;
    border-radius: 5px !important;
    text-transform:  none !important;
    font-weight: 500 !important;
}
.entric .produto_qtd tr{
    background-color: transparent !important;
}
.entric .required span{
    color: #ee3900;
    font-weight: normal;
    font-size: 12px;
    opacity: 0.5;
}
.jconfirm .jconfirm-box.jconfirm-type-green .jconfirm-title-c .jconfirm-icon-c {
    color: #0798c3 !important;
}

#modal_retorno_produto .alert i{
    font-size:  18px;
}
#modal_retorno_produto .alert{
    font-size: 1.4rem;
}

#filtro_resultado_dados tbody td:nth-child(3){
    font-size: 14px;
    font-weight: bold;
}
</style>