{literal}
<script type="text/javascript">
sortableInit();
</script>
{/literal}
{include file=$template_pagenavi}
<table class="footable table table-stripped toggle-arrow-tiny tbl_1" data-page-size="15" id="sortable-table">
	<thead>
		<tr>
			<th></th>
			<th>商品名・名前</th>
			<th>カテゴリ</th>
			<th class="photo">写真</th>
			<th class="showhide">表示</th>
			<th class="delete">削除</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th></th>
			<th>商品名・名前</th>
			<th>カテゴリ</th>
			<th class="photo">写真</th>
			<th class="showhide">表示</th>
			<th class="delete">削除</th>
		</tr>
	</tfoot>
	<tbody>
		{foreach from=$t_rental item=rental}
		<tr id="{$rental.id_rental}">
			<td class="move_i">{if $arr_post.mode|default:"" == "search"}{else}<i class="fa fa-sort"><span></span></i>{/if}</td>
			<td><a href="./edit.php?id={$rental.$_CONTENTS_ID}">{$rental.name}</a></td>
			<td>
				{$OptionRentalCategory[$rental.id_rental_category]}
			</td>
			<td class="pos_al">
				<div class="lightBoxGallery">
					{foreach from=$_ARR_IMAGE item=file name=file}
						{if $rental[$file.name]}
							<a href="{$_IMAGEFULLPATH}/{$_CONTENTS_DIR}/{$file.name}/l_{$rental[$file.name]}" title="{$file.comment|default:""}" rel="lightbox[]">
								<img src="{$_IMAGEFULLPATH}/{$_CONTENTS_DIR}/{$file.name}/s_{$rental[$file.name]}" width="50" />
							</a>
						{/if}
						{if $smarty.foreach.file.iteration % 3 == 0}<br />{/if}
					{/foreach}
				</div>
			</td>
			<td class="pos_ac">
				<div class="switch">
					<div class="onoffswitch">
						<input type="checkbox" value="1" class="onoffswitch-checkbox btn_display" id="display{$rental.$_CONTENTS_ID}" data-id="{$rental.$_CONTENTS_ID}"{if $rental.display_flg == 1} checked{/if}>
						<label class="onoffswitch-label" for="display{$rental.$_CONTENTS_ID}">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch"></span>
						</label>
					</div>
				</div>
			</td>
			<td class="pos_ac">
				<a href="javascript:void(0)" class="btn btn-danger btn_delete" data-id="{$rental.$_CONTENTS_ID}">削除</a>
			</td>
		</tr>
		{foreachelse}
		<tr>
			<td colspan="6" class="pos_ac">{$_CONTENTS_NAME}は見つかりません。</td>
		</tr>
		{/foreach}
	</tbody>
</table>
{include file=$template_pagenavi}
