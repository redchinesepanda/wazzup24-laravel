@foreach ($page->getStyle() as $style)
	<link rel="preload" href="{{ asset('/css/' . $style->getName() . '.css') }}" {!! ($style->getMedia() != '' ? 'media="' . $style->getMedia() . '"' : '') !!} as="style" onload="this.onload=null;this.rel='stylesheet'" />
@endforeach