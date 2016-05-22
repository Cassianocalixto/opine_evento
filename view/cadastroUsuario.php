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
                <div class="btn-group text-center">
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
            
            <div id="pessoa_fisica" class="form-horizontal" style="display: none;">
                <div class="form-group" id="pf_campo_nome">
                    <label class="col-sm-1 control-label">Nome</label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" name="nome" placeholder="Informe o seu nome">
                    </div>
                    
                </div>
                
                <div class="form-group">
                    <div id="pf_campo_cpf">
                        <label class="col-sm-1 control-label">CPF:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="cpf" placeholder="Informe o seu CPF">
                        </div>
                    </div>
                    
                    <div id="pf_campo_dt_nasc">
                       <label class="col-sm-3 control-label">Data de Nasc:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="dt_nasc">
                        </div> 
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label class="col-sm-1 control-label">Tipo:</label>
                    <div class="col-sm-5">
                        <select class="form-control" name="tipo_tel" onchange="evento.addMascaraTelefone()">
                            <option>&nbsp;</option>
                            <option>Residencial</option>
                            <option>Celular </option>
                        </select>
                    </div>
                    
                    <label class="col-sm-2 control-label">Telefone:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="telefone" disabled="">
                    </div>
                </div>
                
                <div class="form-group" id="pf_campo_email">
                    <label class="col-sm-1 control-label">E-mail:</label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" name="email" placeholder="Informe o seu e-mail">
                    </div>
                </div>
                
                <div class="form-group" id="pf_campo_senha">
                    <label class="col-sm-1 control-label">Senha: </label>
                    <div class="col-sm-11">
                        <input type="password" class="form-control" name="senha" placeholder="Informe a senha">
                    </div>
                </div>
                
            </div>
            
            <div id="pessoa_juridica" style="display: none;">
               Colocar o formulário de cadastro da Pessoa Jurídica aqui!!! 
            </div>
        </div>
        
        <div class="modal-footer" id="bt_salvar_usuario" style="display: none;">
            <button type="button" onclick="evento.btSalvarUsuario()" class="btn btn-success btn-lg btn-block">Salvar</button>
        </div>
    </div>
</div>
