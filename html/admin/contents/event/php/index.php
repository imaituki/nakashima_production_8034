<?php
//-------------------------------------------------------------------
// 作成日: 2019/06/20
// 作成者: yamakawa
// 内  容: event 一覧表示
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";

//----------------------------------------
//  メッセージ取得
//----------------------------------------
// 取得
$message = ( isset( $_SESSION["admin"][_CONTENTS_DIR]["message"] ) ) ? $_SESSION["admin"][_CONTENTS_DIR]["message"] : null;

// クリア
unset( $_SESSION["admin"][_CONTENTS_DIR]["message"] );


//----------------------------------------
//  SESSION取得
//----------------------------------------
$arr_post = ( isset($_SESSION["admin"][_CONTENTS_DIR]["search"]["POST"]) ) ? $_SESSION["admin"][_CONTENTS_DIR]["search"]["POST"] : null;


//----------------------------------------
//  データ一覧取得
//----------------------------------------
// 操作クラス
$objManage  = new DB_manage( _DNS );
$mainObject = new $class_name( $objManage );


// データ取得
$t_event = $mainObject->GetSearchList( $arr_post );

// クラス削除
unset( $objManage  );
unset( $mainObject );

//----------------------------------------
// 表示
//----------------------------------------
// smarty設定
$smarty = new MySmarty("admin");
$smarty->compile_dir .= _CONTENTS_DIR. "/";

// テンプレートに設定
$smarty->assign( "message"       , $message               );
$smarty->assign( "page_navi"     , $t_event["page"]       );
$smarty->assign( "t_event"       , $t_event["data"]       );
if( !empty($_ARR_IMAGE) ){
	$smarty->assign( '_ARR_IMAGE', $_ARR_IMAGE );
}

// オプション設定
$smarty->assign( 'OptionEventCategory' , $OptionEventCategory  );


// 表示
$smarty->display("index.tpl");
?>
