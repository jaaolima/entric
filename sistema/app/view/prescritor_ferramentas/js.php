<script src="assets/plugins/pdfobject/pdfobject.min.js"></script>
<script src="js/bootstrap/bootstrap-input-spinner/bootstrap-input-spinner.js"></script>
<script src="js/bootstrap/bootstrap-input-spinner/custom-editors.js"></script>
<script>
function numberFormatPrecision(theform, _decimal) {
    return (Math.floor(theform * 100) / 100).toFixed(_decimal);
}

function fc_AlturaEstimada(){
    if (($('input[name=f1_sexo]').is(":checked") == true) && ($('input[name=f1_etnia]').is(":checked") == true) && ($('#f1_idade').val() !== "") && ($('#f1_altura_joelho').val() !== "")){
    	var _sexo = $('input[name=f1_sexo]:checked').val();
    	var _etnia = $('input[name=f1_etnia]:checked').val();
    	var _idade = $('#f1_idade').val();
    	var _altura_joelho = $('#f1_altura_joelho').val();
    	var _E = "";

        if (_idade < 6){

            $("#f1_resultado").html("Não foi possível calcular pois as fórmulas de estimativa são aplicáveis apenas para indivíduos a partir de 06 anos");
            $("#f1_resultado").show();
        }
        else{

        	if ((_sexo == "Feminino") && (_etnia == "Negro")){
        		if ((_idade>=6) && (_idade<=18)){
        			_E = 46.59 + (2.02 * _altura_joelho);
        		}
        		else if ((_idade>=19) && (_idade<=60)){
        			_E = 68.10 + (1.86 * _altura_joelho) - (0.06 * _idade);
        		}
        		else if (_idade>60){
        			_E = 58.72 + (1.96 * _altura_joelho);
        		}
        	}
        	else if ((_sexo == "Feminino") && (_etnia == "Branco")){
        		if ((_idade>=6) && (_idade<=18)){
        			_E = 43.21 + (2.14 * _altura_joelho);
        		}
        		else if ((_idade>=19) && (_idade<=60)){
        			_E = 70.25 + (1.87 * _altura_joelho) - (0.06 * _idade);
        		}
        		else if (_idade>60){
        			_E = 75 + (1.91 * _altura_joelho) - (0.17 * _idade);
        		}
        	}
        	else if ((_sexo == "Masculino") && (_etnia == "Negro")){
        		if ((_idade>=6) && (_idade<=18)){
        			_E = 39.60 + (2.18 * _altura_joelho);
        		}
        		else if ((_idade>=19) && (_idade<=60)){
        			_E = 73.42 + (1.79 * _altura_joelho);
        		}
        		else if (_idade>60){
        			_E = 95.79 + (1.37 * _altura_joelho);
        		}
        	}
        	else if ((_sexo == "Masculino") && (_etnia == "Branco")){
        		if ((_idade>=6) && (_idade<=18)){
        			_E = 40.54 + (2.22 * _altura_joelho);
        		}
        		else if ((_idade>=19) && (_idade<=60)){
        			_E = 71.85 + (1.88 * _altura_joelho);
        		}
        		else if (_idade>60){
        			_E = 59.01 + (2.08 * _altura_joelho);
        		}
        	}

        	$("#f1_resultado").html("Resultado:  "+numberFormatPrecision(_E, 2)+" cm");
        	$("#f1_resultado").show();
        }

    }else{
    	$("#f1_resultado").html("Resultado:  ");
    	$("#f1_resultado").hide();
    }
}

function fc_DrogasVasoativas(){
    if (($('#f2_vazao').val() !== "") && ($('#f2_peso').val() !== "") && ($('#f2_ampolas').val() !== "") && ($('#f2_soro').val() !== "")){
        var f2_vazao = $('#f2_vazao').val();
        var f2_peso = $('#f2_peso').val();
        var f2_ampolas = $('#f2_ampolas').val();
        var f2_soro = $('#f2_soro').val();
        var _R = "";

        //_R = (f2_vazao * (f2_ampolas * 4 * 1000 / f2_soro)) / f2_peso
        _R = ((f2_vazao * (f2_ampolas * 4 * 1000 / f2_soro)) / f2_peso) / 60;


        $("#f2_resultado").html("Resultado:  Noradrenalina "+numberFormatPrecision(_R, 2)+ " Mcg/kg/min");
        $("#f2_resultado").show();

    }else{
        $("#f2_resultado").html("Resultado:  ");
        $("#f2_resultado").hide();
    }
}

function fc_PesoIdeal(){
    if (($('#f4_tipo').val() !== "") && ($('#f4_sexo').val() !== "") && ($('#f4_altura').val() !== "") && ($('#f4_imc').val() !== "")){
        var f4_tipo = $('#f4_tipo').val();
        var f4_sexo = $('#f4_sexo').val();
        var f4_altura = $('#f4_altura').val();
        var f4_imc = $('#f4_imc').val();
        var _R = "";

        _R = f4_imc * (f4_altura * f4_altura) 


        $("#f4_resultado").html("Resultado: "+numberFormatPrecision(_R, 2)+ " kg ");
        $("#f4_resultado").show();

    }else{
        $("#f4_resultado").html("Resultado:  ");
        $("#f4_resultado").hide();
    }
}

function fc_PesoEstimado(){
    if (($('input[name=f3_sexo]').is(":checked") == true) && ($('input[name=f3_etnia]').is(":checked") == true) && ($('#f3_idade').val() !== "") && ($('#f3_altura_joelho').val() !== "") && ($('#f3_braco').val() !== "")){
        var _sexo = $('input[name=f3_sexo]:checked').val();
        var _etnia = $('input[name=f3_etnia]:checked').val();
        var _idade = $('#f3_idade').val();
        var _altura_joelho = $('#f3_altura_joelho').val();
        var _braco = $('#f3_braco').val();
        var _E = "";

        if ((_sexo == "Feminino") && (_etnia == "Negro")){
            if ((_idade>=19) && (_idade<=59)){
                _E = (_altura_joelho*1.24) + (_braco*2.97) - 82.48;
            }
            else if ((_idade>=60) && (_idade<=80)){
                _E = (_altura_joelho*1.50) + (_braco*2.58) - 84.22;
            }
        }
        else if ((_sexo == "Feminino") && (_etnia == "Branco")){
            if ((_idade>=19) && (_idade<=59)){
                _E = (_altura_joelho*1.01) + (_braco*2.81) - 66.04;
            }
            else if ((_idade>=60) && (_idade<=80)){
                _E = (_altura_joelho*1.09) + (_braco*2.68) - 65.51;
            }
        }
        else if ((_sexo == "Masculino") && (_etnia == "Negro")){
            if ((_idade>=19) && (_idade<=59)){
                _E = (_altura_joelho*1.09) + (_braco*3.14) - 83.72;
            }
            else if ((_idade>=60) && (_idade<=80)){
                _E = (_altura_joelho*0.44) + (_braco*2.86) - 39.21;
            }
        }
        else if ((_sexo == "Masculino") && (_etnia == "Branco")){
            if ((_idade>=19) && (_idade<=59)){
                _E = (_altura_joelho*1.19) + (_braco*3.14) - 86.82;
            }
            else if ((_idade>=60) && (_idade<=80)){
                _E = (_altura_joelho*1.10) + (_braco*3.07) - 75.81;
            }
        }

        if (numberFormatPrecision(_E, 2) == "0.00"){
            $("#f3_resultado").html("Resultado:  Não foi possível calcular pois as fórmulas são aplicáveis apenas para indivíduos de 19 a 80 anos");
        }else{
            $("#f3_resultado").html("Resultado:  "+numberFormatPrecision(_E, 2));
        }
        $("#f3_resultado").show();

    }else{
        $("#f3_resultado").html("Resultado:  ");
        $("#f3_resultado").hide();
    }
}

