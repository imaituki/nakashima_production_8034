<?php
//----------------------------------------------------------------------------
// 作成日: 2016/11/01
// 作成者: 鈴木
// 内  容: レンタル品操作クラス
//----------------------------------------------------------------------------

//-------------------------------------------------------
//  クラス
//-------------------------------------------------------
class AD_rental {

	//-------------------------------------------------------
	//  変数宣言
	//-------------------------------------------------------
	// DB接続
	var $_DBconn = null;

	// 主テーブル
	var $_CtrTable   = "mst_rental";
	var $_CtrTablePk = "id_rental";
	var $_CtrTable2   = "t_rental_parts";
	var $_CtrTablePk2 = "id_rental_parts";

	// コントロール機能（ログ用）
	var $_CtrLogName = "レンタル品";

	// ファイル操作クラス
	var $_FN_file = null;

	// 画像設定
	var $_ARR_IMAGE = null;

	// ファイル設定
	var $_ARR_FILE = null;


	//-------------------------------------------------------
	// 関数名: __construct
	// 引  数: $dbconn: DB接続オブジェクト
	// 戻り値: なし
	// 内  容: コンストラクタ
	//-------------------------------------------------------
	function __construct( $dbconn, $arrImg = NULL, $arrFile = NULL ) {

		// クラス宣言
		if( !empty( $dbconn ) ) {
			$this->_DBconn  = $dbconn;
		} else {
			$this->_DBconn  = new DB_manage( _DNS );
		}
		$this->_FN_file = new FN_file();

		// 設定情報
		$this->_ARR_IMAGE = $arrImg;
		$this->_ARR_FILE  = $arrFile;

	}


	//-------------------------------------------------------
	// 関数名: __destruct
	// 引  数: なし
	// 戻り値: なし
	// 内  容: デストラクタ
	//-------------------------------------------------------
	function __destruct() {
	}


	//-------------------------------------------------------
	// 関数名: setImageConfig
	// 引  数: $conf - 画像設定
	// 戻り値: なし
	// 内  容: 画像設定の設定を行う。
	//-------------------------------------------------------
	function setImageConfig( $conf ) {
		$this->_ARR_IMAGE = $conf;
	}


	//-------------------------------------------------------
	// 関数名: setFileConfig
	// 引  数: $conf - ファイル設定
	// 戻り値: なし
	// 内  容: ファイル設定の設定を行う。
	//-------------------------------------------------------
	function setFileConfig( $conf ) {
		$this->_ARR_FILE = $conf;
	}


	//-------------------------------------------------------
	// 関数名: convert
	// 引  数: $arrVal
	// 戻り値: データ変換
	// 内  容: データ変換を行う
	//-------------------------------------------------------
	function convert( $arrVal ) {

		// データ変換クラス宣言
		$objInputConvert = new FN_input_convert( $arrVal, "UTF-8" );

		// 変換エントリー
		$objInputConvert->entryConvert( "price", array( "ENC_KANA" ), "a" );

		// 変換実行
		$objInputConvert->execConvertAll();

		// 戻り値
		return $objInputConvert->GetData();

	}


