<?php

function image_upload($file, $path, array $dims = [])
{

    $nam = $file->getClientName();
    if ($file->isValid() and !$file->hasMoved() and !file_exists($path . $nam)) :
        //move image
        if ($file->move($path, $nam)) :
            $res['sta'] = true;
            $imag = \Config\Services::image();
            foreach ($dims as $k => $v) :
                $imag->withFile($path . $nam)
                    ->resize($v[0], $v[1])
                    ->save($path . $v[0] . 'x' . $v[1] . '-' . $nam);
            endforeach;

        else :
            $res['sta'] = false;
        endif;
    else :
        $res['err'] = 'invalid file or already exist.';
    endif;
    return $res;
}

function image_delete($path, $nam)
{
    $nam = trim($nam);
    if (file_exists($path . $nam)) :
        if (unlink($path . $nam)) :
            $res['sta'] = true;
            if (unlink($path . 'thumbs/' . $nam)) :
                $res['tmb'] = true;
            else :
                $res['tmb'] = false;
            endif;
        else :
            $res['sta'] = false;
        endif;
        return $res;
    else :
        return 'no such file' . $path . $nam;
    endif;
}

function create_thumbs($from, $to, $width = 99, $height = 99)
{
    // create thumb
    $imag = \Config\Services::image();
    if ($imag
        ->withFile($from)
        ->resize($width, $height)
        ->save($to)
    ) :
        $res['thum'] = true;
    else :
        $res['thum'] = false;
    endif;
    return $res;
}


// function show_img($fish)
// {
//     $path = base_url('/uploads/fish/ck_' . $fish['fish_id']);
//     for ($m = 1; $m < 6; $m++) {
//         if ($fish['img' . $m] != null and $fish['img' . $m] != '')  :
            
//         endif;
//     }
// }
