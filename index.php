<?php 

    require_once ("sistema/configuração.php");
    include_once("helpers.php");
    include("sistema/Nucleo/Mensagem.php");
    
    //$msg = new Mensagem();
    
    //echo $msg->sucesso("Sei lá o que ta rolando")->renderizar();
    
    echo '<hr>';
    
    $helper = new Helpers();
    echo $helper->saudacao();
    echo '<hr>';
    $helper = new Helpers();
    echo $helper->data_atual();


   ?>