<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form  action="" method="POST">
            @csrf
            <input type="hidden" name="_method" value="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                  <div class="mb-3">
                                        <label for="">Name</label>
                                        <input  type="text" class="form-control" name="name">
                                  </div>
                                  <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" name="email">
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="submitForm(this.form)" type="button"  class="btn btn-primary btn-submit">
                          <i class="fa fa-save mr-2"></i> <span class="btn-submit-label"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>