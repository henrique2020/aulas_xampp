<?php
require_once getcwd()."\db\MySQL.class.php";

class Avaliacao{
    private $id;
    private $data;
    private $disciplina;
    private $conteudo;
    private $tipo;
    private $peso;

    public function __construct($id = null, $data = null, $disciplina = null, $conteudo = null, $tipo = null, $peso = null){
        $this->id = $id;
        $this->data = $data;
        $this->disciplina = $disciplina;
        $this->conteudo = $conteudo;
        $this->tipo = $tipo;
        $this->peso = $peso;

        
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function __get($atributo){
        return $this->$atributo;
    }

    public function inserir(){
        $conexao = new MySQL();
        $sql = "insert 
                into avaliacoes (data, disciplina, conteudo, tipo, peso) 
                values
                ('".$this->data."',".$this->disciplina.",'".$this->conteudo."',".$this->tipo.",".$this->peso.")";
        echo $sql;
        //Em caso de erro dar o comando: die;
        $conexao->executa($sql);
    }

    public static function listaTodos(){
        $conexao = new MySQL();
		$sql = "SELECT * FROM avaliacoes";
		$resultados = $conexao->consulta($sql);
		if(!empty($resultados)){
            $avaliacoes = array();
            foreach($resultados as $resultado){
                $avaliacao = new Avaliacao();
                $avaliacao->id = $resultado['id'];
                $avaliacao->data = $resultado['data'];
                $avaliacao->disciplina = $resultado['disciplina'];
                    /*if ($avaliacao->disciplina == "1") {
                        $avaliacao->disciplina = "Programação";
                    }
                    else if ($avaliacao->disciplina == "2") {
                        $avaliacao->disciplina = "Banco de dados";
                    }
                    else {
                        $avaliacao->disciplina = "Análise de Sistemas";
                    }*/
                $avaliacao->conteudo = $resultado['conteudo'];
                $avaliacao->tipo = $resultado['tipo'];
                    /*if ($avaliacao->tipo == "1") {
                        $avaliacao->tipo = "Trabalho";
                    }
                    else {
                        $avaliacao->tipo = "Prova";
                    }*/
                $avaliacao->peso = $resultado['peso'];

                $avaliacoes[] = $avaliacao;
            }
            return $avaliacoes;
        }else{
            return false;
        }
    }
}