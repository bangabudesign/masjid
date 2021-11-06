@extends('layouts.main')

@section('content')

<x-page-header :page-title="$page_title" />

<section class="py-5">
    <div class="container pb-4">
        <h2 class="font-weight-bold">Sejarah Singkat</h2>
        <p>Kalimantan Selatan yang sebagian besar masyarakatnya adalah penganut agama Isam yang taat (97,5 %) sejak lama bercita-cita mempunyai sebuah Masjid Raya yang dapat dibanggakan dan digunakan pada saat ini dan akan datang. Hal ini mendapat dukungan dari para pemuka, alim-ulama dan tokoh masyarakat. Kemudian berkumpullah tokoh seperti Bapak H. Hasan Basry (Mantan Pangdam), Bapak H. Maksid (mantan Gubernur KDH), Bapak M. Yusi (mantan Pangdam) dan sejumlah ulama dengan sepakat membulatkan tekad untuk membangun sebuah Masjid Raya yang berfungsi sebagai Pusat Kegiatan Islam dalam arti luas bertempat di Kota Banjarmasin. Setelah pemilihan lokasi ini disepakati dengan bantuan perancanaan team ahli dari ITB Bandung dilakukan peletakan batu pertama oleh Bapak H. Aberani Sulaiman (Gubernur) dan Bapak Amir Machmud (Pangdam X) sebagai titik awal yang dicita-citakan pada tahun 1964. namun karena beberapa hambatan, seperti meletusnya G 30/S PKI dan mutasinya beberapa pejabat penting, tokoh penggerak, rencana pembangunan Masjid Raya ini tertunda.<br><br>Baru tahun 1974, rencana pembangunan Masjid Raya dimulai kembali, oleh Bapak Gubernur Soebardjo yang menunjuk PT. Griya Cipta Sarana sebagai perencana dan PT. Barata Metelworles sebagai pelaksana pembangunan, dan pemancangan tiang pertama dilakukan Gubernur Soebardjo tanggal 10 Nopember 1974. untuk pertama, pada tanggal 31 Oktober 1979, Masjid Raya dipergunakan umat Islam untuk kegiatan Idul Adha 1344 H. Untuk pembangunan selanjutnya diperlukan dana yang besar, maka dibentuk panitia pengumpul dana dengan Ketua KH. Hasan Moegni Marwan dan Sekretaris H.M. Rafi’i Hamdie dan sejumlah tokoh masyarakat Banjarmasin.<br><br>Kemudian cita-cita masyarakat Islam Kalimantan Selatan akan terbangunnya Masjid Raya yang monumental telah terwujud dan menjadi kenyataan. Dengan gema takbir beriringan gema beduk dan sirene, Presiden Soeharto meresmikan pemakaiannya tanggal 9 Pebruari 1981 dengan nama Masjid Raya Sabilal Muhtadin untuk difungsikan sebagai pusat kegiatan Islam daerah Kalimantan Selatan. Penamaan dengan pilihan Sabilal Muhtadin adalah sebagai penghormatan dan penghargaan terhadap ulama besar Syekh Muhammad Arsyad Al-Banjary (1710-1812 M) salah satu karyanya yang terkenal ‘Sabilal Muhtadin.’ Bangunan masjid terdiri dari bangunan utama yang luasnya ± 5250 M persegi yaitu ruang ibadah berlantai dua yang bisa menampung jamaah ± 7.500 serta teras dan selasar juga bisa menampung ± 7.000 jamaah, menara terdiri atas 1 menara besar yang tinggi ± 45 meter serta 4 menara kecil masing-masing ± 21 meter.<br><br>Periode Kepengurusan Ketua Badan Pengelola Masjid Raya Sabilal Muhtadin, yaitu:<br>KH. Hasan Mugeni Marwan (1980-1982)<br>Ir. H. M. Said (Ketua Umum) dengan Ketua Hariannya KH.Muhammad Rafi’i Hamdie (1982-1987); H.Maksid (1987-1999) KH.Husin Naparin, Lc, MA (1999-2004); KH.Ahmad Bakeri (2004-2006);<br>Drs.H.Rudy Ariffin, MM (Ketua Umum) dengan Ketua Hariannya KH. Ahmad Bakeri (2006-2008);<br>Drs.KH.Tabrani Basri (2008-2010)<br>Drs. H. Rusdiansyah Asnawi, SH (2010-2012 &amp; 2012-2015).<br>Dr. H. Akhmad Sagir, M.Ag (2016-2018),<br>Drs. KH. Darul Quthni, MH (2018-Sekarang).<br><br>Sebagaimana layaknya sebagai kegiatan Islam, Masjid Raya Sabilal Muhtadin juga dilengkapi dengan keberadaan Lembaga Pendidikan Islam yang mengasuh aktivitas pendidikan dari tingkat TK s/d SMU &amp; SMK yang banyak menjadi perhatian warga. Disamping itu juga dilengkapi dengan Perpustakaan Umum, Radio Dakwah Sabilal Muhtadin, Koperasi Karyawan, sarana Olahraga serta SPBU.</p>
    </div>
    <div class="container">
        <div class="card card-body mb-4">
            <div></div>
            <h3 class="font-weight-bold">Visi</h3>
            <p>Menjadi Masjid percontohan dan pusat keiatan umat, mengedepankan pelayanan ibadah, dakwah dan pendidikan, dan ikut serta mengembangankan kebangkitan ekonomi syari’ah untuk kesejahteraan masyarakat, yang berwawasan kebangsaan dan berbasis ahlussunnah waljamaah</p>
        </div>
        <div class="card card-body mb-4">
            <div></div>
            <h3 class="font-weight-bold">Misi</h3>
            <ol>
                <li>Melaksanakan tata kelola administrasi dan keuangan transparan dan akuntabel.</li>
                <li>Menyiapkan sarana dan prasarana dan SDM yang mumpuni dalam pelayanan.</li>
                <li>Menyelenggarakan majelis taklim untuk syiar islam dan pembinaan muallaf.</li>
                <li>Menyelenggarakan dan mengembangkan lembaga pendidikan secara berjenjang di lingkungan masjid.</li>
                <li>Menyelenggarakan pendidikan dan kaderisasi ulama dan wadah konsultasi perkawinan dan hukum waris.</li>
                <li>Mengelola pusat study Al-Qur’an atau Al-Qur’an Centre dan gedung musium Al-Qur’an.</li>
                <li>Mengelola adanya pusat percontohan ekonomi syari’ah di lingkungan masjid.</li>
            </ol>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ url('/plugins/splide/css/splide.min.css') }}">
@endpush

@push('scripts')
<script src="{{ url('/plugins/splide/js/splide.min.js') }}"></script>
<script>
    document.addEventListener( 'DOMContentLoaded', function() {
      var splide = new Splide( '.splide', {
          width: '100%',
          pagination: false
      } );
      splide.mount();
    } );
</script>
@endpush
