<div id="deletePost" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Post</h4>
      </div>

      <div class="modal-body text-center">
        <h1>Are you sure you want to delete your post?</h1>
			{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}

			{{Form::hidden('_method' , 'DELETE')}}
			{{Form::submit('Delete', ['class' => 'btn btn-lg btn-danger btn-block'])}}

			{!!Form::close()!!}
      </div> 

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>