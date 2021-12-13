<?php

require 'vendor/framework/Helpers.php';
require 'vendor/autoload.php';
require 'database/config.php';

use Framework\Application;

$app = (new Application)->run();
