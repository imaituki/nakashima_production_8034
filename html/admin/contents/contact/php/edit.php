<?php
//-------------------------------------------------------------------
// 作成日： 2019/10/21
// 作成者： 岡田
// 内  容: contact 編集
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  編集データ取得
//----------------------------------------
// 操作クラス
$objManage  = new DB_manage( _DNS );
$objContact = new AD_contact( $objManage );

// データ取得
$_POST = $objContact->GetIdRow( $arr_get["id"] );

// クラス削除
unset( $objManage  );
unset( $objContact );


//----------------------------------------
//  表示
//----------------------------------------
if( !empty($_POST["id_contact"]) ) {
	// smarty設定
	$smarty = new MySmarty("admin");
	$smarty->compile_dir .= "contact/";

	// オプション設定
	$smarty->assign( "OptionRequest"   , $OptionRequest  );
	$smarty->assign( "OptionWho"       , $OptionWho      );
	$smarty->assign( "OptionCourse"    , $OptionCourse   );

	// 表示
	$smarty->display( "edit.tpl" );

} else {

	// メッセージ保管
	$_SESSION["admin"][_CONTENTS_DIR]["message"]["ng"] = "データの取得に失敗しました。<br />";

	// 表示
	header( "Location: ./index.php" );

}
?>
