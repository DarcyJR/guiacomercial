<?php
include_once("./config/config.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <title>Sua Página</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="busca">
                <form class="form-busca" action="" method="get">
                    <input type="text">
                    <button class="styled-button" type="submit">
                        <i class="bi bi-search"></i><!--Icone bootstrap-->
                    </button>
                </form>
            </div>
        </header>
        <?php
        $sql = "SELECT * FROM tabela_empresas";

        $results = $conn->query($sql);

        //$itens = $result -> fetch_all();

        if ($results->num_rows > 0) {
            while ($result = $results->fetch_assoc()) {
                echo ('
                            <section class="baner">
                                <div class="imagem">
                                    <img src="./img/Design sem nome.png" alt="" srcset="">
                                </div>
                                <div class="card">
                                    <h2 class="roboto-black">' . $result['nome'] . '</h2>
                                    <br>
                                    <p class="roboto-regular"><i class="bi bi-geo-alt"></i> ' . $result['endereco'] . '</p>
                                    <br>
                                    <p class="roboto-regular"><i class="bi bi-telephone"></i> ' . $result['numTelefone'] . '</p>
                                    <br>
                                    <p class="roboto-regular email">
                                        <a href="mailto:' . $result['email'] . '">
                                            <i class="bi bi-envelope"></i>
                                            ' . $result['email'] . '
                                        </a>
                                    </p>
                                    <br>
                                    <div class="redes">
                                        <a target="_blank" href=""><i class="bi bi-whatsapp"></i></a>
                                        <a target="_blank" href="' . $result['facebook'] . '"><i class="bi bi-facebook"></i></a>
                                        <a target="_blank" href="' . $result['instagram'] . '"><i class="bi bi-instagram"></i></a>
                                    </div>
                                </div>
                            </section>
                        ');
            }
        } else {
            echo "Nenhum resultado encontrado.";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>