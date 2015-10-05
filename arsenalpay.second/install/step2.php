<?//Install module step 2, save options?>
<?if(check_bitrix_sessid())
{
    COption::SetOptionString('arsenalpay.second','token',$_POST['token']);
    COption::SetOptionString('arsenalpay.second','other_code',$_POST['other_code']);
	COption::SetOptionString('arsenalpay.second','key',$_POST['key']);
	COption::SetOptionString('arsenalpay.second','src',$_POST['src']);
	COption::SetOptionString('arsenalpay.second','css',$_POST['css']);
	COption::SetOptionString('arsenalpay.second','ip_adress',$_POST['ip_adress']);
	COption::SetOptionString('arsenalpay.second','callback_url',$_POST['callback_url']);
	COption::SetOptionString('arsenalpay.second','check_url',$_POST['check_url']);
	
	COption::SetOptionString('arsenalpay.second','frame_url',$_POST['frame_url']);
	COption::SetOptionString('arsenalpay.second','frame_params',$_POST['frame_params']);
	COption::SetOptionString('arsenalpay_second','frame_param_size',$_POST['frame_param_size']);
    
}?>
<?
echo CAdminMessage::ShowNote(GetMessage('AM_INSTALL3'));
?>