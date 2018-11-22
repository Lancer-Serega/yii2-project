<?php
namespace frontend\controllers;

use \Yii;
use frontend\models\Form\ContactForm;
use yii\web\ErrorAction;
use yii\captcha\CaptchaAction;

/**
 * Index controller.
 *
 * Class IndexController
 * @package frontend\controllers
 */
class IndexController extends BaseController
{
    /**
     * @inheritdoc
     * @param $action
     * @return bool
     * @throws \Throwable
     */
    public function beforeAction($action): bool
    {
        if (\Yii::$app->user->getIdentity()) {
            $this->redirect('cabinet/account');
        }

        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * @return array
     */
    public function actions(): array
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
            'captcha' => [
                'class' => CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        return $this->render('index');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionFeedback(): string
    {
        return $this->render('feedback');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionFaq(): string
    {
        return $this->render('faq');
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', \Yii::t('form', 'Thank you for contacting us. We will respond to you as soon as possible.'));
            } else {
                Yii::$app->session->setFlash('error', Yii::t('form', 'There was an error sending your message.'));
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout(): string
    {
        return $this->render('about');
    }
}
