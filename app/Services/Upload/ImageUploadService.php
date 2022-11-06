<?php

namespace App\Services\Upload;

use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUploadService extends UploadService
{
    /**
     * The directory image uploads to.
     *
     * @var string
     */
    protected $directory = 'uploads/images';

    /**
     * Resize Image, returns the response body on success, or false on failure.
     *
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     * @param null                                                $folderName
     *
     * @return array|bool
     */
    public function processImage(UploadedFile $file, $folderName = null)
    {
        // set file name
        $this->fileName = $this->makeFilename($file);

        // set file path
        $path = $this->checkFilePath($folderName);

        $image = Image::make($file->getRealPath());

        // intervention image process
        // save image
        $image->save($path . '/' . $this->fileName);

        // resize image => product-main: w720px h345px
        $image->resize(null, 345, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path . '/' . 'main-' . $this->fileName);

        // resize image => product-index: w188px h120px
        $image->resize(null, 120, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path . '/' . 'index-' . $this->fileName);

        return $this->getSimpleJsonBody($folderName);
    }

    private function checkFilePath($folderName = null)
    {
        if (! is_null($folderName)) {
            $this->directory = $this->directory . '/' . $folderName;
        }

        $path = $this->getFilePath($this->directory);

        $this->filesystem->exists($path) or $this->filesystem->makeDirectory($path);

        return $path;
    }

    /**
     * Construct the body of the JSON response.
     *
     * @param $folderName
     *
     * @return array
     */
    protected function getSimpleJsonBody($folderName = null)
    {
        return [
            'status'    => 201,
            'response'  => $this->getRelativePath(),
            'file_name' => $this->fileName,
            'type'      => 'image'
        ];
    }

    /**
     * Delete images for a given resource.
     *
     * @param      $fileName
     * @param null $folderName
     *
     * @return bool
     */
    public function  deleteImages($fileName, $folderName = null)
    {
        if (! is_null($folderName)) {
            $this->directory = $this->directory . '/' . $folderName;
        }

        return $this->deleteFile($fileName) && $this->deleteFile('main-' . $fileName) && $this->deleteFile('index-' . $fileName);
    }
}