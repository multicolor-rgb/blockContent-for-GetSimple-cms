<?php
include('../../../admin/inc/common.php');
login_cookie_check();
$uploadDir = '../../../data/uploads/';
$originalFileName = $_FILES['image']['name'];
$uploadFile = $uploadDir . basename($originalFileName);
$finalFile = $SITEURL . 'data/uploads/' . basename($originalFileName);

$response = [];

// Check for duplicate file names and generate a unique name if necessary
$counter = 1;
while (file_exists($uploadFile)) {
    $filenameWithoutExtension = pathinfo($originalFileName, PATHINFO_FILENAME);
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $newFileName = $filenameWithoutExtension . '_' . $counter . '.' . $fileExtension;
    $uploadFile = $uploadDir . $newFileName;
    $finalFile = $SITEURL . 'data/uploads/' . $newFileName;
    $counter++;
}

if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
    $response['success'] = true;
    $response['url'] = $finalFile;
} else {
    $response['success'] = false;
    $response['error']['message'] = 'Failed to upload image';
}

header('Content-Type: application/json');
echo json_encode($response);
?>
