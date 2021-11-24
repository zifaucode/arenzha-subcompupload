@extends('layouts.app')

@section('content')
<br>

<h3>Dashboard</h3>
<br>
<div class="row">
    <div class="col-xl-6S col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-primary bg-darken-2">
                        <i class="ft-airplay font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-primary white media-body">
                        <h5>Sub Company</h5>
                        <h5 class="text-bold-400 mb-0"> 28</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-danger bg-darken-2">
                        <i class="ft-file font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-danger white media-body">
                        <h5>Upload File</h5>
                        <h5 class="text-bold-400 mb-0">1,238</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




@endsection