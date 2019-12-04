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
//  確認処理
//----------------------------------------
// 操作クラス
$objManage  = new DB_manage( _DNS,1 );
$objContact = new AD_contact( $objManage );

// トランザクション
$objContact->_DBconn->StartTrans();

// 削除処理
$res = $objContact->check( $arr_post["id"] );

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
	echo json_encode( array( "result" => "false", "message" => "確認するデータを選択してください。<br />" ) );
} else {
	echo json_encode( array( "result" => "true", "message" => "確認済みにしました。<br />" ) );
}
?>