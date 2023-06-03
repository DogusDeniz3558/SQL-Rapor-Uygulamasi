<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SQL - Rapor Uygulaması</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="jquery-3.7.0.min.js"></script>
    <style>
        #calistir span {
            width: 30px;

        }

        #yapi th {
            background-color: #0c5460;
            color: #fff;
        }

        #info2 {
            display: none;
            width: 65%;
            padding: 20px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-left: 1.5%;
            margin-bottom: 25px;
        }

        #info2 h6 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        #info2 ul {
            list-style-type: none;
            padding: 0;
        }

        #info2 li {
            margin-bottom: 10px;
        }

        #info2 li::marker {
            content: "✓ ";
            color: #0e6fc9;
        }

        details {
            border: 1px solid #aaa;
            border-radius: 4px;
            padding: 0.5em;
            width: 73.2%;
            margin-left: 1%;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }

        details summary {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            cursor: pointer;
        }

        details summary::marker {
            content: "⨭ ";
            margin-right: 5px;
        }

        details[open] summary::marker {
            content: "⨴ ";
        }

        details p {
            margin-top: 0.5em;
        }


    </style>
</head>
<body class="container mt-5">

<div class="row">
    <h5>Rapor Hazırla</h5><br><br>
    <i title="Örnek SQL Sorguları" id="info" class="fa-sharp fa-solid fa-circle-info"></i><br>

    <div id="info2">
        <ul>
            <h6>Örnek SQL Sorguları</h6>
            <li>Select : SELECT * FROM uyeler WHERE age > 25</li>
            <li>Update : Update uyeler SET name = "Ahmett", surname="Karaa", age="455", gender = "Erkekk" Where id= 2
            </li>
            <li>Insert : INSERT INTO uyeler (name, surname, age, gender) VALUES ('Meral', 'Değerli', 18, 'Kadın');</li>
            <li>Delete : DELETE FROMuyeler WHERE id = 2</li>
            <li>Tablo Oluşturma :
                CREATE TABLE Kisiler (
                id int AUTO_INCREMENT,
                Soyad varchar(255),
                Ad varchar(255),
                Adres varchar(255),
                Sehir varchar(255),
                PRIMARY KEY (id)
                );</li>
            <li>Tablo Silme : Drop Table Kisiler</li>
            <li>Tabloya Sütun Ekleme : ALTER TABLE uyeler ADD city varchar(50)</li>
            <li>Tablodan Sütun Silme : Alter Table uyeler DROP COLUMN city </li>
        </ul>
    </div>

    <div class="col-md-9">
        <span class="form-floating">
            <textarea class="form-control" id="sorgu">SELECT * FROM uyeler</textarea>
            <label for="floatingInputValue">SQL Kodunu Oluştur</label>
        </span>
    </div>
    <div class="col-md-3">
        <button id="calistir" class="btn btn-sm btn-success"><span class="fa fa-play"></span></button>
    </div>

    <div class="mt-4">
        <button id="vtTabloGetir" class="btn btn-sm btn-dark">"Test" Veri Tabanı Tabloları Getir</button>
        <div id="sonuc1" style="display: none;" class="mt-3"></div>
    </div>

    <hr class="mt-5">

    <div id="sonuc"></div>


</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#info').on('click', function() {
            $("#info2").slideToggle("slow");
        });

        $('#vtTabloGetir').on('click', function () {
            var sonuc1 = $('#sonuc1');

            $.ajax({
                type: "POST",
                url: "tumtablo.php",
                data: {
                    "tabloGetir": "tabloGetir"
                },
                success: function (res) {
                    if (!sonuc1.is(':visible')) {
                        sonuc1.hide().html(res).slideDown("slow");
                    } else {
                        sonuc1.slideUp("slow");
                    }
                }
            });
        });

        $('#calistir').on('click', function () {
            var sorgu = $('#sorgu').val();
            $.ajax({
                type: "POST",
                url: "raporhazirla.php",
                data: {
                    "sorgu": sorgu
                },
                success: function (response) {
                    $('#sonuc').hide().html(response).slideDown("slow");
                },
                error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Bağlantı Yok.\n İnternetinizi Kontrol Edin';
                    } else if (jqXHR.status == 404) {
                        msg = 'İstek atılan sayfa bulunamadı. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'İç Sunucu Hatası [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'İstenen JSON ayrıştırması başarısız oldu.';
                    } else if (exception === 'timeout') {
                        msg = 'Zaman Aşımı hatası.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax isteği iptal edildi.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    alert(msg);
                }
            });
        });
    });
</script>
</body>
</html>