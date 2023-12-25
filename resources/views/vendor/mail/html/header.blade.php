@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')

 
<img src="{{url('images/settings/'.getLogoImage())}}" class="logo" alt="website Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
