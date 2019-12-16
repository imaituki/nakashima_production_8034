<?php /* Smarty version Smarty-3.1.18, created on 2019-12-05 11:58:55
         compiled from "/home/jwcc/8034/html/admin/contents/estimate/template/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15575904595dd48bc4b9ebb5-34791492%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55222055670781a0bb5ce29bc1e47db8731d9880' => 
    array (
      0 => '/home/jwcc/8034/html/admin/contents/estimate/template/form.tpl',
      1 => 1575514727,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15575904595dd48bc4b9ebb5-34791492',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5dd48bc4d02d72_34077839',
  'variables' => 
  array (
    'mode' => 0,
    'message' => 0,
    'arr_post' => 0,
    'est' => 0,
    'key' => 0,
    '_CONTENTS_DIR' => 0,
    '_CONTENTS_CONF_PATH' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dd48bc4d02d72_34077839')) {function content_5dd48bc4d02d72_34077839($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_select_ken')) include '/home/jwcc/8034/cgi-data/smarty/libs/plugins/function.html_select_ken.php';
if (!is_callable('smarty_function_html_select_time')) include '/home/jwcc/8034/cgi-data/smarty/libs/plugins/function.html_select_time.php';
?>			<form class="form-horizontal" action="./<?php if ($_smarty_tpl->tpl_vars['mode']->value=="edit") {?>update<?php } else { ?>insert<?php }?>.php" method="post" enctype="multipart/form-data">
				<div class="ibox-content">
					<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['all'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['all'];?>
</p><?php }?>
					<div class="form-group required">
						<label class="col-sm-2 control-label">お見積もり日</label>
						<div class="col-sm-5">
							<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['estimate_date'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['estimate_date'];?>
</p><?php }?>
							<div class="input-daterange input-group" id="datepicker">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								<input type="text" class="input-sm form-control datepicker" name="estimate_date" id="estimate_date" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['estimate_date'])===null||$tmp==='' ? '' : $tmp);?>
" readonly>
							</div>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">イベント名</label>
						<div class="col-sm-6">
							<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['event'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['event'];?>
</p><?php }?>
							<input type="text" class="form-control" name="event" id="event" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['event'])===null||$tmp==='' ? '' : $tmp);?>
" />
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">会場（開催場所）</label>
						<div class="col-sm-6">
							<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['venue'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['venue'];?>
</p><?php }?>
							<input type="text" class="form-control" name="venue" id="venue" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['venue'])===null||$tmp==='' ? '' : $tmp);?>
" />
						</div>
					</div>
					<div class="form-group">
    					<label class="col-sm-2 control-label">郵便番号</label>
				        <div class="col-sm-6">
				            <?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['zip'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['zip'];?>
</p><?php }?>
				            <input type="text" style="width:200px;" class="form-control input-s" name="zip" id="zip" size="8" maxlength="8" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['zip'])===null||$tmp==='' ? '' : $tmp);?>
" />
				            <a href="javascript:AjaxZip3.zip2addr('zip','','prefecture','address');">郵便番号から住所を表示する</a>
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="col-sm-2 control-label">都道府県</label>
				        <div class="col-sm-6">
				            <?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['prefecture'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['prefecture'];?>
</p><?php }?>
				            <style>.w200{width:200px;}</style>
				            <?php echo smarty_function_html_select_ken(array('name'=>"prefecture",'class'=>"form-control inline input-s w200",'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['prefecture'])===null||$tmp==='' ? "0" : $tmp)),$_smarty_tpl);?>

				        </div>
				    </div>
				    <div class="form-group">
				        <label class="col-sm-2 control-label">住所</label>
				        <div class="col-sm-6">
				            <?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['address'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['address'];?>
</p><?php }?>
				            <input type="text" class="form-control" name="address" id="address"  size="60" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['address'])===null||$tmp==='' ? '' : $tmp);?>
" />
				        </div>
				    </div>
				    <div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-md-2 control-label">貸出期間（開催日）</label>
						<div class="col-md-10">
							<div class="col-md-3">
								<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['date_start'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['date_start'];?>
</p><?php }?>
								<div class="input-daterange input-group" style="    margin: 0 auto;">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" class="input-sm form-control dtp datepicker" name="date_start" id="date_start" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['date_start'])===null||$tmp==='' ? '' : $tmp);?>
" readonly>
								</div>
							</div>
							<div class="col-md-2" style="display:flex;">
								<?php echo smarty_function_html_select_time(array('field_array'=>'start_time','prefix'=>'','field_separator'=>"\n:\n",'display_seconds'=>false,'minute_interval'=>10,'time'=>(($tmp = @strtotime($_smarty_tpl->tpl_vars['arr_post']->value['start_time']))===null||$tmp==='' ? time() : $tmp)),$_smarty_tpl);?>

							</div>
							<div class="col-md-1"><p class="pos_ac">～</p></div>
							<div class="col-md-3">
								<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['date_end'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['date_end'];?>
</p><?php }?>
								<div class="input-daterange input-group" style="    margin: 0 auto;">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" class="input-sm form-control dtp datepicker" name="date_end" id="date_end" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['date_end'])===null||$tmp==='' ? '' : $tmp);?>
" readonly>
								</div>
							</div>
							<div class="col-md-2" style="display:flex;">
								<?php echo smarty_function_html_select_time(array('field_array'=>'end_time','prefix'=>'','field_separator'=>"\n:\n",'display_seconds'=>false,'minute_interval'=>10,'time'=>(($tmp = @strtotime($_smarty_tpl->tpl_vars['arr_post']->value['end_time']))===null||$tmp==='' ? time() : $tmp)),$_smarty_tpl);?>

							</div>
						</div>
					</div>
					
					<div class="hr-line-dashed"></div>
					   <style>.required label.control-label._label2:before { background:unset; color: #1AB394; border: 1px solid #1AB394;}</style>
					<div class="form-group required">
						<label class="col-sm-2 control-label _label2">会社名/学校名</label>
						<div class="col-sm-6">
							<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['company'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['company'];?>
</p><?php }?>
							<input type="text" class="form-control" name="company" id="company" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['company'])===null||$tmp==='' ? '' : $tmp);?>
" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">部署/クラス名など</label>
						<div class="col-sm-6">
							<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['post'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['post'];?>
</p><?php }?>
							<input type="text" class="form-control" name="post" id="post" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['post'])===null||$tmp==='' ? '' : $tmp);?>
" />
						</div>
					</div>
					<div class="form-group required">
						<label class="col-sm-2 control-label _label2">名前（担当者名）</label>
						<div class="col-sm-6">
							<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['name'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['name'];?>
</p><?php }?>
							<input type="text" class="form-control" name="name" id="name" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['name'])===null||$tmp==='' ? '' : $tmp);?>
" />
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group required">
				      <label class="col-sm-2 control-label _label2">電話番号</label>
				      <div class="col-sm-3">
				        <?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['tel'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['tel'];?>
</p><?php }?>
				        <input type="tel" class="form-control" name="tel" id="tel" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['tel'])===null||$tmp==='' ? '' : $tmp);?>
" />
				      </div>
				    </div>
					<div class="form-group">
					  <label class="col-sm-2 control-label">FAX番号</label>
					  <div class="col-sm-3">
						<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['fax'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['fax'];?>
</p><?php }?>
						<input type="fax" class="form-control" name="fax" id="fax" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['fax'])===null||$tmp==='' ? '' : $tmp);?>
" />
					  </div>
					</div>
					<div class="form-group required">
					  <label class="col-sm-2 control-label _label2">携帯番号</label>
					  <div class="col-sm-3">
						<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['mobile'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['mobile'];?>
</p><?php }?>
						<input type="mobile" class="form-control" name="mobile" id="mobile" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['mobile'])===null||$tmp==='' ? '' : $tmp);?>
" />
					  </div>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">見積もり<br /> <a onclick="javascript:AddRecord();">＋項目を追加する</a></label>
						<div class="col-sm-9">
							<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['title'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['title'];?>
</p><?php }?>
							<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['number'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['number'];?>
</p><?php }?>
							<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['price'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['price'];?>
</p><?php }?>
							<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['total'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['total'];?>
</p><?php }?>
							<table class="tbl_1" style="width:100%;">
								<thead>
									<tr>
										<th>内容</th>
										<th style="width:50px">数量</th>
										<th style="width:50px">単位</th>
										<th style="width:100px">単価(税抜)</th>
										<th style="width:100px">消費税</th>
										<th style="width:100px">単価合計</th>
										<th style="width:100px">合計金額(税込)</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr id="base_record" style="display:none;">
										<!-- 内容-->
										<td><input type="text" class="form-control" name="estimate[title][]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['est']->value['title'])===null||$tmp==='' ? '' : $tmp);?>
" list="titles" /></td>
										<!-- 数量-->
										<td style="width:50px"><input type="text" class="form-control" name="estimate[number][]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['est']->value['number'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
										<!-- 単位-->
										<td style="width:50px"><input type="text" class="form-control" name="estimate[unit][]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['est']->value['unit'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
										<!-- 単価（税抜）-->
										<td style="width:100px"><input type="text" class="form-control" name="estimate[price][]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['est']->value['price'])===null||$tmp==='' ? '' : $tmp);?>
" list="prices" style="width:calc(100% - 1.5em);display:inline-block;"  />円</td>
										<!-- 消費税-->
										<td style="width:100px"><input type="text" class="form-control" name="estimate[tax][]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['est']->value['tax'])===null||$tmp==='' ? '' : $tmp);?>
" list="prices" style="width:calc(100% - 1.5em);display:inline-block;"  />円</td>
										<!-- 単価合計-->
										<td style="width:100px"><input type="text" class="form-control" name="estimate[price_tax][]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['est']->value['price_tax'])===null||$tmp==='' ? '' : $tmp);?>
" list="prices" style="width:calc(100% - 1.5em);display:inline-block;"  />円</td>
										<!-- 合計金額(税込)-->
										<td style="width:100px"><input type="text" class="form-control" name="estimate[total][]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['est']->value['total'])===null||$tmp==='' ? '' : $tmp);?>
" style="width:calc(100% - 1.5em); display:inline-block;" />円
											<input type="hidden" name="estimate[id_estimate_detail][]" value="<?php echo $_smarty_tpl->tpl_vars['est']->value['id_estimate_detail'];?>
" />
											</td>
										<td><a onclick="javascript:DeleteRecord(0);">✖</a></td>
									</tr>
									<?php  $_smarty_tpl->tpl_vars["est"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["est"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arr_post']->value['estimate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["est"]->key => $_smarty_tpl->tpl_vars["est"]->value) {
$_smarty_tpl->tpl_vars["est"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["est"]->key;
?>
									<tr id="record_<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
" class="each_record">
										<td><input type="text" class="form-control" name="estimate[title][]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['est']->value['title'])===null||$tmp==='' ? '' : $tmp);?>
" list="titles" /></td>
										<td style="width:50px"><input type="text" class="form-control" name="estimate[number][]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['est']->value['number'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
										<td style="width:50px"><input type="text" class="form-control" name="estimate[unit][]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['est']->value['unit'])===null||$tmp==='' ? '' : $tmp);?>
" /></td>
										<td style="width:100px"><input type="text" class="form-control" name="estimate[price][]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['est']->value['price'])===null||$tmp==='' ? '' : $tmp);?>
" list="prices" style="width:calc(100% - 1.5em);display:inline-block;"  />円</td>
										<td style="width:100px"><input type="text" class="form-control" name="estimate[tax][]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['est']->value['tax'])===null||$tmp==='' ? '' : $tmp);?>
" list="prices" style="width:calc(100% - 1.5em);display:inline-block;"  />円</td>
										<td style="width:100px"><input type="text" class="form-control" name="estimate[price_tax][]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['est']->value['price_tax'])===null||$tmp==='' ? '' : $tmp);?>
" list="prices" style="width:calc(100% - 1.5em);display:inline-block;"  />円</td>
										<td style="width:100px"><input type="text" class="form-control" name="estimate[total][]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['est']->value['total'])===null||$tmp==='' ? '' : $tmp);?>
" style="width:calc(100% - 1.5em);display:inline-block;" />円
											<input type="hidden" name="estimate[id_estimate_detail][]" value="<?php echo $_smarty_tpl->tpl_vars['est']->value['id_estimate_detail'];?>
" />
											</td>
										<td><a onclick="javascript:DeleteRecord(<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
);">✖</a></td>
									</tr>
									<?php } ?>
									<tr><th colspan="6">総合計(税込)</th><td class="sum"></td></tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">備考</label>
						<div class="col-sm-9">
							<?php if ((($tmp = @$_smarty_tpl->tpl_vars['message']->value['ng']['comment'])===null||$tmp==='' ? '' : $tmp)!=null) {?><p class="error"><?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['comment'];?>
</p><?php }?>
							<textarea name="comment" id="comment" rows="3" class="form-control"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['comment'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					<?php if ($_smarty_tpl->tpl_vars['mode']->value=='edit') {?><input type="hidden" name="id_estimate" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['id_estimate'];?>
" /><?php }?>
					<input type="hidden" name="_contents_dir" id="_contents_dir" value="<?php echo $_smarty_tpl->tpl_vars['_CONTENTS_DIR']->value;?>
" />
					<input type="hidden" name="_contents_conf_path" id="_contents_conf_path" value="<?php echo $_smarty_tpl->tpl_vars['_CONTENTS_CONF_PATH']->value;?>
" />
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2 pos_ar">
							<button class="btn btn-primary"  type="submit">この内容で登録</button>
						</div>
					</div>
				</div>
			</form>
<?php }} ?>
