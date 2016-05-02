jQuery(document).ready(function($) {
	$('.types-table-in-meta-box').css('display', 'none');
	//number of columns for repeater field
	var $blockCols = $('.acf-field-radio[data-name="number_of_columns"]'),
		$imgposBlocks = $('.acf-field-radio[data-name="image_position"]'),
		$inputCols,
		$inputPos,
		$repeaters,
		currentrepeatersWidth, 
		currentPos,
		$blockCol,
		$checkedCol,
		$checkedPos,
		$imgposBlock,
		$imgPosText,
		$textPosImg;
	$imgposBlocks.each(function(){
		$imgposBlock = $(this);
		$checkedPos = $imgposBlock.find('input:checked');
		$inputPos = $imgposBlock.find('input:radio');
		currentPos = $checkedPos.val();
		$textPosImg = $imgposBlock.siblings('.acf-field-wysiwyg');
		$imgPosText = $imgposBlock.siblings('.acf-field-image');
		if(currentPos === 'left') {
				$textPosImg.css('float','right')
				$textPosImg.get(0).style.setProperty( 'border-left', '1px solid #eeeeee', 'important' );
		}
		$inputPos.change(function() {
			$textPosImg = $(this).parents('.acf-field-radio').siblings('.acf-field-wysiwyg')
			if($(this).val() === 'left') {
				$textPosImg.css('float','right')
				$textPosImg.get(0).style.setProperty( 'border-left', '1px solid #eeeeee', 'important' );
			}
			else {
				$textPosImg.css('float','left');	
				$textPosImg.get(0).style.setProperty( 'border-left', 'none' );
			}
		})

	});

	$blockCols.each(function(){
		$blockCol = $(this);
		$checkedCol = $blockCol.find('input:checked');
		$inputCols = $blockCol.find('input:radio');
		currentrepeatersWidth = 100/$checkedCol.val();
		if($blockCol.siblings('.acf-field-repeater').find('.acf-repeater').length !== 0) {
			$repeaters = $blockCol.siblings('.acf-field-repeater').find('.acf-repeater').find('.acf-row');
			$repeaters.find('.acf-fields').css('width', '80%');
		}
		else if ($blockCol.siblings('.acf-field-widget-area').length !==0){
			$repeaters = $blockCol.siblings('.acf-field-widget-area').find('.values').find('.layout');
			$repeaters.find('.acf-fields').removeAttr( 'style' );
		}
		else{
			$repeaters = $blockCol.siblings('.acf-field-gallery').find('.acf-gallery-attachment');
		}
		//$repeaters.width(100/$checkedCol.val() + '%');
		//console.log($repeaters);
		if($checkedCol.val() != 1) {
			$repeaters.parent().css({'display': '-webkit-flex', 'display': '-ms-flexbox', 'display': 'flex', '-webkit-flex-wrap': 'wrap', '-ms-flex-wrap': 'wrap', 'flex-wrap': 'wrap'})
			if($blockCol.siblings('.acf-field-repeater').find('.acf-repeater').length !== 0) {
				$repeaters	.attr({'style':'display: -webkit-flex; display: -ms-flexbox; display: flex; width: ' + currentrepeatersWidth + '%; border-bottom: 1px solid #DFDFDF; border-top: none; box-sizing: border-box;'})				
				$repeaters.find('.acf-fields').css('width', '80%')
			}
			else if ($blockCol.siblings('.acf-field-widget-area').length !==0){
				$repeaters	.attr({'style':'width: ' + currentrepeatersWidth + '%; margin:0; box-sizing: border-box;'})							
			}
			else {
				$repeaters	.attr({'style':'width: ' + currentrepeatersWidth + '%; margin:0; box-sizing: border-box;'})
			}
			$repeaters	.children('td').css({'border-top-width':'0'})
						.find('.acf-field-wysiwyg').css({'padding': '10px 0'});	
		}
		else {
			if($blockCol.siblings('.acf-field-gallery').length !== 0) {
				$repeaters.width('100%')
			}
			else {
				$repeaters.parent().removeAttr( 'style' )
				$repeaters	.removeAttr( 'style' )
								.children('td').removeAttr( 'style' )
								.find('.acf-field-wysiwyg').removeAttr( 'style' );
				$repeaters.find('.acf-fields').removeAttr( 'style' );				
			}
		}
		$inputCols.change(function() {

			if($(this).parents('.acf-field-radio').siblings('.acf-field-repeater').find('.acf-repeater').length !== 0)
				$repeaters = $(this).parents('.acf-field-radio').siblings('.acf-field-repeater').find('.acf-repeater').find('.acf-row');
			else if ($(this).parents('.acf-field-radio').siblings('.acf-field-widget-area').length !==0){
				$repeaters = $(this).parents('.acf-field-radio').siblings('.acf-field-widget-area').find('.values').find('.layout');
			}
			else {
				$repeaters = $(this).parents('.acf-field-radio').siblings('.acf-field-gallery').find('.acf-gallery-attachment');
			}

			currentrepeatersWidth = 100/$(this).val();
			if($(this).val() != 1) {
				$repeaters.parent().css({'display': '-webkit-flex', 'display': '-ms-flexbox', 'display': 'flex', '-webkit-flex-wrap': 'wrap', '-ms-flex-wrap': 'wrap', 'flex-wrap': 'wrap'})
				if($repeaters.parents('.acf-field-repeater').find('.acf-repeater').length !== 0) {
					$repeaters	.attr({'style':'display: -webkit-flex; display: -ms-flexbox; display: flex; width: ' + currentrepeatersWidth + '%; border-bottom: 1px solid #DFDFDF; border-top: none; box-sizing: border-box'})
				}
				else if($repeaters.parents('.acf-field-widget-area').length !== 0) {
					$repeaters	.attr({'style':'width: ' + currentrepeatersWidth + '%; margin:0; box-sizing: border-box'})
				}
				else {
					$repeaters	.attr({'style':'width: ' + currentrepeatersWidth + '%; margin:0; box-sizing: border-box;'})
				}
				$repeaters	.children('td').css({'border-top-width':'0'})
							.find('.acf-field-wysiwyg').css({'padding': '10px 0'});
			}
			else {
				if($repeaters.parents('.acf-field-gallery').length !== 0) {
					$repeaters.width('100%')
				}
				else {
					$repeaters.parent().removeAttr( 'style' )
					$repeaters	.removeAttr( 'style' )
								.children('td').removeAttr( 'style' )
								.find('.acf-field-wysiwyg').removeAttr( 'style' )
				}
			}
			
		})
	})


	// $inputCols.change(function() {
	// 	repeaters = $(this).parents('.acf-field-radio').siblings('.acf-field-repeater').find('.acf-repeater');
	// 	console.log(repeaters);
	// 	repeaters.width(100/$(this).val() + '%')
		
	// })

	// $('input:radio').change(function() {
	// 	console.log($(this).val());
	// 	console.log("ok");
	// })
});