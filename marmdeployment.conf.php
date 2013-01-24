<?php
/**
 * Configuration example
 * 
 * @author Joscha Krug<krug@marmalade.de>
 */

// dir      = path to module relative to marmdeployment.config.php
// ref      = a position in git. Could be a hash, a branch or a tag
// remote   = the remote of the git repo. Will be used to initialize the repo if it dousnt exist yet.

$config = array(
    'dev' => array(
        'modules' => array(
            'solr' => array(
                'dir'     => 'modules/marm/solr',
                'ref'  => 'master',
                'remote'  => 'ssh://git@paula.marmalade.de/marmsolr.git'
            ),
            'libreka' => array(
                'dir'     => 'modules/marm/libreka',
                'ref'  => 'master',
                'remote'  => 'ssh://git@paula.marmalade.de/marmlibreka.git'
            ),
            'picturesubdir' => array(
                'dir'     => 'modules/marm/picturesubdirs',
                'ref'  => 'master',
                'remote'  => 'ssh://git@paula.marmalade.de/marmpicturesubdirs.git'
            ),
        ),
        'project' => array(
            'ref'  => 'master',
            'remote'  => 'ssh://git@paula.marmalade.de/project.git'
        ),
    ),
    'staging' =>array(
        'modules' => array(
            'solr' => array(
                'dir'     => 'modules/marm/solr',
                'ref'  => 'test',
                'remote'  => 'ssh://git@paula.marmalade.de/marmsolr.git'
            ),
            'libreka' => array(
                'dir'     => 'modules/marm/libreka',
                'ref'  => 'test',
                'remote'  => 'ssh://git@paula.marmalade.de/marmlibreka.git'
            ),
            'picturesubdir' => array(
                'dir'     => 'modules/marm/picturesubdirs',
                'ref'  => 'test',
                'remote'  => 'ssh://git@paula.marmalade.de/marmpicturesubdirs.git'
            ),
        ),
        'project' => array(
            'ref'  => 'test',
            'remote'  => 'ssh://git@paula.marmalade.de/project.git'
        ),
    ),
    'live' =>array(
        'modules' => array(
            'solr' => array(
                'dir'     => 'modules/marm/solr',
                'ref'  => 'stable',
                'remote'  => 'ssh://git@paula.marmalade.de/marmsolr.git'
            ),
            'libreka' => array(
                'dir'     => 'modules/marm/libreka',
                'ref'  => 'stable',
                'remote'  => 'ssh://git@paula.marmalade.de/marmlibreka.git'
            ),
            'picturesubdir' => array(
                'dir'     => 'modules/marm/picturesubdirs',
                'ref'  => 'stable',
                'remote'  => 'ssh://git@paula.marmalade.de/marmpicturesubdirs.git'
            ),
        ),
        'project' => array(
            'ref'  => 'stable',
            'remote'  => 'ssh://git@paula.marmalade.de/project.git'
        ),
    )
);