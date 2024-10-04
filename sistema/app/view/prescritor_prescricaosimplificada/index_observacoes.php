
<div class="tab-pane fade" id="observacoes" role="tabpanel">
    <form action="prescritor_relatorioalta" method="post" autocomplete="off" onsubmit="return false">   
        <input type="hidden" name="action" value="observacoes"/>

        <textarea class="form-control" style="min-width: 100%; height: 400px; resize: none;" placeholder="Digite aqui" name="observacoes"></textarea>
        
        <div class="form-group row pt-5">
            <div class="col-sm-6 text-left">
                <button type="button" class="btn btn-secondary btn-sm" id="observacoes_salvar">
                    <span class="btn-icon-right"><i class="fa fa-save"></i></span>
                    SALVAR
                </button>
            </div>
            <div class="col-sm-6 text-right">
                <button type="button" class="btn btn-secondary btn-form" id="observacoes_voltar">VOLTAR</button>
                &nbsp;
                <button type="button" class="btn btn-warning btn-form" id="observacoes_avancar">AVANÇAR</button>
            </div>
        </div>
    </form>
</div>