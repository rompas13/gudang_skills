<?php
session_start();
include('connectdb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_video'])) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $video_url = $_POST['video_url'];
    $thumbnail = $_POST['thumbnail'];

    // Cek apakah sudah disimpan sebelumnya
    $check = mysqli_query($db, "SELECT * FROM progress WHERE user_id='$user_id' AND video_url='$video_url'");
    if (mysqli_num_rows($check) == 0) {
        mysqli_query($db, "INSERT INTO progress (user_id, video_url, thumbnail) VALUES ('$user_id', '$video_url', '$thumbnail')");
        echo "<script>alert('Video berhasil disimpan ke favorit!');</script>";
    } else {
        echo "<script>alert('Video sudah disimpan sebelumnya.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gudang Skill</title>
    <link rel="icon" type="image/png" href="assets/logo.png" />
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- FONT -->
    <!-- ICON -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- ICON -->
    <!-- CSS -->
    <link rel="stylesheet" href="css/level.css" />
    <!-- CSS -->
</head>

<body>
    <!-- HEADER -->
    <header>
        <div class="logo-container">
            <a href="#">
                <img src="assets/logo.png" width="50px" height="60px" alt="logo" />
                <h1>Gudang<span>skill</span></h1>
            </a>
        </div>
        <!-- NAVBAR -->
        <nav>
            <a href="index.php">Home</a>
            <a href="index.php#favorit">Favorit</a>
            <a href="contact.php">Contact</a>
        </nav>
        <!-- NAVBAR END -->
        <div class="login-container">
            <?php if (isset($_SESSION['email'])): ?>
                <span style="margin-right: 10px;">
                    Hi, <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : htmlspecialchars($_SESSION['email']); ?>
                </span>
                <div class="garis-vertical"></div>
                <a href="logout.php" class="btn-login">Logout</a>
            <?php else: ?>
                <a href="login.php" class="btn-login">Login</a>
                <div class="garis-vertical"></div>
                <a href="sign_up.php" class="btn-regis">Sign Up</a>
            <?php endif; ?>
        </div>
    </header>
    <!--HEADER END -->
    <!-- CONTENT MAIN -->
    <main>
        <!-- HEADLINE -->
        <section class="beranda"></section>
        <!-- HEADLINE  END-->
        <!-- KATEGORI 1 -->
        <section class="kategori-1" id="kategori-1">
            <div class="teks-kategori">Videography</div>
            <div class="container">
                <div class="image-box" id="videography-lvl-1" onclick="window.location.href='video.php'">
                    <p>Level 1</p>
                    <div class="image-description">
                    Level 1 – Memahami Gerakan Kamera Dasar
                    Pelajari dasar-dasar pergerakan kamera seperti pan, tilt, zoom, dan dolly.
                    Materi ini membantumu memahami fungsi visual dari tiap gerakan untuk menciptakan video yang lebih dinamis dan terarah.
                    </div>
                    <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video.php">
                        <input type="hidden" name="thumbnail" value="assets/video1.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
                <div class="image-box" id="videography-lvl-2" onclick="window.location.href='video_v2.php'">
                    <p>Level 2</p>
                    <div class="image-description">
                    Level 2 – Teknik Dasar Pengambilan Gambar
                    Kenali cara menyusun komposisi, mengatur fokus, dan memilih sudut pengambilan gambar.
                    Teknik ini penting untuk menghasilkan tampilan visual yang rapi dan enak dilihat.
                    </div>
                    <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_v2.php">
                        <input type="hidden" name="thumbnail" value="assets/video2.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
                <div class="image-box" id="videography-lvl-3" onclick="window.location.href='video_v3.php'">
                    <p>Level 3</p>
                    <div class="image-description">
                    Level 3 – Penguasaan Pengaturan Manual Kamera
                    Mulai kendalikan pengaturan kamera secara manual seperti ISO, aperture, dan shutter speed. 
                    Dengan penguasaan dasar ini, kamu bisa menyesuaikan hasil gambar sesuai kondisi pencahayaan.
                    </div>
                    <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_v3.php">
                        <input type="hidden" name="thumbnail" value="assets/video3.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
                <div class="image-box" id="videography-lvl-4" onclick="window.location.href='video_v4.php'">
                    <p>Level 4</p>
                    <div class="image-description">
                    Level 4 – Pengenalan Peralatan Profesional
                    Kenali alat-alat pendukung seperti rig, monitor eksternal, dan follow focus. 
                    Materi ini membantu kamu memahami bagaimana perlengkapan tambahan dapat meningkatkan kualitas produksi.
                    </div>
                    <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_v4.php">
                        <input type="hidden" name="thumbnail" value="assets/video4.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
                <div class="image-box" id="videography-lvl-5" onclick="window.location.href='video_v5.php'">
                    <p>Level 5</p>
                    <div class="image-description">
                    Level 5 – Dasar Sinematografi dan Visual Storytelling
                    Pelajari elemen visual yang mendukung cerita seperti pencahayaan, warna, dan gerakan kamera. 
                    Materi ini membentuk dasar pemahaman untuk produksi video yang lebih sinematik dan bermakna.
                    </div>
                    <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_v5.php">
                        <input type="hidden" name="thumbnail" value="assets/video5.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </section>
        <!-- KATEGORI 1 END -->
        <!-- KATEGORI 2 -->
        <section class="kategori-1" id="kategori-2">
            <div class="teks-kategori">Drum</div>
            <div class="container">
            <div class="image-box" id="drum-lvl-1" onclick="window.location.href='video_d1.php'">
                    <p>Level 1</p>
                    <div class="image-description">
                    Level 1 – Pengenalan Dasar Cara Bermain Drum
                    Pelajari bagian-bagian utama dari drum set seperti snare, kick, tom, hi-hat, dan cymbal.
                    Materi ini akan membantu kamu mengenal fungsi dasar tiap bagian sebelum mulai bermain ritme.
                    </div>
                    <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_d1.php">
                        <input type="hidden" name="thumbnail" value="assets/drum1.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
                <div class="image-box" id="drum-lvl-2" onclick="window.location.href='video_d2.php'">
                    <p>Level 2</p>
                    <div class="image-description">
                    Level 2 – Latihan Pola Tangan dan Kaki
                    Kuasai koordinasi tangan dan kaki dengan latihan pola sederhana. 
                    Di level ini, kamu akan mulai terbiasa menjaga tempo dan ritme dasar agar permainanmu stabil dan konsisten.
                    </div>
                    <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_d2.php">
                        <input type="hidden" name="thumbnail" value="assets/drum2.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
                <div class="image-box" id="drum-lvl-3" onclick="window.location.href='video_d3.php'">
                    <p>Level 3</p>
                    <div class="image-description">
                    Level 3 – Pengenalan Notasi Drum dan Groove Dasar
                    Mulai belajar membaca notasi drum dan memainkan groove sederhana.
                     Materi ini dirancang agar kamu bisa memahami struktur ritmis dalam lagu dan menerapkannya ke permainan nyata.
                    </div>
                    <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_d3.php">
                        <input type="hidden" name="thumbnail" value="assets/drum3.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
                <div class="image-box" id="drum-lvl-4" onclick="window.location.href='video_d4.php'">
                    <p>Level 4</p>
                    <div class="image-description">
                    Level 4 – Variasi Fill dan Dinamika Permainan
                    Kenali teknik fill dasar dan variasi ketukan untuk membuat permainan lebih dinamis.
                     Dengan latihan ini, kamu bisa menambahkan karakter ke dalam permainanan drum kamu.
                    </div>
                    <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_d4.php">
                        <input type="hidden" name="thumbnail" value="assets/drum4.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
                <div class="image-box" id="drum-lvl-5" onclick="window.location.href='video_d5.php'">
                    <p>Level 5</p>
                    <div class="image-description">
                    Level 5 – Teknik Kicking dasar drum
                    Pelajari teknik kicking dalam permainan drum—dari pukulan dasar pedal hingga pola cepat yang sering dipakai di musik rock dan metal. 
                    Saksikan bagaimana hentakan kaki membentuk ritme yang kuat dan stabil di balik setiap penampilan.
                    </div>
                    <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_d5.php">
                        <input type="hidden" name="thumbnail" value="assets/drum5.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </section>
        <!-- KATEGORI 2 END -->
        <!-- KATEGORI 3 -->
        <section class="kategori-1" id="kategori-3">
            <div class="teks-kategori">Gitar</div>
            <div class="container">
            <div class="image-box" id="Gitar-lvl-1" onclick="window.location.href='video_g1.php'">
                    <p>Level 1</p>
                    <div class="image-description">
                    Level 1 – Mengenal Chord Dasar Pada Gitar Akustik
                    Pelajari chord dasar pada gitar akustik agar membantu mengenali chord-chordnya. 
                    Materi ini penting agar bisa membantu awalan bermain gitar akustik.
                    </div>
                    <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_g1.php">
                        <input type="hidden" name="thumbnail" value="assets/gitar1.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
                <div class="image-box" id="Gitar-lvl-2" onclick="window.location.href='video_g2.php'">
                    <p>Level 2</p>
                    <div class="image-description">
                    Level 2 – Latihan Petikan Gitar
                    Kuasai beberapa petikan yang umum digunakan.
                    Level ini akan membantumu mulai mempelajari petikan gitar untuk mengiringi lagu-lagu sederhana. 
                    </div>
                    <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_g2.php">
                        <input type="hidden" name="thumbnail" value="assets/gitar2.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
                <div class="image-box" id="Gitar-lvl-3" onclick="window.location.href='video_g3.php'">
                    <p>Level 3</p>
                    <div class="image-description">
                    Level 3 – Improvisasi dan Teori Musik Dasar
                    Di sini kamu mulai masuk ke dunia teori musik, seperti skala mayor dan minor, progresi chord, dan interval.
                    Kamu juga akan belajar dasar-dasar improvisasi gitar, bermain lead guitar, serta membuat melodi di atas progresi chord. 
                    Cocok untuk kamu yang ingin mulai bermain solo gitar atau menciptakan gaya bermain sendiri.
                    </div>
                    <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_g3.php">
                        <input type="hidden" name="thumbnail" value="assets/gitar3.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
                <div class="image-box" id="Gitar-lvl-4" onclick="window.location.href='video_g4.php'">
                    <p>Level 4</p>
                    <div class="image-description">
                    Level 4 – Teknik Petikan dan Arpeggio Dasar
                    Kenali teknik fingerpicking dan arpeggio sederhana untuk memperkaya warna permainan gitar kamu. 
                    Di sini kamu mulai berlatih kontrol jari dan memainkan melodi dengan ritme halus.
                    </div>
                    <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_g4.php">
                        <input type="hidden" name="thumbnail" value="assets/gitar4.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
                <div class="image-box" id="Gitar-lvl-5" onclick="window.location.href='video_g5.php'">
                    <p>Level 5</p>
                    <div class="image-description">
                    Level 5 – Bermain Lagu dan Improvisasi Sederhana
                    Terapkan semua teknik dalam permainan lagu yang lengkap dan mulai berimprovisasi.
                    Level ini akan membuka kreativitas kamu untuk mengeksplorasi gaya bermain yang lebih ekspresif.
                    </div>
                    <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_g5.php">
                        <input type="hidden" name="thumbnail" value="assets/gitar5.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </section>
        <!-- KATEGORI 3 END -->
        <!-- KATEGORI 4 -->
        <section class="kategori-1" id="kategori-4">
            <div class="teks-kategori">Photography</div>
            <div class="container">
                <div class="image-box" id="photography-lvl-1" onclick="window.location.href='video_p1.php'">
                    <p>Level 1</p>
                    <div class="image-description">
                    Level 1 – Pengenalan Kamera dan Jenis-Jenisnya
                    Pelajari jenis-jenis kamera seperti DSLR, mirrorless, dan ponsel. 
                    Materi ini akan mengenalkan kamu pada fungsi dasar kamera dan cara penggunaannya dalam berbagai kondisi pemotretan.
                    </div>
                      <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_p1.php">
                        <input type="hidden" name="thumbnail" value="assets/photography-lvl-1.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
                <div class="image-box" id="photography-lvl-2" onclick="window.location.href='video_p2.php'">
                    <p>Level 2</p>
                    <div class="image-description">
                    Level 2 – Komposisi dan Framing Foto
                    Kenali prinsip dasar framing seperti rule of thirds, leading lines, dan simetri. 
                    Di sini kamu mulai belajar menyusun elemen visual agar foto terlihat menarik dan memiliki makna.
                    </div>
                      <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_p2.php">
                        <input type="hidden" name="thumbnail" value="assets/photography-lvl-2.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
                 <div class="image-box" id="photography-lvl-3" onclick="window.location.href='video_p3.php'">
                    <p>Level 3</p>
                    <div class="image-description">
                    Level 3 – Pengaturan Manual Kamera
                    Mulai kontrol exposure dengan mengatur ISO, aperture, dan shutter speed secara manual. 
                    Teknik ini penting untuk menghasilkan foto yang sesuai dengan pencahayaan dan suasana yang diinginkan.
                    </div>
                      <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_p3.php">
                        <input type="hidden" name="thumbnail" value="assets/photography-lvl-3.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
                <div class="image-box" id="photography-lvl-4" onclick="window.location.href='video_p4.php'">
                    <p>Level 4</p>
                    <div class="image-description">
                    Level 4 – Teknik Fotografi Kreatif
                    Pelajari teknik seperti long exposure, bokeh, dan panning. 
                    Level ini akan memperkaya portofolio kamu dengan foto-foto yang lebih artistik dan penuh eksperimen visual.
                    </div>
                      <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_p4.php">
                        <input type="hidden" name="thumbnail" value="assets/photography-lvl-4.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
                <div class="image-box" id="photography-lvl-5" onclick="window.location.href='video_p5.php'">
                    <p>Level 5</p>
                    <div class="image-description">
                    Level 5 – Konsep Pemotretan dan Editing Dasar
                    Rancang konsep foto dari ide hingga eksekusi dan pelajari dasar-dasar editing untuk penyempurnaan hasil akhir. 
                    Ini adalah langkah awal untuk menghasilkan karya fotografi yang utuh dan profesional.
                    </div>
                      <form method="POST" action="level.php">
                        <input type="hidden" name="video_url" value="video_p5.php">
                        <input type="hidden" name="thumbnail" value="assets/photography-lvl-5.jpg">
                        <button type="submit" name="save_video" class="btn-save" onclick="event.stopPropagation();">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </section>
        <!-- KATEGORI 4 END -->
    </main>
    <!-- CONTENT MAIN END-->
    <!-- FOOTER -->
    <footer>
        <div class="logo-container-footer">
            <a href="#header">
                <img src="assets/logo.png" width="50px" height="60px" alt="logo" />
                <h1>Gudang<span class="teks-skill">skill</span></h1>
            </a>
            <p>
                Copyright <span class="logo-copy"> &copy; </span>all rights reserved
            </p>
            <div class="logo-medsos">
                <a href="">
                    <i data-feather="facebook"></i>
                </a>
                <a href="">
                    <i data-feather="instagram"></i>
                </a>
            </div>
        </div>
        <div class="deskripsi">
            <div class="about">
                <p class="teks-about">About</p>
                <a href="index.php#header">Home</a>
                <a href="#favorit">Favorit</a>
            </div>
            <div class="contact">
                <p class="teks-contact">Contact Us</p>
                <p class="teks-email">gudangskill@gmail.com</p>
                <button onclick="location.href='contact.php'" class="btn-contact">
                    Contact Us
                </button>
            </div>
        </div>
    </footer>

    <!--FOOTER END  -->
    <!-- SCRIPT -->
    <script src="/js/video.js" />
</body>

</html>