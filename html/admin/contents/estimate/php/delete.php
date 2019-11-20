<?php
//-------------------------------------------------------------------
// 作成日： 2019/01/15
// 作成者： 福嶋
// 内  容： 見積もり 一括削除
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  削除処理
//----------------------------------------
// 操作クラス
$objManage      = new DB_manage( _DNS );
$objEstimate = new AD_estimate( $objManage );

// トランザクション
$objEstimate->_DBconn->StartTrans();

// 削除
$res = $objEstimate->delete( $arr_post["id"] );

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
	echo json_encode( array( "result" => "false", "message" => "データを選択してください。<br />" ) );
} else {
	echo json_encode( array( "result" => "true", "message" => "完了しました。<br />" ) );
}

?>
