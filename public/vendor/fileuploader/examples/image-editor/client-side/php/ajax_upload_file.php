<?php
    include('../../../../src/php/class.fileuploader.php');

	$isAfterEditing = false;

	// if after editing
	if (isset($_POST['fileuploader']) && isset($_POST['_editingg']) && isset($_POST['_namee'])) {
        $isAfterEditing = true;
	}
	
	// initialize FileUploader
    $FileUploader = new FileUploader('files', array(
        'limit' => null,
        'maxSize' => null,
		'fileMaxSize' => null,
        'extensions' => null,
        'required' => false,
        'uploadDir' => '../uploads/',
        'title' => $isAfterEditing ? $_POST['_namee'] : 'name',
		'replace' => $isAfterEditing,
        'listInput' => true,
        'files' => null
    ));
	
	// call to upload the files
    $upload = $FileUploader->upload();

	// export to js
	echo json_encode($upload);
	exit;