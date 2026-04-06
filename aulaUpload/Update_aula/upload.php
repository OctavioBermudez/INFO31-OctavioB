<?php

$arquivo = $_FILES["arquivo"];

$nome=$arquivo["name"];
$tamanho=$arquivo["size"];
$tmp_name = $arquivo["tmp_name"];

$tamanhoMax= 2*1024*2024;

if($arquivo["error"]){
    echo "Erro ao enviar arquivo";
    exit;
}

if($tamanho > $tamanhoMax){
    echo "Arquivo muito grande. Tamanho max é de 2MB";
    exit;
}

$nomeUnico= time(). "-".$nome;

$destino = "upload/". $arquivo["name"];

if(move_uploaded_file($tmp_name, $destino)){
    $texto= "Arquivo" . $nomeUnico. "- tamanho" . $tamanho . "bytes\n";

    file_put_contents("registro.txt",$texto, FILE_APPEND);

    echo "Nome original".$nome."<br>";
    echo "Nome salvo".$nomeUnico."<br>";
    echo "Arquivo enviado com sucesso!<br>";

    echo"<a href='index.php'>Voltar</a>";
}
else{
    echo "Erro ao enviar arquivo";

}
?>