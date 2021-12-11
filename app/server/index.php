<?php

require 'vendor/autoload.php';
require 'database/config.php';
require 'vendor/framework/Helpers.php';

use Framework\Application;

$app = (new Application)->run();
