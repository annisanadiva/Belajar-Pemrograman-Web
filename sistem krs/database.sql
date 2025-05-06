CREATE DATABASE kuliah;
USE kuliah;

-- Tabel Mahasiswa
CREATE TABLE mahasiswa (
    npm CHAR(13) PRIMARY KEY,
    nama VARCHAR(50),
    jurusan ENUM('Teknik Informatika', 'Sistem Operasi'),
    alamat TEXT
);

-- Tabel Matakuliah
CREATE TABLE matakuliah (
    kodemk CHAR(6) PRIMARY KEY,
    nama VARCHAR(50),
    jumlah_sks INT(3)
);

-- Tabel KRS
CREATE TABLE krs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mahasiswa_npm CHAR(13),
    matakuliah_kodemk CHAR(6),
    FOREIGN KEY (mahasiswa_npm) REFERENCES mahasiswa(npm),
    FOREIGN KEY (matakuliah_kodemk) REFERENCES matakuliah(kodemk)
);

-- Data mahasiswa
INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES
('10118001', 'Siska Putri', 'informatika', 'Jl. Mawar No.1'),
('10118002', 'Ujang Aziz', 'informatika', 'Jl. Flamboyan No.2'),
('10118003', 'Veronica Setyano', 'sistem informasi', 'Jl. Iris No.3'),
('10118004', 'Rizka Nurmala Putri', 'informatika', 'Jl. Tulip No.4'),
('10118005', 'Eren Putra', 'sistem informasi', 'Jl. Anggrek No.5'),
('10118006', 'Putra Abdul Rachman', 'informatika', 'Jl. Kamelia No.6'),
('10118007', 'Rahmat Andriyadi', 'sistem informasi', 'Jl. Lili No.7'),
('10118008', 'Ayu Puspita Sari', 'informatika', 'Jl. Amarilis No.8'),
('10118009', 'Putri Ayuni', 'sistem informasi', 'Jl. Kenanga No.9'),
('10118010', 'Andri Muhammad', 'informatika', 'Jl. Melati No.10');

-- Data mata kuliah
INSERT INTO matakuliah (kodemk, nama, jumlah_sks) VALUES
('MK001', 'Basis Data', 3),
('MK002', 'Pemrograman Berbasis Web', 3),
('MK003', 'Algoritma dan Struktur Data', 3),
('MK004', 'Kajian Jurnal Informatika', 2);

-- Data KRS sesuai contoh
INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES
('10118001', 'MK001'),  -- Siska Putri - Basis Data
('10118002', 'MK002'),  -- Ujang Aziz - Pemrograman Berbasis Web
('10118003', 'MK001'),  -- Veronica Setyano - Basis Data
('10118004', 'MK003'),  -- Rizka Nurmala Putri - Algoritma dan Struktur Data
('10118005', 'MK004'),  -- Eren Putra - Kajian Jurnal Informatika
('10118006', 'MK001'),  -- Putra Abdul Rachman - Basis Data
('10118007', 'MK001'),  -- Rahmat Andriyadi - Basis Data
('10118008', 'MK002'),  -- Ayu Puspita Sari - Pemrograman Berbasis Web
('10118009', 'MK002'),  -- Putri Ayuni - Pemrograman Berbasis Web
('10118010', 'MK003');  -- Andri Muhammad - Algoritma dan Struktur Data