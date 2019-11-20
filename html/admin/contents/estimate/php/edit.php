<?php
//-------------------------------------------------------------------
// 作成日： 2019/01/11
// 作成者： 福嶋
// 内  容： 見積もり 編集
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  編集データ取得
//----------------------------------------
// 操作クラス
$objManage      = new DB_manage( _DNS );
$objEstimate = new AD_estimate( $objManage );

// データ取得
$_POST = $objEstimate->GetIdRow( $arr_get["id"] );

// クラス削除
unset( $objManage   );
unset( $objEstimate );


//----------------------------------------
//  表示
//----------------------------------------
if( !empty( $_POST["id_estimate"] ) ) {

	// データ加工
	$_POST["display_start"] = ( !empty( $_POST["display_start"] ) ) ? date( "Y/m/d", strtotime( $_POST["display_start"] ) ) : NULL;
	$_POST["display_end"]   = ( !empty( $_POST["display_end"]   ) ) ? date( "Y/m/d", strtotime( $_POST["display_end"]   ) ) : NULL;

	// smarty設定
	$smarty = new MySmarty("admin");
	$smarty->compile_dir .= "estimate/";

	// 表示
	$smarty->display( "edit.tpl" );

} else {

	// メッセージ保管
	$_SESSION["admin"][_CONTENTS_DIR]["message"]["ng"] = "データの取得に失敗しました。<br />";

	// 表示
	header( "Location: ./index.php" );

}

?>
