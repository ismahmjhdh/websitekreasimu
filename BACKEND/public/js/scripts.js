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

    if (slides && slideItems.length > 0) {
        let heroIndex = 0;

        function updateHeroSlider() {
            slides.style.transform = `translateX(-${heroIndex * 100}%)`;
        }

        setInterval(() => {
            heroIndex = (heroIndex + 1) % slideItems.length;
            updateHeroSlider();
        }, 4000);
    }

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
       4. MAP SLIDER (LOKASI INTERVENSI)
    =============================== */
    const mapSliderContainerLarge = document.getElementById('mapSliderContainerLarge');
    const mapPrevBtnLarge = document.getElementById('mapPrevBtnLarge');
    const mapNextBtnLarge = document.getElementById('mapNextBtnLarge');

    if (mapSliderContainerLarge && mapPrevBtnLarge && mapNextBtnLarge) {
        let currentMapIndexLarge = 0;
        const totalMapsLarge = document.querySelectorAll('.map-image-large').length;

        function updateMapSliderLarge(index) {
            // Constrain index between 0 and total maps - 1
            currentMapIndexLarge = Math.max(0, Math.min(index, totalMapsLarge - 1));

            // Update transform
            mapSliderContainerLarge.style.transform = `translateX(-${currentMapIndexLarge * 100}%)`;
        }

        mapPrevBtnLarge.addEventListener('click', () => {
            updateMapSliderLarge(currentMapIndexLarge - 1);
        });

        mapNextBtnLarge.addEventListener('click', () => {
            updateMapSliderLarge(currentMapIndexLarge + 1);
        });
    }

    // =============================
    // STRUKTUR ORGANISASI
    // =============================
    window.showStruktur = function (no) {
        document.querySelectorAll('.struktur').forEach(el => {
            el.classList.remove('active');
        });

        document.querySelectorAll('.struktur-btn button').forEach(btn => {
            btn.classList.remove('active');
        });

        const target = document.getElementById('struktur' + no);
        if (target) target.classList.add('active');

        document.querySelectorAll('.struktur-btn button')[no - 1]
            ?.classList.add('active');
    };

    /* ===============================
       5. GALERI DETAIL SLIDER
    =============================== */
    const galeriImageSlider = document.getElementById('galeriImageSlider');
    const galeriPrevBtn = document.getElementById('galeriPrevBtn');
    const galeriNextBtn = document.getElementById('galeriNextBtn');
    const galeriCurrentSpan = document.getElementById('galeri-current');
    const galeriCurrentBadge = document.getElementById('galeri-current-badge');

    if (galeriImageSlider && galeriPrevBtn && galeriNextBtn) {
        let currentGaleriIndex = 0;
        const totalGaleriImages = document.querySelectorAll('.galeri-image-item').length;

        function updateGaleriSlider() {
            galeriImageSlider.style.transform = `translateX(-${currentGaleriIndex * 100}%)`;
            galeriCurrentSpan.textContent = currentGaleriIndex + 1;
            galeriCurrentBadge.textContent = currentGaleriIndex + 1;
        }

        galeriPrevBtn.addEventListener('click', () => {
            currentGaleriIndex = (currentGaleriIndex - 1 + totalGaleriImages) % totalGaleriImages;
            updateGaleriSlider();
        });

        galeriNextBtn.addEventListener('click', () => {
            currentGaleriIndex = (currentGaleriIndex + 1) % totalGaleriImages;
            updateGaleriSlider();
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                currentGaleriIndex = (currentGaleriIndex - 1 + totalGaleriImages) % totalGaleriImages;
                updateGaleriSlider();
            } else if (e.key === 'ArrowRight') {
                currentGaleriIndex = (currentGaleriIndex + 1) % totalGaleriImages;
                updateGaleriSlider();
            }
        });
    }
});



