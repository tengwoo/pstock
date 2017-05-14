<?php

namespace app\modules\m\controllers\user;


class ProfileController extends \dektrium\user\controllers\ProfileController
{
    /**
     * Redirects to current user's profile.
     *
     * @return \yii\web\Response
     */
    public function actionIndex()
    {
        $user_id = \Yii::$app->user->getId();
        $profile = $this->finder->findProfileById($user_id);

        if ($profile === null) {
            throw new NotFoundHttpException();
        }

        return $this->render('show', [
            'profile' => $profile,
        ]);
    }
}
