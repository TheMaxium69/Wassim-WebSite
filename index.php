<?php $page_id = 1; require "@tyrositeframework/start.php"; ?>




<header> <?php $cp_navbar(); ?> </header>

<main>

    <p><?= $env_titre ?></p>

    <?= $cp_bio(); ?>

    <?= $cp_cardstat(); ?>

    <?= $cp_videocards(); ?>

    <?= $cp_feedback(); ?>

    <?= $cp_formContact(); ?>

</main>

<?php $cp_footer() ?>

<?php $js_exemple(); ?>


<style>
    body {
        background-color: #FAFAFA  ;
    }
</style>





<?php require "@tyrositeframework/end.php"; ?>