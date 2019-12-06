<?php
class MyTCPDF extends TCPDF {
	
	function __construct( $orientation='P', $unit='mm', $format='A4', $unicode=true, $encoding='UTF-8', $diskcache=false, $pdfa=false ) {
		
		// 親クラス
		parent::__construct( $orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa );
		
		// フォントサブセットを無効
		$this->setFontSubsetting( false );
		
		// ヘッダー、フッターの設定
		$this->setPrintHeader( false );
		$this->setPrintFooter( false );
		
		// フォントとページをセット
		$this->SetFont( 'kozgopromedium', '', 10 );
		
		// 自動改ページ OFF
		$this->SetAutoPageBreak( false );
		
	}
	
	function fontAutoCell( $pdf, $w, $h, $txt, $border, $align = "L", $fill = 0, $ln = 0, $x, $y, $reseth, $stretch, $ishtml, $autopadding = true, $maxh, $fontSize = 10, $valign = "M" ) {
		
		// 幅によってフォントサイズを6段階で縮小する。
		for( $lowFont = 0; $lowFont < 6; $lowFont++ ) {
			if( ( $w * 2 ) >= ( mb_strwidth( $txt, 'UTF-8' ) / 2 ) * ( $fontSize - $lowFont ) * 0.35 ) {
				break;
			}
		}
		
		// フォントサイズ
		$pdf->SetFontSize($fontSize - $lowFont);
		
		// 改ページ処理（最大の高さが指定されている場合のみ）
		if( !empty( $maxh ) ) {
			$mh = $pdf->getPageHeight() - 15; // マージンを引く
			$ny = $pdf->GetY() + $maxh;
			if( $mh < $ny ) {
				$pdf->AddPage();
			}
		}
		
		// 出力
		$pdf->MultiCell( $w, $h, $txt, $border, $align, $fill, $ln, $x, $y, true, $stretch, $ishtml, $autopadding, $maxh, $valign );
		
	}
	
	function evenlyCell($pdf, $w, $h, $txt, $border, $align = "L", $x, $y, $fontSize = 10 ) {
		
		// 文字数
		$char_num = mb_strlen( $txt, "UTF-8" );
		
		// フォントサイズ
		$pdf->SetFontSize($fontSize);
		
		// 位置指定
		$pdf->SetXY( $x, $y );
		
		// 1文字づつ出力
		$x2 = $x;
		for( $i = 1; $i <= $char_num; $i++ ) {
			if( strcmp( $align, 'R' ) == 0 ) {
				$x2 = $x2 - $w;
				$pdf->SetX( $x2 );
				$char = mb_substr( $txt, ( $i * -1 ), 1, 'UTF-8' );
				$pdf->Cell( $w, $h, $char, $border, "", $align );
			} else {
				$char = mb_substr( $txt, ( $i - 1 ), 1, 'UTF-8' );
				$pdf->Cell( $w, $h, $char, $border, "", $align );
			}
		}
		
		$pdf->SetFontSize(10);
		
	}
	
}

?>