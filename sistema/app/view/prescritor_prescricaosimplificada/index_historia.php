<div class="tab-pane fade" id="historia" role="tabpanel">
    <form action="prescritor_relatorioalta" method="post" autocomplete="off" onsubmit="return false">
        <input type="hidden" name="action" value="historia"/>

        <textarea class="form-control" style="min-width: 100%; height: 400px; resize: none;" placeholder="História da doença atual; comorbidades; funcionamento gastrointestinal; perda ponderal, dentre outros..." name="historia"></textarea>

        <div class="form-group row pt-5">
            <div class="col-sm-6 text-left">
                <button type="button" class="btn btn-secondary btn-sm" id="historia_salvar">
                    <span class="btn-icon-right"><i class="fa fa-save"></i></span>
                    SALVAR
                </button>
            </div>
            <div class="col-sm-6 text-right">
                <button type="button" class="btn btn-secondary btn-form" id="historia_voltar">VOLTAR</button>
                &nbsp;
                <button type="button" class="btn btn-warning btn-form" id="historia_avancar">AVANÇAR</button>
            </div>
        </div>
    </form>
</div>