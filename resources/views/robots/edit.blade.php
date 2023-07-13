<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/custom-form.css') }}">
    <div class="container">
        <div class="center-content form">

            <h1>Robot Information</h1>
            <x-validation-errors class=" mb-4" />
            {{-- <form method="POST" action="{{ route('robot-information.update', $robot['robotId'])}}"> --}}
            <form method="POST" action="{{ route('robot-information.update', ['robotId' => $robot['robotId']]) }}">

                @csrf
                @method('PUT')
                <input type="hidden" name="robotId" value="{{ $robot['robotId'] }}">
                <input type="hidden" name="groupId" id="groupId" value="{{ $robot['groupId'] }}">

                <div class="form-group">
                    <div class="row">
                        <div class="col-25">
                            <label for="robotName">Robot Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="robotName" id="robotName" value="{{ $robot['robotName'] ?? '' }}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-25">
                            <label for="macAddress">Mac Address</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="macAddress" id="macAddress" value="{{ $robot['macAddress'] ?? '' }}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-25">
                            <label for="pid">PID</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="pid" id="pid" value="{{ $robot['pid'] ?? '' }}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-25">
                            <label for="robotModel">Robot Model</label>
                        </div>
                        <div class="col-75">
                            <select name="robotModel" id="robotModel" class="form-control">
                                <option value="">Select robot model</option>
                                <option value="Pudu1">Pudu1</option>
                                <option value="Pudu2">Pudu2</option>
                                <option value="Bella">Bella</option>
                                <option value="Ketty">Ketty</option>
                                <option value="HolaBot">HolaBot</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-25">
                            <label for="supplier">Supplier</label>
                        </div>
                        <div class="col-75">

                            <select name="supplier" id="supplier" class="form-control">
                                <option value="">Select supplier</option>
                                <option value="Ourglass">Ourglass</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                    </div>
                </div>

                <div class="centralizeElement">
                    <button type="submit" class="btn btn-primary btn-save">Save</button>
                    <button type="button" class="btn btn-secondary btn-cancel">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cancelButton = document.querySelector('.btn-cancel');
        cancelButton.addEventListener('click', function() {
            window.location.href = '{{ route("robot-information") }}';
        });
    });

</script>
