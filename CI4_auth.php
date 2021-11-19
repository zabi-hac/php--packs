<?php

function super_check()
{
    $db      = \Config\Database::connect();
    $ss =  \Config\Services::session();

    if ($ss->has('super')) {
        $builder = $db->table('super');
        if ($dat = $builder->where('su_name', $ss->super['su_name'])->get()->getResult('array')) {
            if (password_verify($ss->super['su_pass'], $dat[0]['su_pass'])) :
                return true;
            endif;
        }
    }
    return true;
}
