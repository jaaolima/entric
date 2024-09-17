<link rel="stylesheet" href="js/jquery/jquery-confirm/jquery-confirm.min.css">
<style>
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

#map .model-green .state_selected .shape{
    fill: #e29f4b;
}

#map .model-green .state_selected .icon_state{
    fill: #e29f4b;
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
.entric  .grid_label {
  font-size: 14px;
  color: #417ca2;
  font-weight: bold;
  line-height: 2.5rem;
}
</style>