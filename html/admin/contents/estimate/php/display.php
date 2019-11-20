<?php
//-------------------------------------------------------------------
// 作成日： 2019/01/15
// 作成者： 福嶋
// 内  容： 見積もり 一括表示切替
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  表示切替
//----------------------------------------
// 操作クラス
$objManage      = new DB_manage( _DNS );
$objEstimate = new AD_estimate( $objManage );

// トランザクション
$objEstimate->_DBconn->StartTrans();

// 表示切り替え
$res = $objEstimate->changeDisplay( $arr_post["id"], $arr_post["display_flg"] );

// ロールバック
if( $res == false ) {
	$objEstimate->_DBconn->RollbackTrans();
}

// コミット
$objEstimate->_DBconn->CompleteTrans();

// クラス削除
unset( $objManage );
unset( $objEstimate   );

// 戻り値
if( $res == false ) {
	echo json_encode( array( "result" => "false", "message" => "表示切り替えに失敗しました。<br />" ) );
} else {
	echo json_encode( array( "result" => "true", "message" => "表示切り替え完了しました。<br />" ) );
}

?>
