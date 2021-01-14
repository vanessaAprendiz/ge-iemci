<?php

class UsuarioController 
{

    public function informacaoDaConta($params)
    {
        try{

        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('viewUsuario.html');

        //INFORMAÇÃO DO USUÁRIO
        var_dump($_SESSION['user']);
        $info['name_user'] = $_SESSION['user']['name_user'];
        $info['cargo'] = $_SESSION['user']['cargo'];
        $info['departamento'] = $_SESSION['user']['departamento'];
        $info['email'] = $_SESSION['user']['email'];


        $conteudo = $template->render($info);
        echo $conteudo;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }


    public function alteraUsuario()
    {      
      try {
        UsuarioModel::altera($_POST);
            echo '<script>alert("Usuário alterado com sucesso");</script>';
            echo '<script>location.href="?pagina=equipamento&metodo=viewEquipamento&id=' . $_POST['id_equip'] . '"</script>';
        } catch (Exception $e) {
            echo $e->getMessage(); /*'<script>alert("' . $e->getMessage() . '");</script>';
            echo '<script>location.href="?pagina=equipamento&metodo=viewEquipamento&id=' . $_POST['id_equip'] . '"</script>';*/
        }
    }

}
