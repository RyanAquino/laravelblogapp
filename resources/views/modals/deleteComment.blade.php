<div id="deleteComment" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Comment</h4>
      </div>

      <div class="modal-body text-center">
        <h1>Are you sure you want to delete your comment?</h1>
          {{Form::open(['action' => ['CommentsController@destroy', $comment->id] , 'method' => 'DELETE'])}}
		  {{Form::submit('Delete', ['class' => 'btn btn-lg btn-block btn-danger'])}}

		  {{Form::close()}}
      </div> 

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>