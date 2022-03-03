 @extends('layouts.app')
 @section('title','Dashboard')
 @section('judul','Dashboard')
 @section('content')
<div class="col-6 col-lg-3 col-md-6">
 <div class="card">
     <div class="card-body px-3 py-4-5">
        <div class="row">
            <div class="col-md-4">
                 <div class="stats-icon purple">
                     <i class="iconly-boldShow"></i>
                </div>
            </div>
            <div class="col-md-8">
                <h6 class="text-muted font-semibold">Profile Views</h6>
                <h6 class="font-extrabold mb-0">112.000</h6>
                <h3>{{ Auth::user()->name }}</h3>
            </div>
        </div>
    </div>
</div>
</div>
@endsection