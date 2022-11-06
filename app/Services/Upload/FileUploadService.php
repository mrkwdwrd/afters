<?php

namespace App\Services\Upload;

class FileUploadService extends UploadService
{
    /**
     * The directory file uploads to.
     *
     * @var string
     */
    protected $directory = 'uploads/files';

    /**
     * Delete files for a given resource.
     *
     * @param      $fileName
     * @param null $folderName
     *
     * @return bool
     */
    public function delete($fileName, $folderName = null)
    {
        if (! is_null($folderName)) {
            $this->directory = $this->directory . '/' . $folderName;
        }

        return $this->deleteFile('/' . $folderName . '/' . $fileName);
    }
}
