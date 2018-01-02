<?php
/**
 * Metadata version
 */
$sMetadataVersion = '2.0';

$aModule = array(
	'id' => 'swingredients',
	'title' => '<img src='.oxRegistry::getConfig()->getShopUrl().'modules/swinde/swingredients/out/img/favicon-16x16.png alt="Internetservice Steffen Winde" title="Internetservice Steffen Winde Projects"> SW-Inserv - neues Textfeld Inhaltsstoffe',
	'version' => '1.0',
	'author' => 'steffen winde',
    'extend'      => array(
        \OxidEsales\Eshop\Application\Controller\Admin\ArticleMain::class =>  \Swinde\SwIngredients\Controller\Admin\Ingredients::class,
    ),
   /* 'files'       => array(
        'ingredients_set' =>  'sw_inserv/sw_naehrwerte/core/ingredients_set.php'
    ),*/
    /*'events'       => array(
        'onActivate'   => 'sw_naehrwerte_set::onActivate',
        'onDeactivate' => 'sw_naehrwerte_set::onDeactivate'
    ),*/
    'blocks'=>   array(
        array(
            'template' => 'article_main.tpl',
            'block'=>'admin_article_main_editor',
            'file'=>'views/admin/blocks/ingredients.tpl'
        )

    ),
);