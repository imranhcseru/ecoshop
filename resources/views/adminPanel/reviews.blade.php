@extends('adminPanel.layout')
@section('content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Reviews from Users</h2>
            </div>
            <div class="box-content">
            <div class="box-content">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Review From</th>
                            <th>Review</th>
                            <th>Rating</th>
                            <th>Product</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($reviews as $review)
                    <tr>
                        <td>{{$review->customer_id}}</td>
                        <td>{{$review->review}}</td>
                        <td>{{$review->star}}</td>
                        <td>{{$review->product_id}}</td>
                        <td>{{$review->created_at}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>            
            </div>
        </div>
    </div>
					
@endsection