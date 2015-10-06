<?php
//Main module file, install, uninstall.
IncludeModuleLangFile(__FILE__);

class arsenalmedia_arsenalpay extends CModule
{
	var $MODULE_ID = "arsenalmedia.arsenalpay";
	var $PARTNER_NAME = "Arsenal media"; 
	var $PARTNER_URI = "http://arsenalmedia.ru";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $errors;
	
	

	function arsenalmedia_arsenalpay()
	{
		$arModuleVersion = array();

		$path = str_replace("\\", "/", __FILE__);
		$path = substr($path, 0, strlen($path) - strlen("/index.php"));
		include($path."/version.php");

		if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
		{
		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		}
		$this->PARTNER_NAME = "Arsenal media"; 
		$this->PARTNER_URI = "http://arsenalmedia.ru";

		$this->MODULE_NAME = GetMessage('AM_MODULE_NAME');;
		$this->MODULE_DESCRIPTION = GetMessage('AM_MODULE_DESCRIPTION');
	}

	function InstallFiles($arParams = array())
	{
		
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/arsenalmedia.arsenalpay/install/components", $_SERVER["DOCUMENT_ROOT"]."/bitrix/components", true, true);
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/arsenalmedia.arsenalpay/install/sale_payment", $_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/include/sale_payment", true, true);
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/arsenalmedia.arsenalpay/install/files", $_SERVER["DOCUMENT_ROOT"], true, true);
		return true;
	}

	function UnInstallFiles()
	{
		DeleteDirFilesEx("/bitrix/components/arsenalmedia");
		DeleteDirFilesEx("/callback");
		DeleteDirFilesEx("/bitrix/php_interface/include/sale_payment/arsenalmedia");
		return true;
	}

	function DoInstall()
	{
		global $DOCUMENT_ROOT, $APPLICATION;
		$step = IntVal($_REQUEST["step"]);	
		if ($step < 2)
		{
			$APPLICATION->IncludeAdminFile(GetMessage('AM_INSTALL2'), $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/arsenalmedia.arsenalpay/install/step1.php");
		}
		elseif($step>=2)
		{
			$this->InstallFiles();
			RegisterModule("arsenalmedia.arsenalpay");
			$APPLICATION->IncludeAdminFile(GetMessage('AM_INSTALL2'), $DOCUMENT_ROOT."/bitrix/modules/arsenalmedia.arsenalpay/install/step2.php");
		}
	}

	function DoUninstall()
	{
		global $DOCUMENT_ROOT, $APPLICATION;
		$this->UnInstallFiles();
		UnRegisterModule("arsenalmedia.arsenalpay");
		$APPLICATION->IncludeAdminFile(GetMessage('AM_DELETE2'), $DOCUMENT_ROOT."/bitrix/modules/arsenalmedia.arsenalpay/install/unstep.php");
		LocalRedirect("module_admin.php?lang=".LANGUAGE_ID);
	}

}
?>