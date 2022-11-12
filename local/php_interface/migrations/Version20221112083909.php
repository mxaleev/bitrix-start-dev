<?php

namespace Sprint\Migration;

use Bitrix\Main\Loader;

class Version20221112083909 extends Version
{
    protected $description = "Установка модулей-помощников для разработки (bx.model, bx.router и bx.jwt)";

    protected $moduleVersion = "4.1.2";

    public function up()
    {
        if (!Loader::includeModule('bx.model')) {
            \CModule::CreateModuleObject('bx.model')->DoInstall();
        }

        if (!Loader::includeModule('bx.router')) {
            \CModule::CreateModuleObject('bx.router')->DoInstall();
        }

        if (!Loader::includeModule('bx.jwt')) {
            \CModule::CreateModuleObject('bx.jwt')->DoInstall();
        }
    }

    public function down()
    {
        if (Loader::includeModule('bx.model')) {
            \CModule::CreateModuleObject('bx.model')->DoUninstall();
        }

        if (Loader::includeModule('bx.router')) {
            \CModule::CreateModuleObject('bx.router')->DoUninstall();
        }

        if (Loader::includeModule('bx.jwt')) {
            \CModule::CreateModuleObject('bx.jwt')->DoUninstall();
        }
    }
}
