<?php
//-------------------------------------------------------------------
// 作成日： 2019/01/11
// 作成者： 福嶋
// 内  容： 見積もり 一覧表示
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
$arr_post = ( isset( $_SESSION["admin"][_CONTENTS_DIR]["search"]["POST"] ) ) ? $_SESSION["admin"][_CONTENTS_DIR]["search"]["POST"] : null;


//----------------------------------------
//  データ一覧取得
//----------------------------------------
// 操作クラス
$objManage      = new DB_manage( _DNS );
$objEstimate = new AD_estimate( $objManage );

// データ取得
$t_estimate = $objEstimate->GetSearchList( $arr_post );

// クラス削除
unset( $objManage );
unset( $objEstimate );

//----------------------------------------
// 表示
//----------------------------------------
// smarty設定
$smarty = new MySmarty("admin");
$smarty->compile_dir .= "estimate/";

// テンプレートに設定
$smarty->assign( "message"      , $message        );
$smarty->assign( "page_navi"    , $t_estimate["page"] );
$smarty->assign( "t_estimate", $t_estimate["data"] );

// オプション配列
$smarty->assign( "OptionStaff", $OptionStaff );

// 表示
$smarty->display("index.tpl");
?>
