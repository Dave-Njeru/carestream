<?php
session_start();

$header = 'Enable 2FA';

require 'partials/general/head.php';
require '../vendor/autoload.php';

use OTPHP\TOTP;
use chillerlan\QRCode\QRCode;

if (!isset($_SESSION['user'])) {
    // simulate logged in user
    $_SESSION['user'] = 'davenjeru9@gmail.com';
}

$user = $_SESSION['user'];

//Create a new TOTP secret for the user
$totp = TOTP::create();
$totp->setLabel('CareStream' . $user);
$totp->setIssuer('CareStream');

//Save the secret somewhere (session is used for demo, but database is prefered)
$_SESSION['totp_secret'] = $totp->getSecret();

//Get the provisioning URI for QR code
$uri = $totp->getProvisioningUri();

//Generate QR code as data URI
$qrCode = new QRCode();
$qrImage = $qrCode->render($uri);
?>

<body class="bg-gray-100">
    <div class="flex flex-col">
        <div class="min-h-screen w-1/2 m-auto py-4">
            <h4 class='pb-2'>User Name. CareStream</h4>
            <h2 class="text-xl font-bold pb-2">Scan this QR code with your authenticator app</h2>
            <p class="pb-2">Enter the 6-digit code for this account from the two-factor authentication app.</p>
            <img src="<?php echo $qrImage; ?>" alt="QR Code" class="w-1/2 pb-2 mx-auto">
            <!-- <p class="p-4">Or enter this code manually: <strong><?= htmlspecialchars($_SESSION['totp_secret']) ?></strong></p> -->
            <form id="verify-totp-code">
                <input type="text" pattern="[0-9]{6}" maxlength="6" placeholder="Enter the code here" title="Only numbers are allowed" class="input rounded-full mb-2 w-full" id="code" required>
                <button type="submit" class="btn btn-primary w-full rounded-full block">Continue</button>
            </form>
        </div>
    </div>
    <script src="/projects/carestream/public/js/app.js" defer></script>
</body>