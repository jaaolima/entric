function b_lo(_this){
    setTimeout(function() { b_res(_this) }, 60000);
    _this.html(_this.attr("data-loading-text"));
    _this.attr("disabled", "disabled"); 
}

function b_res(_this){
    _this.html(_this.attr("data-loaded-text"));
    _this.removeAttr("disabled"); 
}

function chkintltell(){
    $('.intltell').mask("(99) 9999-9999?9");
    $(".intltell").focusout(function(){
        var phone, element;
        element = $(this);
        element.unmask();
        phone = element.val().replace(/\D/g, '');
        if(phone.length > 10) {
            element.mask("(99) 99999-999?9");
        } else {
            element.mask("(99) 9999-9999?9");
        }
    }).on('focusout', function(e) {
    });
}

$(function(){

    if(jQuery().mask) {
        $('.cep').mask("99.999-999");
        $('.cpf').mask("999.999.999-99");
        $('.cnpj').mask("99.999.999/9999-99");
        $('.data').mask("99/99/9999");
        $('.media').mask("9,99");
        $('.hora').mask("99:99").on('change', function(e) {
        });
        $('.medianota').mask("9.99");
        $('.telefone').mask("(99) 99999-9999");
        $(".telefone").focusout(function(){
            var phone, element;
            element = $(this);
            element.unmask();
            phone = element.val().replace(/\D/g, '');
            if(phone.length > 10) {
                element.mask("(99) 99999-999?9");
            } else {
                element.mask("(99) 9999-9999?9");
            }
        }).on('focusout', function(e) {
        });
        chkintltell();
    }
    if(jQuery().maskMoney) {
        $('.float').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false});
        $('.floatcomma').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:',', affixesStay: false});
        $('.numeros').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false, precision: 0});
    }
});