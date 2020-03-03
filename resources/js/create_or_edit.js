function getBase64(file) {
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function () {
        console.log(reader.result);
    };
    reader.onerror = function (error) {
        console.log('Error: ', error);
    };
}

const file_inputs = document.querySelectorAll('.file-input');

for (let file_input of file_inputs) {
    file_input.addEventListener('change', async (event) => {
        console.log(await getBase64(event.target));
    });
}


