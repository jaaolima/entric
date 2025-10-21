    <div class="row entric_grid mt-0 m-0 p-0 inputs1" id="apresentacao">
        <input id="radioOral" class="radio-outlined"  name="tipo_produto" type="radio" checked="checked" value="Suplemento">
        <input id="radioAdulto" class="radio-outlined"  name="categoria" type="radio" checked="checked" value="Adulto">
        <div class="form-group col-12">
            <div class="form-check">
                <label class="grid_label required">Selecione uma ou mais categorias de módulos <span>*</span></label>
            </div>
            <div class="row">
                <div class="col-6 p-4">
                    <div class="form-check col-sm-12">
                        <div>
                            <input id="categoria_modulo_proteina" required name="cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Proteína">
                            <label for="categoria_modulo_proteina" class="form-check-label check-green">Proteína</label>
                        </div>
                        <div class="col-sm-12" id="div_tipo_proteina" style="display: none;">
                            <div class="col-sm-6">
                                <div class="form-radio">
                                    <input id="tipo_proteina_animal" checked class="radio-outlined" name="tipo_proteina" type="radio" value="Animal">
                                    <label for="tipo_proteina_animal" class="radio-green">Animal</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-radio">
                                    <input id="tipo_proteina_vegetal" class="radio-outlined" name="tipo_proteina" type="radio" value="Vegetal">
                                    <label for="tipo_proteina_vegetal" class="radio-green">Vegetal</label>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="form-check col-sm-12">
                        <input id="categoria_modulo_colageno_aminoacidos" name="cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Colágeno ou Aminoácidos">
                        <label for="categoria_modulo_colageno_aminoacidos" class="form-check-label check-green">Colágeno ou Aminoácidos</label>
                    </div>
                    <div class="form-check col-sm-12">
                        <input id="categoria_modulo_carboidrato" name="cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Carboidrato">
                        <label for="categoria_modulo_carboidrato" class="form-check-label check-green">Carboidrato</label>
                    </div>
                    <div class="form-check col-sm-12">
                        <input id="categoria_modulo_lipideo" name="cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Lipídeo">
                        <label for="categoria_modulo_lipideo" class="form-check-label check-green">Lipídeo</label>
                    </div>
                </div>
                <div class="col-6 p-4">
                    <div class="form-check col-sm-12">
                        <input id="categoria_modulo_fibras" name="cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Fibras">
                        <label for="categoria_modulo_fibras" class="form-check-label check-green">Fibras</label>
                    </div>
                    <div class="form-check col-sm-12">
                        <input id="categoria_modulo_probioticos" name="cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Probióticos">
                        <label for="categoria_modulo_probioticos" class="form-check-label check-green">Probióticos</label>
                    </div>
                    <div class="form-check col-sm-12">
                        <input id="categoria_modulo_simbioticos" name="cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Simbióticos">
                        <label for="categoria_modulo_simbioticos" class="form-check-label check-green">Simbióticos</label>
                    </div>
                    <div class="form-check col-sm-12">
                        <input id="categoria_modulo_espessante" name="cat_modulo[]" class="form-check-input styled-checkbox" type="checkbox" value="Espessante">
                        <label for="categoria_modulo_espessante" class="form-check-label check-green">Espessante</label>
                    </div>
                </div>
            </div>
        </div>
    </div>