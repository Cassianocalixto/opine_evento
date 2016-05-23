var evento = {
    tipo_cadastro: "",
    
    carregar : function(pagina){
        $.post("controller/"+pagina+".php",function(retorno){
            $("#conteudo").html(retorno);
        }); 
    },
    
    carregarCategoria: function(id){
        $.post("controller/categoria.php", "&id="+id,function(retorno){
            $("#conteudo").html(retorno);
        });  
    },
    
    exibirDetalhe: function(id){
        $.post("controller/detalheEvento.php","&id="+id,function(retorno){
            $("#conteudo").html(retorno);
        }); 
    },
    
    btLogin: function(){
        alert("Validar usuário");
    },
    
    
    cadastroUsuario: function(){
       $.post("controller/cadastroUsuario.php",function(retorno){
           $("#modal").html(retorno);
           $("#modal").modal("show");
       }); 
    },
    
    cadastroPessoaFisica: function(){
        var me = this;
        
        me.tipo_cadastro = "pessoa_fisica";
        $("#pessoa_fisica").show();
        $("#pessoa_juridica").hide();
        $("#bt_salvar_usuario").show();
        $("[name=cpf]").mask("999.999.999-99");
        $("[name=dt_nasc]").mask("99/99/9999");
    },
    
    cadastroPessoaJuridica: function(){
        var me = this;
        
        me.tipo_cadastro = "pessoa_juridica";
        $("#pessoa_juridica").show();
        $("#pessoa_fisica").hide();
        $("#bt_salvar_usuario").show();
    },
    
    btcomentario: function(){
        alert("Insert do comentário");
    },
    
    addMascaraTelefone: function(){
        var me = this,
            tipo = $("[name=tipo_tel]").val();
    
        switch (tipo){
            case "Residencial":
                $("[name=telefone]").focus().prop( "disabled", false );
                $("[name=telefone]").mask("(99)9999-9999");
            break;
            
            case "Celular":
                $("[name=telefone]").focus().prop( "disabled", false );
                $("[name=telefone]").mask("(99)99999-9999");
            break;
            
            default :
                $("[name=tipo_tel]").focus();
                $("[name=telefone]").prop( "disabled", true );
        }    
    },
    
    btSalvarUsuario: function(){
        var me       = this,
            dados    = {},
            msg_erro = "",
            nome     = $.trim($("[name=nome]").val()),
            cpf      = $.trim($("[name=cpf]").val().replace(/[^0-9]+/g,'')),
            dt_nasc  = $.trim($("[name=dt_nasc]").val()),
            tipo_tel = $.trim($("[name=tipo_tel]").val()),
            telefone = $.trim($("[name=telefone]").val()),
            email    = $.trim($("[name=email]").val()),
            senha    = $.trim($("[name=senha]").val());
        
        if(me.tipo_cadastro === "pessoa_fisica"){
            if(nome !== "" && cpf !== "" && dt_nasc !== "" && email !== "" && senha !== ""){
                $("#pf_campo_nome").removeClass("has-error");
                $("#pf_campo_cpf").removeClass("has-error");
                $("#pf_campo_dt_nasc").removeClass("has-error");
                $("#pf_campo_email").removeClass("has-error");
                $("#pf_campo_senha").removeClass("has-error");
                
                cpf_tamanho     = cpf.length;
                validar_email   = me.validarEmail(email);
                validar_cpf     = me.validarCPF(cpf);
                validar_dt_nasc = me.validarData(dt_nasc);
                
                if(cpf_tamanho === 11 && validar_email && validar_cpf && validar_dt_nasc ){
                    dados.tipo_cadastro = me.tipo_cadastro;
                    dados.nome          = nome;
                    dados.cpf           = cpf;
                    dados.dt_nasc       = dt_nasc;
                    dados.tipo_telefone = tipo_tel;
                    dados.telefone      = telefone;
                    dados.email         = email;
                    dados.senha         = senha;
                    
                    $.post("controller/cadastroUsuarioAction.php","&ac=inserir&dados="+JSON.stringify(dados), function(retorno) {
                         console.log(retorno);
                    });
                } else {
                    if(!validar_cpf)     { msg_erro += "CPF,"}
                    if(!validar_email)   { msg_erro += "E-mail,"}
                    if(!validar_dt_nasc) { msg_erro += "Data de nascimento,"}
                    
                    alert(msg_erro.substr(0, msg_erro.length-1)+' inválido!');
                }
            } else {
                (nome === "")    ? $("#pf_campo_nome").addClass("has-error")    : $("#pf_campo_nome").removeClass("has-error");
                (cpf === "")     ? $("#pf_campo_cpf").addClass("has-error")     : $("#pf_campo_cpf").removeClass("has-error");
                (dt_nasc === "") ? $("#pf_campo_dt_nasc").addClass("has-error") : $("#pf_campo_dt_nasc").removeClass("has-error");
                (email === "")   ? $("#pf_campo_email").addClass("has-error")   : $("#pf_campo_email").removeClass("has-error");
                (senha === "")   ? $("#pf_campo_senha").addClass("has-error")   : $("#pf_campo_senha").removeClass("has-error");
            }
        }
      
    },
    
    validarCPF: function(cpf){
        var me = this,
            rep = new Array ("00000000000", "11111111111", 
                             "22222222222","33333333333",
                             "44444444444","55555555555",
                             "66666666666","77777777777",
                             "88888888888", "99999999999");
        
        if(cpf != ""){
            if(cpf != rep[0] && cpf != rep[1] && cpf != rep[2] &&
               cpf != rep[3] && cpf != rep[4] && cpf != rep[5] &&
               cpf != rep[6] && cpf != rep[7] && cpf != rep[8] && cpf != rep[9] ){
                penultimoDigito = me.primeiroDigito(cpf);
                ultimoDigito    = me.segundoDigito(cpf);
        
                if (penultimoDigito == cpf.charAt(9) && ultimoDigito == cpf.charAt(10)) {
                    result = true;
                }else {
                    result = false;
                }
            } else {
                result = false;
            }
            
            return result;
            
        }
    },
    
    primeiroDigito: function (digito) {
        var me = this,
        total = 0,
        i = 0;
        // Obtendo a soma dos resultados da multiplicação
        for (i; i < 9; i++) {
            total += parseInt(digito.charAt(i) * (10 - i));
        }
        return me.ValorDigito(total);
    },
    
    segundoDigito: function (digito) {
        var me = this,
        total = 0,
        i = 0;
        // Obtendo a soma dos resultados da multiplicação
        for (i; i <10; i++) {
            total += parseInt(digito.charAt(i) * (11 - i));
        }
        return me.ValorDigito(total);
    },
    
    ValorDigito: function (total) {
        var result,
            digito;
        
        result = total % 11;
        if (result < 2) {
            digito = 0;
        } else {
            digito = 11 - result;
        }
        return digito;
    },
    
    validarEmail: function(email){
        var me  = this,
            exp = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2,3}/; 
    
            return (!exp.exec(email)) ? false : true;
    },
    
    validarData: function (data){
        var dia      = data.substring(0,2),
            mes      = data.substring(3,5),
            ano      = data.substring(6,10),
            novaData = new Date(ano,(mes-1),dia),
            mesmoDia = parseInt(dia,10) == parseInt(novaData.getDate()),
            mesmoMes = parseInt(mes,10) == parseInt(novaData.getMonth())+1,
            mesmoAno = parseInt(ano) == parseInt(novaData.getFullYear());
            return (!((mesmoDia) && (mesmoMes) && (mesmoAno))) ? false : true;
    },
    
}


$(document).ready(function() {
    evento.carregar("index");
});

