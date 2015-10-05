<?//Install module step 1, configure options?>
<style>
span.annotation
{
	display: block;
	position: relative;
	color: gray;
	font-size: 11px;
}
</style>
<form action="<?=$APPLICATION->GetCurPage()?>" name="photo_form" id="photo_form" class="form-photo" method="POST">
	<?=bitrix_sessid_post()?>
	<input type="hidden" name="install" value="Y">
	<input type="hidden" name="step" value="2">
    <input type="hidden" name="lang" value="<?=LANGUAGE_ID?>">
	<input type="hidden" name="id" value="arsenalpay.second">
    <table class="list-table">
        <tr><td><table>
            <tr>
                <td valign="middle"><label for="token"><?echo GetMessage("AM_TOKEN")?></label>
				<span class="annotation"><?echo GetMessage("AM_TOKEN_DESC")?></span></td>
                <td valign="middle">
                    <input type="text" size="100" name="token" value=""/>
                </td>
            </tr>
			<tr>
                <td valign="middle"><label for="css"><?echo GetMessage("AM_CSS")?></label>
				<span class="annotation"><?echo GetMessage("AM_CSS_DESC")?></span></td>
                <td valign="middle">
                    <input type="text" size="100" name="css" value=""/>
                </td>
            </tr>
			<tr>
                <td valign="middle"><label for="ip_adress"><?echo GetMessage("AM_IP_ADRESS")?></label>
				<span class="annotation"><?echo GetMessage("AM_IP_ADRESS_DESC")?></span></td>
                <td valign="middle">
                    <input type="text" size="100" name="ip_adress" value=""/>
                </td>
            </tr>
			<tr>
                <td valign="middle"><label for="check_url"><?echo GetMessage("AM_CHECK_URL")?></label>
				<span class="annotation"><?echo GetMessage("AM_CHECK_URL_DESC")?></span></td>
                <td valign="middle">
                    <input type="text" size="100" name="check_url" value=""/>
                </td>
            </tr>
			<tr>
                <td valign="middle"><label for="callback_url"><?echo GetMessage("AM_CALLBACK_URL")?></label>
				<span class="annotation"><?echo GetMessage("AM_CALLBACK_URL_DESC")?></span></td>
                <td valign="middle">
                    <input type="text" size="100" name="callback_url" value="http://<?=$_SERVER['HTTP_HOST']?>/callback/index.php"/>
                </td>
            </tr>
			<tr>
                <td valign="middle"><label for="src"><?echo GetMessage("AM_SRC")?></label>
				<span class="annotation"><?echo GetMessage("AM_SRC_DESC")?></span></td>
                <td valign="middle">
                    <input type="text" size="100" name="src" value=""/>
                </td>
            </tr>
			<tr>
                <td valign="middle"><label for="key"><?echo GetMessage("AM_KEY")?></label>
				<span class="annotation"><?echo GetMessage("AM_KEY_DESC")?></span></td>
                <td valign="middle">
                    <input type="text" size="100" name="key" value=""/>
                </td>
            </tr>
			<tr>
                <td valign="middle"><label for="frame_url"><?echo GetMessage("AM_FRAME_URL")?></label>
				<span class="annotation"><?echo GetMessage("AM_FRAME_URL_DESC")?></span></td>
                <td valign="middle">
                    <input type="text" size="100" name="frame_url" value="https://arsenalpay.ru/payframe/pay.php"/>
                </td>
            </tr>
			<tr>
                <td valign="middle"><label for="frame_params"><?echo GetMessage("AM_FRAME_PARAMS")?></label>
				<span class="annotation"><?echo GetMessage("AM_FRAME_PARAMS_DESC")?></span></td>
                <td valign="middle">
                    <input type="text" size="100" name="frame_params" value="width='750' height='750' frameborder='0' scrolling='auto'"/>
                </td>
            </tr>
			<tr>
                <td valign="middle"><label for="frame_param_size"><?echo GetMessage("AM_FRAME_PARAM_SIZE")?></label>
				<span class="annotation"><?echo GetMessage("AM_FRAME_PARAM_SIZE_DESC")?></span></td>
                <td valign="middle">
                    <input type="text" size="100" name="frame_param_size" value="1"/>
                </td>
            </tr>			
            <tr><td colspan="2"><input type="submit" value="<?=GetMessage("AM_INSTALL")?>" /></td></tr>
        </table></td></tr>
    </table>
</form>