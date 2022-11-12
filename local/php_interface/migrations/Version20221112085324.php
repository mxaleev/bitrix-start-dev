<?php

namespace Sprint\Migration;

use Bitrix\Main\Loader;

class Version20221112085324 extends Version
{
    protected $description = "Установка модуля xaleev.backoffice";

    protected $moduleVersion = "4.1.2";

    public function up()
    {
        if (!Loader::includeModule('xaleev.backoffice')) {
            \CModule::CreateModuleObject('xaleev.backoffice')->DoInstall();
        }
    }

    public function down()
    {
        if (Loader::includeModule('xaleev.backoffice')) {
            \CModule::CreateModuleObject('xaleev.backoffice')->DoUninstall();
        }
    }
}
