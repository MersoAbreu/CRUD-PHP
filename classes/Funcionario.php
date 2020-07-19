<?php



class Funcionario extends Db{
    
    public function select(){
        $sql = "SELECT * FROM func";
        
        $resultado = $this->connect()->query($sql);

        if($resultado->rowCount()>  0){
            while($row = $resultado->fetch()){
                $data[]=$row;
            }
            return $data;
        }
    }

  public function insert($fields){

    $valorColunas = implode(', ',array_keys($fields));
    $valuePlaceholder = implode(", :",array_keys($fields));

    $sql = "INSERT INTO func ($valorColunas) VALUES (:".$valuePlaceholder.")";
    $stmt = $this->connect()->prepare($sql);

    foreach($fields as $key =>$value){
        $stmt->bindValue(':'.$key,$value);
    }
    $stmtExec = $stmt->execute();
    if($stmtExec){
        header('Location: index.php');
    }
  }

  public function selectOne($id){
    $sql = "SELECT * FROM func WHERE id = :id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado;
  }

  public function update($fields,$id){
        $nome = $fields['nome'];
        $cidade = $fields['cidade'];
        $cargo = $fields['cargo'];
        $sql = ("UPDATE func SET nome = '$nome', cidade = '$cidade', cargo = '$cargo' WHERE id = $id");
        $stmt = $this->connect()->prepare($sql);
        $stmtExe= $stmt->execute();
            if ( $stmtExe){

            header("location:index.php");
        }
    }
    public function destroy($id){
        $sql = "DELETE FROM func WHERE id=:id";

        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }



}













?>