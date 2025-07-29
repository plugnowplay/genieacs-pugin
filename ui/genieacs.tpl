{include file="sections/header.tpl"}

<h2>GenieACS Control Panel</h2>

{if $reboot_msg}
    <div class="alert alert-success">
        {$reboot_msg}
    </div>
{/if}

<form method="get">
    <label>Masukkan Serial Number:</label>
    <input type="text" name="serial" value="{$serial}">
    <input type="hidden" name="plugin" value="genieacs">
    <button type="submit" class="btn btn-primary">🔍 Cari</button>
</form>

{if $serial}
    <p>Menampilkan informasi perangkat dengan serial: <strong>{$serial}</strong></p>
{/if}

{if $info}
    <ul>
        <li>Model: {$info.model}</li>
        <li>Status: {$info.status}</li>
        <li>Uptime: {$info.uptime}</li>
    </ul>

    <form method="post">
        <input type="hidden" name="serial" value="{$serial}">
        <button type="submit" name="reboot" class="btn btn-danger">🔁 Reboot Perangkat</button>
    </form>
{/if}

{include file="sections/footer.tpl"}
