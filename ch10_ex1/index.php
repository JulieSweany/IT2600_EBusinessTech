<?php
//set default value
$message = '';

//get value from POST array
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action =  'start_app';
}

//process
switch ($action) {
    case 'start_app':

        // set default invoice date 1 month prior to current date
        $interval = new DateInterval('P1M');
        $default_date = new DateTime();
        $default_date->sub($interval);
        $invoice_date_s = $default_date->format('n/j/Y');

        // set default due date 2 months after current date
        $interval = new DateInterval('P2M');
        $default_date = new DateTime();
        $default_date->add($interval);
        $due_date_s = $default_date->format('n/j/Y');

        $message = 'Enter two dates and click on the Submit button.';
        break;
    case 'process_data':
        $invoice_date_s = filter_input(INPUT_POST, 'invoice_date');
        $due_date_s = filter_input(INPUT_POST, 'due_date');

        // make sure the user enters both dates
        if ($invoice_date_s == NULL || $due_date_s == NULL) {
            $message = 'Please enter the Invoice Date and Due Date.';
        break;
        } else {

        // convert date strings to DateTime objects and use a try/catch to make sure the dates are valid
        try {$invoice_date = new DateTime($invoice_date_s);
        $due_date = new DateTime($due_date_s);
        } catch (Exception $e) {
            $message = 'Please enter dates in a valid format.';
        break;
        }
        // make sure the due date is after the invoice date
        if ($due_date < $invoice_date){
            $message = 'Please check dates. Invoice date must be earlier than due date.';
        break;
        }
        // format both dates
        $invoice_date_f = $invoice_date->format('F j, Y');
        $due_date_f = $due_date->format('F j, Y'); 
        
        // get the current date and time and format it
        $now = new DateTime();
        $current_date_f = $now->format('F j, Y');
        $current_time_f = $now->format('g:i:s a');
        
        // get the amount of time between the current date and the due date
        // and format the due date message
        $current_date = new DateTime();
        $due_date_2 = new DateTime($due_date_s);
        $difference = $current_date->diff($due_date_2);   
        
        if ($due_date < $now) {
            //$due_date_message = $difference;       
            $due_date_message = $difference->format('This invoice is %y years,  %m months, and  %d days overdue.');

        break;
        } else {
       $due_date_message = $difference->format('This invoice is due in %y years,  %m months, and  %d days.');
    }

        break;
    }
}
include 'date_tester.php';
?>