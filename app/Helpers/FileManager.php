<?php
/**
 * Created by PhpStorm.
 * User: amitav
 * Date: 2/18/16
 * Time: 3:11 PM
 */

namespace App\Helpers;

use App\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class FileManager
{
    protected $storage;

    protected $uri;
    protected $height;
    protected $width;

    public function __construct()
    {
        $this->storage = 'file';
        $this->height = \Config::get('image_size.height');
        $this->width = \Config::get('image_size.width');
    }

    /**
     * Get the public url of a file from it's uri
     *
     * @param $uri
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function uriToUrl($uri)
    {
        $arrUrl = explode('://', $uri);

        if ($arrUrl[0] == 's3') {
            return env('S3_URL') . $arrUrl[1];
        }

        if ($arrUrl[0] == 'https') {
            return $uri;
        }

        return url($arrUrl[1]);
    }

    public function removeFile($uri)
    {
        $this->storage = $this->uriToStorage($uri);
        $link = $this->uriToUrl($uri);

        if ($this->storage == 's3') {
            $this->removeFileFromS3($link);

        } else {
            $link = str_replace(url('/') . '/', '', $link);
            unlink($link);
        }

        $file = File::where('file_path', $uri)->first();
        DB::table('fileables')->where('file_id', $file->id)->delete();
        $file->delete();
    }

    /**
     * @param $fileRequestObj
     * @param $filePath
     * @param string $height
     * @param string $width
     * @param null $storage
     * @return string
     */
    public function uploadImageFileFromBase64String($fileRequestObj, $filePath,$storage = null)
    {
        // check and set filename
        $fileName = uniqid();

        // check and set path
        if (!file_exists($filePath)) {
            mkdir($filePath, 0777, true);
        }

        // check the extension of the file
        $ext = $this->getFileExtensionFromString($fileRequestObj);

        // set the storage
        $this->setStorage($storage);

        \Image::make(file_get_contents($fileRequestObj))
            ->resize($this->width, $this->height)
            ->save($filePath . $fileName . $ext);

        if ($this->storage == 's3') {
            $this->handleS3File($filePath, $fileName, $ext);
        }

        return $fileName . $ext;
    }

    private function getFileExtensionFromString($fileRequest)
    {
        $ext = '.jpg';

        switch (exif_imagetype($fileRequest)) {
        case 1:
            $ext = '.gif';
            break;

        case 3:
            $ext = '.png';
            break;
        }

        return $ext;
    }

    private function setStorage($string)
    {
        if ($string == null) {
            $this->storage = 'file';
            return true;
        }

        switch ($string) {
        case 'file':
            $this->storage = 'file';
            break;

        case 's3':
            $this->storage = 's3';
            break;

        default:
            abort(500, 'This storage is not supported.');

        }
    }

    private function handleS3File($filePath, $fileName, $ext)
    {
        $s3Key    = env('S3_KEY');
        $s3Secret = env('S3_SECRET');
        $s3Region = env('S3_REGION');
        $s3Bucket = env('S3_BUCKET');
        $s3Url    = env('S3_URL');

        if (!$s3Key || !$s3Secret || !$s3Region || !$s3Bucket || !$s3Url) {
            abort(500, 'S3 environment variables are not defined.');
        }

        $s3 = Storage::disk('s3');
        $s3->put($filePath . $fileName . $ext, file_get_contents($filePath . $fileName . $ext), 'public');
        unlink($filePath . $fileName . $ext);
    }

    /**
     * Give the uri from a url
     * @param $path
     * @return string
     */
    private function giveUrlToUri($path)
    {
        return $this->storage . '://' . $path;
    }

    /**
     * Check the storage from a uri of a file
     *
     * @return mixed
     */
    private function uriToStorage($uri)
    {
        return explode('://', $uri)[0];
    }

    private function removeFileFromS3($link)
    {
        $s3Url = env('S3_URL');
        $path = str_replace($s3Url, '', $link);
        $s3 = Storage::disk('s3');
        $s3->delete($path);
    }

    public function cropAndResize($file, $x, $y, $height, $width, $filePath, $storage = null)
    {
        // check and set filename
        $fileName = uniqid();
        // check the extension of the file
        $ext = $this->getFileExtensionFromString($file);

        // Save original image
        Image::make(file_get_contents($file))->save($filePath . $fileName.'_original' . $ext);

        // set the storage
        $this->setStorage($storage);

        $imageUpload = Image::make(file_get_contents($file));
        $imageUpload->crop($width, $height, $x, $y);
        $imageUpload->resize($this->width, $this->height)->save($filePath . $fileName . $ext);

        if ($this->storage == 's3') {
            $this->handleS3File($filePath, $fileName, $ext);
        }

        return $fileName . $ext;

    }

}
