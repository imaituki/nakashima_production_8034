<?php /* Smarty version Smarty-3.1.18, created on 2019-12-09 14:30:58
         compiled from "/home/jwcc/8034/html/admin/contents/rental/template/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12031940255dd3b9fb6ee637-47164759%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6620ae812286d392a413fbd9c6a8e4fb1568d98a' => 
    array (
      0 => '/home/jwcc/8034/html/admin/contents/rental/template/form.tpl',
      1 => 1575869332,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12031940255dd3b9fb6ee637-47164759',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5dd3b9fb8b2da1_91289921',
  'variables' => 
  array (
    'message' => 0,
    'OptionRentalCategory' => 0,
    'arr_post' => 0,
    'key' => 0,
    'rental_parts' => 0,
    '_ARR_IMAGE' => 0,
    'imgKey' => 0,
    'file' => 0,
    'mode' => 0,
    '_IMAGEFULLPATH' => 0,
    '_CONTENTS_DIR' => 0,
    'preview_name' => 0,
    '_ADMIN' => 0,
    '_CONTENTS_ID' => 0,
    '_CONTENTS_CONF_PATH' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dd3b9fb8b2da1_91289921')) {function content_5dd3b9fb8b2da1_91289921($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/jwcc/8034/cgi-data/smarty/libs/plugins/function.html_options.php';
if (!is_callable('smarty_function_html_radios')) include '/home/jwcc/8034/cgi-data/smarty/libs/plugins/function.html_radios.php';
?><form id="inputForm" name="inputForm" class="form-horizontal" action="./preview.php?preview=1" method="post" enctype="multipart/form-data">
	<div class="ibox-content">
		<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['all'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['all'];?>
</p><?php }?>
		<div class="form-group required">
			<label class="col-sm-2 control-label">カテゴリ</label>
			<div class="col-sm-6">
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['id_rental_category'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['id_rental_category'];?>
</p><?php }?>

				<div class="radio m-r-xs inline">
					<select class="form-control" name="id_rental_category" id="id_rental_category">
						<option value="0">選択してください</option>
						<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['OptionRentalCategory']->value,'selected'=>$_smarty_tpl->tpl_vars['arr_post']->value['id_rental_category']),$_smarty_tpl);?>

					</select>
				</div>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group required">
			<label class="col-sm-2 control-label">商品名・名前</label>
			<div class="col-sm-6">
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['name'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['name'];?>
</p><?php }?>
				<input type="text" class="form-control" name="name" id="name" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['name'])===null||$tmp==='' ? '' : $tmp);?>
" />
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">ふりがな</label>
			<div class="col-sm-6">
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['ruby'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['ruby'];?>
</p><?php }?>
				<input type="text" class="form-control" name="ruby" id="ruby" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['ruby'])===null||$tmp==='' ? '' : $tmp);?>
" />
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group required">
			<label class="col-sm-2 control-label">単位</label>
			<div class="col-sm-3">
				<div class="input-group m-b">
					<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['unit'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['unit'];?>
</p><?php }?>
					<input type="text" class="form-control" name="unit" id="unit" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['unit'])===null||$tmp==='' ? '' : $tmp);?>
" />
				</div>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">説明 </label>
			<div class="col-sm-9">
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['comment'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['comment'];?>
</p><?php }?>
				<textarea name="comment" id="comment" rows="7" class="form-control ckeditor"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['comment'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">スペック（種類）追加</label>
			<div class="col-sm-9">
				<p class="mb10 x-large"> <a href="javascript:void(0);" class="add_rental_parts btn btn-primary btn-s"><i class="fa fa-r fa-plus-circle"></i>追加</a></p>
			</div>
		</div>
		<div id="item_container">
			<?php  $_smarty_tpl->tpl_vars["rental_parts"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["rental_parts"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arr_post']->value['detail']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["rental_parts"]->key => $_smarty_tpl->tpl_vars["rental_parts"]->value) {
$_smarty_tpl->tpl_vars["rental_parts"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["rental_parts"]->key;
?>
			<div class="rental_parts_loop" width="100%" data-sirial="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
				<div class="form-group">
					<label class="col-sm-2 control-label">スペック（種類）</label>
					<div class="col-sm-6">
						<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng'][(('detail_').($_smarty_tpl->tpl_vars['key']->value)).("_type")])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng'][(('detail_').($_smarty_tpl->tpl_vars['key']->value)).("_type")];?>
</p><?php }?>
						<input type="text" class="form-control rental_parts_type" name="detail[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][type]" id="rental_parts_type_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"  size="60" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rental_parts']->value['type'])===null||$tmp==='' ? '' : $tmp);?>
" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">説明</label>
					<div class="col-sm-9">
						<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng'][(('detail_').($_smarty_tpl->tpl_vars['key']->value)).("_comment")])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng'][(('detail_').($_smarty_tpl->tpl_vars['key']->value)).("_comment")];?>
</p><?php }?>
						<textarea name="detail[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][comment]" id="rental_parts_comment_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" rows="3" class="form-control text rental_parts_comment"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['rental_parts']->value['comment'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
					</div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">税抜き単価</label>
				    <div class="col-sm-3">
						<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng'][(('detail_').($_smarty_tpl->tpl_vars['key']->value)).("_price")])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng'][(('detail_').($_smarty_tpl->tpl_vars['key']->value)).("_price")];?>
</p><?php }?>
				        <div class="input-group m-b">
				            <span class="input-group-addon">￥</span>
				            <input type="number" class="form-control rental_parts_type" name="detail[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][price]" id="rental_parts_comment_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rental_parts']->value['price'])===null||$tmp==='' ? '' : $tmp);?>
" />
				        </div>
				    </div>
				</div>

				<?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['file']->_loop = false;
 $_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_ARR_IMAGE']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value) {
$_smarty_tpl->tpl_vars['file']->_loop = true;
 $_smarty_tpl->tpl_vars['key2']->value = $_smarty_tpl->tpl_vars['file']->key;
?>
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['imgKey']->value)===null||$tmp==='' ? '' : $tmp)==''||((($tmp = @$_smarty_tpl->tpl_vars['imgKey']->value)===null||$tmp==='' ? '' : $tmp)!=''&&$_smarty_tpl->tpl_vars['key']->value==(($tmp = @$_smarty_tpl->tpl_vars['imgKey']->value)===null||$tmp==='' ? '' : $tmp))) {?>
				<div class="form-group <?php if ((($tmp = @$_smarty_tpl->tpl_vars['file']->value['notnull'])===null||$tmp==='' ? '' : $tmp)==1) {?> required<?php }?>">
					<label class="col-sm-2 control-label"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value['column'])===null||$tmp==='' ? '' : $tmp);?>
</label>
					<div class="col-sm-6">
						<?php $_smarty_tpl->tpl_vars['preview_name'] = new Smarty_variable("_preview_image_".((string)$_smarty_tpl->tpl_vars['file']->value['name']), null, 0);?>
						<div class="mb5">
						<?php if ($_smarty_tpl->tpl_vars['mode']->value=='edit') {?>
							<?php if ((($tmp = @$_smarty_tpl->tpl_vars['rental_parts']->value[$_smarty_tpl->tpl_vars['file']->value['name']])===null||$tmp==='' ? '' : $tmp)==null) {?>
								<div class="load_image">
									NOT IMAGE<br />
								</div>
							<?php } else { ?>
								<div class="registered_image">
									<img src="<?php echo $_smarty_tpl->tpl_vars['_IMAGEFULLPATH']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_CONTENTS_DIR']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
/s_<?php echo $_smarty_tpl->tpl_vars['rental_parts']->value[$_smarty_tpl->tpl_vars['file']->value['name']];?>
" class="mb10" />
									<?php if ((($tmp = @$_smarty_tpl->tpl_vars['file']->value['notnull'])===null||$tmp==='' ? '' : $tmp)!=1) {?>
									<label><input type="checkbox" name="detail[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][_delete_image][<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rental_parts']->value[$_smarty_tpl->tpl_vars['file']->value['name']])===null||$tmp==='' ? '' : $tmp);?>
" /> この写真を削除する</label>
									<?php }?>
								</div>
							<?php }?>
							<input type="hidden" name="detail[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][_<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
_now]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rental_parts']->value[$_smarty_tpl->tpl_vars['file']->value['name']])===null||$tmp==='' ? '' : $tmp);?>
" />
						<?php }?>
						<?php if (isset($_smarty_tpl->tpl_vars['rental_parts']->value[$_smarty_tpl->tpl_vars['preview_name']->value])) {?>
							<?php if ((($tmp = @$_smarty_tpl->tpl_vars['rental_parts']->value[$_smarty_tpl->tpl_vars['preview_name']->value])===null||$tmp==='' ? '' : $tmp)!=null) {?>
								<div class="load_image">
									<img src="<?php echo $_smarty_tpl->tpl_vars['_ADMIN']->value['home'];?>
/common/php/imageDisp.php?dir=<?php echo $_smarty_tpl->tpl_vars['_CONTENTS_DIR']->value;?>
&image=<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
&arrimage=1" />
									<span class="c_red"> ※この画像はプレビュー用です。まだ保存されていません。</span>
									<input type="hidden" name="detail[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][_preview_<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
" />
									<input type="hidden" name="detail[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][_preview_image_<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['rental_parts']->value[$_smarty_tpl->tpl_vars['preview_name']->value];?>
" />
									<input type="hidden" name="detail[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][_preview_image_dir]" value="<?php echo $_smarty_tpl->tpl_vars['rental_parts']->value['_preview_image_dir'];?>
" />
								</div>
							<?php }?>
						<?php }?>
						</div>
						<input type="file" class="file2 rental_parts_<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
" name="detail[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
]" id="rental_parts_<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" size="50" />
						<input type="hidden" name="_detail_key" class="rental_parts_detail_key" value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" />
					</div>
				</div>
				<?php }?>
				<?php } ?>

				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-9 pos_ar">
						<a href="javascript:void(0);" class="btn btn-danger detail-trash"><i class="icon-trash"></i> 削除</a>
					</div>
				</div>
				<div class="hr-line-dashed mb50"></div>
			</div>
			<?php } ?>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">表示／非表示</label>
			<div class="col-sm-6">
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['display_flg'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['display_flg'];?>
</p><?php }?>
				<div class="radio m-r-xs inline">
					<?php echo smarty_function_html_radios(array('name'=>"display_flg",'values'=>1,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['display_flg'])===null||$tmp==='' ? "1" : $tmp),'output'=>"する"),$_smarty_tpl);?>
&nbsp;&nbsp;
					<?php echo smarty_function_html_radios(array('name'=>"display_flg",'values'=>0,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['display_flg'])===null||$tmp==='' ? "1" : $tmp),'output'=>"しない"),$_smarty_tpl);?>

				</div>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="button clearfix mb20">
			<?php if ($_smarty_tpl->tpl_vars['mode']->value=='edit') {?><input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['_CONTENTS_ID']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value[$_smarty_tpl->tpl_vars['_CONTENTS_ID']->value];?>
" /><?php }?>
			<input type="hidden" name="_contents_dir" id="_contents_dir" value="<?php echo $_smarty_tpl->tpl_vars['_CONTENTS_DIR']->value;?>
" />
			<input type="hidden" name="_contents_conf_path" id="_contents_conf_path" value="<?php echo $_smarty_tpl->tpl_vars['_CONTENTS_CONF_PATH']->value;?>
" />
			<div class="form-group">
				<div style="text-align:right;">
					<input type="button" class="btn btn-primary" value="この内容で登録" id="<?php if ($_smarty_tpl->tpl_vars['mode']->value=='edit') {?>updateBtn<?php } else { ?>insertBtn<?php }?>" />
				</div>
			</div>
		</div>
	</div>
</form>

<script type="text/javascript">
$(function(){
	// プレビューボタンを押すとプレビューが別窓で表示される
	$('input[id="preview"]').on("click", function() {
		window.open("about:blank", "preview");
		document.inputForm.target = "preview";
		document.inputForm.submit();
	});
});
</script>

<?php }} ?>
