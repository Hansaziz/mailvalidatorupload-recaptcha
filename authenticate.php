<?php
session_start();


if (isset($_POST['g-recaptcha-response'])) {
    $recaptchaSecretKey = '6LeQEc4nAAAAAIiKRX6ND1EMsXK1oDmj90rlFuV7';
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Verify reCAPTCHA
    $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptchaData = [
        'secret' => $recaptchaSecretKey,
        'response' => $recaptchaResponse
    ];

    $recaptchaOptions = [
        'http' => [
            'method' => 'POST',
            'content' => http_build_query($recaptchaData)
        ]
    ];

    $recaptchaContext = stream_context_create($recaptchaOptions);
    $recaptchaResult = file_get_contents($recaptchaUrl, false, $recaptchaContext);
    $recaptchaData = json_decode($recaptchaResult);

    if (!$recaptchaData->success) {
        echo "reCAPTCHA verification failed.";
        exit;
    }
}

$validUsers = [
    'userA' => 'passwordA', 
    'userB' => 'passwordB'
];

$username = $_POST['username'];
$password = $_POST['password'];

if (array_key_exists($username, $validUsers) && $validUsers[$username] === $password) {
    $_SESSION['user'] = $username;
    $_SESSION['userRole'] = 'userA'; 
    header('Location: index.php'); 
    exit;
} else {
    echo "Invalid username or password.";
}
?>
