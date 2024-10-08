@extends('layouts.layout2')

@section('title','dashboard')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <h4 class="page-title text-center">User Profile</h4>
            <div class="row">
                <div class="col-md-6 mx-auto" >
                    <div class="card card-profile card-secondary">
                        <div class="card-header" style="background-image: url('assets/img/blogpost.jpg')">
                            <div class="profile-picture">
                                <div class="avatar avatar-xl">
                                    <img src="assets/img/paklinds2.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="user-profile text-center">
                                <div class="name">Lindung Siswanto, 40</div>
                                <div class="job">Frontend Developer</div>
                                <div class="desc">A man who hates loneliness</div>
                                <div class="view-profile">
                                    <a href="accsetting" class="btn btn-secondary btn-block">View Profile</a>
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