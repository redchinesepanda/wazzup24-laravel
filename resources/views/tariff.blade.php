<!-- View stored in resources/views/tariff.blade.php -->
<div class="section-tariff wz-rur">
	<h2 class="section-tariff-title" style="text-align: center;">{{ $section->getName() }}</h2>
	<div class="section-tariff-navigation" style="display: flex; justify-content: center; gap: 24px;">
		@foreach ($section->getCategories() as $categoryKey => $category)
			<div class="tab {{($categoryKey == 2 ? 'active' : '')}}" id="{{ $loop->index }}">
				{{ $category->getName() }}
				@if(!empty($category->getDiscount()))
				 ({{ $category->getDiscount() }})
				@endif
			</div>
		@endforeach
	</div>
	<div class="section-tariff-content" style="min-height: 536px;">
		@foreach ($section->getCategories() as $categoryKey => $category)
			<div class="tab-content{{ ($categoryKey == 2 ? ' active' : '') }}" data-id="{{ $loop->index }}" style="{{ ($categoryKey == 2 ? 'display: flex; justify-content: center; flex-wrap: wrap;' : 'display: none;') }}">
				@foreach ($category->getPrices() as $priceKey => $price)
					@include('tariff-price', ['price' => $price, 'items' => $section->getItem($loop->index), 'priceBefore' => ($categoryKey != 0 ? $section->getCategory(0)->getPrice($price->getName()) : null), 'popular' => ($priceKey == 1 ? true : false)])
				@endforeach
			</div>
		@endforeach
	</div>
</div>