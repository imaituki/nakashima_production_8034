			<form class="form-horizontal" action="./{if $mode=="edit"}update{else}insert{/if}.php" method="post" enctype="multipart/form-data">
				<div class="ibox-content">
					{if $message.ng.all|default:"" != NULL}<p class="error">{$message.ng.all}</p>{/if}
					<div class="form-group required">
						<label class="col-sm-2 control-label">お見積もり日</label>
						<div class="col-sm-5">
							{if $message.ng.estimate_date|default:"" != NULL}<p class="error">{$message.ng.estimate_date}</p>{/if}
							<div class="input-daterange input-group" id="datepicker">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								<input type="text" class="input-sm form-control datepicker" name="estimate_date" id="estimate_date" value="{$arr_post.estimate_date|default:""}" readonly>
							</div>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">イベント名</label>
						<div class="col-sm-6">
							{if $message.ng.event|default:"" != NULL}<p class="error">{$message.ng.event}</p>{/if}
							<input type="text" class="form-control" name="event" id="event" value="{$arr_post.event|default:""}" />
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">会場（開催場所）</label>
						<div class="col-sm-6">
							{if $message.ng.venue|default:"" != NULL}<p class="error">{$message.ng.venue}</p>{/if}
							<input type="text" class="form-control" name="venue" id="venue" value="{$arr_post.venue|default:""}" />
						</div>
					</div>
					<div class="form-group">
    					<label class="col-sm-2 control-label">郵便番号</label>
				        <div class="col-sm-6">
				            {if $message.ng.zip|default:"" != NULL}<p class="error">{$message.ng.zip}</p>{/if}
				            <input type="text" style="width:200px;" class="form-control input-s" name="zip" id="zip" size="8" maxlength="8" value="{$arr_post.zip|default:""}" />
				            <a href="javascript:AjaxZip3.zip2addr('zip','','prefecture','address');">郵便番号から住所を表示する</a>
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="col-sm-2 control-label">都道府県</label>
				        <div class="col-sm-6">
				            {if $message.ng.prefecture|default:"" != NULL}<p class="error">{$message.ng.prefecture}</p>{/if}
				            {literal}<style>.w200{width:200px;}</style>{/literal}
				            {html_select_ken name="prefecture" class="form-control inline input-s w200" selected=$arr_post.prefecture|default:"0"}
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="col-sm-2 control-label">住所</label>
				        <div class="col-sm-6">
				            {if $message.ng.address|default:"" != NULL}<p class="error">{$message.ng.address}</p>{/if}
				            <input type="text" class="form-control" name="address" id="address"  size="60" value="{$arr_post.address|default:""}" />
				        </div>
				    </div>
				    <div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-md-2 control-label">貸出期間（開催日）</label>
						<div class="col-md-10">
							<div class="col-md-3">
								{if $message.ng.date_start|default:"" != NULL}<p class="error">{$message.ng.date_start}</p>{/if}
								<div class="input-daterange input-group" style="    margin: 0 auto;">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" class="input-sm form-control dtp datepicker" name="date_start" id="date_start" value="{$arr_post.date_start|default:''}" readonly>
								</div>
							</div>
							<div class="col-md-2" style="display:flex;">
								{html_select_time field_array=start_time prefix="" field_separator="\n:\n" display_seconds=false minute_interval=10 time=$arr_post.start_time|strtotime|default:$smarty.now}
							</div>
							<div class="col-md-1"><p class="pos_ac">～</p></div>
							<div class="col-md-3">
								{if $message.ng.date_end|default:"" != NULL}<p class="error">{$message.ng.date_end}</p>{/if}
								<div class="input-daterange input-group" style="    margin: 0 auto;">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" class="input-sm form-control dtp datepicker" name="date_end" id="date_end" value="{$arr_post.date_end|default:''}" readonly>
								</div>
							</div>
							<div class="col-md-2" style="display:flex;">
								{html_select_time field_array=end_time prefix="" field_separator="\n:\n" display_seconds=false minute_interval=10 time=$arr_post.end_time|strtotime|default:$smarty.now}
							</div>
						</div>
					</div>
					{*<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">貸出時間</label>
						<div class="col-sm-6">
							{if $message.ng.start_time|default:"" != NULL}<p class="error">{$message.ng.start_time}</p>{/if}
						{if $message.ng.end_time|default:"" != NULL}<p class="error">{$message.ng.end_time}</p>{/if}
						{html_select_time field_array=start_time prefix="" field_separator="\n:\n" display_seconds=false minute_interval=10 time=$arr_post.start_time|strtotime|default:$smarty.now}&nbsp;～{html_select_time field_array=end_time prefix="" field_separator="\n:\n" display_seconds=false minute_interval=10 time=$arr_post.end_time|strtotime|default:$smarty.now}
						</div>
					</div>*}
					<div class="hr-line-dashed"></div>
					   {literal}<style>.required label.control-label._label2:before { background:unset; color: #1AB394; border: 1px solid #1AB394;}</style>{/literal}
					<div class="form-group required">
						<label class="col-sm-2 control-label _label2">会社名/学校名</label>
						<div class="col-sm-6">
							{if $message.ng.company|default:"" != NULL}<p class="error">{$message.ng.company}</p>{/if}
							<input type="text" class="form-control" name="company" id="company" value="{$arr_post.company|default:""}" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">部署/クラス名など</label>
						<div class="col-sm-6">
							{if $message.ng.post|default:"" != NULL}<p class="error">{$message.ng.post}</p>{/if}
							<input type="text" class="form-control" name="post" id="post" value="{$arr_post.post|default:""}" />
						</div>
					</div>
					<div class="form-group required">
						<label class="col-sm-2 control-label _label2">名前（担当者名）</label>
						<div class="col-sm-6">
							{if $message.ng.name|default:"" != NULL}<p class="error">{$message.ng.name}</p>{/if}
							<input type="text" class="form-control" name="name" id="name" value="{$arr_post.name|default:""}" />
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group required">
				      <label class="col-sm-2 control-label _label2">電話番号</label>
				      <div class="col-sm-3">
				        {if $message.ng.tel|default:"" != NULL}<p class="error">{$message.ng.tel}</p>{/if}
				        <input type="tel" class="form-control" name="tel" id="tel" value="{$arr_post.tel|default:""}" />
				      </div>
				    </div>
					<div class="form-group">
					  <label class="col-sm-2 control-label">FAX番号</label>
					  <div class="col-sm-3">
						{if $message.ng.fax|default:"" != NULL}<p class="error">{$message.ng.fax}</p>{/if}
						<input type="fax" class="form-control" name="fax" id="fax" value="{$arr_post.fax|default:""}" />
					  </div>
					</div>
					<div class="form-group required">
					  <label class="col-sm-2 control-label _label2">携帯番号</label>
					  <div class="col-sm-3">
						{if $message.ng.mobile|default:"" != NULL}<p class="error">{$message.ng.mobile}</p>{/if}
						<input type="mobile" class="form-control" name="mobile" id="mobile" value="{$arr_post.mobile|default:""}" />
					  </div>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">見積もり<br /> <a onclick="javascript:AddRecord();">＋項目を追加する</a></label>
						<div class="col-sm-9">
							{if $message.ng.title|default:"" != NULL}<p class="error">{$message.ng.title}</p>{/if}
							{if $message.ng.number|default:"" != NULL}<p class="error">{$message.ng.number}</p>{/if}
							{if $message.ng.price|default:"" != NULL}<p class="error">{$message.ng.price}</p>{/if}
							{if $message.ng.total|default:"" != NULL}<p class="error">{$message.ng.total}</p>{/if}
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
										<td><input type="text" class="form-control" name="estimate[title][]" value="{$est.title|default:''}" list="titles" /></td>
										<!-- 数量-->
										<td style="width:50px"><input type="text" class="form-control" name="estimate[number][]" value="{$est.number|default:''}" /></td>
										<!-- 単位-->
										<td style="width:50px"><input type="text" class="form-control" name="estimate[unit][]" value="{$est.unit|default:''}" /></td>
										<!-- 単価（税抜）-->
										<td style="width:100px"><input type="text" class="form-control" name="estimate[price][]" value="{$est.price|default:''}" list="prices" style="width:calc(100% - 1.5em);display:inline-block;"  />円</td>
										<!-- 消費税-->
										<td style="width:100px"><input type="text" class="form-control" name="estimate[tax][]" value="{$est.tax|default:''}" list="prices" style="width:calc(100% - 1.5em);display:inline-block;"  />円</td>
										<!-- 単価合計-->
										<td style="width:100px"><input type="text" class="form-control" name="estimate[price_tax][]" value="{$est.price_tax|default:''}" list="prices" style="width:calc(100% - 1.5em);display:inline-block;"  />円</td>
										<!-- 合計金額(税込)-->
										<td style="width:100px"><input type="text" class="form-control" name="estimate[total][]" value="{$est.total|default:''}" style="width:calc(100% - 1.5em); display:inline-block;" />円
											<input type="hidden" name="estimate[id_estimate_detail][]" value="{$est.id_estimate_detail}" />
											</td>
										<td><a onclick="javascript:DeleteRecord(0);">✖</a></td>
									</tr>
									{foreach from=$arr_post.estimate item="est" key="key"}
									<tr id="record_{$key+1}" class="each_record">
										<td><input type="text" class="form-control" name="estimate[title][]" value="{$est.title|default:''}" list="titles" /></td>
										<td style="width:50px"><input type="text" class="form-control" name="estimate[number][]" value="{$est.number|default:''}" /></td>
										<td style="width:50px"><input type="text" class="form-control" name="estimate[unit][]" value="{$est.unit|default:''}" /></td>
										<td style="width:100px"><input type="text" class="form-control" name="estimate[price][]" value="{$est.price|default:''}" list="prices" style="width:calc(100% - 1.5em);display:inline-block;"  />円</td>
										<td style="width:100px"><input type="text" class="form-control" name="estimate[tax][]" value="{$est.tax|default:''}" list="prices" style="width:calc(100% - 1.5em);display:inline-block;"  />円</td>
										<td style="width:100px"><input type="text" class="form-control" name="estimate[price_tax][]" value="{$est.price_tax|default:''}" list="prices" style="width:calc(100% - 1.5em);display:inline-block;"  />円</td>
										<td style="width:100px"><input type="text" class="form-control" name="estimate[total][]" value="{$est.total|default:''}" style="width:calc(100% - 1.5em);display:inline-block;" />円
											<input type="hidden" name="estimate[id_estimate_detail][]" value="{$est.id_estimate_detail}" />
											</td>
										<td><a onclick="javascript:DeleteRecord({$key+1});">✖</a></td>
									</tr>
									{/foreach}
									<tr><th colspan="6">総合計(税込)</th><td class="sum"></td></tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">備考</label>
						<div class="col-sm-9">
							{if $message.ng.comment|default:"" != NULL}<p class="error">{$message.ng.comment}</p>{/if}
							<textarea name="comment" id="comment" rows="3" class="form-control">{$arr_post.comment|default:""}</textarea>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					{if $mode == 'edit'}<input type="hidden" name="id_estimate" value="{$arr_post.id_estimate}" />{/if}
					<input type="hidden" name="_contents_dir" id="_contents_dir" value="{$_CONTENTS_DIR}" />
					<input type="hidden" name="_contents_conf_path" id="_contents_conf_path" value="{$_CONTENTS_CONF_PATH}" />
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2 pos_ar">
							<button class="btn btn-primary"  type="submit">この内容で登録</button>
						</div>
					</div>
				</div>
			</form>
