
CREATE TABLE terminal_bus (
                id_terminal VARCHAR(10) NOT NULL,
                nama_terminal VARCHAR(10) NOT NULL,
                latitude VARCHAR(20) NOT NULL,
                longitude VARCHAR(20) NOT NULL,
                CONSTRAINT terminal_bus_pk PRIMARY KEY (id_terminal)
);


CREATE TABLE provinsi (
                id_provinsi VARCHAR(8) NOT NULL,
                nama_provinsi VARCHAR(20) NOT NULL,
                CONSTRAINT provinsi_pk PRIMARY KEY (id_provinsi)
);


CREATE TABLE kabupaten (
                id_kabupaten VARCHAR(10) NOT NULL,
                id_provinsi VARCHAR(8) NOT NULL,
                nama_kabupaten VARCHAR(20) NOT NULL,
                CONSTRAINT kabupaten_pk PRIMARY KEY (id_kabupaten)
);


CREATE TABLE kecamatan (
                id_kecamatan VARCHAR(8) NOT NULL,
                nama_kecamatan VARCHAR(50) NOT NULL,
                id_kabupaten VARCHAR(10) NOT NULL,
                CONSTRAINT kecamatan_pk PRIMARY KEY (id_kecamatan)
);


CREATE TABLE kelas_kamar (
                id_kelas INTEGER NOT NULL,
                nama_kelas VARCHAR(20) NOT NULL,
                CONSTRAINT kelas_kamar_pk PRIMARY KEY (id_kelas)
);


CREATE TABLE diskon (
                id_diskon INTEGER NOT NULL,
                kode_diskon VARCHAR(20) NOT NULL,
                tanggal_mulai DATE,
                masa_berlaku INTEGER NOT NULL,
                logic_diskon VARCHAR(100) NOT NULL,
                CONSTRAINT diskon_pk PRIMARY KEY (id_diskon)
);


CREATE TABLE negara_penerbangan (
                id_negara INTEGER NOT NULL,
                kode_negara VARCHAR(8) NOT NULL,
                CONSTRAINT negara_penerbangan_pk PRIMARY KEY (id_negara)
);


CREATE TABLE bandara_tujuan (
                id_bandara_tujuan VARCHAR(8) NOT NULL,
                nama_bandara VARCHAR(20) NOT NULL,
                id_negara INTEGER NOT NULL,
                CONSTRAINT bandara_tujuan_pk PRIMARY KEY (id_bandara_tujuan)
);


CREATE TABLE bandara_asal (
                id_bandara_asal VARCHAR(8) NOT NULL,
                id_negara INTEGER NOT NULL,
                nama_bandara VARCHAR(20) NOT NULL,
                latitude VARCHAR(20) NOT NULL,
                longitude VARCHAR(20) NOT NULL,
                CONSTRAINT bandara_asal_pk PRIMARY KEY (id_bandara_asal)
);


CREATE TABLE user (
                username VARCHAR(8) NOT NULL,
                password VARCHAR(16) NOT NULL,
                nama VARCHAR(16) NOT NULL,
                jenis_kelamin VARCHAR(10) NOT NULL,
                NIK VARCHAR(16) NOT NULL,
                email VARCHAR(20) NOT NULL,
                no_telepon VARCHAR(16) NOT NULL,
                alamat VARCHAR(50) NOT NULL,
                foto VARCHAR(50) NOT NULL,
                pekerjaan VARCHAR(50) NOT NULL,
                id_kecamatan VARCHAR(8) NOT NULL,
                CONSTRAINT user_pk PRIMARY KEY (username)
);


CREATE TABLE perusahaan_bus (
                id_perusahaan INTEGER NOT NULL,
                username VARCHAR(8) NOT NULL,
                nama_perusahaan VARCHAR(20) NOT NULL,
                alamat_perusahaan VARCHAR(20) NOT NULL,
                id_kecamatan VARCHAR(8) NOT NULL,
                nomor_telepon VARCHAR(20) NOT NULL,
                CONSTRAINT perusahaan_bus_pk PRIMARY KEY (id_perusahaan)
);


CREATE TABLE armada_bus (
                id_armada INTEGER NOT NULL,
                nama_armada VARCHAR(50) NOT NULL,
                id_perusahaan INTEGER NOT NULL,
                CONSTRAINT armada_bus_pk PRIMARY KEY (id_armada)
);


CREATE TABLE rute_bus (
                id_rute_bus INTEGER NOT NULL,
                id_armada INTEGER NOT NULL,
                id_terminal VARCHAR(10) NOT NULL,
                terminal_bus_id_terminal VARCHAR(10) NOT NULL,
                harga VARCHAR(20) NOT NULL,
                waktu_berangkat DATE,
                waktu_sampai DATE,
                CONSTRAINT rute_bus_pk PRIMARY KEY (id_rute_bus)
);


