<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 * @var \dektrium\user\models\Profile $profile
 */

$this->title = '会员中心';
?>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="row">

            <div class="media">
                <div class="media-left">
                    <?= Html::img($profile->getAvatarUrl(80), [
                        'class' => 'media-object img-rounded',
                        'alt' => $profile->user->username,
                        'width' => 80,
                    ]) ?>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?= $profile->user->username ?></h4>
                    <i class="glyphicon glyphicon-time text-muted"></i> <?= Yii::t('user', 'Joined on {0, date}', $profile->user->created_at) ?>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">

            </div>
            <div class="col-sm-6 col-md-8">
                <ul style="padding: 0; list-style: none outside none;">
                    <?php if (!empty($profile->location)): ?>
                        <li>
                            <i class="glyphicon glyphicon-map-marker text-muted"></i> <?= Html::encode($profile->location) ?>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($profile->website)): ?>
                        <li>
                            <i class="glyphicon glyphicon-globe text-muted"></i> <?= Html::a(Html::encode($profile->website), Html::encode($profile->website)) ?>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($profile->public_email)): ?>
                        <li>
                            <i class="glyphicon glyphicon-envelope text-muted"></i> <?= Html::a(Html::encode($profile->public_email), 'mailto:' . Html::encode($profile->public_email)) ?>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php if (!empty($profile->bio)): ?>
                    <p><?= Html::encode($profile->bio) ?></p>
                <?php endif; ?>
            </div>

            <div class="mb15 btn-group fund-btns">
                <a href="<?= \yii\helpers\Url::to(['/m/recharge']) ?>" class="btn-success btn btn-default btn-xs fund-btn">
                    <em class="glyphicon glyphicon-log-in mr5"></em>
                    我的充值</a>
                <a href="<?= \yii\helpers\Url::to(['/m/withdraw']) ?>" class="btn-danger btn btn-default btn-xs fund-btn">
                    <em class="glyphicon glyphicon-log-out mr5"></em>
                    我的取现</a>
            </div>

            <div>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="<?= \yii\helpers\Url::to(['/m/fund']) ?>">
                        <em class="glyphicon glyphicon-yen list-icon"></em>
                        <span>资金明细</span>
                        <em class="glyphicon glyphicon-menu-right list-arrow"></em>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="<?= \yii\helpers\Url::to(['/m/message']) ?>">
                        <em class="glyphicon glyphicon-info-sign list-icon"></em>
                        <span>消息中心</span>
                        <em class="glyphicon glyphicon-menu-right list-arrow"></em>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="<?= \yii\helpers\Url::to(['/m/rebate']) ?>">
                        <em class="glyphicon glyphicon-star list-icon"></em>
                        <span>我的红包</span>
                        <em class="glyphicon glyphicon-menu-right list-arrow"></em>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="<?= \yii\helpers\Url::to(['/user/settings/account']) ?>">
                        <em class="glyphicon glyphicon-cog list-icon"></em>
                        <span>安全设置</span>
                        <em class="glyphicon glyphicon-menu-right list-arrow"></em>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="<?= \yii\helpers\Url::to(['/m/payment']) ?>">
                        <em class="glyphicon glyphicon-credit-card list-icon"></em>
                        <span>银行卡管理</span>
                        <em class="glyphicon glyphicon-menu-right list-arrow"></em>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="<?= \yii\helpers\Url::to(['/m/help']) ?>">
                        <em class="glyphicon glyphicon-question-sign list-icon"></em>
                        <span>帮助中心</span>
                        <em class="glyphicon glyphicon-menu-right list-arrow"></em>
                    </a>
                </li>
            </ul></div>

        </div>
    </div>
</div>
