<?php
$error_level = (int)get_option('error-reporting-error_level', E_ALL ^ E_DEPRECATED);
error_reporting($error_level);