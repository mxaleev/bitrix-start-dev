<?php

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/vendor/autoload.php'))
  require_once $_SERVER['DOCUMENT_ROOT'] . '/local/vendor/autoload.php';

//// Example
//Автозагрузка классов
//Loader::registerAutoLoadClasses(null, [
//    'lib\UserType\CUserType' => APP_CLASS_FOLDER . 'UserType/CUserType.php',
//]);
