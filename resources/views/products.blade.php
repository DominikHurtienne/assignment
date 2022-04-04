@extends('layouts.app')

@section('content')
    <table>
        <tr>
            <th>Product</th>
            <th>Description</th>
            <th>Avaliability</th>
            <th>Price</th>
        </tr>
        //multiple includes might be slow, test it
        @foreach($products as $product)
            @include('product', $product)
        @endforeach
    </table>
@endsection
