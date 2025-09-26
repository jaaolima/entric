    <div class="row entric_grid mt-0 m-0 p-0 inputs1" id="apresentacao">
        <input id="radioOral" class="radio-outlined"  name="tipo_produto" type="radio" checked="checked" value="Suplemento">
        <input id="radioAdulto" class="radio-outlined"  name="categoria" type="radio" checked="checked" value="Adulto">
        <div class="form-group col-sm-4 btrbl apres_oral">
            <div class="form-check">
                <label class="grid_label">Apresentação</label>
            </div>
            <div class="row p-4">
                <div class="form-check col-sm-12">
                    <input id="calculo_apres_po" name="calculo_apres_po" value="Pó" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_apres_po" class="form-check-label check-green">Pó</label> 
                </div>
                <div class="form-check col-sm-12">
                    <input id="calculo_apres_liquidocreme"  name="calculo_apres_liquidocreme" value="Líquido / Creme" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_apres_liquidocreme" class="form-check-label check-green">Líquido (pronto para consumo)</label>
                </div>
                <div class="form-check col-sm-12">
                    <input id="calculo_apres_cremoso" name="calculo_apres_cremoso" value="Cremoso" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_apres_cremoso" class="form-check-label check-green">Cremoso</label> 
                </div>
            </div>  
        </div>
        <div class="form-group col-sm-8 btrbl apres_oral filtros_oral">
            <div class="form-check">
                <label class="grid_label">Características</label>
            </div>
            <div class="row p-4">
                <!-- <div class="form-check col-sm-3">
                    <input id="calculo_fil_todos2" name="calculo_fil_todos2" value="Todos" class="form-check-input styled-checkbox calculo_fil_todos" type="checkbox">
                    <label for="calculo_fil_todos2" class="form-check-label check-green">Selecionar Todos</label>
                </div> -->
                <div class="form-check col-sm-3">
                    <input id="calculo_oral_carac_hipocalorico" name="carac_oral[]" class="form-check-input styled-checkbox filtro_1" type="checkbox" value="Hipocalórico">
                    <label for="calculo_oral_carac_hipocalorico" class="form-check-label check-green">Hipocalórico(< 0,9 kcal/ml)</label>                    
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_oral_carac_hipoproteico" name="carac_oral[]" class="form-check-input styled-checkbox filtro_2" type="checkbox" value="Hipoproteico">
                    <label for="calculo_oral_carac_hipoproteico" class="form-check-label check-green">Hipoproteico</label>
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_fil_ambos3" name="calculo_fil_ambos3" value="Ambos" class="form-check-input styled-checkbox filtro_3" type="checkbox">
                    <label for="calculo_fil_ambos3" class="form-check-label check-green">Ambos</label>
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_oral_carac_semsacarose" name="carac_oral[]" class="form-check-input styled-checkbox filtro_4" type="checkbox" value="Sem Sacarose">
                    <label for="calculo_oral_carac_semsacarose" class="form-check-label check-green">Sem Sacarose</label>
                </div>


                <div class="form-check col-sm-3">
                    <input id="calculo_oral_carac_hipercalórico" name="carac_oral[]" class="form-check-input styled-checkbox filtro_1" type="checkbox" value="Normocalórico">
                    <label for="calculo_oral_carac_hipercalórico" class="form-check-label check-green">Normocalórico(0,9 a 1,2 kcal/ml)</label>
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_oral_carac_normoproteico" name="carac_oral[]" class="form-check-input styled-checkbox filtro_2" type="checkbox" value="Normoproteico">
                    <label for="calculo_oral_carac_normoproteico" class="form-check-label check-green">Normoproteico</label>
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
                    <label for="calculo_oral_carac_hipercalórico" class="form-check-label check-green">Hipercalórico ( > 1,2 kcal/ml)</label>
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_oral_carac_hiperproteico" name="carac_oral[]" class="form-check-input styled-checkbox filtro_2" type="checkbox" value="Hiperproteico">
                    <label for="calculo_oral_carac_hiperproteico" class="form-check-label check-green">Hiperproteico</label>
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