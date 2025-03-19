<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    $response = array();

    if (empty($country)) {
        $response['status'] = 'error';
        $response['message'] = 'Invalid country selection.';
    } else {
        $response['status'] = 'success';
        switch($country) {
            case 'U':
                $response['message'] = 'Visa required for most applicants.';
                break;
            case 'C':
                $response['message'] = 'Visa required unless you have an eTA.';
                break;
            case 'I':
                $response['message'] = 'Visa required before travel.';
                break;
            case 'UK':
                $response['message'] = 'Visa depends on the duration of stay.';
                break;
            case 'AUS':
                $response['message'] = 'eVisa available for eligible travelers.';
                break;
            default:
                $response['status'] = 'error';
                $response['message'] = 'Invalid country selection.';
        }
    }

    echo json_encode($response);
} else {
    echo json_encode(array(
        'status' => 'error',
        'message' => 'Invalid request method.'
    ));
}
?> 