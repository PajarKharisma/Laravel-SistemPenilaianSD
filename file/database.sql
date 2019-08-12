CREATE DATABASE db_penilaian_sd;
USE db_penilaian_sd;

CREATE TABLE guru(
    id_guru INT NOT NULL AUTO_INCREMENT,
    nip VARCHAR(30),
    nama_guru VARCHAR(30),
    PRIMARY KEY(id_guru)
)ENGINE=InnoDB;

CREATE TABLE tahun_ajaran(
    id_ta INT NOT NULL AUTO_INCREMENT,
    nama_ta VARCHAR(30),
    PRIMARY KEY(id_ta)
)ENGINE=InnoDB;

CREATE TABLE semester(
    id_semester INT NOT NULL AUTO_INCREMENT,
    nama_semester VARCHAR(30),
    PRIMARY KEY(id_semester)
)ENGINE=InnoDB;

CREATE TABLE siswa(
    id_siswa INT NOT NULL AUTO_INCREMENT,
    nis VARCHAR(30),
    nama_siswa VARCHAR(30),
    PRIMARY KEY(id_siswa)
)ENGINE=InnoDB;

CREATE TABLE mapel(
    id_mapel INT NOT NULL AUTO_INCREMENT,
    nama_mapel VARCHAR(30),
    jenis_mapel VARCHAR(30),
    PRIMARY KEY(id_mapel)
)ENGINE=InnoDB;

CREATE TABLE kelas(
    id_kelas INT NOT NULL AUTO_INCREMENT,
    nama_kelas VARCHAR(30),
    id_guru INT,
    id_ta INT,
    id_semester INT,

    PRIMARY KEY(id_kelas),

    FOREIGN KEY(id_guru)
	REFERENCES guru(id_guru)
	ON UPDATE CASCADE ON DELETE CASCADE,

    FOREIGN KEY(id_ta)
	REFERENCES tahun_ajaran(id_ta)
	ON UPDATE CASCADE ON DELETE CASCADE,

    FOREIGN KEY(id_semester)
	REFERENCES semester(id_semester)
	ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE users(
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(30),
    password VARCHAR(50),
    id_kelas INT,
    level INT,

    PRIMARY KEY(id),

    FOREIGN KEY(id_kelas)
	REFERENCES kelas(id_kelas)
	ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE siswa_kelas(
    id_sk INT NOT NULL AUTO_INCREMENT,
    id_siswa INT,
    id_kelas INT,

    PRIMARY KEY(id_sk),

    FOREIGN KEY(id_siswa)
	REFERENCES siswa(id_siswa)
	ON UPDATE CASCADE ON DELETE CASCADE,

    FOREIGN KEY(id_kelas)
	REFERENCES kelas(id_kelas)
	ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE mapel_kelas(
    id_mk INT NOT NULL AUTO_INCREMENT,
    id_mapel INT,
    id_kelas INT,

    PRIMARY KEY(id_mk),

    FOREIGN KEY(id_mapel)
	REFERENCES mapel(id_mapel)
	ON UPDATE CASCADE ON DELETE CASCADE,

    FOREIGN KEY(id_kelas)
	REFERENCES kelas(id_kelas)
	ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE nilai(
    id_np INT NOT NULL AUTO_INCREMENT,
    id_sk INT,
    id_mapel INT,
    nilai_pengatahuan INT,
    prediksi_pengetahuan VARCHAR(3),
    deskripsi_pengatahuan TEXT,
    nilai_keterampilan INT,
    prediksi_keterampilan VARCHAR(3),
    deskripsi_keterampilan TEXT,

    PRIMARY KEY(id_np),
    
    FOREIGN KEY(id_sk)
	REFERENCES siswa_kelas(id_sk)
	ON UPDATE CASCADE ON DELETE CASCADE,

    FOREIGN KEY(id_mapel)
	REFERENCES mapel(id_mapel)
	ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE nilai_sikap(
    id_ns INT NOT NULL AUTO_INCREMENT,
    id_sk INT,
    id_mapel INT,
    nilai VARCHAR(3),
    deskripsi TEXT,

    PRIMARY KEY(id_ns),
    
    FOREIGN KEY(id_sk)
	REFERENCES siswa_kelas(id_sk)
	ON UPDATE CASCADE ON DELETE CASCADE,

    FOREIGN KEY(id_mapel)
	REFERENCES mapel(id_mapel)
	ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;