<?php
//----------------------------------------------------------------------------
// 作成日： 2019/10/21
// 作成者： 岡田
// 内  容： お問い合わせ操作クラス
//----------------------------------------------------------------------------

//-------------------------------------------------------
//  クラス
//-------------------------------------------------------
class AD_contact {

	//-------------------------------------------------------
	//  変数宣言
	//-------------------------------------------------------
	// DB接続
	var $_DBconn = null;

	// 主テーブル
	var $_CtrTable   = "t_contact";
	var $_CtrTablePk = "id_contact";

	// コントロール機能（ログ用）
	var $_CtrLogName = "お問い合わせ";

	//-------------------------------------------------------
	// 関数名：__construct
	// 引  数：$dbconn  ： DB接続オブジェクト
	// 戻り値：なし
	// 内  容：コンストラクタ
	//-------------------------------------------------------
	function __construct( $dbconn ) {

		// クラス宣言
		if( !empty( $dbconn ) ) {
			$this->_DBconn  = $dbconn;
		} else {
			$this->_DBconn  = new DB_manage( _DNS );
		}

	}


	//-------------------------------------------------------
	// 関数名：__destruct
	// 引  数：なし
	// 戻り値：なし
	// 内  容：デストラクタ
	//-------------------------------------------------------
	function __destruct() {

	}

	//-------------------------------------------------------
	// 関数名：delete
	// 引  数：$id - 削除するお問い合わせID
	// 戻り値：true - 正常, false - 異常
	// 内  容：お問い合わせデータ削除
	//-------------------------------------------------------
	function delete( $id ) {

		// 初期化
		$res = false;

		// 削除処理
		if( !empty( $id ) ) {
			// 更新
			$res = $this->_DBconn->delete( $this->_CtrTable, $this->_CtrTablePk . " = " . $id );

		}
		// 戻り値
		return $res;
	}


	//-------------------------------------------------------
	// 関数名：check
	// 引  数：$id - 確認済にするお問い合わせID
	// 戻り値：true - 正常, false - 異常
	// 内  容：お問い合わせデータ確認
	//-------------------------------------------------------
	function check( $id ) {

		// 初期化
		$res = false;

		// 削除処理
		if( !empty( $id ) ) {
			// 更新
			$res = $this->_DBconn->update( $this->_CtrTable, array( "check_flg" => 1 ), null, $this->_CtrTablePk . " = " . $id  );
		}
		// 戻り値
		return $res;
	}


	//-------------------------------------------------------
	// 関数名：GetSearchList
	// 引  数：$search - 検索条件
	//       ：$option - 取得条件
	// 戻り値：お問い合わせリスト
	// 内  容：お問い合わせ検索を行いデータを取得
	//-------------------------------------------------------
	function GetSearchList( $search, $option = null ) {

		// SQL配列
		$creation_kit = array(  "select" => "*",
								"from"   => $this->_CtrTable,
								"where"  => "1 ",
								"order"  => "entry_date DESC"
							);

		// 検索条件
		if( !empty( $search["search_keyword"] ) ) {
			$creation_kit["where"] .= "AND ( " . $this->_DBconn->createWhereSql( $search["search_keyword"], "title", "LIKE", "OR", "%string%" ) . " ) ";
		}

		if( !empty( $search["search_date_start"] ) ) {
			$creation_kit["where"] .= "AND " . $this->_DBconn->createWhereSql( "'" . $search["search_date_start"] . "'", $this->_CtrTable . ".date", " >= ", null, null ) . " ";
		}
		if( !empty( $search["search_date_end"] ) ) {
			$creation_kit["where"] .= "AND " . $this->_DBconn->createWhereSql( "'" . $search["search_date_end"] . "'", $this->_CtrTable . ".date", " <= ", null, null ) . " ";
		}


		if( !empty( $search["search_course"] ) ) {
			$creation_kit["where"] .= "AND course = '" . $search["search_course"] . "' ";
		}

		// 取得条件
		if( empty( $option ) ) {

			// ページ切り替え配列
			$_PAGE_INFO = array( "PageNumber"      => ( !empty( $search["page"] ) ) ? $search["page"] : 1,
								 "PageShowLimit"   => _PAGESHOWLIMIT,
								 "PageNaviLimit"   => _PAGENAVILIMIT,
								 "LinkSeparator"   => " | ",
								 "PageUrlFreeMode" => 1,
								 "PageFileName"    => "javascript:changePage(%d);" );

			// オプション
			$option = array( "fetch" => _DB_FETCH_ALL,
							 "page"  => $_PAGE_INFO );

		}

		// データ取得
		$res = $this->_DBconn->selectCtrl( $creation_kit, $option );


		if( is_array( $res["data"] ) ) {
			foreach( $res["data"] as $key => $val ) {
				if( !empty( $res["data"][$key]["course"] ) ) {
					$res["data"][$key]["course"] = explode( ",", $res["data"][$key]["course"] );
				}
			}
		} elseif( is_array( $res ) ) {
			foreach( $res as $key => $val ) {
				if( !empty( $res[$key]["course"] ) ) {
					$res[$key]["course"] = explode( ",", $res[$key]["course"] );
				}
			}
		}

		// 戻り値
		return $res;

	}

	//-------------------------------------------------------
	// 関数名：GetIdRow
	// 引  数：$id - お問い合わせID
	// 戻り値：お問い合わせ
	// 内  容：お問い合わせを1件取得する
	//-------------------------------------------------------
	function GetIdRow( $id ) {

		// データチェック
		if( !is_numeric( $id ) ) {
			return null;
		}

		// SQL配列
		$creation_kit = array( "select" => "*",
							   "from"   => $this->_CtrTable,
							   "where"  => $this->_CtrTablePk . " = " . $id );

		// データ取得
		$res = $this->_DBconn->selectCtrl( $creation_kit, array( "fetch" => _DB_FETCH ) );

		// データ取得
		$res = $this->_DBconn->selectCtrl( $creation_kit, array( "fetch" => _DB_FETCH ) );
		if( !empty( $res["course"] ) ){
					$res["course"] = explode( ",", $res["course"] );
				}

		// 戻り値
		return $res;

	}

}

?>
