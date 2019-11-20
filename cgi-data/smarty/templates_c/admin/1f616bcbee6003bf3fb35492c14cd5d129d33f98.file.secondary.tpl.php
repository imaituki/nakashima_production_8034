<?php /* Smarty version Smarty-3.1.18, created on 2019-11-20 21:54:41
         compiled from "/home/jwcc/8034/html/admin/common/inc/secondary.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15481986555cd28031c19381-62276716%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f616bcbee6003bf3fb35492c14cd5d129d33f98' => 
    array (
      0 => '/home/jwcc/8034/html/admin/common/inc/secondary.tpl',
      1 => 1574245341,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15481986555cd28031c19381-62276716',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5cd28031c356c1_15640836',
  'variables' => 
  array (
    'manage' => 0,
    '_ADMIN' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cd28031c356c1_15640836')) {function content_5cd28031c356c1_15640836($_smarty_tpl) {?><nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu" style="padding-bottom:30px;">
			<li class="nav-header">
				
			</li>
			<li<?php if ($_smarty_tpl->tpl_vars['manage']->value=='') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_ADMIN']->value['home'];?>
/"><i class="fa fa-home"></i><span class="nav-label">HOME</span></a></li>
			<li<?php if ($_smarty_tpl->tpl_vars['manage']->value=="information") {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_ADMIN']->value['home'];?>
/contents/information/"><i class="fa fa-info-circle"></i><span class="nav-label">お知らせ管理</span></a></li>

			<li<?php if ($_smarty_tpl->tpl_vars['action']->value=="rental") {?> class="active"<?php }?>>
				<a href="#"><i class="fa fa-linux" aria-hidden="true"></i><span class="nav-label">レンタル品管理</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level collapse">
					<li <?php if ($_smarty_tpl->tpl_vars['manage']->value=='rental') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_ADMIN']->value['home'];?>
/contents/rental/">レンタル品一覧</a></li>
					<li <?php if ($_smarty_tpl->tpl_vars['manage']->value=='rental_category') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_ADMIN']->value['home'];?>
/contents/rental_category/">レンタル品カテゴリ一覧</a></li>
				</ul>
			</li>

			<li<?php if ($_smarty_tpl->tpl_vars['manage']->value=="estimate") {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_ADMIN']->value['home'];?>
/contents/estimate/"><i class="fa fa-file-o" aria-hidden="true"></i></i><span class="nav-label">見積り管理</span></a></li>
			<li<?php if ($_smarty_tpl->tpl_vars['manage']->value=="work") {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_ADMIN']->value['home'];?>
/contents/work/"><i class="fa fa-users" aria-hidden="true"></i><span class="nav-label">アルバイト応募管理</span></a></li>
			<li<?php if ($_smarty_tpl->tpl_vars['manage']->value=="contact") {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_ADMIN']->value['home'];?>
/contents/contact/"><i class="fa fa-question-circle" aria-hidden="true"></i><span class="nav-label">お問い合わせ管理</span></a></li>
			<li<?php if ($_smarty_tpl->tpl_vars['manage']->value=="siteconf") {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_ADMIN']->value['home'];?>
/contents/siteconf/"><i class="fa fa-gear"></i><span class="nav-label">サイト設定</span></a></li>
		</ul>
	</div>
</nav>
<?php }} ?>
