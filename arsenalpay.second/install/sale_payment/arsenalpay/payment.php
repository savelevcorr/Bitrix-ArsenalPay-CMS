<?php
	
	//receive options
    $order_id = IntVal($GLOBALS["SALE_INPUT_PARAMS"]["ORDER"]["ID"]);
    $token = COption::GetOptionString('arsenalpay.second','token');
    $other_code =  COption::GetOptionString('arsenalpay.second','other_code');
	$css = COption::GetOptionString('arsenalpay.second','css');
	$src = COption::GetOptionString('arsenalpay.second','src');
    $telephone = CSalePaySystemAction::GetParamValue("TELEPHONE");
	
	$frame_url = COption::GetOptionString('arsenalpay.second','frame_url');
	$frame_params = COption::GetOptionString('arsenalpay.second','frame_params');
	$frame_param_size = COption::GetOptionString('arsenalpay.second','frame_param_size');
	
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