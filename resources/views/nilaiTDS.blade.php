@extends('layouts.layout2')

@section('title','nilaiTDS')

@section('content')

        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Tabel Nilai TDS</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="dashboard2">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tabel Nilai TDS</h4>
                                </div>
                                {{-- <div id="add-row" class="card-header">
                                    <div>
                                        <label class="col-sm-4 control-label">Urut Berdasarkan</label>
                                        <div class="col-sm-3">
                                            <select id="urut_berdasarkan" class="form-control">
                                                <option></option>
                                                <option value="suhu">Nilai Suhu</option>
                                                <option value="waktu">Waktu</option>
                                                <option value="asal">Nilai Asal</option>
                                            </select>
                                        </div>
                                        <label class="col-sm-4 control-label">Filter Status</label>
                                        <div class="col-sm-3">
                                            <select id="filter_status" class="form-control">
                                                <option></option>
                                                <option value="terbaru">Terbaru</option>
                                                <option value="terlama">Terlama</option>
                                                <option value="tertinggi">Nilai Tertinggi</option>
                                                <option value="terendah">Nilai Terendah</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4" style="padding-top: 8px;">
                                            <button class="btn btn-primary" id="filter_btn">Filter</button>
                                            <button class="btn btn-secondary" id="reset_btn">Reset</button>
                                        </div>
                                    </div>
                                    
                                    <script>
                                        document.getElementById("filter_btn").addEventListener("click", function() {
                                            // Logika untuk melakukan filter
                                            var urutBerdasarkan = document.getElementById("urut_berdasarkan").value;
                                            var filterStatus = document.getElementById("filter_status").value;
                                            
                                            // Lakukan sesuatu sesuai dengan pilihan filter
                                            // Misalnya, Anda dapat mengirim data ke server untuk filter
                                            // atau memperbarui tampilan berdasarkan filter yang dipilih
                                            console.log("Filter Berdasarkan: " + urutBerdasarkan);
                                            console.log("Filter Status: " + filterStatus);
                                        });
                                    
                                        document.getElementById("reset_btn").addEventListener("click", function() {
                                            // Reset nilai pilihan pada dropdown
                                            document.getElementById("urut_berdasarkan").value = "";
                                            document.getElementById("filter_status").value = "";
                                    
                                            // Lakukan sesuatu setelah reset, seperti memperbarui tampilan atau memuat data awal
                                            console.log("Filter direset");
                                        });
                                    </script>
                                </div> --}}
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="basic-datatables" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nilai TDS</th>
                                                    <th>Waktu</th>
                                                     
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                            @foreach ($datatds as $item)
                                            <tr class="conten fc-center">
                                                {{-- <td>{{ $no++ }}</td> --}}
                                                <td>{{ $item->nilai_TDS }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                
                                            </tr>    
                                            @endforeach 
                                            </tbody>
                                        </table>
                                        <br>
                                            <div class="d-flex justify-content-between">
                                                <div>{{ $datatds->links() }}</div>
                                                <div>
                                                    <form action="{{ url('nilaiTDSair/exportTDS/excel') }}" method="GET">
                                                        <button type="submit" class="btn btn-success">Export to Excel</button>
                                                    </form>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection