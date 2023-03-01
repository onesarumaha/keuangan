// PROFILE
const flashData = $('.flash-data').data('flashdata');

if(flashData) {
	Swal.fire({
	  title: 'Data Profile !',
	  text: 'Berhasil'  + flashData,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}


// PENDAPATAN

const pesanData = $('.pesan-data').data('pesandata');

if(pesanData) {
	Swal.fire({
	  title: 'Transaksi Pendapatan Berhasil !',
	  text: pesanData,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}


// tombol hapus

$('.tombol-hapus').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Apakah anda yakin ?',
	  text: "Hapus transaksi pendapatan",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});

// tombol Cek

$('.cek-pendapatan').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Verifikasi',
	  text: "Pendapatan ?",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Ya'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});


// PENGELUARAN

const pengeluaranData = $('.pengeluaran-data').data('pengeluarandata');

if(pengeluaranData) {
	Swal.fire({
	  title: 'Transaksi Pengeluaran Berhasil !',
	  text: pengeluaranData,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}


// tombol hapus

$('.hapus-pengeluaran').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Apakah anda yakin ?',
	  text: "Hapus transaksi pengeluaran",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});

// tombol verifikasi

$('.cek-pengeluaran').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Verifikasi',
	  text: "Pengeluaran ?",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Ya'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});



const pesanData1 = $('.pesan-data1').data('pesandata1');

if(pesanData1) {
	Swal.fire({
	  title: 'Data Karyawan Berhasil !',
	  text: pesanData1,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

// Hapus karyawan
const karyawanData = $('.karyawan-data').data('karyawandata');

if(karyawanData) {
	Swal.fire({
	  title: 'Data karyawan',
	  text: karyawanData,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.hapus-karyawan').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Apakah anda yakin ?',
	  text: "Hapus Karyawan",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});