<!--
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Test') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <pre>{{ dd(auth()->user()->role) }}</pre>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
-->

<?php

function checkDomain($domain) {
    $domain = strtolower(trim($domain));
    if (gethostbyname($domain) != $domain) {
        return false;
    }
    return true;
}

function checkSocialMedia($username, $platform) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    
    switch ($platform) {
        case 'instagram':
            curl_setopt($ch, CURLOPT_URL, "https://www.instagram.com/$username/");
            break;
        case 'twitter':
            curl_setopt($ch, CURLOPT_URL, "https://twitter.com/$username");
            break;
        case 'tiktok':
            curl_setopt($ch, CURLOPT_URL, "https://www.tiktok.com/@$username");
            break;
    }
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    return $httpCode == 404;
}

function getAvailabilityEmoji($isAvailable) {
    return $isAvailable ? "✅" : "❌";
}

$inputFile = 'names.csv';
$names = array_map('str_getcsv', file($inputFile));
echo "Output:<br>";
echo "<table border='1'>";
echo "<tr><th>Name</th><th>Domain</th><th>Instagram</th><th>Twitter</th><th>TikTok</th></tr>";

foreach ($names as $name) {
    $domainName = $name[0] . ".com";
    $username = strtolower(str_replace(' ', '', $name[0]));
    
    $domainAvailable = checkDomain($domainName);
    $instagramAvailable = checkSocialMedia($username, 'instagram');
    $twitterAvailable = checkSocialMedia($username, 'twitter');
    $tiktokAvailable = checkSocialMedia($username, 'tiktok');
    
    echo "<tr>";
    echo "<td>{$name[0]}</td>";
    echo "<td>" . getAvailabilityEmoji($domainAvailable) . "</td>";
    echo "<td>" . getAvailabilityEmoji($instagramAvailable) . "</td>";
    echo "<td>" . getAvailabilityEmoji($twitterAvailable) . "</td>";
    echo "<td>" . getAvailabilityEmoji($tiktokAvailable) . "</td>";
    echo "</tr>";
}

echo "</table>";