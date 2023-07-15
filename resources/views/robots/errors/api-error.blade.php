<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/custom-error-dialog.css') }}">
    <div id="error-dialog" class="error-dialog">
        <div class="error-dialog-content">

            <div>
                <h3>Opps!</h3>
                <p id="error-message">{{ $error }}</p>
                <button id="close-dialog-button">Close</button>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.getElementById('close-dialog-button').addEventListener('click', function() {
        document.getElementById('error-dialog').style.display = 'none';
    });

</script>
