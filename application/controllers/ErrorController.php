<?php

/**
 * Class ErrorController
 */
class ErrorController extends Zend_Controller_Action
{
    /**
     * Обработка ошибок и вывод отладочной информации
     *
     * @return void
     */
    public function errorAction()
    {
        $errors = $this->getRequest()->getParam('error_handler');

        if ($errors->exception instanceof Exception) {
            $errorMessage = $errors->exception->getMessage();
            $backTrace = $errors->exception->getTraceAsString();
        } elseif (is_array($errors)) {
            error_log(print_r($errors, true));
        }

        $page = new Model_Page_Error();
        $page->setTemplateParam('errorMessage', $errorMessage);
        if (APPLICATION_ENV == 'development') {
            $page->setTemplateParam('backTrace', $backTrace);
        }

        $this->getResponse()->setHttpResponseCode(500);

        $page->render();



    }
}