function fc_CaloriasPropofol(){
    if (($('#f7_propofol').val() !== "") && ($('#f7_horas').val() !== "")){
        var f7_propofol = $('#f7_propofol').val();
        var f7_horas = $('#f7_horas').val();
        var _R = "";

        _R = (f7_propofol * f7_horas) * 1.1;
        _R = numberFormatPrecision(_R, 2); 

        $("#f7_resultado").html("Resultado: "+_R);
        $("#f7_resultado").show();

    }else{
        $("#f7_resultado").html("Resultado:  ");
        $("#f7_resultado").hide();
    }
}

function fc_Gotejamento(){
    if (($('#f8_volume_total').val() !== "") && ($('#f8_horario').val() !== "")){
        var f8_volume_total = $('#f8_volume_total').val();
        var f8_horario = $('#f8_horario').val();

        var _R = f8_volume_total / f8_horario;
        _R = numberFormatPrecision(_R, 2);
        $("#f8_volume").val(_R);
    }else{
        $("#f8_volume").val(""); 
    }

    if (($('input[name=f8_gota]').is(":checked") == true) && ($('#f8_volume').val() !== "") && ($('#f8_infusao').val() !== "")){
        var f8_gota = $('input[name=f8_gota]:checked').val();
        var f8_volume = $('#f8_volume').val();
        var f8_infusao = $('#f8_infusao').val();
        var _R = "";

        if (f8_gota == "Macro"){
            console.log(f8_volume);
            console.log(f8_infusao);
            _R = f8_volume / (f8_infusao * 3);
            console.log(_R);
            _R = numberFormatPrecision(_R, 2);
            console.log(_R);

            $("#f8_gotejamento").val(_R);
        }
        else{
            _R = f8_volume / f8_infusao;
            _R = numberFormatPrecision(_R, 0);
            $("#f8_gotejamento").val(_R);
        }

    }else{
        $("#f8_gotejamento").val("");
    }
}

function fc_nrs_2002(){
    if (($('input[name=f9_1]').is(":checked") == true) && ($('input[name=f9_2]').is(":checked") == true) && ($('input[name=f9_3]').is(":checked") == true) && ($('input[name=f9_4]').is(":checked") == true)){
        var f9_1 = $('input[name=f9_1]:checked').val();
        var f9_2 = $('input[name=f9_2]:checked').val();
        var f9_3 = $('input[name=f9_3]:checked').val();
        var f9_4 = $('input[name=f9_4]:checked').val();
        var _R = "";

        if ((f9_1 == "Não") && (f9_2 == "Não") && (f9_3 == "Não") && (f9_4 == "Não")){
            _R = "PACIENTE SEM RISCO NUTRICIONAL";

            $("#f9_resultado").html("Resultado:  "+_R);
            $("#f9_resultado").show();
        }
        else{
            $("#f9_etapa1").hide();
            $("#f9_etapa2").show();

            if (($('input[name=f91_1]').is(":checked") == true) && ($('input[name=f91_2]').is(":checked") == true) && ($('input[name=f91_3]').is(":checked") == true)){
                var f91_1 = $('input[name=f91_1]:checked').val();
                var f91_2 = $('input[name=f91_2]:checked').val();
                var f91_3 = $('input[name=f91_3]:checked').val();
                var pontos = 0;
                var _R = "";

                if (f91_1 == 2) pontos = pontos + 1;
                if (f91_1 == 3) pontos = pontos + 2;
                if (f91_1 == 4) pontos = pontos + 3;

                if (f91_2 == 2) pontos = pontos + 1;
                if (f91_2 == 3) pontos = pontos + 2;
                if (f91_2 == 4) pontos = pontos + 3;

                if (f91_3 == 1) pontos = pontos + 1;

                if (pontos >= 3){
                    _R = "O paciente está em risco nutricional e a terapia nutricional deve ser iniciada.";
                }
                else{                    
                    _R = "No momento, o paciente não apresenta risco nutricional e deve ser reavaliado semanalmente. Porém, se o paciente tiver indicação de cirurgia de grande porte, deve-se considerar terapia nutricional para evitar riscos associados.";
                }

                $("#f9_resultado").html("Resultado:  "+_R);
                $("#f9_resultado").show();
            }
        }

    }else{
        $("#f9_resultado").html("Resultado:  ");
        $("#f9_resultado").hide();
    }
}

function fc_f5_imc_peso(){
    if (($('#f5_sexo').val() !== "") && ($('#f5_idade').val() !== "") && ($('#f5_peso').val() !== "") && ($('#f5_altura').val() !== "")){
        var f5_sexo = $('#f5_sexo').val();
        var f5_idade = $('#f5_idade').val();
        var f5_peso = $('#f5_peso').val();
        var f5_altura = $('#f5_altura').val();
        var _imc = "";
        var _imc_media = 0;
        var _pi = "";
        var _R = "";

        if (f5_idade < 60){
            _R = _R + "Homens: 22 kg/m²";
            _R = _R + "<br>Mulheres: 21 kg/m²";

            if (f5_sexo == "Masculino"){
                _imc_media = 22;
            }
            else{
                _imc_media = 21;
            }
        }
        else{
            _R = _R + "Homens: 24,5 kg/m²";
            _R = _R + "<br>Mulheres: 24,5 kg/m²";
            _imc_media = 24.5;
        }

        _imc = f5_peso / (f5_altura * f5_altura);
        _imc = numberFormatPrecision(_imc, 2);

        _pi = (f5_altura * f5_altura) * _imc_media;
        _pi = numberFormatPrecision(_pi, 2);

        $(".f5_imc").val(_imc);
        $(".f5_imc_div").removeClass('none');
        $(".f5_peso_ideal").val(_pi);
        $(".f5_peso_ideal_div").removeClass('none');

        $("#f5_resultado").html(_R);
        $("#f5_resultado").show();
        $("#f5_caloria_proteina").hide();

    }else{
        $("#f5_resultado").html("");
        $("#f5_resultado").hide();
        $(".f5_imc_div").addClass('none');
        $(".f5_peso_ideal_div").addClass('none');
        $("#f5_caloria_proteina").hide();
    }
}

