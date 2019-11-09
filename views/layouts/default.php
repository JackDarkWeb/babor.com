<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= isset($title_for_site)? $title_for_site : 'Babor Meeting'?></title>

    <!-- STYLES CSS -->
    <link rel="stylesheet" href="<?=assets('css.styles')?>"/>


    <!-- Bootstrap CSS -->
    <?include ROOT.DS.'views'.DS.'piles'.DS.'style.php'?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?include ROOT.DS.'views'.DS.'piles'.DS.'script.php'?>


    <!-- SCRIPTS JS -->

    <script src="<?=assets('js.mobile')?>"></script>
    <script src="<?=assets('js.wo')?>"></script>


</head>
<body>



<?= isset($yield) ? $yield : ''; ?>



</body>
</html>