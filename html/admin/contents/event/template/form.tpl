<form id="inputForm" name="inputForm" class="form-horizontal" action="./preview.php?preview=1" method="post" enctype="multipart/form-data">
	<div class="ibox-content">
		<div class="form-group required">
			<label class="col-sm-2 control-label">カテゴリ</label>
			<div class="col-sm-6">
				{if $message.ng.rental_category|default:"" != NULL}<p class="error">{$message.ng.rental_category}</p>{/if}

				<div class="radio m-r-xs inline">
					<select class="form-control" name="rental_category" id="rental_category">
						<option value="0">選択してください</option>
						{html_options options=$OptionEventCategory selected=$arr_post.event_category}
					</select>
				</div>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group required">
			<label class="col-sm-2 control-label">商品名</label>
			<div class="col-sm-6">
				{if $message.ng.name|default:"" != NULL}<p class="error">{$message.ng.name}</p>{/if}
				<input type="text" class="form-control" name="name" id="name" value="{$arr_post.name|default:""}" />
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">ふりがな</label>
			<div class="col-sm-6">
				{if $message.ng.ruby|default:"" != NULL}<p class="error">{$message.ng.ruby}</p>{/if}
				<input type="text" class="form-control" name="ruby" id="ruby" value="{$arr_post.ruby|default:""}" />
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group required">
			<label class="col-sm-2 control-label">単位</label>
			<div class="col-sm-3">
				<div class="input-group m-b">
					<input type="text" class="form-control" name="unit" id="unit" value="{$arr_post.unit|default:""}" />
				</div>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group required">
			<label class="col-sm-2 control-label">税抜き単価</label>
			<div class="col-sm-3">
				<div class="input-group m-b">
					<span class="input-group-addon">￥</span>
					<input type="number" class="form-control" name="price" id="price" value="{$arr_post.price|default:""}" />
				</div>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
			<label class="col-sm-2 control-label">説明 </label>
			<div class="col-sm-9">
				{if $message.ng.comment|default:"" != NULL}<p class="error">{$message.ng.comment}</p>{/if}
				<textarea name="comment" id="comment" rows="7" class="form-control ckeditor">{$arr_post.comment|default:""}</textarea>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		{if $_ARR_IMAGE != NULL}
			{include file=$template_image path=$_IMAGEFULLPATH dir=$_CONTENTS_DIR prefix="s_"}
		{/if}
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
				<div style="text-align:right;">
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
