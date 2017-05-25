<div class="m-default-index">
    <div class="row top-icon">
        <div class="col-sm-3 col-xs-3 top-icon-item"><a href="<?= \yii\helpers\Url::to(['/m/trade'])?>">
            <div class="bg-danger icon-wrap"><i class="glyphicon glyphicon-stats icon"></i></div>
            <p class="text">股票操盘</p>
            </a></div>
        <div class="col-sm-3 col-xs-3 top-icon-item">
            <div class="bg-success icon-wrap"><i class="glyphicon glyphicon-stats icon"></i></div>
            <p class="text">期货操盘</p>
        </div>
        <div class="col-sm-3 col-xs-3 top-icon-item">
            <div class="bg-info icon-wrap"><i class="glyphicon glyphicon-stats icon"></i></div>
            <p class="text">股票模拟</p>
        </div>
        <div class="col-sm-3 col-xs-3 top-icon-item">
            <div class="bg-warning icon-wrap"><i class="glyphicon glyphicon-stats icon"></i></div>
            <p class="text">期货模拟</p>
        </div>
    </div>

    <script>
        function topIconHeightFix(){
            $('.top-icon-item .icon-wrap').each(function () {
                $(this).height($(this).width());
                var icon = $(this).find('.icon')
                icon.css('margin-top', ($(this).height() - icon.height()) / 2);
            });
        }

        topIconHeightFix();
        $(window).resize(topIconHeightFix);
        </script>
</div>
