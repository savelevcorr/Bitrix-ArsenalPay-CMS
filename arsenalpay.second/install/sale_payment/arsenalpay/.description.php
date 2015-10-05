<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?><?
include(GetLangFileName(dirname(__FILE__)."/", "/arsenal.php"));

$psTitle = GetMessage("AM_DTITLE");
$psDescription = GetMessage("AM_TITLE_DESC");

$arPSCorrespondence = array(
    "TELEPHONE" => array(
            "NAME" => GetMessage("AM_TELEPHONE"),
            "DESCR" => "",
            "VALUE" => "",
            "TYPE" => ""
        ),
);
?>