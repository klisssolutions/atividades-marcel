<?php
$controller = null;
$modo = null;

if(isset($_GET["controller"])){
    //Sempre Serão enviadas pela view
    $controller = strtoupper($_GET["controller"]);
    $modo = strtoupper($_GET["modo"]);

    switch($controller){
        case "CONTATOS":
            switch($modo){
                case "INSERIR":
                case "ATUALIZAR":
                case "EXCLUIR":
                case "BUSCAR":
            }
    }
}
?>