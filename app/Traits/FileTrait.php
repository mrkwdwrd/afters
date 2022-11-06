<?php

namespace App\Traits;

use Exception;
use Symfony\Component\HttpFoundation\File\UploadedFile;

trait FileTrait
{
    /**
     * Make a new unique filename.
     *
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    public function makeFilename(UploadedFile $file)
    {
        $originalName = $file->getClientOriginalName();
        $extension = '.' . $file->getClientOriginalExtension();
        $baseName = basename($originalName, $extension);

        //only allow letters, numbers, underscore and hyphen
        $baseName = preg_replace('/[^A-Za-z0-9\-\_]/', '', $baseName);

        return $baseName . '-' . time() . $extension;
    }

    /**
     * Save unencoded data to file.
     *
     * @return array|bool
     */
    public function updateFile($path, $unencodedData)
    {
        try {
            $fp = fopen($path, 'wb');
            fwrite($fp, $unencodedData);
            fclose($fp);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
