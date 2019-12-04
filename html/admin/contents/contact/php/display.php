<?php
//-------------------------------------------------------------------
// 作成日： 2019/10/21
// 作成者： 岡田
// 内  容: contact 一括表示切替
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
$objContact = new AD_contact( $objManage );

// トランザクション
$objContact->_DBconn->StartTrans();

// 表示切り替え処理
$res = $objContact->changeDisplay( $arr_post["id"], $arr_post["display_flg"] );

// 失敗したらロールバック
if( $res == false ) {
	$objContact->_DBconn->RollbackTrans();
}

// コミット
$objContact->_DBconn->CompleteTrans();

// クラス削除
unset( $objManage  );
unset( $objContact );

// 戻り値
if( $res == false ) {
	echo json_encode( array( "result" => "false", "message" => "表示切り替えに失敗しました。<br />" ) );
} else {
	echo json_encode( array( "result" => "true", "message" => "表示切り替え完了しました。<br />" ) );
}
?>