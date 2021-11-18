<?php

require './db.php';
$db = new Db();

header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=abc.xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private", false);

// print_r($db->get('full', 'user'));
$out = '<table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Post</th>
        </tr>
        </thead>
        ';
foreach ($db->get('full', 'user') as $k => $v) {
    $out .= '<tbody>
            <tr>
                <td>' . $v['name'] . '</td>
                <td>' . $v['post'] . '</td>
            </tr>
            </tbody>';
}
$out .= '</table>';


echo $out;
