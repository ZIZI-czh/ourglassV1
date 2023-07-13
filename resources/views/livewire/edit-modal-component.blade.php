{{-- <link rel="stylesheet" href="{{ asset('css/custom-modal.css') }}"> --}}

<div>
    @if ($isModalOpen)
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Modal</h5>
                    <button type="button" class="close" aria-label="Close" wire:click="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add your modal content here -->
                    <p>This is the modal content.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    @endif
</div>
