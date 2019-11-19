{literal}
<script type="text/javascript">
sortableInit();
</script>
{/literal}
{include file=$template_pagenavi}
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
		{foreach from=$arr_data item=data}
		<tr id="{$data.$_CONTENTS_ID}"{if $data.display_flg == 0 || ( $data.display_indefinite == 0 && ( $data.display_start|strtotime > $smarty.now || $data.display_end|strtotime < $smarty.now ) )} class="gray-bg"{/if}>
			<td class="move_i">{if $arr_post.mode|default:"" == "search"}☓{else}<i class="fa fa-sort"><span></span></i>{/if}</td>
			<td>
				{if $data.display_indefinite == 0}
					{$data.display_start|date_format:"%Y/%m/%d"}<br />
					{$data.display_end|date_format:"%Y/%m/%d"}
				{else}
					無期限
				{/if}
			</td>
			<td>{$OptionRecruit[$data.category]}</td>
			<td><a href="./edit.php?id={$data.$_CONTENTS_ID}">{$data.plan}</a></td>
			<td>{$data.location|nl2br}</td>
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
