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
    fill: #f0cd1f;
}

#map .model-green .state:hover .icon_state,
#map .model-green .state.hover .icon_state {
    fill: #f0cd1f;
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
</style>