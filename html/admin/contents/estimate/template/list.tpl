			{include file=$template_pagenavi}
			<table class="footable table table-stripped toggle-arrow-tiny tbl_1" data-page-size="15">
				<thead>
					<tr>
						<th width="100">見積り日</th>
						<th>会社名・学校名/名前(担当者)</th>
						<th width="255">印刷</th>
						<th width="70" class="delete">削除</th>
					</tr>
				</thead>
				<tbody>
					{foreach from=$t_estimate item="estimate" name="loopestimate"}
					<tr>
						<td>{$estimate.estimate_date|date_format:"%Y/%m/%d"}</td>
						<td><a href="./edit.php?id={$estimate.id_estimate}">{if $estimate.company}{$estimate.company|default:""}<br />{/if}{if $estimate.name}{$estimate.name|default:""}様{/if}</a></td>
						<td class="pos_ac">
							<a href="./export.php?id={$estimate.id_estimate}" target="_blank" class="btn btn-info">見積書</a>
							<a href="./export2.php?id={$estimate.id_estimate}" target="_blank" class="btn btn-info">納品書</a>
							<a href="./export3.php?id={$estimate.id_estimate}" target="_blank" class="btn btn-info">請求書</a>
						</td>
						<td class="pos_ac">
							<a href="javascript:void(0)" class="btn btn-danger btn_delete" data-id="{$estimate.id_estimate}">削除</a>
						</td>
					</tr>
					{foreachelse}
					<tr>
						<td colspan="6">{$_CONTENTS_NAME}は見つかりません。</td>
					</tr>
					{/foreach}
				</tbody>
				<tfoot>
					<tr>
						<td colspan="10"><ul class="pagination pull-right">
							</ul></td>
					</tr>
				</tfoot>
			</table>
			<div id="blueimp-gallery" class="blueimp-gallery">
				<div class="slides"></div>
				<h3 class="title"></h3>
				<a class="prev">‹</a>
				<a class="next">›</a>
				<a class="close">×</a>
				<a class="play-pause"></a>
				<ol class="indicator"></ol>
			</div>
			{include file=$template_pagenavi}
