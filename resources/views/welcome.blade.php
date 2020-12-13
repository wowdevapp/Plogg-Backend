@extends('master')
@section('content')
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 p-5">
                        <form method="POST" action="{{route('result')}}">
                            @csrf
                            <div class="form-group">
                                <label for="start">Start Date</label>
                                <input type="date" name="startDate" class="form-control"  placeholder="Start Date" id="start">
                            </div>
                            <div class="form-group">
                                <label for="endDate">End Date</label>
                                <input type="date" name="endDate" class="form-control" placeholder="End Date" id="endDate">
                            </div>
                            <div class="form-group">
                                <label for="totale">Total</label>
                                <input type="number" name="total" class="form-control" placeholder="Total" id="totale">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
