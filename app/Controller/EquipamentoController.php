<?php

class EquipamentoController
{
    /*  public function index(){

        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');

          $parametros = array();


          $conteudo = $template->render($parametros);
          echo $conteudo;

    }*/

    public function viewEquipamento($params)
    {

        try {
            $equipamento = Equipamento::getById($params);

            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('viewEquipamento.html');

            $parametros = array();
            $parametros['id'] = $equipamento->id;
            $parametros['modelo'] = $equipamento->modelo;
            $parametros['detalhes'] = $equipamento->detalhes;
            $parametros['num_serial'] = $equipamento->num_serial;
            $parametros['num_patrimonio'] = $equipamento->num_patrimonio;
            $parametros['departamento'] = $equipamento->departamento;
            $parametros['categoria'] = $equipamento->categoria;
            $parametros['registros'] = $equipamento->registros;


            $conteudo = $template->render($parametros);
            echo $conteudo;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function addEquipamento()
    {
        try {
            Equipamento::insert($_POST);
            echo '<script>alert("Equipamento inserido com sucesso");</script>';
            echo '<script>location.href="?pagina=home&metodo=index"</script>';
        } catch (Exception $e) {
            echo '<script>alert("' . $e->getMessage() . '");</script>';
            echo '<script>location.href="?pagina=home&metodo=index"</script>';
        }
    }


    //FUNÇÃO QUE ALTERA OS DADOS SELECIONADOS
    public function atualizaEquip()
    {
        
      try {

        $model = $_POST['modelo'];
        $id = $_POST['id_equip'];
        Equipamento::update($model, $id);
            /*Equipamento::update($_POST);

            echo '<script>alert("Publicação alterada com sucesso");</script>';
            echo '<script>location.href="?pagina=equipamento&metodo=viewEquipamento&id=' . $_POST['id_equip'] . '"</script>';*/
        } catch (Exception $e) {
            echo $e->getMessage(); /*'<script>alert("' . $e->getMessage() . '");</script>';
            echo '<script>location.href="?pagina=equipamento&metodo=viewEquipamento&id=' . $_POST['id_equip'] . '"</script>';*/
        }
    }
}
