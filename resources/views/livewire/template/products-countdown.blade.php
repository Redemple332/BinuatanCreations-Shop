<div>

    <div wire:poll.750ms>
        @php
        $countdown = Countdown::from(now())
        ->to( $this->flashsale)->get(); 
        @endphp
        <ul class="product-countdown">
            @if ($countdown->weeks)
            <li><span>{{ $countdown->weeks}} W</span></li>
            @endif
            <li><span>{{ $countdown->days}} D</span></li>
            <li><span>{{ $countdown->hours}} H</span></li>
            <li><span>{{ $countdown->minutes}} M</span></li>
            <li><span>{{ $countdown->seconds}} S</span></li>
        </ul>   

    </div>
</div>
