<?php
$users = [
    ['username' => 'arno', 'password' => 'arnogee123']
];

if (!isset($_SESSION['mahasiswa'])) {
    $_SESSION['mahasiswa'] = [
        ['nim' => '230441100024', 'nama' => 'Evrilla Steviano', 'alamat' => 'Gresik', 'angkatan' => '2023'],
        ['nim' => '230441100142', 'nama' => 'Rayhan Maulidan', 'alamat' => 'Mojokerto', 'angkatan' => '2023']
    ];
}
?>
