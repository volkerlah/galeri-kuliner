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
    "#bali",
    "#lombok",
    "#kalimantan",
    "#palembang",
    "#yogyakarta",
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
    $(".btn").attr("href", iddaerah[text]);
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

  $(".btn").on("click", function (e) {
    const target = $(this).attr("href");
    $("#menu").show();
    $("#menu > div").hide();
    $(target).show();
  });

  const $bali = $("#bali .makanan img");

  $(".sate").on("click", function () {
    const $lain = $bali.not(".sate");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".sate").toggleClass("besar");
    $(".satelilit").toggle(500);
  });

  $(".lawar").on("click", function () {
    const $lain = $bali.not(".lawar");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".lawar").toggleClass("besar");
    $(".lawar-desc").toggle(500);
  });

  $(".betutu").on("click", function () {
    const $lain = $bali.not(".betutu");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".betutu").toggleClass("besar");
    $(".betutu-desc").toggle(500);
  });

  $(".jaja").on("click", function () {
    const $lain = $bali.not(".jaja");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".jaja").toggleClass("besar");
    $(".jaja-desc").toggle(500);
  });

  const $lombok = $("#lombok .makanan img");

  $(".ayamtaliwang").on("click", function () {
    const $lain = $lombok.not(".ayamtaliwang");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".ayamtaliwang").toggleClass("besar");
    $(".ayamtaliwang-desc").toggle(500);
  });

  $(".plecing").on("click", function () {
    const $lain = $lombok.not(".plecing");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".plecing").toggleClass("besar");
    $(".plecing-desc").toggle(500);
  });

  $(".rembiga").on("click", function () {
    const $lain = $lombok.not(".rembiga");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".rembiga").toggleClass("besar");
    $(".rembiga-desc").toggle(500);
  });

  $(".puyung").on("click", function () {
    const $lain = $lombok.not(".puyung");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".puyung").toggleClass("besar");
    $(".puyung-desc").toggle(500);
  });

  const $kalimantan = $("#kalimantan .makanan img");

  $(".nasisubut").on("click", function () {
    const $lain = $kalimantan.not(".nasisubut");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".nasisubut").toggleClass("besar");
    $(".nasisubut-desc").toggle(500);
  });

  $(".sotobanjar").on("click", function () {
    const $lain = $kalimantan.not(".sotobanjar");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".sotobanjar").toggleClass("besar");
    $(".sotobanjar-desc").toggle(500);
  });

  $(".tudai").on("click", function () {
    const $lain = $kalimantan.not(".tudai");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".tudai").toggleClass("besar");
    $(".tudai-desc").toggle(500);
  });

  $(".nasibekepor").on("click", function () {
    const $lain = $kalimantan.not(".nasibekepor");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".nasibekepor").toggleClass("besar");
    $(".nasibekepor-desc").toggle(500);
  });

  const $palembang = $("#palembang .makanan img");

  $(".otakotak").on("click", function () {
    const $lain = $palembang.not(".otakotak");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".otakotak").toggleClass("besar");
    $(".otakotak-desc").toggle(500);
  });

  $(".brengkespatin").on("click", function () {
    const $lain = $palembang.not(".brengkespatin");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".brengkespatin").toggleClass("besar");
    $(".brengkespatin-desc").toggle(500);
  });

  $(".celimpungan").on("click", function () {
    const $lain = $palembang.not(".celimpungan");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".celimpungan").toggleClass("besar");
    $(".celimpungan-desc").toggle(500);
  });

  $(".tekwan").on("click", function () {
    const $lain = $palembang.not(".tekwan");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".tekwan").toggleClass("besar");
    $(".tekwan-desc").toggle(500);
  });

  const $yogyakarta = $("#yogyakarta .makanan img");

  $(".gudeg").on("click", function () {
    const $lain = $yogyakarta.not(".gudeg");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".gudeg").toggleClass("besar");
    $(".gudeg-desc").toggle(500);
  });

  $(".gatot").on("click", function () {
    const $lain = $yogyakarta.not(".gatot");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".gatot").toggleClass("besar");
    $(".gatot-desc").toggle(500);
  });

  $(".geplak").on("click", function () {
    const $lain = $yogyakarta.not(".geplak");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".geplak").toggleClass("besar");
    $(".geplak-desc").toggle(500);
  });

  $(".sateklatak").on("click", function () {
    const $lain = $yogyakarta.not(".sateklatak");
    if ($lain.css("visibility") === "hidden") {
      $lain.css("visibility", "");
    } else {
      $lain.css("visibility", "hidden");
    }
    $(".sateklatak").toggleClass("besar");
    $(".sateklatak-desc").toggle(500);
  });
});
