<form id="inputForm" name="inputForm" class="form-horizontal" action="./preview.php?preview=1" method="post" enctype="multipart/form-data">
	<div class="ibox-content">
		{if $message.ng.all|default:"" != NULL}<p class="error">{$message.ng.all}</p>{/if}
		<div class="form-group required">
			<label class="col-sm-2 control-label">カテゴリ</label>
			<div class="col-sm-6">
				{if $message.ng.id_rental_category|default:"" != NULL}<p class="error">{$message.ng.id_rental_category}</p>{/if}

				<div class="radio m-r-xs inline">
					<select class="form-control" name="id_rental_category" id="id_rental_category">
						<option value="0">選択してください</option>
						{html_options options=$OptionRentalCategory selected=$arr_post.id_rental_category}
					</select>
				</div>
			</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group required">
			<label class="col-sm-2 control-label">商品名・名前</label>
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
					{if $message.ng.unit|default:"" != NULL}<p class="error">{$message.ng.unit}</p>{/if}
					<input type="text" class="form-control" name="unit" id="unit" value="{$arr_post.unit|default:""}" />
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
		<div class="form-group">
			<label class="col-sm-2 control-label">スペック（種類）追加</label>
			<div class="col-sm-9">
				<p class="mb10 x-large"> <a href="javascript:void(0);" class="add_rental_parts btn btn-primary btn-s"><i class="fa fa-r fa-plus-circle"></i>追加</a></p>
			</div>
		</div>
		<div id="item_container">
			{foreach from=$arr_post.detail item="rental_parts" key="key" name="loopMonthList"}
			<div class="rental_parts_loop" width="100%" data-sirial="{$key}">
				<div class="form-group">
					<label class="col-sm-2 control-label">スペック（種類）</label>
					<div class="col-sm-6">
						{if $message.ng[detail_|cat:$key|cat:"_type"]|default:"" != NULL}<p class="error">{$message.ng[detail_|cat:$key|cat:"_type"]}</p>{/if}
						<input type="text" class="form-control rental_parts_type" name="detail[{$key}][type]" id="rental_parts_type_{$key}"  size="60" value="{$rental_parts.type|default:""}" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">説明</label>
					<div class="col-sm-9">
						{if $message.ng[detail_|cat:$key|cat:"_comment"]|default:"" != NULL}<p class="error">{$message.ng[detail_|cat:$key|cat:"_comment"]}</p>{/if}
						<textarea name="detail[{$key}][comment]" id="rental_parts_comment_{$key}" rows="3" class="form-control text rental_parts_comment">{$rental_parts.comment|default:""}</textarea>
					</div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">税抜き単価</label>
				    <div class="col-sm-3">
						{if $message.ng[detail_|cat:$key|cat:"_price"]|default:"" != NULL}<p class="error">{$message.ng[detail_|cat:$key|cat:"_price"]}</p>{/if}
				        <div class="input-group m-b">
				            <span class="input-group-addon">￥</span>
				            <input type="number" class="form-control rental_parts_type" name="detail[{$key}][price]" id="rental_parts_comment_{$key}" value="{$rental_parts.price|default:""}" />
				        </div>
				    </div>
				</div>

				{foreach from=$_ARR_IMAGE item=file key=key2 name=loopFile}
				{if $imgKey|default:"" == "" || ( $imgKey|default:"" != "" && $key == $imgKey|default:"" )}
				<div class="form-group {if $file.notnull|default:'' == 1} required{/if}">
					<label class="col-sm-2 control-label">{$file.column|default:""}</label>
					<div class="col-sm-6">
						{assign var='preview_name' value="_preview_image_`$file.name`"}
						<div class="mb5">
						{if $mode == 'edit'}
							{if $rental_parts[$file.name]|default:"" == NULL}
								<div class="load_image">
									NOT IMAGE<br />
								</div>
							{else}
								<div class="registered_image">
									<img src="{$_IMAGEFULLPATH}/{$_CONTENTS_DIR}/{$file.name}/s_{$rental_parts[$file.name]}" class="mb10" />
									{if $file.notnull|default:"" != 1}
									<label><input type="checkbox" name="detail[{$key}][_delete_image][{$file.name}]" value="{$rental_parts[$file.name]|default:''}" /> この写真を削除する</label>
									{/if}
								</div>
							{/if}
							<input type="hidden" name="detail[{$key}][_{$file.name}_now]" value="{$rental_parts[$file.name]|default:''}" />
						{/if}
						{if isset($rental_parts[$preview_name])}
							{if $rental_parts[$preview_name]|default:'' != NULL}
								<div class="load_image">
									<img src="{$_ADMIN.home}/common/php/imageDisp.php?dir={$_CONTENTS_DIR}&image={$file.name}&arrimage=1" />
									<span class="c_red"> ※この画像はプレビュー用です。まだ保存されていません。</span>
									<input type="hidden" name="detail[{$key}][_preview_{$file.name}]" value="{$file.name}" />
									<input type="hidden" name="detail[{$key}][_preview_image_{$file.name}]" value="{$rental_parts[$preview_name]}" />
									<input type="hidden" name="detail[{$key}][_preview_image_dir]" value="{$rental_parts._preview_image_dir}" />
								</div>
							{/if}
						{/if}
						</div>
						<input type="file" class="file2 rental_parts_{$file.name}" name="detail[{$key}][{$file.name}]" id="rental_parts_{$file.name}_{$key}" size="50" />
						<input type="hidden" name="_detail_key" class="rental_parts_detail_key" value="{$key}" />
					</div>
				</div>
				{/if}
				{/foreach}

				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-9 pos_ar">
						<a href="javascript:void(0);" class="btn btn-danger detail-trash"><i class="icon-trash"></i> 削除</a>
					</div>
				</div>
				<div class="hr-line-dashed mb50"></div>
			</div>
			{/foreach}
		</div>
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
