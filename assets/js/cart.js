document.addEventListener("DOMContentLoaded", function () {
  const addButtonElements = document.querySelectorAll(".add-transaksi");
  const itemsWrap = document.querySelector(".items-wrap");
  const jmlItemText = document.querySelector(".jml-item");
  const jmlHargaText = document.querySelector(".jml-harga");

  // Event listener untuk setiap tombol "Add"
  addButtonElements.forEach(function (button) {
    button.addEventListener("click", function () {
      // Mendapatkan data dari kartu terkait
      const kartu = button.closest(".kartu");
      const title = kartu.querySelector(".kartu-title").innerText;
      const price = kartu.querySelector(".kartu-text").innerText;
      const imageSrc = kartu.querySelector(".kartu-image").src;

      // Membuat elemen baru untuk ditambahkan ke keranjang
      const newItem = document.createElement("div");
      newItem.classList.add("list-items-order", "d-flex", "border-bot", "py-2");
      newItem.innerHTML = `
          <img src="${imageSrc}" alt="order items" style="width: 70px; height: 50px;" />
          <div class="inner-items-order ms-1 d-flex flex-column justify-content-center">
            <p class="items-order-title fw-bold mb-1">${title}</p>
            <p class="items-order-harga mb-1">${price}</p>
          </div>
          <div class="items-kuantiti d-flex flex-column justify-content-between align-items-end gap-1 ms-4 me-1">
            <button type="button" class="remove-items btn btn-danger p-0" style="height: 1.5rem; width: 1.5rem; font-size: .8rem">x</button>
            <div class="items-kuantiti d-flex align-items-end gap-1 ms-4">
              <button type="button" class="min-items">-</button>
              <input type="text" min="1" max="5" value="1" name="quantity" style="width: 2rem; font-size: 0.8rem" class="px-2" />
              <button type="button" class="plus-items">+</button>
            </div>
          </div>
        `;

      // Menambahkan elemen baru ke dalam div dengan class "items-wrap"
      itemsWrap.appendChild(newItem);

      // Menangani increment dan decrement pada elemen yang baru ditambahkan
      incrementDecrement(newItem);

      // Menangani penghapusan elemen
      newItem.querySelector(".remove-items").addEventListener("click", function () {
        itemsWrap.removeChild(newItem);
        updateTotals();
      });

      // Update total item dan total harga setiap kali ada perubahan di keranjang
      updateTotals();
    });
  });

  const incrementDecrement = function (element) {
    const inputElement = element.querySelector("input[name='quantity']");

    element.querySelector(".plus-items").addEventListener("click", function () {
      const currentValue = parseInt(inputElement.value) || 0;
      if (currentValue < parseInt(inputElement.max)) {
        inputElement.value = currentValue + 1;
      }
      updateTotals();
    });

    element.querySelector(".min-items").addEventListener("click", function () {
      const currentValue = Math.max((parseInt(inputElement.value) || 1) - 1, 1);
      inputElement.value = currentValue;
      updateTotals();
    });
  };

  // Update total quantity dan total harga saat ada perubahan di keranjang
  function updateTotals() {
    const items = document.querySelectorAll(".list-items-order");

    let totalQuantity = 0;
    let totalHarga = 0;

    items.forEach(function (item) {
      const quantityInput = item.querySelector('input[name="quantity"]');
      const hargaPerItem = parseInt(item.querySelector(".items-order-harga").innerText.replace(/\D/g, ""));

      const itemQuantity = parseInt(quantityInput.value) || 0;
      totalQuantity += itemQuantity;
      totalHarga += itemQuantity * hargaPerItem;
    });

    jmlItemText.textContent = `Item: ${totalQuantity}`;
    jmlHargaText.textContent = `Harga: Rp. ${totalHarga.toLocaleString()}`;
  }

  // Menangani perubahan quantity pada setiap elemen di keranjang
  itemsWrap.addEventListener("input", function (event) {
    if (event.target.tagName === "INPUT" && event.target.name === "quantity") {
      updateTotals();
    }
  });

  // Menangani penghapusan elemen dari keranjang
  itemsWrap.addEventListener("click", function (event) {
    if (event.target.classList.contains("remove-items")) {
      itemsWrap.removeChild(event.target.closest(".list-items-order"));
      updateTotals();
    }
  });

  // Update total awal saat halaman dimuat
  updateTotals();
});
