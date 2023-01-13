/* wz-tab start */
document.getElementById('jquery.min').addEventListener('load', function () {
	console.log('wz-tab start');
	$('.section-tariff').each(function(index) {
		$(this).find('.section-tariff-content .tab-content').removeAttr('style');
		$(this).attr('id', 'section-tariff-' + index);
		$(this)
		.find('.section-tariff-navigation .tab')
		.data('parent-id', $(this).attr('id'))
		.click(function() {
			console.log('wz-tab $(this).data(\'parent-id\'): ' + $(this).data('parent-id'));
			$('#' + $(this).data('parent-id')).find('.section-tariff-navigation .tab.active').toggleClass('active');
			$(this).toggleClass('active');
			$('#' + $(this).data('parent-id')).find('.section-tariff-content .tab-content.active').toggleClass('active');
			$('#' + $(this).data('parent-id')).find('.section-tariff-content .tab-content[data-id="' + $(this).attr('id') + '"]').toggleClass('active');
		});
	});
	console.log('wz-tab end');
});
/* wz-tab end */