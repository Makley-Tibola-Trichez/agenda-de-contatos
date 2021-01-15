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

                    $limite = 10;

                    $pg = (isset($_GET['pg'])) ? (int)$_GET['pg'] : 1;

                    $inicio = ($pg * $limite) - $limite;

                    $sql = "SELECT * FROM contatos ORDER BY id DESC LIMIT ".$inicio.",".$limite;


                    try {
                        $query = $pdo->prepare($sql);
                        $query->execute();
                    } catch (PDOException $e) {
                        echo 'Erro ao retornar os Dados.'.$e->getMessage();
                    }

                    while($linha = $query->fetch(PDO::FETCH_ASSOC)) {

                        echo '<tr>';
                        echo '<th scope="row">'.$id = $linha['id'] . '</th>';

                        echo '<td>'.$nome = $linha['nome'] .     '</td>';
                        echo '<td>'.$email = $linha['email'] .    '</td>';
                        echo '<td>'.$telefone = $linha['telefone'] . '</td>';

                        echo '<td width=250>';
                        echo '<a class="btn btn-primary" href="read.php?id='    .$linha['id'].'">Info</a>';
                        echo ' ';
                        echo '<a class="btn btn-warning" href="update.php?id='  .$linha['id'].'">Atualizar</a>';
                        echo ' ';
                        echo '<a class="btn btn-danger" href="delete.php?id='   .$linha['id'].'">Excluir</a>';
                        echo '</td>';
                        echo '</tr>'; 
                    }

                    $sql_total = 'SELECT id FROM contatos';


                    try {
                        $query_total = $pdo->prepare($sql_total);
                        $query_total->execute();

                        $query_result = $query_total->fetchAll(PDO::FETCH_ASSOC);
                        $query_count = $query_total->rowCount(PDO::FETCH_ASSOC);

                        $qtdPg = ceil($query_count / $limite);

                    } catch (PDOException $e) {
                        echo 'Erro ao retornar os Dados. '.$e->getMessage();
                    }

                    ?>
                </tbody>
            </table>

            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="index.php?pg=1" tabindex="-1">Início</a>
                    </li>

                    <?php 
                    
                    if ($qtdPg > 1 && $pg<= $qtdPg){
                        for ($i=1; $i <= $qtdPg; $i++){
                            if ($i == $pg){
                                echo "<a class='page-link' href='index.php?pg=$i'>".$i."</a>";
                            } else {
                                echo "<li class='page-item'>";
                                
                                echo "<a class='page-link' href='index.php?pg=$i'>".$i."</a>";
                                
                                echo "</li>";
                            }
                        }
                    }

                    echo "<li class='page-item'>";
                        echo "<a class='page-link' href='index.php?pg=$qtdPg'>Último</a>";
                    echo "</li>";
                    
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</html>
