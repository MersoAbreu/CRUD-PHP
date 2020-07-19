<?php
require_once "./classes/Funcionario.php";
require_once "./classes/Db.php";

function __autoload($class)
{
  require_once "classes/$class.php";
}
if(isset($_GET['del'])){
  $id = $_GET['del'];
}
$funcionarios = new Funcionario();
if(isset($id)){
$funcionarios->destroy($id);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>CADASTRO POO</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">CRUD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cadastrar</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="create.php">Funcionários</a>
      <a class="dropdown-item" href="#">Equipamentos</a>
      <a class="dropdown-item" href="#">Periféricos</a>
    </div>
  </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contato</a>
      </li>
 
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotrom">
              <a class="float-right btn btn-success" href="create.php">Novo</a>
                 <h4 class="mb-5">Todos cadastros</h4>
            </div>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Cidade</th>
      <th scope="col">Cargo</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $funcionario = new Funcionario();

     $rows =  $funcionario->select();
    if($rows){
     foreach($rows as $row){
?>
      <tr>
      <th scope="row"><?php echo $row['id'];?></th>
      <td><?php echo $row['nome'];?></td>
      <td><?php echo $row['cidade'];?></td>
      <td><?php echo $row['cargo'];?></td>
      <td><a class="btn btn-sm btn-primary" href="edit.php?id=<?php echo $row['id'];?>">Editar</a> &nbsp <a class="btn btn-sm btn-danger" href="index.php?del=<?php echo $row['id'];?>">Deletar</a></td>
    </tr>


  <?php } ?>
     <?php }else{
       echo "Sem dados registrados!";
     } ?>
   
  </tbody>
</table>
           
        </div>
    </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>