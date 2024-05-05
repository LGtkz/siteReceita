<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fogão a mesa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <?php include("header.php") ?>
    <main>
        <?php
        // Se o parâmetro 'id' foi passado na URL, recupera seu valor
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            // Se o parâmetro 'id' não foi passado, exibe uma mensagem de erro
            echo 'Receita não existe';
        }
        include("ConectaBanco.php");
        // Query para recuperar os dados da receita do banco de dados
        $query = "SELECT img, nomeReceita, ingredientes, modoPreparo, descReceita FROM receitas WHERE id = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Executa a consulta
        $stmt->execute();

        // Verifica se há resultados
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $img = $row['img'];
            $titulo = $row['nomeReceita'];
            $ingredientes = $row['ingredientes'];
            $modoPreparo = $row['modoPreparo'];
            $descReceita = $row['descReceita'];

            // Saída HTML com os dados da receita
            echo '<div class="tituloB" style="background-image: url(\'' . $img . '\');">';
            echo '<h1 id="titulo-receita">' . $titulo . '</h1>';
            echo '</div>';
            echo '<p id="desc">' . $descReceita . '</p>';
            echo '<div class="ads">';
            echo '<div>';
            echo '<aside> aside </aside>';
            echo '</div>';
            echo '<div class="receita-fera">';
            echo '<div class="ingredientes">';
            echo '<h3>Ingredientes</h3>';
            // Quebra o texto dos ingredientes em linhas e formata como uma lista numerada
            echo '<ul>';
            echo '<li>' . str_replace("\n", '</li><li>', $ingredientes) . '</li>';
            echo '</ul>';
            echo '</div>';
            echo '<div class="preparo">';
            echo '<h3>Modo de Preparo</h3>';
            // Quebra o texto do modo de preparo em linhas e formata como uma lista numerada
            echo '<ul>';
            echo '<li>' . str_replace("\n", '</li><li>', $modoPreparo) . '</li>';
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            echo '<div>';
            echo '<aside> aside </aside>';
            echo '</div>';
            echo '</div>';
        } else {
            // Se não houver resultados
            echo "Nenhuma receita encontrada.";
        }
        $conexao = null;
        ?>

    </main>
    <?php include("footer.php") ?>
</body>

</html>