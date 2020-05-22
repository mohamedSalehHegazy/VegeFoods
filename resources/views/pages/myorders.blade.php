@include('layouts.header')
@include('layouts.navbar')
@include('layouts.app')

<table class="table">
  <thead class="thead-primary">
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">Customer Phone</th>
      <th scope="col">Total</th>
      <th scope="col">Status</th>
      <th scope="col">Payment</th>
      <th scope="col">Order Time </th>
    </tr>
  </thead>
  <tbody>
  @if(count($orders)==0)
    <p class="alert alert-warning"> No Orders Found</p>
  @else
  @foreach($orders as $order)
    <tr>
      <td>{{$order->order_id}}</td>
      <td>{{$order->phone}}</td>
      <td>{{$order->total}}</td> 
      <td>{{$order->status}}</td>
      <td>{{$order->payment}}</td>
      <td>{{$order->order_time}}</td>
    </tr>
 @endforeach
 @endif 
  </tbody>
</table>

<hr>
@include('layouts.footer')

