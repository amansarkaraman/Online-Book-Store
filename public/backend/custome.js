function showDeleteConfirmation() {
    if (window.confirm("Are you sure you want to delete?")) {
    } else {

    }
}


function previewImage(input, prewiew_id)
{
    let img = input.files[0];
    if (img) {
        let preview_img = document.getElementById(prewiew_id);

        let picture = new FileReader();
        picture.readAsDataURL(img);
        picture.addEventListener('load', function(event) {
            preview_img.setAttribute('src', event.target.result);
            preview_img.style.display = 'block';
        });
    }
}
