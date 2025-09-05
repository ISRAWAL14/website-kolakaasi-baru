        // Ambil tombol dari DOM
        var toTopButton = document.getElementById("to-top-button");

        // Tampilkan tombol jika pengguna scroll ke bawah sejauh 200px
        window.onscroll = function () {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                toTopButton.classList.remove("hidden");
            } else {
                toTopButton.classList.add("hidden");
            }
        };

        // Saat tombol diklik, scroll kembali ke atas halaman dengan halus
        toTopButton.onclick = function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        };