<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <input type="hidden" id="modal-id" name="modal-id">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Диктант</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-row">
        <div class="col-md-5 ml-5 mb-3 mr-2">
          <label for="validationCustom01">Название</label>
          <input type="text" class="form-control" id="modal-title" name="modal-title" placeholder="Введите название" required>
          <div class="valid-feedback">
            Отлично!
          </div>
          <div class="text-danger modal-title-invalid">
            Введите Название
          </div>
        </div>
        <div class="col-md-5 mb-3 mr-2">
          <label for="validationCustom02">Ссылка</label>
          <input type="text" class="form-control" id="modal-link" name="link" placeholder="Введите ссылку" required>
          <div class="valid-feedback">
            Отлично!
          </div>
          <div class="text-danger modal-link-invalid">
            Введите Ссылку
          </div>
        </div>
      </div>
      <div class="form-row">

        <div class="ml-5 col-md-5 mb-3 mr-2">
          <div class="custom-control custom-checkbox row">
            <input type="checkbox" class="" id="modal-status" name="status">
            <label class="" for="same-address">Активен</label>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="ml-5 col-md-10 mb-3 mr-2">
          <label for="description">Описание</label>
          <textarea class="form-control" rows="6" type="text" class="form-control" id="modal-description" name="description" placeholder="Введите описание" required></textarea>
          <div class="text-danger modal-description-invalid">
            Введите описание
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="ml-5 col-md-4 mb-3 mr-2">
          <label for="started_at">Начало</label>
          <input autocomplete="off" id="modal-started_at" class="form-control datepicker" name="started_at" placeholder="Введите дату начала" required>
          <div class="text-danger modal-started_at-invalid">
            Введите начало
          </div>
        </div>
        <div class="ml-5 col-md-4 mb-3 mr-2">
          <label autocomplete="off" for="finished_at">Конец</label>
          <input id="modal-finished_at" class="form-control datepicker_1" name="finished_at" placeholder="Введите дату окончания" required>
          <div class="text-danger modal-finished_at-invalid">
            Введите конец
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary btn-close-modal" data-dismiss="modal">Отмена</button>
      <button type="button" id="createdictation" class="btn btn-success" data-token='{{csrf_token()}}'>
      Выполнить <span id="loader" role="status" aria-hidden="true"></span></button>
    </div>
  </div>
</div>
</div>