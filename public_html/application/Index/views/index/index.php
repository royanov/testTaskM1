<!-- Blog Entries Column -->
<div class="col-md-8">
    <?php foreach ($items as $Item): ?> 
        <!-- First Blog Post -->
        <h2>
            <a href="/index/index/view/<?= $Item->id ?>"><?= $Item->name ?></a>
        </h2>
        <p>
            <span class="glyphicon glyphicon-time"></span> <?= $Item->date ?>
        </p>
        <hr>
        <?php if (!empty($Item->image)): ?>
            <img class="img-responsive" src="/upload/<?= $Item->image ?>" alt="">
            <hr>
        <?php endif; ?>
        <p><?= nl2br(mbCutString($Item->text, 200)) ?></p>
        <a class="btn btn-primary" href="/index/index/view/<?= $Item->id ?>">Подробнее <span class="glyphicon glyphicon-chevron-right"></span></a>
        <div style="float:right">
            <a class="btn btn-danger" onclick="return confirm('Вы действитель хотите удалить пост?');" href="/index/manage/delete/<?= $Item->id ?>">
                <span class="glyphicon glyphicon-trash"></span> Удалить
            </a>
            <a class="btn btn-info" href="/index/manage/edit/<?= $Item->id ?>">
                <span class="glyphicon glyphicon-pencil"></span> Изменить
            </a>
        </div>
        <hr>
    <?php endforeach; ?>
</div>

