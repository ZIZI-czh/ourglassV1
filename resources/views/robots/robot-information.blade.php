<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
    <div>
        @foreach ($robots as $robot)
        <div class="container-fluid">
            <div class="card card-background">
                <div class="col-md-1">
                    <img src="{{ asset('images/logo.png') }}" class="card-img" :alt="robot.robotId">
                    <button class="button" onclick="window.location.href = '{{ $robot['editRoute'] }}'">Edit</button>
                </div>
                <div class=" col-md-4">
                    <div class="card-body">
                        <p>Robot Name: {{ $robot['robotName']  ?? '-'}}</p>
                        <p>Robot Model: {{ $robot['robotModel'] ?? '-' }}</p>
                        <p>Supplier: {{ $robot['supplier'] ?? '-' }}</p>
                        <p>Mac Address: {{ $robot['macAddress'] ?? '-' }}</p>
                        <p>PID: {{ $robot['pid'] ?? '-' }}</p>
                        <p>Charge State: {{ $robot['data']['chargeStage'] }}</p>
                        <p>Move State: {{ $robot['data']['moveState'] }}</p>
                        <p>Robot State: {{ $robot['data']['robotState'] }}</p>
                        <p>Robot Power: {{ $robot['data']['robotPower'] }} %</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
