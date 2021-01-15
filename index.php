<?php




?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Página Inicial</title>
</head>

<body>
    <div class="container">

        <div>
            <div class="row" style="margin-top: 24px;">
                <h2>Lista de Contatos</h2>
            </div>
        </div>
        </br>
        <div class="row">
            <p>
                <a href="create.php" class="btn btn-success">Adicionar</a>
            </p>

            <div class="row" style="margin-left: 6px;">
                <br/>
                <a href="search.php" type="submit" class="btn btn-primary" style="margin-bottom: 16px;">Pesquisar</a>
            </div>
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
                    include 'database.php';
                    $pdo = Database::conectar();
                    $sql = 'SELECT * FROM contatos ORDER BY id DESC';
                    
                

                    foreach($pdo->query($sql)as $row)
                    {
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
                    Database::desconectar();
                    ?>
                </tbody>
            </table>
        </div>
        <div class="footer-section">
        
        </div>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</html>
