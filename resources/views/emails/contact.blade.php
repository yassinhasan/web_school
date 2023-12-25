<x-mail::message>
{{ $data['subject'] }}

{{ $data['message'] }}
<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ $data['name'] }}
</x-mail::message>