function fc_f5_calcular(){
    if (($('#f5_sexo').val() !== "") && ($('#f5_idade').val() !== "") && ($('#f5_peso').val() !== "") && ($('#f5_altura').val() !== "")){
        var f5_sexo = $('#f5_sexo').val();
        var f5_idade = $('#f5_idade').val();
        var f5_peso = $('#f5_peso').val();
        var f5_altura = $('#f5_altura').val();
        var _imc = "";
        var _imc_media = 0;
        var _pi = "";
        var _R = "";

        if (f5_idade < 60){
            if (f5_sexo == "Masculino"){
                _imc_media = 22;
            }
            else{
                _imc_media = 21;
            }
        }
        else{
            _imc_media = 24.5;
        }

        _imc = f5_peso / (f5_altura * f5_altura);
        _imc = numberFormatPrecision(_imc, 2);
        _pi = (f5_altura * f5_altura) * _imc_media;
        _pi = numberFormatPrecision(_pi, 2);

        if (_imc < 30){
            $("#f5_cal_valor").val("25");
            $("#f5_cal_valor_min").val("25"); //$("#f5_cal_valor").attr("min", "25");
            $("#f5_cal_valor_max").val("30"); //$("#f5_cal_valor").attr("max", "30");
            $("#f5_prot_valor").val("1.5");
            $("#f5_prot_valor_min").val("1.5"); //$("#f5_prot_valor").attr("min", "1.5");
            $("#f5_prot_valor_max").val("2"); //$("#f5_prot_valor").attr("max", "2");

            $("#f5_cal_peso").val(f5_peso);
            $("#f5_prot_peso").val(f5_peso);
            $('#f5_peso_calorias option[value="Peso Atual"]').prop('selected', 'selected').change();
            $('#f5_peso_proteina option[value="Peso Atual"]').prop('selected', 'selected').change();


            var f5_cal_total = 0;
            var f5_cal_peso = $('#f5_cal_peso').val();
            var f5_cal_valor = $('#f5_cal_valor').val();
            f5_cal_total = f5_cal_peso * f5_cal_valor;
            //f5_cal_total = numberFormatPrecision(f5_cal_total, 2);
            //$("#f5_cal_total").html(f5_cal_total+"kcal ("+f5_cal_valor+"kcal/peso atual)");
            f5_cal_total = numberFormatPrecision(f5_cal_total, 0);
            $("#f5_cal_total").html(f5_cal_total+"kcal");

            var f5_prot_total = 0;
            var f5_prot_peso = $('#f5_prot_peso').val();
            var f5_prot_valor = $('#f5_prot_valor').val();
            f5_prot_total = f5_prot_peso * f5_prot_valor;
            //f5_prot_total = numberFormatPrecision(f5_prot_total, 2);
            //$("#f5_prot_total").html(f5_prot_total+"g ("+f5_prot_valor+"g/kg/peso atual)");
            f5_prot_total = numberFormatPrecision(f5_prot_total, 1);
            $("#f5_prot_total").html(f5_prot_total+"g");
        }
        else if ((_imc >= 30) && (_imc <= 40)){
            $("#f5_cal_valor").val("11");
            $("#f5_cal_valor_min").val("11"); //$("#f5_cal_valor").attr("min", "11");
            $("#f5_cal_valor_max").val("14"); //$("#f5_cal_valor").attr("max", "14");
            $("#f5_prot_valor").val("2");
            $("#f5_prot_valor_min").val("2"); //$("#f5_prot_valor").attr("min", "2");
            $("#f5_prot_valor_max").val("2"); //$("#f5_prot_valor").attr("max", "2");

            $("#f5_cal_peso").val(f5_peso);
            $("#f5_prot_peso").val(_pi);
            $('#f5_peso_calorias option[value="Peso Atual"]').prop('selected', 'selected').change();
            $('#f5_peso_proteina option[value="Peso Ideal"]').prop('selected', 'selected').change();

            var f5_cal_total = 0;
            var f5_cal_peso = $('#f5_cal_peso').val();
            var f5_cal_valor = $('#f5_cal_valor').val();
            f5_cal_total = f5_cal_peso * f5_cal_valor;
            //f5_cal_total = numberFormatPrecision(f5_cal_total, 2);
            //$("#f5_cal_total").html(f5_cal_total+"kcal ("+f5_cal_valor+"kcal/peso atual)");
            f5_cal_total = numberFormatPrecision(f5_cal_total, 0);
            $("#f5_cal_total").html(f5_cal_total+"kcal");

            var f5_prot_total = 0;
            var f5_prot_peso = $('#f5_prot_peso').val();
            var f5_prot_valor = $('#f5_prot_valor').val();
            f5_prot_total = f5_prot_peso * f5_prot_valor;
            //f5_prot_total = numberFormatPrecision(f5_prot_total, 2);
            //$("#f5_prot_total").html(f5_prot_total+"g ("+f5_prot_valor+"g/kg/peso ideal)");
            f5_prot_total = numberFormatPrecision(f5_prot_total, 1);
            $("#f5_prot_total").html(f5_prot_total+"g");
        }
        else if ((_imc >= 30) && (_imc <= 50)){
            $("#f5_cal_valor").val("11");
            $("#f5_cal_valor_min").val("11"); //$("#f5_cal_valor").attr("min", "11");
            $("#f5_cal_valor_max").val("14"); //$("#f5_cal_valor").attr("max", "14");
            $("#f5_prot_valor").val("2");
            $("#f5_prot_valor_min").val("2"); //$("#f5_prot_valor").attr("min", "2");
            $("#f5_prot_valor_max").val("2.5"); //$("#f5_prot_valor").attr("max", "2.5");

            $("#f5_cal_peso").val(f5_peso);
            $("#f5_prot_peso").val(_pi);
            $('#f5_peso_calorias option[value="Peso Atual"]').prop('selected', 'selected').change();
            $('#f5_peso_proteina option[value="Peso Ideal"]').prop('selected', 'selected').change();


            var f5_cal_total = 0;
            var f5_cal_peso = $('#f5_cal_peso').val();
            var f5_cal_valor = $('#f5_cal_valor').val();
            f5_cal_total = f5_cal_peso * f5_cal_valor;
            //f5_cal_total = numberFormatPrecision(f5_cal_total, 2);
            //$("#f5_cal_total").html(f5_cal_total+"kcal ("+f5_cal_valor+"kcal/peso atual)");
            f5_cal_total = numberFormatPrecision(f5_cal_total, 0);
            $("#f5_cal_total").html(f5_cal_total+"kcal");

            var f5_prot_total = 0;
            var f5_prot_peso = $('#f5_prot_peso').val();
            var f5_prot_valor = $('#f5_prot_valor').val();
            f5_prot_total = f5_prot_peso * f5_prot_valor;
            //f5_prot_total = numberFormatPrecision(f5_prot_total, 2);
            //$("#f5_prot_total").html(f5_prot_total+"g ("+f5_prot_valor+"g/kg/peso ideal)");
            f5_prot_total = numberFormatPrecision(f5_prot_total, 1);
            $("#f5_prot_total").html(f5_prot_total+"g");
        }
        else if (_imc > 50){
            $("#f5_cal_valor").val("22");
            $("#f5_cal_valor_min").val("22"); //$("#f5_cal_valor").attr("min", "22");
            $("#f5_cal_valor_max").val("25"); //$("#f5_cal_valor").attr("max", "25");
            $("#f5_prot_valor").val("2");
            $("#f5_prot_valor_min").val("2"); //$("#f5_prot_valor").attr("min", "2");
            $("#f5_prot_valor_max").val("2.5"); //$("#f5_prot_valor").attr("max", "2.5");

            $("#f5_cal_peso").val(_pi);
            $("#f5_prot_peso").val(_pi);
            $('#f5_peso_calorias option[value="Peso Ideal"]').prop('selected', 'selected').change();
            $('#f5_peso_proteina option[value="Peso Ideal"]').prop('selected', 'selected').change();


            var f5_cal_total = 0;
            var f5_cal_peso = $('#f5_cal_peso').val();
            var f5_cal_valor = $('#f5_cal_valor').val();
            f5_cal_total = f5_cal_peso * f5_cal_valor;
            //f5_cal_total = numberFormatPrecision(f5_cal_total, 2);
            //$("#f5_cal_total").html(f5_cal_total+"kcal ("+f5_cal_valor+"kcal/peso ideal)");
            f5_cal_total = numberFormatPrecision(f5_cal_total, 0);
            $("#f5_cal_total").html(f5_cal_total+"kcal");

            var f5_prot_total = 0;
            var f5_prot_peso = $('#f5_prot_peso').val();
            var f5_prot_valor = $('#f5_prot_valor').val();
            f5_prot_total = f5_prot_peso * f5_prot_valor;
            //f5_prot_total = numberFormatPrecision(f5_prot_total, 2);
            //$("#f5_prot_total").html(f5_prot_total+"g ("+f5_prot_valor+"g/kg/peso ideal)");
            f5_prot_total = numberFormatPrecision(f5_prot_total, 1);
            $("#f5_prot_total").html(f5_prot_total+"g");
        }

        $("#f5_caloria_proteina").show();

    }else{
        $("#f5_caloria_proteina").hide();
    }
}

