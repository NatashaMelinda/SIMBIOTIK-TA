@extends('layouts.layout2')

@section('title','control2')

@section('content')

<style>
    .btn-toggle {
        transition: transform 0.3s ease;
    }

    .btn-left {
        transform: translateX(-100%);
    }

    .progress-circle {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background: conic-gradient(#007bff {{ $latestSuhuAir * 3.6 }}deg, #ccc 0deg);
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}

.progress-circle .progress-value {
  width: 80px;
  height: 80px;
  background-color: #fff;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
}

.progress-circle .progress-value h4 {
  margin: 0;
}    
</style>

<!-- Content Row -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Control</h4>     
            </div>
            <div class="row text-center">
                <div class="col-sm-6 col-md-3 mb-4">
                    <a href="nilaisuhuair" class="card-body text-black p-3" style="font-size: large; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <h4 style="font-weight: bold;" class="card-title text-black">Suhu Air</h4>
                        <div class="progress-circle" style="background: conic-gradient(#007bff {{ $latestSuhuAir * 3.6 }}deg, #ccc 0deg);">
                            <div class="progress-value">
                                <h4 style="font-weight: bold;" class="card-title text-black">{{ $latestSuhuAir }}°C</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3 mb-4">
                    <a href="nilaipHair" class="card-body text-black p-3" style="font-size: large; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <h4 style="font-weight: bold;" class="card-title text-black">pH Air</h4>
                        <div class="progress-circle" style="background: conic-gradient(#ff33cf {{ $latestpHAir * (360/14) }}deg, #ccc 0deg);">
                            <div class="progress-value">
                                <h4 style="font-weight: bold;" class="card-title text-black">{{ $latestpHAir }}</h4>
                            </div>
                        </div>                        
                    </a>
                </div>
                <div class="col-sm-6 col-md-3 mb-4">
                    <a href="nilaiTDS" class="card-body text-black p-3" style="font-size: large; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <h4 style="font-weight: bold;" class="card-title text-black">TDS</h4>
                        <div class="progress-circle" style="background: conic-gradient(#e6d51d {{ $latestTDS * (360/1000) }}deg, #ccc 0deg);">
                            <div class="progress-value">
                                <h4 style="font-weight: bold;" class="card-title text-black">{{ $latestTDS }} ppm</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3 mb-4">
                    <a href="nilaitinggiair" class="card-body text-black p-3" style="font-size: large; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <h4 style="font-weight: bold;" class="card-title text-black">Tinggi Air</h4>
                        <div class="progress-circle" style="background: conic-gradient(#5ec661 {{ $latestTinggiAir * (360/15) }}deg, #ccc 0deg);">
                            <div class="progress-value">
                                <h4 style="font-weight: bold;" class="card-title text-black">{{ $latestTinggiAir }} cm</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
             
    {{-- Conten Control --}}
    <div class="col-md-12">
            <div class="card card-with-nav">
                {{-- <div class="card-header">
 
                </div> --}}
                <div class="card-body">
                    
                                    
                    <div class="mt-4 text-center">
    {{-- Program Atur Nilai pH --}}
    <div class="form-group form-inline">
        <label for="inlineinput_pH" class="col-md-3 col-form-label">Atur Nilai pH</label>
        <div class="col-md-3 p-0">
            <input type="text" class="form-control input-full" id="inlineinput_pH" placeholder="Input Nilai pH" disabled> <!-- Menggunakan disabled untuk mencegah input sebelum tombol Edit ditekan -->
        </div>
        <div class="col-md-3 p-2"> 
            <!-- Tombol Edit -->
            <button class="btn btn-warning" id="edit_btn_pH"><i class="fas fa-edit"></i> Edit</button>
            <!-- Tombol Kirim -->
            <button class="btn btn-primary" id="send_pH" disabled><i class="fas fa-paper-plane"></i> Kirim</button>
        </div>
        {{-- Tombol Water Pump --}}
        <div class="col-md-3">
            <h4>Water Pump</h4>
            <button id="toggleButton_water" class="btn btn-success" onclick="toggleButton('toggleButton_water')">ON</button>
        </div>
    </div>
    
    <script>
        document.getElementById("edit_btn_pH").addEventListener("click", function() {
            // Mengaktifkan input saat tombol Edit ditekan
            document.getElementById("inlineinput_pH").removeAttribute("disabled");
            // Mengaktifkan tombol Kirim
            document.getElementById("send_pH").removeAttribute("disabled");
        });
    
        document.getElementById("send_pH").addEventListener("click", function() {
            // Mengunci kembali input saat tombol Kirim ditekan
            document.getElementById("inlineinput_pH").setAttribute("disabled", "disabled");
            // Menonaktifkan tombol Kirim
            document.getElementById("send_pH").setAttribute("disabled", "disabled");
        });
    </script>
    {{-- Penutup Program Atur Nilai pH --}}
    {{-- Program Atur Nilai TDS --}}
    <div class="form-group form-inline">
        <label for="inlineinput_TDS" class="col-md-3 col-form-label">Atur Nilai TDS</label>
        <div class="col-md-3 p-0">
            <input type="text" class="form-control input-full" id="inlineinput_TDS" placeholder="Input Nilai TDS" disabled> <!-- Menggunakan disabled untuk mencegah input sebelum tombol Edit ditekan -->
        </div>
        <div class="col-md-3 p-2"> 
            <!-- Tombol Edit -->
            <button class="btn btn-warning" id="edit_btn_TDS"><i class="fas fa-edit"></i> Edit</button>
            <!-- Tombol Kirim -->
            <button class="btn btn-primary" id="send_TDS" disabled><i class="fas fa-paper-plane"></i> Kirim</button>
        </div>
        {{-- Tombol Aerator Pump --}}
        <div class="col-md-3">
            <h4>Aerator Pump</h4>
            <button id="toggleButton_aerator" class="btn btn-success" onclick="toggleButton('toggleButton_aerator')">ON</button>
        </div>
    </div>
    
    <script>
        document.getElementById("edit_btn_TDS").addEventListener("click", function() {
            // Mengaktifkan input saat tombol Edit ditekan
            document.getElementById("inlineinput_TDS").removeAttribute("disabled");
            // Mengaktifkan tombol Kirim
            document.getElementById("send_TDS").removeAttribute("disabled");
        });
    
        document.getElementById("send_TDS").addEventListener("click", function() {
            // Mengunci kembali input saat tombol Kirim ditekan
            document.getElementById("inlineinput_TDS").setAttribute("disabled", "disabled");
            // Menonaktifkan tombol Kirim
            document.getElementById("send_TDS").setAttribute("disabled", "disabled");
        });
    </script>
</div>

                    
                    <script>
                        function toggleButton(buttonId) {
                            const button = document.getElementById(buttonId);
                            const isOn = button.classList.contains('btn-success');
                            let confirmationMessage = isOn ? 
                                'Apakah Anda yakin ingin mematikan perangkat ini?' : 
                                'Apakah Anda yakin ingin menyalakan perangkat ini?';
                
                            Swal.fire({
                                title: 'Konfirmasi',
                                text: confirmationMessage,
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya',
                                cancelButtonText: 'Tidak'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    if (isOn) {
                                        button.textContent = 'OFF';
                                        button.classList.remove('btn-success');
                                        button.classList.add('btn-danger');
                                    } else {
                                        button.textContent = 'ON';
                                        button.classList.remove('btn-danger');
                                        button.classList.add('btn-success');
                                    }
                                    Swal.fire({
                                        title: 'Berhasil!',
                                        text: 'Operasi berhasil dilakukan.',
                                        icon: 'success',
                                        confirmButtonColor: '#3085d6',
                                    });
                                }
                            });
                        }
                    </script>

                </div>
                </div>
                
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                <script>
                    $(document).ready(function() {
                        $('.btn-toggle').click(function() {
                            $(this).find('.btn').toggleClass('active');
                
                            // Menambahkan kode untuk menampilkan pesan alert saat tombol diklik
                            var status = $(this).find('.active').text();
                            var pumpType = $(this).closest('.col-md-4').find('h4').text();
                            if (!pumpType) {
                                pumpType = $(this).closest('.col-md-5').find('h4').text();
                            }
                            Swal.fire({
                                icon: 'info',
                                title: 'Info Pump!',
                                text: pumpType.trim() + ' is turned ' + status,
                                confirmButtonText: 'OK',
                                confirmButtonClass: 'btn btn-info'
                            });
                
                            if ($(this).find('.btn-primary').length > 0) {
                                $(this).find('.btn').toggleClass('btn-primary');
                            }
                            if ($(this).find('.btn-danger').length > 0) {
                                $(this).find('.btn').toggleClass('btn-danger');
                            }
                            if ($(this).find('.btn-success').length > 0) {
                                $(this).find('.btn').toggleClass('btn-success');
                            }
                            if ($(this).find('.btn-info').length > 0) {
                                $(this).find('.btn').toggleClass('btn-info');
                            }
                
                            $(this).find('.btn').toggleClass('btn-default');
                
                        });
                
                        $('#send_pH').click(function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Nilai pH Dikirim!',
                                text: 'You clicked the button!',
                                confirmButtonText: 'OK',
                                confirmButtonClass: 'btn btn-success'
                            });
                        });

                        $('#send_TDS').click(function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Nilai TDS Dikirim!',
                                text: 'You clicked the button!',
                                confirmButtonText: 'OK',
                                confirmButtonClass: 'btn btn-success'
                            });
                        });
                    });
                </script>
            </div>
            {{-- Penutup Program Atur Nilai TDS --}}
    </div>
    {{-- end conten control --}}
</div>
</div>


@endsection
