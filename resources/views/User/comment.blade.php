@extends('welcome')

@section('content')

<table class="table">
<tr>
    <td>#</td>
    <td>user</td>
    <td>Comment</td>
</tr>
<tbody>

  <?php 
    $total=$comments->count('comments.context');
    // echo "<pre>";
    // print_r($total);
    // exit();
  
  ?>
    @foreach ($comments as $comment )
    <tr>



<td>{{$comment->id}}</td>
<td>{{$comment->name}}</td>
<td>{{$comment->context}}/{{$total_comments}}</td>




    </tr>
    @endforeach
</tbody>



</table>








@endsection
