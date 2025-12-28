document.addEventListener('DOMContentLoaded', () => {
    
    // ==============================================
    // 1. HAMBURGER MENU TOGGLE (Menu Responsif)
    // ==============================================
    const hamburger = document.getElementById('hamburger');
    const mainNav = document.getElementById('main-nav-menu');

    if (hamburger && mainNav) {
        hamburger.addEventListener('click', () => {
            mainNav.classList.toggle('menu-open');
            
            const icon = hamburger.querySelector('i');
            if (mainNav.classList.contains('menu-open')) {
                // Mengubah ikon dari hamburger ke X (close)
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                // Mengubah ikon dari X ke hamburger
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
            
        });
    }
    let currentIndex = 0;
const slides = document.querySelector('.slides');
const slideElements = document.querySelectorAll('.slide');

function updateSlider() {
  slides.style.transform = `translateX(-${currentIndex * 100}%)`;
 }


    // ==============================================
    // 2. SLIDER/VIEWER GALERI (Untuk galeri.html)
    // ==============================================
    const galeriViewer = document.querySelector('.galeri-viewer');
    
    if (galeriViewer) {
        const imageElement = galeriViewer.querySelector('.galeri-image');
        const prevArrow = document.querySelector('.prev-arrow');
        const nextArrow = document.querySelector('.next-arrow');
        const counterElement = document.querySelector('.galeri-counter');

        // DAFTAR GAMBAR GALERI
        const images = [
            'https://via.placeholder.com/800x600/536dfe/FFFFFF?text=Kegiatan+1',
            'https://via.placeholder.com/800x600/8c9eff/FFFFFF?text=Kegiatan+2',
            'https://via.placeholder.com/800x600/1a237e/FFFFFF?text=Kegiatan+3',
            'https://via.placeholder.com/800x600/00c853/FFFFFF?text=Kegiatan+4',
        ];
        
        let currentIndex = 0; 

        const updateSlider = () => {
            // Mengubah background image pada elemen galeri-image
            imageElement.style.backgroundImage = `url('${images[currentIndex]}')`; 
            
            if (counterElement) {
                 counterElement.textContent = `FOTO ${currentIndex + 1}/${images.length}`;
            }
        };

        const showNext = () => {
            currentIndex = (currentIndex + 1) % images.length;
            updateSlider();
        };

        const showPrev = () => {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            updateSlider();
        };

        prevArrow.addEventListener('click', showPrev);
        nextArrow.addEventListener('click', showNext);
        
        // Inisialisasi slider
        updateSlider(); 
        
    }
  let index = 0;
  const track = document.getElementById("mapTrack");

  if (track) {
  let index = 0;
  const total = track.children.length;

  function updateSlide() {
    track.style.transform = `translateX(-${index * 100}%)`;
  }

  function nextMap() {
    if (index < total -1){
        index++;
    updateSlide();
  }}

  function prevMap() {
    if (index > 0){
        index--;
    updateSlide();
  }}
  }


 // =============================
  // STRUKTUR ORGANISASI (INI YANG KAMU BUTUH)
  // =============================
  window.showStruktur = function(no) {
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