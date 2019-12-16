
$(function () {
	// 削除
	$(document).on('click', '.detail-trash', function () {
		if ($('.rental_parts_loop').length > 1) {
			if (!confirm("削除処理を行ってよろしいですか？")) {
				return false;
			} else {
				$(this).parents().parents('.rental_parts_loop').remove();
			}
		} else {
			alert("これ以上削除できません。");
		}
	});

	// 写真追加
	$(document).on('click', '.add_rental_parts', function () {

		var sirials = new Array();
		var ck = $('.rental_parts_loop:first').clone(true);

		// 要素数の取得
		$('.rental_parts_loop').each(function (id) {
			sirials[id] = $(this).attr('data-sirial');
		});
		var sirial = Math.max.apply(null, sirials) + 1;

		ck.find('.rental_parts_type').each(function () {
			$(this).attr('name', 'detail[' + sirial + '][type]');
			$(this).attr('id', 'rental_parts_type_' + sirial);
			$(this).val('');
		});

		ck.find('.rental_parts_comment').each(function () {
			$(this).attr('name', 'detail[' + sirial + '][comment]');
			$(this).attr('id', 'rental_parts_comment_' + sirial);
			$(this).val('');
		});

		ck.find('.rental_parts_price').each(function () {
			$(this).attr('name', 'detail[' + sirial + '][price]');
			$(this).attr('id', 'rental_parts_price_' + sirial);
			$(this).val('');
		});




		for (var count = 0; count <= 5; count++) {
			ck.find('.rental_parts_image' + count).each(function () {
				$(this).attr('name', 'detail[' + sirial + '][image' + count + ']');
				$(this).attr('id', 'rental_parts_image' + count + '_' + sirial);
				$(this).val('');
			});
		}

		ck.find('.rental_parts_detail_key').each(function () {
			// $(this).attr('name', 'detail[' + sirial + '][office_image]');
			// $(this).attr('id', 'rental_parts_office_image_' + sirial);
			$(this).val(sirial);
		});


		$(ck).attr('id', 'rental_parts' + sirial).attr('data-sirial', sirial).val('');
		$('.rental_parts_loop:last').after(ck);

	});


});
