<?php

//web routes

function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "<pre>";
}

function splitURL()
{
    //If the 'url' parameter is not present, it defaults to 'home'.
    $URL = $_GET['url'] ?? 'home';
    // /The URL is then split into an array using the explode() 
    $URL = explode("/", $URL);
    return $URL;
}


function loadController()
{
    //loadController() function first calls the splitURL() function to retrieve the URL array. 
    $URL = splitURL();
    //constructs a filename based on the first element of the URL array.
    //ucfirst (uppercase first character) of the URL element and prepending "../app/controllers/".
    $filename = "../app/controllers/".ucfirst($URL[0]).".php";

    //If the file exists at the specified filename, it is required using the require statement, which includes and evaluates the specified file
    if(file_exists($filename)) 
    {
        //This allows the controller file to be executed.
        require $filename;
    }
    else
    $filename = "../app/controllers/_404.php";
    require $filename;
}

loadController();
