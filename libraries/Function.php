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
        return $url  = "http://localhost/yourtest/front-end/"; 
    }

    if ( ! function_exists('redirect'))
    {
        function redirect($url = "")
        {
            header("location: ".base_url().$url);exit();
        }
    }
?>