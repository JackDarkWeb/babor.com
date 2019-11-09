

<div class="d-none d-sm-block">
    <div class="d-none d-sm-block singin-nav" style="background: #9d1e65;">
        <div class="px-5">
            <nav class="row navbar navbar-expand-sm font-weight-bold">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav col">
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="#" style="color: #111; background: #eee; padding: 5px 20px 5px 20px; border-radius: 10px;">Fr</a>
                        </li>
                        <li class="nav-item d-block d-lg-none">
                            <a class="navbar-brand" href="index.php" style="color: #fff;"><img src="images/Logo45.png"></a>
                        </li>
                    </ul>

                    <ul class="navbar-nav col">
                        <li class="nav-item d-none d-lg-block">
                            <a class="navbar-brand" href="index.php" style="color: #fff;"><img src="images/Logo45.png"></a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item d-sm-none d-md-block">
                            <a class="nav-link" style="color: #fff;">Pas encore membre ?</a>
                        </li>
                        <li class="nav-item d-sm-none d-md-block">
                            <a class="nav-link" href="?view=register" style="color: #111; background: #eee; padding: 5px 20px 5px 20px; border-radius: 10px;">Rejoindre Babor</a>
                        </li>
                        <li class="nav-item d-sm-block d-md-none">
                            <a class="nav-link" href="?view=register" style="color: #111; background: #eee; padding: 5px 20px 5px 20px; border-radius: 10px;">Créer un compte</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <?php include 'includes/message_flash.php'?>

    <div class="col-lg-6 offset-lg-3 col-sm-8 offset-sm-2 singin-content pb-5">
        <div class="row">
            <div class="col-md-9 col-sm-12">

                <div class="row">
                    <h4>Connecte-toi sur Badoo</h4>
                </div>
                <div class="row mr-5">
                    <p>Saisis identifiant de connexion. <a href="?view=register">Inscris-toi ici</a> si ce n'est pas encore fait !</p>
                </div>
                <div class="row">
                    <form method="post" action="" class="col-sm-12" id="form-reset">
                        <div class="form-group row mb-4">
                            <label for="email" class="mr-4">Identifiant</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" name="email_or_phone" class="form-control" id="email" value="<?= $validate->post('email_or_phone')?>" placeholder="E-mail ou numéro de téléphone">
                                <span class="text-danger error-email font-italic"><?= $validate->error("email_or_phone")?></span>
                            </div>
                        </div>

                        <div class="form-check my-4" style="margin-left: 100px;">
                            <input class="form-check-input" type="checkbox" value="" id="check">
                            <label class="form-check-label" for="check">
                                Se souvenir de moi
                            </label>
                        </div>
                        <div class="singin-btn-validate" style="margin-left: 100px;">
                            <button type="submit" name="forget_pass"  class="btn font-weight-bold" role="button">Continuer</button>
                        </div>

                    </form>

                </div>

            </div>
            <div class="col-md-3 col-sm-12 box2">
                <p class="my-4 text-center">Se connecter avec :</p>
                <div class="row">
                    <div class="col-md-12 col">
                        <div class="row singin-btn1">
                            <a class="btn mb-3 mx-auto bg-dark" href="#" role="button"><i style="margin-right: 8px;" class="fa fa-facebook-official" aria-hidden="true"></i> <small class="font-weight-bold">Facebook</small></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col">
                        <div class="row singin-btn2">
                            <a class="btn mx-auto bg-warning" href="#" role="button"><i style="margin-left: -10px; margin-right: 10px;" class="fa fa-google" aria-hidden="true"></i> <small class="font-weight-bold">Google</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <hr>
        <footer class="row">
            <div class="col-12 bg-white">
                <div class="row">
                    <div class="footerContent">
                        <a href="">A propos</a>
                        <a href="">CGU</a>
                        <a href="">Confidentialité</a>
                        <a href="">Liens rapides</a>
                        <a href="">Aide</a>
                    </div>
                </div>

                <div class="row">
                    <small class="ml-auto pr-4 pb-4 font-weight-bold">2018-<?=date('Y')?> © Babor</small>
                </div>
            </div>
        </footer>
    </div>
</div>

<!--singin page on mobile-->
<div class="mobile-bg d-block d-sm-none" style="height: 100vh;">
    <div class="container wow fadeInLeft">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="mx-auto mt-4 d-inline-flex">
                        <img src="images/Logo45.png" style="width: 150px; height: 30px; margin-bottom: 80px;">
                    </div>
                </div>
            </div>
        </div>

        <?php include 'includes/message_flash.php'?>

        <div class="row pl-4">
            <form method="post" action="" class="col-12" id="form-reset">
                <div class="form-group row mb-4">
                    <div class="col-12">
                        <input type="text" name="email_or_phone" class="row form-control" id="email" value="<?= $validate->post('email_or_phone')?>" placeholder="E-mail ou numéro de téléphone">
                        <span class="text-danger error-email font-italic"><?= $validate->error("email_or_phone")?></span>
                    </div>
                </div>

                <div class="form-check my-4">
                    <input class="form-check-input" type="checkbox" value="" id="check">
                    <label class="form-check-label" for="check">
                        Se souvenir de moi
                    </label>
                </div>
                <div class="col-10">
                    <div class="row mx-auto">
                        <button type="submit" name="forget_pass" class="btn btn-primary w-100" role="button">Continuer</button>
                    </div>
                </div>
               <br/>
            </form>
        </div>

        <div class="row">
            <a href="index.php"><div class="mx-auto bg-light px-3 py-1 rounded-circle go-backHome"><a href="index.php"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></div></a></a>

        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/password_forget.js"></script>