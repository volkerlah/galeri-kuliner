$(document).ready(function () {
  const gambarhome = [
    "img/sate-lilit.jpeg",
    "img/ayam-taliwang.jpeg",
    "img/nasi-bekepor.jpeg",
    "img/otak-otak.jpeg",
    "img/gudeg.png",
  ];

  const daerah = ["Bali", "Lombok", "Kalimantan", "Palembang", "Yogyakarta"];
  const iddaerah = [
    "#yogyakarta",
    "#bali",
    "#lombok",
    "#kalimantan",
    "#palembang",
  ];

  const $slide = $("#slide");
  const $slot = $slide.find(".gambar");
  const lebar = 800;
  let start = 3;
  let text = 1;
  const $gantitext = $(".btn");

  $slot.each(function (i) {
    $(this).attr("src", gambarhome[i % gambarhome.length]);
  });

  function updateMiring() {
    const $semua = $slide.find(".gambar");
    $semua.removeClass("miring-kanan miring-kiri");
    $semua.eq(1).addClass("miring-kanan");
    $semua.eq(2).addClass("ubahtinggi");
    $semua.eq(3).addClass("miring-kiri");
  }

  function gantitext() {
    text = (text + 1) % daerah.length;
    $gantitext.fadeOut(300, function () {
      $(this).text(daerah[text]).fadeIn(300);
    });
  }

  function gantigambar() {
    $slide.find(".gambar").first().addClass("hilang");
    $slide.css("transform", `translateX(-${lebar}px)`);
    $slide.find(".gambar").last().removeClass("hilang");
    updateMiring();
    setTimeout(function () {
      $slide.css("transition", "none");
      $slide.css("transform", "translateX(0)");
      $slide.find(".gambar").first().remove();
      $slide.find(".gambar").removeClass("hilang");
      start = (start + 1) % gambarhome.length;
      const $img = $("<img>", {
        class: "gambar hilang",
        src: gambarhome[start],
      });
      $slide.append($img);
      setTimeout(function () {
        $slide.css("transition", "transform 0.8s ease-in-out");
      }, 20);
    }, 800);
  }

  setInterval(function () {
    gantigambar();
    gantitext();
  }, 4000);

  // Navigasi Tombol (Menggunakan inner text)
  $(".btn").on("click", function (e) {
    const teksTombol = $(this).text().trim().toLowerCase();
    const target = "#" + teksTombol;
    $("#menu").show();
    $("#menu > div").hide();
    $(target).show();
  });

  $("#menu").on("click", "img[class^='gambar-id-']", function () {
    const idMakanan = $(this).attr("class").match(/\d+/)[0];
    const $container = $(this).closest("div[id]");
    const $semuaGambar = $container.find(".makanan img");
    const $gambarIni = $(this);
    const isBesar = $gambarIni.hasClass("besar");

    $semuaGambar.removeClass("besar").show();
    $container.find("[class^='desc-id-']").hide();

    if (!isBesar) {
      $gambarIni.addClass("besar");

      $semuaGambar.not($gambarIni).hide();

      $container.find(".desc-id-" + idMakanan).toggle(500);
    }
  });
});
