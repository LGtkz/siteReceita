<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fogão a mesa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <?php include("header.php") ?>
    <?php
    // Inclui o arquivo de conexão com o banco de dados
    include("ConectaBanco.php");

    // Verifica se o parâmetro 'idTipo' foi passado na URL
    if (isset($_GET['idTipo'])) {
        $idTipo = $_GET['idTipo'];
    } else {
        // Se o parâmetro 'idTipo' não foi passado na URL
        echo "ID do tipo não foi especificado.";
    }
    // Query para selecionar as receitas filtradas pelo idTipo
    $query = "SELECT nomeReceita, img, id, tipoReceita FROM receitas WHERE tipoReceita = :idTipo";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':idTipo', $idTipo, PDO::PARAM_STR);

    // Executa a consulta
    $stmt->execute();
    echo '<h1 id="tituloReceita"> '.$idTipo.' </h1>';
    echo '<div class="receitas">';

    // Verifica se há resultados
    if ($stmt->rowCount() > 0) {
        // Exibe as receitas filtradas
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nomeReceita = $row['nomeReceita'];
            $img = $row['img'];
            $id = $row['id'];
            $tipo = $row['tipoReceita'];
            
            // Exibe cada receita
            echo '<div class="receita-uni">';
            echo '<img src="' . $img . '" alt="' . $nomeReceita . '">';
            echo '<h4>' . $nomeReceita . '</h4>';
            echo '<a href="ReceitaCompleta.php?id=' . $id . '">Veja mais</a>';
            echo '</div>';
        }
    } else {
        // Se não houver resultados
        echo "Nenhuma receita encontrada para este tipo.";
    }
    echo '</div>';
    // Fecha a conexão
    $conexao = null;
    ?>
    <?php include("footer.php") ?>
</body>

</html>