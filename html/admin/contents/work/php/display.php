<?php
//-------------------------------------------------------------------
// 作成日： 2019/10/21
// 作成者： 岡田
// 内  容: work 一括表示切替
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  表示切替
//----------------------------------------
// 操作クラス
$objManage  = new DB_manage( _DNS );
$objWork = new AD_work( $objManage );

// トランザクション
$objWork->_DBconn->StartTrans();

// 表示切り替え処理
$res = $objWork->changeDisplay( $arr_post["id"], $arr_post["display_flg"] );

// 失敗したらロールバック
if( $res == false ) {
	$objWork->_DBconn->RollbackTrans();
}

// コミット
$objWork->_DBconn->CompleteTrans();

// クラス削除
unset( $objManage  );
unset( $objWork );

// 戻り値
if( $res == false ) {
	echo json_encode( array( "result" => "false", "message" => "表示切り替えに失敗しました。<br />" ) );
} else {
	echo json_encode( array( "result" => "true", "message" => "表示切り替え完了しました。<br />" ) );
}
?>