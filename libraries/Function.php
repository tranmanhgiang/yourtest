<?php
    // post Input
    function postInput($string){
        return isset($_POST[$string]) ? $_POST[$string] : ''; 
    }
    // get Input
    function getInput($string){
        return isset($_GET[$string]) ? $_GET[$string] : ''; 
    }
?>