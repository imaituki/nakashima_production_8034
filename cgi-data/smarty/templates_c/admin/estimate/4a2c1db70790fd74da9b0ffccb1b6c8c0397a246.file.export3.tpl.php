<?php /* Smarty version Smarty-3.1.18, created on 2019-12-09 13:10:05
         compiled from "../template/export3.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19430650175dedc91d0659f4-93966939%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a2c1db70790fd74da9b0ffccb1b6c8c0397a246' => 
    array (
      0 => '../template/export3.tpl',
      1 => 1575864583,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19430650175dedc91d0659f4-93966939',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'estimate' => 0,
    'sum' => 0,
    'sum_free' => 0,
    'est' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5dedc91d1959c7_98049742',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dedc91d1959c7_98049742')) {function content_5dedc91d1959c7_98049742($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/jwcc/8034/cgi-data/smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_html_select_ken')) include '/home/jwcc/8034/cgi-data/smarty/libs/plugins/function.html_select_ken.php';
?><!doctype html>
<html>
<head>
<style>
*{ -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -o-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box; margin:0; padding:0; font-size:28px; }
html{ margin:0; padding:0; }
body{ margin:0; padding:0; }
p{ margin:0; padding:0; }
table{ margin:0; padding:0; }
h1{ margin:0; padding:0; font-size:52px; }
h2{ margin:0; padding:0; font-size:42px; }
h3{ margin:0; padding:0; font-size:32px; line-height:90%; }
th { background-color:#000000; color:#ffffff; vertical-align:middle; }
td { vertical-align:middle; }
.bor1 { border:0.5px solid #000000; }
</style>
</head>
<body>
<br><br>
<table width="100%" cellpadding="0">
	<tr>
		<td width="300" style="text-align:right"><h1>ご請求書</h1>
			&nbsp;<br /></td>
		<td rowspan="3" width="200" style="text-align:right"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['estimate']->value['estimate_date'],"%Y年%m月%d日");?>
<br />
			&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
			<span style="text-align:center;"><span style="font-weight:bold; font-size:40px;">㈲中島プロダクション</span><br>
			〒710－0024 倉敷市亀山1004-3<br>
			代表取締役：中嶋 直樹<br>
			TEL　086-429-2111<br>
			FAX　086-428-4515<br>
			Mail　eventnpro@mx91.tiki.ne.jp/<br>
			URL　http://ww91.tiki.ne.jp/~eventnpro/<br></span>
			<img src="../image/logo2.jpg" width="50">
			&nbsp;<br /></td>
	</tr>
	<tr>
		<td><h2><?php if ($_smarty_tpl->tpl_vars['estimate']->value['company']) {?>
					<?php echo (($tmp = @$_smarty_tpl->tpl_vars['estimate']->value['company'])===null||$tmp==='' ? '' : $tmp);?>

						<?php if ($_smarty_tpl->tpl_vars['estimate']->value['name']) {?><br><?php } else { ?>御中<?php }?>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['estimate']->value['name']) {?>
					<?php if ($_smarty_tpl->tpl_vars['estimate']->value['post']) {?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['estimate']->value['post'])===null||$tmp==='' ? '' : $tmp);?>
 <?php }?>
					<?php echo (($tmp = @$_smarty_tpl->tpl_vars['estimate']->value['name'])===null||$tmp==='' ? '' : $tmp);?>
 様
				<?php }?></h2>
		&nbsp;</td>
	</tr>
	<tr>
		<td>いつもお世話になります。<br>下記の件につきましてご請求申し上げます。<br>
		&nbsp;<br>
		<?php if ($_smarty_tpl->tpl_vars['estimate']->value['event']) {?>【<?php echo $_smarty_tpl->tpl_vars['estimate']->value['event'];?>
】<?php }?><br>
		<?php if ($_smarty_tpl->tpl_vars['estimate']->value['venue']||$_smarty_tpl->tpl_vars['estimate']->value['zip']||$_smarty_tpl->tpl_vars['estimate']->value['prefecture']||$_smarty_tpl->tpl_vars['estimate']->value['address']) {?>
			開催場所・<?php if ($_smarty_tpl->tpl_vars['estimate']->value['venue']) {?><?php echo $_smarty_tpl->tpl_vars['estimate']->value['venue'];?>
<br />　　　　　<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['estimate']->value['zip']||$_smarty_tpl->tpl_vars['estimate']->value['prefecture']||$_smarty_tpl->tpl_vars['estimate']->value['address']) {?>
				<?php if ($_smarty_tpl->tpl_vars['estimate']->value['venue']) {?>(<?php }?><?php if ($_smarty_tpl->tpl_vars['estimate']->value['zip']) {?>〒<?php echo $_smarty_tpl->tpl_vars['estimate']->value['zip'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['estimate']->value['prefecture']) {?> <?php echo smarty_function_html_select_ken(array('selected'=>$_smarty_tpl->tpl_vars['estimate']->value['prefecture'],'pre'=>1),$_smarty_tpl);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['estimate']->value['address']) {?> <?php echo $_smarty_tpl->tpl_vars['estimate']->value['address'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['estimate']->value['venue']) {?>)<?php }?>
				<?php }?>
				<br />
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['estimate']->value['date_start']||$_smarty_tpl->tpl_vars['estimate']->value['date_end']) {?>
				貸出期間・
			<?php if ($_smarty_tpl->tpl_vars['estimate']->value['date_start']==$_smarty_tpl->tpl_vars['estimate']->value['date_end']) {?>
				<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['estimate']->value['date_start'],"%Y年%m月%d日");?>
　<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['estimate']->value['start_time'],"%H:%M");?>
～<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['estimate']->value['end_time'],"%H:%M");?>

			<?php } else { ?>
				<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['estimate']->value['date_start'],"%Y年%m月%d日");?>
<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['estimate']->value['start_time'],"%H:%M");?>
 ～ <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['estimate']->value['date_end'],"%Y年%m月%d日");?>
<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['estimate']->value['end_time'],"%H:%M");?>

			<?php }?>
		<?php }?>
		&nbsp;<br />&nbsp;<br />
		<span style="font-weight:bold; font-size:40px;">御見積金額（税込）<br>
			　￥<?php if ($_smarty_tpl->tpl_vars['sum']->value) {?><?php echo number_format((($tmp = @$_smarty_tpl->tpl_vars['sum']->value)===null||$tmp==='' ? 0 : $tmp));?>
円<?php }?></span>&nbsp;(税抜価格 ￥<?php if ($_smarty_tpl->tpl_vars['sum_free']->value) {?><?php echo number_format((($tmp = @$_smarty_tpl->tpl_vars['sum_free']->value)===null||$tmp==='' ? 0 : $tmp));?>
円<?php }?>)&nbsp;<br />
		</td>
	</tr>
</table>
<table width="100%" cellpadding="5">
	<tr>
		<th class="bor1" width="150">内容</th>
		<th class="bor1" width="50">数量</th>
		<th class="bor1" width="50">単位</th>
		<th class="bor1" width="50">単価</th>
		<th class="bor1" width="50">消費税</th>
		<th class="bor1" width="80">単価合計</th>
		<th class="bor1" width="80">金額</th>
	</tr>
<?php  $_smarty_tpl->tpl_vars["est"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["est"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['estimate']->value['estimate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["est"]->key => $_smarty_tpl->tpl_vars["est"]->value) {
$_smarty_tpl->tpl_vars["est"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["est"]->key;
?>
	<tr>
		<td class="bor1"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['est']->value['title'])===null||$tmp==='' ? '' : $tmp);?>
</td>
		<td class="bor1" style="text-align:center"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['est']->value['number'])===null||$tmp==='' ? '' : $tmp);?>
</td>
		<td class="bor1" style="text-align:right"><?php if ($_smarty_tpl->tpl_vars['est']->value['unit']) {?><?php echo $_smarty_tpl->tpl_vars['est']->value['unit'];?>
<?php }?></td>
		<td class="bor1" style="text-align:right"><?php if ($_smarty_tpl->tpl_vars['est']->value['price']) {?><?php echo number_format((($tmp = @$_smarty_tpl->tpl_vars['est']->value['price'])===null||$tmp==='' ? '' : $tmp));?>
円<?php }?></td>
		<td class="bor1" style="text-align:right"><?php if ($_smarty_tpl->tpl_vars['est']->value['tax']) {?><?php echo number_format((($tmp = @$_smarty_tpl->tpl_vars['est']->value['tax'])===null||$tmp==='' ? '' : $tmp));?>
円<?php }?></td>
		<td class="bor1" style="text-align:right"><?php if ($_smarty_tpl->tpl_vars['est']->value['price_tax']) {?><?php echo number_format((($tmp = @$_smarty_tpl->tpl_vars['est']->value['price_tax'])===null||$tmp==='' ? '' : $tmp));?>
円<?php }?></td>
		<td class="bor1" style="text-align:right"><?php if ($_smarty_tpl->tpl_vars['est']->value['total']) {?><?php echo number_format((($tmp = @$_smarty_tpl->tpl_vars['est']->value['total'])===null||$tmp==='' ? '' : $tmp));?>
円<?php }?></td>
	</tr>
<?php } ?>
	<tr>
		<th class="bor1" colspan="6">合計</th>
		<td class="bor1" style="text-align:right"><?php if ($_smarty_tpl->tpl_vars['sum']->value) {?><?php echo number_format((($tmp = @$_smarty_tpl->tpl_vars['sum']->value)===null||$tmp==='' ? 0 : $tmp));?>
円<?php }?></td>
	</tr>
</table>
<?php if ($_smarty_tpl->tpl_vars['estimate']->value['comment']) {?>
&nbsp;<br>
<table width="100%" cellpadding="5s">
	<tr>
		<td class="bor1">【備考】<br>
			<?php echo $_smarty_tpl->tpl_vars['estimate']->value['comment'];?>
</td>
	</tr>
</table>
<?php }?>
</body>
</html>
<?php }} ?>
