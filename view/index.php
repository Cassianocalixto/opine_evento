<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="view/style/img/favicon.ico">
        <title>Opine Evento</title>
        <link href="view/style/css/bootstrap.css" rel="stylesheet">
        <link href="view/style/css/bootstrap-theme.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="view/style/js/bootstrap.min.js"></script>
        <script src="view/style/js/actions.js"></script>
    </head>

    <body role="document">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" onclick="evento.carregar('index')" style="cursor:pointer;">
                        <img class="img-responsive" src="view/style/img/logo.png" width="110" height="140" style="margin-bottom: 10px">
                    </a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a onclick="evento.carregarCategoria('1')">Categoria 1</a></li>
                        <li><a onclick="evento.carregarCategoria('1')">Categoria 2</a></li>
                        <li><a onclick="evento.carregarCategoria('1')">Categoria 3</a></li>
                    </ul>

                    <div class="navbar-form navbar-right" style="top: 13px; position:relative;">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Informe o e-mail">
                        </div>

                        <div class="form-group">
                          <input type="password" class="form-control" placeholder="Informe a senha">
                        </div>
                        <button class="btn btn-success" onclick="evento.btLogin()">Entrar</button>
                        <button class="btn btn-warning" onclick="evento.cadastroUsuario()">Cadastrar</button>
                    </div>
                </div>
            </div>
        </nav>
    
        <div class="modal fade" id="modal" role="dialog"></div>
        
        <div class="container" style="position: relative; margin-top: 8%;">
            <div id="conteudo" style="position: relative; top: 25px; margin-bottom: 10%"></div>
        </div>
        
        <footer class="footer">
            <p class="text-center text-success">&copy; <?php echo date("Y")?> Direitos reservados da Opine Evento.</p>
        </footer>
    </body>
</html>
