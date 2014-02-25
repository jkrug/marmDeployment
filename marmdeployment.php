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
    $baseDir = dirname(__FILE__) . '/../';
    include_once $baseDir.'marmdeployment.conf.php';

    // Check environment
    $handle = fopen($baseDir.'environment.txt','r');
    
    if($handle == false)
    {
        die("Environment not specified!\n");
    }
    
    $env = trim(fgets($handle));
    fclose($handle);
    
    // Check if environment is configured
    if(!is_array($config[$env]))
    {
        die("Environment not configured!\n");
    }
    
    $conf = $config[$env];
    
    // Run hook before deployment
    if(function_exists('before_run_hook'))
    {
        before_run_hook();
    }

    //Go to project root and deploy there
    chdir($baseDir);
    system("git fetch origin -a");
    system("git checkout ".$conf['project']['ref']);
    system("git merge --ff-only origin/".$conf['project']['ref']);
    
    //Now deploy the
    foreach ($conf['modules'] as $name=>$module)
    {
        echo "\nWork on $name\n";
        //Check if dir exists
        if(!chdir($baseDir.$module['dir']))
        {
			echo("Creating directory '" . $baseDir.$module['dir'] . "' for the module " . $name . " \n");
            mkdir($baseDir.$module['dir'], 0755, true);
            chdir($baseDir.$module['dir']);
            system("git init");
            system("git remote add origin ".$module['remote']);
            system("git fetch origin -a");
            system("git checkout ".$module['ref']);
        }
        
        // pull the specified ref
        system("git fetch origin -a");
        system("git checkout ".$module['ref']);
        system("git merge --ff-only origin/".$module['ref']);
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
