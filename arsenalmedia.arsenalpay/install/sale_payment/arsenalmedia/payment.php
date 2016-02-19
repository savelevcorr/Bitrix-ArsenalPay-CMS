<?php
	
	//receive options
    $order_id = IntVal($GLOBALS["SALE_INPUT_PARAMS"]["ORDER"]["ID"]);
    $token = COption::GetOptionString('arsenalmedia.arsenalpay','token');
    $other_code =  COption::GetOptionString('arsenalmedia.arsenalpay','other_code');
	$css = COption::GetOptionString('arsenalmedia.arsenalpay','css');
	$src = COption::GetOptionString('arsenalmedia.arsenalpay','src');
    $telephone = CSalePaySystemAction::GetParamValue("TELEPHONE");
	
	$frame_url = COption::GetOptionString('arsenalmedia.arsenalpay','frame_url');
	$frame_params = COption::GetOptionString('arsenalmedia.arsenalpay','frame_params');
	$frame_param_size = COption::GetOptionString('arsenalmedia.arsenalpay','frame_param_size');
	
    if($telephone[0]==9)
    {}
    elseif($telephone[0]=='+'&&$telephone[1]=='7')
    {
        $telephone = substr($telephone, 2);
    }
    elseif($telephone[0]=='7'||$telephone[0]=='8')
    {
        $telephone = substr($telephone, 1);
    }
    
    $summ = $GLOBALS["SALE_INPUT_PARAMS"]["ORDER"]['PRICE'];
	if(!$order_id)
	{
		$order_id = $arOrder['ID'];
	}
    if(!$summ)
    {
        $summ = $arOrder['PRICE'];
    }
	//Frame displays the payment after placing the order.
  ?>
  
<iframe src="<?=$frame_url?>?src=<?=$src?>&t=<?=$token?>&n=<?=$order_id?>&frame=<?=$frame_param_size?>&a=<?=ceil($summ)?>&msisdn=<?=$telephone?><?=($other_code)?'&s='.$other_code:''?><?=($css)?'&css='.$css:''?>" <?=$frame_params?>></iframe>