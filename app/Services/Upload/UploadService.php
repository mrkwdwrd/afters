<?php

namespace App\Services\Upload;

use Illuminate\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadService
{
    /**
     * The directory asset uploads to.
     *
     * @var string
     */
    protected $directory = 'uploads';

    /**
     * Filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $filesystem;

    /**
     * The name of uploaded asset.
     *
     * @var string
     */
    protected $fileName;

    /**
     * The mime type of the file.
     *
     * @var string
     */
    protected $mime;

    /**
     * Create a new UploadService instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem $filesystem
     *
     * @return void
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * Handle the file upload. Returns the response body on success, or false on failure.
     *
     * @param  \Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return array|bool
     */
    public function handle(UploadedFile $file)
    {
        $this->fileName = $this->makeFilename($file);
        $this->mime = $file->getMimeType();
        $path = $this->getFilePath($this->directory);

        try {
            $file->move($path, $this->fileName);
        } catch (FileException $fe) {
            return false;
        }

        return $this->getJsonBody();
    }

    /**
     * Make a new unique filename, append time to the original file name.
     *
     * @param  \Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    protected function makeFilename(UploadedFile $file)
    {
        $originalName = $file->getClientOriginalName();
        $extension = '.' . $file->getClientOriginalExtension();
        $baseName = basename($originalName, $extension);

        //only allow letters, numbers, underscore and hyphen
        $baseName = preg_replace('/[^A-Za-z0-9\-\_]/', '', $baseName);

        return $baseName . '-' . time() . $extension;
    }

    /**
     * Get file path from the given partial path.
     *
     * @param  string $path
     *
     * @return mixed
     */
    protected function getFilePath($path)
    {
        return public_path() . '/' . $path;
    }

    /**
     * Get full path of the file.
     *
     * @param  string $path
     *
     * @return mixed
     */
    protected function getFullPath()
    {
        return public_path() . $this->getRelativePath();
    }

    /**
     * Get relative path of the file.
     *
     * @param  string $path
     *
     * @return mixed
     */
    protected function getRelativePath()
    {
        return '/' . $this->directory . '/' . $this->fileName;
    }

    /**
     * Delete the file for a given name.
     *
     * @param  string|array $paths
     *
     * @return bool
     */
    public function deleteFile($fileName)
    {
        $file = $this->getFilePath($this->directory) . '/' . $fileName;

        if ($this->filesystem->isFile($file)) {
            return $this->filesystem->delete($file);
        }

        return false;
    }

    /**
     * Construct the body of the JSON response.
     *
     * @return array
     */
    protected function getJsonBody()
    {
        return array_merge(['status' => 201, 'response' => $this->getRelativePath()], $this->getFileData());
    }

    /**
     * Construct the asset data.
     *
     * @return array
     */
    public function getFileData()
    {
        return [
            'file_name' => $this->fileName,
            'mime'      => $this->mime,
            'extension' => $this->getFileExtension($this->getFullPath()),
            'size'      => $this->getFileSize($this->getFullPath()),
            'type'      => $this->getDocumentType()
        ];
    }

    /**
     * Returns the type of the file e.g. audio, video, text, image
     *
     * @return string
     */
    protected function getDocumentType()
    {
        $extension = $this->getFileExtension($this->getFullPath());

        switch (strtolower($extension)) {
            case 'mid':
            case 'mp3':
            case 'wav':
            case 'wma':
            case 'ogg':
            case 'm4a':
            case 'ra':
            case 'ram':
                return 'audio';
                break;
            case 'doc':
            case 'pdf':
            case 'ppt':
            case 'rtf':
            case 'txt':
            case 'xls':
            case 'docx':
            case 'xlsx':
            case 'pptx':
                return 'document';
                break;
            case 'gif':
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'bmp':
            case 'tif':
            case 'tga':
            case 'wbmp':
                return 'image';
                break;
            case '3gp':
            case 'asf':
            case 'avi':
            case 'flv':
            case 'm4v':
            case 'mp4':
            case 'mov':
            case 'mpeg':
            case 'mpg':
            case 'rm':
            case 'wmv':
                return 'video';
                break;
            case 'swf':
                return 'flash';
                break;
            default:
                return 'other';
        }
    }

    /**
     * Return stored file name.
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Return stored file mime type.
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->mime;
    }

    /**
     * Get the contents of the file located at the given path.
     *
     * @param  string $path
     *
     * @return mixed
     */
    protected function getFile($path)
    {
        return $this->filesystem->get($path);
    }

    /**
     * Get the size of the file located at the given path.
     *
     * @param  string $path
     *
     * @return mixed
     */
    protected function getFileSize($path)
    {
        return $this->filesystem->size($path);
    }

    /**
     * Get the extension of the file located at the given path.
     *
     * @param  string $path
     *
     * @return mixed
     */
    protected function getFileExtension($path)
    {
        return $this->filesystem->extension($path);
    }

    /**
     * Set upload directory
     *
     * @param string $directory
     */
    public function setDirectory($directory)
    {
        $this->directory = $directory;
    }
}
