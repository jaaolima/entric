    <div class="row entric_grid mt-0 m-0 p-0 inputs1" id="apresentacao">
        <div class="form-group col-sm-4 btrbl apres_nooral">
            <div class="form-check">
                <label class="grid_label">Apresentação</label>
            </div>
            <div class="row p-4">
                <div class="form-check col-sm-12">
                    <input id="calculo_apres_aberto_po" class="form-check-input styled-checkbox" value="Aberto (Pó)" name="calculo_apres_aberto_po" type="checkbox">
                    <label for="calculo_apres_aberto_po" class="form-check-label check-green">Aberto (Pó)</label>
                </div>
                <div class="form-check col-sm-12">
                    <input id="calculo_apres_aberto_liquido" name="calculo_apres_aberto_liquido" value="Aberto (Líquido)" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_apres_aberto_liquido" class="form-check-label check-green">Aberto (Líquido)</label>
                </div>
                <div class="form-check col-sm-12">
                    <input id="calculo_apres_fechado"  name="calculo_apres_fechado" value="Fechado" class="form-check-input styled-checkbox" type="checkbox">
                    <label for="calculo_apres_fechado" class="form-check-label check-green">Fechado</label>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-8 btrbl apres_nooral filtros_nooral">
            <div class="form-check">
                <label class="grid_label">Filtros</label>
            </div>
            <div class="row p-4">
                <div class="form-check col-sm-3 ">
                    <input id="calculo_fil_polimerico" name="calculo_fil_polimerico" value="Polimérico" class="form-check-input filtros radio-outlined" type="radio" checked="checked">
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
                <label class="grid_label">Filtros</label>
            </div>
            <div class="row p-4">
                <div class="form-check col-sm-3">
                    <input id="calculo_fil_todos2" name="calculo_fil_todos2" value="Todos" class="form-check-input styled-checkbox calculo_fil_todos" type="checkbox">
                    <label for="calculo_fil_todos2" class="form-check-label check-green">Selecionar Todos</label>
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_fil_semsacarose2" name="calculo_fil_semsacarose2" value="Sem Sacarose" class="form-check-input filtros styled-checkbox" type="checkbox">
                    <label for="calculo_fil_semsacarose2" class="form-check-label check-green">Sem Sacarose</label>
                </div>
                <div class="form-check col-sm-3">                   
                    <input id="calculo_fil_comfibras2" name="calculo_fil_comfibras2" value="Com Fibras" class="form-check-input filtros styled-checkbox" type="checkbox">
                    <label for="calculo_fil_comfibras2" class="form-check-label check-green">Com Fibras</label>
                </div>
                <div class="form-check col-sm-3">
                </div>

                <div class="form-check col-sm-3">                    
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_fil_semlactose2" name="calculo_fil_semlactose2" value="Sem Lactose" class="form-check-input filtros styled-checkbox" type="checkbox">
                    <label for="calculo_fil_semlactose2" class="form-check-label check-green">Sem Lactose</label>                 
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_fil_semfibras2" name="calculo_fil_semfibras2" value="Sem Fibras" class="form-check-input filtros styled-checkbox" type="checkbox">
                    <label for="calculo_fil_semfibras2" class="form-check-label check-green">Sem Fibras</label>
                </div>
                <div class="form-check col-sm-3">
                </div>

                <div class="form-check col-sm-3">
                </div>
                <div class="form-check col-sm-3">
                    <input id="calculo_fil_100proteina2" name="calculo_fil_100proteina2" value="100% Proteína Vegetal" class="form-check-input filtros styled-checkbox" type="checkbox">
                    <label for="calculo_fil_100proteina2" class="form-check-label check-green">100% Proteína Vegetal</label>
                </div>
                <div class="form-check col-sm-3">
                </div>
                <div class="form-check col-sm-3">
                </div>

            </div>
        </div>
    </div>