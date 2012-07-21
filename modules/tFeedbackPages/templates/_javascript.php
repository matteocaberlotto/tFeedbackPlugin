<?php
/**
 * This is the js version of the form submission:
 * use if when refreshing the page is not an option you want to consider.
 * just call bindAsyncFormSubmission with your message callback, for example bindAsyncFormSubmission(alert)
 * (requires jquery)
 */
$currentUri = url_for($sf_context->getRouting()->getCurrentInternalUri(true));
?>
<script>
function bindAsyncFormSubmission(messageCallback)
{
    $("#feedbackFormSubmitButton")
    .click(function(e){
        // prevent default behaviour
        e.preventDefault();

        // send async post request to server
        $.ajax({
            async: false,
            type: 'POST',
            url: '<?php echo $currentUri ?>',
            data: $(".feedback_form_field input, .feedback_form_field textarea, #t_feedback__csrf_token").serialize(),
            success: function(returnData)
            {
                var jsonData = eval("(" + returnData + ")");
                if (jsonData.status == true)
                {
                    //
                    messageCallback(jsonData['message']);
                }
                else
                {
                    //
                    var
                    message = 'Our system says: ',
                    separator = (messageCallback == alert ? "\n" : '<br />');
                    for (name in jsonData['message'])
                    {
                        message += separator + name + ' is ' + jsonData['message'][name];
                    }
                    messageCallback(message);
                }
            },
            error: function(returnData)
            {
                messageCallback(returnData);
            }
        });
    });
}
</script>