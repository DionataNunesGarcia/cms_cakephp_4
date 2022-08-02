<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Usuários</span>
                <span class="info-box-number"><?= $counts['users'] ?></span>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-file-text-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Blogs</span>
                <span class="info-box-number"><?= $counts['blogs'] ?></span>
            </div>
        </div>
    </div>
    <div class="clearfix visible-sm-block"></div>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Últimos Blogs</h3>
            </div>

            <div class="box-body">
                <ul class="products-list product-list-in-box">
                    <?php foreach ($latestBlogs as $blog) { ?>
                        <li class="item">
                            <span class="label label-success pull-right">
                                <?= $blog->blogs_category->name ?>
                            </span>
                            <div class="title">
                                <strong>
                                    <?= $blog->title ?>
                                </strong>
                            </div>
                            <div class="subtitle">
                                <span class="product-description">
                                    <?= $blog->subtitle ?>
                                </span>
                            </div>
                            <div class="created pull-right">
                                <small class="product-description">
                                    <?= $blog->created->i18nFormat('dd/MM/yyyy HH:mm:ss') ?>
                                </small>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="box-footer text-center">
                <a href="<?= $this->Url->build(['controller' => 'Blogs', 'action' => 'index'], ['fullBase' => true]); ?>" title="" data-placement="right">
                    <?= __('Ver todos os Posts') ?>
                </a>
            </div>

        </div>
    </div>
</div>
