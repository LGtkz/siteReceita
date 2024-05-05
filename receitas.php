<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Do fogão a mesa</title>
</head>

<body>
    <?php include("header.php") ?>
    <h1 id="tituloReceita">Receitas</h1>
    <div class="receitas">
        <?php
        include("ConectaBanco.php");
        $query = "SELECT nomeReceita, img, id FROM receitas";
        $stmt = $conexao->query($query);

        // Verifica se há resultados
        if ($stmt) {
            // Itera sobre os resultados
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $nomeReceita = $row['nomeReceita'];
                $img = $row['img'];
                $id = $row['id'];
                // Cria a div para cada receita
                echo '<div class="receita-uni">';
                echo '<img src="' . $img . '" alt="' . $nomeReceita . '">';
                echo '<h4>' . $nomeReceita . '</h4>';
                echo '<a href="ReceitaCompleta.php?id='.$id.'">Veja mais</a>';
                echo '</div>';
            }
        } else {
            // Se não houver resultados     
            echo "Nenhuma receita encontrada.";
        }
        $conexao = null;
        ?>

    </div>
    <?php include("footer.php") ?>
</body>

</html>