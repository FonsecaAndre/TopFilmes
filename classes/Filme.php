<?php
class Filme{

    public $id;
    public $titulo;
    public $img_cartaz;
    public $sinopse;
    public $ano_lancamento;
    public $duracao;
    public $nota_imdb;
   
    public $diretor_id;
    public $nomeCartaz;
    public $caminhoCartaz;


    
    public function __construct($id = false)
    {
        if ($id){
            $this->id=$id;
            $this->carregar();
        }
    }

    public function carregar(){
        //Query SQL para buscar o aluno no banco de dados pelo id
        $sql = "SELECT * FROM filme WHERE id =" . $this->id;
        include "classes/conexao.php";

        //Execução da Query o armazenameto do resultado em uma varialvel
        $resultado = $conexao->query($sql);

        //Recuperação da primeira linha do resultado com uma array associativo
        $linha = $resultado->fetch();

        //Atribuição dos valores dos campos da turma recuperados do banco ás propriedades do objeto
        $this->id = $linha['id'];
        $this->titulo = $linha['titulo'];
        $this->img_cartaz = $linha['img_cartaz'];
        $this->sinopse = $linha['sinopse'];
        $this->ano_lancamento = $linha['ano_lancamento'];
        $this->duracao = $linha['duracao'];
        $this->nota_imdb = $linha['nota_imdb'];        
        $this->diretor_id = $linha['fk_diretor_id'];
    } 
    
    
    public function listar(){
        $sql = "SELECT f.id, f.titulo, f.sinopse, f.ano_lancamento, f.duracao, f.nota_imdb, f.img_cartaz, f.fk_diretor_id, d.nome
                FROM filme f JOIN diretor d
                ON f.fk_diretor_id = d.id
                ORDER BY f.id ";
        include "classes/conexao.php";
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function inserir(){
       // A função do Php "preg_match()", pega a extensão da imagem e carrega a variável $ext
       preg_match("/\.([a-zA-Z]{3,4})$/", $this->img_cartaz["name"], $ext);

       /*Esta linha usa as funções PHP md5(), uniqid() e time()
            para gerar um nome único para a imagem. Depois concatna com a extensão extraída na linha acima*/
            if (isset($ext[1])) {
                $this->nomeCartaz = md5(uniqid(time()) . "." . $ext[1]);
            } else {
                // Trate a situação em que a extensão não foi encontrada
                echo "Erro: Extensão de arquivo não reconhecida.";
                return;  // Ou tome alguma ação apropriada para o seu caso
            }
       
       //Esta linha concatena o caminho da  pasta que guardaremos as imagens com o nome da imagem.
       $this->caminhoCartaz = 'img/' . $this->nomeCartaz;

       //Aqui utilizaremos a função PHP move_upload_file() para salvar a imagem na pasta.
       move_uploaded_file($this->img_cartaz["tmp_name"], $this->caminhoCartaz);
       
       $sql = "INSERT INTO filme (titulo, img_cartaz, sinopse, ano_lancamento, duracao, nota_imdb,  fk_diretor_id) 
            VALUES (
         '{$this->titulo}',
         '{$this->nomeCartaz}',
         '{$this->sinopse}',
         '{$this->ano_lancamento}',
         '{$this->duracao}',
         '{$this->nota_imdb}',         
         '{$this->diretor_id}'      
        )";   
            
       include "classes/conexao.php";
       $conexao->exec($sql);
       echo "Registro Gravado com sucesso!";
       header("refresh:2; URL= filme-listar.php");

    }
    public function excluir()
    {
        $sql = "DELETE FROM filme WHERE id=" . $this->id;

        include "classes/conexao.php";

        $conexao->exec($sql);
    }


    public function atualizar(){

        if (!empty($_FILES['imgcartaz']['name'])) {
            preg_match("/\.([a-zA-Z]{3,4})$/", $_FILES['imgcartaz']['name'], $ext);
        
            if (isset($ext[1])) {
                $nomeCartaz = md5(uniqid(time()) . "." . $ext[1]);
                $caminhoCartaz = 'img/' . $nomeCartaz;
                move_uploaded_file($_FILES['imgcartaz']['tmp_name'], $caminhoCartaz);
               
                $this->nomeCartaz = $nomeCartaz;
            } else {
                
                echo "Erro: Extensão de arquivo não reconhecida.";
                return;  // Ou tome alguma ação apropriada para o seu caso
            }
        }

        $sql = "UPDATE filme SET
                                titulo = '$this->titulo',
                                img_cartaz = '$this->nomeCartaz',
                                sinopse = '$this->sinopse',
                                ano_lancamento = '$this->ano_lancamento',
                                duracao = '$this->duracao',
                                nota_imdb = '$this->nota_imdb',
                                fk_diretor_id = '$this->diretor_id'
                                WHERE id = $this->id";

            include "classes/conexao.php";
             $conexao->exec($sql);     

    }
       
    }



?>