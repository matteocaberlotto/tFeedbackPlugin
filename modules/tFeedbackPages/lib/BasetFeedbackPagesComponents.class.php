<?php

class BasetFeedbackPagesComponents extends sfComponents
{
    public function executeWidget(sfWebRequest $request)
    {
        $formSubmissionHandler = new FormSubmissionHandler($this);
        $formSubmissionHandler->execute();
    }
}