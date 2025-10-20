@if (count($listings) <= 0)
<h4>No listing found!</h4>
@else
@foreach ($listings as $listing )
<h4>{{ $listing["title"] }}</h4>
<h3>{{ $listing["body"] }}</h3>
@endforeach
@endif