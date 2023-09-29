<?php

require_once("./bancos.php");
//unset($bancos); para testar se a mensagem é mostrada caso não exista bancos.

function exibeMensagem($mensagem) {
  echo $mensagem . PHP_EOL;
}

function listaBancos($listaBancos) {
  if(isset($listaBancos)) {
    foreach($listaBancos as $agencia => $banco) {
      exibeMensagem("$agencia - {$banco["nome"]}, {$banco["cidade"]}, {$banco["estado"]}");
    }
  } else {
    exibeMensagem("Desculpe, não foi possível encontrar nenhum banco cadastrado.");
  }
}

function adicionaBanco(&$listaBancos, $bancoAdicionar) {
  $listaBancos[$bancoAdicionar["agencia"]] = [
    "nome" => $bancoAdicionar["nome"],
    "cidade" => $bancoAdicionar["cidade"],
    "estado" => $bancoAdicionar["estado"]
  ];
}

function removeBanco(&$listaBancos, $agBancoRemover) {
  unset($listaBancos[$agBancoRemover]);
}

function editaBanco(&$listaBancos, $agBancoEditar, $bancoEditado) {
  $listaBancos[$agBancoEditar] = [
    "nome" => $bancoEditado["nome"],
    "cidade" => $bancoEditado["cidade"],
    "estado" => $bancoEditado["estado"]
  ];
}

function getQuantidadeTotalBancos($listaBancos) {
  if(!isset($listaBancos)) {
    return "Nenhum banco encontrado";
  }
  return count($listaBancos);
}

adicionaBanco($bancos, [
  "agencia" => "8888",
  "nome" => "Banco 5",
  "cidade" => "Cachoeirinha",
  "estado" => "Rio Grande do sul"
]);

editaBanco($bancos, 7777, [
  "nome" => "Banco 4",
  "cidade" => "Gravataí",
  "estado" => "Rio Grande do Sul"
]);

removeBanco($bancos, 4444);

$totalBancos = getQuantidadeTotalBancos($bancos);
exibeMensagem("A quantidade de bancos é: $totalBancos");

listaBancos($bancos);
