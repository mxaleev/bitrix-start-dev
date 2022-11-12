<?php

//// Example
//use Bitrix\Main\Diag\Debug;
//use Bitrix\Main\EventManager;
//use Bitrix\Main\Loader;
//use Bitrix\Main\Mail\Event;

//$eventManager = EventManager::getInstance();
//
//$eventManager->addEventHandlerCompatible("main", "OnAfterUserRegister", "OnAfterUserRegisterHandler");
//
//function OnAfterUserRegisterHandler(&$arFields)
//{
//  Event::send(array(
//    "EVENT_NAME" => "USER_NOTIFICATION_REGISTRATION",
//    "MESSAGE_ID" => 10,
//    "LID" => "s1",
//    "C_FIELDS" => array(
//      "SERVER_NAME" => SITE_SERVER_NAME,
//      "SITE_NAME" => "SITE_NAME",
//      "EMAIL" => $arFields['EMAIL']
//    ),
//  ));
//}
