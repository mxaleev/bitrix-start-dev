<?php

use Bitrix\Main\LoaderException;
use Bx\Model\Services\FileService;
use Xaleev\Backoffice\DI;
use Xaleev\Backoffice\Interfaces\ServiceList;
use function DI\autowire;
use function DI\create;

try {

    $di = DI::getInstance();

//    $di->set(ServiceList::FILE, create(FileService::class));
//  $di->set(CoreServiceList::USER, autowire(BUserService::class));
//
//  $di->set(ServiceList::DEPARTMENT, autowire(DepartmentsSectionService::class));

} catch (LoaderException $e) {
    echo $e->getMessage();
}
