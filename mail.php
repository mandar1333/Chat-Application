<?php
$apiKey = '33263EFACEFF99B1F9B31022CD3D00EC4C68DA151A6520DEE4B76E0D958BD0276BDF6F3C23444D8A1C84480C00DB6DCF';
$fromEmail = 'mkalangutkar13@gmail.com';
$fromName = 'Sender Name';
$toEmail = 'mandarkalangutkar2003@gmail.com';
$subject = 'Test Email';
$message = 'This is a test email sent via Elastic Email.';
// $templateId = 'YOUR_TEMPLATE_ID';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.elasticemail.com/v2/email/send');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
    'apikey' => $apiKey,
    'from' => $fromEmail,
    'fromName' => $fromName,
    'to' => $toEmail,
    'subject' => $subject,
    'bodyHtml' => $message,
    // 'template' => $templateId,
));

$response = curl_exec($ch);
curl_close($ch);

$responseData = json_decode($response, true);

if ($responseData['success']) {
    echo 'Email sent successfully!';
} else {
    echo 'Error sending email: ' . curl_error($ch);
}
