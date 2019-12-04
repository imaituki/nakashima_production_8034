{include file=$template_pagenavi}
<table class="footable table table-stripped toggle-arrow-tiny tbl_1" data-page-size="15">
	<thead>
		<tr>
			<th width="200">お問い合わせ日時</th>
			<th width="300">名前</th>
			<th width="200">メールアドレス</th>
			<th width="200">住所</th>
			<th width="150">電話番号</th>
			<th class="showhide" width="60">確認</th>
			<th class="delete">削除</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th width="150">お問い合わせ日時</th>
			<th>名前</th>
			<th width="150">メールアドレス</th>
			<th width="200">住所</th>
			<th width="150">電話番号</th>
			<th class="showhide" width="60">確認</th>
			<th class="delete">削除</th>
		</tr>
	</tfoot>
	<tbody>
		{foreach from=$t_work item=work}
		<tr {if $work.check_flg == 1}style="background-color: #dadada;"{/if}>
			<td>{$work.entry_date|date_format:"%Y/%m/%d %H:%M:%S"}</td>
			<td><a href="./edit.php?id={$work.id_work}">{$work.name}<br>({$work.ruby})</a></td>
			<td>{$work.mail}</td>
			<td>〒{$work.zip}<br>{html_select_ken selected=$work.prefecture|default:"" pre=1}{$work.address}</td>
			<td>{$work.tel}</td>
			<td class="pos_ac">
			{if $work.check_flg != 1}
				<a href="javascript:void(0)" class="btn btn-info btn_check" data-id="{$work.id_work}">確認</a>
			{else}
				確認済
			{/if}
			</td>
			<td class="pos_ac">
				<a href="javascript:void(0)" class="btn btn-danger btn_delete" data-id="{$work.id_work}">削除</a>
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
