<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;

// Sentry
//Raven_Autoloader::register();
//$client = new Raven_Client('https://token:token@user/project');
//$error_handler = new Raven_ErrorHandler($client);
//$error_handler->registerExceptionHandler();
//$error_handler->registerErrorHandler();
//$error_handler->registerShutdownFunction();

// Константы
if (file_exists(dirname(__FILE__) . '/constants.php'))
  require_once dirname(__FILE__) . '/constants.php';

// Автозагрузка классов
if (file_exists(dirname(__FILE__) . '/autoload.php'))
  require_once dirname(__FILE__) . '/autoload.php';

// Обработка событий
if (file_exists(dirname(__FILE__) . '/events.php'))
  require_once dirname(__FILE__) . '/events.php';
