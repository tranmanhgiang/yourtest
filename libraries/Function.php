<?php
    // post Input
    function postInput($string){
        return isset($_POST[$string]) ? $_POST[$string] : ''; 
    }
    // get Input
    function getInput($string){
        return isset($_GET[$string]) ? $_GET[$string] : ''; 
    }

    function base_url()
    {
        // return $url  = "http://codedoan.com/"; 
        return $url  = "http://localhost/yourtest/"; 
    }
    function modules($url)
    {
        return base_url() . "admin/modules/" .$url ;
    }
?>