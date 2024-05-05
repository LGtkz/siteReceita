<?php 
    $currentPage = basename($_SERVER['PHP_SELF']);
?>
<header>
        <nav>
            <div>
                <img src="assets/logo.png" alt="" srcset="">
            </div>
            <div class="navega">
                <a href="index.php" <?php if ($currentPage == "index.php") echo 'id="pagAtual"' ?>>HOME</a>
                <a href="receitas.php" <?php if ($currentPage == "receitas.php" || $currentPage == "receitaAlmoco.php" || $currentPage == "salgados.php" || $currentPage == "sobremesa.php" || $currentPage == "receitaJantar.php") echo 'id="pagAtual"'?>>RECEITAS</a>
                <!-- <a href="enviarReceita.php" <?php if ($currentPage == "enviarReceita.php") echo 'id="pagAtual"' ?>>ENVIE SUA RECEITA</a>!-->
            </div>
        </nav>
    </header>