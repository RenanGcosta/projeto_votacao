<?php
class Usuario
{
    private $id;
    private $nome;
    private $cpf;
    private $idade;
    private $voto;
    public $erro = [];

    public function __construct($nome, $cpf, $idade, $voto)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->idade = $idade;
        $this->voto = $voto;
    }

    public function getId($id)
    {
        return $this->id = $id;
    }
    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        return $this->nome = $nome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($cpf)
    {
        return $this->cpf = $cpf;
    }

    public function getIdade()
    {
        return $this->idade;
    }
    public function setIdade($idade)
    {
        return $this->idade = $idade;
    }

    public function getVoto()
    {
        return $this->voto;
    }
    public function setVoto($voto)
    {
        return $this->voto = $voto;
    }

    public function getErro()
    {
        return $this->erro;
    }
    public function setErro($erro){
        return $this->erro = $erro;
    }

    public function validarDados()
    {
        if (empty($this->nome)) {
            $this->erro["erro_nome"] = "O campo nome está vazio!";
        }

        if($this->idade < 16 || $this-> idade > 120 || !is_numeric($this->idade)){
        $this->erro["erro_idade"] = "Votação permitida apenas para maiores de 16 anos!";
    }

        $this->cpf = str_replace(".","", $this->cpf);
        $this->cpf = str_replace("-","", $this->cpf);
        if(!is_numeric($this->cpf)){
        $this->erro["erro_cpf"] = "Digite somente números!";
        }   
    }
    /*  
    function validarCPF($cpf) { 
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;    
    }  
    */
}