<?php

namespace Plugo\Services\ImageUploader;

class ImageUploader {


    public function uploadPicture($picture){
        if(!file_exists('./images')){
            mkdir("./images");
        }

        $tmpPicutre = $picture['file']['tmp_name'];
        $pictureName = $picture['file']['name'];
        $tabExtension = explode('.', $pictureName);
        $extension = strtolower(end($tabExtension));
        $extensions = ['jpeg', 'jpg', 'png'];

        if(in_array($extension, $extensions)){
            $name = uniqid('', true) . '_' . $pictureName;
            move_uploaded_file($tmpPicutre, './images/' . $name);
            $result = true;
        }else{
            var_dump('non');
            $result = false;
        }

        return $result;
    }

}