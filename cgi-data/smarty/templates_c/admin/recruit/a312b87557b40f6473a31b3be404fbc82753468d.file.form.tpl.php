<?php /* Smarty version Smarty-3.1.18, created on 2019-05-08 16:58:00
         compiled from "/home/jwcc/8034/html/admin/contents/recruit/template/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15183246665cd28c08f14c01-70334478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a312b87557b40f6473a31b3be404fbc82753468d' => 
    array (
      0 => '/home/jwcc/8034/html/admin/contents/recruit/template/form.tpl',
      1 => 1557302260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15183246665cd28c08f14c01-70334478',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
    'OptionRecruit' => 0,
    'arr_post' => 0,
    'mode' => 0,
    '_CONTENTS_ID' => 0,
    '_CONTENTS_DIR' => 0,
    '_CONTENTS_CONF_PATH' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5cd28c09144f99_05572123',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cd28c09144f99_05572123')) {function content_5cd28c09144f99_05572123($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_radios')) include '/home/jwcc/8034/cgi-data/smarty/libs/plugins/function.html_radios.php';
?><form id="inputForm" name="inputForm" class="form-horizontal" action="./preview.php?preview=1" method="post" enctype="multipart/form-data">
	<div class="ibox-content">
		<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['all'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['all'];?>
</p><?php }?>
		<div class="form-group required">
			<label class="col-sm-2 control-label">募集種別</label>
			<div class="col-sm-6">
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['category'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['category'];?>
</p><?php }?>
				<div class="radio m-r-xs inline">
					<?php echo smarty_function_html_radios(array('name'=>"category",'options'=>$_smarty_tpl->tpl_vars['OptionRecruit']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['category'])===null||$tmp==='' ? 1 : $tmp)),$_smarty_tpl);?>

				</div>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group required">
			<label class="col-sm-2 control-label">採用予定</label>
			<div class="col-sm-6">
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['plan'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['plan'];?>
</p><?php }?>
				<input type="text" class="form-control" name="plan" id="plan" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['plan'])===null||$tmp==='' ? '' : $tmp);?>
" />
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">諸手当</label>
			<div class="col-sm-9">
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['allowance'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['allowance'];?>
</p><?php }?>
				<textarea name="allowance" id="allowance" rows="4" class="form-control"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['allowance'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">社会保険</label>
			<div class="col-sm-9">
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['insurance'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['insurance'];?>
</p><?php }?>
				<textarea name="insurance" id="insurance" rows="4" class="form-control"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['insurance'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">福利厚生</label>
			<div class="col-sm-9">
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['welfare'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['welfare'];?>
</p><?php }?>
				<textarea name="welfare" id="welfare" rows="4" class="form-control"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['welfare'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">昇給</label>
			<div class="col-sm-9">
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['salary'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['salary'];?>
</p><?php }?>
				<textarea name="salary" id="salary" rows="4" class="form-control"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['salary'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">賞与</label>
			<div class="col-sm-9">
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['bonus'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['bonus'];?>
</p><?php }?>
				<textarea name="bonus" id="bonus" rows="4" class="form-control"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['bonus'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">勤務地</label>
			<div class="col-sm-9">
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['location'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['location'];?>
</p><?php }?>
				<textarea name="location" id="location" rows="4" class="form-control"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['location'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">勤務時間</label>
			<div class="col-sm-9">
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['time'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['time'];?>
</p><?php }?>
				<textarea name="time" id="time" rows="4" class="form-control"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['time'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">休日・休暇</label>
			<div class="col-sm-9">
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['holiday'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['holiday'];?>
</p><?php }?>
				<textarea name="holiday" id="holiday" rows="4" class="form-control"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['holiday'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">応募方法</label>
			<div class="col-sm-9">
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['method'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['method'];?>
</p><?php }?>
				<textarea name="method" id="method" rows="4" class="form-control"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['method'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">掲載期間 </label>
			<div class="col-sm-4">
				<div class="radio m-r-xs inline mb15">
					<?php echo smarty_function_html_radios(array('name'=>"display_indefinite",'values'=>1,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['display_indefinite'])===null||$tmp==='' ? "1" : $tmp),'output'=>"設定しない"),$_smarty_tpl);?>
&nbsp;&nbsp;
					<?php echo smarty_function_html_radios(array('name'=>"display_indefinite",'values'=>0,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['display_indefinite'])===null||$tmp==='' ? "1" : $tmp),'output'=>"設定する"),$_smarty_tpl);?>

				</div>
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['display_start'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['display_start'];?>
</p><?php }?>
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['display_end'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['display_end'];?>
</p><?php }?>
				<div class="input-daterange input-group" id="datepicker">
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					<input type="text" class="input-sm form-control datepicker" name="display_start" id="display_start" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['display_start'])===null||$tmp==='' ? '' : $tmp);?>
" readonly>
					<span class="input-group-addon">～</span>
					<input type="text" class="input-sm form-control datepicker" name="display_end" id="display_end"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['display_end'])===null||$tmp==='' ? '' : $tmp);?>
" readonly>
				</div>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
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
				<div class="col-sm-offset-1 fl_left">
					<input type="button" id="preview" class="btn btn-info" value="プレビュー" />
				</div>
				<div class="fl_right">
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
