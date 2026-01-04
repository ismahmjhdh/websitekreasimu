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
    const mapSliderContainer = document.getElementById('mapSliderContainer');
    const mapPrevBtn = document.getElementById('mapPrevBtn');
    const mapNextBtn = document.getElementById('mapNextBtn');
    const indicators = document.querySelectorAll('.indicator');

    if (mapSliderContainer && mapPrevBtn && mapNextBtn && indicators.length > 0) {
        let currentMapIndex = 0;
        const totalMaps = document.querySelectorAll('.map-image').length;

        function updateMapSlider(index) {
            // Constrain index between 0 and total maps - 1
            currentMapIndex = Math.max(0, Math.min(index, totalMaps - 1));
            
            // Update transform
            mapSliderContainer.style.transform = `translateX(-${currentMapIndex * 100}%)`;
            
            // Update indicators
            indicators.forEach((indicator, i) => {
                indicator.classList.toggle('active', i === currentMapIndex);
            });
        }

        mapPrevBtn.addEventListener('click', () => {
            updateMapSlider(currentMapIndex - 1);
        });

        mapNextBtn.addEventListener('click', () => {
            updateMapSlider(currentMapIndex + 1);
        });

        // Click on indicators
        indicators.forEach((indicator) => {
            indicator.addEventListener('click', () => {
                const index = parseInt(indicator.dataset.index);
                updateMapSlider(index);
            });
        });
    }

    // =============================
    // STRUKTUR ORGANISASI (INI YANG KAMU BUTUH)
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


});


