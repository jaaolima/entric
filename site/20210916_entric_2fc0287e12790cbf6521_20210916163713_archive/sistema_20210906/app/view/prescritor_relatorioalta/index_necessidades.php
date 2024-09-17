

<div class="tab-pane fade" id="necessidades" role="tabpanel">
    
    <div class="entric_necessidades">
        <div class="row b_ltr">
            <div class="col-lg-3 b_r text-center text-azul">
                PESO
            </div>
            <div class="col-lg-9 text-center bg-azul">
                CALORIAS
            </div>
        </div>
        <div class="row b_ltrb">
            <div class="col-lg-3 b_r ln-40">
                <select id="nec_calorias_peso" name="nec_calorias_peso" aria-controls="nec_calorias_peso" class="form-control input-sm  mt-3 mb-3">
                    <option value="">Informe o valor do peso</option>
                    <option value="Peso ideal">Peso ideal</option>
                    <option value="Peso aferido">Peso aferido</option>
                    <option value="Peso usual">Peso usual</option>
                    <option value="Peso referido">Peso referido</option>
                    <option value="Peso estimado">Peso estimado</option>
                    <option value="Peso ajustado">Peso ajustado</option>
                </select>


                <div class="input-group mb-3">
                    <input type="text" placeholder="" readonly="readonly" name="nec_calorias_peso_valor" id="nec_calorias_peso_valor" class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text">kg</span>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 b_r">
                <div class="default-tab bordered-tab entric">
                    <ul class="nav nav-tabs tabcalorias" role="tablist">
                        <li class="nav-item col-6">
                            <a class="nav-link" data-toggle="tab" href="#formula_bolso">Fórmula de Bolso</a>
                        </li>
                        <li class="nav-item col-6">
                            <a class="nav-link" data-toggle="tab" href="#harris_benedict">Harris Benedict</a>
                        </li>
                    </ul>
                    <div class="tab-content tab-content-default">
                        <div class="tab-pane fade " id="formula_bolso" role="tabpanel">
                            <div class=" d-flex justify-content-center align-middle">
                                <center class="col-6 mt-3 ">
                                    <input type="number" name="formula_valor" class="plusminus" value="000" data-decimals="0" min="0" max="999" step="1"/>
                                </center>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="harris_benedict" role="tabpanel">
                            Fator Atividade:
                            <select id="fator_atividade_valor" name="fator_atividade_valor" aria-controls="fator_atividade_valor" class="form-control input-sm bd-cinza mb-3">
                                <option value="">selecione...</option>
                                <option value="Acamado">Acamado</option>
                                <option value="Acamado + móvel">Acamado + móvel</option>
                                <option value="Deambulante">Deambulante</option>
                            </select>

                            Fator Injúria:
                            <div class="row">
                                <div class="col-sm-8">
                                    <select id="fator_injuria_tipo" name="fator_injuria_tipo" aria-controls="fator_injuria_tipo" class="form-control input-sm bd-cinza mb-3">
                                        <option value="">selecione...</option>
                                        <option value="Câncer: 1.1 - 1.45">Câncer: 1.1 - 1.45</option>
                                        <option value="Cirurgia eletiva: 1.0 - 1.1">Cirurgia eletiva: 1.0 - 1.1</option>
                                        <option value="Desnutrição grave: 1.5">Desnutrição grave: 1.5</option>
                                        <option value="Fraturas múltiplas: 1.2 - 1.35">Fraturas múltiplas: 1.2 - 1.35</option>
                                        <option value="Infecção grave: 1.3 - 1.35">Infecção grave: 1.3 - 1.35</option>
                                        <option value="Insuficiência cardíaca: 1.3 - 1.5">Insuficiência cardíaca: 1.3 - 1.5</option>
                                        <option value="Insuficiência hepática: 1.3 - 1.55">Insuficiência hepática: 1.3 - 1.55</option>
                                        <option value="Insuficiência renal aguda: 1.3">Insuficiência renal aguda: 1.3</option>
                                        <option value="Manutenção de peso: 1.2 - 1.5">Manutenção de peso: 1.2 - 1.5</option>
                                        <option value="Operação eletiva: 1.75">Operação eletiva: 1.75</option>
                                        <option value="Paciente não complicado: 1.0">Paciente não complicado: 1.0</option>
                                        <option value="Pancreatite: 1.3 - 1.8">Pancreatite: 1.3 - 1.8</option>
                                        <option value="Pequena cirurgia: 1.2">Pequena cirurgia: 1.2</option>
                                        <option value="Pequeno trauma de tecido: 1.14 - 1.37">Pequeno trauma de tecido: 1.14 - 1.37</option>
                                        <option value="Politraumatizados: 1.9">Politraumatizados: 1.9</option>
                                        <option value="Peritonite: 1.2 - 1.5">Peritonite: 1.2 - 1.5</option>
                                        <option value="PO de cirurgia cardíaca: 1.2 - 1.5">PO de cirurgia cardíaca: 1.2 - 1.5</option>
                                        <option value="PO de cirurgia geral: 1.0 - 1.5">PO de cirurgia geral: 1.0 - 1.5</option>
                                        <option value="Queimadura (até 20%): 1.0 - 1.5">Queimadura (até 20%): 1.0 - 1.5</option>
                                        <option value="Queimadura (20% - 40%): 1.5 - 1.85">Queimadura (20% - 40%): 1.5 - 1.85</option>
                                        <option value="Queimadura (40% - 100%): 1.85 - 2.05">Queimadura (40% - 100%): 1.85 - 2.05</option>
                                        <option value="Queimadura extensas: 2.7">Queimadura extensas: 2.7</option>
                                        <option value="Septicemia: 1.4 - 1.8">Septicemia: 1.4 - 1.8</option>
                                        <option value="Septicemia: 1.6">Septicemia: 1.6</option>
                                        <option value="Transplante de fígado: 1.2 - 1.5">Transplante de fígado: 1.2 - 1.5</option>
                                        <option value="Transplante de medula óssea: 1.2 - 1.3">Transplante de medula óssea: 1.2 - 1.3</option>
                                        <option value="Trauma esquelético: 1.35">Trauma esquelético: 1.35</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" placeholder="" required="required" name="fator_injuria_valor" id="fator_injuria_valor" class="form-control medianota">
                                </div>
                            </div>

                            Fator Térmico:
                            <select id="fator_termico_valor" name="fator_termico_valor" aria-controls="fator_termico_valor" class="form-control input-sm bd-cinza mb-3">
                                <option value="">selecione...</option>
                                <option value="38°C">38°C</option>
                                <option value="39°C">39°C</option>
                                <option value="40°C">40°C</option>
                                <option value="41°C">41°C</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 bg-cinza">
                <div class="row bg-branco">
                    <div class="col-lg-12 text-center ln-40">
                        TOTAL
                    </div>
                </div>
                <div class="row b_t">
                    <div class="col-lg-12 text-center ln-40 text-azulescuro">
                       -g (25g/kg)
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="entric_necessidades">
        <div class="row b_ltr">
            <div class="col-lg-3 b_r text-center text-azul">
                PESO
            </div>
            <div class="col-lg-9 text-center bg-azul">
                PROTEÍNAS
            </div>
        </div>
        <div class="row b_ltrb">
            <div class="col-lg-3 b_r ln-40">
                <select id="nec_proteinas_peso" name="nec_proteinas_peso" aria-controls="nec_proteinas_peso" class="form-control input-sm mt-3 mb-3">
                    <option value="">Informe o valor do peso</option>
                    <option value="Peso ideal">Peso ideal</option>
                    <option value="Peso aferido">Peso aferido</option>
                    <option value="Peso usual">Peso usual</option>
                    <option value="Peso referido">Peso referido</option>
                    <option value="Peso estimado">Peso estimado</option>
                    <option value="Peso ajustado">Peso ajustado</option>
                </select>

                <div class="input-group mb-3">
                    <input type="text" placeholder="" readonly="readonly" name="nec_proteinas_peso_valor" id="nec_proteinas_peso_valor" class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text">kg</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 b_r d-flex justify-content-center align-middle">
                <center class="col-6 mt-3">
                    <input type="number" name="proteinas_valor" class="plusminus" value="0.0" data-decimals="1" min="0" max="99.9" step="0.1"/>
                </center>
            </div>
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12 text-center ln-40">
                        TOTAL
                    </div>
                </div>
                <div class="row b_t bg-cinza">
                    <div class="col-lg-12 text-center ln-40 text-azulescuro">
                       -g (1,5g/kg)
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="entric_necessidades">
        <div class="row b_ltr">
            <div class="col-lg-3 b_r text-center text-azul">
                PESO
            </div>
            <div class="col-lg-9 text-center bg-azul">
                ÁGUA
            </div>
        </div>
        <div class="row b_ltrb">
            <div class="col-lg-3 b_r ln-40">
                <select id="nec_agua_peso" name="nec_agua_peso" aria-controls="nec_agua_peso" class="form-control input-sm mt-3 mb-3">
                    <option value="">Informe o valor do peso</option>
                    <option value="Peso ideal">Peso ideal</option>
                    <option value="Peso aferido">Peso aferido</option>
                    <option value="Peso usual">Peso usual</option>
                    <option value="Peso referido">Peso referido</option>
                    <option value="Peso estimado">Peso estimado</option>
                    <option value="Peso ajustado">Peso ajustado</option>
                </select>

                <div class="input-group mb-3">
                    <input type="text" placeholder="" readonly="readonly" name="nec_agua_peso_valor" id="nec_agua_peso_valor" class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text">kg</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 b_r d-flex justify-content-center align-middle">
                <center class="col-6 mt-3">
                    <input type="number" name="agua_valor" class="plusminus" value="0" data-decimals="0" min="0" max="99" step="1"/>
                </center>
            </div>
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12 text-center ln-40">
                        TOTAL
                    </div>
                </div>
                <div class="row b_t bg-cinza">
                    <div class="col-lg-12 text-center ln-40 text-azulescuro">
                        -ml (30ml/kg)
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="form-group row pt-5">
        <div class="col-sm-6 text-left">
            &nbsp;
        </div>
        <div class="col-sm-6 text-right">
            <button type="button" class="btn btn-secondary btn-form" id="necessidades_voltar">VOLTAR</button>
            &nbsp;
            <button type="button" class="btn btn-warning btn-form" id="necessidades_avancar">AVANÇAR</button>
        </div>
    </div>
</div>