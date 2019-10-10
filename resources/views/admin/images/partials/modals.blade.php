<div class="modal fade" tabindex="-1" role="dialog" id="modal-delete">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Eliminando registro</h4>
      </div>
      <div class="modal-body">
        <p>¿Estás seguro de Eliminar éste registro?</p>
        <form action="{{ route('files-ajax.store') }}" id="sample_form" class="form-horizontal" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button id="yes-delete" type="button" class="btn btn-danger" data-dismiss="modal">Si estoy seguro</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->