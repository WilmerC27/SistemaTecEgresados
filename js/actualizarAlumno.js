document.addEventListener('DOMContentLoaded', function (jsVar) {

    if (screen.width < 768) {
        document.querySelector('#form-tel').classList.remove('d-flex', 'me-2')
    } else {
        document.querySelector('#form-tel').classList.remove('d-flex', 'me-2')
    }

    window.addEventListener('resize', function () {
        console.log(document.documentElement.clientWidth);
        if (document.documentElement.clientWidth < 768) {
            document.querySelector('#form-tel').classList.remove('d-flex', 'me-2')
        } else if (document.documentElement.clientWidth > 768) {
            document.querySelector('#form-tel').classList.add('d-flex', 'me-2')
        }
    });
})
