document.addEventListener('DOMContentLoaded', function () {
    var faturaIslemleri = document.getElementById("fatura-islemleri");
    var toggleButton = document.getElementById("fatura-toggle-button");

    toggleButton.addEventListener('click', function () {
        faturaIslemleri.classList.toggle('is-hidden');
    });
});
document.addEventListener('DOMContentLoaded', function () {
    var musteriIslemleri = document.getElementById("musteri-islemleri");
    var musteriToggleButton = document.getElementById("musteri-toggle-button");

    musteriToggleButton.addEventListener('click', function () {
        musteriIslemleri.classList.toggle('is-hidden');
    });
});
document.addEventListener('DOMContentLoaded', function () {
    var sozlesmeIslemleri = document.getElementById("sozlesme-islemleri");
    var sozlesmeToggleButton = document.getElementById("sozlesme-toggle-button");

    sozlesmeToggleButton.addEventListener('click', function () {
        sozlesmeIslemleri.classList.toggle('is-hidden');
    });
});
document.addEventListener('DOMContentLoaded', function () {
    var navbarDropdown = document.getElementById('navbar-dropdown');
    var navToggleButton = document.getElementById("navbar-toggle-button");

    navToggleButton.addEventListener('click', function () {
        navbarDropdown.classList.toggle('is-hidden');
    })
});
