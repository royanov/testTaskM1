<div class="col-lg-8">
    <h1><?= $Article->name ?></h1>
    <hr>
    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> <?= $Article->date ?></p>
    <hr>
    <?php if (!empty($Article->image)): ?>
        <img class="img-responsive" src="/upload/<?= $Article->image ?>" alt="">
        <hr>
    <?php endif; ?>
    <!-- Post Content -->
    <p><?= nl2br($Article->text) ?></p>
</div>