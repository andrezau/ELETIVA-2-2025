<?php

  include("cabecalho.php");

  $valor = 10;

    if (($valor > 10) && ($valor < 30)){
      echo "Valor maior que 10!";
    } elseif($valor < 10){
      echo "Valor menor que 20!";
    } else
        echo "Igual a 10";
  include("rodape.php");