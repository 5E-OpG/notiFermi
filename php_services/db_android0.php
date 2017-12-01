<?php

$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'android';

/*if ($db = mysqli_connect('localhost', 'root', 'root')) {

  mysqli_select_db($db, 'android');
  echo "Connessione al DB effettuata";
  mysqli_close($db);
}
else {
  echo "Connessione Fallita." . "\n";
}*/     //funzionante

$mysqli = new mysqli('localhost', 'root', 'root', 'android');
if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
}
else {
  echo "connessione al DB effettuata.\n\n";
}

/*$result = $mysqli->query('SELECT * FROM utenti', MYSQLI_USE_RESULT);

while($row = $result->fetch_assoc())

{
//printf($row['username'] . '  ', $row['password'] . '  ', $row['tipo_utente'] . '  ');

echo "\nusername: " . $row['username']."\n";
echo "\npassword: " . $row['password']."\n";                //funzionante, da usare
echo ("\ntipo utente: " . $row['tipo_utente'] ."\n");

}
//echo json_encode($result);*/

$result = [];
$stmt = $mysqli->query("SELECT * FROM utenti");

while($row = $stmt->fetch_assoc()){
    $result[] = $row;
}

echo json_encode($result);

$json = json_encode($result);

$jsonprint = file_put_contents('/home/rick/Documenti/android_api/records.json', $json);

if (!$jsonprint) {
  die("\n json file print failed!");
}
else {
  echo "\n json print successful";
}


?>
