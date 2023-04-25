<?php

$xml = simplexml_load_string(file_get_contents('./data.xml'));
$json = json_encode($xml);
var_dump($json);
