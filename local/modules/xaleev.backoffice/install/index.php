<?php

use Bitrix\Main\EventManager;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;

Loc::loadMessages(__FILE__);

class xaleev_backoffice extends CModule
{
    private string $moduleDirAdmin = __DIR__ . '/admin';

    public function __construct()
    {
        if(file_exists(__DIR__."/version.php")) {

            $arModuleVersion = [];

            include_once(__DIR__."/version.php");

            $this->MODULE_ID            = str_replace("_", ".", get_class($this));
            $this->MODULE_VERSION       = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE  = $arModuleVersion["VERSION_DATE"];
            $this->MODULE_NAME          = Loc::getMessage("XALEEV_BACKOFFICE_NAME");
            $this->MODULE_DESCRIPTION   = Loc::getMessage("XALEEV_BACKOFFICE_DESCRIPTION");
            $this->PARTNER_NAME         = Loc::getMessage("XALEEV_BACKOFFICE_PARTNER_NAME");
            $this->PARTNER_URI          = Loc::getMessage("XALEEV_BACKOFFICE_PARTNER_URI");

        }
    }


    /**
     * @param string $message
     * @return void
     */
    public function setError(string $message): void
    {
        global $APPLICATION;
        $APPLICATION->ThrowException($message);
    }


    /**
     * @return bool
     */
    public function installRequiredModules(): bool
    {
        $arModulesRequired = [
            [
                'NAME' => 'sprint.migration',
                'PATH' => 'modules/sprint.migration/install/index.php'
            ],
            [
                'NAME' => 'bx.model',
                'PATH' => 'modules/bx.model/install/index.php'
            ]
        ];

        foreach ($arModulesRequired as $module) {
            if (!getLocalPath($module['PATH'])) {
                $this->setError(Loc::getMessage("XALEEV_BACKOFFICE_INSTALL_REQUIRED_MODULE_DONT_FIND").' '.$module['NAME']);
                return false;
            }

            if (!ModuleManager::isModuleInstalled($module['NAME'])) {
                $this->setError(Loc::getMessage("XALEEV_BACKOFFICE_INSTALL_REQUIRED_MODULE_DONT_INSTALL").' '.$module['NAME']);
                return false;
            }
        }

        return true;
    }


    /**
     * @return bool
     */
    public function DoInstall(): bool
    {
        global $APPLICATION;

        if(CheckVersion(ModuleManager::getVersion("main"), "22.00.00")) {

            if (!$this->installRequiredModules()) return false;

            ModuleManager::registerModule($this->MODULE_ID);

            $this->InstallFiles();
            $this->InstallDB();
            $this->InstallEvents();

        } else {
            $APPLICATION->ThrowException(Loc::getMessage("XALEEV_BACKOFFICE_INSTALL_ERROR_VERSION"));
        }

        return true;
    }


    /**
     * @return bool
     */
    public function DoUninstall(): bool
    {
        global $APPLICATION;

        $this->UnInstallFiles();
        $this->UnInstallDB();
        $this->UnInstallEvents();

        ModuleManager::unRegisterModule($this->MODULE_ID);

        return true;
    }


    /**
     * @return bool
     */
    public function InstallDB(): bool
    {
//        $connection = Application::getConnection();
//
//        if(!$connection->isTableExists(FavoritesProductsUserTable::getTableName()))
//            FavoritesProductsUserTable::getEntity()->createDbTable();

        return true;
    }


    /**
     * @return bool
     */
    public function UnInstallDB(): bool
    {
//        $connection = Application::getConnection();
//
//        if($connection->isTableExists(FavoritesProductsUserTable::getTableName()))
//            $connection->dropTable(FavoritesProductsUserTable::getTableName());

        return true;
    }


    /**
     * @return bool
     */
    public function InstallEvents(): bool
    {
        return true;
    }


    /**
     * @return bool
     */
    public function UnInstallEvents(): bool
    {
        return true;
    }


    /**
     * @return bool
     */
    public function InstallFiles(): bool
    {
//        $moduleDirAdmin = $this->moduleDirAdmin;
//
//        if (file_exists($moduleDirAdmin)) {
//            CopyDirFiles($moduleDirAdmin, $_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin");
//        }

        return true;
    }


    /**
     * @return bool
     */
    public function UnInstallFiles(): bool
    {
//        $moduleDirAdmin = $this->moduleDirAdmin;
//
//        if (file_exists($moduleDirAdmin)) {
//            DeleteDirFiles($moduleDirAdmin, $_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin");
//        }

        return true;
    }

}
