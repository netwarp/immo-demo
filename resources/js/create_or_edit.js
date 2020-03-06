document.querySelectorAll('.remove').forEach((remove_btn) => {
    remove_btn.addEventListener('click', (event) => {
        const index = event.target.closest('.img-upload').getAttribute('id');

        event.target.closest('.img-upload').innerHTML = `<input type="file" name="images[]" accept="image/*" id="input-image-{{ $i }}">`


    });
});
