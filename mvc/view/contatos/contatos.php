<?php
    $nome = null;
    $telefone = null;
    $celular = null;
    $email = null;
    $dataNascimento = null;
    $obs = null;
    if(isset($contato)){
        $id = $contato->getcodigo();
        $nome = $contato->getNome();
        $telefone = $contato->getTelefone();
        $celular = $contato->getCelular();
        $email = $contato->getEmail();
        $dataNascimento = $contato->getDataNascimento();
        $obs = $contato->getObs();

        $action = "router.php?controller=contatos&modo=atualizar&id=".$id;
    }else{
        $action = "router.php?controller=contatos&modo=inserir";
    }

?>

<div id="cadastro">
    <form name="frmcontatos" method="post" action="<?php echo($action) ?>">
        <table id="tblcadastro">
            <tr>
                <td colspan="2" class="titulo_tabela">Cadastro de Contatos</td>
            </tr>
            <tr>
                <td class="tblcadastro_td">Nome:</td>
                <td><input id="nome" value="<?php echo($nome) ?>" name="txtnome" type="text" required placeholder="Nome" /></td>
            </tr>
            <tr>
                <td class="tblcadastro_td">Telefone:</td>
                <td><input id="telefone" name="txttelefone" type="tel" value="<?php echo($telefone) ?>" /></td>
            </tr>
            <tr>
                <td class="tblcadastro_td">Celular:</td>
                <td><input name="txtcelular" type="tel" value="<?php echo($celular) ?>" placeholder="Ex:011 99999-9999" pattern="[0-9]{3} [0-9]{5}-[0-9]{4}"/></td>
            </tr>
            <tr>
                <td class="tblcadastro_td">Email:</td>
                <td><input name="txtemail" type="email" value="<?php echo($email) ?>" /></td>
            </tr>
            <tr>
                <td class="tblcadastro_td">Data Nascimento:</td>
                <td><input name="txtdatanascimento" type="text" value="<?php echo($dataNascimento) ?>" /></td>
            </tr>
            <tr>
                <td class="tblcadastro_td">Obs:</td>
                <td><textarea name="txtobs" cols="20" rows="5"><?php echo($obs) ?></textarea></td>
            </tr>
            <tr>
                <td><input name="btnsalvar" type="submit" value="Salvar" /></td>
                <td><input name="btnlimpar" type="reset" value="Limpar" /></td>
            </tr>
        </table>
    </form>
</div>
<div id="consulta">
    <table id="tblconsulta">
        <tr>
            <td class="titulo_tabela" colspan="5">Consulta de Contatos</td>
        </tr>
        <tr class="tblcadastro_td">
            <td>Nome</td>
            <td>Telefone</td>
            <td>Celular</td>
            <td>Email</td>
            <td>Opções</td>
        </tr>
        <tr class="tblconsulta_dados">
            <td></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>

        <?php
            //Import da controller de contato
            require_once("controller/controllerContato.php");
            $listContato = new controllerContato();

            //Chamada para o metodo de listagem de contato
            $rs = $listContato->listarContato();

            $cont = 0;

            while($cont < count($rs)){
        ?>
        <tr class="tblconsulta_dados">
            <td><?php echo($rs[$cont]->getNome()) ?></td>
            <td><?php echo($rs[$cont]->getTelefone()) ?></td>
            <td><?php echo($rs[$cont]->getCelular()) ?></td>
            <td><?php echo($rs[$cont]->getEmail()) ?></td>
            <td>
                <a href="router.php?controller=contatos&modo=buscar&id=<?php echo($rs[$cont]->getcodigo()) ?>">
                    <img src="icones/modify16.png">
                </a>|
                <a href="router.php?controller=contatos&modo=excluir&id=<?php echo($rs[$cont]->getcodigo()) ?>">
                    <img src="icones/delete16.png">
                </a>|
            </td>
        </tr>
        <?php
                $cont++;
            }
        ?>
    </table>
</div> 