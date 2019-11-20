<?php
//-------------------------------------------------------------------
// 作成日： 2019/01/17
// 作成者： 福嶋
// 内  容： 見積もり 一覧表示
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  PDF出力クラス
//----------------------------------------
require $_SERVER["DOCUMENT_ROOT"] . "/../data/lib/tcpdf/config/lang/jpn.php";
require $_SERVER["DOCUMENT_ROOT"] . "/../data/lib/tcpdf/tcpdf.php";
require $_SERVER["DOCUMENT_ROOT"] . "/../data/lib/tcpdf/MyTcpdf.class.php";


//----------------------------------------
//  データ一覧取得
//----------------------------------------
// 操作クラス
$objManage      = new DB_manage( _DNS );
$objEstimate = new AD_estimate( $objManage );

// データ取得
$t_estimate = $objEstimate->GetIdRow( $arr_get["id"] );

// クラス削除
unset( $objManage );
unset( $objEstimate );

// 合計金額の計算
// 初期化
$sum = 0;
if( !empty( $t_estimate["estimate"] ) && is_array( $t_estimate["estimate"] ) ){
	foreach( $t_estimate["estimate"] as $key => $val ){
		$sum += $val["total"];
	}
}

// 日数
if( !empty( $t_estimate["in_date"] ) && !empty( $t_estimate["out_date"] ) ){
	$t_estimate["days"] = ( strtotime($t_estimate["out_date"]) - strtotime($t_estimate["in_date"]) ) / (3600*24);
}


//----------------------------------------
// 表示
//----------------------------------------
// smarty設定
$smarty = new MySmarty("admin");
$smarty->compile_dir .= "estimate/";

// テンプレートに設定
$smarty->assign( "estimate", $t_estimate );
$smarty->assign( "sum"     , $sum        );

// オプション配列
$smarty->assign( "OptionStaff", $OptionStaff );

// 表示
$html = $smarty->fetch( "export.tpl" );


//----------------------------------------
// PDF
//----------------------------------------
// PDFオブジェクト
$tcpdf = new MyTCPDF( PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false );

// ページ追加
$tcpdf->AddPage( 'P', 'A4' );

// 明朝体
$tcpdf->SetFont("kozminproregular", "", 10);

// 自動改ページモード
$tcpdf->SetAutoPageBreak( true );

// ページの余白
$tcpdf->SetMargins( 15, 20, 15, true );

// 書き込み
$tcpdf->writeHTML( $html, true, false, true, false, '' );

// ポインタの移動
$tcpdf->lastPage();

// PDF を出力する
$tcpdf->Output( date('YmdHi') . '.pdf', 'I' );

?>