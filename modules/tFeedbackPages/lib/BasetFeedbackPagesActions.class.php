<?php

/**
 * Base actions for the tFeedbackPlugin tFeedbackPages module.
 *
 * @package     tFeedbackPlugin
 * @subpackage  tFeedbackPages
 * @author      Your name here
 * @version     SVN: $Id: BaseActions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
abstract class BasetFeedbackPagesActions extends sfActions
{
    public function executeIndex(sfWebRequest $request) { }

    public function executeAsyncPost(sfWebRequest $request)
    {
        $formSubmissionHandler = new FormSubmissionHandler($this);
        $done = $formSubmissionHandler->execute();
        return $this->renderText(json_encode(array('status' => is_object($done), 'message' => $formSubmissionHandler->getMessages())));
    }
}
