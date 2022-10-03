@extends('welcome')


@section('content')


<div class="container">
    <div class="card">
        <div class="card-header">
            Send Amount
        </div>
        <div class="card-body">
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form action="/create" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Amount</label>
                 <input type="number" name="amount" id="" class="form-control">

                </div>
                <div class="form-group">
                    <Label>Sender</Label>
                    <input type="number" name="sender_id" id="" class="form-control">

                   </div>
                   <div class="form-group">
                    <Label>Receiver</Label>
                    <input type="number" name="receiver_id" id="" class="form-control">

                   </div>
                   <input type="submit" name="" id="" value="submit" class="form-control">
            </form>
        </div>
    </div>
</div>





@endsection
