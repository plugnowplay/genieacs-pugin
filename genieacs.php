<?php
// plugins/genieacs/plugin.php

require_once __DIR__ . '/functions.php';

add_hook('admin_menu', function () {
    add_admin_menu('GenieACS', 'plugin=genieacs');
});

if (isset($_GET['plugin']) && $_GET['plugin'] === 'genieacs') {
    $serial = $_GET['serial'] ?? '';
    $info = !empty($serial) ? getDeviceInfo($serial) : [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reboot'])) {
        rebootDevice($serial);
        $reboot_msg = "Perangkat berhasil direboot.";
    }

    display_template('genieacs.tpl', [
        'serial' => $serial,
        'info' => $info ?? [],
        'reboot_msg' => $reboot_msg ?? ''
    ]);
}