function fc_f5_recalcular(){
    if (($('#f5_sexo').val() !== "") && ($('#f5_idade').val() !== "") && ($('#f5_peso').val() !== "") && ($('#f5_altura').val() !== "")){
        var f5_sexo = $('#f5_sexo').val();
        var f5_idade = $('#f5_idade').val();
        var f5_peso = $('#f5_peso').val();
        var f5_altura = $('#f5_altura').val();
        var _imc = "";
        var _imc_media = 0;
        var _pi = "";
        var _R = "";

        if (f5_idade < 60){
            if (f5_sexo == "Masculino"){
                _imc_media = 22;
            }
            else{
                _imc_media = 21;
            }
        }
        else{
            _imc_media = 24.5;
        }

        _imc = f5_peso / (f5_altura * f5_altura);
        _imc = numberFormatPrecision(_imc, 2);
        _pi = (f5_altura * f5_altura) * _imc_media;
        _pi = numberFormatPrecision(_pi, 2);

        if (_imc < 30){
            var f5_cal_total = 0;
            var f5_cal_peso = $('#f5_cal_peso').val();
            var f5_cal_valor = $('#f5_cal_valor').val();
            var f5_cal_valor_min = $('#f5_cal_valor_min').val();
            var f5_cal_valor_max = $('#f5_cal_valor_max').val();
            if ((f5_cal_valor < f5_cal_valor_min) || (f5_cal_valor > f5_cal_valor_max)){
                $('.f5_cal_valor').addClass('f5_vermelho');
            }else{
                $('.f5_cal_valor').removeClass('f5_vermelho');
            }
            f5_cal_total = f5_cal_peso * f5_cal_valor;
            //f5_cal_total = numberFormatPrecision(f5_cal_total, 2);
            //$("#f5_cal_total").html(f5_cal_total+"kcal ("+f5_cal_valor+"kcal/peso atual)");
            f5_cal_total = numberFormatPrecision(f5_cal_total, 0);
            $("#f5_cal_total").html(f5_cal_total+"kcal");

            var f5_prot_total = 0;
            var f5_prot_peso = $('#f5_prot_peso').val();
            var f5_prot_valor = $('#f5_prot_valor').val();
            var f5_prot_valor_min = $('#f5_prot_valor_min').val();
            var f5_prot_valor_max = $('#f5_prot_valor_max').val();
            if ((f5_prot_valor < f5_prot_valor_min) || (f5_prot_valor > f5_prot_valor_max)){
                $('.f5_prot_valor').addClass('f5_vermelho');
            }else{
                $('.f5_prot_valor').removeClass('f5_vermelho');
            }
            f5_prot_total = f5_prot_peso * f5_prot_valor;
            //f5_prot_total = numberFormatPrecision(f5_prot_total, 2);
            //$("#f5_prot_total").html(f5_prot_total+"g ("+f5_prot_valor+"g/kg/peso atual)");
            f5_prot_total = numberFormatPrecision(f5_prot_total, 1);
            $("#f5_prot_total").html(f5_prot_total+"g");
        }
        else if ((_imc >= 30) && (_imc <= 40)){
            var f5_cal_total = 0;
            var f5_cal_peso = $('#f5_cal_peso').val();
            var f5_cal_valor = $('#f5_cal_valor').val();
            var f5_cal_valor_min = $('#f5_cal_valor_min').val();
            var f5_cal_valor_max = $('#f5_cal_valor_max').val();
            if ((f5_cal_valor < f5_cal_valor_min) || (f5_cal_valor > f5_cal_valor_max)){
                $('.f5_cal_valor').addClass('f5_vermelho');
            }else{
                $('.f5_cal_valor').removeClass('f5_vermelho');
            }
            f5_cal_total = f5_cal_peso * f5_cal_valor;
            //f5_cal_total = numberFormatPrecision(f5_cal_total, 2);
            //$("#f5_cal_total").html(f5_cal_total+"kcal ("+f5_cal_valor+"kcal/peso atual)");
            f5_cal_total = numberFormatPrecision(f5_cal_total, 0);
            $("#f5_cal_total").html(f5_cal_total+"kcal");

            var f5_prot_total = 0;
            var f5_prot_peso = $('#f5_prot_peso').val();
            var f5_prot_valor = $('#f5_prot_valor').val();
            var f5_prot_valor_min = $('#f5_prot_valor_min').val();
            var f5_prot_valor_max = $('#f5_prot_valor_max').val();
            if ((f5_prot_valor < f5_prot_valor_min) || (f5_prot_valor > f5_prot_valor_max)){
                $('.f5_prot_valor').addClass('f5_vermelho');
            }else{
                $('.f5_prot_valor').removeClass('f5_vermelho');
            }
            f5_prot_total = f5_prot_peso * f5_prot_valor;
            //f5_prot_total = numberFormatPrecision(f5_prot_total, 2);
            //$("#f5_prot_total").html(f5_prot_total+"g ("+f5_prot_valor+"g/kg/peso ideal)");
            f5_prot_total = numberFormatPrecision(f5_prot_total, 1);
            $("#f5_prot_total").html(f5_prot_total+"g");
        }
        else if ((_imc >= 30) && (_imc <= 50)){
            var f5_cal_total = 0;
            var f5_cal_peso = $('#f5_cal_peso').val();
            var f5_cal_valor = $('#f5_cal_valor').val();
            var f5_cal_valor_min = $('#f5_cal_valor_min').val();
            var f5_cal_valor_max = $('#f5_cal_valor_max').val();
            if ((f5_cal_valor < f5_cal_valor_min) || (f5_cal_valor > f5_cal_valor_max)){
                $('.f5_cal_valor').addClass('f5_vermelho');
            }else{
                $('.f5_cal_valor').removeClass('f5_vermelho');
            }
            f5_cal_total = f5_cal_peso * f5_cal_valor;
            //f5_cal_total = numberFormatPrecision(f5_cal_total, 2);
            //$("#f5_cal_total").html(f5_cal_total+"kcal ("+f5_prot_valor+"kcal/peso atual)");
            f5_cal_total = numberFormatPrecision(f5_cal_total, 0);
            $("#f5_cal_total").html(f5_cal_total+"kcal");

            var f5_prot_total = 0;
            var f5_prot_peso = $('#f5_prot_peso').val();
            var f5_prot_valor = $('#f5_prot_valor').val();
            var f5_prot_valor_min = $('#f5_prot_valor_min').val();
            var f5_prot_valor_max = $('#f5_prot_valor_max').val();
            if ((f5_prot_valor < f5_prot_valor_min) || (f5_prot_valor > f5_prot_valor_max)){
                $('.f5_prot_valor').addClass('f5_vermelho');
            }else{
                $('.f5_prot_valor').removeClass('f5_vermelho');
            }
            f5_prot_total = f5_prot_peso * f5_prot_valor;
            //f5_prot_total = numberFormatPrecision(f5_prot_total, 2);
            //$("#f5_prot_total").html(f5_prot_total+"g ("+f5_prot_peso+"g/kg/peso ideal)");
            f5_prot_total = numberFormatPrecision(f5_prot_total, 1);
            $("#f5_prot_total").html(f5_prot_total+"g");
        }
        else if (_imc > 50){
            var f5_cal_total = 0;
            var f5_cal_peso = $('#f5_cal_peso').val();
            var f5_cal_valor = $('#f5_cal_valor').val();
            var f5_cal_valor_min = $('#f5_cal_valor_min').val();
            var f5_cal_valor_max = $('#f5_cal_valor_max').val();
            if ((f5_cal_valor < f5_cal_valor_min) || (f5_cal_valor > f5_cal_valor_max)){
                $('.f5_cal_valor').addClass('f5_vermelho');
            }else{
                $('.f5_cal_valor').removeClass('f5_vermelho');
            }
            f5_cal_total = f5_cal_peso * f5_cal_valor;
            //f5_cal_total = numberFormatPrecision(f5_cal_total, 2);
            //$("#f5_cal_total").html(f5_cal_total+"kcal ("+f5_cal_valor+"kcal/peso ideal)");
            f5_cal_total = numberFormatPrecision(f5_cal_total, 0);
            $("#f5_cal_total").html(f5_cal_total+"kcal");

            var f5_prot_total = 0;
            var f5_prot_peso = $('#f5_prot_peso').val();
            var f5_prot_valor = $('#f5_prot_valor').val();
            var f5_prot_valor_min = $('#f5_prot_valor_min').val();
            var f5_prot_valor_max = $('#f5_prot_valor_max').val();
            if ((f5_prot_valor < f5_prot_valor_min) || (f5_prot_valor > f5_prot_valor_max)){
                $('.f5_prot_valor').addClass('f5_vermelho');
            }else{
                $('.f5_prot_valor').removeClass('f5_vermelho');
            }
            f5_prot_total = f5_prot_peso * f5_prot_valor;
            //f5_prot_total = numberFormatPrecision(f5_prot_total, 2);
            //$("#f5_prot_total").html(f5_prot_total+"g ("+f5_prot_valor+"g/kg/peso ideal)");
            f5_prot_total = numberFormatPrecision(f5_prot_total, 1);
            $("#f5_prot_total").html(f5_prot_total+"g");
        }

        $("#f5_caloria_proteina").show();

    }else{
        $("#f5_caloria_proteina").hide();
    }
}

