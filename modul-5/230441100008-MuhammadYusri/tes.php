<?php
$mahasiswa = array(
    array(
        'nim' => '1231365',
        'nama' => 'torpedo kambing',
        'alamat' => 'gguug',
        'angkatan' => '23'
    ),
    array(
        'nim' => '242434',
        'nama' => 'Muhammad Yusrikkkoooo',
        'alamat' => 'Sampang',
        'angkatan' => '23'
    ),
    array(
        'nim' => '2304411000083',
        'nama' => 'torpedo kambing',
        'alamat' => 'gguug',
        'angkatan' => '23'
    ),
    array(
        'nim' => '242343',
        'nama' => 'aqq',
        'alamat' => 'wqwq',
        'angkatan' => 'qwwq'
    )
);
// menghapus berdasarkan nim
// $nimHapus = '242343';
// $mahasiswa = array_filter($mahasiswa, function($data) use ($nimHapus) {
//     return $data['nim'] != $nimHapus;
// });'
$nimHapus = '242343';
foreach ($mahasiswa as $key => $data) { //foreach adalah perulangan yang digunakan untuk array
    if ($data['nim'] == $nimHapus) {
        unset($mahasiswa[$key]);
        break; // Stop the loop after removing the element
    }
}

print_r($mahasiswa);
