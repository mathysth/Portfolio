<div class="container top-head" style="background: none;">
    <section id="presentation">
        <h1 style="text-align: center;color: #fff;line-height: 0"> Boutique </h1>
    </section>
</div>
<section id="boutique">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1> Catégories </h1>
                <ul>
                    <?php
                    foreach($categorie as $unCategorie){
                        ?>
                        <li>
                            <a href=index.php?controleur=shop&categorie=<?= $unCategorie['libelle'] ?>><?= $unCategorie['libelle'] ?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col-8">
                <?php
                if(isset($_GET['categorie']) && !empty($_GET['categorie'])) {
                    foreach ($lesProduits as $unProduit) {
                        ?>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="<?= \School\Chemins\Chemins::IMAGES ?>slide-bg.jpg"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?= $unProduit['nom'] ?></h5>
                                <p class="card-text"><?= $unProduit['description'] ?> <br/> <strong>
                                        Catégorie: </strong> (<?= $categorieProduit ?>) <br/>
                                    <strong>Prix: </strong> <?= $unProduit['prix'] ?> Euros</p>
                                <a href="#" class="btn btn-primary">Ajouter au panier</a>
                            </div>
                        </div>
                    <?php }
                }?>
            </div>
        </div>
    </div>
</section>
