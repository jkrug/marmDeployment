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
    $baseDir = (__DIR__)."/../";
    include_once $baseDir.'marmdeployment.conf.php';
    
    // Check environment
    $handle = fopen($baseDir.'environment.txt','r');
    
    if($handle == false)
    {
        die('Environemt not specified!');
    }
    
    $env = fgets($handle);
    fclose($handle);
    
    // Check if environment is configured
    if(!is_array($conf[$env]))
    {
        die('Environment not configured');
    }
    
    //Go to project root and deploy there
    chdir($baseDir);
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
    echo "No execution from web.";
}