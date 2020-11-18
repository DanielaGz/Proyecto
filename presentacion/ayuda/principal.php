<div class="modal-dialog modal-xl ">
    <div class="modal-content ">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tutoriales</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body " style="max-height: 38vmax;">
            <div class="row">
                <div class="col-lg-9 overflow-auto" id="video">

                </div>
                <div class="col-lg-3 mt-4 mb-4 overflow-auto" style="max-height: 30vmax;">
                    <div id="myList" class="list-group overflow-auto">
                        <button type="button" value="1" class="list-group-item list-group-item-action active">¿Cómo agregar una seccion?</button>
                        <button type="button" value="2" class="list-group-item list-group-item-action">¿Cómo eliminar una seccion?</button>
                        <button type="button" value="3" class="list-group-item list-group-item-action">¿Cómo editar las secciones?</button>
                        <button type="button" value="4" class="list-group-item list-group-item-action">¿Cómo navegar entre secciones?</button>
                        <button type="button" value="5" class="list-group-item list-group-item-action">¿Cómo descargar tu plantilla final?</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</div>

<script>
    var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/ayuda/video.php") ?>&tut=1";
    $("#video").load(url);
    $('.list-group-item').on('click', function() {
        var $this = $(this);
        var $alias = $this.data('alias');

        $('.active').removeClass('active');
        $this.toggleClass('active');
        var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/ayuda/video.php") ?>&tut=" + $(this).val();
        $("#video").load(url);
    })
</script>