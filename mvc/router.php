<?php
$controller = null;
$modo = null;

if(isset($_GET["controller"])){
    //Sempre serão enviadas pela view
    $controller = strtoupper($_GET["controller"]);
    $modo = strtoupper($_GET["modo"]);

    switch($controller){
        case "CONTATOS":
            //Import da controller de contato
            require_once("controller/controllerContato.php");
                    
            //Instancia da controller de contato
            $controllerContato = new controllerContato();

            switch($modo){
                case "INSERIR":
                    //Chamando o método de inserir um novo contato
                    $controllerContato->inserirContato();
                    break;
                case "ATUALIZAR":
                    $controllerContato->atualizarContato();
                    break;
                case "EXCLUIR":
                    $controllerContato->excluirContato();
                    break;
                case "BUSCAR":
                    $contato = $controllerContato->buscarContato();
                    require_once("index.php");
                    break;

            }
            break;
    }
}
?>