<!-- View stored in resources/views/page.blade.php -->
<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		@foreach ($page->getCritical() as $template)
			@include($template)
		@endforeach
		@stack('style-slider')
		@include('style')
		@include('script')
	</body>
    <body class="{{ $page->echoTags() }}">
		<div class="debug">{!! $messages !!}</div>
		@for($i = 0; $i < 6; $i++)
			@foreach ($page->getSections() as $section)
				@foreach ($section->getTemplate() as $template)
					@include($template, ['section' => $section])
				@endforeach
			@endforeach
		@endfor
    </body>
</html>