<!-- View stored in resources/views/tariff-item.blade.php -->
<div class="tariff-item" style="flex: 1 1 0px;">
	@if($popular)
		<div class="tariff-item-popular">{{ __('tariff-price.popular') }}</div>
	@endif
	<h3 class="tariff-item-title {{ ($priceKey == 1 ? 'popular' : '') }}">{{ $price->getName() }}</h3>
	<div class="tariff-item-price">
		@foreach ($price->getPrice() as $currency => $price)
			<span class="wz-{{ $currency }}">
			@if (in_array($currency, $section->getCurrencyPosition()))
				<span class="currency">{{ $section->getCurrency($currency) }}</span>{{ $price }}
			@else
				{{ $price }}<span class="currency">{{ $section->getCurrency($currency) }}</span>
			@endif
			</span>
		@endforeach
	</div>
	@isset($priceBefore)
	<div class="tariff-item-price-before">
		@foreach ($priceBefore->getPrice() as $currency => $price)
			<span class="wz-{{ $currency }}">
			@if (in_array($currency, $section->getCurrencyPosition()))
				{{ $section->getCurrency($currency) }}{{ $price }}
			@else
				{{ $price }} {{ $section->getCurrency($currency) }}
			@endif
			</span>
		@endforeach
	</div>
	@endisset
	<div class="tariff-item-price-comment tooltip">{{ __('tariff-price.comment') }}</div>
	<div class="tariff-item-price-tooltip">{{ __('tariff-price.tooltip') }}</div>
	<div class="tariff-item-checklist">
		<div class="tariff-item-checklist-item allow">{{ __('tariff-price.item.integration') }}</div>
		@foreach ($items as $itemKey => $item)
			<div class="tariff-item-checklist-item {{ $item->getCSSClass() }} {{ ($itemKey == 1 ? 'tooltip' : '') }}">{{ $item->getName() }}</div>
		@endforeach
		<div class="tariff-item-price-tooltip item">{{ __('tariff-price.item.tooltip') }}</div>
	</div>
	<a href="/#signup" class="tariff-item-button">{{ __('tariff-price.button') }}</a>
</div>