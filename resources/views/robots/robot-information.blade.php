<x-app-layout>
    <div class="container">
        <h1>Robot Information</h1>
        @foreach ($robots as $robot)
        <div class="card">
            <div class="card-body">
                <p>Charge State: {{ $robot['data']['chargeStage'] }}</p>
                <p>Move State: {{ $robot['data']['moveState'] }}</p>
                <p>Robot State: {{ $robot['data']['robotState'] }}</p>
                <p>Robot Power: {{ $robot['data']['robotPower'] }}</p>
            </div>
        </div>
        @endforeach
    </div>


</x-app-layout>
