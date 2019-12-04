<?php
//-------------------------------------------------------------------
// 作成日： 2019/10/21
// 作成者： 岡田
// 内  容: contact 検索
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";

//----------------------------------------
//  SESSION設定
//----------------------------------------
$_SESSION["admin"][_CONTENTS_DIR]["search"]["POST"] = $arr_post;

//----------------------------------------
//  データ一覧取得
//----------------------------------------
// 操作クラス
$objManage  = new DB_manage( _DNS );
$objContact = new AD_contact( $objManage );

// データ取得
$t_contact = $objContact->GetSearchList( $arr_post );

// クラス削除
unset( $objManage  );
unset( $objContact );


//----------------------------------------
//  表示
//----------------------------------------
// smarty設定
$smarty = new MySmarty("admin");
$smarty->compile_dir .= _CONTENTS_DIR;

// テンプレートに設定
$smarty->assign( "message"       , $message           );
$smarty->assign( "page_navi"     , $t_contact["page"] );
$smarty->assign( "t_contact"     , $t_contact["data"] );

// オプション設定
$smarty->assign( "OptionRequest"   , $OptionRequest  );
$smarty->assign( "OptionWho"       , $OptionWho      );
$smarty->assign( "OptionCourse"    , $OptionCourse   );

// 表示
$smarty->display("list.tpl");
?>
