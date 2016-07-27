<?php
require($_SERVER['DOCUMENT_ROOT'] . '/sql/db_con.php');
require($_SERVER['DOCUMENT_ROOT'] . '/account/verify.php');

if ($_SESSION['access'] !== 5) {
    header('Location: /account/');
}
session_start(); //remove this when finished
$fileType = pathinfo($_FILES["data"]["name"],PATHINFO_EXTENSION);

if ($fileType != 'csv') {
    echo 'Not a CSV file.';
    exit();
}

$targetDir = "data/";
$datetime = date('Y-m-d-H:i:s', strtotime('+1 hour'));
$targetFile = $targetDir . $datetime . '-upload.' . $fileType;
if (move_uploaded_file($_FILES["data"]["tmp_name"], $targetFile)) {
    echo 'file saved successfully<br>';
}

$csv = fopen($targetFile, 'r');
$_SESSION['import'] = array();
while(($line = fgetcsv($csv)) !== FALSE) {
    $_SESSION['import'][] = $line;
}
fclose($csv);

$query = $con->prepare("DESCRIBE `expenses2015`");
$query->execute();
$cols = $query->fetchAll(PDO::FETCH_ASSOC);


$firstLine = $_SESSION['import'][0];
?>
<p>Please map the fields:</p>
<form action="import.php" method="post">
    <?php
    foreach($firstLine as $key => $val) { ?>

        <div>
            <?php echo $val; ?>:
            <select name="field[<?php echo $key; ?>]">
                <?php
                echo '<option value="0">Ignore this field</option>';
                foreach($cols as $col) {
                    if ($col['Field'] != 'Total') {
                        echo '<option value="' . $col['Field'] . '">' . $col['Field'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>

    <?php }

    if (!empty($_POST['headers']) && $_POST['headers'] == 1) {
        unset($_SESSION['import'][0]);
        echo '<input type="hidden" name="headers" value="1">';
    }

    ?>

    <input type="submit" value="import">
</form>