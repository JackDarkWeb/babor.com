<div class="bg-light">

    <div class="container">
        <div class="row">
            <div class="col-lg-3 d-none d-lg-block" style="">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="mx-auto mt-4"><a href="index.php"><img src="images/Logo45.png" style="width: 150px; height: 30px; margin-bottom: 50px;"></a></div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="row singin-btn1">
                                    <a class="btn mb-3 mx-auto bg-dark" href="#" role="button"><i style="margin-right: 8px;" class="fa fa-facebook-official" aria-hidden="true"></i> <small class="font-weight-bold">Facebook</small></a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row singin-btn2">
                                    <a class="btn mx-auto bg-warning" href="#" role="button"><i style="margin-left: -10px;" class="fa fa-google" aria-hidden="true"></i> <small class="font-weight-bold"></small></a>
                                </div>
                            </div>
                        </div>

                        <?php include 'includes/message_flash.php'?>

                        <div class="row mb-4">
                            <h4 class="mx-auto">Crée un profil</h4>
                        </div>
                        <div class="row mb-3">
                            <form class="col-sm-12" method="post" action="" id="form-register">
                                <div class="form-group row mb-4">
                                    <div class="col-sm-12">
                                        <input type="text" name="name" class="row form-control" id="name" value="<?= $validate->post('name')?>" placeholder="Prénom" pattern="^-?[a-zA-Z\ ]+$"/>
                                        <span class="text-danger error-name font-italic"><?= $validate->error("name")?></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <div class="col-sm-4">
                                        <select name="day" id="day" class="row form-control" style="<?= ($validate->error('day')) ? "border-color : red" : ''?>">
                                            <option>Jour...</option>

                                            <?php for($i = 1; $i <= 31; $i++)
                                            {
                                                ?>
                                                <option value="<?=$i?>" <?=(isset($_POST['day']) && $_POST['day'] == $i)? 'selected = selected' : ''?>><?=$i?></option>
                                                <?php
                                            }
                                            ?>

                                        </select>
                                    </div>

                                    <div class="col-sm-4">
                                        <select class="row form-control" id="month" name="month" style="<?= ($validate->error('month')) ? "border-color : red" : ''?>">
                                            <option>Mois...</option>

                                            <?php foreach ($validate->months as $key => $month)
                                            {
                                                ?>
                                                <option value="<?=$key?>" <?=(isset($_POST['month']) && $_POST['month'] == $key)? 'selected = selected' : ''?>><?=$month?></option>
                                                <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="year" id="year" class="row form-control"  placeholder="Année..." value="<?= $validate->post('year')?>" pattern="^(19|20)[0-9]{2}" style="<?= ($validate->error('year')) ? "border-color : red" : ''?>"/>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <div class="col-sm-12">
                                        <input type="search" name="location" class="row form-control" id="location" placeholder="Saisir ton emplacement"  value="<?= $validate->post('location')?>">
                                        <span class="text-danger error-location font-italic"><?= $validate->error("location")?></span>
                                        <small id="emailHelp" class="form-text text-muted ml-3">p. ex. cotonou, Benin</small>
                                    </div>
                                </div>



                                <div class="form-check form-check-inline mb-4 mr-5">
                                    <input class="form-check-input" type="radio" name="sexy" id="inlineRadio1" value="male" <?=(isset($_POST['sexy']) && $_POST['sexy'] == 'male')? 'checked' : ''?>>
                                    <label class="form-check-label" for="inlineRadio1">Homme</label>
                                </div>
                                <div class="form-check form-check-inline mb-4" id="radio">
                                    <input class="form-check-input" type="radio" name="sexy" id="inlineRadio2" value="female" <?=(isset($_POST['sexy']) && $_POST['sexy'] == 'female')? 'checked' : ''?>>
                                    <label class="form-check-label" for="inlineRadio2">Femme</label>
                                </div>
                                <span class="text-danger error-sex font-italic"><?= $validate->error("sexy")?></span>

                                <div class="form-group row mb-4">
                                    <div class="col-sm-12">
                                        <input type="text" name="email_or_phone" class="row form-control" id="email" placeholder="E-mail ou numéro de téléphone" value="<?= $validate->post('email_or_phone')?>" />
                                        <span class="text-danger error-email font-italic"><?= $validate->error("email_or_phone")?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="password" name="password" class="row form-control" id="password" placeholder="Crée ton mot de passe" value="<?= $validate->post('password')?>"/>
                                        <span class="text-danger error-password font-italic"><?= $validate->error("password")?></span>
                                        <small id="emailHelp" class="form-text text-muted ml-3">Le mot de passe doit comprendre au moins 5 caractères</small>
                                    </div>
                                </div>
                                <div class="singin-btn-validate" style="margin-left: 50px;">
                                    <button type="submit" class="btn btn-primary" role="button">S'inscrire</button>
                                </div>
                                <p style="margin-left: 50px;" class="mt-2"><a href="" style="color: #b6b6b6;">Mot de passe oublié ?</a></p>
                            </form>
                        </div>
                        <small class="row text-center" style="font-size: 10px; text-align: center;">En continuant, tu confirmes avoir lu et accepté nos Conditions Générales d'Utilisation, notre Politique de Confidentialité ainsi que notre Politique en matière de Cookies</small>

                        <div class="row">
                            <p class="mx-auto mt-2">Déjà membre ? <a href="?view=login">Connecte-toi</a></p>
                        </div>
                    </div>

                </div>
            </div>




                <div class="col-lg-9" style="" id="parent">

                        <div class="row">
                                <header class="col-12">
                                    <div class="row d-none d-sm-block d-lg-none">
                                        <nav class="col-12 navbar navbar-expand-sm navbar-light">
                                            <a href="index.php"><img src="images/Logo45.png" style="width: 150px; height: 30px;"></a>

                                            <div class="collapse navbar-collapse">
                                                <div class="nav-item">
                                                    <p class="text-navbar d-none d-md-inline-block">Inscris-toi pour voir qui est autour de toi en ce moment !</p>
                                                </div>

                                                <ul class="navbar-nav ml-auto">
                                                    <li class="nav-item">
                                                        <a class="btn mb-3 bg-dark font-weight-bold text-white" href="singup.php" role="button"><i class="fa fa-envelope-square" aria-hidden="true"></i> Creer un profil</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <div class="">
                                                            <a class="btn bg-dark mx-2" href="#" role="button"><i style="margin-right: 8px;" class="fa fa-facebook-official" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </li>

                                                    <li class="nav-item">
                                                        <div class="">
                                                            <a class="btn bg-warning" href="#" role="button"><i style="margin-left: 10px; margin-right: 10px;" class="fa fa-google" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>

                                    <div class="row">
                                        <nav class=" col-12 navbar navbar-expand-sm navbar-light bg-white encounter">

                                            <div class="collapse navbar-collapse">
                                                <ul class="navbar-nav">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#"><i class="fa fa-heart fa-2x" aria-hidden="true"></i></a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
                                                    </li>
                                                </ul>
                                                <sup class="nav-item">
                                                    <div style="background-color: red; border-radius: 100px; padding: 5px;"></div>
                                                </sup>
                                                <div class="nav-item">
                                                    <h4>
                                                        <a href="" class="nav-link">
                                                            <span><?=$first->name?></span>,
                                                            <span><?=$age?></span></a>
                                                    </h4>
                                                    <span><a href="" class="nav-link">
                                            <span>O</span>
                                            <span><small>Ses centre d'interets</small></span></a>
                                        </span>
                                                </div>

                                                <ul class="navbar-nav ml-auto">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#" title="Voir le profil"><i class="fa fa-user-o fa-x" aria-hidden="true"></i></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#" title="Ajouter aux favoris"><i class="fa fa-star-o fa-x" aria-hidden="true"></i></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#"><i class="fa fa-sliders fa-x" aria-hidden="true"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </header>


                            <div class="col-12">
                                <div class="row">
                                    <div class="mb-5" style=" background-color: #333;">
                                        <img src="images/imag.jpg" class=" mx-auto b-block" style="">
                                    </div>
                                </div>

                                <hr class="row">
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
                </div>

            <?php foreach ($users as $user)
            {
            ?>

            <div class="col-lg-9 d-none" style="">

                <div class="row">
                    <header class="col-12">
                        <div class="row d-none d-sm-block d-lg-none">
                            <nav class="col-12 navbar navbar-expand-sm navbar-light">
                                <a href="index.php"><img src="images/Logo45.png" style="width: 150px; height: 30px;"></a>

                                <div class="collapse navbar-collapse">
                                    <div class="nav-item">
                                        <p class="text-navbar d-none d-md-inline-block">Inscris-toi pour voir qui est autour de toi en ce moment !</p>
                                    </div>

                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="btn mb-3 bg-dark font-weight-bold text-white" href="singup.php" role="button"><i class="fa fa-envelope-square" aria-hidden="true"></i> Creer un profil</a>
                                        </li>
                                        <li class="nav-item">
                                            <div class="">
                                                <a class="btn bg-dark mx-2" href="#" role="button"><i style="margin-right: 8px;" class="fa fa-facebook-official" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </li>

                                        <li class="nav-item">
                                            <div class="">
                                                <a class="btn bg-warning" href="#" role="button"><i style="margin-left: 10px; margin-right: 10px;" class="fa fa-google" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <div class="row">
                            <nav class=" col-12 navbar navbar-expand-sm navbar-light bg-white encounter">

                                <div class="collapse navbar-collapse">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fa fa-heart fa-2x" aria-hidden="true"></i></a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                    <sup class="nav-item">
                                        <div style="background-color: red; border-radius: 100px; padding: 5px;"></div>
                                    </sup>
                                    <div class="nav-item">
                                        <h4>
                                            <a href="" class="nav-link">
                                                <span><?=$user->name?></span>,
                                                <span><?=$all->getAge(format_date($user))?></span></a>
                                        </h4>
                                        <span><a href="" class="nav-link">
                                            <span>O</span>
                                            <span><small>Ses centre d'interets</small></span></a>
                                        </span>
                                    </div>

                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" title="Voir le profil"><i class="fa fa-user-o fa-x" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" title="Ajouter aux favoris"><i class="fa fa-star-o fa-x" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fa fa-sliders fa-x" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </header>


                    <div class="col-12">
                        <div class="row">
                            <div class="mb-5" style=" background-color: #333;">
                                <img src="images/imag.jpg" class=" mx-auto b-block" style="">
                            </div>
                        </div>

                        <hr class="row">
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
            </div>

            <?php
            }
            ?>


        </div>

    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/encounter.js"></script>
<script src="js/register.js"></script>
