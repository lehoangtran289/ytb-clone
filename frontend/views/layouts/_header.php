<header>
    <?php
    // NavBar widget
    use yii\bootstrap4\Nav;
    use yii\bootstrap4\NavBar;

    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
                'class' => 'navbar navbar-expand-md navbar-light bg-light shadow-sm',
        ],
        'innerContainerOptions' => ['class' => 'container-fluid']
    ]);
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Sign up', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        /*$menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';*/
        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            // site : controller id, logout : action id, should be used with array notation - URL manager
            'linkOptions' => [
                'data-method' => 'post'
            ]
        ];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
</header>

