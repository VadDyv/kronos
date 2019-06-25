$(document).on("click", ".save_order_button", function (e) {
	e.preventDefault();
	// console.log($('#input-phone__code').html());
	// console.log($('#input-phone__code').html());
	//$('#POPUP_FOUNDED_CHEAPER_PHONE').val($('#input-phone__code').html());
	//console.log($('#POPUP_FOUNDED_CHEAPER_PHONE').val());
    $.post( '/local/include/ajax/save_order.php', $('#save_order_form').serialize(), function(data) {
		 $('.popup__body').html(data);
       }
    );
		
});

  
$(document).on('submit', '.save_phone_form', function (e) {
	console.log('submit');
	$.ajax({
		url: '/local/include/ajax/save_phone.php',
		type: 'POST',
		data: new FormData(this),
		processData: false,
		contentType: false,
		success: function( data )  {
			$('.popup__body').html(data);
		}
	});
	e.preventDefault();
});
