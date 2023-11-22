$(document).ready(function() {
	

	// add to cart effect-------------------
    if ( 0 < $('.product a').length ) {
		$('.product a').click(function() {
			var offset = $(this).parent().offset();
			$(this).parent().clone().addClass('product-clone').css({
				'left' : offset.left + 'px',
				'top' : parseInt(offset.top-$(window).scrollTop()) + 'px',
				'width' :  $(this).parent().width() + 'px',
				'height' : $(this).parent().height() + 'px'
			}).appendTo($('.product').parent());
			
      var price = parseInt($('#cart_price').attr('data-price'));
      var productPrice = parseInt($(this).attr('data-price'));
	  var url=$(this).attr('href');
			var cart = $('.top-nav ul li div  span').offset();
			$('.product-clone').animate( { top: parseInt(cart.top-$(window).scrollTop()) + 'px', left: cart.left + 'px', 'height': '0px', 'width': '0px' }, 800, function(){
	            $(this).remove();
	            var cartPrice = parseInt(price+productPrice);
	            $('.total-section p span').html('৳' + cartPrice);
	            $('#cart_price').attr('data-price', cartPrice);
				
	        });
		});
	};



	// add to cart product-------------------
	// change url before upload---------
$('.addToCart').click(function(e){
	e.preventDefault();
	var Url=$(this).attr('href');
	var sel = $('#carts_products');
	$.ajax({
		url: Url,
		method: "GET",
		success: function (data) {
			sel.html('');
			var quantity=0;
			$.each(data, function(key, value) { 
				var imageUrl='http://localhost/lowtake/public/images/'+value['image'];
				   sel.append(`
				   <tr id="${value['id']}">
						<td> <img src="${imageUrl}"  height="50" width="80"/></td>
							  <td class="text-center">${value['name']}</td>
							  <td>${value['quantity']}</td>
							  <td>৳ ${value['price']}</td>
							
					</tr>
				   `);
				   quantity++; 
			});
	
			$('#cart_qty').text(quantity);
			$('#view_all').removeClass('d-none');
		}
	});

// var qantity=parseInt($('#cart_qty').attr('data-qty'));
	// 	qantity=qantity+1;
	// 	$('#cart_qty').attr('data-qty',qantity.toString());
	// 	$('#cart_qty').text(qantity.toString());


});





// remove item from cart----------
// $("#carts_products").on("click", "a", function() {
// 	$(this).closest("tr").remove();
//  });






});