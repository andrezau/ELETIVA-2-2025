<?php

  include("cabecalho.php");

  $diaSemana = 3;

  switch($diaSemana){
    case 1:
      echo "Hoje é Domingo";
      break;
    case 2:
      echo "Hoje é Segunda";
      break;
    case 3:
      echo "Hoje é Terça";
      break;
    case 4:
      echo "Hoje é Quarta";
      break;
    case 5:
      echo "Hoje é Quinta";
      break;
    case 6:
      echo "Hoje é Sexta";
      break;
    case 7:
      echo "Hoje é Sábado";
      break;
    default :
      echo "Hoje pode ser qualquer dia";
  }

  include("rodape.php");