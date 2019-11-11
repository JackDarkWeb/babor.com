
<?if (isset($user)):?>

<?$title_for_site = $user->name?>

<div class="d-none d-sm-block singin-nav" style="background: #9d1e65;">
    <div class="px-5">
        <nav class="row navbar navbar-expand-sm font-weight-bold">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav col">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#" style="color: #111; background: #eee; padding: 5px 20px 5px 20px; border-radius: 10px;">Fr</a>
                    </li>
                    <li class="nav-item d-block d-lg-none">
                        <a class="navbar-brand" href="/" style="color: #fff;"><img src="<?=assets('images.Logo45')?>"></a>
                    </li>
                </ul>

                <ul class="navbar-nav col">
                    <li class="nav-item d-none d-lg-block">
                        <a class="navbar-brand" href="/" style="color: #fff;"><img src="<?=assets('images.Logo45')?>"></a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/profile/logout" style="color: #111; background: #eee; padding: 5px 20px 5px 20px; border-radius: 10px;">Log out</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<div class="bg-light">
    <div class="d-none d-md-block" style="position: fixed; right: 10px; top: 300px; z-index: 10;">
        <div class="ml-2 mb-2"><a href=""><i class="fa fa-angle-up fa-2x" aria-hidden="true"></i></a></div>
        <div class="mb-3">
            <a href=""><img src="<?=assets('images.images2')?>" class="rounded-circle" style="height: 40px; width: 40px;"></a>
        </div>
        <div class="mb-3">
            <img src="<?=assets('images.images1')?>" class="rounded-circle" style="height: 40px; width: 40px;">
        </div>
        <div class="mb-3">
            <img src="<?=assets('images.images')?>" class="rounded-circle" style="height: 40px; width: 40px;">
        </div>
        <div class="ml-2 mb-2"><a href=""><i class="fa fa-angle-down fa-2x" aria-hidden="true"></i></a></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-3">
                <div class="row">

                    <div class="col-12 bg-light">
                        <form method="post" action="/profile/upload" enctype="multipart/form-data">
                            <div class="row mt-3">

                                <a href="#" class='col-3'><img src="<?= ($profile->name)?  assets("storage.{$profile->name}") : assets("storage.avatar")?>" class='img-fluid'></a>

                                <a href="" class="nav-link text-dark col-9">
                                    <span class='font-weight-bold'><?=$user->name?></span>
                                </a>
                                <input type="file" name="file" id="imgInp"/>
                                <label for="imgInp" class="label-file" title="Choisir un fichier">Changer photo</label>
                                <button type="submit" class="btn btn-mob1 text-info d-none">Telecharger</button>
                            </div>
                        </form>

                        <hr class='row bg-secondary my-5'>

                        <div class='row'>
                            <a href="" class='nav-link active text-dark'>Rencontre</a>

                            <button type="button" class="btn btn-light ml-auto border" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Forms pour filtrer une recherche">
                                <i class="fa fa-sliders" aria-hidden="true"></i>
                            </button>
                        </div>

                        <script>
                            $(function () {
                                $('[data-toggle="popover"]').popover()
                            })
                        </script>

                        <div class='row my-2'>
                            <a href="" class='nav-link text-dark'>Trouver à coté</a>

                            <button type="button" class="btn btn-light ml-auto border d-none" data-container="body"               data-toggle="popover" data-placement="bottom" data-content="Vivamus
                                    sagittis lacus vel augue laoreet rutrum faucibus.">
                                <i class="fa fa-sliders" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div class='row'>
                            <a href="" class='nav-link text-dark'>En ligne</a>
                        </div>
                        <div class='row my-2'>
                            <a href="" class='nav-link text-dark'>Messages</a>
                        </div>
                        <div class='row'>
                            <a href="" class='nav-link text-dark'>Réciproque</a>
                        </div>
                        <div class='row my-2'>
                            <a href="" class='nav-link text-dark'>Elle vous like</a>
                        </div>
                        <div class='row'>
                            <a href="/user/logout" class='nav-link text-dark d-sm-none'>Deconexion</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-8 col-lg-9 bg-white">
                <div class='row' style=''>
                    <div class='col-12 col-lg-7'>
                        <div class="row" id='bg-profil'>
                            <div class='bg-profil-imgs'>
                                <img src="<?=assets('images.drtt')?>" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <div class='col-12 col-lg-5'>

                        <h4 class='row'>
                            <a href="" class="nav-link text-dark">
                                <span><?=$user->name?></span>,
                                <span><?=$user->age?></span>
                                <span class="text-info">  <?=($user->birthDay)?>  </span>
                            </a>
                        </h4>


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
                            <small class="ml-auto pr-4 pb-4 font-weight-bold">2018 - <?=date('Y')?> © Babor</small>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</div>


<script src="<?=assets('js.profile')?>"></script>
<?endif;?>