<?php
//-------------------------------------------------------------------
// 作成日： 2019/01/15
// 作成者： 福嶋
// 内  容： 見積もり 検索
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  SESSION設定
//----------------------------------------
@session_start();

if( !empty( $arr_post["search_date_start"] ) ) {
	$arr_post["search_date_start"] = date( "Y/m/d", strtotime( $arr_post["search_date_start"] ) );
} else {
	$arr_post["search_date_start"] = null;
}
if( !empty( $arr_post["search_date_end"] ) ) {
	$arr_post["search_date_end"] = date( "Y/m/d", strtotime( $arr_post["search_date_end"] ) );
} else {
	$arr_post["search_date_end"] = null;
}

$_SESSION["admin"][_CONTENTS_DIR]["search"]["POST"] = $arr_post;


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
unset( $objEstimate   );


//----------------------------------------
//  表示
//----------------------------------------
// smarty設定
$smarty = new MySmarty("admin");
$smarty->compile_dir .= "estimate/";

// テンプレートに設定
$smarty->assign( "page_navi"    , $t_estimate["page"] );
$smarty->assign( "t_estimate", $t_estimate["data"] );

// オプション配列
$smarty->assign( "OptionStaff", $OptionStaff );

// 表示
$smarty->display("list.tpl");

?>
