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
		<td>下記の通り御見積申し上げます。<br>
		&nbsp;</td>
	</tr>
</table>
<table width="100%" cellpadding="5">
	<tr>
		<th class="bor1" width="400" style="text-align:center">ご入居期間</th>
		<th class="bor1" width="110" style="text-align:center">見積り担当者</th>
	</tr>
	<tr>
		<td class="bor1" style="text-align:center">{$estimate.in_date|date_format:"%Y年%m月%d日"|default:"---"}〜{$estimate.out_date|date_format:"%Y年%m月%d日"|default:"---"}　※チェックアウト日<br>
		（合計 {$estimate.days} 泊 {$estimate.days+1} 日間）</td>
		<td class="bor1" style="text-align:center">{$OptionStaff[$estimate.staff]}</td>
	</tr>
</table>
&nbsp;<br>
<table width="100%" cellpadding="5">
	<tr>
		<th class="bor1" width="300">内容</th>
		<th class="bor1" width="50">数量</th>
		<th class="bor1" width="80">単価</th>
		<th class="bor1" width="80">金額</th>
	</tr>
{foreach from=$estimate.estimate item="est" key="key"}
	<tr>
		<td class="bor1">{$est.title|default:''}</td>
		<td class="bor1" style="text-align:center">{$est.number|default:''}</td>
		<td class="bor1" style="text-align:right">{if $est.price}{$est.price|default:''|number_format}円{/if}</td>
		<td class="bor1" style="text-align:right">{if $est.total}{$est.total|default:''|number_format}円{/if}</td>
	</tr>
{/foreach}
	<tr>
		<th class="bor1" colspan="3">合計</th>
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
&nbsp;<br>
<div style="text-align:center;background-color:#eeeeee;">
&nbsp;<br>
<table width="620" cellpadding="7">
	<tr>
		<td width="200" style="text-align:right"><h3>振込先</h3></td>
		<td style="text-align:left"><h3>中国銀行 本店 普通 2388843</h3>
			<h3>口座名 アルカディア岡山</h3></td>
	</tr>
	<tr>
		<td colspan="2" style="text-align:center">
		お電話並びに口頭でのご予約は仮予約となっております。ご入金いただいた時点で正式予約となります。<br>
		本見積りより3日以内にご入金をお願いいたします。3日以上経過した場合は、改めてのお申込みになります。<br>
		恐れ入りますが、振込手数料はご負担ください。</td>
	</tr>
</table>
</div>
</body>
</html>
