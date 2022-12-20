$(function() {

	function showCart(cart)
	{
		$('#cart-modal .modal-cart-content').html(cart);
		$('#cart-modal').modal();

		let cartQty = $('#modal-cart-qty').text() ? $('#modal-cart-qty').text() : 0;
		$('.mini-cart-qty').text(cartQty);
	}
});