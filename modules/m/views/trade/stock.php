<?php
/*
 * @var $this yii\web\View
 * @param $model
 * */

$this->registerJsFile('/js/bootstrap3-typeahead.min.js', ['position' => \yii\web\View::POS_BEGIN]);
$this->registerJsFile('/plugin/layer/layer.js', ['position' => \yii\web\View::POS_BEGIN]);

$this->title = '股票操盘';
$nav_sub_index = 1;
?>

<?= $this->render('/trade/_stock_nav', ['nav_sub_index' => $nav_sub_index]) ?>

<div class="input-group search-row">
    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
    <input type="text" class="form-control" data-role="search" data-provide="typeahead" placeholder="请输入股票代码"/>
    <span class="input-group-addon"><i data-role="search-clear" class="glyphicon glyphicon-remove-circle"></i></span>
</div>

<div class="stock-panel">
    <div class="stock-name"><span data-role="name"><?= $model->name ?></span>（<span data-role="sn"><?= $model->code ?></span>）</div>

    <div class="stock-price text-red">
        <div class="price">
            <span class="mk_price" data-role="price">12.93</span>
            <i data-role="direction" class="glyphicon glyphicon-arrow-up"></i>
            <!--            <i class="glyphicon glyphicon-arrow-down"></i>-->
            <small class="text-muted glyphicon glyphicon-refresh" data-role="refresh"></small>
        </div>

        <div class="change">
            <span class="zhangdie" data-role="change">+1.18</span>
            <span class="zhangfu" data-role="ratio">+10.04%</span>
        </div>
    </div>

    <div class="stock-data">
        <div class="row data-row">
            <div class="col-sm-3 col-xs-3">今开</div>
            <div data-role="price_start" class="col-sm-3 col-xs-3">11.75</div>
            <div class="col-sm-3 col-xs-3">振幅</div>
            <div data-role="ratio_start" class="col-sm-3 col-xs-3">+10.30%</div>
        </div>
        <div class="row data-row">
            <div class="col-sm-3 col-xs-3">最高</div>
            <div data-role="price_max" class="col-sm-3 col-xs-3">12.930</div>
            <div class="col-sm-3 col-xs-3">最低</div>
            <div data-role="price_min" class="col-sm-3 col-xs-3">11.720</div>
        </div>
        <div class="row data-row">
            <div class="col-sm-3 col-xs-3">涨停</div>
            <div data-role="price_top" class="col-sm-3 col-xs-3">12.93</div>
            <div class="col-sm-3 col-xs-3">跌停</div>
            <div data-role="price_bottom" class="col-sm-3 col-xs-3">10.58</div>
        </div>
        <div class="row data-row">
            <div class="col-sm-3 col-xs-3">总手</div>
            <div data-role="hands" class="col-sm-3 col-xs-3">0.0万手</div>
            <div class="col-sm-3 col-xs-3">金额</div>
            <div data-role="amount" class="col-sm-3 col-xs-3">0.00亿</div>
        </div>

    </div>
</div>

<div class="stock-chart">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs mb15 chart-tabs">
        <li role="presentation" class="active">
            <a href="#timeLineChart" role="tab" data-toggle="tab">分时图</a></li>
        <li role="presentation"><a href="#kLineChart" aria-controls="kLineChart" role="tab" data-toggle="tab">日K图</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="timeLineChart">
            <div id="fasdf" style="height:100%" class="line-chart">
                <span class="hidden" data-role="fullcode"></span>
                <img data-role="chart_time" width="100%" src="http://image.sinajs.cn/newchart/min/n/sh600000.gif">
            </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="kLineChart">
            <div id="kLine" class="line-chart text-center">
                <div data-role="chart_k" style="position: relative; height: 131px;"> 开发中</div>
            </div>
        </div>

    </div>
</div>

