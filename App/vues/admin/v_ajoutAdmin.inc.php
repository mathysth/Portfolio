<div class="container">
    <div class="row">
        <form method="post">
            <div class="form-group">
                <fieldset>
                    <legend>Ajouter Categorie</legend> <!-- Titre du fieldset -->

                    <label for="nom">Nom</label>
                    <input type="text" name="nom" />

                    <input type="submit" name="addCategorie" value="Ajouter Categorie" />
                </fieldset>
            </div>

            <fieldset>
                <legend>Ajouter Produit</legend> <!-- Titre du fieldset -->

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nomProduit">Nom</label>
                        <input type="text" name="nomProduit" class="form-control" id="nomProduit" placeholder="nomProduit">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prixProduit">Prix</label>
                        <input type="number" name="prixProduit" class="form-control" id="prixProduit" placeholder="prix" value="0" min="0">
                    </div>
                </div>
                <div class="form-group">
                    <label for="descriptionProduit">Description</label>
                    <textarea class="form-control" name="descriptionProduit" id="descriptionProduit" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" name="image" class="form-control-file" id="image">
                </div>
                <div class="form-group">
                    <label class="mr-sm-2" for="categoriePoduit">Categorie</label>
                    <select class="custom-select mr-sm-2" id="categoriePoduit" name="categoriePoduit">
                        <?php
                        foreach($categories as $unCategorie){
                            ?>
                            <option value="<?= $unCategorie['id'] ?>"><?= $unCategorie['libelle'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <input type="submit" name="addProduit" value="Ajouter Produit"  class="btn btn-primary" />
            </fieldset>

        </form>
    </div>
</div>