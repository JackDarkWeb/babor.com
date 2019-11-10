
<?=ExtendsView::extend('nav')?>



<!--content body on desktop-->
<div class="mt-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 homepage">
                <div class="row">
                    <div class="col-12 col-lg-6 firtFace order-last order-lg-first">
                        <div class="row">
                            <div class="col-11" >
                                <div class="row text-center">
                                    <h3 class="mb-5 col-12">Déjà avec nous! Inscris-toi maintenant, lance-toi !</h3>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="row firtFace-btn1">
                                            <a class="btn mb-3 mx-auto" href="#" role="button"><i style="margin-right: 8px;" class="fa fa-facebook-official" aria-hidden="true"></i> <small class="font-weight-bold">Connexion par Facebook</small></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="row firtFace-btn2">
                                            <a class="btn mx-auto" href="#" role="button"><i style="margin-left: -10px; margin-right: 10px; color: #d34836;" class="fa fa-google" aria-hidden="true"></i> <small class="font-weight-bold">Connexion par google</small></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <small class="text-muted mx-auto mt-4">Nous ne publions rien sans ton consentement.</small>
                                </div>
                            </div>

                            <div class="col-1 midleFace d-none d-lg-block">
                                ou
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 secondFace order-first order-lg-last">
                        <div class="row secondFace-home" style="padding-top: 120px; padding-bottom: 100px;">
                            <div class="col-12">
                                <div class="row text-center">
                                    <h3 class="mb-4 col-12">Connecte-toi en répondant à quelques questions :</h3>
                                </div>
                                <div class="row">
                                    <p class="mb-3 mx-auto">Tu es...</p>
                                    <div class="col-12">
                                        <div class="row secondFace-btn1">
                                            <a class="btn mb-3 mx-auto singupPage-call" id="male" value="male" role="button">Homme</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row secondFace-btn2">
                                            <a class="btn mx-auto singupPage-call" id="female" value="female"  role="button">Femme</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-block d-lg-none">
                                    <div class="col-12">
                                        <div class="row">
                                            <p class="my-4 mx-auto d-none d-lg-block font-weight-bold">ou</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="result"></div>
                        <?= ($this->message_flash('message')) ? $this->message_flash('message') : ''?>

                        <div class="row singupPage-home py-5 pl-sm-5">
                            <div class="col-12">
                                <div class="row mb-4">
                                    <span style="cursor: pointer;" class="bg-light px-3 py-1 rounded-circle mr-5 go-backHome"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></span>
                                    <h3 class='h3'>Bientôt fini...</h3>
                                </div>
                                <div class="row mb-3">
                                    <form class="col-12" method="post" action="" id="form-register">
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12">
                                                <input type="text" class="row form-control" id="name" name="name" value="<?= $this->post('name')?>" placeholder="Prénom" pattern="^-?[a-zA-Z\ ]+$"/>
                                                <span class="text-danger error-name font-italic"><?= $this->error("name")?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-4">
                                                <select class="row form-control" name="day" id="day" style="<?= ($this->error('day')) ? "border-color : red" : ''?>">
                                                    <option>Jour...</option>

                                                    <? for($i = 1; $i <= 31; $i++):?>
                                                        <option value="<?=$i?>" <?=($this->post('day') == $i)? 'selected = selected' : ''?>><?=$i?></option>
                                                    <?endfor;?>

                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="row form-control" name="month" id="month" style="<?= ($this->error('month')) ? "border-color : red" : ''?>">
                                                    <option>Mois...</option>

                                                    <? foreach ($this->months as $key => $month):?>

                                                        <option value="<?=$key?>" <?=($this->post('month') == $key)? 'selected = selected' : ''?>><?=$month?></option>

                                                    <?endforeach;?>

                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="year" id="year" class="row form-control"  placeholder="Année..." value="<?= $this->post('year')?>" pattern="^(19|20)[0-9]{2}" style="<?= ($this->error('year')) ? "border-color : red" : ''?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12">
                                                <input type="search" name="location" class="row form-control" id="location" placeholder="Saisir ton emplacement"  value="<?= $this->post('location')?>">
                                                <span class="text-danger error-location font-italic"><?= $this->error("location")?></span>
                                                <small id="emailHelp" class="form-text text-muted ml-3">p. ex. cotonou, Benin</small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12">
                                                <input type="text" name="email_or_phone" class="row form-control" id="email" placeholder="E-mail ou numéro de téléphone" value="<?= $this->post('email_or_phone')?>" />
                                                <span class="text-danger error-email font-italic"><?= $this->error("email_or_phone")?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="password" name="password" class="row form-control" id="password" placeholder="Crée ton mot de passe" value="<?= $this->post('password')?>"/>
                                                <span class="text-danger error-password font-italic"><?= $this->error("password")?></span>
                                                <small id="emailHelp" class="form-text text-muted ml-3">Le mot de passe doit comprendre au moins 5 caractères</small>
                                            </div>
                                        </div>

                                        <div class="singin-btn-validate">
                                            <button type="submit" class="btn col-12 row text-white font-weight-bold" role="button">Créer un profil</button>
                                        </div>
                                    </form>
                                </div>
                                <div class='row'>
                                    <small class="text-center" style="font-size: 11px;">En continuant, tu confirmes avoir lu et accepté nos <a href="">Conditions Générales d'Utilisation</a>, notre <a href=""> Politique de Confidentialité</a> ainsi que notre <a href=""> Politique en matière de Cookies</a></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <footer class="row">
                    <div class="col-12">
                        <div class="row">
                            <a class="mx-auto" href="" title="Télécharger babor sur google play"><img src="<?=assets('images.googleplaylogo')?>" style="width: 200px; height: 120px;"></a>
                        </div>
                        <hr class="row bg-dark">
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="footerContent text-center">
                                <a href="">A propos</a>
                                <a href="">CGU</a>
                                <a href="">Confidentialité</a>
                                <a href="">Liens rapides</a>
                                <a href="">Aide</a>
                            </div>
                        </div>

                        <div class="row">
                            <small class="mx-auto ml-md-auto pr-4 pb-4 font-weight-bold">2018 - <?=date('Y')?> © Babor</small>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>


<script src="<?=assets('js.main')?>"></script>

