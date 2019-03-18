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
                    //Import da controller de contato
                    require_once("controller/controllerContato.php");
                    
                    //Instancia da controller de contato
                    $controllerContato = new controllerContato();

                    //Chamando o método de inserir um novo contato
                    $controllerContato->inserirContato();

                    break;
                case "ATUALIZAR":

                case "EXCLUIR":
                
                case "BUSCAR":

            }
            break;
    }
}
?>