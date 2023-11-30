<div class="modal fade" id="ModalSair" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja sair?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Selecione "Sair" abaixo se estiver pronto para encerrar sua sessão atual.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" id="btn-sair" class="btn bg-gradient-primary">Sair</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(function () {
        $('#btn-sair').click(function (e) {
            e.preventDefault();
            $.ajax({
                type: "DELETE",
                url: "/dashboard/destroy",
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if (response.status == 'success') {
                        Swal.fire(response.title, response.message, response.status);
                        setTimeout(() => {
                            window.location.href = '/';
                        }, 1500);
                    } else {
                        Swal.fire(response.title, response.message, response.status);
                    }
                }
            });
        });
    });
</script>