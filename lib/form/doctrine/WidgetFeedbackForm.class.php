<?php

class WidgetFeedbackForm extends tFeedbackForm
{
    public function configure()
    {
        $this->useFields(sfConfig::get('app_tFeedbackPlugin_form_fields'));
        $this->setWidget('message', new sfWidgetFormTextarea());
        $this->setValidator('message', new sfValidatorString(array('required' => true)));

        foreach (sfConfig::get('app_tFeedbackPlugin_required_form_fields') as $field)
        {
            // make email field validator a real email validator
            if ($field == 'email')
            {
                $this->setValidator($field, new sfValidatorEmail());
            }

            $this->validatorSchema[$field]->setOption('required', true);
        }

        if (sfConfig::get('app_tFeedbackPlugin_disable_csrf', false))
        {
            $this->disableLocalCSRFProtection();
        }
    }
}
