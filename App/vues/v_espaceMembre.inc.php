<div class="container">
    <div class="row">
        <?= $leftTab ?>
        <div class="col-6">
            <div class="pt-2 px-2">
                <p>Compte numéro : <?= $memberId ?></p>
                <p>User : <?= $user ?></p>
                <p>Email : <?= $email ?></p>
                <p>Inscription : <?= $date ?></p>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="suppression" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                La suppression de compte est irréversible
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a href='?controleur=action&action=suppressionCompte&returnUri=".$url."' class="btn btn-primary">Confirmer la suppression</a>
            </div>
        </div>
    </div>
</div>