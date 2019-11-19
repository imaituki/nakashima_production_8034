{include file=$template_pagenavi}
<table class="footable table table-stripped toggle-arrow-tiny tbl_1" data-page-size="15">
	<thead>
		<tr>
			<th>日付</th>
			<th>掲載期間</th>
			<th>タイトル</th>
			<th class="photo">写真</th>
			<th class="showhide">表示</th>
			<th class="delete">削除</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th width="100">日付</th>
			<th width="100">掲載期間</th>
			<th>タイトル</th>
			<th class="photo" width="220">写真</th>
			<th class="showhide" width="60">表示</th>
			<th class="delete" width="60">削除</th>
		</tr>
	</tfoot>
	<tbody>
		{foreach from=$arr_data item=data}
		<tr{if $data.display_flg == 0 || ( $data.display_indefinite == 0 && ( $data.display_start|strtotime > $smarty.now || $data.display_end|strtotime < $smarty.now ) )} class="gray-bg"{/if}>
			<td>{$data.date|date_format:"%Y/%m/%d"}</td>
			<td>
				{if $data.display_indefinite == 0}
					{$data.display_start|date_format:"%Y/%m/%d"}<br />
					{$data.display_end|date_format:"%Y/%m/%d"}
				{else}
					無期限
				{/if}
			</td>
			<td><a href="./edit.php?id={$data.$_CONTENTS_ID}">{$data.title}</a></td>
			<td class="pos_al">
				<div class="lightBoxGallery">
					{foreach from=$_ARR_IMAGE item=file name=file}
						{if $data[$file.name]}
							<a href="{$_IMAGEFULLPATH}/{$_CONTENTS_DIR}/{$file.name}/l_{$data[$file.name]}" title="{$file.comment|default:""}" rel="lightbox[]">
								<img src="{$_IMAGEFULLPATH}/{$_CONTENTS_DIR}/{$file.name}/s_{$data[$file.name]}" width="50" />
							</a>
						{/if}
						{if $smarty.foreach.file.iteration % 3 == 0}<br />{/if}
					{/foreach}
				</div>
			</td>
			<td class="pos_ac">
				<div class="switch">
					<div class="onoffswitch">
						<input type="checkbox" value="1" class="onoffswitch-checkbox btn_display" id="display{$data.$_CONTENTS_ID}" data-id="{$data.$_CONTENTS_ID}"{if $data.display_flg == 1} checked{/if}>
						<label class="onoffswitch-label" for="display{$data.$_CONTENTS_ID}">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch"></span>
						</label>
					</div>
				</div>
			</td>
			<td class="pos_ac">
				<a href="javascript:void(0)" class="btn btn-danger btn_delete" data-id="{$data.$_CONTENTS_ID}">削除</a>
			</td>
		</tr>
		{foreachelse}
		<tr>
			<td colspan="6">{$_CONTENTS_NAME}は見つかりません。</td>
		</tr>
		{/foreach}
	</tbody>
</table>
{include file=$template_pagenavi}