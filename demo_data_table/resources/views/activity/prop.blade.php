<!-- Button trigger modal -->
<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Detay
</a>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{$model->description}}
          <br>
          {{$model->causer_type}}
          <br>
          {{$model->created_at}}

          {{ $model->getExtraProperty("Working") }}------{{ $model->properties }}

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
          <button type="button" class="btn btn-primary">Kaydet</button>
        </div>
      </div>
    </div>
  </div>