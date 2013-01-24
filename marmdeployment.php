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
    if(!is_array($config[$env]))
    {
        die('Environment not configured');
    }
    
    $conf = $config[$env];
    
    //Go to project root and deploy there
    chdir($baseDir);
    system("git pull origin " . $conf['project']['ref']);
    
    //Now deploy the
    foreach ($conf['modules'] as $module)
    {
        //Check if dir exists
        if(!is_dir($baseDir.$conf['dir']))
        {
            mkdir($baseDir.$conf['dir'], 0755, true);
            chdir($baseDir.$module['dir']);
            system("git init");
            system("git pull origin ".$module['ref']);
        }
        else
        {
            chdir($baseDir.$module['dir']);
        }
        // pull the specified ref
        system("git pull origin ".$module['ref']);
    }
    chdir($baseDir . 'marmdeployment/');
}
else
{
    echo "No execution from web.";
}