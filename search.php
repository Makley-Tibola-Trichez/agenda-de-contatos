<?php
require 'database.php';

$pesquisar = null;

$pdo = Database::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['pesquisar'])) {
    $pesquisar = $_POST['pesquisar'];
    $sql = "SELECT * FROM contatos WHERE nome LIKE '%'?'%'"; 
    $q = $pdo->prepare($sql);
    $data = $q->fetch(PDO::FETCH_ASSOC);
    
}

Database::desconectar();
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Buscar por Contatos</title>
</head>

<body>
    <div class="container">
        <div class="span10 offset1">
            <div>
                <div class="row" style="margin-top: 16px">
                    <h2 class="well">Buscar Contatos</h2>
                </div>

                <form class="from-horizontal" method="POST">
                    
                    <div class="row card" style="margin-bottom: 16px;">
                        <input type="text" class="form-control" placeholder="Pesquisar Contato" name="pesquisar">
                    </div>
                    <div class="row">
                        <br/>
                        <button type="submit" class="btn btn-primary" style="margin-bottom: 16px;">Pesquisar</button>

                        <a href="index.php" class="btn btn-default" style="margin-bottom: 16px; margin-left: 4px;">Voltar</a>
                    </div>
                    
                </form>
            </div>
            <br/>
        </div>
        <div>
            <div class="row">
                <h2>Lista de Contatos</h2>
            </div>
        </div>
        </br>
        <div class="row">
            <p>
                <a href="create.php" class="btn btn-success">Adicionar</a>
            </p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pdo = Database::conectar();
                    $sql = 'SELECT * FROM contatos ORDER BY id DESC';

                    foreach($pdo->query($sql)as $row) {
                        if ($row['nome'] == $pesquisar) {

                            echo '<tr>';
                                    echo '<th scope="row">'. $row['id'] . '</th>';
                            echo '<td>'. $row['nome'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td>'. $row['telefone'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-primary" href="read.php?id='.$row['id'].'">Info</a>';
                            echo ' ';
                            echo '<a class="btn btn-warning" href="update.php?id='.$row['id'].'">Atualizar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Excluir</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    }
                    Database::desconectar();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>