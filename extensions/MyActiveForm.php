<?php
/**
 * Created by PhpStorm.
 * User: Joker
 * Date: 2016/11/28
 * Time: 12:35
 */

namespace app\extensions;


use yii\widgets\ActiveForm;

class MyActiveForm extends ActiveForm
{
    public $options = [];

    public $fieldConfig = [];

    public $encodeErrorSummary = true;

    public $errorSummaryCssClass = 'error-summary';

    public $requiredCssClass = 'required';

    public $errorCssClass = 'has-error';

    public $successCssClass = 'has-success';

    public $validatingCssClass = 'validating';

    public $enableClientValidation = false;

    public $enableAjaxValidation = false;

    public $enableClientScript = true;

    public $validationUrl;

    public $validateOnSubmit = true;

    public $validateOnChange = true;

    public $validateOnBlur = true;
    /**
     * @var boolean whether to perform validation while the user is typing in an input field.
     * If [[ActiveField::validateOnType]] is set, its value will take precedence for that input field.
     * @see validationDelay
     */
    public $validateOnType = false;
    /**
     * @var integer number of milliseconds that the validation should be delayed when the user types in the field
     * and [[validateOnType]] is set true.
     * If [[ActiveField::validationDelay]] is set, its value will take precedence for that input field.
     */
    public $validationDelay = 500;
    /**
     * @var string the name of the GET parameter indicating the validation request is an AJAX request.
     */
    public $ajaxParam = 'ajax';
    /**
     * @var string the type of data that you're expecting back from the server.
     */
    public $ajaxDataType = 'json';
    /**
     * @var boolean whether to scroll to the first error after validation.
     * @since 2.0.6
     */
    public $scrollToError = true;
    /**
     * @var array the client validation options for individual attributes. Each element of the array
     * represents the validation options for a particular attribute.
     * @internal
     */
    public $attributes = [];

    /**
     * @var ActiveField[] the ActiveField objects that are currently active
     */
    private $_fields = [];
}

