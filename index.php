<?php $page_id = 1; require "@tyrositeframework/start.php"; ?>




<header> <?php $cp_navbar(); ?> </header>

<main>

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
        background-color: rgba(255, 255, 255)  ;
    }
</style>





<?php require "@tyrositeframework/end.php"; ?>