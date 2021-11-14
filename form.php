<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $uploadDir = '';
    $uploadFile = $uploadDir . basename($_FILES['homer']['name']);
    $extension = pathinfo($_FILES['homer']['name'], PATHINFO_EXTENSION);
    $authorizedExtensions = ['jpg', 'jpeg', 'png'];
    $maxFileSize = 1500000;
    $errors = [];

    if (file_exists($_FILES['homer']['tmp_name']) && filesize($_FILES['homer']['tmp_name']) > $maxFileSize) {
        $errors[] = "Votre fichier doit faire moins de 1.5Mo !";
    }
    if ((!in_array($extension, $authorizedExtensions))) {
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png !';
    }

    $uniqFile = uniqid('', true);
    $file = $uniqFile . "." . $extension;

    move_uploaded_file($_FILES['homer']['tmp_name'], '' . $file);
    if (empty($errors)) {
        echo "<img src=public/uploads/'" . $file . "'/>";
    } else {
        foreach ($errors as $error);
        echo $error . "\r\n";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <label for="imageUpload">Upload an profile image</label>
        <input type="file" name="avatar" id="imageUpload" />
        <button name="send">Send</button>
    </form>
    <main>
        <h1>SPRINGFIELD, IL</h1>
        <h3>LICENCE#64209</h3>
        <h3>BIRTH DATE 4-24-56</h3>
        <h3>EXPIRES 4-24-2015</h3>
        <h3>CLASS NONE</h3>
        <img src="O1aPCGYwCHwheNxLMcPJOrymfxzNG8U9.jpg" alt="ID_photo">
        <h2>HOMER SIMPSON</h2>
        <address>
            <h2>69 OLD PLUMTREE BLVD</h2>
            <h2>SPRINGFIELD, IL 62701</h2>
        </address>
        <h3>SEX OK</h3>
        <h3>HEIGHT MEDIUM</h3>
        <h3>WEIGHT 239</h3>
        <h3>HAIR NONE</h3>
        <h3>EYES OVAL</h3>
        <signature>
            <h2>HOMER SIMPSON</h2>
        </signature>
    </main>
</body>

</html>