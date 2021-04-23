@extends('layouts.app')

@section('content')
<div class="container">
<h1>craete offers <h1>
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form method="post" action ="{{route('offers.store')}}">
            @csrf

                @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Success!</strong> {{Session::get('success')}}
                            </div>
                @endif

                <div class="form-group">
                    <label for="name">name :</label>
                    <input type="text" class="form-control" placeholder="Enter name" id="name" name="name">
                @error('name')
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Danger!</strong> {{$message}}
                            </div>
                @enderror

                </div>

                <div class="form-group">
                    <label for="price">price:</label>
                    <input type="text" class="form-control" placeholder="Enter price" id="price" name="price">
                
                    @error('price')
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Danger!</strong> {{$message}}
                            </div>
                @enderror

                </div>
               
                <div class="form-group">
                    <label for="details">details:</label>
                    <input type="text" class="form-control" placeholder="Enter details" id="details" name="details" >
                
                    @error('details')
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Danger!</strong> {{$message}}
                            </div>
                @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
    </div>
</div>
@endsection
