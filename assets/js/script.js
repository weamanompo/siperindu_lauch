const peta = document.getElementById("peta");
const ipw = document.getElementById("ipw");
const wpi = document.getElementById("wpi");

// function ubahWarna() {
//   peta.style.backgroundColor = "#ffc451";
//   ipw.style.backgroundColor = "#fff";
//   wpi.style.backgroundColor = "#ffff";
// }

// function ubahWarna1() {
//   peta.style.backgroundColor = "#fff";
//   ipw.style.backgroundColor = "#ffc451";
//   wpi.style.backgroundColor = "#fff";
// }

// function ubahWarna2() {
//   peta.style.backgroundColor = "#fff";
//   ipw.style.backgroundColor = "#fff";
//   wpi.style.backgroundColor = "#ffc451";
// }

function ubahWarna() {
  peta.classList.add("filter-active");
  ipw.classList.remove("filter-active");
  wpi.classList.remove("filter-active");

  $("#form_prov").hide();
  $("#form_kab").hide();
  $("#garis").hide();
  $("#indikator").show();
  $("#judul1").show();
  $("#wilayah1").hide();
  $("#subtahun").hide();
  $("#atau").hide();
  $("#abio").show();
  $("#isi").load("map_rev.php");
  $("#judul_wpi_d").hide();
  $("#judul_map").hide();
  $("#indikator").val("17");
  $("#indikator_wpi").hide();
}

function ubahWarna1() {
  peta.classList.remove("filter-active");
  ipw.classList.add("filter-active");
  wpi.classList.remove("filter-active");
  $("#indikator").hide();
  $("#indikator_wpi").show();
  $("#form_prov").hide();
  $("#form_kab").hide();
  $("#garis").hide();
  $("#judul1").hide();
  $("#judul_wpi_d").show();
  $("#wilayah1").hide();
  $("#subtahun").hide();
  $("#atau").hide();
  $("#abio").hide();
  $("#isi").load("ipw.php");
  $("#judul_map").hide();
  $("#indikator_wpi").val("17");
  $("#subjudul_indi").html("HARAPAN HIDUP");
}

function ubahWarna2() {
  peta.classList.remove("filter-active");
  ipw.classList.remove("filter-active");
  wpi.classList.add("filter-active");
  $("#judul1").hide();
  $("#garis").hide();
  $("#wilayah1").show();
  $("#abio").hide();
  $("#isi").load("wpi.php");
  $("#indikator").hide();
  $("#atau").hide();
  $("#form_prov").show();
  $("#subtahun").hide();
  $("#form_kab").hide();
  $("#judul_wpi_d").hide();
  $("#judul_map").hide();
  $("#indikator_wpi").hide();
}

peta.onclick = ubahWarna;
ipw.onclick = ubahWarna1;
wpi.onclick = ubahWarna2;
