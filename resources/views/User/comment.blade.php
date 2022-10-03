@extends('welcome')

@section('content')

<table class="table">
<tr>
    <td>#</td>
    <td>user</td>
    <td>Comment</td>
</tr>
<tbody>
    @foreach ($comments as $comment )
    <tr>



<td>{{$comment->id}}</td>
<td>{{$comment->name}}</td>
<td>{{$comment->context}}</td>




    </tr>
    @endforeach
</tbody>



</table>








@endsection
