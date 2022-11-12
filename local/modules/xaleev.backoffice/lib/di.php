<?php

namespace Xaleev\Backoffice;

use DI\Container;

class DI
{
    /** @var ?Container */
    private static ?Container $instance = null;

    /**
     * @return Container
     */
    public static function getInstance(): Container
    {
        if (!self::$instance instanceof Container) {
            self::$instance = new Container();
        }
        return self::$instance;
    }
}
