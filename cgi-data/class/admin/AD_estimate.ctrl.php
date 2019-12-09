<?php
//----------------------------------------------------------------------------
// 作成日： 2016/11/22
// 作成者： 鈴木
// 内  容： お役立ち情報操作クラス
//----------------------------------------------------------------------------

//-------------------------------------------------------
//  クラス
//-------------------------------------------------------
class AD_estimate {

	//-------------------------------------------------------
	//  変数宣言
	//-------------------------------------------------------
	// DB接続
	var $_DBconn = null;

	// 主テーブル
	var $_CtrTable   = "t_estimate";
	var $_CtrTablePk = "id_estimate";

	// サブテーブル
	var $_CtrTable2   = "t_estimate_detail";
	var $_CtrTablePk2 = "id_estimate_detail";

	// コントロール機能（ログ用）
	var $_CtrLogName = "見積もり管理";

	// ファイル操作クラス
	var $_FN_file = null;

	//ファイル設定
	var $_ARR_FILE = null;

	// 画像設定
	var $_ARR_IMAGE = null;


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
		$this->_FN_file = new FN_file();


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
	// 関数名：setImageConfig
	// 引  数：$conf - 画像設定
	// 戻り値：なし
	// 内  容：画像設定の設定を行う。
	//-------------------------------------------------------
	function setImageConfig( $conf ) {
		$this->_ARR_IMAGE = $conf;
	}


	//-------------------------------------------------------
	// 関数名：convert
	// 引  数：$arrVal
	// 戻り値：データ変換
	// 内  容：データ変換を行う
	//-------------------------------------------------------
	function convert( $arrVal ) {

		// データ変換クラス宣言
		$objInputConvert = new FN_input_convert( $arrVal, "UTF-8" );

		// 変換エントリー
		//$objInputConvert->entryConvert( "url", array( "ENC_KANA" ), "a" );

		// 変換実行
		$objInputConvert->execConvertAll();

		// 戻り値
		return $objInputConvert->GetData();

	}


