<?php

namespace app\modules\blog;

use yii\base\BootstrapInterface;
use yii\filters\AccessControl;

/**
 * blog module definition class
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\blog\controllers';

    /**
     * @var string name of username property in User model
     */
    public $userName;

    /**
     * @var string User model class
     */
    public $userClass;

    /**
     * @var boolean
     */
    public $enableFlashMessages = true;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->modules = [
           'gridview' => [
                'class' => '\kartik\grid\Module',
            ],
        ];

        \Yii::$app->i18n->translations['blog'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'forceTranslation' => true,
            'basePath' => '@app/modules/blog/messages',
            'fileMap' => [
                'blog' => 'module.php',
            ],
        ];
    }

    public function bootstrap($app)
    {
        if ($app instanceof \yii\console\Application) {
            $this->controllerNamespace = 'app\modules\blog\commands';
        }
    }
}
