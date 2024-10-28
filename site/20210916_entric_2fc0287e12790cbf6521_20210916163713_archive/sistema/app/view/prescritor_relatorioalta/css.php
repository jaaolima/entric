<link href="js/jquery/select2/css/select2.min.css" rel="stylesheet">
<style>
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
    font-size: 13px;

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
    font-size: 13px;
}
#modal_selecao .form-check .form-check-label{
    font-size: 13px;    
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
</style>