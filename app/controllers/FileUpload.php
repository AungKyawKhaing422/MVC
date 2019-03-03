<?php
/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 3/3/2019
 * Time: 11:53 PM
 */

namespace App\Controllers;


class FileUpload
{
    protected $maxsize = 2097152;
    protected $filename = null;
    protected $acceptType = ['png', 'jpg', 'jpeg', 'gif','PNG'];

//    public function __construct($file){
//
//    }

    public function checkSize($file)
    {

        return $file->size < $this->maxsize;
    }

    public function isImage($file)
    {
        $ext = pathinfo($file->name, PATHINFO_EXTENSION);
        return in_array($ext, $this->acceptType);
    }

    public function setName($file, $name = "")
    {
        if ($name == "") {
            $name = pathinfo($file->name, PATHINFO_FILENAME);
            $hash = md5(microtime());
            $ext = pathinfo($file->name, PATHINFO_EXTENSION);
            $this->filename = $name . "-" . $hash . "." . $ext;
        }
    }

    public function getName()
    {
        return $this->filename;
    }

    public function getPath($file)
    {
        echo $path = pathinfo($file['tmp_name'], PATHINFO_FILENAME);
    }

    public function move($file, $name = "")
    {
        if ($this->isImage($file)) {
            if ($this->checkSize($file)) {
                $this->setName($file);
                $filepath = dirname(APP_ROOT) . "/public/assets/imgs/" . $this->getName();
                return move_uploaded_file($file->tmp_name,$filepath);
            }else{
                echo "upload minimum size";
            }
        }else{
            echo "upload correct images";
        }
    }
}