	//-------------------------------------------------------
	// 関数名: check
	// 引  数: $arrVal
	//       : $mode - チェックモード（ "insert", "update" ）
	// 戻り値: エラーメッセージ
	// 内  容: データチェック
	//-------------------------------------------------------
	function check( $arrVal, $mode ) {

		// チェッククラス宣言
		$objInputCheck = new FN_input_check( "UTF-8" );

		// チェックエントリー
		$objInputCheck->entryData( "カテゴリー", "id_rental_category", $arrVal["id_rental_category"][0], array( "CHECK_EMPTY_ZERO", "CHECK_MIN_MAX_LEN" ), 0, 255 );
		$objInputCheck->entryData( "商品名・名前", "name", $arrVal["name"], array( "CHECK_EMPTY", "CHECK_MIN_MAX_LEN" ), 0, 255 );
		$objInputCheck->entryData( "単位", "unit", $arrVal["unit"], array( "CHECK_EMPTY", "CHECK_MIN_MAX_LEN" ), 0, 255 );

		$objInputCheck->entryData( "表示／非表示", "display_flg", $arrVal["display_flg"], array( "CHECK_EMPTY", "CHECK_MIN_MAX_NUM" ), 0, 1 );

		if( (strcmp($mode, "insert") == 0) ) {
			// 画像チェック
			if( is_array($this->_ARR_IMAGE) ) {
				foreach( $this->_ARR_IMAGE as $key => $val ) {
					if( $val["notnull"] == 1 ) {
						$objInputCheck->entryData( $val["column"], $val["name"], $arrVal["_preview_image_" . $val["name"]], array( "CHECK_EMPTY" ), null, null );
					}
				}
			}
			// 添付チェック
			if( is_array($this->_ARR_FILE) ) {
				foreach( $this->_ARR_FILE as $key => $val ) {
					if( $val["notnull"] == 1 ) {
						$objInputCheck->entryFile( $val["column"], $val["name"], $_FILES[$val["name"]]["name"], array( "CHECK_EMPTY", "CHECK_EXT" ), null, array("pdf") );
					}
				}
			}
		}

		if( is_array( $arrVal["detail"] ) ){
			// 入力確認
			foreach ( $arrVal["detail"][0] as $key => $val ) {
				if( !empty( $val ) ){
					$check_flg = 1;
					break;
				}
			}
			if( $check_flg == 1 ){
				// detail チェック
				foreach ($arrVal["detail"] as $key => $value) {
					// チェックエントリー
					$objInputCheck->entryData( "スペック（種類）"        , "detail_".$key."_type"  , $value["type"]  , array( "CHECK_EMPTY"), null, null );
					$objInputCheck->entryData( "税抜き単価"        , "detail_".$key."_price"     , $value["price"]    , array( "CHECK_EMPTY"), 0, 255 );
				}
			}

		}


		// チェックエントリー（UPDATE時）
		if( ( strcmp( $mode, "update" ) == 0 ) ) {
			$objInputCheck->entryData( "レンタル品ID", "all", $arrVal["id_rental"], array( "CHECK_EMPTY", "CHECK_NUM" ), null, null );
		}

		// チェック実行
		$res["ng"] = $objInputCheck->execCheckAll();

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名: insert
	// 引  数: $arrVal - 登録データ（ 'カラム名' => '値' ）
	//       : $arrSql - 登録データ（ 'カラム名' => 'SQL' ）
	// 戻り値: なし
	// 内  容: レンタル品データ登録
	//-------------------------------------------------------
	function insert( $arrVal, $arrSql = null ) {

		// アップ処理
		// $ImageInfo = $this->_FN_file->copyImage( $_FILES, $this->_ARR_IMAGE, $arrVal );

		// $FileInfo  = $this->_FN_file->upFile( $_FILES, $this->_ARR_FILE, $arrVal );

		// 登録データの作成
		$arrVal = $this->_DBconn->arrayKeyMatchFecth( $arrVal, "/^[^\_]/" );
		$arrSql["display_num"] = "( SELECT IFNULL( max_num + 1, 1 ) FROM ( SELECT MAX( display_num ) AS max_num FROM " . $this->_CtrTable . " ) AS maxnm ) ";
		$arrVal["entry_date"]  = date( "Y-m-d H:i:s" );
		$arrVal["update_date"] = date( "Y-m-d H:i:s" );

		// 登録
		$res = $this->_DBconn->insert( $this->_CtrTable, $arrVal, $arrSql );

		// 戻り値
		return $res;

	}

	//-------------------------------------------------------
	// 関数名：insert_detail
	// 引  数：$arrVal - 登録データ（ 'カラム名' => '値' ）
	//       ：$arrSql - 登録データ（ 'カラム名' => 'SQL' ）
	// 戻り値：なし
	// 内  容：スペックデータ登録
	//-------------------------------------------------------
	function insert_detail( $arrVal, $arrSql = null ) {

		if( !empty( $arrVal["_delete_image"] ) ){
			// 写真削除
			$this->_FN_file->delImage( $this->_ARR_IMAGE2, $arrVal["_delete_image"], $arrVal );
		}

		// アップ処理
		$ImageInfo = $this->_FN_file->copyImage( $_FILES, $this->_ARR_IMAGE, $arrVal );

		if( !empty( $this->_ARR_IMAGE ) && is_array( $this->_ARR_IMAGE ) ){
			foreach( $this->_ARR_IMAGE as $key => $val ){
				if( empty( $arrVal[$val["name"]] ) && !empty( $arrVal["_" . $val["name"] . "_now"] ) && empty( $arrVal["_delete_image"][$val["name"]] ) ){
					$arrVal[$val["name"]] = $arrVal["_" . $val["name"] . "_now"];
				}
			}
		}

		// 登録データの作成
		$arrVal = $this->_DBconn->arrayKeyMatchFecth( $arrVal, "/^[^\_]/" );



		$arrVal["entry_date"]  = date( "Y-m-d H:i:s" );
		$arrVal["update_date"] = date( "Y-m-d H:i:s" );

		// 登録
		$res = $this->_DBconn->insert( $this->_CtrTable2, $arrVal, $arrSql );

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名: update
	// 引  数: $arrVal - 登録データ（ 'カラム名' => '値' ）
	//       : $arrSql - 登録データ（ 'カラム名' => 'SQL' ）
	// 戻り値: なし
	// 内  容: レンタル品データ更新
	//-------------------------------------------------------
	function update( $arrVal, $arrSql = null ) {

		// 写真削除
		// $this->_FN_file->delImage( $this->_ARR_IMAGE, $arrVal["_delete_image"], $arrVal );
		// アップ処理
		// $ImageInfo = $this->_FN_file->copyImage( $_FILES, $this->_ARR_IMAGE, $arrVal );


		// 登録データの作成
		$arrVal = $this->_DBconn->arrayKeyMatchFecth( $arrVal, "/^[^\_]/" );
		$arrVal["update_date"] = date( "Y-m-d H:i:s" );

		// 更新条件
		$where = $this->_CtrTablePk . " = " . $arrVal["id_rental"];
		// 更新
		$res = $this->_DBconn->update( $this->_CtrTable, $arrVal, $arrSql, $where );

		// 戻り値
		return $res;

	}

	//-------------------------------------------------------
	// 関数名：update_detail
	// 引  数：$arrVal - 登録データ（ 'カラム名' => '値' ）
	//       ：$arrSql - 登録データ（ 'カラム名' => 'SQL' ）
	// 戻り値：なし
	// 内  容：スペックデータ登録
	//-------------------------------------------------------
	function update_detail( $arrVal, $arrSql = null ) {

		// 写真削除
		$this->_FN_file->delImage( $this->_ARR_IMAGE, $arrVal["_delete_image"], $arrVal );
		// アップ処理
		$ImageInfo = $this->_FN_file->copyImage( $_FILES, $this->_ARR_IMAGE, $arrVal );

		// 登録データの作成
		$arrVal = $this->_DBconn->arrayKeyMatchFecth( $arrVal, "/^[^\_]/" );

		$arrVal["update_date"] = date( "Y-m-d H:i:s" );

		// 登録
		$res = $this->_DBconn->update( $this->_CtrTable2, $arrVal, $arrSql );

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名: delete
	// 引  数: $id - 削除するレンタル品ID
	// 戻り値: true - 正常, false - 異常
	// 内  容: レンタル品データ削除
	//-------------------------------------------------------
	function delete( $id ) {

		// 初期化
		$res = false;

		// 画像設定ループ
		if( !empty($this->_ARR_IMAGE) && is_array($this->_ARR_IMAGE) ){
			foreach( $this->_ARR_IMAGE as $key => $val ) {
				$select[] = $val["name"];
			}

			// SQL配列
			$creation_kit  = array( "select" => implode( ",", $select ),
									"from"   => $this->_CtrTable,
									"where"  => $this->_CtrTablePk . " = " . $id );

			// データ取得
			$tmp = $this->_DBconn->selectCtrl( $creation_kit, array( "fetch" => _DB_FETCH ) );

			// 画像削除
			$this->_FN_file->delImage( $this->_ARR_IMAGE, $tmp );

		}
		// ファイル設定ループ
		if( !empty($this->_ARR_FILE) && is_array($this->_ARR_FILE) ){

			foreach( $this->_ARR_FILE as $key => $val ) {
				$select[] = $val["name"];
			}

			// SQL配列
			$creation_kit  = array( "select" => implode( ",", $select ),
									"from"   => $this->_CtrTable,
									"where"  => $this->_CtrTablePk . " = " . $id );

			// データ取得
			$tmp = $this->_DBconn->selectCtrl( $creation_kit, array( "fetch" => _DB_FETCH ) );

			// 画像削除
			$this->_FN_file->delFile( $this->_ARR_FILE, $tmp );

		}

		// 更新
		$res = $this->_DBconn->delete( $this->_CtrTable, $this->_CtrTablePk . " = " . $id );

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名: changeDisplay
	// 引  数: $id  - ID
	//       : $flg - フラグ
	// 戻り値: true - 正常, false - 異常
	// 内  容: 表示切り替え
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
	// 関数名：sort
	// 引  数：$sortIds - ソート順 ID
	//       ：$sortKey - 並び替えのフィールド名
	// 戻り値：true - 正常, false - 異常
	// 内  容：並び替え
	//-------------------------------------------------------
	function sort( $sortIds, $sortKey ) {

		// 初期化
		$res = false;

		// データチェック
		if( !empty( $sortIds ) ) {

			// 変数セット
			$this->_DBconn->_ADODB->query("set @a = 0;");

			// ソート
			$res = $this->_DBconn->update( $this->_CtrTable, null, array( "display_num" => "( @a := @a + 1 )" ), $this->_CtrTablePk . " IN( " . $sortIds . " ) ORDER BY FIELD( " . $sortKey . ", " . $sortIds . " ) " );

		}

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名: GetSearchList
	// 引  数: $search - 検索条件
	//       : $option - 取得条件
	// 戻り値: レンタル品リスト
	// 内  容: レンタル品検索を行いデータを取得
	//-------------------------------------------------------
	function GetSearchList( $search, $option = null ) {

		// SQL配列
		$creation_kit = array(  "select" => "*",
								"from"   => $this->_CtrTable,
								"where"  => "1 ",
								"order"  => "display_num ASC"
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

		if( !empty($search["search_category"]) ){
			$creation_kit["where"] .= " AND id_rental_category = ". $search["search_category"]. " ";
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
	// 関数名：GetSearchDetail
	// 引  数：$search - 検索条件
	// 戻り値：リスト
	// 内  容：検索を行いデータを取得
	//-------------------------------------------------------
	function GetSearchDetail( $search ) {

		// SQL配列
		$creation_kit = array(  "select" => "*",
								"from"   => $this->_CtrTable2,
								"where"  => "id_rental = " . $search["search_id_rental"] . " ",
								"order"  => "id_rental ASC"
							);

		// データ取得
		$res = $this->_DBconn->selectCtrl( $creation_kit, array( "fetch" => _DB_FETCH_ALL ) );

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名: GetIdRow
	// 引  数: $id - レンタル品ID
	// 戻り値: レンタル品
	// 内  容: レンタル品を1件取得する
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

		// 戻り値
		return $res;

	}

/*
	//-------------------------------------------------------
	// 関数名: GetOption
	// 引  数: なし
	// 戻り値: レンタル品カテゴリーオプション
	// 内  容: レンタル品カテゴリーをオプション化して取得
	//-------------------------------------------------------
	function GetOption() {

		// SQL配列
		$creation_kit = array(  "select" => "id_rental_category, title",
								"from"   => "t_id_rental_category",
								"where"  => "delete_flg = 0 AND display_flg = 1",
								"order"  => "display_num ASC"
							);
		// データ取得
		$arr_option = $this->_DBconn->selectCtrl( $creation_kit, array("fetch" => _DB_FETCH_ALL) );

		// オプション用に成形
		if( !empty($arr_option) ){
			foreach( $arr_option as $val ){
				$res[$val["id_rental_category"]] = $val["title"];
			}
		}

		// 戻り値
		return $res;

	}
*/
}
?>
