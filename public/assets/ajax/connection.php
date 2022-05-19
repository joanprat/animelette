<?php
function connect () {
    return $db = new mysqli('localhost', 'root', '', 'animelette');
}

?>