<?php
require_once('app/Database/ConexaoDB.php');

/*  $query_total = "SELECT count(voto) AS TOTAL FROM USUARIOS";
    $total = $conn->prepare($query_total);
    $total->execute();
    $row_total = $total->fetch(PDO::FETCH_ASSOC);
    echo "Total de votos: " . $row_total['TOTAL']
*/
                        
class ControllerUsuario
{
    public function createUsuario(Usuario $usuario){
        try{
            $insertUsuario = "INSERT INTO usuarios (nome, cpf, idade, voto) VALUES (:nome, :cpf, :idade, :voto)";
            $stmt = ConexaoDB::getConn()->prepare($insertUsuario);
            $stmt->bindValue(':nome', $usuario->getNome());
            $stmt->bindValue(':cpf', $usuario->getCpf());
            $stmt->bindValue(':idade', $usuario->getIdade());
            $stmt->bindValue(':voto', $usuario->getVoto());
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function readUsuario(){
        try{
            $queryUsuario = "SELECT * FROM usuarios";
            $stmt = ConexaoDB::getConn()->prepare($queryUsuario);
            $stmt->execute();

            if($stmt->rowCount()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function updateUsuario(Usuario $usuario){

    }

/*  public function deleteUsuario(int $id){

    }
    public function validarCpf(usuario $cpf){

    }   */
}
