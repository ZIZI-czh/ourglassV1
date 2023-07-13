// script.js
document.getElementById('robot_model').addEventListener('change', function () {
    var selectedModelId = this.value;
    var imageContainer = document.getElementById('image-container');
    var robotImage = document.getElementById('robot_image');

    if (selectedModelId) {
        var selectedOption = this.options[this.selectedIndex];
        var imagePath = selectedOption.getAttribute('data-image');

        if (imagePath) {
            robotImage.src = imagePath;
            imageContainer.style.display = 'block';
        } else {
            robotImage.src = '';
            imageContainer.style.display = 'none';
        }
    } else {
        robotImage.src = '';
        imageContainer.style.display = 'none';
    }
});
