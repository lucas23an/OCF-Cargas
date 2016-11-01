<?php
function requisicaoApi($params, $endpoint){
    $url = "http://api.directcallsoft.com/{$endpoint}";
    $data = http_build_query($params);
    $ch =   curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $return = curl_exec($ch);
    curl_close($ch);
    // Converte os dados de JSON para ARRAY
    $dados = json_decode($return, true);
    return $dados;
}
 
// CLIENT_ID que é fornecido pela DirectCall (Seu e-mail)
$client_id = "lucas@rmsolutions.com.br";
// CLIENT_SECRET que é fornecido pela DirectCall (Código recebido por SMS)
$client_secret = "7172831";
// Faz a requisicao do access_token
$req = requisicaoApi(array('client_id'=>$client_id, 'client_secret'=>$client_secret), "request_token");
var_dump($req);
//Seta uma variavel com o access_token
$access_token = $req['access_token'];
// Enviadas via POST do nosso contato.html
$mensagem = "Pet Shop do Lucas - Seu animalzinho já está pronto, venha busca-lo.";
// Monta a mensagem
$SMS = "{$mensagem}";
// Array com os parametros para o envio
$data = array(
    'origem'=>"6292264519", // Seu numero que Ã© origem
    'destino'=>"6282854834", // E o numero de destino
    'tipo'=>"texto",
    'access_token'=>$access_token,
    'texto'=>$SMS
);
// realiza o envio
$req_sms = requisicaoApi($data, "sms/send");
var_dump($req_sms);
// FIM