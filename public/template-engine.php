<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Application\Presentation\Templates\MainTemplate\MainTemplate;

MainTemplate::from('home', ["greeting" => "Hello World!"])->print();
