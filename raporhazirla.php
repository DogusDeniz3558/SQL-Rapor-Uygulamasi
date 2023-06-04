<?php
if (isset($_POST['sorgu'])) {
    require_once("baglan.php");
    // SQL sorgusu için kullanıcıdan gelen veriyi al
    $sql = $_POST['sorgu'];


    if (stripos($sql, 'DROP DATABASE') !== false) {
        echo '<div class="alert alert-danger mt-5">DROP DATABASE işlemi yapamazsın!</div>';
        $sql = "";
    } else {

        // PDO prepared ifadesi oluştur
        $islem = $db->prepare($sql);

        // SQL sorgusunu çalıştır
        try {
            $islem->execute();
            $rowCount = $islem->rowCount();

            // Silme, ekleme, güncelleme sorgusu ise işlem tamamlandı mesajı ver
            if (stripos($sql, 'DELETE') !== false || stripos($sql, 'INSERT') !== false || stripos($sql, 'UPDATE') !== false) {

                echo '<div class="alert alert-success mt-5">İşlem Tamamlandı <br> Toplam Değiştirilen Kayıt Sayısı: ' . $rowCount . '</div>';
            } elseif (stripos($sql, 'CREATE TABLE') !== false) {
                echo '<div class="alert alert-success mt-5">Yeni bir Tablo oluşturuldu!</div>';
            } elseif (stripos($sql, 'DELETE TABLE') !== false) {
                echo '<div class="alert alert-success mt-5">Yeni bir Tablo oluşturuldu!</div>';
            } elseif (stripos($sql, 'ALTER TABLE') !== false) {
                echo '<div class="alert alert-success mt-5">Sütun Güncellendi!</div>';
            } elseif (stripos($sql, 'DROP TABLE') !== false) {
                echo '<div class="alert alert-success mt-5">Tablo silindi!</div>';
            } else {
                // Listeleme sorgusu ise sonuçları tablo olarak göster
                $sonuc = $islem->fetchAll(PDO::FETCH_ASSOC);
                if ($sonuc) {
                    echo "<span><b>Kayıt Sayısı: </b>" . $rowCount . " Adet</span>";
                    echo '<table id="yapi" class="table mt-3 table-bordered table-striped table-hover">';
                    echo '<thead>';
                    echo '<tr>';
                    foreach ($sonuc[0] as $key => $value) {
                        echo '<th>' . $key . '</th>';
                    }
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    foreach ($sonuc as $row) {
                        echo '<tr>';
                        foreach ($row as $value) {
                            echo '<td>' . $value . '</td>';
                        }
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo '<div class="alert alert-warning mt-3">Sorgunuzun sonucunda kayıt bulunamadı!</div>';
                }
            }
        } catch (PDOException $e) {
            // Hata durumunda tüm detayları ekrana bastır
            echo '<div class="alert alert-danger mt-3">Sorgunuzda Hata Var: ' . $e->getMessage() . '</div>';
        }
    }
} else {
    header("location:index.php");
    exit();
}
?>
