<div>
    <h1>Hello World!</h1>
    <div>
    <input wire:model="search" type="text" placeholder="Search users..."/>
 
    <ul>
        @foreach($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
</div>

</div>