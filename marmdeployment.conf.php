<?php
/**
 * Configuration example
 * 
 * @author Joscha Krug<krug@marmalade.de>
 */

// dir      = path to module relative to marmdeployment.config.php
// status   = a position in git. Could be a hash, a branch or a tag
// remote   = the remote of the git repo. Will be used to initialize the repo if it dousnt exist yet.

$config = array(
    'dev' => array(
        'modules' => array(
            'solr' => array(
                'dir'     => 'modules/marm/solr',
                'status'  => 'master',
                'remote'  => 'ssh://git@paula.marmalade.de/marmsolr.git'
            ),
            'libreka' => array(
                'dir'     => 'modules/marm/libreka',
                'status'  => 'master',
                'remote'  => 'ssh://git@paula.marmalade.de/marmlibreka.git'
            ),
            'picturesubdir' => array(
                'dir'     => 'modules/marm/picturesubdirs',
                'status'  => 'master',
                'remote'  => 'ssh://git@paula.marmalade.de/marmpicturesubdirs.git'
            ),
        ),
        'project' => array(
            'status'  => 'master',
            'remote'  => 'ssh://git@paula.marmalade.de/project.git'
        ),
    ),
    'staging' =>array(
        'modules' => array(
            'solr' => array(
                'dir'     => 'modules/marm/solr',
                'status'  => 'test',
                'remote'  => 'ssh://git@paula.marmalade.de/marmsolr.git'
            ),
            'libreka' => array(
                'dir'     => 'modules/marm/libreka',
                'status'  => 'test',
                'remote'  => 'ssh://git@paula.marmalade.de/marmlibreka.git'
            ),
            'picturesubdir' => array(
                'dir'     => 'modules/marm/picturesubdirs',
                'status'  => 'test',
                'remote'  => 'ssh://git@paula.marmalade.de/marmpicturesubdirs.git'
            ),
        ),
        'project' => array(
            'status'  => 'test',
            'remote'  => 'ssh://git@paula.marmalade.de/project.git'
        ),
    ),
    'live' =>array(
        'modules' => array(
            'solr' => array(
                'dir'     => 'modules/marm/solr',
                'status'  => 'stable',
                'remote'  => 'ssh://git@paula.marmalade.de/marmsolr.git'
            ),
            'libreka' => array(
                'dir'     => 'modules/marm/libreka',
                'status'  => 'stable',
                'remote'  => 'ssh://git@paula.marmalade.de/marmlibreka.git'
            ),
            'picturesubdir' => array(
                'dir'     => 'modules/marm/picturesubdirs',
                'status'  => 'stable',
                'remote'  => 'ssh://git@paula.marmalade.de/marmpicturesubdirs.git'
            ),
        ),
        'project' => array(
            'status'  => 'stable',
            'remote'  => 'ssh://git@paula.marmalade.de/project.git'
        ),
    )
);