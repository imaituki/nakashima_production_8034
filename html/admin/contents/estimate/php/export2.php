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
require $_SERVER["DOCUMENT_ROOT"] . "/../cgi-data/lib/tcpdf/config/lang/jpn.php";
require $_SERVER["DOCUMENT_ROOT"] . "/../cgi-data/lib/tcpdf/tcpdf.php";
require $_SERVER["DOCUMENT_ROOT"] . "/../cgi-data/lib/tcpdf/MyTcpdf.class.php";

//----------------------------------------
//  データ一覧取得
//----------------------------------------
// 操作クラス
$objManage      = new DB_manage( _DNS );
$objEstimate    = new AD_estimate( $objManage );

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

$sum_free = 0;
if( !empty( $t_estimate["estimate"] ) && is_array( $t_estimate["estimate"] ) ){
	foreach( $t_estimate["estimate"] as $key => $val ){
		$sum_free += $val["price"] * $val["number"];
	}
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
$smarty->assign( "sum_free", $sum_free   );


// 表示
$html = $smarty->fetch( "export2.tpl" );


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
