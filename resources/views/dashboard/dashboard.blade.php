@extends('layouts.presensi')
@section('content')
<div class="section" id="user-section">
            <div id="user-detail">
                <div class="avatar">
                    <img src="{{asset('assets/img/sample/avatar/avatar1.jpg')}}" alt="avatar" class="imaged w64 rounded">
                </div>
                <div id="user-info">
                <style type="text/css">
                        #p{
                            color: #FFFFFF;
                            font-size: 20px;
                            font-weight: bold;
                            font-family:Cursive, Lucida-Handwriting;
                            font-style : oblique; }
                        </style>
                    <span id="user-role">
                    <p id="p">
                        {{ $salam }}</p></span>
                    <!-- <h2 id="user-name"><strong>{{$karyawan->nama_lengkap}}</strong></h2> -->
                    <h2 id="user-name"><strong>{{Auth::guard('karyawan')->user()->nama_lengkap}}</strong></h2>
                    <!-- <span id="user-role">{{$karyawan->jabatan}}</span> -->
                    <span id="user-role">{{Auth::guard('karyawan')->user()->jabatan}}</span>
                </div>
            </div>
        </div>

        <div class="section" id="menu-section">
            <div class="card">
                <div class="card-body text-center">
                    <div class="list-menu">
                        <div class="item-menu text-center">
                            <div class="menu-icon">
                                <a href="" class="green" style="font-size: 40px;">
                                    <ion-icon name="person-sharp"></ion-icon>
                                </a>
                            </div>
                            <div class="menu-name">
                                <span class="text-center">Profil</span>
                            </div>
                        </div>
                        <!-- <div class="item-menu text-center">
                            <div class="menu-icon">
                                <a href="" class="danger" style="font-size: 40px;">
                                    <ion-icon name="calendar-number"></ion-icon>
                                </a>
                            </div>
                            <div class="menu-name">
                                <span class="text-center">Cuti</span>
                            </div>
                        </div> -->
                        
                        <div class="item-menu text-center">
                            <div class="menu-icon">
                                <a href="" class="warning" style="font-size: 40px;">
                                    <ion-icon name="document-text"></ion-icon>
                                </a>
                            </div>
                            <div class="menu-name">
                                <span class="text-center">Histori</span>
                            </div>
                        </div>
                        <div class="item-menu text-center">
                            <div class="menu-icon">
                                <a href="" class="orange" style="font-size: 40px;">
                                    <ion-icon name="location"></ion-icon>
                                </a>
                            </div>
                            <div class="menu-name">
                                Lokasi
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    <!-- kolom ke 3 -->
        <!-- <div class="section mt-2" id="presence-section">
            <div class="todaypresence">
                <div class="row">
                    <div class="col-6">
                        <div class="card gradasigreen">
                            <div class="card-body">
                                <div class="presencecontent">
                                    <div class="iconpresence">
                                        <ion-icon name="camera"></ion-icon>
                                    </div>
                                    <div class="presencedetail">
                                        <h4 class="presencetitle">Laporan</h4>
                                        <span><center>IN</center></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card gradasired">
                            <div class="card-body">
                                <div class="presencecontent">
                                    <div class="iconpresence">
                                        <ion-icon name="camera"></ion-icon>
                                    </div>
                                    <div class="presencedetail">
                                        <h4 class="presencetitle">Laporan</h4>
                                        <span><center>OUT</center></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- <div class="rekappresence">
                <div id="chartdiv"></div>
                 <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="presencecontent">
                                    <div class="iconpresence primary">
                                        <ion-icon name="log-in"></ion-icon>
                                    </div>
                                    <div class="presencedetail">
                                        <h4 class="rekappresencetitle">Hadir</h4>
                                        <span class="rekappresencedetail">0 Hari</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="presencecontent">
                                    <div class="iconpresence green">
                                        <ion-icon name="document-text"></ion-icon>
                                    </div>
                                    <div class="presencedetail">
                                        <h4 class="rekappresencetitle">Izin</h4>
                                        <span class="rekappresencedetail">0 Hari</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="presencecontent">
                                    <div class="iconpresence warning">
                                        <ion-icon name="sad"></ion-icon>
                                    </div>
                                    <div class="presencedetail">
                                        <h4 class="rekappresencetitle">Sakit</h4>
                                        <span class="rekappresencedetail">0 Hari</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="presencecontent">
                                    <div class="iconpresence danger">
                                        <ion-icon name="alarm"></ion-icon>
                                    </div>
                                    <div class="presencedetail">
                                        <h4 class="rekappresencetitle">Terlambat</h4>
                                        <span class="rekappresencedetail">0 Hari</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> -->
            <br><br>
            <div class="presencetab mt-2">
                <div class="tab-pane fade show active" id="pilled" role="tabpanel">
                    <ul class="nav nav-tabs style1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                Laporan Saya Hari Ini
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                Laporan Seluruh Tim
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content mt-2" style="margin-bottom:100px;">
                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                        <ul class="listview image-listview">
                            @foreach($history_hari_ini as $d)
                            <li>
                                <div class="item">
                                    <div class="icon-box bg-primary">
                                    <ion-icon name="finger-print-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>{{ date("d-m-Y",strtotime($d->tgl_laporan)) }}</div>
                                        <span class="badge badge-success">IN - {{$d->jam_in}}</span>
                                        <span class="badge badge-danger">OUT - {{ $presensi_hari_ini != NULL && $d->jam_out != NULL ? $d->jam_out : 'Belum Laporan'}}</span>
                                    </div>
                                </div>
                            </li>

                            @endforeach
                           
                            <!-- <li>
                                <div class="item">
                                    <div class="icon-box bg-secondary">
                                        <ion-icon name="videocam-outline" role="img" class="md hydrated"
                                            aria-label="videocam outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Videos</div>
                                        <span class="text-muted">None</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="icon-box bg-danger">
                                        <ion-icon name="musical-notes-outline" role="img" class="md hydrated"
                                            aria-label="musical notes outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Music</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="icon-box bg-danger">
                                        <ion-icon name="musical-notes-outline" role="img" class="md hydrated"
                                            aria-label="musical notes outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Music</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="icon-box bg-danger">
                                        <ion-icon name="musical-notes-outline" role="img" class="md hydrated"
                                            aria-label="musical notes outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Music</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="icon-box bg-danger">
                                        <ion-icon name="musical-notes-outline" role="img" class="md hydrated"
                                            aria-label="musical notes outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Music</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="icon-box bg-danger">
                                        <ion-icon name="musical-notes-outline" role="img" class="md hydrated"
                                            aria-label="musical notes outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Music</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="icon-box bg-danger">
                                        <ion-icon name="musical-notes-outline" role="img" class="md hydrated"
                                            aria-label="musical notes outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Music</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="icon-box bg-danger">
                                        <ion-icon name="musical-notes-outline" role="img" class="md hydrated"
                                            aria-label="musical notes outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Music</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="icon-box bg-danger">
                                        <ion-icon name="musical-notes-outline" role="img" class="md hydrated"
                                            aria-label="musical notes outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>Music</div>
                                    </div>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <ul class="listview image-listview">
                            @foreach($leaderboard as $l)
                            <li>
                                <div class="item">
                                    <img src="{{asset('assets/img/sample/avatar/avatar1.jpg')}}" alt="image" class="image">
                                    <div class="in">
                                        <div>{{$l->nama_lengkap}}<br>
                                        <small>{{$l->jabatan}}</small>
                                        </div>
                                        <div><span class="badge badge-success">IN - {{$l->jam_in}}</span><br>
                                        <span class="badge badge-danger">OUT - {{ $presensi_hari_ini != NULL && $l->jam_out != NULL ? $l->jam_out : ''}}</span></div>
                                        <!-- <span class="badge bg-danger">{{$rekap_presensi->jmlhadir}}</span> -->
                                    </div>
                                </div>
                            </li>

                            @endforeach
                            
                        </ul>
                    </div>

                </div>
            </div>
        </div>
@endsection