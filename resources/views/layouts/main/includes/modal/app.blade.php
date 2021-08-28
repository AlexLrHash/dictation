<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Изменить Имя</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input class="form-control" type="text" id="profile-name" value="{{ auth()->user()->name }}" name="name">
          <label for="profile-name" class="text-danger profile-name-invalid" id="profile-name-invalid"></label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
        <button data-token='{{ csrf_token() }}' id="profile-change-name" type="submit" class="btn btn-primary">
          Сохранить изменения  <span id="loader" role="status" aria-hidden="true"></span>
        </button>
      </div>
    </div>
  </div>
</div>