<?//Install module step 2, save options?>
<?if(check_bitrix_sessid())
{
    COption::SetOptionString('arsenalmedia.arsenalpay','token',$_POST['token']);
    COption::SetOptionString('arsenalmedia.arsenalpay','other_code',$_POST['other_code']);
	COption::SetOptionString('arsenalmedia.arsenalpay','key',$_POST['key']);
	COption::SetOptionString('arsenalmedia.arsenalpay','src',$_POST['src']);
	COption::SetOptionString('arsenalmedia.arsenalpay','css',$_POST['css']);
	COption::SetOptionString('arsenalmedia.arsenalpay','ip_adress',$_POST['ip_adress']);
	COption::SetOptionString('arsenalmedia.arsenalpay','callback_url',$_POST['callback_url']);
	COption::SetOptionString('arsenalmedia.arsenalpay','check_url',$_POST['check_url']);
	
	COption::SetOptionString('arsenalmedia.arsenalpay','frame_url',$_POST['frame_url']);
	COption::SetOptionString('arsenalmedia.arsenalpay','frame_params',$_POST['frame_params']);
	COption::SetOptionString('arsenalmedia_arsenalpay','frame_param_size',$_POST['frame_param_size']);
    
}?>
<?
echo CAdminMessage::ShowNote(GetMessage('AM_INSTALL3'));
?>