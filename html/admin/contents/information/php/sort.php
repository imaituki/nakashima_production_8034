<?php
//-------------------------------------------------------------------
// 作成日: 2016/11/01
// 作成者: 鈴木
// 内  容: お知らせ ソート
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  ソート処理
//----------------------------------------
// 操作クラス
$objManage  = new DB_manage( _DNS );
$mainObject = new $class_name( $objManage, $_ARR_IMAGE, $_ARR_FILE );

// トランザクション
$mainObject->_DBconn->StartTrans();

// ソート
$res = $mainObject->sort( $arr_post["sort"], _CONTENTS_ID );

// ロールバック
if( $res == false ) {
	$mainObject->_DBconn->RollbackTrans();
}

// コミット
$mainObject->_DBconn->CompleteTrans();

// クラス削除
unset( $objManage  );
unset( $mainObject );

// 戻り値
if( $res == false ) {
	echo json_encode( array( "result" => "false", "message" => "並び順の変更に失敗しました。（F5ボタンを押して一度ページを更新してください）<br />" ) );
} else {
	echo json_encode( array( "result" => "true", "message" => "並び順の変更が完了しました。<br />" ) );
}
?>