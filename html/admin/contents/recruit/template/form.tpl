<form id="inputForm" name="inputForm" class="form-horizontal" action="./preview.php?preview=1" method="post" enctype="multipart/form-data">
	<div class="ibox-content">
		{if $message.ng.all|default:"" != NULL}<p class="error">{$message.ng.all}</p>{/if}
		<div class="form-group required">
			<label class="col-sm-2 control-label">募集種別</label>
			<div class="col-sm-6">
				{if $message.ng.category|default:"" != NULL}<p class="error">{$message.ng.category}</p>{/if}
				<div class="radio m-r-xs inline">
					{html_radios name="category" options=$OptionRecruit selected=$arr_post.category|default:1}
				</div>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group required">
			<label class="col-sm-2 control-label">採用予定</label>
			<div class="col-sm-6">
				{if $message.ng.plan|default:"" != NULL}<p class="error">{$message.ng.plan}</p>{/if}
				<input type="text" class="form-control" name="plan" id="plan" value="{$arr_post.plan|default:""}" />
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">諸手当</label>
			<div class="col-sm-9">
				{if $message.ng.allowance|default:"" != NULL}<p class="error">{$message.ng.allowance}</p>{/if}
				<textarea name="allowance" id="allowance" rows="4" class="form-control">{$arr_post.allowance|default:""}</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">社会保険</label>
			<div class="col-sm-9">
				{if $message.ng.insurance|default:"" != NULL}<p class="error">{$message.ng.insurance}</p>{/if}
				<textarea name="insurance" id="insurance" rows="4" class="form-control">{$arr_post.insurance|default:""}</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">福利厚生</label>
			<div class="col-sm-9">
				{if $message.ng.welfare|default:"" != NULL}<p class="error">{$message.ng.welfare}</p>{/if}
				<textarea name="welfare" id="welfare" rows="4" class="form-control">{$arr_post.welfare|default:""}</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">昇給</label>
			<div class="col-sm-9">
				{if $message.ng.salary|default:"" != NULL}<p class="error">{$message.ng.salary}</p>{/if}
				<textarea name="salary" id="salary" rows="4" class="form-control">{$arr_post.salary|default:""}</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">賞与</label>
			<div class="col-sm-9">
				{if $message.ng.bonus|default:"" != NULL}<p class="error">{$message.ng.bonus}</p>{/if}
				<textarea name="bonus" id="bonus" rows="4" class="form-control">{$arr_post.bonus|default:""}</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">勤務地</label>
			<div class="col-sm-9">
				{if $message.ng.location|default:"" != NULL}<p class="error">{$message.ng.location}</p>{/if}
				<textarea name="location" id="location" rows="4" class="form-control">{$arr_post.location|default:""}</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">勤務時間</label>
			<div class="col-sm-9">
				{if $message.ng.time|default:"" != NULL}<p class="error">{$message.ng.time}</p>{/if}
				<textarea name="time" id="time" rows="4" class="form-control">{$arr_post.time|default:""}</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">休日・休暇</label>
			<div class="col-sm-9">
				{if $message.ng.holiday|default:"" != NULL}<p class="error">{$message.ng.holiday}</p>{/if}
				<textarea name="holiday" id="holiday" rows="4" class="form-control">{$arr_post.holiday|default:""}</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">応募方法</label>
			<div class="col-sm-9">
				{if $message.ng.method|default:"" != NULL}<p class="error">{$message.ng.method}</p>{/if}
				<textarea name="method" id="method" rows="4" class="form-control">{$arr_post.method|default:""}</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">掲載期間 </label>
			<div class="col-sm-4">
				<div class="radio m-r-xs inline mb15">
					{html_radios name="display_indefinite" values=1 selected=$arr_post.display_indefinite|default:"1" output="設定しない"}&nbsp;&nbsp;
					{html_radios name="display_indefinite" values=0 selected=$arr_post.display_indefinite|default:"1" output="設定する"}
				</div>
				{if $message.ng.display_start|default:"" != NULL}<p class="error">{$message.ng.display_start}</p>{/if}
				{if $message.ng.display_end|default:"" != NULL}<p class="error">{$message.ng.display_end}</p>{/if}
				<div class="input-daterange input-group" id="datepicker">
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					<input type="text" class="input-sm form-control datepicker" name="display_start" id="display_start" value="{$arr_post.display_start|default:""}" readonly>
					<span class="input-group-addon">～</span>
					<input type="text" class="input-sm form-control datepicker" name="display_end" id="display_end"  value="{$arr_post.display_end|default:""}" readonly>
				</div>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">表示／非表示</label>
			<div class="col-sm-6">
				{if $message.ng.display_flg|default:"" != NULL}<p class="error">{$message.ng.display_flg}</p>{/if}
				<div class="radio m-r-xs inline">
					{html_radios name="display_flg" values=1 selected=$arr_post.display_flg|default:"1" output="する"}&nbsp;&nbsp;
					{html_radios name="display_flg" values=0 selected=$arr_post.display_flg|default:"1" output="しない"}
				</div>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="button clearfix mb20">
			{if $mode == 'edit'}<input type="hidden" name="{$_CONTENTS_ID}" value="{$arr_post.$_CONTENTS_ID}" />{/if}
			<input type="hidden" name="_contents_dir" id="_contents_dir" value="{$_CONTENTS_DIR}" />
			<input type="hidden" name="_contents_conf_path" id="_contents_conf_path" value="{$_CONTENTS_CONF_PATH}" />
			<div class="form-group">
				<div class="col-sm-offset-1 fl_left">
					<input type="button" id="preview" class="btn btn-info" value="プレビュー" />
				</div>
				<div class="fl_right">
					<input type="button" class="btn btn-primary" value="この内容で登録" id="{if $mode == 'edit'}updateBtn{else}insertBtn{/if}" />
				</div>
			</div>
		</div>
	</div>
</form>
{literal}
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
{/literal}
