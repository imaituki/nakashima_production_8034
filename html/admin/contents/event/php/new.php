<?php
//-------------------------------------------------------------------
// 作成日: 2019/06/20
// 作成者: yamakawa
// 内  容: event 新規登録
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  表示
//----------------------------------------
// smarty設定
$smarty = new MySmarty("admin");
$smarty->compile_dir .= _CONTENTS_DIR. "/";

// テンプレートに設定
if( !empty($_ARR_IMAGE) ){
	$smarty->assign( '_ARR_IMAGE', $_ARR_IMAGE );
}

// オプション設定
$smarty->assign( 'OptionEventCategory' , $OptionEventCategory  );

// 表示
$smarty->display( "new.tpl" );
?>
