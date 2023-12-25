<x-mail::message>

wellcom {{ $data['first_name']." ".$data['last_name'] }} you are invited to zoom {{ $data['topic'] }}   click <a href="{{ $data['join_url']}}"> here </a>  to join zoom class

your zoom class will start at
{{ 
    $data['start_at']
}}


Thanks,<br>
my best wiches 
</x-mail::message>
