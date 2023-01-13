<div class="section-slider">
	<div class="column-data">
		<h1 class="slider-title">{!! $section->getName() !!}</h1>
		<div class="slider-description">{!! $section->getDescription() !!}</div>
		<a class="slider-button">{{ $section->getButton() }}</a>
		<div class="slider-bubble"><div class="slider-bubble-text">{!! $section->getBubble() !!}</div></div>
	</div>
</div>