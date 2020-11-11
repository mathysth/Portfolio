<div class="container">
    <div class="row">
        <?= $leftTab ?>
        <div class="col-6">
            <form method="post" id="form">
                <div class="form-group">
                    <fieldset>
                        <legend>Ajouter Categorie</legend> <!-- Titre du fieldset -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom Categorie">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="submit" name="addCategorie" class="btn btn-primary form-control" value="Ajouter Categorie" />
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group" style="padding: 20px 0">
                        <label for="exampleFormControlSelect1">Editer Catégorie :</label>
                        <select name="selectedCat" class="form-control" id="exampleFormControlSelect1" >
                            <?php
                            foreach($categories as $unCategorie){
                                ?>
                                <option value="<?= $unCategorie['id'] ?>" ><?= $unCategorie['libelle'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div style="padding: 20px 0">
                        <input type="submit" name="suppressionCat" class="btn btn-primary btn-sm" value="Supprimer la Categorie">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>