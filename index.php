<?php
require_once "model/categoria.class.php";

// Carregar as categorias 
$categoria        = new categoria();
$result_categoria = $categoria->selectAll();

include_once 'view/index.php';