function fc_f10_calcular(){
    var _R = 0;
    var f10_peso_corporal_6meses = $('input[name=f10_peso_corporal_6meses]:checked').val();
    if (f10_peso_corporal_6meses == "Sim") _R = _R + 1;

    var f10_peso_corporal_continua = $('input[name=f10_peso_corporal_continua]:checked').val();
    if (f10_peso_corporal_continua == "Sim"){
        var pesohabitual = $('input[name=f10_peso_corporal_pesohabitual]').val();
        var pesoatual = $('input[name=f10_peso_corporal_pesoatual]').val();
        var _Rpeso = ((pesohabitual - pesoatual) * 100) / pesohabitual;
        _Rpeso = numberFormatPrecision(_Rpeso, 0);
        if (_Rpeso < 10)
            _R = _R + 1;
        else
            _R = _R + 2;
        $(".f10_resultado_peso_corporal").html("<strong>"+_Rpeso + "% </strong>");
    }

    var f10_ingesta_alimentar_mudanca = $('input[name=f10_ingesta_alimentar_mudanca]:checked').val();
    if (f10_ingesta_alimentar_mudanca == "Sim") _R = _R + 1;
    $('input[name=f10_ingesta_alimentar_mudanca_para]:checked').each(function () {
        //var f10_ingesta_alimentar_mudanca_para = $('input[name=f10_ingesta_alimentar_mudanca_para]:checked').val();
        var f10_ingesta_alimentar_mudanca_para = $(this).val();
        if (f10_ingesta_alimentar_mudanca_para == "dieta hipocalórica") _R = _R + 1;
        if (f10_ingesta_alimentar_mudanca_para == "dieta pastosa hipocalórica") _R = _R + 2;
        if (f10_ingesta_alimentar_mudanca_para == "dieta líquida > 15 dias ou solução de infusão intravenosa > 5 dias") _R = _R + 2;
        if (f10_ingesta_alimentar_mudanca_para == "jejum > 5 dias") _R = _R + 3;
        if (f10_ingesta_alimentar_mudanca_para == "mudança persistente > 30 dias") _R = _R + 2;
    });

    $('input[name=f10_sintomas_gastrintestinais]:checked').each(function () {
        var f10_sintomas_gastrintestinais = $(this).val();
        if (f10_sintomas_gastrintestinais == "disfagia ou odinofagia") _R = _R + 1;
        if (f10_sintomas_gastrintestinais == "náuseas") _R = _R + 1;
        if (f10_sintomas_gastrintestinais == "vômitos") _R = _R + 1;
        if (f10_sintomas_gastrintestinais == "anorexia, distensão abdominal e/ou dor abdominal") _R = _R + 2;
        if (f10_sintomas_gastrintestinais == "diarréia") _R = _R + 1;
    }); 

    var f10_capacidade_funcional = $('input[name=f10_capacidade_funcional]:checked').val();
    if (f10_capacidade_funcional == "abaixo do normal") _R = _R + 1;
    if (f10_capacidade_funcional == "acamado") _R = _R + 2;

    var f10_diagnostico_clinico = $('input[name=f10_diagnostico_clinico]:checked').val();
    if (f10_diagnostico_clinico == "baixo estresse") _R = _R + 1;
    if (f10_diagnostico_clinico == "moderado estresse") _R = _R + 2;
    if (f10_diagnostico_clinico == "alto estresse") _R = _R + 3;

    var f10_exame_fisico_classificacao = $('input[name=f10_exame_fisico_classificacao_perda_gordura]:checked').val();
    if (f10_exame_fisico_classificacao == "Leve ou moderado") _R = _R + 1;
    if (f10_exame_fisico_classificacao == "importante") _R = _R + 2;

    var f10_exame_fisico_classificacao = $('input[name=f10_exame_fisico_classificacao_edema_sacral]:checked').val();
    if (f10_exame_fisico_classificacao == "Leve ou moderado") _R = _R + 1;
    if (f10_exame_fisico_classificacao == "importante") _R = _R + 2;

    var f10_exame_fisico_classificacao = $('input[name=f10_exame_fisico_classificacao_edema_tornozelo]:checked').val();
    if (f10_exame_fisico_classificacao == "Leve ou moderado") _R = _R + 1;
    if (f10_exame_fisico_classificacao == "importante") _R = _R + 2;

    var f10_exame_fisico_classificacao = $('input[name=f10_exame_fisico_classificacao_ascite]:checked').val();
    if (f10_exame_fisico_classificacao == "Leve ou moderado") _R = _R + 1;
    if (f10_exame_fisico_classificacao == "importante") _R = _R + 2;

    var classificacao = "";
    if (_R<17) classificacao = "Bem nutrido";
    if ((_R>=17) && (_R<22)) classificacao = "Desnutrido moderado";
    if (_R>=22) classificacao = "Desnutrido grave";
    $("#f10_resultado").html("<strong>Resultado Final:</strong> "+_R +"<br>"+classificacao);    
    $("#f10_resultado").show();
}

