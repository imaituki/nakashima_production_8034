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
			&nbsp;<br></td>
		<td rowspan="3" width="200" style="text-align:right">{$estimate.date|date_format:"%Y年%m月%d日"}<br>
			&nbsp;<br>
			<img src="../image/logo.png" width="180"><br>
		&nbsp;</td>
	</tr>
	<tr>
		<td><h2>{if $estimate.company}{$estimate.company|default:""}{if $estimate.name}<br>{else}御中{/if}{/if}{if $estimate.name}{$estimate.name|default:""} 様{/if}</h2>
		&nbsp;</td>
	</tr>
	<tr>
		<td>いつもお世話になります。<br>下記の件につきましてお見積り申し上げます。<br>ご検討の程、宜しくお願い致します。<br>
		&nbsp;</td>
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
&nbsp;<br>
<table width="100%" cellpadding="5s">
	<tr>
		<td class="bor1">【備考】<br>
			{$estimate.comment1}</td>
	</tr>
</table>
</body>
</html>
