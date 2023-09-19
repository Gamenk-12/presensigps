@extends('layouts.presensi')
@section('header')
    <!-- App Header -->
<div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Laporan</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->
<style>
    .webcam-capture,
    .webcam-capture video{
        display: inline-block;
        width:100% !important;
        margin: auto;
        height: auto !important;
        border-radius: 15px;
    }
    #map { height: 200px ; }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@endsection
@section('content')
<div class="row" style="margin-top: 70px">
    <div class="col">
        <input type="hidden" id="lokasi">
        <div class="webcam-capture"></div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div><center>Nama Lokasi</center></div>
        <input type="text" id="keterangan" name="keterangan" placeholder="Isi nama lokasi" style='width:100%'>
    </div>
</div>

<div class="row">
    <div class="col">
<p></p>
        <!-- Untuk Absensi -->    
        <!-- @if ($cek > 0)
    <button id="takeabsen" class="btn btn-danger btn-block">
    <ion-icon name="camera-outline"></ion-icon>Ambil Gambar Out</button>
        @else 
        <button id="takeabsen" class="btn btn-primary btn-block">
    <ion-icon name="camera-outline"></ion-icon>Ambil Gambar In</button>
    @endif -->

        <!-- Untuk laporan In Out -->
    @if ($cek == 0)
    <button id="takeabsen" class="btn btn-primary btn-block">
    <ion-icon name="camera-outline"></ion-icon>Ambil Gambar In</button>
        @else 
        <button id="takeabsen" class="btn btn-danger btn-block">
    <ion-icon name="camera-outline"></ion-icon>Ambil Gambar Out</button>
    @endif
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <div id="map"></div>
    </div>
</div>
<audio id="notifikasi_in">
    <source src="{{ asset('assets/sound/terimakasih-in.mp3') }}" type="audio/mpeg">
</audio>
<audio id="notifikasi_out">
    <source src="{{ asset('assets/sound/terimakasih-out.mp3') }}" type="audio/mpeg">
</audio>
@endsection

@push('myscript')
<script>

    var notifikasi_in = document.getElementById('notifikasi_in');
    var notifikasi_out = document.getElementById('notifikasi_out');
    Webcam.set({
        height:480,
        width:640,
        image_format:'jpeg',
        jpeg_quality:80,
    });

    Webcam.attach('.webcam-capture');
                        //test map 
//     var map = L.map('map').setView([-6.140245, 106.956296], 15);
//     var marker = L.marker([-6.140245, 106.956296]).addTo(map);
//     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     maxZoom: 19,
//     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
// }).addTo(map);
// var circle = L.circle([-6.140245, 106.956296], {
//     color: 'red',
//     fillColor: '#f03',
//     fillOpacity: 0.5,
//     radius: 100
// }).addTo(map);
                        //test map 


    var lokasi = document.getElementById('lokasi');
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    }

    function successCallback(position)
    {
        lokasi.value = position.coords.latitude + "," + position.coords.longitude;
        var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 17);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
//untuk absensi
// var circle = L.circle([position.coords.latitude, position.coords.longitude], {
//     color: 'red',
//     fillColor: '#f03',
//     fillOpacity: 0.5,
//     radius: 100
// }).addTo(map);

    }
    function errorCallback()
    {
        
    }

$('#takeabsen').click(function(e){
    Webcam.snap(function(uri){
        image = uri;
    });
    var lokasi = $('#lokasi').val();
    var keterangan = $('#keterangan').val();
    $.ajax({
        type:'POST',
        url:'/presensi/store',
        data:{
            _token:"{{ csrf_token() }}",
            image:image,
            lokasi:lokasi,
            keterangan:keterangan
        },
        cache:false,
        success:function(respond){
            var status = respond.split("|");
            if(status[0] == "success"){
                if(status[2]=="in"){
                    notifikasi_in.play();
                }
                if(status[2]=="out"){
                    notifikasi_out.play();
                }
                // alert('success');
                Swal.fire({
                title: 'Berhasil ^_^',
                text: status[1],
                icon: 'success',
                confirmButtonText: 'OK'
                }).then(function() {
                window.location.href = '/dashboard';
                // window("location.href='/dashboard'");
                })
                // setTimeout("location.href='/dashboard'", 3500)
            }else{
                // alert('error');
                Swal.fire({
                title: 'Gagal',
                text: status[1],
                icon: 'error',
                confirmButtonText: 'OK'
                }).then(function() {
                window.location.href = '/dashboard';
                // window("location.href='/dashboard'");
                })
            }
        }
    });
});
</script>
@endpush