<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
    <div>
        @foreach ($robots as $robot)
        <div class="container-fluid">
            <div class="card card-background">
                <div class="col-md-1 image-container">
                    {{-- <img src="{{ asset('images/logo.png') }}" class="card-img" :alt="robot.robotId"> --}}
                    @php
                    $modelImage = \App\Models\ModelChoice::where('model_name', $robot['robotModel'])->value('image_path');

                    $imagePath = $modelImage ? asset('images/' . $modelImage) : asset('images/robotModel/logo.png');
                    @endphp
                    <img src="{{ $imagePath }}" class="card-img" :alt="robot.robotId">
                    <button class="button" onclick="window.location.href = '{{ $robot['editRoute'] }}'">Edit</button>
                </div>
                <div class=" col-md-4">
                    <div class="card-body">
                        <p><strong>Robot Name: </strong>{{ $robot['robotName'] ?? '-' }}</p>
                        <p><strong>Robot Model: </strong>{{ $robot['robotModel'] ?? '-' }}</p>
                        <p><strong>Supplier: </strong>{{ $robot['supplier'] ?? '-' }}</p>
                        <p><strong>Mac Address: </strong>{{ $robot['macAddress'] ?? '-' }}</p>
                        <p><strong>PID: </strong>{{ $robot['pid'] ?? '-' }}</p>
                        <p><strong>Charge State: </strong>{{ $robot['data']['chargeStage'] }}</p>
                        <p><strong>Move State: </strong>{{ $robot['data']['moveState'] }}</p>
                        <p><strong>Robot State: </strong>{{ $robot['data']['robotState'] }}</p>
                        <p><strong>Robot Power: </strong>{{ $robot['data']['robotPower'] }} %</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
