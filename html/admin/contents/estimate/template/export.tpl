<!doctype html>
<html>
<head>
<style>{literal}
*{ -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -o-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box; margin:0; padding:0; font-size:28px; }
html{ margin:0; padding:0; }
body{ margin:0; padding:0; }
p{ margin:0; padding:0; }
table{ margin:0; padding:0; }
h1{ margin:0; padding:0; font-size:52px; }
h2{ margin:0; padding:0; font-size:42px; }
h3{ margin:0; padding:0; font-size:32px; line-height:90%; }
th { background-color:#000000; color:#ffffff; vertical-align:middle; }
td { vertical-align:middle; }
.bor1 { border:0.5px solid #000000; }
{/literal}</style>
</head>
<body>
<br><br>
<table width="100%" cellpadding="0">
	<tr>
		<td width="300" style="text-align:right"><h1>御見積書</h1>
			&nbsp;<br /></td>
		<td rowspan="3" width="200" style="text-align:right">{$estimate.estimate_date|date_format:"%Y年%m月%d日"}<br />
			&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
			<span style="text-align:center;"><span style="font-weight:bold; font-size:40px;">㈲中島プロダクション</span><br>
			〒710－0024 倉敷市亀山1004-3<br>
			代表取締役：中嶋 直樹<br>
			TEL　086-429-2111<br>
			FAX　086-428-4515<br>
			Mail　eventnpro@mx91.tiki.ne.jp/<br>
			URL　http://ww91.tiki.ne.jp/~eventnpro/<br></span>
			<img src="../image/logo2.jpg" width="50">
			&nbsp;<br /></td>
	</tr>
	<tr>
		<td><h2>{if $estimate.company}
					{$estimate.company|default:""}
						{if $estimate.name}<br>{else}御中{/if}
				{/if}
				{if $estimate.name}
					{if $estimate.post}{$estimate.post|default:""} {/if}
					{$estimate.name|default:""} 様
				{/if}</h2>
		&nbsp;</td>
	</tr>
	<tr>
		<td>いつもお世話になります。<br>下記の件につきましてお見積り申し上げます。<br>ご検討の程、宜しくお願い致します。<br>
		&nbsp;<br>
		{if $estimate.event}【{$estimate.event}】{/if}<br>
		{if $estimate.venue || $estimate.zip || $estimate.prefecture || $estimate.address}
			開催場所・{if $estimate.venue}{$estimate.venue}<br />　　　　　{/if}
				{if $estimate.zip || $estimate.prefecture || $estimate.address}
				{if $estimate.venue}({/if}{if $estimate.zip}〒{$estimate.zip}{/if}{if $estimate.prefecture} {html_select_ken selected=$estimate.prefecture pre=1}{/if}{if $estimate.address} {$estimate.address}{/if}{if $estimate.venue}){/if}
				{/if}
				<br />
		{/if}
		{if $estimate.date_start || $estimate.date_end}
				貸出期間・
			{if $estimate.date_start == $estimate.date_end}
				{$estimate.date_start|date_format:"%Y年%m月%d日"}　{$estimate.start_time|date_format:"%H:%M"}～{$estimate.end_time|date_format:"%H:%M"}
			{else}
				{$estimate.date_start|date_format:"%Y年%m月%d日"}{$estimate.start_time|date_format:"%H:%M"} ～ {$estimate.date_end|date_format:"%Y年%m月%d日"}{$estimate.end_time|date_format:"%H:%M"}
			{/if}
		{/if}
		&nbsp;<br />&nbsp;<br />
		<span style="font-weight:bold; font-size:40px;">御見積金額（税込）<br>
			　￥{if $sum}{$sum|default:0|number_format}円{/if}</span>&nbsp;(税抜価格 ￥{if $sum_free}{$sum_free|default:0|number_format}円{/if})&nbsp;<br />
		</td>
	</tr>
</table>
<table width="100%" cellpadding="5">
	<tr>
		<th class="bor1" width="150">内容</th>
		<th class="bor1" width="50">数量</th>
		<th class="bor1" width="50">単位</th>
		<th class="bor1" width="50">単価</th>
		<th class="bor1" width="50">消費税</th>
		<th class="bor1" width="80">単価合計</th>
		<th class="bor1" width="80">金額</th>
	</tr>
{foreach from=$estimate.estimate item="est" key="key"}
	<tr>
		<td class="bor1">{$est.title|default:''}</td>
		<td class="bor1" style="text-align:center">{$est.number|default:''}</td>
		<td class="bor1" style="text-align:right">{if $est.unit}{$est.unit}{/if}</td>
		<td class="bor1" style="text-align:right">{if $est.price}{$est.price|default:''|number_format}円{/if}</td>
		<td class="bor1" style="text-align:right">{if $est.tax}{$est.tax|default:''|number_format}円{/if}</td>
		<td class="bor1" style="text-align:right">{if $est.price_tax}{$est.price_tax|default:''|number_format}円{/if}</td>
		<td class="bor1" style="text-align:right">{if $est.total}{$est.total|default:''|number_format}円{/if}</td>
	</tr>
{/foreach}
	<tr>
		<th class="bor1" colspan="6">合計</th>
		<td class="bor1" style="text-align:right">{if $sum}{$sum|default:0|number_format}円{/if}</td>
	</tr>
</table>
{if $estimate.comment}
&nbsp;<br>
<table width="100%" cellpadding="5s">
	<tr>
		<td class="bor1">【備考】<br>
			{$estimate.comment}</td>
	</tr>
</table>
{/if}
</body>
</html>
