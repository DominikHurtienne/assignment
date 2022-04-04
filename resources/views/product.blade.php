<tr>
    <td style="font-weight: bold">{{$product->title}}</td>
    <td >{{$product->description}}</td>
    <td >{{$product->quantity}} available</td>
    <td >@to_euro($product->price)</td>
    @if($product->quantity > 0)
        <td >
            <form method="post" action="{{ url("/cart/add/" . auth()->user()->id . "/$product->id") }}">
                @csrf
                <input type="submit" value="Add 1 to cart">
            </form>
        </td>
    @endif
</tr>
