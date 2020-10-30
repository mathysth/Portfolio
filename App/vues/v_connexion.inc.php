<div class="container">
    <div class="col-6">
        <form method="post" id="form">
            <div class="form-group">
                <fieldset>
                    <legend>Connexion Admin</legend> <!-- Titre du fieldset -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" name="pseudo" class="form-control" id="nom" placeholder="Pseudo">
                        </div>

                        <div class="form-group col-md-6">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>

                        <div class="form-group form-check col-md-6">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remindMe">
                            <label class="form-check-label" for="exampleCheck1">Rester Connecté</label>
                        </div>

                        <div class="form-group col-md-4">
                            <input type="submit" name="connexion" class="btn btn-primary form-control" value="Connexion" />
                        </div>
                    </div>
                </fieldset>
            </div>
        </form>
    </div>
</div>