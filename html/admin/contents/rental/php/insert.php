<?php
//-------------------------------------------------------------------
// 作成日: 2019/06/20
// 作成者: yamakawa
// 内  容: rental 新規登録
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
$objManage  = new DB_manage( _DNS,1 );
$mainObject = new $class_name( $objManage, $_ARR_IMAGE );

// データ変換
$arr_post = $mainObject->convert( $arr_post );

// データチェック
$message = $mainObject->check( $arr_post, 'insert' );
disp_arr($message );

// エラーチェック
if( empty( $message["ng"] ) ) {

	// トランザクション
	$mainObject->_DBconn->StartTrans();

	$arr_detail = $arr_post["detail"];
	unset( $arr_post["detail"] );

	// 登録処理
	$res = $mainObject->insert( $arr_post );

	// 失敗したらロールバック
	if( $res == false ) {
		$mainObject->_DBconn->RollbackTrans();
		$message["ng"]["all"] = _ERRHEAD . "登録処理に失敗しました。（ブラウザの再起動を行って改善されない場合は、システム管理者へご連絡ください。）<br />";
	}else{

		if( !empty( $arr_detail ) && is_array( $arr_detail ) ){
			$Id_Group = $objGroup->_DBconn->Insert_ID();

			foreach ( $arr_detail as $key => $val ) {
				$val["id_group"] = $Id_Group;
				// 登録処理
				$res2 = $objGroup->insert_detail( $val );
			}
		}
		// ロールバック
			if( $res2 == false ) {
				$objGroup->_DBconn->RollbackTrans();
				$message["ng"]["all"] = _ERRHEAD . "登録処理に失敗しました。（ブラウザの再起動を行って改善されない場合は、システム管理者へご連絡ください。）<br />";
			}
		}
	// コミット
	$mainObject->_DBconn->CompleteTrans();

}

// クラス削除
unset( $objManage  );
unset( $mainObject );

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
	$smarty->compile_dir .= _CONTENTS_DIR. "/";

	// テンプレートに設定
	$smarty->assign( "message"    , $message    );
	$smarty->assign( "arr_post"   , $arr_post   );
	$smarty->assign( '_ARR_IMAGE' , $_ARR_IMAGE );

	// オプション設定
	$smarty->assign( 'OptionRentalCategory' , $OptionRentalCategory  );

	// 表示
	$smarty->display( "new.tpl" );

}

?>
