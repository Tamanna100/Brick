@extends('layout.adminMaster')


@section('top')
         @include('admin.adminHeader')
@endsection


@section('content')
	
	@include('admin.adminSidebar')

    <div class="row">
    	<div class="col-md-4">

    			<h4>Orders</h4>
				<table class="table  order-table">
	  				<thead>
	  					<th>Order Code</th>
	  					<th>Order Details</th>
	  					<th>Order date</th>
	  				</thead>

	  				<tbody>
	  					@foreach($orders as $order)
		  					<tr>
		  						<td>{{$order->order_code}}</td>
		  						<td>{{$order->order_detail}}</td>
		  						<td>{{$order->order_date}}</td>
		  					</tr>
	  					@endforeach
	  				</tbody>
				</table>
    		

    	</div>

    	<div class="col-md-5">
    		<h4>Items</h4>
    		  	<table class="table order-table">
  				<thead>
  					<th>Order Code</th>
  					<th>Item Code</th>
  					<th>Item Name</th>
  					<th>Quantity</th>
  					<th>Cost</th>

  				</thead>

  				<tbody>

  				@foreach($items as $item)
  					<tr>
  						@foreach($orders as $order)
  							@if($item->order_id == $order->id )
  								<td>{{$order->order_code}}</td>
							@endif
  						@endforeach
					
  						<td>{{$item->item_code}}</td>
  						<td>{{$item->item_name}}</td>
  						<td>{{$item->quantity}}</td>
  						<td>{{$item->cost}}</td>
  					</tr>
  				@endforeach
  				</tbody>
			</table>
    	</div>



		    <div class="row">
		    	<div class="col-md-offset-1 col-md-6">
		    		<h4>Payments</h4>
		    		<table class="table  order-table">
		  				<thead>
		  					<th>Order Code</th>
		  					<th>Payment Method</th>
		  					<th>Due Date</th>
		  				</thead>

		  				<tbody>

		  				@foreach($payments as $payment)
							<tr>
				  				@foreach($orders as $order)
		  							@if($payment->order_id == $order->id )
		  								<td>{{$order->order_code}}</td>
									@endif
		  						@endforeach
		  						<td>{{$payment->payment_method}}</td>
		  						<td>{{$payment->payment_due_date}}</td>
		  					</tr>
		  				@endforeach

		  				</tbody>
					</table>
		    	</div>
		    </div>


    </div>





@endsection

























