<?php

/**
 * print_r with "<pre>".
 */
function pre()
{
    $args = func_get_args();
    foreach ($args as $arg) {
        echo '<pre>';
        print_r($arg);
        echo '</pre>';
    }
}

/**
 * pre() with die.
 */
function pred()
{
    call_user_func_array('pre', func_get_args());
    die();
}

/**
 * var_dump with "<pre>".
 */
function ver()
{
    $args = func_get_args();
    foreach ($args as $arg) {
        echo '<pre>';
        var_dump($arg);
        echo '</pre>';
    }
}

/*
 * ver() with die
 */

function verd()
{
    call_user_func_array('ver', func_get_args());
    die();
}

function generateHtml(&$getdata, $args, $ret = 0)
{
	/*$getdata .= '<ol class="dd-list">';
    foreach ($args as $key => $value) {
     $ret++;
     if(is_array($value)){
         $getdata .= '<li class="dd-item dd-collapsed" data-id="'.$ret.'">
                         <div class="dd-handle">'.$key.'</div>';
         generateHtml($getdata, $value, $ret);
     }else{
         $getdata .= '<li class="dd-item" data-id="'.$ret.'">
                         <div class="dd-handle"><a href="'.url("admin/report/view/".$key) .'">'.$key.'</a></div>
                     </li>';
     }
    }
    $getdata .= '</ol>';*/
    arsort($args);

    $getdata .= '<ul>';
	foreach ($args as $key => $value) {
		$ret++;
		if(is_array($value)){
			$getdata .= '<li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect" style="font-weight:bold;padding-top:15px;padding-bottom:15px;">
                                <i style="display: inline-block;
                                    font-size: 18px;
                                    line-height: 17px;
                                    margin-left: -3px;
                                    margin-right: 15px;
                                    text-align: center;
                                    vertical-align: middle;
                                    width: 20px;" class="md md-folder"></i><span>'.$key.'</span>
                                <span class="pull-right">
                                    <i class="md md-add"></i>
                                </span>
                            </a>';
			generateHtml($getdata, $value, $ret);
		}else{
		    $getdata .= '<li><a href="'.url("admin/report/view/".$key) .'"><i class="fa fa-file-excel-o"></i><span>'.$key.'</span></a></li>';
		}
	}
	$getdata .= '</ul>';
}
