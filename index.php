<?php   
declare(strict_types=1);

const API_URL = "https://whenisthenextmcufilm.com/api";

function get_data($url) {
    $result = file_get_contents($url);
    $data = json_decode($result, true);
    return $data;
}

function get_until_message($days):string
{
    return match (true){
        $days === 0 => "Hoy es el estreno!!!",
        $days === 1 => "Mañana es el estreno!!!",
        $days <7    => "Esta semana es el estreno!!!",
        $days <30   => "Este mes es el estreno!!!",
        default => " Faltan $days",
    };
};

$data = get_data(API_URL);
$untilMessage = get_until_message()
?>

<head>
    <meta charset="UTF-8" />
    <title>La próxima pelicula de Marvel</title>
    <meta name="descriptioin" content="La próxima pelicula de Marvel" />
    <meta name="viewport" content="width=device-width, initial.scake1.0" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>

<main>
    <section>
        <img src="<?= $data["poster_url"]; ?>" width= "200" alt="Poster de <?= $data["title"]; ?>" 
        style="border-radius: 16px" />
    </section>

    <hgroup>
        <h3><?= $data["title"]; ?> se estrena en - <?= $untilMessage ?> días</h3>
        <p>Fecha de estreno: <?= $data ["release_date"]; ?></p>
        <p>La siguente es: <?= $data ["following_production"]["title"]; ?></p>
 