<div>
    <input wire:model="search" type="text" placeholder="Search animals..."/>

    <ul>
        @foreach($animals as $animal)
            <li>{{ $animal->pet_name }}</li>
        @endforeach
    </ul>
</div>