<div class="sell-buy mb15">
    <div class="col-sm-6 col-xs-6 level-sell">
        <table>
            <tbody>
            <tr>
                <td class="level-td-1">卖1</td>
                <td data-role="sell" class="level-td-2 text-success">0.00</td>
                <td data-role="sell_ratio" class="level-td-3">0</td>
            </tr>
            <tr>
                <td class="level-td-1">卖2</td>
                <td data-role="sell" class="level-td-2 text-success">0.00</td>
                <td data-role="sell_ratio" class="level-td-3">0</td>
            </tr>
            <tr>
                <td class="level-td-1">卖3</td>
                <td data-role="sell" class="level-td-2 text-success">0.00</td>
                <td data-role="sell_ratio" class="level-td-3">0</td>
            </tr>
            <tr>
                <td class="level-td-1">卖4</td>
                <td data-role="sell" class="level-td-2 text-success">0.00</td>
                <td data-role="sell_ratio" class="level-td-3">0</td>
            </tr>
            <tr>
                <td class="level-td-1">卖5</td>
                <td data-role="sell" class="level-td-2 text-success">0.00</td>
                <td data-role="sell_ratio" class="level-td-3">0</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="col-sm-6 col-xs-6 level-buy">
        <table>
            <tbody>
            <tr>
                <td class="level-td-1">买1</td>
                <td data-role="buy" class="level-td-2 text-danger">12.93</td>
                <td data-role="buy_ratio" class="level-td-3">8199861</td>
            </tr>
            <tr>
                <td class="level-td-1">买2</td>
                <td data-role="buy" class="level-td-2 text-danger">12.92</td>
                <td data-role="buy_ratio" class="level-td-3">212519</td>
            </tr>
            <tr>
                <td class="level-td-1">买3</td>
                <td data-role="buy" class="level-td-2 text-danger">12.91</td>
                <td data-role="buy_ratio" class="level-td-3">12800</td>
            </tr>
            <tr>
                <td class="level-td-1">买4</td>
                <td data-role="buy" class="level-td-2 text-danger">12.90</td>
                <td data-role="buy_ratio" class="level-td-3">127100</td>
            </tr>
            <tr>
                <td class="level-td-1">买5</td>
                <td data-role="buy" class="level-td-2 text-danger">12.89</td>
                <td data-role="buy_ratio" class="level-td-3">18390</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="clearfix"></div>
</div>

<a href="javascript:;" class="col-sm-12 col-xs-12 btn btn-danger mt20 submit" data-role="submit">非点买时间</a>
<div class="clearfix"></div>

<div class="mt20 text-center">点买时间段：交易日9:30-11:30 13:00-14:55</div>

<script type="text/javascript">
    var fail = function () {
        layer.alert('请求异常，请稍后重试！', {shadeClose: true, time: 3000});
    }

    var render = function (stock_sn) {
        $.ajax('<?= \yii\helpers\Url::to(['/m/trade/get-stock']) ?>', {
            type: 'post',
            dataType: 'json',
            data: {
                spam: Math.random(),
                _csrf: '<?=Yii::$app->request->getCsrfToken()?>',
                stock_sn: stock_sn
            },
            success: function (respose) {
                for (i in respose) {
                    var obj = $('[data-role="+i+"]');
                    if (obj.size()) {
                        obj.text(respose[i]);
                    }

                }
            },
            error: fail,
            complete: null
        });
    }

    render('');

    var search = function (query, callback) {
        var self = $('[data-role="search"]');
        var val = $.trim(query).replace(/[^\d]/ig, '');
        if (!val) {
            return;
        }

        self.val(val);
        $.ajax('<?= \yii\helpers\Url::to(['/m/trade/search-stock']) ?>', {
            type: 'post',
            dataType: 'json',
            data: {
                spam: Math.random(),
                _csrf: '<?=Yii::$app->request->getCsrfToken()?>',
                stock_sn: val
            },
            success: function (response) {
                //source = response;
                callback(response);
            },
            error: fail
        });
    }

    var searchInput = $('[data-role="search"]');
    searchInput.typeahead({
        source: search,
        autoSelect: true
    });

    searchInput.change(function () {
        var current = searchInput.typeahead("getActive");
        if (current) {
            // Some item from your model is active!
            if (current.name == searchInput.val()) {
                // This means the exact match is found. Use toLowerCase() if you want case insensitive match.
                location.href = '<?= \yii\helpers\Url::to(['/m/trade/stock'])?>?code=' + current.code;
            } else {
                // partial match, not jump
            }
        } else { /* Nothing is active so it is a new value (or maybe empty value)*/
        }
    });

    $('[data-role="search-clear"]').click(function () {
        $('[data-role="search"]').val('');
    });


</script>

