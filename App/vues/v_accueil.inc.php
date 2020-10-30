
<div class="container top-head" style="background: none;" id="accueil">
    <section id="presentation">
        <div class="block-aside">
            <div class="row">
                <div class="col">
                    <div class="informations">
                        <p> <span>Age :</span> 18 ans</p>
                        <p> <span>Job :</span>  Etudiant</p>
                        <p> <span>Pays de naissance :</span> Guyane Française</p>
                        <p> <span>Email : </span> mathystheolade973@gmail.com</p>
                        <p> <span></span> </p>
                    </div>
                </div>
                <div class="col">
                    <div class="presentation col">
                        <h4>Présentation</h4>
                        <p>Je m'appelle Mathys Theolade. Je suis né le 29 octobre 2001 et je suis actuellement en BTS SIO au lycée March Bloch à Sérignan. Etant passionné par l'informatique j'aimerais devenir développeur FULL-STACK (Etre capable de réaliser des tâches à n'importe quel niveau technique)</p>
                        <a href="<?= \School\Chemins\Chemins::DOCUMENT ?>CV_1.pdf" download="<?= \School\Chemins\Chemins::DOCUMENT ?>CV_1.pdf" id="download">Télécharger mon cv</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<section id="competences">
    <div class="container">
        <h3 style="text-align: center;">Compétences</h3>
        <p style="font-size: 10.5px;text-align: center;text-decoration: underline;font-weight: bold;">Cliquer sur les logos pour plus d'informations</p>
        <div class="container">
            <div class="block-aside">
                <div style="padding: 15px;">
                    <div class="logo-compétence">
                        <?php
                            foreach ($categorie as $cat){ ?>
                        <div>
                            <h3><?= $cat['nom'] ?> :</h3>
                            <span>
                        <?php
                                foreach ($competences as $comp){
                                    if($cat['id'] == $comp['competence_categories_id']){
                        ?>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#<?=$comp['nom']?>"><img src="<?= \School\Chemins\Chemins::IMAGES_LOGOS."".$comp['id'] ?>.png"  alt="" title="Compétences <?= $comp['nom'] ?>"></a>
                        <?php
                                    }
                                }
                        ?>
                            </span>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <h3  style="text-align: center;padding: 15px 0;margin: 15px 0;">Réalisation</h3>
        <div class="container">
            <div class="block-aside">
                <div style="padding: 15px;">
                    <div class="row">
                        <?php
                        foreach($realisation as $UnRealisation) {
                            if(strpos($UnRealisation['images'],";") === false){
                                $isArray = false;
                                $images = $UnRealisation['images'];
                            }else{
                                $isArray = true;
                                $images = explode(";",$UnRealisation['images']);
                            }
                            ?>
                            <div class="col">
                                <div class="card" style="width: 18rem;">
                                    <div id="<?= $UnRealisation['titre'] ?>" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                        <?php
                                        if($isArray){
                                             for ($i = 0; $i < count($images); $i++) { ?>
                                                     <li data-target="#<?= $UnRealisation['titre'] ?>" data-slide-to="<?= $i ?>" <?php if($i == 0){ echo 'class="active"'; } ?>></li>
                                            <?php }
                                        }else{?>
                                                <li data-target="#<?= $UnRealisation['titre'] ?>" data-slide-to="0" class="active"></li>
                                        <?php
                                        }
                                        ?>
                                        </ol>
                                        <div class="carousel-inner">
                                            <?php if($isArray){;
                                                for ($i = 0; $i < count($images); $i++){
{}                                                ?>
                                                <div class="carousel-item <?php if($i == 0){ echo 'active';} ?> ">
                                                    <img class="card-img-top" src="<?= \School\Chemins\Chemins::IMAGES_REALISATION.$images[$i]?>"  alt="<?= $images[$i] ?>">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h5><?= $images[$i] ?></h5>
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#<?= $UnRealisation['titre'] ?>" role="button"
                                                   data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#<?= $UnRealisation['titre'] ?>" role="button"
                                                   data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                                <a class="carousel-control-pause" href="#<?= $UnRealisation['titre'] ?>"
                                                   role="button" data-slide="next">
                                                    <span class="carousel-control-pause-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>

                                            <?php
                                                }
                                            }else{?>
                                                <div class="carousel-item active">
                                                    <img class="card-img-top" src="<?= \School\Chemins\Chemins::IMAGES_REALISATION.$images ?>" alt="<?= $images ?>">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h5><?= $images ?></h5>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $UnRealisation['titre'] ?></h5>
                                        <p class="card-text"><?= $UnRealisation['description'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="parcour">
    <div class="container">
        <h3 style="text-align: center;padding: 15px 0;margin: 15px 0;"> Parcours</h3>
        <div class="block-aside">
            <table id="table-parcour">
                <thead>
                    <tr>
                        <td>Dîplome</td>
                        <td>Année</td>
                        <td>établissement</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($parcour as $UnParcour){ ?>
                        <tr>
                            <td> <?= $UnParcour['diplome'] ?> </td>
                            <td> <?= $UnParcour['annee'] ?></td>
                            <td> <?= $UnParcour['etablissement'] ?>  <br />( <?= $UnParcour['commune'] ?> )</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</section>
<section id="interets">
    <div class="container">
        <h3 style="text-align: center;padding: 15px 0;margin: 15px 0;"> Centre d'intérêt</h3>
        <div class="block-aside">
            <div style="margin-left: auto;margin-right: auto;width: 75%;">
                <p style="text-align: center;margin: 0 !important;">A côté de l'informatique, j'affectionne les Warner Bros, des séries en tout genre , le sport et découvrir de nouvelles choses.
                    <br /> J'ai fait de l'athlétisme pendant 2 ans et j'ai effectué 6 ans de natation durant mon enfance. Actuellement, je pratique la course à pied.
                    <br /> Étant un fan des dessins animés Warner Bros (Bugs Bunny , Tom et Jerry , Daffy Ducks , etc ...) j'ai récemment commencé à rechercher et acheter les bandes originales(1972 ,etc ..)
                    <br/> Enfin fan d'explorations et découverte en tout genre un de mes rêves serait de découvrir les plus beaux endroits de notre planète.
                </p>
            </div>
        </div>
    </div>
</section>
