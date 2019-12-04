// レコードの追加
function AddRecord(){

	// 初期化
	var clone  = $('#base_record').clone();

	var i = 1;

	// クローン作成
	$('.each_record:last').after( clone.addClass('each_record').css('display', 'table-row') );

	// ナンバリング
	$('.each_record').each( function(){

		$(this).attr('id', 'record_'+i);

		$('#record_'+i+' a').each( function(){
			$(this).attr('onclick', $(this).attr('onclick').replace( /\[[0-9]+\]/g, '['+i+']' ) );
			$(this).attr('onclick', $(this).attr('onclick').replace( /\([0-9]+\)/g, '('+i+')' ) );
		});

		i++;

	});

}

// レコードの削除
function DeleteRecord( n ){

	if( $('.each_record').size() <= 1 ){
		alert('これ以上削除できません。');
	}else{

		// 確認
		if( !confirm("項目の削除を行ってよろしいですか？\n（現在入力されているデータも消えてしまいます。）") ) return false;

		// 初期化
		var i = 1;

		// レコードの削除
		$('#record_'+n).remove();

		// ナンバリング
		$('.each_record').each( function(){

			$(this).attr('id', 'record_'+i);

//			$(this).find('.place_num').text(i);
//			$('#record_'+i+' input').each( function(){
//				$(this).attr('id', $(this).attr('id').replace( /[0-9]+$/g, i ) );
//				$(this).attr('name', $(this).attr('name').replace( /\[[0-9]+\]/g, '['+i+']' ) );
//			});
//			$('#record_'+i+' select').each( function(){
//				$(this).attr('id', $(this).attr('id').replace( /[0-9]+$/g, i ) );
//				$(this).attr('name', $(this).attr('name').replace( /\[[0-9]+\]/g, '['+i+']' ) );
//			});
//			$('#record_'+i+' textarea').each( function(){
//				$(this).attr('id', $(this).attr('id').replace( /[0-9]+$/g, i ) );
//				$(this).attr('name', $(this).attr('name').replace( /\[[0-9]+\]/g, '['+i+']' ) );
//			});
//			$('#record_'+i+' a').each( function(){
//				$(this).attr('href', $(this).attr('href').replace( /\[[0-9]+\]/g, '['+i+']' ) );
//				$(this).attr('href', $(this).attr('href').replace( /\([0-9]+\)/g, '('+i+')' ) );
//			});
			$('#record_'+i+' a').each( function(){
				$(this).attr('onclick', $(this).attr('onclick').replace( /\[[0-9]+\]/g, '['+i+']' ) );
				$(this).attr('onclick', $(this).attr('onclick').replace( /\([0-9]+\)/g, '('+i+')' ) );
			});
//			$('#record_'+i+' button').each( function(){
//				$(this).attr('onclick', $(this).attr('onclick').replace( /\[[0-9]+\]/g, '['+i+']' ) );
//				$(this).attr('onclick', $(this).attr('onclick').replace( /\([0-9]+\)/g, '('+i+')' ) );
//			});

			i++;

		});
		SUM();
	}
}

$(function() {
	SUM();
	// 金額計算
	$(document).on( 'change keyup', 'input[name^="estimate[number]"], input[name^="estimate[price]"]', function(){
		var id=$(this).parents('.each_record').attr('id');
		if( $('#'+id).find('input[name^="estimate[number]"]').val() != "" && $('#'+id).find('input[name^="estimate[price]"]').val() != "" ){
			var price_tax = $('#'+id).find('input[name^="estimate[price]"]').val()*parseFloat(1.1);
			var tax = ( parseInt( price_tax ) - $('#'+id).find('input[name^="estimate[price]"]').val() );
			var total = parseInt( price_tax ) * $('#'+id).find('input[name^="estimate[number]"]').val();
			$('#'+id).find('input[name^="estimate[total]"]').val(parseInt( total) );
			$('#'+id).find('input[name^="estimate[tax]"]').val(parseInt( tax) );
			$('#'+id).find('input[name^="estimate[price_tax]"]').val(parseInt( price_tax ));
		}
		SUM();

	});
});

// 合計金額
function SUM(){
	// 初期化
	var sum = 0;
	// 合計計算
	$('.each_record').each( function(){
		var x = $(this).find('input[name^="estimate[total]"]').val();
		if(x != ""){
			sum += parseInt(x);
		}
	});
	// 表示
	$('.sum').text(sum+'円');

}
