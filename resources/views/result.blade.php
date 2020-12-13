@extends('master')
@section('content')
    <div class="main">
        <div class="container">
            <h1 class="bg-danger text-white text-center mt-3">Our Result</h1>
            <div class="row mx-auto mt-5">
                <div class="col-md-6">
                    <div class="">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Day</th>
                                <th scope="col">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($result as $day =>$amount)
                            <tr>
                                <th scope="row">#</th>
                                <td>{{$day}}</td>
                                <td>{{$amount}}</td>
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
