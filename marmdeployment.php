<?php

/**
 * This script deploys a whole project
 * 
 * It was invented by the marmalade GmbH team
 * 
 * @author Jens Richter<richter@marmalade.de>
 * @author Joscha Krug<krug@marmalade.de>
 */

if (php_sapi_name() == "cli")
{
    $baseDir = (__DIR__)."/";
    include_once $baseDir.'marmdeployment.conf.php';
    system("git pull origin master");
    foreach ($modules as $module)
    {
        chdir($baseDir.$module['dir']);
        system("git pull origin ".$module['ref']);
    }
    chdir($baseDir);
}
else
{
    echo "no execution from web";
}