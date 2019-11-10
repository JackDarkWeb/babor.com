<?$title_for_site = 'Dating'?>

<div class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 d-none d-lg-block" style="">
                <div class="row pb-5">
                    <div class="singupBox_encounters bg-light">
                        <div class="col-12" >
                            <div class="row position-fixed" style="z-index: 10; width: 280px; height: 80px;">
                                <div class="col-12 bg-light">
                                    <div class="row">
                                        <div class="mx-auto mt-4">
                                            <a href="/"><img src="<?=assets('images.Logo45')?>" style="width: 150px; height: 30px; margin-bottom: 50px;"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="padding-top: 85px;">
                                <div class="col">
                                    <div class="row singin-btn1">
                                        <a class="btn mb-3 mx-auto bg-dark" href="#" role="button"><i style="margin-right: 8px;" class="fa fa-facebook-official" aria-hidden="true"></i> <small class="font-weight-bold">Facebook</small></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row singin-btn2">
                                        <a class="btn mx-auto bg-warning" href="#" role="button"><i class="fa fa-google" aria-hidden="true"></i> <small class="font-weight-bold"></small></a>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <h4 class="mx-auto">Crée un profil</h4>
                            </div>
                            <div class="row mb-3">

                                <div class="result"></div>
                                <?= ($this->message_flash('message')) ? $this->message_flash('message') : ''?>

                                <form class="col-sm-12" method="post" action="" id="form-register">
                                    <div class="form-group row mb-4">
                                        <div class="col-sm-12">
                                            <input type="text" name="name" class="row form-control" id="name" value="<?= $this->post('name')?>" placeholder="Prénom" pattern="^-?[a-zA-Z\ ]+$"/>
                                            <span class="text-danger error-name font-italic"><?= $this->error("name")?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <div class="col-sm-4">
                                            <select name="day" id="day" class="row form-control" style="<?= ($this->error('day') || $this->error('date')) ? "border-color : red" : ''?>">
                                                <option>Jour...</option>

                                                <?php for($i = 1; $i <= 31; $i++):?>

                                                    <option value="<?=$i?>" <?=($this->post('day') === $i)? 'selected' : ''?>><?=$i?></option>

                                                <?php endfor;?>

                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="row form-control" id="month" name="month" style="<?= ($this->error('month') || $this->error('date')) ? "border-color : red" : ''?>">
                                                <option>Mois...</option>

                                                <?php foreach ($this->months as $key => $month):?>

                                                    <option value="<?=$key?>" <?=($this->post('month') === $key)? 'selected' : ''?>><?=$month?></option>

                                                <?php endforeach;?>

                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" name="year" id="year" class="row form-control"  placeholder="Année..." value="<?= $this->post('year')?>" pattern="^(19|20)[0-9]{2}" style="<?= ($this->error('year') || $this->error('date')) ? "border-color : red" : ''?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <div class="col-sm-12">
                                            <input type="search" name="location" class="row form-control" id="location" placeholder="Saisir ton emplacement"  value="<?= $this->post('location')?>">
                                            <span class="text-danger error-location font-italic"><?= $this->error("location")?></span>
                                            <small id="emailHelp" class="form-text text-muted ml-3">p. ex. cotonou, Benin</small>
                                        </div>
                                    </div>


                                    <div class="form-check form-check-inline mb-4 mr-5">
                                        <input class="form-check-input" type="radio" name="sexy" id="inlineRadio1" value="male" <?=($this->post('sexy') === 'male')? 'checked' : ''?>/>
                                        <label class="form-check-label" for="inlineRadio1">Homme</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-4" id="radio">
                                        <input class="form-check-input" type="radio" name="sexy" id="inlineRadio2" value="female" <?=($this->post('sexy') === 'female')? 'checked' : ''?>/>
                                        <label class="form-check-label" for="inlineRadio2">Femme</label>
                                    </div>
                                    <span class="text-danger error-sex font-italic"><?= $this->error("sexy")?></span>


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

                                    <div class="singin-btn-validate" style="margin-left: 50px;">
                                        <button type="submit"  name="register" class="btn px-4" role="button">S'inscrire</button>
                                    </div>
                                    <p style="margin-left: 50px;" class="mt-2"><a href="" style="color: #b6b6b6;">Mot de passe oublié ?</a></p>
                                </form>
                            </div>
                            <small class="row text-center" style="font-size: 10px; text-align: center;">En continuant, tu confirmes avoir lu et accepté nos Conditions Générales d'Utilisation, notre Politique de Confidentialité ainsi que notre Politique en matière de Cookies</small>

                            <div class="row">
                                <p class="mx-auto mt-2">Déjà membre ? <a href="/user/login">Connecte-toi</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 d-none d-sm-block datingContent bg-white" style="">
                <div class="row">
                    <header class="col-12">
                        <div class="row d-none d-sm-block d-lg-none">
                            <nav class="col-12 navbar navbar-expand-sm navbar-light">
                                <a href="/"><img src="<?=assets('images.Logo45')?>" style="width: 150px; height: 30px;"></a>

                                <div class="collapse navbar-collapse">
                                    <div class="nav-item">
                                        <p class="text-navbar d-none d-md-inline-block">Inscris-toi pour voir qui est autour de toi en ce moment !</p>
                                    </div>

                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="btn mb-3 bg-dark font-weight-bold text-white" href="/user/register" role="button"><i class="fa fa-envelope-square" aria-hidden="true"></i> Creer un profil</a>
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
                            <nav class="col-12 navbar navbar-expand-sm navbar-light bg-white encounter py-3 border-bottom">

                                <div class="collapse navbar-collapse">
                                    <ul class="navbar-nav col-10">
                                        <li class="nav-item">
                                            <h5 style="color: #737373;" class="ml-4">Je suis ici pour sortir avec quelqu'un dans le monde entier</h5>
                                        </li>
                                    </ul>


                                    <div class="col-2">
                                        <ul class="navbar-nav ml-auto scdNav">
                                            <li class="nav-item">
                                                <a class="nav-link" id="fa-sliders" style="cursor: pointer;"><i class="fa fa-sliders fa-x" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </header>
                </div>

                <form class="row bg-light" id="searchBox">
                    <div class="col-12">
                        <div class="row px-4 py-3">
                            <div class="col-4 border-right">
                                <div class="">
                                    <p class="font-weight-bold">Je suis ici pour</p>
                                    <div class="custom-control custom-radio mb-2">
                                        <input type="radio" id="getFriends" name="customRadio1" class="custom-control-input">
                                        <label class="custom-control-label" for="getFriends" style="color: #8c8c8c;">Me faire des amis</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-2">
                                        <input type="radio" id="getChat" name="customRadio1" class="custom-control-input">
                                        <label class="custom-control-label" for="getChat" style="color: #8c8c8c;">Chatter</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" checked id="getMeet" name="customRadio1" class="custom-control-input">
                                        <label class="custom-control-label" for="getMeet" style="color: #8c8c8c;">Renconter quelqu'un</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 border-right px-5">
                                <div class="row">
                                    <p class=" font-weight-bold">Voir</p>
                                </div>
                                <div class="row">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioMen" name="customRadio2" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioMen" style="color: #8c8c8c;">Hommes</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" checked id="customRadioWomen" name="customRadio2" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioWomen" style="color: #8c8c8c;">Filles</label>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-6">
                                        <div class="row">
                                            <label for="customRangeAge" class="font-weight-bold" style="color: #737373;">Âge</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div></div><div class="ml-auto" id="interval">18</div>
                                        </div>
                                    </div>
                                    <input type="range" class="custom-range slider" min="18" max="50" value="18" id="customRangeAge" id="myRange">
                                </div>
                            </div>
                            <div class="col-4 pl-5">
                                <div class="row">
                                    <p class="font-weight-bold mb-2">Où</p>
                                </div>
                                <div class="row mt-0">
                                    <div class="form-group col-12">
                                        <div class="row">
                                            <input type="search" name="" class="form-control" id="where" placeholder="Saisis ton emplacement">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-0">
                                    <label for="customRangeWhrere" class="font-weight-bold" style="color: #737373;">Dans toute la ville</label>
                                    <input type="range" class="custom-range" min="1" max="100" value="50" id="customRangeWhrere">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 offset-md-4 col-6 offset-3">
                            <div class="row px-2 my-3">
                                <div class="col-6">
                                    <div class="row">
                                        <input type="submit" name="" value="Chercher" class="btn bg-primary text-light px-4 py-1 font-weight-bold" id="search">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="row">
                                        <input type="reset" name="" value="Annuler" class="btn text-dark bg-white border py-1 px-3 ml-auto" id="reset" data-toggle="dropdown">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="row py-4">
                    <div class="col-12">
                        <div class="row">

                            <? foreach ($users as $user):?>


                            <div class="col-6 col-md-4 col-xl-3">
                                <div class="card mb-4">
                                    <a href="" title="<?=$user->name?>">
                                        <img src="<?=assets('images.imfine')?>" class="card-img-top" style="height: 160px;">
                                        <div class="badge p-2 text-light" style="position: absolute; top: 125px; left: 10px;  background: rgba(0,0,0,0.6);"><i class="fa fa-camera" aria-hidden="true"></i> 1/5</div>
                                        <div class="card-body p-2 bg-white">
                                            <div class="col-12">
                                                <div class="row">
                                                    <h5 style="color: #737373;"><?=$user->name?></h5>
                                                    <div class="mt-2 ml-2">
                                                        <div style="background-color: #cccccc; border-radius: 100px; padding: 4px;">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <small style="color: #a6a6a6;" class="font-weight-bold"><?=Helper::city_country($user)->city?></small>
                                                </div>
                                            </div>
                                        </div></a>
                                </div>
                            </div>

                           <?endforeach;?>

                        </div>
                    </div>
                </div>

                <div class="">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">

                            <?= Helper::paginate(count($users));?>

                        </ul>
                    </nav>
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
                            <small class="ml-auto pr-4 pb-4 font-weight-bold">2018 - <?=date('Y')?> © Babor</small>
                        </div>
                    </div>
                </footer>

            </div>
        </div>
    </div>
</div>
<script
<script src="<?=assets('js.dating')?>"></script>