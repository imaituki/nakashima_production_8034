<?php /* Smarty version Smarty-3.1.18, created on 2019-05-08 16:57:51
         compiled from "/home/jwcc/8034/html/admin/contents/recruit/template/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12037283905cd28bffdb4038-44313962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93ecf7b075a6c8b25e83f97828b74aa3bdd95fc5' => 
    array (
      0 => '/home/jwcc/8034/html/admin/contents/recruit/template/list.tpl',
      1 => 1557302260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12037283905cd28bffdb4038-44313962',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template_pagenavi' => 0,
    'arr_data' => 0,
    '_CONTENTS_ID' => 0,
    'data' => 0,
    'arr_post' => 0,
    'OptionRecruit' => 0,
    '_CONTENTS_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5cd28bffe289e6_65771066',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cd28bffe289e6_65771066')) {function content_5cd28bffe289e6_65771066($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/jwcc/8034/cgi-data/smarty/libs/plugins/modifier.date_format.php';
?>
<script type="text/javascript">
sortableInit();
</script>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_pagenavi']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<table class="footable table table-stripped toggle-arrow-tiny tbl_1" id="sortable-table" data-page-size="15">
	<thead>
		<tr>
			<th></th>
			<th>掲載期間</th>
			<th>募集種別</th>
			<th>採用予定</th>
			<th>勤務地</th>
			<th class="showhide">表示</th>
			<th class="delete">削除</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th></th>
			<th width="100">掲載期間</th>
			<th width="100">募集種別</th>
			<th>採用予定</th>
			<th>勤務地</th>
			<th class="showhide" width="60">表示</th>
			<th class="delete" width="60">削除</th>
		</tr>
	</tfoot>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arr_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
		<tr id="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['_CONTENTS_ID']->value];?>
"<?php if ($_smarty_tpl->tpl_vars['data']->value['display_flg']==0||($_smarty_tpl->tpl_vars['data']->value['display_indefinite']==0&&(strtotime($_smarty_tpl->tpl_vars['data']->value['display_start'])>time()||strtotime($_smarty_tpl->tpl_vars['data']->value['display_end'])<time()))) {?> class="gray-bg"<?php }?>>
			<td class="move_i"><?php if ((($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['mode'])===null||$tmp==='' ? '' : $tmp)=="search") {?>☓<?php } else { ?><i class="fa fa-sort"><span></span></i><?php }?></td>
			<td>
				<?php if ($_smarty_tpl->tpl_vars['data']->value['display_indefinite']==0) {?>
					<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['display_start'],"%Y/%m/%d");?>
<br />
					<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['display_end'],"%Y/%m/%d");?>

				<?php } else { ?>
					無期限
				<?php }?>
			</td>
			<td><?php echo $_smarty_tpl->tpl_vars['OptionRecruit']->value[$_smarty_tpl->tpl_vars['data']->value['category']];?>
</td>
			<td><a href="./edit.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['_CONTENTS_ID']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['plan'];?>
</a></td>
			<td><?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['location']);?>
</td>
			<td class="pos_ac">
				<div class="switch">
					<div class="onoffswitch">
						<input type="checkbox" value="1" class="onoffswitch-checkbox btn_display" id="display<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['_CONTENTS_ID']->value];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['_CONTENTS_ID']->value];?>
"<?php if ($_smarty_tpl->tpl_vars['data']->value['display_flg']==1) {?> checked<?php }?>>
						<label class="onoffswitch-label" for="display<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['_CONTENTS_ID']->value];?>
">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch"></span>
						</label>
					</div>
				</div>
			</td>
			<td class="pos_ac">
				<a href="javascript:void(0)" class="btn btn-danger btn_delete" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['_CONTENTS_ID']->value];?>
">削除</a>
			</td>
		</tr>
		<?php }
if (!$_smarty_tpl->tpl_vars['data']->_loop) {
?>
		<tr>
			<td colspan="6"><?php echo $_smarty_tpl->tpl_vars['_CONTENTS_NAME']->value;?>
は見つかりません。</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_pagenavi']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
