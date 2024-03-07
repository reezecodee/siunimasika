const inputImage = document.getElementById("picture");
const imagePreview = document.getElementById("preview");
const fileName = document.getElementById("file-name");
const cancelButton = document.getElementById("cancel-btn");

inputImage.addEventListener("change", (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (event) {
            const imageUrl = event.target.result;
            imagePreview.setAttribute("src", imageUrl);
            fileName.textContent = file.name;
            cancelButton.style.display = "block";
        };
        reader.readAsDataURL(file);
    } else {
        imagePreview.setAttribute("src", "/img/example.png");
    }
});

cancelButton.addEventListener("click", () => {
    inputImage.value = null;
    imagePreview.setAttribute("src", "/img/example.png");
    fileName.textContent = "";
    cancelButton.style.display = "none";
});


