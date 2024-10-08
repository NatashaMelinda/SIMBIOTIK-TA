@extends('layouts.layout2')

@section('title','nilaipHair')

@section('content')

        <!-- Content -->
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Tabel Data Sensor pH</h4>
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
                                    <h4 class="card-title">Tabel Data Sensor pH</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="basic-datatables" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nilai Suhu Air</th>
                                                    <th>Waktu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                <?php foreach ($dataph as $item): ?>
                                                    <tr class="conten fc-center">
                                                        <td><?php echo $item->nilai_pH; ?></td>
                                                        <td><?php echo $item->created_at; ?></td>>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <br>
                                            <div class="d-flex justify-content-between">
                                                <div>{{ $dataph->links() }}</div>
                                                <div>
                                                    <form action="{{ url('nilaipHair/exportpH/excel') }}" method="GET">
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
        <!-- End Content -->
        @endsection