function fc_f11_calcular(){
    if (($('input[name=f11_idade]').is(":checked") == true) && ($('input[name=f11_apacheii]').is(":checked") == true) && ($('input[name=f11_sofa]').is(":checked") == true) && 
        ($('input[name=f11_comorbidades]').is(":checked") == true) && ($('input[name=f11_internacao]').is(":checked") == true) && ($('input[name=f11_il]').is(":checked") == true) ){

        var f11_idade = $('input[name=f11_idade]:checked').val();
        var f11_apacheii = $('input[name=f11_apacheii]:checked').val();
        var f11_sofa = $('input[name=f11_sofa]:checked').val();
        var f11_comorbidades = $('input[name=f11_comorbidades]:checked').val();
        var f11_internacao = $('input[name=f11_internacao]:checked').val();
        var f11_il = $('input[name=f11_il]:checked').val();
        var _E = 0;

        if (f11_idade == "50 – 74 anos"){
            _E = _E + 1;
        }else if (f11_idade == "≥ 75 anos"){
            _E = _E + 2;
        }

        if (f11_apacheii == "15 – 19"){
            _E = _E + 1;
        }else if (f11_apacheii == "20 – 28"){
            _E = _E + 2;
        }else if (f11_apacheii == "≥ 28"){
            _E = _E + 3;
        }

        if (f11_sofa == "6 – 9"){
            _E = _E + 1;
        }else if (f11_sofa == "≥ 10"){
            _E = _E + 2;
        }

        if (f11_comorbidades == "≥ 2"){
            _E = _E + 1;
        }

        if (f11_internacao == "≥ 1 dia"){
            _E = _E + 1;
        }

        if (f11_il == "≥ 400"){
            _E = _E + 1;
        }


        if (f11_il != "Não disponível"){
            if (_E <= 5){
                $("#f11_resultado").html("DIAGNÓSTICO NUTRICIONAL: BAIXO RISCO NUTRICIONAL");
            }
            else{
                $("#f11_resultado").html("DIAGNÓSTICO NUTRICIONAL: ALTO RISCO NUTRICIONAL");
            }            
        }else{
            if (_E <= 4){
                $("#f11_resultado").html("DIAGNÓSTICO NUTRICIONAL: BAIXO RISCO NUTRICIONAL");
            }
            else{
                $("#f11_resultado").html("DIAGNÓSTICO NUTRICIONAL: ALTO RISCO NUTRICIONAL");
            }
        }
        $("#f11_resultado").show();

    }else{
        $("#f11_resultado").html("Resultado:  ");
        $("#f11_resultado").hide();
    }
}

function fc_f12_calcular(){
    if (($('input[name=f12_avaliacao]').is(":checked") == true) && ($('input[name=f12_doenca]').is(":checked") == true) && ($('input[name=f12_ingestao]').is(":checked") == true) && 
    ($('input[name=f12_perdapeso]').is(":checked") == true)){

        var _R = 0;
        var f12_avaliacao = $('input[name=f12_avaliacao]:checked').val();
        if (f12_avaliacao == "Sim") _R = _R + 1;
        var f12_doenca = $('input[name=f12_doenca]:checked').val();
        if (f12_doenca == "Sim") _R = _R + 2;
        var f12_ingestao = $('input[name=f12_ingestao]:checked').val();
        if (f12_ingestao == "Sim") _R = _R + 1;
        var f12_perdapeso = $('input[name=f12_perdapeso]:checked').val();
        if (f12_perdapeso == "Sim") _R = _R + 1;

        if (_R==0){
            $("#f12_resultado").html("<strong>Baixo Risco Nutricional</strong> <br>&nbsp;&nbsp; - Checar peso regularmente; <br>&nbsp;&nbsp; - Reavaliar o risco em 01 semana;");
        }
        else if ((_R>=1) && (_R<=3)){
            $("#f12_resultado").html("<strong>Médio Risco Nutricional</strong> <br>&nbsp;&nbsp; - Consultar médico para diagnóstico completo; <br>&nbsp;&nbsp; - Considerar intervenção nutricional;<br>&nbsp;&nbsp; - Checar peso 2x/semana;<br>&nbsp;&nbsp; - Reavaliar o risco nutricional após 1 semana;");
        }
        else if ((_R>=4) && (_R<=5)){
            $("#f12_resultado").html("<strong>Alto Risco Nutricional</strong> <br>&nbsp;&nbsp; - Consultar médico e nutricionista para diagnóstico nutricional completo; <br>&nbsp;&nbsp; - Orientação nutricional individualizada e seguimento;<br>&nbsp;&nbsp; - Iniciar suplementação oral até conclusão do diagnostico nutricional;");
        }
        $("#f12_resultado").show();
    }
}

