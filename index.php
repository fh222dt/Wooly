<?php

//
// PHASE: BOOTSTRAP
//
define('WOOLY_INSTALL_PATH', dirname(__FILE__));
define('WOOLY_SITE_PATH', WOOLY_INSTALL_PATH . '/site');

require(WOOLY_INSTALL_PATH.'/src/bootstrap.php');

$wo = CWooly::Instance();

//
// PHASE: FRONTCONTROLLER ROUTE
//
$wo->FrontControllerRoute();

//
// PHASE: THEME ENGINE RENDER
//
$wo->ThemeEngineRender();