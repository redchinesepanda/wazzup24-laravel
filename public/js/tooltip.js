/* wz-tooltip start */
document.getElementById('jquery.min').addEventListener('load', function () {
	console.log('wz-tooltip start');
	$('.tooltip').each(function(){
		$(this).click(function() {
			  $(this).next('.tariff-item-price-tooltip').toggleClass('active');
		});
	});
	console.log('wz-tooltip end');
});
/* wz-tooltip end */