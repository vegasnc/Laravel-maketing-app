@extends('layouts.app')
@section('title', 'FP-Growth')
@section('judul','Perhitungan FP-Growth')
 @section('content')
</div>
<div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
            <h5 class="card-title">List Transaksi (Dataset)</h5>
                <table class="table table-striped mb-0">
                    <thead>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $pattern => $reg)
                        @php $no = 1; @endphp
                            <tr>
                                <th>{{ $reg['nama_produk1'] }}</th>
                            </tr>
                            <tr>
                              <th>{{ $reg['nama_produk2'] }}</th>
                          </tr>
                            <tr>
                              <th>{{ $reg['nama_produk3'] }}</th>
                          </tr>
                            <tr>
                              <th>{{ $reg['nama_produk4'] }}</th>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Frequent Itemset</h5>
          <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>Data Set</th>
                    <th>Qty</th>
                    <th>Support</th>
                </tr>
            </thead>
            <tbody>
                @foreach($get as $getorders => $getorder)
                    <tr>
                        <th>{{ $getorders }}</th>
                        <th>{{ $getorder['qty'] }}</th>
                        <th>{{ $getorder['support'] }}</th>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
      </div>
    </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Frequency Pattern</h5>
        <table class="table table-striped mb-0">
          <thead>
              <tr>
                  <th>Item</th>
                  <th>FrequentPattern</th>
                  <th>Frequent</th>
              </tr>
          </thead>
          <tbody>
            @foreach($getPatterns as $getsx => $xx)
            <tr>
                <th>{{ $xx['item'] }}</th>
                <th>{{ $xx['frequentPattern'] }}</th>
                <th>{{ $xx['frequent'] }}</th>
            </tr>
            @endforeach
          </tbody>
          </table>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Association Rules</h5>
        <table class="table table-striped mb-0">
          <thead>
              <tr>
                  <th>Antecedent</th>
                  <th>Consequent</th>
                  <th>Confidence</th>
                  <th>Support</th>
                  <th>LiftRatio</th>
              </tr>
          </thead>
          <tbody>
            @foreach($getRuless as $rules => $sd)
            <tr>
                <th><strong style="color: rgba(255, 0, 0, 0.671)">Jika </strong>{{ $sd['antecedent'] }}</th>
                <th><strong style="color: rgba(6, 90, 247, 0.671)">Maka </strong>{{ $sd['consequent'] }}</th>
                <th>{{ $sd['confidence'] }}</th>
                <th>{{ round($sd['support'],2) }}</th>
                <th>{{ round($sd['liftRatio'],2) }}</th>
            </tr>
            @endforeach
          </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
    
    
</div>
  @endsection