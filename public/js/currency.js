/* wz-currency-ajax start */
document.getElementById('jquery.min').addEventListener('load', function () {
	console.log('wz-currency-ajax start');
	let currencyDefault = 'rur';
	let container = $('.section-tariff');
	console.log( 'wz-currency-ajax container class: ' +  container.attr('class'));
	let url = window.location.href;
	console.log('wz-currency-ajax url: ' + url);
	$.ajaxSetup({ cache: false });
	let jqxhr = $.getJSON( "/ajax", function(json) {
		console.log( "wz-currency-ajax success" );
		console.log( "wz-currency-ajax json:" + json );
		console.log( "wz-currency-ajax json:" + JSON.stringify(json, null, 2) );
		let currency = json.data.currency.toLowerCase();
		console.log( 'wz-currency-ajax json.data.currency: ' +  currency);
		container.each(function(){
			$(this).toggleClass('wz-' + currencyDefault + ' wz-' + currency);
		});
		console.log( 'wz-currency-ajax container class: ' +  container.attr('class'));
	})
	.fail(function( jqxhr, textStatus, error ) {
		console.log( "wz-currency-ajax fail: " + textStatus + ", " + error );
	})
	console.log('wz-currency-ajax end');
});
/* wz-currency-ajax end */