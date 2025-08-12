    <div class="row entric_grid mt-0 m-0 p-0 inputs1" id="apresentacao">
        <div class="form-group col-sm-4 btrbl apres_nooral">
            <div class="form-check">
                <label class="grid_label">Apresentação</label>
            </div>
            <div class="row p-4">
                <div class="form-check col-sm-12">
                    <input id="calculo_apres_fechado"  name="calculo_apres_fechado" value="Fechado" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_apres_fechado" class="form-check-label check-green">Fechado</label>
                </div>
                <div class="form-check col-sm-12">
                    <input id="calculo_apres_aberto_liquido" name="calculo_apres_aberto_liquido" value="Aberto (Líquido)" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_apres_aberto_liquido" class="form-check-label check-green">Aberto (Líquido)</label>
                </div>
                <div class="form-check col-sm-12">
                    <input id="calculo_apres_aberto_po" class="form-check-input styled-checkbox" value="Aberto (Pó)" name="calculo_apres_aberto_po" type="checkbox">
                    <label for="calculo_apres_aberto_po" class="form-check-label check-green">Aberto (Pó)</label>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-8 btrbl apres_nooral filtros_nooral"> 
            <div class="form-check">
                <label class="grid_label">Filtros</label>
            </div>
            <div class="row p-4">
                <div class="form-check col-sm-3 ">
                    <input id="calculo_fil_polimerico" name="calculo_fil_polimerico" value="Polimérico" class="form-check-input filtros radio-outlined" type="radio">
                    <label for="calculo_fil_polimerico" class="form-check-label radio-green">Polimérico</label>
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_fil_comfibras" name="calculo_fil_comfibras" value="Com Fibras" class="form-check-input filtros radio-outlined" type="radio">
                    <label for="calculo_fil_comfibras" class="form-check-label radio-green">Com Fibras</label>
                </div>
                <div class="form-check col-sm-3"> 
                    <input id="calculo_fil_semlactose" name="calculo_fil_semlactose" value="Sem Lactose" class="form-check-input filtros styled-checkbox" type="checkbox">
                    <label for="calculo_fil_semlactose" class="form-check-label check-green">Sem Lactose</label>
                </div>
                <div class="form-check col-sm-3">
                </div>
                <div class="form-check col-sm-3">  
                    <input id="calculo_fil_oligomerico" name="calculo_fil_polimerico" value="Oligomérico" class="form-check-input filtros radio-outlined" type="radio">
                    <label for="calculo_fil_oligomerico" class="form-check-label radio-green">Oligomérico</label>   
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_fil_semfibras" name="calculo_fil_comfibras" value="Sem Fibras" class="form-check-input filtros radio-outlined" type="radio">
                    <label for="calculo_fil_semfibras" class="form-check-label radio-green">Sem Fibras</label>
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_fil_100proteina" name="calculo_fil_100proteina" value="100% Proteína Vegetal" class="form-check-input filtros styled-checkbox" type="checkbox">
                    <label for="calculo_fil_100proteina" class="form-check-label check-green">100% Proteína Vegetal</label>
                </div>
                <div class="form-check col-sm-3">
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_fil_pololigomerico" name="calculo_fil_polimerico" value="Ambos" class="form-check-input filtros radio-outlined" checked="checked" type="radio">
                    <label for="calculo_fil_pololigomerico" class="form-check-label radio-green">Ambos</label>   
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_fil_comsemfibras" name="calculo_fil_comfibras" value="Ambos" class="form-check-input filtros radio-outlined" checked="checked" type="radio">
                    <label for="calculo_fil_comsemfibras" class="form-check-label radio-green">Ambos</label>
                </div>
                <div class="form-check col-sm-3">
                   <input id="calculo_fil_semsacarose" name="calculo_fil_semsacarose" value="Sem Sacarose" class="form-check-input filtros styled-checkbox" type="checkbox">
                    <label for="calculo_fil_semsacarose" class="form-check-label check-green">Sem Sacarose</label>
                </div>
                <div class="form-check col-sm-3">
                </div>
            </div>
        </div>


        <div class="form-group col-sm-4 btrbl apres_oral" style="display: none;"> 
            <div class="form-check">
                <label class="grid_label">Apresentação</label>
            </div>
            <div class="row p-4">
                <div class="form-check col-sm-12">
                    <input id="calculo_apres_liquidocreme"  name="calculo_apres_liquidocreme" value="Líquido / Creme" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_apres_liquidocreme" class="form-check-label check-green">Líquido / Creme</label>
                </div>
                <div class="form-check col-sm-12">
                    <input id="calculo_apres_po" name="calculo_apres_po" value="Pó" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_apres_po" class="form-check-label check-green">Pó</label>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-8 btrbl apres_oral filtros_oral" style="display: none;">
            <div class="form-check">
                <label class="grid_label">Características</label>
            </div>
            <div class="row p-4">
                <div class="form-check col-sm-3">
                    <input id="calculo_fil_todos1" name="calculo_fil_todos1" value="Todos" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_fil_todos1" class="form-check-label check-green">Todos</label>
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_fil_todos2" name="calculo_fil_todos2" value="Todos" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_fil_todos2" class="form-check-label check-green">Todos</label>
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_fil_todos3" name="calculo_fil_todos3" value="Todos" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_fil_todos3" class="form-check-label check-green">Todos</label>
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_oral_carac_semsacarose" name="carac_oral[]" class="form-check-input styled-checkbox filtro_4" type="checkbox" value="Sem Sacarose">
                    <label for="calculo_oral_carac_semsacarose" class="form-check-label check-green">Sem Sacarose</label>
                </div>


                <div class="form-check col-sm-3">
                    <input id="calculo_oral_carac_hipocalorico" name="carac_oral[]" class="form-check-input styled-checkbox filtro_1" type="checkbox" value="Hipocalórico">
                    <label for="calculo_oral_carac_hipocalorico" class="form-check-label check-green">Hipo / Normocalórico(≤ 1,2 kcal/ml)</label>                    
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_oral_carac_hipoproteico" name="carac_oral[]" class="form-check-input styled-checkbox filtro_2" type="checkbox" value="Hipoproteico">
                    <label for="calculo_oral_carac_hipoproteico" class="form-check-label check-green">Hipoproteico</label>
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_oral_carac_comfibras" name="carac_oral[]" class="form-check-input styled-checkbox filtro_3" type="checkbox" value="Com Fibras">
                    <label for="calculo_oral_carac_comfibras" class="form-check-label check-green">Com Fibras</label>
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_fil_semlactose" name="carac_oral[]" value="Sem Lactose" class="form-check-input filtro_4 styled-checkbox" type="checkbox">
                    <label for="calculo_fil_semlactose" class="form-check-label check-green">Sem Lactose</label>                 
                </div>

                
                <div class="form-check col-sm-3">
                    <input id="calculo_oral_carac_hipercalórico" name="carac_oral[]" class="form-check-input styled-checkbox filtro_1" type="checkbox" value="Hipercalórico">
                    <label for="calculo_oral_carac_hipercalórico" class="form-check-label check-green">Hipercalórico</label>
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_oral_carac_normoproteico" name="carac_oral[]" class="form-check-input styled-checkbox filtro_2" type="checkbox" value="Normoproteico">
                    <label for="calculo_oral_carac_normoproteico" class="form-check-label check-green">Normoproteico</label>
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_oral_carac_semfibras" name="carac_oral[]" class="form-check-input styled-checkbox filtro_3" type="checkbox" value="Sem Fibras">
                    <label for="calculo_oral_carac_semfibras" class="form-check-label check-green">Sem Fibras</label>
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_oral_100proteina" name="carac_oral[]" class="form-check-input styled-checkbox filtro_4" type="checkbox" value="100% Proteína Vegetal">
                    <label for="calculo_oral_100proteina" class="form-check-label check-green">100% Proteína Vegetal</label>
                </div>

                <div class="form-check col-sm-3">
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_oral_carac_hiperproteico" name="carac_oral[]" class="form-check-input styled-checkbox filtro_2" type="checkbox" value="Hiperproteico">
                    <label for="calculo_oral_carac_hiperproteico" class="form-check-label check-green">Hiperproteico</label>
                </div>
                <div class="form-check col-sm-3">
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_oral_cicatrizacao" name="carac_oral[]" class="form-check-input styled-checkbox filtro_4" type="checkbox" value="Cicatrização">
                    <label for="calculo_oral_cicatrizacao" class="form-check-label check-green">Cicatrização</label>
                </div>

                <div class="form-check col-sm-3">
                </div>
                <div class="form-check col-sm-3">
                </div>
                <div class="form-check col-sm-3">
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_oral_omega3" name="carac_oral[]" class="form-check-input styled-checkbox filtro_4" type="checkbox" value="Com Ômega 3">
                    <label for="calculo_oral_omega3" class="form-check-label check-green">Com Ômega 3</label>
                </div>

                <div class="form-check col-sm-3">
                </div>
                <div class="form-check col-sm-3">
                </div>
                <div class="form-check col-sm-3">
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_oral_imunonutricaocirurgica" name="carac_oral[]" class="form-check-input styled-checkbox filtro_4" type="checkbox" value="Imunonutrição cirúrgica">
                    <label for="calculo_oral_imunonutricaocirurgica" class="form-check-label check-green">Imunonutrição cirúrgica</label>
                </div>


            </div>
        </div>
    </div>