function fc_f13_calcular(){
    if (($('input[name=f13_temperatura]').is(":checked") == true) && ($('input[name=f13_pressao]').is(":checked") == true) && ($('input[name=f13_frequencia]').is(":checked") == true) && ($('input[name=f13_frequencia_respiratoria]').is(":checked") == true) && ($('input[name=f13_oxigenacao]').is(":checked") == true) && ($('input[name=f13_oxigenacao]').is(":checked") == true) && ($('input[name=f13_arterial_venoso]').is(":checked") == true) && ($('input[name=f13_sodio]').is(":checked") == true) && ($('input[name=f13_potassio]').is(":checked") == true) && ($('input[name=f13_creatinina]').is(":checked") == true) &&  ($('input[name=f13_hematocrito]').is(":checked") == true) && ($('input[name=f13_leucocitos]').is(":checked") == true) &&  ($('input[name=f13_glasgow]').is(":checked") == true) &&  ($('input[name=f13_idade]').is(":checked") == true) &&  ($('input[name=f13_doencas]').is(":checked") == true) ){

        var _R = 0;
        var f13_temperatura = $('input[name=f13_temperatura]:checked').val();
        if (f13_temperatura == "> 41") _R = _R + 4;
        else if (f13_temperatura == "39 – 40,9") _R = _R + 3;
        else if (f13_temperatura == "38,5 – 38,9") _R = _R + 1;
        else if (f13_temperatura == "34 – 35,9") _R = _R + 1;
        else if (f13_temperatura == "32 – 33,9") _R = _R + 2;
        else if (f13_temperatura == "30 – 31,9") _R = _R + 3;
        else if (f13_temperatura == "< 29,9") _R = _R + 4;

        var f13_pressao = $('input[name=f13_pressao]:checked').val();
        if (f13_pressao == "> 160") _R = _R + 4;
        else if (f13_pressao == "139 – 159") _R = _R + 3;
        else if (f13_pressao == "110 – 129") _R = _R + 2;
        else if (f13_pressao == "50 – 69") _R = _R + 2;
        else if (f13_pressao == "< 40") _R = _R + 4;

        var f13_frequencia = $('input[name=f13_frequencia]:checked').val();
        if (f13_frequencia == "> 180") _R = _R + 4;
        else if (f13_frequencia == "140 – 179") _R = _R + 3;
        else if (f13_frequencia == "110 – 139") _R = _R + 2;
        else if (f13_frequencia == "50 – 69") _R = _R + 1;
        else if (f13_frequencia == "40 – 54") _R = _R + 2;
        else if (f13_frequencia == "< 39") _R = _R + 3;

        var f13_frequencia_respiratoria = $('input[name=f13_frequencia_respiratoria]:checked').val();
        if (f13_frequencia_respiratoria == "> 50") _R = _R + 4;
        else if (f13_frequencia_respiratoria == "35 – 49") _R = _R + 3;
        else if (f13_frequencia_respiratoria == "25 - 34") _R = _R + 2;
        else if (f13_frequencia_respiratoria == "12 - 24") _R = _R + 1;
        else if (f13_frequencia_respiratoria == "6 – 9") _R = _R + 1;
        else if (f13_frequencia_respiratoria == "< 5") _R = _R + 3;

        var f13_oxigenacao = $('input[name=f13_oxigenacao]:checked').val();
        if (f13_oxigenacao == "FiO2 < 50% (ou não intubado)"){
            var f13_oxigenacao_opcao1 = $('input[name=f13_oxigenacao_opcao1]:checked').val();
            if (f13_oxigenacao_opcao1 == "61 – 70") _R = _R + 1;
            else if (f13_oxigenacao_opcao1 == "55 – 60") _R = _R + 3;
            else if (f13_oxigenacao_opcao1 == "< 55") _R = _R + 4;
        }
        else{
            var f13_oxigenacao_opcao2 = $('input[name=f13_oxigenacao_opcao2]:checked').val();
            if (f13_oxigenacao_opcao2 == "> 500") _R = _R + 4;
            else if (f13_oxigenacao_opcao2 == "350 – 499") _R = _R + 3;
            else if (f13_oxigenacao_opcao2 == "200 – 349") _R = _R + 2;            
        }

        var f13_arterial_venoso = $('input[name=f13_arterial_venoso]:checked').val();
        if (f13_arterial_venoso == "pH Arterial"){
            var f13_ph_arterial = $('input[name=f13_ph_arterial]:checked').val();
            if (f13_ph_arterial == "≥ 7,7") _R = _R + 4;
            else if (f13_ph_arterial == "7,6 – 7,69") _R = _R + 3;
            else if (f13_ph_arterial == "7,5 – 7,59") _R = _R + 1;
            else if (f13_ph_arterial == "7,25 – 7,32") _R = _R + 2;
            else if (f13_ph_arterial == "7,15 – 7,24") _R = _R + 3;
            else if (f13_ph_arterial == "< 7,15") _R = _R + 4;
        }
        else{
            var f13_hc03_venoso = $('input[name=f13_hc03_venoso]:checked').val();
            if (f13_hc03_venoso == "≥ 52") _R = _R + 4;
            else if (f13_hc03_venoso == "41 – 51,9") _R = _R + 3;
            else if (f13_hc03_venoso == "32 – 40,9") _R = _R + 1; 
            else if (f13_hc03_venoso == "18 – 21,9") _R = _R + 2; 
            else if (f13_hc03_venoso == "15 – 17,9") _R = _R + 3; 
            else if (f13_hc03_venoso == "< 15") _R = _R + 4;          
        }

        var f13_sodio = $('input[name=f13_sodio]:checked').val();
        if (f13_sodio == "≥ 180") _R = _R + 4;
        else if (f13_sodio == "160 – 179") _R = _R + 3;
        else if (f13_sodio == "155 – 159") _R = _R + 2;
        else if (f13_sodio == "150 – 154") _R = _R + 1;
        else if (f13_sodio == "120 – 129") _R = _R + 2;
        else if (f13_sodio == "111 – 119") _R = _R + 3;
        else if (f13_sodio == "≤ 110") _R = _R + 4;

        var f13_potassio = $('input[name=f13_potassio]:checked').val();
        if (f13_potassio == "≥ 7,0") _R = _R + 4;
        else if (f13_potassio == "6,0 – 6,9") _R = _R + 3;
        else if (f13_potassio == "5,5 – 5,9") _R = _R + 1;
        else if (f13_potassio == "3,0 – 3,4") _R = _R + 1;
        else if (f13_potassio == "2,5 – 2,9") _R = _R + 2;
        else if (f13_potassio == "< 2,5") _R = _R + 4;

        _R1 = 0;
        var f13_creatinina = $('input[name=f13_creatinina]:checked').val();
        if (f13_creatinina == "≥ 3,5") _R1 = _R1 + 4;
        else if (f13_creatinina == "2,0 – 3,4") _R1 = _R1 + 3;
        else if (f13_creatinina == "1,5 – 1,9") _R1 = _R1 + 2;
        else if (f13_creatinina == "< 0,6") _R1 = _R1 + 2;
        var f13_falencia = $('input[name=f13_falencia]:checked').val();
        if (f13_falencia == "Sim") _R = _R + (_R1 * 2);
        else _R = _R + _R1;

        var f13_hematocrito = $('input[name=f13_hematocrito]:checked').val();
        if (f13_hematocrito == "≥ 60") _R = _R + 4;
        else if (f13_hematocrito == "50,0 – 59,9") _R = _R + 2;
        else if (f13_hematocrito == "46,0 – 49,9") _R = _R + 1;
        else if (f13_hematocrito == "20,0 – 29,9") _R = _R + 2;
        else if (f13_hematocrito == "< 20,0") _R = _R + 4;

        var f13_leucocitos = $('input[name=f13_leucocitos]:checked').val();
        if (f13_leucocitos == "≥ 40") _R = _R + 4;
        else if (f13_leucocitos == "20,0 – 39,9") _R = _R + 2;
        else if (f13_leucocitos == "15,0 – 19,9") _R = _R + 1;
        else if (f13_leucocitos == "1,0 – 2,9") _R = _R + 1;
        else if (f13_leucocitos == "< 1,0") _R = _R + 4;

        var f13_glasgow = $('input[name=f13_glasgow]:checked').val();
        if (f13_glasgow == "i. 15") _R = _R + 0;
        else if (f13_glasgow == "ii. 13 - 14") _R = _R + 1;
        else if (f13_glasgow == "iii. 10 - 12") _R = _R + 2;
        else if (f13_glasgow == "iv. 6 - 9") _R = _R + 3;
        else if (f13_glasgow == "v. < 6") _R = _R + 4;

        var f13_idade = $('input[name=f13_idade]:checked').val();
        if (f13_idade == "45 - 54") _R = _R + 2;
        else if (f13_idade == "55 - 64") _R = _R + 3;
        else if (f13_idade == "65 - 74") _R = _R + 5;
        else if (f13_idade == "≥ 75") _R = _R + 6;

        var f13_doencas = $('input[name=f13_doencas]:checked').val();
        if (f13_doencas == "a. Sim"){
            var f13_doencas_opcoes = $('input[name=f13_doencas_opcoes]:checked').val();
            if (f13_doencas_opcoes == "Não cirúrgico") _R = _R + 5;
            else if (f13_doencas_opcoes == "Pós operatório eletivo") _R = _R + 2;
            else if (f13_doencas_opcoes == "Pós operatório de emergência") _R = _R + 5;
        }

        $("#f13_resultado").html("<strong>PONTUAÇÃO FINAL APACHE II:</strong> "+_R);        
        $("#f13_resultado").show();
    }
}

function fc_f14_calcular(){
    if (($('input[name=f14_paO2]').is(":checked") == true) && ($('input[name=f14_plaquetas]').is(":checked") == true) && ($('input[name=f14_bilirrubina]').is(":checked") == true) && 
        ($('input[name=f14_pressao]').is(":checked") == true) && ($('input[name=f14_escala]').is(":checked") == true) && ($('input[name=f14_creatinina]').is(":checked") == true) ){

        var f12_paO2 = $('input[name=f14_paO2]:checked').val();
        var f12_plaquetas = $('input[name=f14_plaquetas]:checked').val();
        var f12_bilirrubina = $('input[name=f14_bilirrubina]:checked').val();
        var f12_pressao = $('input[name=f14_pressao]:checked').val();
        var f12_escala = $('input[name=f14_escala]:checked').val();
        var f12_creatinina = $('input[name=f14_creatinina]:checked').val();
        var _E = 0;

        if (f12_paO2 == "< 400"){
            _E = _E + 1;
        }else if (f12_paO2 == "< 300"){
            _E = _E + 2;
        }else if (f12_paO2 == "< 200 com suporte respiratório"){
            _E = _E + 3;
        }else if (f12_paO2 == "< 100 com suporte respiratório"){
            _E = _E + 4;
        }

        if (f12_plaquetas == "< 150"){
            _E = _E + 1;
        }else if (f12_plaquetas == "< 100"){
            _E = _E + 2;
        }else if (f12_plaquetas == "< 50"){
            _E = _E + 3;
        }else if (f12_plaquetas == "< 20"){
            _E = _E + 4;
        }

        if (f12_bilirrubina == "1,2 – 1,9"){
            _E = _E + 1;
        }else if (f12_bilirrubina == "2,0 – 5,9"){
            _E = _E + 2;
        }else if (f12_bilirrubina == "6,0 – 11,9"){
            _E = _E + 3;
        }else if (f12_bilirrubina == "> 12,0"){
            _E = _E + 4;
        }

        if (f12_pressao == "< 70"){
            _E = _E + 1;
        }else if (f12_pressao == "Dopamina < 5 ou dobutamina em qualquer dose"){
            _E = _E + 2;
        }else if (f12_pressao == "Dopamina 5,1 – 15 OU adrenalina ≤ 0,1 OU noradrenalina ≤ 0,1 (em μg/kg/min por pelo menos 1 hora.)"){
            _E = _E + 3;
        }else if (f12_pressao == "Dopamina > 15 OU adrenalina > 0,1 OU noradrenalina > 0,1 (em μg/kg/min por pelo menos 1 hora.)"){
            _E = _E + 4;
        }

        if (f12_escala == "13 – 14"){
            _E = _E + 1;
        }else if (f12_escala == "10 – 12"){
            _E = _E + 2;
        }else if (f12_escala == "6 – 9"){
            _E = _E + 3;
        }else if (f12_escala == "< 6"){
            _E = _E + 4;
        }

        if (f12_creatinina == "1,2 – 1,9"){
            _E = _E + 1;
        }else if (f12_creatinina == "2,0 – 3,4"){
            _E = _E + 2;
        }else if (f12_creatinina == "3,5 – 4,9 ou volume urinário < 500ml/dia"){
            _E = _E + 3;
        }else if (f12_creatinina == "> 5,0 ou volume urinário < 200ml/dia"){
            _E = _E + 4;
        }

        $("#f14_resultado").html("ESCORE SOFA: "+_E);        
        $("#f14_resultado").show();

    }else{
        $("#f14_resultado").html("Resultado:  ");
        $("#f14_resultado").hide();
    }
}

