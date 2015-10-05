<?php
//Main module file, install, uninstall.
IncludeModuleLangFile(__FILE__);

class arsenalpay_second extends CModule
{
	var $MODULE_ID = "arsenalpay.second";
	var $PARTNER_NAME = "Arsenal Media"; 
	var $PARTNER_URI = "https://arsenalpay.ru";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $errors;
	
	

	function arsenalpay_second()
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
		$this->PARTNER_NAME = "Arsenal Pay"; 
		$this->PARTNER_URI = "https://arsenalpay.ru";

		$this->MODULE_NAME = GetMessage('AM_MODULE_NAME');;
		$this->MODULE_DESCRIPTION = GetMessage('AM_MODULE_DESCRIPTION');
	}

	function InstallFiles($arParams = array())
	{
		
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/arsenalpay.second/install/components", $_SERVER["DOCUMENT_ROOT"]."/bitrix/components", true, true);
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/arsenalpay.second/install/sale_payment", $_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/include/sale_payment", true, true);
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/arsenalpay.second/install/files", $_SERVER["DOCUMENT_ROOT"], true, true);
		return true;
	}

	function UnInstallFiles()
	{
		DeleteDirFilesEx("/bitrix/components/arsenalpay");
		DeleteDirFilesEx("/callback");
		DeleteDirFilesEx("/bitrix/php_interface/include/sale_payment/arsenalpay");
		return true;
	}

	function DoInstall()
	{
		global $DOCUMENT_ROOT, $APPLICATION;
		$step = IntVal($_REQUEST["step"]);	
		if ($step < 2)
		{
			$APPLICATION->IncludeAdminFile(GetMessage('AM_INSTALL2'), $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/arsenalpay.second/install/step1.php");
		}
		elseif($step>=2)
		{
			$this->InstallFiles();
			RegisterModule("arsenalpay.second");
			$APPLICATION->IncludeAdminFile(GetMessage('AM_INSTALL2'), $DOCUMENT_ROOT."/bitrix/modules/arsenalpay.second/install/step2.php");
		}
	}

	function DoUninstall()
	{
		global $DOCUMENT_ROOT, $APPLICATION;
		$this->UnInstallFiles();
		UnRegisterModule("arsenalpay.second");
		$APPLICATION->IncludeAdminFile(GetMessage('AM_DELETE2'), $DOCUMENT_ROOT."/bitrix/modules/arsenalpay.second/install/unstep.php");
		LocalRedirect("module_admin.php?lang=".LANGUAGE_ID);
	}

}
?>