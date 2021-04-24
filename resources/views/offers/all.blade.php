@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Bordered Table</h2>
  <p>The .table-bordered class adds borders on all sides of the table and the cells:</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{__('msgs.name')}}</th>
        <th>{{__('msgs.price')}}</th>
        <th>{{__('msgs.details')}}</th>
      </tr>
    </thead>
    <tbody>
    @foreach($Offers as $offer)
      <tr>
        <td>{{$offer->id}}</td>
        <td>{{$offer->name}}</td>
        <td>{{$offer->price}}</td>
        <td>{{$offer->details}}</td>

      </tr>
      @endforeach  

    </tbody>
  </table>
</div>

@endsection