function formreset(_id){
    $('#'+_id+' form').find('input:radio').prop('checked', false);
    $('#'+_id+' form').find('input:radio[name=f8_gota]').filter('[value=Macro]').prop('checked', true);
    $('#'+_id+' form').find('input:checkbox').prop('checked', false);
    $('#'+_id+' form').find('input.form-control').val('');
    $('#'+_id+' form').find('textarea').val('');
    $('#'+_id+' form').find('[id*="_resultado"]').addClass('none');
    $('#'+_id+' form').find('[id*="_resultado"]').hide();
    $('#'+_id+' form').find('[id*="_caloria_proteina"]').hide();
}

$(function(){
    $('input:radio[name=f4_sexo]').change(function () {
        if ($("input:radio[name='f4_tipo']:checked").val() == 'Idoso') {
            $("#f4_imc").val("24");
        }
        else{
            if ($("input:radio[name='f4_sexo']:checked").val() == 'Masculino') {
                $("#f4_imc").val("22");
            }
            else{
                $("#f4_imc").val("21");
            }
        }
    });
    $('input:radio[name=f4_tipo]').change(function () {
        if ($("input:radio[name='f4_tipo']:checked").val() == 'Idoso') {
            $("#f4_imc").val("24");
        }
        else{
            if ($("input:radio[name='f4_sexo']:checked").val() == 'Masculino') {
                $("#f4_imc").val("22");
            }
            else{
                $("#f4_imc").val("21");
            }
        }
    });

    $(".f5_calculo").on("keypress", function(e) {
        fc_f5_imc_peso();
    });
    $(".plusminus").inputSpinner();
    $("input[name=f5_cal_valor]").on("change", function(e) {
        fc_f5_recalcular();
    });
    $("input[name=f5_prot_valor]").on("change", function(e) {
        fc_f5_recalcular();
    });
    $("#f5_peso_calorias").on("change", function(e) {
        if ($(this).val() == "Peso Atual"){
            $("#f5_cal_peso").val( $("#f5_peso").val() );  
        }
        else{
            $("#f5_cal_peso").val( $("#f5_peso_ideal").val() );  
        }
        fc_f5_recalcular();
    });
    $("#f5_peso_proteina").on("change", function(e) {
        if ($(this).val() == "Peso Atual"){
            $("#f5_prot_peso").val( $("#f5_peso").val() );  
        }
        else{
            $("#f5_prot_peso").val( $("#f5_peso_ideal").val() );  
        }
        fc_f5_recalcular();
    });

    $(".gotejamento").on("keypress", function(e) {
        fc_Gotejamento();
    });

    $("input[name=f8_gota]").on("change", function(e) {
        fc_Gotejamento();
    });

    $(".f9").on("change", function(e) {
        fc_nrs_2002();
    });

    /* ANSG - Avaliação Nutricional Subjetiva Global*/
    $('input:radio[name=f10_peso_corporal_continua]').change(function () {
        if ($("input:radio[name='f10_peso_corporal_continua']:checked").val() == 'Sim') {
            $(".f10_peso_corporal").removeClass("none");
        }
        else{
            $(".f10_peso_corporal").addClass("none");
        }
    });
    $(".resultado_corporal").on("keyup", function(e) {
        fc_f10_calcular();
    });
    $('input:radio[name=f10_ingesta_alimentar_mudanca]').change(function () {
        if ($("input:radio[name='f10_ingesta_alimentar_mudanca']:checked").val() == 'Sim') {
            $(".f10_ingesta_alimentar_mudanca").removeClass("none");
        }
        else{
            $(".f10_ingesta_alimentar_mudanca").addClass("none");
        }
    });
    $('input:radio[name=f10_exame_fisico]').change(function () {
        if ($("input:radio[name='f10_ingesta_alimentar_mudanca']:checked").val() !== '') {
            $(".f10_exame_fisico_classificacao").removeClass("none");
        }
        else{
            $(".f10_exame_fisico_classificacao").addClass("none");
        }
    });

    /* STRONG KIDS */
    $('input:radio[name=f12_avaliacao]').change(function () {
        if ($("input:radio[name='f12_avaliacao']:checked").val() == 'Sim') {
            $(".f12_avaliacao_opcoes").removeClass("none");
        }
        else{
            $(".f12_avaliacao_opcoes").addClass("none");
        }
    });
    $('input:radio[name=f12_doenca]').change(function () {
        if ($("input:radio[name='f12_doenca']:checked").val() == 'Sim') {
            $(".f12_doencas_opcoes").removeClass("none");
        }
        else{
            $(".f12_doencas_opcoes").addClass("none");
        }
    });
    $('input:radio[name=f12_ingestao]').change(function () {
        if ($("input:radio[name='f12_ingestao']:checked").val() == 'Sim') {
            $(".f12_ingestao_opcoes").removeClass("none");
        }
        else{
            $(".f12_ingestao_opcoes").addClass("none");
        }
    });
    $('input:radio[name=f12_perdapeso]').change(function () {
        if ($("input:radio[name='f12_perdapeso']:checked").val() == 'Sim') {
            $(".f12_perdapeso_opcoes").removeClass("none");
        }
        else{
            $(".f12_perdapeso_opcoes").addClass("none");
        }
    });
    $('input:radio[name=f13_oxigenacao]').change(function () {
        if ($("input:radio[name='f13_oxigenacao']:checked").val() == 'FiO2 < 50% (ou não intubado)') {
            $(".f13_oxigenacao_opcao1").removeClass("none");
            $(".f13_oxigenacao_opcao2").addClass("none");
        }
        else{
            $(".f13_oxigenacao_opcao1").addClass("none");
            $(".f13_oxigenacao_opcao2").removeClass("none");
        }
    });
    $('input:radio[name=f13_arterial_venoso]').change(function () {
        if ($("input:radio[name='f13_arterial_venoso']:checked").val() == 'pH Arterial') {
            $(".f13_ph_arterial").removeClass("none");
            $(".f13_hc03_venoso").addClass("none");
        }
        else{
            $(".f13_ph_arterial").addClass("none");
            $(".f13_hc03_venoso").removeClass("none");
        }
    });
    $('input:radio[name=f13_doencas]').change(function () {
        if ($("input:radio[name='f13_doencas']:checked").val() == 'a. Sim') {
            $(".f13_doencas_opcoes").removeClass("none");
        }
        else{
            $(".f13_doencas_opcoes").addClass("none");
        }
    });

    $(".modal").on('shown.bs.modal', function (e) {
        formreset($(this).attr("id"));
    });
});
</script>