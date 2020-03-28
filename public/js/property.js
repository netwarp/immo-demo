if (document.querySelector('.card-property')) {
    const img_smalls = document.querySelectorAll('.img-small');
    const img_link = document.querySelector('.img-link');
    const img_large = document.querySelector('.img-large');

    for (img of img_smalls) {
        img.addEventListener('click', (event) => {
            src = event.target.src;

            img_link.setAttribute('href', src);
            img_large.setAttribute('src', src)
        });
    }

    console.log('FancyApp')
}
