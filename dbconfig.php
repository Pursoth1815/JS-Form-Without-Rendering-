<?php

define (DB_USER, "sa");
define (DB_PASSWORD, "");
define (DB_DATABASE, "nic");
define (DB_HOST, "localhost:8889");

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

?>