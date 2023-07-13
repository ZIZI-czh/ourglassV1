@foreach ($robots as $robot)
<div class="container-fluid">
    <div class="card card-background">
        <div class="col-md-1">
            <img src="{{ asset('images/logo.png') }}" class="card-img" alt="{{ $robot['robotId'] }}">
            {{-- <button class="button" wire:click="openEditModal('{{ $robot['robotId'] }}')">Edit</button> --}}

            <button onclick="Livewire.emit('openModal', 'edit-modal-component')">Open Modal</button>
        </div>
        <div class="col-md-4">
            <div class="card-body">
                <p>Robot name: {{ $robot['robotId'] }}</p>
                <p>Charge State: {{ $robot['data']['chargeStage'] }}</p>
                <p>Move State: {{ $robot['data']['moveState'] }}</p>
                <p>Robot State: {{ $robot['data']['robotState'] }}</p>
                <p>Robot Power: {{ $robot['data']['robotPower'] }}</p>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Add the edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal content goes here -->
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('openEditModal', function() {
            $('#editModal').modal('show');
        });

        Livewire.on('closeEditModal', function() {
            $('#editModal').modal('hide');
        });
    });

</script>
