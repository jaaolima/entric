<div class="modal fade" id="modal_unidades" role="dialog" aria-labelledby="modal_unidades" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Unidades</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="pull-right pb-3">
                    <button type="button" class="btn btn-secondary btn-form" onclick="modalUnidadesCadastrar();">Cadastrar</button>
                </div>

                <div class="entric_table_loading wrapper-lg text-center"><i class="fa fa-cog fa-spin" style="color: #f89f39;"></i></div>
                <table style="display: none;" class="table table-hover table-striped entric_table">
                    <thead>
                        <tr>
                            <th class="col-md-9">Descrição</th>
                            <th class="col-md-3 text-center">Opção</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>