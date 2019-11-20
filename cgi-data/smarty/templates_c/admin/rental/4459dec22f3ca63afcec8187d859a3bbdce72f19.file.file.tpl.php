<?php /* Smarty version Smarty-3.1.18, created on 2019-11-19 18:46:35
         compiled from "/home/jwcc/8034/html/admin/common/inc/file.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13831055715dd3b9fb9bee50-22855779%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4459dec22f3ca63afcec8187d859a3bbdce72f19' => 
    array (
      0 => '/home/jwcc/8034/html/admin/common/inc/file.tpl',
      1 => 1574149231,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13831055715dd3b9fb9bee50-22855779',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_ARR_FILE' => 0,
    'file' => 0,
    'message' => 0,
    'mode' => 0,
    'arr_post' => 0,
    '_UPLOADFULLPATH' => 0,
    'dir' => 0,
    'fnkey' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5dd3b9fba865d0_66584736',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dd3b9fba865d0_66584736')) {function content_5dd3b9fba865d0_66584736($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars["file"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["file"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_ARR_FILE']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["file"]->key => $_smarty_tpl->tpl_vars["file"]->value) {
$_smarty_tpl->tpl_vars["file"]->_loop = true;
?>
<div class="form-group<?php if ((($tmp = @$_smarty_tpl->tpl_vars['file']->value['notnull'])===null||$tmp==='' ? '' : $tmp)==1) {?> required<?php }?>">
	<label class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['file']->value['column'];?>
</label>
	<div class="col-sm-6">
		<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng'][$_smarty_tpl->tpl_vars['file']->value['name']])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng'][$_smarty_tpl->tpl_vars['file']->value['name']];?>
</p><?php }?>
		<div class=" mb5">
		<?php if ($_smarty_tpl->tpl_vars['mode']->value=='edit') {?>
			<?php $_smarty_tpl->tpl_vars["fnkey"] = new Smarty_variable(($_smarty_tpl->tpl_vars['file']->value['name']).("_name"), null, 0);?>
			<?php if ($_smarty_tpl->tpl_vars['arr_post']->value[$_smarty_tpl->tpl_vars['file']->value['name']]==null) {?>
				NOT FILE<br />
			<?php } else { ?>
				<i class="icon-doc-text"></i> <a href="<?php echo $_smarty_tpl->tpl_vars['_UPLOADFULLPATH']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
/<?php echo $_smarty_tpl->tpl_vars['arr_post']->value[$_smarty_tpl->tpl_vars['file']->value['name']];?>
" target="_blank"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value[$_smarty_tpl->tpl_vars['fnkey']->value])===null||$tmp==='' ? "添付ファイル" : $tmp);?>
</a>
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['file']->value['notnull'])===null||$tmp==='' ? '' : $tmp)!=1) {?>
				<input type="checkbox" name="_delete_file[<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value[$_smarty_tpl->tpl_vars['file']->value['name']])===null||$tmp==='' ? '' : $tmp);?>
" /> このファイルを削除する<br />
				<?php }?>
			<?php }?>
			<input type="hidden" name="_<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
_name_now" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value[$_smarty_tpl->tpl_vars['fnkey']->value])===null||$tmp==='' ? '' : $tmp);?>
" />
			<input type="hidden" name="_<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
_now" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value[$_smarty_tpl->tpl_vars['file']->value['name']])===null||$tmp==='' ? '' : $tmp);?>
" />
		<?php }?>
		</div>
		<input type="file" name="<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
" size="50" />
	</div>
</div>
<div class="hr-line-dashed"></div>
<?php if ($_smarty_tpl->tpl_vars['file']->value['name2']!=null) {?>
<div class="form-group<?php if ((($tmp = @$_smarty_tpl->tpl_vars['file']->value['notnull2'])===null||$tmp==='' ? '' : $tmp)==1) {?> required<?php }?>">
	<label class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['file']->value['column2'];?>
</label>
	<div class="col-sm-6">
		<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng'][$_smarty_tpl->tpl_vars['file']->value['name2']])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng'][$_smarty_tpl->tpl_vars['file']->value['name2']];?>
</p><?php }?>
		<input type="text" class="form-control" name="<?php echo $_smarty_tpl->tpl_vars['file']->value['name2'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['file']->value['name2'];?>
" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value[$_smarty_tpl->tpl_vars['file']->value['name2']])===null||$tmp==='' ? '' : $tmp);?>
" maxlength="255" />
	</div>
</div>
<div class="hr-line-dashed"></div>
<?php }?>
<?php } ?><?php }} ?>
