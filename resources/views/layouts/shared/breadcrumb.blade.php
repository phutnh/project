<section class="content-header">
  <h1>
    {{ $template['pageHeader'] }}
    <small>{{ $template['pageDesc'] }}</small>
  </h1>
  <ol class="breadcrumb">
  	@foreach ($template['breadcrumbs'] as $breadcrumb)
  	@if ($breadcrumb['active'])
  	<li class="active">{{ $breadcrumb['name'] }}</li>
  	@else
  	<li>
  		<a href="{{ $breadcrumb['link'] }}">
  			<i class="fa fa-dashboard"></i> {{ $breadcrumb['name'] }}
  		</a>
  	</li>
  	@endif
  	@endforeach
  </ol>
</section>