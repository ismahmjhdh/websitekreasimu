document.addEventListener('DOMContentLoaded', () => {

    /* ===============================
       1. HAMBURGER MENU
    =============================== */
    const hamburger = document.getElementById('hamburger');
    const mainNav = document.getElementById('main-nav-menu');

    if (hamburger && mainNav) {
        hamburger.addEventListener('click', () => {
            mainNav.classList.toggle('menu-open');

            const icon = hamburger.querySelector('i');
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-times');
        });
    }

    /* ===============================
       2. HERO SLIDER
    =============================== */
    const slides = document.querySelector('.slides');
    const slideItems = document.querySelectorAll('.slide');
    let heroIndex = 0;

    function updateHeroSlider() {
        slides.style.transform = `translateX(-${heroIndex * 100}%)`;
    }

    setInterval(() => {
        heroIndex = (heroIndex + 1) % slideItems.length;
        updateHeroSlider();
    }, 4000);

    /* ===============================
       3. GALERI VIEWER (galeri.html)
    =============================== */
    const galeriViewer = document.querySelector('.galeri-viewer');

    if (galeriViewer) {
        const imageElement = galeriViewer.querySelector('.galeri-image');
        const prevArrow = document.querySelector('.prev-arrow');
        const nextArrow = document.querySelector('.next-arrow');
        const counter = document.querySelector('.galeri-counter');

        const images = [
            'https://via.placeholder.com/800x600?text=Kegiatan+1',
            'https://via.placeholder.com/800x600?text=Kegiatan+2',
            'https://via.placeholder.com/800x600?text=Kegiatan+3'
        ];

        let galeriIndex = 0;

        function updateGaleri() {
            imageElement.style.backgroundImage = `url(${images[galeriIndex]})`;
            counter.textContent = `FOTO ${galeriIndex + 1}/${images.length}`;
        }

        nextArrow.addEventListener('click', () => {
            galeriIndex = (galeriIndex + 1) % images.length;
            updateGaleri();
        });

        prevArrow.addEventListener('click', () => {
            galeriIndex = (galeriIndex - 1 + images.length) % images.length;
            updateGaleri();
        });

        updateGaleri();
    }

    /* ===============================
       4. MAP SLIDER
    =============================== */
    const track = document.getElementById('mapTrack');
    if (track) {
        let mapIndex = 0;
        const total = track.children.length;

        window.nextMap = function () {
            if (mapIndex < total - 1) {
                mapIndex++;
                updateMap();
            }
        };

        window.prevMap = function () {
            if (mapIndex > 0) {
                mapIndex--;
                updateMap();
            }
        };

        function updateMap() {
            track.style.transform = `translateX(-${mapIndex * 100}%)`;
        }
    }

});
