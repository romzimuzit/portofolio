document.addEventListener('DOMContentLoaded', function() {
  // Geser tombol Instagram ke kanan dalam container flex-column jika ada
  const ig = document.querySelector('a[href*="instagram.com"]');
  if (ig) {
    ig.style.alignSelf = 'center'; 
  }
ne
  // Fungsi util untuk menghapus status aktif
  function clearActive() {
    document.querySelectorAll('.navbar-nav .nav-link').forEach(function(l) {
      l.classList.remove('active');
      l.removeAttribute('aria-current');
    });
  }

  // Pasang event listener untuk menandai link sebagai aktif saat diklik
  document.querySelectorAll('.navbar-nav .nav-link').forEach(function(link) {
    link.addEventListener('click', function() {
      clearActive();
      this.classList.add('active');
      this.setAttribute('aria-current', 'page');
    });
  });

  // Set status awal berdasarkan hash URL (mis. #home)
  var currentHash = location.hash || '#home';
  var initial = document.querySelector('.navbar-nav .nav-link[href="' + currentHash + '"]');
  if (initial) {
    clearActive();
    initial.classList.add('active');
    initial.setAttribute('aria-current', 'page');
  }
});