	//-------------------------------------------------------
	// 関数名：check
	// 引  数：$arrVal
	//       ：$mode - チェックモード（ "insert", "update" ）
	// 戻り値：エラーメッセージ
	// 内  容：データチェック
	//-------------------------------------------------------
	function check( &$arrVal, $mode ) {

		// チェッククラス宣言
		$objInputCheck = new FN_input_check( "UTF-8" );

		// チェックエントリー

		$objInputCheck->entryData( "お見積り日", "estimate_date", $arrVal["estimate_date"], array( "CHECK_DATE","CHECK_EMPTY" ), null, null );
		$objInputCheck->entryData( "会社名/学校名", "company", $arrVal["company"], array( "CHECK_MIN_MAX_LEN" ), 0, 255 );
		$objInputCheck->entryData( "名前（担当者名）", "name", $arrVal["name"], array( "CHECK_MIN_MAX_LEN" ), 0, 255 );

		if( ( strcmp( $mode, "update" ) == 0 ) ) {
			$objInputCheck->entryData( "ID", "all", $arrVal["id_estimate"], array( "CHECK_EMPTY", "CHECK_NUM" ), null, null );
		}
/*		// 見積内容
		if( !empty( $arrVal["estimate"]["title"] ) && is_array( $arrVal["estimate"]["title"] ) ){
			foreach( $arrVal["estimate"]["title"] as $key => $val ){
				$objInputCheck->entryData( "内容", "title", $val, array( "CHECK_EMPTY","CHECK_MIN_MAX_LEN" ), 0, 255 );
			}
		}
		if( !empty( $arrVal["estimate"]["number"] ) && is_array( $arrVal["estimate"]["number"] ) ){
			foreach( $arrVal["estimate"]["number"] as $key => $val ){
				$objInputCheck->entryData( "数量", "number", $val, array( "CHECK_EMPTY","CHECK_POINT_NUM" ), null, null );
			}
		}
		if( !empty( $arrVal["estimate"]["price"] ) && is_array( $arrVal["estimate"]["price"] ) ){
			foreach( $arrVal["estimate"]["price"] as $key => $val ){
				$objInputCheck->entryData( "単価", "price", $val, array( "CHECK_EMPTY","CHECK_POINT_NUM" ), null, null );
			}
		}
		if( !empty( $arrVal["estimate"]["total"] ) && is_array( $arrVal["estimate"]["total"] ) ){
			foreach( $arrVal["estimate"]["total"] as $key => $val ){
				$objInputCheck->entryData( "金額", "total", $val, array( "CHECK_EMPTY","CHECK_POINT_NUM" ), null, null );
			}
		}
*/
		// チェック実行
		$res["ng"] = $objInputCheck->execCheckAll();

		// 会社名と名前（担当者名）はどちらかは必ず入力
		if( (string)$arrVal["company"] == "" && (string)$arrVal["name"] == "" ){
			$res["ng"]["company"] .= "会社名と名前（担当者名）はどちらかは必ず入力してください。<br />";
		}

		// 電話番号と携帯番号はどちらかは必ず入力
		if( (string)$arrVal["tel"] == "" && (string)$arrVal["mobile"] == "" ){
			$res["ng"]["tel"] .= "電話番号と携帯番号はどちらかは必ず入力してください。<br />";
		}

		// 見積もり内容加工
		if( !empty( $arrVal["estimate"] ) && is_array( $arrVal["estimate"] ) ){
			foreach( $arrVal["estimate"] as $key => $val ){
				if( !empty( $val ) && is_array( $val ) ){
					foreach( $val as $key2 => $val2 ){
						if( $key2 != 0 && (string)$val2 != "" ){
							$arr_post["estimate"][$key2][$key] = $val2;
						}elseif( $key2 != 0 && (string)$val2 == "" ){
							$arr_post["estimate"][$key2][$key] = NULL;
						}
					}
				}
			}
		}
		$arrVal["estimate"] = $arr_post["estimate"];

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名：insert
	// 引  数：$arrVal - 登録データ（ 'カラム名' => '値' ）
	//       ：$arrSql - 登録データ（ 'カラム名' => 'SQL' ）
	// 戻り値：なし
	// 内  容：データ登録
	//-------------------------------------------------------
	function insert( $arrVal, $arrSql = null ) {

		// 登録データの作成
		$estimate = $arrVal["estimate"];
		unset( $arrVal["estimate"] );

		$arrVal = $this->_DBconn->arrayKeyMatchFecth( $arrVal, "/^[^\_]/" );
		$arrVal["entry_date"]  = date( "Y-m-d H:i:s" );
		$arrVal["update_date"] = date( "Y-m-d H:i:s" );

		$arrVal["date_start"] = date( "Y-m-d H:i:s", strtotime( $arrVal["date_start"] . " " . implode( ":", $arrVal["start_time"] ) . ":00" ) );
		$arrVal["date_end"] = date( "Y-m-d H:i:s", strtotime( $arrVal["date_end"] . " " . implode( ":", $arrVal["end_time"] ) . ":59" ) );

		unset( $arrVal["start_time"] );
		unset( $arrVal["end_time"]   );

		// 登録
		$res = $this->_DBconn->insert( $this->_CtrTable, $arrVal, $arrSql );
/*
		if( $res == false ){
			return false;
		}
*/
		$id_estimate = $this->_DBconn->Insert_ID();

		if( !empty( $estimate ) && is_array( $estimate ) ){
			foreach( $estimate as $key => $val ){
				$arrEstimate[$key] = array( "id_estimate" => $id_estimate,
											"title" => $val["title"],
											"number" => $val["number"],
											"unit" => $val["unit"],
											"price" => $val["price"],
											"tax" => $val["tax"],
											"price_tax" => $val["price_tax"],
											"total" => $val["total"],
											"entry_date" => $arrVal["entry_date"],
											"update_date" => $arrVal["update_date"]
										);
			}
		}else{
			return false;
		}

		if( !empty( $arrEstimate ) && is_array( $arrEstimate ) ){
			foreach( $arrEstimate as $key => $val ){
				$res = $this->_DBconn->insert( $this->_CtrTable2, $val, $arrSql );
			}
		}else{
			return false;
		}

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名：update
	// 引  数：$arrVal - 登録データ（ 'カラム名' => '値' ）
	//       ：$arrSql - 登録データ（ 'カラム名' => 'SQL' ）
	// 戻り値：なし
	// 内  容：データ更新
	//-------------------------------------------------------
	function update( $arrVal, $arrSql = null ) {

		// 登録データの作成
		$estimate = $arrVal["estimate"];
		unset( $arrVal["estimate"] );
		$arrVal = $this->_DBconn->arrayKeyMatchFecth( $arrVal, "/^[^\_]/" );
		$arrVal["update_date"] = date( "Y-m-d H:i:s" );

		$arrVal["date_start"] = date( "Y-m-d H:i:s", strtotime( $arrVal["date_start"] . " " . implode( ":", $arrVal["start_time"] ) . ":00" ) );
		$arrVal["date_end"] = date( "Y-m-d H:i:s", strtotime( $arrVal["date_end"] . " " . implode( ":", $arrVal["end_time"] ) . ":59" ) );

		unset( $arrVal["start_time"] );
		unset( $arrVal["end_time"]   );

		// 更新条件
		$where = $this->_CtrTablePk . " = " . $arrVal["id_estimate"];

		// 更新
		$res = $this->_DBconn->update( $this->_CtrTable, $arrVal, $arrSql, $where );

		if( $res == false ){
			return false;
		}
		$arrVal["entry_date"] = $arrVal["update_date"];
		if( !empty( $estimate ) && is_array( $estimate ) ){
			foreach( $estimate as $key => $val ){
				$arrEstimate[$key] = array( "id_estimate_detail" => $val["id_estimate_detail"],
											"id_estimate" => $arrVal["id_estimate"],
											"title" => $val["title"],
											"number" => $val["number"],
											"unit" => $val["unit"],
											"price" => $val["price"],
											"tax" => $val["tax"],
											"price_tax" => $val["price_tax"],
											"total" => $val["total"],
											"entry_date" => $arrVal["entry_date"],
											"update_date" => $arrVal["update_date"]
										);
			}
		}else{
			return false;
		}

		if( !empty( $arrEstimate ) && is_array( $arrEstimate ) ){
			// 削除
			$res = $this->_DBconn->delete( $this->_CtrTable2, $where );
			if( $res == false ){
				return false;
			}

			foreach( $arrEstimate as $key => $val ){
				// 登録
				$res = $this->_DBconn->insert( $this->_CtrTable2, $val, $arrSql );
			}
		}else{
			return false;
		}


		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名：delete
	// 引  数：$id - 削除するID
	// 戻り値：true - 正常, false - 異常
	// 内  容：データ削除
	//-------------------------------------------------------
	function delete( $id ) {

		// 初期化
		$res = false;

		//削除条件
		$where = $this->_CtrTablePk . " = " . $id;

		// 削除
		$res = $this->_DBconn->delete( $this->_CtrTable, $where );

		// 削除
		$res = $this->_DBconn->delete( $this->_CtrTable2, $where );

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名：changeDisplay
	// 引  数：$id  - ID
	//       ：$flg - フラグ
	// 戻り値：true - 正常, false - 異常
	// 内  容：表示切り替え
	//-------------------------------------------------------
	function changeDisplay( $id, $flg ) {

		// 初期化
		$res = false;

		// 切り替え処理
		$res = $this->_DBconn->update( $this->_CtrTable, array( "display_flg" => $flg ), null, $this->_CtrTablePk . " = " . $id );

		// 戻り値
		return $res;

	}



		//-------------------------------------------------------
		// 関数名: GetSearchList
		// 引  数: $search - 検索条件
		//       : $option - 取得条件
		// 戻り値: お知らせリスト
		// 内  容: お知らせ検索を行いデータを取得
		//-------------------------------------------------------
		function GetSearchList( $search, $option = null ) {

			// SQL配列
			$creation_kit = array(  "select" => "*",
									"from"   => $this->_CtrTable,
									"where"  => "1 ",
									"order"  => "date_start desc"
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

			// 戻り値
			return $res;

		}

	//-------------------------------------------------------
	// 関数名：GetIdRow
	// 引  数：$id - ID
	// 戻り値：1件分のデータ
	// 内  容：1件取得する
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

		$res["start_time"] = date( "H:i:s", strtotime( $res["date_start"] ) );
		$res["end_time"]   = date( "H:i:s", strtotime( $res["date_end"] ) );
		$res["date_start"] = date( "Y-m-d", strtotime( $res["date_start"] ) );
		$res["date_end"]   = date( "Y-m-d", strtotime( $res["date_end"] ) );



		if( $res == false ){
			return false;
		}

		// SQL配列
		$creation_kit2 = array( "select" => "*",
							   "from"   => $this->_CtrTable2,
							   "where"  => $this->_CtrTablePk . " = " . $id );


		// データ取得
		$res["estimate"] = $this->_DBconn->selectCtrl( $creation_kit2, array( "fetch" => _DB_FETCH_ALL ) );

		// 戻り値
		return $res;

	}

}

?>