CREATE TABLE transaksi_bus (
                id_transaksi VARCHAR(10) NOT NULL,
                username VARCHAR(8) NOT NULL,
                status_transaksi VARCHAR(10) NOT NULL,
                status_pembayaran VARCHAR(10) NOT NULL,
                status_bus VARCHAR(20) NOT NULL,
                id_rute_bus INTEGER NOT NULL,
                CONSTRAINT transaksi_bus_pk PRIMARY KEY (id_transaksi)
);


CREATE TABLE informasi_hotel (
                id_hotel VARCHAR(8) NOT NULL,
                username VARCHAR(8) NOT NULL,
                nama_hotel VARCHAR(100) NOT NULL,
                alamat_hotel VARCHAR(100) NOT NULL,
                nomor_telepon VARCHAR(15) NOT NULL,
                informasi VARCHAR(255) NOT NULL,
                latitude VARCHAR(20) NOT NULL,
                longitude VARCHAR(20) NOT NULL,
                id_kecamatan VARCHAR(8) NOT NULL,
                CONSTRAINT informasi_hotel_pk PRIMARY KEY (id_hotel)
);


CREATE TABLE kamar_hotel (
                id_hotel VARCHAR(8) NOT NULL,
                id_kamar VARCHAR(10) NOT NULL,
                id_kelas INTEGER NOT NULL,
                harga VARCHAR(20) NOT NULL,
                CONSTRAINT kamar_hotel_pk PRIMARY KEY (id_hotel, id_kamar)
);


CREATE TABLE transaksi_hotel (
                id_transaksi_hotel VARCHAR(50) NOT NULL,
                id_kamar VARCHAR(10) NOT NULL,
                id_hotel VARCHAR(8) NOT NULL,
                check_in DATE,
                check_out DATE,
                username VARCHAR(8) NOT NULL,
                status_pembayaran VARCHAR(10) NOT NULL,
                CONSTRAINT transaksi_hotel_pk PRIMARY KEY (id_transaksi_hotel, id_kamar, id_hotel)
);


CREATE TABLE diskon_user (
                id_diskon INTEGER NOT NULL,
                username VARCHAR(8) NOT NULL,
                CONSTRAINT diskon_user_pk PRIMARY KEY (id_diskon, username)
);


CREATE TABLE maskapai (
                id_maskapai VARCHAR(5) NOT NULL,
                username VARCHAR(8) NOT NULL,
                nama_maskapai VARCHAR(16) NOT NULL,
                alamat_kantor VARCHAR(16) NOT NULL,
                CONSTRAINT maskapai_pk PRIMARY KEY (id_maskapai)
);


CREATE TABLE diskon_maskapai (
                id_diskon INTEGER NOT NULL,
                id_maskapai VARCHAR(5) NOT NULL,
                CONSTRAINT diskon_maskapai_pk PRIMARY KEY (id_diskon, id_maskapai)
);


CREATE TABLE pesawat (
                kode_pesawat VARCHAR(10) NOT NULL,
                id_maskapai VARCHAR(5) NOT NULL,
                kapasitas INTEGER NOT NULL,
                CONSTRAINT pesawat_pk PRIMARY KEY (kode_pesawat)
);


CREATE TABLE diskon_pesawat (
                id_diskon INTEGER NOT NULL,
                kode_pesawat VARCHAR(10) NOT NULL,
                CONSTRAINT diskon_pesawat_pk PRIMARY KEY (id_diskon, kode_pesawat)
);


CREATE TABLE list_penerbangan (
                id_list_penerbangan INTEGER NOT NULL,
                kode_pesawat VARCHAR(10) NOT NULL,
                id_bandara_asal VARCHAR(8) NOT NULL,
                id_bandara_tujuan VARCHAR(8) NOT NULL,
                waktu_take_off DATE,
                waktu_landing DATE,
                harga VARCHAR(20) NOT NULL,
                CONSTRAINT list_penerbangan_pk PRIMARY KEY (id_list_penerbangan)
);


CREATE TABLE transaksi (
                id_transaksi VARCHAR(20) NOT NULL,
                id_list_penerbangan INTEGER NOT NULL,
                tgl_transaksi DATE,
                status_transaksi VARCHAR(10) NOT NULL,
                username VARCHAR(8) NOT NULL,
                status_pembayaran VARCHAR(10) NOT NULL,
                tagihan VARCHAR(20) NOT NULL,
                CONSTRAINT transaksi_pk PRIMARY KEY (id_transaksi)
);


