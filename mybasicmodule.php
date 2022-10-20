<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://devdocs.prestashop.com/ for more information.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 */


#sprawdzenie czy presta jest poprawnie zainstalowana - sprawdzewnie istnienia stałej _PS_VERSION_
if ( !defined('_PS_VERSION_') ){
    exit;
}

# main class

class MyBasicModule extends Module {

    public function __construct() {
        $this->name = 'mybasicmodule';
        $this->tab = 'front_office_features';
        $this->version = '1.0';
        $this->author = 'Nagash';
        $this->need_instance = 0;
        $this->ps_version_compliancy = [
            'min' => '1.6',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('My very first module');
        $this->description = $this->l('This is a great testing module');
        $this->confirmUninstall = $this->l('Are ya sure? For real?');
    }

    public function install() : Bool {
        return  parent::install() 
                && $this->registerHook('registerGDPRConsent')
                && $this->dbInstall();
    }

    public function uninstall() : Bool {
        return  parent::uninstall();
    }

    # sql install
    public function dbInstall():bool{
        # zapytanie do bazy które tworzy tablelę
        # przykład dla rozszerzenia instalatora
        return true;
    }

}
