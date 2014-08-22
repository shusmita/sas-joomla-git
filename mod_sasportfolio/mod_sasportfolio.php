<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
// Include the syndicate functions only once
require_once( dirname(__FILE__).'/helper.php' );
$doc = &Jfactory::getDocument();
$doc->addStyleSheet(JURI::root().'modules/mod_sasportfolio/css/mod_sasportfolio.css');
$doc->addScript(JURI::root().'modules/mod_sasportfolio/js/jquery.mixitup.js');
$doc->addScript(JURI::root().'modules/mod_sasportfolio/js/mod_sasportfolio.js');

$cates = modSasPortfolioHelper::getCategory( $params );
$tags = modSasPortfolioHelper::getTag( $params );
$items = modSasPortfolioHelper::getItem( $params );
$itemtags = modSasPortfolioHelper::getItemTags( $params );
$itemcates = modSasPortfolioHelper::getItemCates( $params );
require( JModuleHelper::getLayoutPath( 'mod_sasportfolio' ) );
?>