ALTER TABLE rute_bus ADD CONSTRAINT terminal_bus_rute_bus_fk
FOREIGN KEY (id_terminal)
REFERENCES terminal_bus (id_terminal)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE rute_bus ADD CONSTRAINT terminal_bus_rute_bus_fk1
FOREIGN KEY (terminal_bus_id_terminal)
REFERENCES terminal_bus (id_terminal)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE kabupaten ADD CONSTRAINT provinsi_kabupaten_fk
FOREIGN KEY (id_provinsi)
REFERENCES provinsi (id_provinsi)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE kecamatan ADD CONSTRAINT kabupaten_kecamatan_fk
FOREIGN KEY (id_kabupaten)
REFERENCES kabupaten (id_kabupaten)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE user ADD CONSTRAINT kecamatan_user_fk
FOREIGN KEY (id_kecamatan)
REFERENCES kecamatan (id_kecamatan)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE informasi_hotel ADD CONSTRAINT kecamatan_informasi_hotel_fk
FOREIGN KEY (id_kecamatan)
REFERENCES kecamatan (id_kecamatan)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE perusahaan_bus ADD CONSTRAINT kecamatan_perusahaan_bus_fk
FOREIGN KEY (id_kecamatan)
REFERENCES kecamatan (id_kecamatan)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE kamar_hotel ADD CONSTRAINT kelas_kamar_kamar_hotel_fk
FOREIGN KEY (id_kelas)
REFERENCES kelas_kamar (id_kelas)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE diskon_user ADD CONSTRAINT diskon_diskon_user_fk
FOREIGN KEY (id_diskon)
REFERENCES diskon (id_diskon)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE diskon_maskapai ADD CONSTRAINT diskon_diskon_maskapai_fk
FOREIGN KEY (id_diskon)
REFERENCES diskon (id_diskon)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE diskon_pesawat ADD CONSTRAINT diskon_diskon_pesawat_fk
FOREIGN KEY (id_diskon)
REFERENCES diskon (id_diskon)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE bandara_asal ADD CONSTRAINT negara_bandara_fk
FOREIGN KEY (id_negara)
REFERENCES negara_penerbangan (id_negara)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE bandara_tujuan ADD CONSTRAINT negara_bandara_tujuan_fk
FOREIGN KEY (id_negara)
REFERENCES negara_penerbangan (id_negara)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE list_penerbangan ADD CONSTRAINT bandara_tujuan_list_penerbangan_fk
FOREIGN KEY (id_bandara_tujuan)
REFERENCES bandara_tujuan (id_bandara_tujuan)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE list_penerbangan ADD CONSTRAINT bandara_asal_list_penerbangan_fk
FOREIGN KEY (id_bandara_asal)
REFERENCES bandara_asal (id_bandara_asal)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE maskapai ADD CONSTRAINT user_maskapai_fk
FOREIGN KEY (username)
REFERENCES user (username)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE transaksi ADD CONSTRAINT user_transaksi_fk
FOREIGN KEY (username)
REFERENCES user (username)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE diskon_user ADD CONSTRAINT user_diskon_user_fk
FOREIGN KEY (username)
REFERENCES user (username)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE informasi_hotel ADD CONSTRAINT user_informasi_hotel_fk
FOREIGN KEY (username)
REFERENCES user (username)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE transaksi_hotel ADD CONSTRAINT user_transaksi_hotel_fk
FOREIGN KEY (username)
REFERENCES user (username)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE perusahaan_bus ADD CONSTRAINT user_perusahaan_bus_fk
FOREIGN KEY (username)
REFERENCES user (username)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE transaksi_bus ADD CONSTRAINT user_transaksi_bus_fk
FOREIGN KEY (username)
REFERENCES user (username)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE armada_bus ADD CONSTRAINT perusahaan_bus_armada_bus_fk
FOREIGN KEY (id_perusahaan)
REFERENCES perusahaan_bus (id_perusahaan)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE rute_bus ADD CONSTRAINT armada_bus_rute_bus_fk
FOREIGN KEY (id_armada)
REFERENCES armada_bus (id_armada)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE transaksi_bus ADD CONSTRAINT rute_bus_transaksi_bus_fk
FOREIGN KEY (id_rute_bus)
REFERENCES rute_bus (id_rute_bus)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE kamar_hotel ADD CONSTRAINT informasi_hotel_kamar_hotel_fk
FOREIGN KEY (id_hotel)
REFERENCES informasi_hotel (id_hotel)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE transaksi_hotel ADD CONSTRAINT kamar_hotel_transaksi_hotel_fk
FOREIGN KEY (id_hotel, id_kamar)
REFERENCES kamar_hotel (id_hotel, id_kamar)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE pesawat ADD CONSTRAINT maskapai_pesawat_fk
FOREIGN KEY (id_maskapai)
REFERENCES maskapai (id_maskapai)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE diskon_maskapai ADD CONSTRAINT maskapai_diskon_maskapai_fk
FOREIGN KEY (id_maskapai)
REFERENCES maskapai (id_maskapai)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE list_penerbangan ADD CONSTRAINT pesawat_list_penerbangan_fk
FOREIGN KEY (kode_pesawat)
REFERENCES pesawat (kode_pesawat)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE diskon_pesawat ADD CONSTRAINT pesawat_diskon_pesawat_fk
FOREIGN KEY (kode_pesawat)
REFERENCES pesawat (kode_pesawat)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;

ALTER TABLE transaksi ADD CONSTRAINT list_penerbangan_transaksi_fk
FOREIGN KEY (id_list_penerbangan)
REFERENCES list_penerbangan (id_list_penerbangan)
ON DELETE NO ACTION
ON UPDATE NO ACTION
;