marmDeployment
==============
This script solves some of our deployment problems.
As we use Git as version control system it is totally
based on that. 

How it works
------------
For several reasons we decide NOT to use Submodules.
So what we do is splitting our projects in

1.    main repository
2.    small modules

The main repository stors all project specific parts and ignores the smaller modules.
The small modules are typically used in other projects too or could be used 
in the future or are developed separately.

Setup
-----
*    copy that module to your projectroot
*    add a environment.txt to your project
*    add a marmdeployment.conf.php to your project
     you will find an example in the module.
	 
Requirements
------------
*    Make sure you use Git!
*    you need shell access
*    your server must allow php system() commands!