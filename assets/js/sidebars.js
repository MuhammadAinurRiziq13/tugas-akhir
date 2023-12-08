/* global bootstrap: false */
(() => {
  "use strict";
  const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  tooltipTriggerList.forEach((tooltipTriggerEl) => {
    new bootstrap.Tooltip(tooltipTriggerEl);
  });
})();

document.addEventListener("DOMContentLoaded", function () {
  // Ambil semua elemen <a> dengan class 'nav-link'
  var links = document.querySelectorAll(".nav-link");

  // Ambil nilai kelas dari sessionStorage (jika ada)
  var selectedLinkIndex = sessionStorage.getItem("selectedLinkIndex");

  // Tambahkan class 'bg-transparan' ke elemen yang sesuai atau ke elemen pertama jika tidak ada nilai
  if (selectedLinkIndex !== null) {
    links[selectedLinkIndex].classList.add("bg-transparan");
  } else {
    links[0].classList.add("bg-transparan"); // Tambahkan class ke elemen pertama
  }

  // Tambahkan event listener untuk setiap elemen <a>
  links.forEach(function (link, index) {
    link.addEventListener("click", function (event) {
      // Hentikan perilaku default tautan
      event.preventDefault();

      // Hapus class 'bg-transparan' dari semua elemen <a>
      links.forEach(function (link) {
        link.classList.remove("bg-transparan");
      });

      // Tambahkan class 'bg-transparan' ke elemen <a> yang diklik
      event.currentTarget.classList.add("bg-transparan");

      // Simpan nilai kelas di sessionStorage
      sessionStorage.setItem("selectedLinkIndex", index.toString());

      // Arahkan manual ke URL tautan
      window.location.href = event.currentTarget.getAttribute("href");
    });
  });

  // Show the modal on page load
  var editModal = document.getElementById("editModal");
  if (editModal) {
    editModal.style.display = "block";
  }
});
