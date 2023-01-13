@foreach ($page->getScript() as $script)
	{{--<link rel="preload" href="{{ asset('/js/' . $script . '.js') }}" as="script" onload="this.onload=null;this.rel='script'" />--}}
	<script id="{!! $script !!}" src="{{ asset('/js/' . $script . '.js') }}" async></script>
@endforeach