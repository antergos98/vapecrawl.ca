@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <form action="/search" method="GET">
                            <div class="form-group">
                                <input type="text" name="q" class="form-control" placeholder="Search for products..."
                                       required autofocus>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
