<?php
require_once("vendor/autoload.php");
define('THANK_YOU_MESSAGE', '<b>Thank you for contacting Us</b><br>');

define('NAME_MAX_LENGTH', 100);
define('MESSAGE_MAX_LENGTH', 255); 

define('NAME_EMPTY_ERROR', 'Please enter your name <br>');
define('NAME_LENGTH_ERROR', 'Name should be less than ' .NAME_MAX_LENGTH. ' characters <br>');
define('EMAIL_EMPTY_ERROR', 'Please enter your email <br>');
define('EMAIL_VALID_ERROR', 'Please enter a valid email <br>');
define('MESSAGE_EMPTY_ERROR', 'Please enter your message <br>');
define('MESSAGE_LENGTH_ERROR', 'Message should be less than '.MESSAGE_MAX_LENGTH. ' characters <br>');

define('LOG_FILE', 'logs.txt');
define('VISIT_DATE_FORMAT', date("F j Y g:i a"));
define('FUNCTIONS_FILE', 'functions.php');
define('DEFAULT_VIEW', 'add');



?>