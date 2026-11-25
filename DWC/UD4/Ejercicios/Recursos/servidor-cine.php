<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

$usuarios = [
    'user123' => [
        'nombre' => 'Ane',
        'peliculas' => ['Interstellar', 'Dune', 'Arrival']
    ],
    'user456' => [
        'nombre' => 'Iker',
        'peliculas' => ['Inception', 'Blade Runner 2049']
    ]
];

$action = $_GET['action'] ?? 'perfil';
$user = $_GET['user'] ?? '';

if (!isset($usuarios[$user])) {
    http_response_code(404);
    echo json_encode([
        'ok' => false,
        'mensaje' => 'Usuario no encontrado'
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

if ($action === 'login') {
    $token = 'token-' . $user;

    setcookie('cine_session', $token, [
        'expires' => time() + 20,
        'path' => '/',
        'secure' => false,
        'httponly' => false,
        'samesite' => 'Lax'
    ]);

    echo json_encode([
        'ok' => true,
        'accion' => 'login',
        'mensaje' => 'Sesión iniciada en servidor',
        'user' => $user,
        'cookie_enviada' => 'cine_session=' . $token,
        'expira_en_segundos' => 20
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$cookieRecibida = $_COOKIE['cine_session'] ?? null;
$tokenEsperado = 'token-' . $user;

if ($cookieRecibida !== $tokenEsperado) {
    echo json_encode([
        'ok' => false,
        'accion' => 'perfil',
        'autenticado' => false,
        'mensaje' => 'Sin cookie válida o cookie caducada',
        'cookie_recibida' => $cookieRecibida,
        'peliculas' => []
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

echo json_encode([
    'ok' => true,
    'accion' => 'perfil',
    'autenticado' => true,
    'user' => $user,
    'nombre' => $usuarios[$user]['nombre'],
    'cookie_recibida' => $cookieRecibida,
    'peliculas' => $usuarios[$user]['peliculas']
], JSON_UNESCAPED_UNICODE);
