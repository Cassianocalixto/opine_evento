var evento = {
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
        $("#pessoa_fisica").show();
        $("#pessoa_juridica").hide();
        $("#bt_salvar_usuario").show();
    },
    
    cadastroPessoaJuridica: function(){
        $("#pessoa_juridica").show();
        $("#pessoa_fisica").hide();
        $("#bt_salvar_usuario").show();
    },
    
    btcomentario: function(){
        alert("Insert do comentário");
    },
    
    
    
    
}


$(document).ready(function() {
    evento.carregar("index");
});

