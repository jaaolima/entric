    <div id="row_categoria" class="row entric_grid entric_query inputs1">
        <div class="form-group col-sm-4">
            <div class="entric_group p-3">
                <div class="form-check">
                    <label class="grid_label">Categoria</label>
                </div>
                <div class="row p-4">
                    <div class="col-sm-5">
                        <div class="form-radio">
                            <input id="radioAdulto" class="radio-outlined"  name="categoria" type="radio" checked="checked" value="Adulto">
                            <label for="radioAdulto" class="radio-green">Adulto</label>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="form-radio">
                            <input id="radioPediatrico" class="radio-outlined"  name="categoria" type="radio" value="Pediátrico" disabled>
                            <label for="radioPediatrico" class="radio-green">Pediátrico <small>(em construção)</small></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-3">
            <div class="entric_group p-3">
                <div class="form-check">
                    <label class="grid_label">Tipo de produto</label>
                </div>
                <div class="row p-4">
                    <div class="col-sm-6">
                        <div class="form-radio">
                            <input id="radioEnteral" class="radio-outlined" name="tipo_produto" type="radio" checked="checked" value="Enteral">
                            <label for="radioEnteral" class="radio-green">Enteral</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-radio">
                            <input id="radioOral" class="radio-outlined"  name="tipo_produto" type="radio" value="Suplemento">
                            <label for="radioOral" class="radio-green">Suplemento</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-5">
            <div class="entric_group p-3">
                <div class="form-check">
                    <label class="grid_label">Tipo de prescrição</label>
                </div>
                <div class="row p-4">
                    <div class="col-sm-6">
                        <div class="form-radio">
                            <input id="radioAutomatica" class="radio-outlined" name="tipo_prescricao" type="radio" checked="checked" value="Prescrição Automática">
                            <label for="radioAutomatica" class="radio-green">Prescrição Automática</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-radio">
                            <input id="radioManual" disabled class="radio-outlined"  name="tipo_prescricao" type="radio" value="Prescrição Manual">
                            <label for="radioManual" class="radio-green">Prescrição Manual</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>