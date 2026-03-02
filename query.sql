CREATE DATABASE db_kampus;
USE db_kampus;

CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    nim VARCHAR(20),
    jurusan VARCHAR(50),
    nilai_akhir INT
);

INSERT INTO mahasiswa (nama, nim, jurusan, nilai_akhir) VALUES
('Andi', '22001', 'Informatika', 80),
('Budi', '22002', 'Sistem Informasi', 70),
('Citra', '22003', 'Informatika', 90),
('Dina', '22004', 'Manajemen', 60),
('Eko', '22005', 'Akuntansi', 75);