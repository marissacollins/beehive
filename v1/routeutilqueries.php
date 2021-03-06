<?php


$app->put('/renamefile',  function() use($app) {

    error_log( print_R("before request", TRUE ));

    $request = $app->request();
    $body = $request->getBody();
    $student = json_decode($body);
    error_log( print_R($student, TRUE ));

    //global $user_id;
    $LastName = $student->LastName;
    $FirstName = $student->FirstName;

      $dir = opendir('../app/images/students');

});

$app->get('/studentfiles',  function() {

    $app = \Slim\Slim::getInstance();

  //return list of files/pictures from student dir

    $files = array();

    $dir = opendir('../app/images/students');
    while ($file = readdir($dir)) {
        if ($file == '.' || $file == '..') {
            continue;
        }

        $files[] = $file;
    }

    // Http response code
    $app->status(200);

    // setting response content type to json
    $app->contentType('application/json');

    echo json_encode($files);

});

?>
