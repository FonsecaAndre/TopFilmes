<?php
class Diretor
{
    public $id;
    public $nome;
    public $minibio;
    public $ano_nascimento;

    //Define um método construtor na classe e recebe um parâmetro opcional $id
    public function __construct($id = false)
    {
        //Verifica se a variável $id foi definida
        if ($id){
            //Atribui o valor de  $id á propriedade $id do objeto
            $this->id = $id;
            $this->carregar();
        }               //
    }   


    public function inserir()
    {
        //Define a string SQL de inserção de  dados na  tabela "Diretor".
        $sql = "INSERT INTO diretor (nome, minibio, ano_nascimento) VALUES (
            '" . $this->nome ."',
            '" . $this->minibio ."',
            '" . $this->ano_nascimento ."'
            )";

    //Cria uma nova conexao PDO com o banco de dados
    include "classes/conexao.php";


    //Executa a string SQL na  conexão, inserindo os dados na tabela "tb_turmas"
    $conexao->exec($sql);

    echo "Registro gravado com sucesso";
    //Essa linha retorna para a lista depois de 5 segundos 
    header("refresh:5; URL= diretor-listar.php");
    }
    public function listar()
    {
        $sql = "SELECT * FROM diretor";
        include "classes/conexao.php";

        $resultado = $conexao->query($sql);

        $lista = $resultado->fetchAll();

        return $lista;        

    }

    public function excluir()
    {
        $sql = "DELETE FROM diretor WHERE id=" . $this->id;

        include "classes/conexao.php";

        $conexao->exec($sql);
    }

    public function carregar()
    {
        $sql = "SELECT * FROM diretor WHERE id=" . $this->id;
        include "classes/conexao.php";

        $resultado = $conexao->query($sql);

        $linha = $resultado->fetch();

        $this->nome = $linha['nome'];
        $this->minibio = $linha['minibio'];
        $this->ano_nascimento = $linha['ano_nascimento'];
    }

    public function atualizar()
    {
        $sql = "UPDATE diretor SET 
                                nome = '$this->nome' ,
                                minibio = '$this->minibio' ,
                                ano_nascimento = '$this->ano_nascimento' 
                                WHERE id = $this->id ";

        include "classes/conexao.php";
        $conexao->exec($sql);

    }
    }

?>