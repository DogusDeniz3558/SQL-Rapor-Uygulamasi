# SQL-Rapor-Uygulamasi
Bu proje, SQL veritabanlarından veri çekmek ve bu verileri raporlamak için kullanılan bir uygulamadır.
# Başlangıç
Bu talimatlar, projeyi yerel bir makinada çalıştırmak ve geliştirmek için size yol gösterecektir.
# Önkoşullar
Projenin çalışması için aşağıdaki yazılımların kurulu olması gerekmektedir:
+ Web sunucusu (örneğin, Apache)
+ PHP (7.x veya daha yeni sürüm)
+ MySQL veya başka bir SQL veritabanı sistemi
# Kurulum
1. Projeyi GitHub üzerinden klonlayın veya ZIP olarak indirin.
```
git clone https://github.com/DogusDeniz3558/SQL-Rapor-Uygulamasi.git
```
 2. İndirilen dosyaları web sunucusunun çalışma dizinine taşıyın.
 3. MySQL veya başka bir SQL veritabanı sistemi üzerinde bir veritabanı oluşturun.
 4. baglan.php dosyasını düzenleyin ve veritabanı bağlantı ayarlarınızı yapın. (tumtablo.php dosyası içerisinde de aynı yapılandırmayı uygulamalısın)
 ```
 try {
    $db = new PDO("mysql:host=localhost;dbname=test", "root", "");
} catch ( PDOException $e ){
    print $e->getMessage();
}
 ```
 5. Tarayıcınızda uygulamayı çalıştırmak için web sunucusunun adresini ziyaret edin.

# Kullanım
Bu uygulama, SQL sorgularını çalıştırmanıza ve sonuçları raporlamak için kullanılır. Aşağıda temel kullanım adımları verilmiştir:

1. Ana sayfada SQL sorgusu giriş kutusunu kullanarak sorgunuzu girin.
2. "Sorguyu Çalıştır" düğmesine tıklayın.
3. Sonuçlar, tablo formatında altında görüntülenecektir.

# Katkıda Bulunma
Eğer projeye katkıda bulunmak isterseniz, aşağıdaki adımları takip edebilirsiniz:
1. Bu depoyu (https://github.com/DogusDeniz3558/SQL-Rapor-Uygulamasi.git) fork edin.
2. Kendi lokal projenize fork ettiğiniz depoyu klonlayın.
```
git clone https://github.com/SizinKullaniciAdiniz/SQL-Rapor-Uygulamasi.git
```
3. Değişikliklerinizi yapın ve commit'leyin.
```
git commit -m "Yapılan değişikliklerin açıklaması"
```
4. Değişikliklerinizi kendi depoğunuza push edin.
```
git push origin master
```
5. GitHub üzerinden "Pull Request" açın.
# Lisans
Bu proje MIT Lisansı ile lisanslanmıştır. Daha fazla bilgi için LICENSE dosyasını inceleyin.

# İletişim
Eğer projenin herhangi bir konusu hakkında sorunuz varsa, lütfen e-posta adresimden benimle iletişime geçin: dogusdeniz.3558@gmail.com

Teşekkürler
