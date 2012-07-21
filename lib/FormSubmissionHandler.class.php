<?php

class FormSubmissionHandler
{
    protected $form, $request, $action, $formClass, $errors;

    public function __construct($action)
    {
        $this->setAction($action);
    }

    public function setAction($action)
    {
        $this->action = $action;
    }

    public function getFormClass()
    {
        return sfConfig::get('app_tFeedbackPlugin_form_class', 'WidgetFeedbackForm');
    }

    public function getForm()
    {
        return $this->form;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getMessages()
    {
        if (!is_null($this->errors))
        {
            return $this->getErrorMessages();
        }
        return 'Thank you!';
    }

    public function getErrorMessages()
    {
        $messages = array();
        $errors = $this->getForm()->getErrorSchema()->getErrors();
        foreach ($errors as $name => $error)
        {
            $messages[$name] = $error->getMessage();
        }
        return $messages;
    }

    public function handleFormSubmission()
    {
        if ($this->getRequest()->isMethod('post') && $this->getRequest()->hasParameter($this->getForm()->getName()))
        {
            $this->getForm()->bind($this->getRequest()->getParameter($this->getForm()->getName()));
            if ($this->getForm()->isValid())
            {
                return $this->getForm()->save();
            }
            else
            {
                $this->errors = $this->getForm()->getErrorSchema()->getErrors();
                return false;
            }
        }
    }

    public function execute()
    {
        $class = $this->getFormClass();
        $form = new $class();
        $this->form = $form;
        $this->request = $this->action->getRequest();

        // bind form to sfActions too
        $this->action->form = $form;

        return $this->handleFormSubmission();
    }
}