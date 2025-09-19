    <div class="row entric_group_radio mb-2 mt-4" id="prescricao_nutricional">
        <div class="form-group entric_group_destaque col-sm-2 col-lg-4 col-xl">
            <div class="form-check entric_radio pl-0">
                <label>PRESCRIÇÃO NUTRICIONAL:</label>
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-check entric_radio">
                <label>
                    <span style="color: #42bdbd;">KCAL:</span> &nbsp;&nbsp; <div id="presc_kcal" style="display: inherit;">(kcal/kg)</div>
                    <input type="hidden" name="kcal_valor" id="kcal_valor" value="0" />
                </label>
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-check entric_radio">
                <label>
                    <span style="color: #42bdbd;">PTN:</span> &nbsp;&nbsp; <div id="presc_ptn" style="display: inherit;">(g/kg)</div>
                    <input type="hidden" name="ptn_valor" id="ptn_valor" value="0" />
                </label> 
            </div>
        </div>
        <div class="form-group col-sm-2 col-lg-4 col-xl">
            <div class="form-check entric_radio">
                <a href="javascript:void(0);" id="editar_prescricao">Editar</a>
                <?php
                /*
                <a href="javascript:void(0);"  data-toggle="modal" data-target="#calculo_pres_editar">Editar</a>

                <div class="modal fade" id="calculo_pres_editar" tabindex="-1" role="dialog" aria-labelledby="calculo_pres_editar" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Prescrição Nutricional</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body" id="modal-pdf-body">
                            </div>
                        </div>
                    </div>
                </div>
                */
                ?>
            </div>
        </div>
    </div>
