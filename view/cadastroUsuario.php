<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header btn-warning">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">
                <span class="glyphicon glyphicon-user"></span>
                &nbsp; CADASTRO DE USUÁRIO
            </h4>
        </div>
        
        <div class="modal-body">
            <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group text-center" role="group">
                     <strong class="text-danger">Cadastrar Como:</strong>
                </div>
                
                <div class="btn-group" role="group">
                    <button type="button" onclick="evento.cadastroPessoaFisica()" class="btn btn-info">Pessoa Física</button>
                </div>
                
                <div class="btn-group" role="group">
                    <button type="button" onclick="evento.cadastroPessoaJuridica()" class="btn btn-primary">Pessoa Jurídica</button>
                </div>
            </div>
            <hr>
            
            <div id="pessoa_fisica" style="display: none;">
                Colocar o formulário de cadastro da Pessoa Física aqui!!!
            </div>
            
            <div id="pessoa_juridica" style="display: none;">
               Colocar o formulário de cadastro da Pessoa Jurídica aqui!!! 
            </div>
        </div>
        
        <div class="modal-footer" id="bt_salvar_usuario" style="display: none;">
            <button type="button" class="btn btn-success">Salvar</button>
        </div>
    </div>
</div>
