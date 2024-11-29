<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian Sampah</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
            color: #333;
            background-color: #f4f4f4;
            background-image: url('background.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background: linear-gradient(135deg, #2e7d32, #66bb6a);
            color: white;
            border-bottom: 2px solid #fff;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 210px;
            height: auto;
        }

        .profile-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-pic {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: 2px solid white;
            object-fit: cover;
        }

        .profile-details {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .customer-name {
            font-size: 22px;
            font-weight: 600;
        }

        .customer-role {
            font-size: 18px;
            opacity: 0.8;
        }

        /* Navigation Menu */
        .nav-menu {
            background-color: #333;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .nav-menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .nav-menu li {
            margin: 0 15px;
        }

        .nav-menu a {
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .nav-menu a:hover {
            background-color: #ffbb00;
        }

        /* Table Styles */
        .table-container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .add-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-button:hover {
            background-color: #45a049;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
        }

        .data-table th {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .data-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        .lihat-button {
            background-color: #ffbb33;
            border: none;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .lihat-button:hover {
            background-color: #ffa500;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
            max-height: 90%;
            overflow-y: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .modal-content h3 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
        }

        .form-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .save-button {
            background-color: #4CAF50;
            color: white;
        }

        .clear-button {
            background-color: #ff9800;
            color: white;
        }

        .cancel-button {
            background-color: #f44336;
            color: white;
        }

        .sub-form {
            margin-bottom: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        /* Detail Modal Styles */
        .detail-modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
            max-height: 90%;
            overflow-y: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .detail-modal-content h3 {
            margin-top: 0;
        }

        .close-detail-modal {
            position: absolute;
            top: 15px;
            right: 20px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            .header, .nav-menu ul {
                flex-direction: column;
                align-items: center;
            }

            .nav-menu li {
                margin: 5px 0;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <a href="{{ route('home') }}">
            <img src="/images/logo1.png" alt="Logo Bank Sampah" class="logo">
        </a>
        <div class="profile-container">
            <div class="profile-details">
                <span class="customer-role">Administrator</span>
            </div>
        </div>
    </header>
    <nav class="nav-menu">
        <ul>
          <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li><a href="{{ route('admin.pengambilan_sampah') }}">Req Pengambilan Sampah</a></li>
          <li><a href="datasampah.html">Data Sampah</a></li>
          <li><a href="{{ route('admin.beli_sampah') }}">Pembelian Sampah</a></li>
          <li><a href="{{ route('admin.data_karya') }}">Data Hasil Karya</a></li>
          <li><a href="{{ route('admin.transaksi_karya') }}">Pembelian Hasil Karya</a></li>
          <li><a href="...">Keuangan</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: white; cursor: pointer;">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    <h2 style="text-align: center; margin-top: 50px; font-size: 2.2rem;">Pembelian Sampah</h2>
    <div class="table-container">
        <button class="add-button" onclick="showModal()">Tambah Pembelian</button>
        <table class="data-table">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Nomor HP</th>
              <th>Harga Total (Rp)</th>
              <th>Poin</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- Tabel data akan diisi secara dinamis -->
          </tbody>
        </table>
      </div>
  
      <!-- Modal Form -->
      <div class="modal" id="modalForm">
        <div class="modal-content">
          <h3>Formulir Pembelian</h3>
          <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" placeholder="Masukkan Nama" />
          </div>
          <div class="form-group">
            <label for="nomorHp">Nomor HP:</label>
            <input type="text" id="nomorHp" placeholder="Masukkan Nomor HP" />
          </div>
          <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" placeholder="Masukkan Alamat"></textarea>
          </div>
          <div class="form-group">
            <label for="jumlahBarang"
              >Masukkan jumlah jenis barang (maksimal 7):</label
            >
            <input
              type="number"
              id="jumlahBarang"
              min="1"
              max="7"
              placeholder="Jumlah Jenis Barang"
              onchange="generateSubForms()"
            />
          </div>
  
          <div id="subFormsContainer"></div>
  
          <div class="form-group">
            <label for="totalKeseluruhan">Harga Total Keseluruhan (Rp):</label>
            <input type="number" id="totalKeseluruhan" readonly />
          </div>
  
          <div class="form-buttons">
            <button class="save-button" onclick="saveData()">Simpan Data</button>
            <button class="clear-button" onclick="clearForm()">Clear</button>
            <button class="cancel-button" onclick="closeModal()">Batal</button>
          </div>
        </div>
      </div>
  
      <!-- Detail Modal -->
      <div class="modal" id="detailModal">
        <div class="detail-modal-content">
          <button class="close-detail-modal" onclick="closeDetailModal()">
            &times;
          </button>
          <h3>Rincian Pembelian</h3>
          <p><strong>Tanggal:</strong> <span id="detailTanggal"></span></p>
          <p><strong>Nama:</strong> <span id="detailNama"></span></p>
          <p><strong>Nomor HP:</strong> <span id="detailNomorHp"></span></p>
          <p><strong>Alamat:</strong> <span id="detailAlamat"></span></p>
          <p>
            <strong>Harga Total:</strong> Rp <span id="detailTotalHarga"></span>
          </p>
          <p><strong>Poin:</strong> <span id="detailPoin"></span></p>
          <h4>Rincian Barang:</h4>
          <table class="data-table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Jenis Barang</th>
                <th>Berat (Kg)</th>
                <th>Harga/Kg (Rp)</th>
                <th>Harga Total (Rp)</th>
              </tr>
            </thead>
            <tbody id="detailBarang">
              <!-- Rincian barang akan diisi secara dinamis -->
            </tbody>
          </table>
        </div>
      </div>
  
      <script>
        // Array untuk menyimpan data pembelian
        const pembelianData = [];
  
        function showModal() {
          document.getElementById("modalForm").style.display = "flex";
        }
  
        function closeModal() {
          document.getElementById("modalForm").style.display = "none";
        }
  
        function generateSubForms() {
          const container = document.getElementById("subFormsContainer");
          container.innerHTML = ""; // Hapus semua sub-form sebelumnya
  
          const jumlah = parseInt(document.getElementById("jumlahBarang").value);
          if (isNaN(jumlah) || jumlah < 1) {
            alert("Masukkan jumlah barang yang valid (minimal 1).");
            return;
          }
  
          for (let i = 1; i <= jumlah; i++) {
            const subForm = document.createElement("div");
            subForm.classList.add("sub-form");
            subForm.innerHTML = `
                      <h4>Barang ${i}:</h4>
                      <div class="form-group">
                          <label for="jenisBarang${i}">Jenis Barang:</label>
                          <select id="jenisBarang${i}" onchange="updateHargaTotal(${i})">
                              <option value="Besi">Besi</option>
                              <option value="Baja">Baja</option>
                              <option value="Plastik">Plastik</option>
                              <option value="Kertas">Kertas</option>
                              <option value="Seng">Seng</option>
                              <option value="Koran">Koran</option>
                              <option value="Kardus">Kardus</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="berat${i}">Berat (Kg):</label>
                          <input type="number" id="berat${i}" placeholder="Masukkan Berat" min="0" step="0.01" onchange="updateHargaTotal(${i})">
                      </div>
                      <div class="form-group">
                          <label for="hargaTotal${i}">Harga Total (Rp):</label>
                          <input type="number" id="hargaTotal${i}" readonly>
                      </div>
                  `;
            container.appendChild(subForm);
          }
        }
  
        // Update harga total berdasarkan jenis barang dan berat
        function updateHargaTotal(index) {
          const jenisBarang = document.getElementById(
            `jenisBarang${index}`
          ).value;
          const berat =
            parseFloat(document.getElementById(`berat${index}`).value) || 0;
  
          const hargaPerKg = {
            Besi: 8000,
            Baja: 10000,
            Plastik: 5000,
            Kertas: 2000,
            Seng: 3000,
            Koran: 2000,
            Kardus: 2000,
          };
  
          const total = berat * (hargaPerKg[jenisBarang] || 0);
          document.getElementById(`hargaTotal${index}`).value = total.toFixed(2);
          calculateGrandTotal();
        }
  
        // Hitung total keseluruhan dari semua barang
        function calculateGrandTotal() {
          const jumlah =
            parseInt(document.getElementById("jumlahBarang").value) || 0;
          let grandTotal = 0;
  
          for (let i = 1; i <= jumlah; i++) {
            const total =
              parseFloat(document.getElementById(`hargaTotal${i}`).value) || 0;
            grandTotal += total;
          }
  
          document.getElementById("totalKeseluruhan").value =
            grandTotal.toFixed(2);
        }
  
        function clearForm() {
          document.getElementById("nama").value = "";
          document.getElementById("nomorHp").value = "";
          document.getElementById("alamat").value = "";
          document.getElementById("jumlahBarang").value = "";
          document.getElementById("subFormsContainer").innerHTML = "";
          document.getElementById("totalKeseluruhan").value = "";
        }
  
        function saveData() {
          const nama = document.getElementById("nama").value.trim();
          const nomorHp = document.getElementById("nomorHp").value.trim();
          const alamat = document.getElementById("alamat").value.trim();
          const jumlahBarang = parseInt(
            document.getElementById("jumlahBarang").value
          );
          const totalKeseluruhan =
            parseFloat(document.getElementById("totalKeseluruhan").value) || 0;
  
          if (
            !nama ||
            !nomorHp ||
            !alamat ||
            !jumlahBarang ||
            totalKeseluruhan <= 0
          ) {
            alert("Harap isi semua kolom dengan benar!");
            return;
          }
  
          // Mengumpulkan rincian barang
          const rincianBarang = [];
          for (let i = 1; i <= jumlahBarang; i++) {
            const jenis = document.getElementById(`jenisBarang${i}`).value;
            const berat =
              parseFloat(document.getElementById(`berat${i}`).value) || 0;
            const hargaTotal =
              parseFloat(document.getElementById(`hargaTotal${i}`).value) || 0;
  
            if (berat <= 0 || hargaTotal <= 0) {
              alert(`Harap isi berat untuk Barang ${i} dengan benar!`);
              return;
            }
  
            rincianBarang.push({
              jenisBarang: jenis,
              berat: berat,
              hargaTotal: hargaTotal,
            });
          }
  
          // Menghitung poin
          const poin = Math.floor(totalKeseluruhan / 1000);
  
          // Mendapatkan tanggal dan hari saat ini
          const currentDate = new Date();
          const options = {
            weekday: "long",
            year: "numeric",
            month: "2-digit",
            day: "2-digit",
          };
          const formattedDate = currentDate.toLocaleDateString("id-ID", options);
  
          // Menyimpan data ke array
          const pembelian = {
            tanggal: formattedDate,
            nama: nama,
            nomorHp: nomorHp,
            alamat: alamat,
            totalHarga: totalKeseluruhan.toFixed(2),
            poin: poin,
            rincianBarang: rincianBarang,
          };
  
          pembelianData.push(pembelian);
  
          // Menambahkan baris ke tabel
          const tableBody = document.querySelector(".data-table tbody");
          const row = document.createElement("tr");
  
          row.innerHTML = `
                  <td>${pembelian.tanggal}</td>
                  <td>${pembelian.nama}</td>
                  <td>${pembelian.alamat}</td>
                  <td>${pembelian.nomorHp}</td>
                  <td>${pembelian.totalHarga}</td>
                  <td>${pembelian.poin}</td>
                  <td>
                      <button class="lihat-button" onclick="showDetails(${
                        pembelianData.length - 1
                      })">Lihat</button>
                  </td>
              `;
  
          tableBody.appendChild(row);
  
          // Menutup modal dan membersihkan form
          closeModal();
          clearForm();
  
          alert("Data berhasil disimpan dan ditampilkan di tabel.");
        }
  
        function showDetails(index) {
          const pembelian = pembelianData[index];
  
          document.getElementById("detailTanggal").innerText = pembelian.tanggal;
          document.getElementById("detailNama").innerText = pembelian.nama;
          document.getElementById("detailNomorHp").innerText = pembelian.nomorHp;
          document.getElementById("detailAlamat").innerText = pembelian.alamat;
          document.getElementById("detailTotalHarga").innerText =
            pembelian.totalHarga;
          document.getElementById("detailPoin").innerText = pembelian.poin;
  
          const detailBarang = document.getElementById("detailBarang");
          detailBarang.innerHTML = ""; // Clear previous details
  
          pembelian.rincianBarang.forEach((barang, idx) => {
            const row = document.createElement("tr");
            row.innerHTML = `
                      <td>${idx + 1}</td>
                      <td>${barang.jenisBarang}</td>
                      <td>${barang.berat}</td>
                      <td>${(barang.hargaTotal / barang.berat).toFixed(2)}</td>
                      <td>${barang.hargaTotal.toFixed(2)}</td>
                  `;
            detailBarang.appendChild(row);
          });
  
          document.getElementById("detailModal").style.display = "flex";
        }
  
        function closeDetailModal() {
          document.getElementById("detailModal").style.display = "none";
        }
  
        // Menutup modal saat klik di luar konten modal
        window.onclick = function (event) {
          const modal = document.getElementById("modalForm");
          const detailModal = document.getElementById("detailModal");
          if (event.target == modal) {
            modal.style.display = "none";
          }
          if (event.target == detailModal) {
            detailModal.style.display = "none";
          }
        };
      </script>
    </body>
  </html>
