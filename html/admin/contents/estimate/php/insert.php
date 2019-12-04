<?php
//-------------------------------------------------------------------
// 作成日： 2019/01/11
// 作成者： 福嶋
// 内  容： お見積もり 新規登録
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  初期化
//----------------------------------------
$message = NULL;


//----------------------------------------
//  新規登録処理
//----------------------------------------
// 操作クラス
$objManage      = new DB_manage( _DNS,1 );
$objEstimate = new AD_estimate( $objManage );

// データ変換
$arr_post = $objEstimate->convert( $arr_post );

// データチェック
$message = $objEstimate->check( $arr_post, 'insert' );

// エラーチェック
if( empty( $message["ng"] ) ) {

	// トランザクション
	$objEstimate->_DBconn->StartTrans();

	// 登録処理
	$res = $objEstimate->insert( $arr_post );

	// ロールバック
	if( $res == false ) {
		$objEstimate->_DBconn->RollbackTrans();
		$message["ng"]["all"] = "登録処理に失敗しました。（ブラウザの再起動を行って改善されない場合は、システム管理者へご連絡ください。）<br />";
	}

	// コミット
	$objEstimate->_DBconn->CompleteTrans();

}

// クラス削除
unset( $objManage );
unset( $objEstimate );

//----------------------------------------
//  表示
//----------------------------------------
if( empty( $message["ng"] ) ) {

	// メッセージ保管
	$_SESSION["admin"][_CONTENTS_DIR]["message"]["ok"] = "登録が完了しました。<br />";

	// 表示
	header( "Location: ./index.php" );

} else {


	// smarty設定
	$smarty = new MySmarty("admin");
	$smarty->compile_dir .= "estimate/";

	// テンプレートに設定
	$smarty->assign( "message"   , $message    );
	$smarty->assign( "arr_post"  , $arr_post   );

	// オプション配列
	$smarty->assign( "OptionStaff", $OptionStaff );

	// 表示
	$smarty->display( "new.tpl" );

}

?>
