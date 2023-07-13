<html>
<link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
<div class="row">
    <div class="col-md-9">
        <select name="robot_model" id="robot_model">
            <option value="">Select a robot model</option>
            @foreach ($robotModels as $model)
            <div class="card card-background">
                <div class="row no-gutters">
                    <option value="{{ $model->id }}" data-image="{{ $model->image_path }}">{{ $model->model_name }}</option>
                </div>
            </div>
            @endforeach
        </select>
    </div>
</div>

<div id="image-container" style="display: none;">
    <img id="robot_image" src="" alt="Robot Image" class="robot-image">
</div>

</html>
<script src="{{ asset('js/uploadRobotModel.js') }}"></script>
