<!-- Blog Entries Column -->
<div class="col-md-8">
    <h2>Добавить статью</h2>
    <br/>
    <?php if (!empty($errors)): ?> 
        <span style="color:red; font-weight: 120%;">
            <?= implode("<br/>", $errors) ?>
        </span>
        <br/>  <br/>
    <?php endif; ?>
    <form class="form-horizontal" role="form" action="" method="post"  enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Название:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Cтатья:</label>
            <div class="col-sm-10"> 
                <textarea class="form-control" id="text" name="text" rows="10"></textarea>
            </div>
        </div>
        <div class="form-group"> 
            <label class="control-label col-sm-2" for="text">Изображение:</label>
            <div class="col-sm-10"> 
                <input type="file" name="image"/>
            </div>
        </div>
        <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Добавить</button>
            </div>
        </div>
    </form>
</div>

