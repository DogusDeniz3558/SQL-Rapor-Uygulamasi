<?php
if (!isset($_POST['tabloGetir'])){header("location:index.php"); exit();}
require_once("baglan.php");

try {
    // Tabloları listelemek için bir SQL sorgusu hazırlayın
    $sql = "SHOW TABLES";

    // Sorguyu hazırlayın ve çalıştırın
    $stmt = $db->query($sql);

    // Tabloların listesini alın
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Her tablo için adını ve yapısını listele
    foreach ($tables as $tableName) {
        // Tablonun başlığını yazdırın
        echo "<details>";
        echo "<summary> <b>" . $tableName . "</b> Tablosu</summary>";

        // Tablonun yapısını almak için bir SQL sorgusu hazırlayın
        $structureSql = "DESCRIBE `" . $tableName . "`";

        // Sorguyu hazırlayın ve çalıştırın
        $structureStmt = $db->query($structureSql);

        // Tablonun yapısını tablo olarak yazdırın
        if ($structureStmt->rowCount() > 0) {
            echo "<table id='yapi' class='table table-bordered table-striped table-hover'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Sütun Adı</th>";
            echo "<th>Veri Tipi</th>";
            echo "<th>Null</th>";
            echo "<th>Anahtar</th>";
            echo "<th>Varsayılan</th>";
            echo "<th>Ekstra</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            // Sütunları alın
            $columns = $structureStmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($columns as $column) {
                echo "<tr>";
                echo "<td>" . $column['Field'] . "</td>";
                echo "<td>" . $column['Type'] . "</td>";
                echo "<td>" . $column['Null'] . "</td>";
                echo "<td>" . $column['Key'] . "</td>";
                echo "<td>" . $column['Default'] . "</td>";
                echo "<td>" . $column['Extra'] . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<div class='alert alert-warning' role='alert'>Tablo yapısı bulunamadı.</div>";
        }

        echo "</details>";
        echo "<br>";
    }
} catch (PDOException $e) {
    echo "Hata: " . $e->getMessage();
}

// PDO bağlantısını kapatın
$db = null;
?>
