<?php
//die and dump
function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}
//clean user input
function test_input($data = "")
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
//create an alert message
function alert($message = "") {
    echo ("<script>alert('" . addslashes($message) . "');</script>");
}
?>