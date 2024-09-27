<?php

namespace App\Core\Trait;



trait FileTrait
{


    public static function uploade($file, $name, $folder, $disk)
    {


        $file->storeAs($folder, $name, $disk);

    }

    public static function delete($path)
    {

        if (file_exists($path)) {


            unlink($path);
            return "true";
        } else {

            return "false";
        }
    }
}
