<?
//options page, display in admin panel.
IncludeModuleLangFile(__FILE__);
$module_id = "arsenalpay.second";
$WEBS_RIGHT = $APPLICATION->GetGroupRight($module_id);

if(!CModule::IncludeModule($module_id))
{
    ShowError(GetMessage("AM_NOTINSTALL"));
    return;
}

if($REQUEST_METHOD=="POST" && check_bitrix_sessid())
{
    $data = $_POST;
    if($data['type']=='settings')
    {
        COption::SetOptionString('arsenalpay.second','token',$data['token']);
        COption::SetOptionString('arsenalpay.second','other_code',$data['other_code']);
		COption::SetOptionString('arsenalpay.second','key',$data['key']);
		COption::SetOptionString('arsenalpay.second','css',$data['css']);
		COption::SetOptionString('arsenalpay.second','ip_adress',$data['ip_adress']);
		COption::SetOptionString('arsenalpay.second','callback_url',$data['callback_url']);
		COption::SetOptionString('arsenalpay.second','check_url',$data['check_url']);
		COption::SetOptionString('arsenalpay.second','src',$data['src']);
		
		COption::SetOptionString('arsenalpay.second','frame_url',$data['frame_url']);
		COption::SetOptionString('arsenalpay.second','frame_params',$data['frame_params']);
		COption::SetOptionString('arsenalpay.second','frame_param_size',$data['frame_param_size']);
    }
}


$aTabs = array(
	array("DIV" => "tab1", "TAB" => GetMessage("AM_TAB"), "ICON" => "", "TITLE" => GetMessage("AM_TAB")),
);
$tabControl = new CAdminTabControl("tabControl", $aTabs);
$tabControl->Begin();
$tabControl->BeginNextTab();

?>
<style>
input[type=text]
{
	width: 300px;
}
span.annotation
{
	display: block;
	position: relative;
	color: gray;
	font-size: 11px;
}
</style>
<div class="tab1">
<form method="POST" action="<?echo $APPLICATION->GetCurPage()?>?mid=<?=htmlspecialcharsbx($module_id)?>">
    <tr>
        <td valign="top" width="50%">
			<label for="token"><?echo GetMessage("AM_TOKEN")?></label>
			<span class="annotation"><?echo GetMessage("AM_TOKEN_DESC")?></span>
		</td>
        <td valign="top" nowrap width="50%">
            <input type="text" name="token" value="<?=COption::GetOptionString('arsenalpay.second','token');?>"/>
        </td>
    </tr>
	<tr>
        <td valign="top" width="50%"><label for="css"><?echo GetMessage("AM_CSS")?></label>
		<span class="annotation"><?echo GetMessage("AM_CSS_DESC")?></span></td>
        <td valign="top" nowrap width="50%">
            <input type="text" name="css" value="<?=COption::GetOptionString('arsenalpay.second','css');?>"/>
        </td>
    </tr>
	<tr>
        <td valign="top" width="50%"><label for="ip_adress"><?echo GetMessage("AM_IP_ADRESS")?></label>
		<span class="annotation"><?echo GetMessage("AM_IP_ADRESS_DESC")?></span></td>
        <td valign="top" nowrap width="50%">
            <input type="text" name="ip_adress" value="<?=COption::GetOptionString('arsenalpay.second','ip_adress');?>"/>
        </td>
    </tr>
	<tr>
        <td valign="top" width="50%"><label for="check_url"><?echo GetMessage("AM_CHECK_URL")?></label>
		<span class="annotation"><?echo GetMessage("AM_CHECK_URL_DESC")?></span></td>
        <td valign="top" nowrap width="50%">
            <input type="text" name="check_url" value="<?=COption::GetOptionString('arsenalpay.second','check_url');?>"/>
        </td>
    </tr>
	<tr>
        <td valign="top" width="50%"><label for="callback_url"><?echo GetMessage("AM_CALLBACK_URL")?></label>
		<span class="annotation"><?echo GetMessage("AM_CALLBACK_URL_DESC")?></span></td>
        <td valign="top" nowrap width="50%">
            <input type="text" name="callback_url" value="<?=COption::GetOptionString('arsenalpay.second','callback_url');?>"/>
        </td>
    </tr>
	<tr>
        <td valign="top" width="50%"><label for="src"><?echo GetMessage("AM_SRC")?></label>
		<span class="annotation"><?echo GetMessage("AM_SRC_DESC")?></span></td>
        <td valign="top" nowrap width="50%">
            <input type="text" name="src" value="<?=COption::GetOptionString('arsenalpay.second','src');?>"/>
        </td>
    </tr>
	<tr>
        <td valign="top" width="50%"><label for="key"><?echo GetMessage("AM_KEY")?></label>
		<span class="annotation"><?echo GetMessage("AM_KEY_DESC")?></span></td>
        <td valign="top" nowrap width="50%">
            <input type="text" name="key" value="<?=COption::GetOptionString('arsenalpay.second','key');?>"/>
        </td>
    </tr>
	<tr>
        <td valign="top" width="50%"><label for="frame_url"><?echo GetMessage("AM_FRAME_URL")?></label>
		<span class="annotation"><?echo GetMessage("AM_FRAME_URL_DESC")?></span></td>
        <td valign="top" nowrap width="50%">
            <input type="text" name="frame_url" value="<?=COption::GetOptionString('arsenalpay.second','frame_url');?>"/>
        </td>
    </tr>
	<tr>
        <td valign="top" width="50%"><label for="frame_params"><?echo GetMessage("AM_FRAME_PARAMS")?></label>
		<span class="annotation"><?echo GetMessage("AM_FRAME_PARAMS_DESC")?></span></td>
        <td valign="top" nowrap width="50%">
            <input type="text" name="frame_params" value="<?=COption::GetOptionString('arsenalpay.second','frame_params');?>"/>
        </td>
    </tr>
	<tr>
        <td valign="top" width="50%"><label for="frame_param_size"><?echo GetMessage("AM_FRAME_PARAM_SIZE")?></label>
		<span class="annotation"><?echo GetMessage("AM_FRAME_PARAM_SIZE_DESC")?></span></td>
        <td valign="top" nowrap width="50%">
            <input type="text" name="frame_param_size" value="<?=COption::GetOptionString('arsenalpay.second','frame_param_size');?>"/>
        </td>
    </tr>	
    <tr>
        <td valign="top" width="50%"></td>
        <td colspan="2">
            <input type="submit" name="Update" value="<?=GetMessage('AM_SUBMIT')?>" class="adm-btn-save">
        </td>
    </tr>
        <input type="hidden" name="type" value="settings"/>
        <?=bitrix_sessid_post();?>
</form>
</div>
<?
$tabControl->EndTab();
$tabControl->End();
?>