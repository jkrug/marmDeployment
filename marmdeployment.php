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
    
    $env = trim(fgets($handle));
    fclose($handle);
    
    // Check if environment is configured
    if(!is_array($config[$env]))
    {
        die('Environment not configured');
    }
    
    $conf = $config[$env];
    
    // Run hook before deployment
    if(function_exists('before_run_hook'))
    {
        before_run_hook();
    }

    //Go to project root and deploy there
    chdir($baseDir);
    system("git pull origin " . $conf['project']['ref']);
    
    //Now deploy the
    foreach ($conf['modules'] as $name=>$module)
    {
        echo "\nWork on $name\n";
        //Check if dir exists
        if(!is_dir($baseDir.$module['dir']))
        {
            mkdir($baseDir.$module['dir'], 0755, true);
            chdir($baseDir.$module['dir']);
            system("git init");
            system("git remote add origin ".$module['remote']);
            system("git pull origin ".$module['ref']);
        }
        else
        {
            chdir($baseDir.$module['dir']);
        }
        
        // pull the specified ref
        system("git fetch origin -a");
        system("git checkout ".$module['ref']);
        system("git merge origin/".$module['ref']);
    }
    chdir($baseDir . 'marmdeployment/');
    
    if(function_exists('after_run_hook'))
    {
        after_run_hook();
    }
}
else
{
    echo "No execution from web.";
}
