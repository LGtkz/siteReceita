<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<footer>
        <div class="identidade">
            <h4>Fogão a mesa©</h4>
            <p>Descubra o sabor autêntico do Do Fogão à Mesa</p>
            <p>sua fonte de receitas caseiras irresistíveis!</p>
        </div>
        <div class="insta">
        <a id="insta" href=""><i class="fab fa-instagram"></i>Instagram</a>
        <a href=""><i class="fa-regular fa-envelope"></i>E-mail</a>
        </div>
        <div class="pags">
            <a href="index.php" <?php if ($currentPage == "index.php") echo 'id="marcado"' ?>>HOME</a>
            <a href="receitas.php"  <?php if ($currentPage == "receitas.php") echo 'id="marcado"' ?>>RECEITAS</a>
           <!-- <a href="enviarReceita.php"  <?php if ($currentPage == "enviarReceita.php") echo 'id="marcado"' ?>>ENVIE SUA RECEITA</a> !-->
        </div>
    </footer>