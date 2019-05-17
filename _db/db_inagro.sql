/*
Navicat MySQL Data Transfer

Source Server         : Mysql Local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_inagro

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-05-16 19:43:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for log_absensi
-- ----------------------------
DROP TABLE IF EXISTS `log_absensi`;
CREATE TABLE `log_absensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mesin` varchar(11) DEFAULT NULL,
  `tgl_jam` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_absensi
-- ----------------------------
INSERT INTO `log_absensi` VALUES ('1', '758', '2019-05-16 00:00:00');

-- ----------------------------
-- Table structure for master_karyawan
-- ----------------------------
DROP TABLE IF EXISTS `master_karyawan`;
CREATE TABLE `master_karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mesin` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_karyawan
-- ----------------------------
INSERT INTO `master_karyawan` VALUES ('1', '1', 'ASEP');
INSERT INTO `master_karyawan` VALUES ('2', '2', 'ILHAM');
INSERT INTO `master_karyawan` VALUES ('3', '3', 'SENAN');
INSERT INTO `master_karyawan` VALUES ('4', '4', 'NURIA HASANAH');
INSERT INTO `master_karyawan` VALUES ('5', '5', 'JAJANG');
INSERT INTO `master_karyawan` VALUES ('6', '6', 'HAMDI');
INSERT INTO `master_karyawan` VALUES ('7', '7', 'FAHRUL');
INSERT INTO `master_karyawan` VALUES ('8', '8', 'IPANG');
INSERT INTO `master_karyawan` VALUES ('9', '9', 'JUWANDA');
INSERT INTO `master_karyawan` VALUES ('10', '10', 'DEDIH DEBLO');
INSERT INTO `master_karyawan` VALUES ('11', '11', 'NANDAR');
INSERT INTO `master_karyawan` VALUES ('12', '12', 'MAD UJAR');
INSERT INTO `master_karyawan` VALUES ('13', '13', 'SARMAT');
INSERT INTO `master_karyawan` VALUES ('14', '14', 'SOMA');
INSERT INTO `master_karyawan` VALUES ('15', '15', 'UMAR JAYA');
INSERT INTO `master_karyawan` VALUES ('16', '16', 'DEDIH O.');
INSERT INTO `master_karyawan` VALUES ('17', '17', 'EGI');
INSERT INTO `master_karyawan` VALUES ('18', '18', 'TEGUH');
INSERT INTO `master_karyawan` VALUES ('19', '19', 'JUMRI');
INSERT INTO `master_karyawan` VALUES ('20', '20', 'BUBUN');
INSERT INTO `master_karyawan` VALUES ('21', '21', 'SANUDIN');
INSERT INTO `master_karyawan` VALUES ('22', '22', 'BASIR');
INSERT INTO `master_karyawan` VALUES ('23', '23', 'SODIK');
INSERT INTO `master_karyawan` VALUES ('24', '24', 'UCA');
INSERT INTO `master_karyawan` VALUES ('25', '25', 'RIAN');
INSERT INTO `master_karyawan` VALUES ('26', '26', 'KOHAR');
INSERT INTO `master_karyawan` VALUES ('27', '27', 'FAHRI');
INSERT INTO `master_karyawan` VALUES ('28', '28', 'ABDULLAH');
INSERT INTO `master_karyawan` VALUES ('29', '29', 'SUPRIATNA');
INSERT INTO `master_karyawan` VALUES ('30', '30', 'ATOK URASID');
INSERT INTO `master_karyawan` VALUES ('31', '31', 'NURIN');
INSERT INTO `master_karyawan` VALUES ('32', '32', 'FATIMAH');
INSERT INTO `master_karyawan` VALUES ('33', '33', 'AGUNG');
INSERT INTO `master_karyawan` VALUES ('34', '34', 'ELIS');
INSERT INTO `master_karyawan` VALUES ('35', '35', 'DEDI');
INSERT INTO `master_karyawan` VALUES ('36', '36', 'DENI');
INSERT INTO `master_karyawan` VALUES ('37', '37', 'MARIA IMELDA');
INSERT INTO `master_karyawan` VALUES ('38', '38', 'LANI HARDIANY');
INSERT INTO `master_karyawan` VALUES ('39', '39', 'ABEL');
INSERT INTO `master_karyawan` VALUES ('40', '40', 'EKI');
INSERT INTO `master_karyawan` VALUES ('41', '41', 'INDRI');
INSERT INTO `master_karyawan` VALUES ('42', '42', 'DESI');
INSERT INTO `master_karyawan` VALUES ('43', '43', 'RITA');
INSERT INTO `master_karyawan` VALUES ('44', '44', 'WAWAN NURSIDIK');
INSERT INTO `master_karyawan` VALUES ('45', '45', 'EDI SUSANTO');
INSERT INTO `master_karyawan` VALUES ('46', '46', 'HAFIDIN');
INSERT INTO `master_karyawan` VALUES ('47', '47', 'VALENSYA S.M.');
INSERT INTO `master_karyawan` VALUES ('48', '48', 'FITRI SULASTRI');
INSERT INTO `master_karyawan` VALUES ('49', '49', 'ATEK');
INSERT INTO `master_karyawan` VALUES ('50', '50', 'WELI');
INSERT INTO `master_karyawan` VALUES ('51', '51', 'BERRI');
INSERT INTO `master_karyawan` VALUES ('52', '52', 'SOLEH');
INSERT INTO `master_karyawan` VALUES ('53', '53', 'ENGKOS');
INSERT INTO `master_karyawan` VALUES ('54', '54', 'SUKAYAT');
INSERT INTO `master_karyawan` VALUES ('55', '55', 'FIKIH');
INSERT INTO `master_karyawan` VALUES ('56', '56', 'JAJAD');
INSERT INTO `master_karyawan` VALUES ('57', '63', 'IRAWAN');
INSERT INTO `master_karyawan` VALUES ('58', '64', 'WAWAI');
INSERT INTO `master_karyawan` VALUES ('59', '65', 'KOMAR');
INSERT INTO `master_karyawan` VALUES ('60', '67', 'HERAWATI');
INSERT INTO `master_karyawan` VALUES ('61', '69', 'MATIN');
INSERT INTO `master_karyawan` VALUES ('62', '70', 'HAMDANI');
INSERT INTO `master_karyawan` VALUES ('63', '71', 'MAD UJEN');
INSERT INTO `master_karyawan` VALUES ('64', '72', 'MIFTAH');
INSERT INTO `master_karyawan` VALUES ('65', '73', 'IWAN');
INSERT INTO `master_karyawan` VALUES ('66', '74', 'UMING');
INSERT INTO `master_karyawan` VALUES ('67', '75', 'UCAD');
INSERT INTO `master_karyawan` VALUES ('68', '76', 'SUGANDA');
INSERT INTO `master_karyawan` VALUES ('69', '77', 'NINING YUNIARTI');
INSERT INTO `master_karyawan` VALUES ('70', '78', 'UMIATI');
INSERT INTO `master_karyawan` VALUES ('71', '79', 'DEWI JULISTIANINGSIH');
INSERT INTO `master_karyawan` VALUES ('72', '80', 'LUKMAN DJUHANDI');
INSERT INTO `master_karyawan` VALUES ('73', '81', 'M. CESAR S.P.');
INSERT INTO `master_karyawan` VALUES ('74', '82', 'JAKA APRILIAN');
INSERT INTO `master_karyawan` VALUES ('75', '83', 'ONNY UNTUNG');
INSERT INTO `master_karyawan` VALUES ('76', '84', 'ALEK ASEP');
INSERT INTO `master_karyawan` VALUES ('77', '85', 'AMELIA SARI');
INSERT INTO `master_karyawan` VALUES ('78', '89', 'EKO SUJARWO');
INSERT INTO `master_karyawan` VALUES ('79', '90', 'ISAK ISKANDAR');
INSERT INTO `master_karyawan` VALUES ('80', '91', 'YUSNI KOMAR SYARIF');
INSERT INTO `master_karyawan` VALUES ('81', '92', 'INDRA EMAD');
INSERT INTO `master_karyawan` VALUES ('82', '93', 'SARIPUDIN');
INSERT INTO `master_karyawan` VALUES ('83', '94', 'PAZI');
INSERT INTO `master_karyawan` VALUES ('84', '95', 'ROSDIANA JULAIHA');
INSERT INTO `master_karyawan` VALUES ('85', '96', 'NAOMI NATALIA');
INSERT INTO `master_karyawan` VALUES ('86', '97', 'DANNY');
INSERT INTO `master_karyawan` VALUES ('87', '98', 'IIN VRISIKA E');
INSERT INTO `master_karyawan` VALUES ('88', '99', 'WAHYUDI PURNOMO');
INSERT INTO `master_karyawan` VALUES ('89', '100', 'MARIA IMELDA');
INSERT INTO `master_karyawan` VALUES ('90', '589', 'RETTA HERLIANA');
INSERT INTO `master_karyawan` VALUES ('91', '590', 'HAMID');
INSERT INTO `master_karyawan` VALUES ('92', '591', 'REGY AURIGA TAMSAR');
INSERT INTO `master_karyawan` VALUES ('93', '592', 'RESTI NURAINI');
INSERT INTO `master_karyawan` VALUES ('94', '593', 'SUKATMA');
INSERT INTO `master_karyawan` VALUES ('95', '594', 'ZAENUDIN');
INSERT INTO `master_karyawan` VALUES ('96', '595', 'ANDRI');
INSERT INTO `master_karyawan` VALUES ('97', '596', 'TANFIDS');
INSERT INTO `master_karyawan` VALUES ('98', '597', 'NURUL SABHI');
INSERT INTO `master_karyawan` VALUES ('99', '598', 'YANTO');
INSERT INTO `master_karyawan` VALUES ('100', '599', 'ITANG');
INSERT INTO `master_karyawan` VALUES ('101', '601', 'NUKE LATIFANI');
INSERT INTO `master_karyawan` VALUES ('102', '602', 'IQROMI RIDHO');
INSERT INTO `master_karyawan` VALUES ('103', '603', 'R. WAHYUDIN');
INSERT INTO `master_karyawan` VALUES ('104', '604', 'AHMAD BAYUMI');
INSERT INTO `master_karyawan` VALUES ('105', '605', 'NENGSIH');
INSERT INTO `master_karyawan` VALUES ('106', '606', 'M. MAULANA YUSUP');
INSERT INTO `master_karyawan` VALUES ('107', '607', 'Dede Firmansyah');
INSERT INTO `master_karyawan` VALUES ('108', '608', 'M. Fajar Sidik');
INSERT INTO `master_karyawan` VALUES ('109', '609', 'Puad Risbianto');
INSERT INTO `master_karyawan` VALUES ('110', '610', 'Anan');
INSERT INTO `master_karyawan` VALUES ('111', '611', 'Juanda');
INSERT INTO `master_karyawan` VALUES ('112', '612', 'Iwan');
INSERT INTO `master_karyawan` VALUES ('113', '613', 'Hamdani');
INSERT INTO `master_karyawan` VALUES ('114', '614', 'Dadang');
INSERT INTO `master_karyawan` VALUES ('115', '615', 'Deni Rustandi');
INSERT INTO `master_karyawan` VALUES ('116', '616', 'H Nurjaya');
INSERT INTO `master_karyawan` VALUES ('117', '618', 'ADE SURYANA');
INSERT INTO `master_karyawan` VALUES ('118', '619', 'DAEN');
INSERT INTO `master_karyawan` VALUES ('119', '620', 'MIFTAH');
INSERT INTO `master_karyawan` VALUES ('120', '621', 'MATIN');
INSERT INTO `master_karyawan` VALUES ('121', '622', 'KARDIMAN');
INSERT INTO `master_karyawan` VALUES ('122', '623', 'ACHMAD SIROJUDDIN');
INSERT INTO `master_karyawan` VALUES ('123', '624', 'ABDUL MUHLIS');
INSERT INTO `master_karyawan` VALUES ('124', '625', 'ROSID');
INSERT INTO `master_karyawan` VALUES ('125', '626', 'NANA MARLINA CAHYANI');
INSERT INTO `master_karyawan` VALUES ('126', '627', 'Chandra Firdaus');
INSERT INTO `master_karyawan` VALUES ('127', '628', 'Safei');
INSERT INTO `master_karyawan` VALUES ('128', '629', 'Ardi Wiranata');
INSERT INTO `master_karyawan` VALUES ('129', '630', 'BULDANI SYUKUR');
INSERT INTO `master_karyawan` VALUES ('130', '631', 'Dede Rahmat Zaenudin');
INSERT INTO `master_karyawan` VALUES ('131', '632', 'ASEP MAULANA');
INSERT INTO `master_karyawan` VALUES ('132', '633', 'AMOS SIHADIHARDJO');
INSERT INTO `master_karyawan` VALUES ('133', '634', 'RISMAWANI DALIMUNTE');
INSERT INTO `master_karyawan` VALUES ('134', '635', 'LISDA YANTI');
INSERT INTO `master_karyawan` VALUES ('135', '636', 'MAULUDIN');
INSERT INTO `master_karyawan` VALUES ('136', '637', 'ANI SELVIA');
INSERT INTO `master_karyawan` VALUES ('137', '638', 'DUDI');
INSERT INTO `master_karyawan` VALUES ('138', '639', 'YAKUB');
INSERT INTO `master_karyawan` VALUES ('139', '640', 'YUSUF SUPRIATNA');
INSERT INTO `master_karyawan` VALUES ('140', '641', 'SUMARNO');
INSERT INTO `master_karyawan` VALUES ('141', '642', 'HENDRI');
INSERT INTO `master_karyawan` VALUES ('142', '643', 'AIBNU HAJAR');
INSERT INTO `master_karyawan` VALUES ('143', '644', 'SUGIANTO');
INSERT INTO `master_karyawan` VALUES ('144', '645', 'GUSTAFAR PAHING R');
INSERT INTO `master_karyawan` VALUES ('145', '646', 'ABDUL ROHIM');
INSERT INTO `master_karyawan` VALUES ('146', '647', 'MAD ACIP');
INSERT INTO `master_karyawan` VALUES ('147', '648', 'ABDUL BAITS');
INSERT INTO `master_karyawan` VALUES ('148', '649', 'RUSLAN SAID');
INSERT INTO `master_karyawan` VALUES ('149', '650', 'KOSASIH');
INSERT INTO `master_karyawan` VALUES ('150', '652', 'NOVIAN KURNIAWAN');
INSERT INTO `master_karyawan` VALUES ('151', '653', 'HENDRI');
INSERT INTO `master_karyawan` VALUES ('152', '654', 'SULTAN');
INSERT INTO `master_karyawan` VALUES ('153', '655', 'IRFANDA');
INSERT INTO `master_karyawan` VALUES ('154', '656', 'EZZA M');
INSERT INTO `master_karyawan` VALUES ('155', '657', 'RENDY M');
INSERT INTO `master_karyawan` VALUES ('156', '658', 'CEP RIDWAN');
INSERT INTO `master_karyawan` VALUES ('157', '659', 'NUR IMAM DW');
INSERT INTO `master_karyawan` VALUES ('158', '660', 'MAESAROH');
INSERT INTO `master_karyawan` VALUES ('159', '661', 'WELLY SAPUTRI');
INSERT INTO `master_karyawan` VALUES ('160', '662', 'FEBRY ARDIANSYAH');
INSERT INTO `master_karyawan` VALUES ('161', '663', 'WAWAI 2');
INSERT INTO `master_karyawan` VALUES ('162', '664', 'MUHAMAD PANJI');
INSERT INTO `master_karyawan` VALUES ('163', '665', 'BUDI');
INSERT INTO `master_karyawan` VALUES ('164', '666', 'ZAHIR');
INSERT INTO `master_karyawan` VALUES ('165', '667', 'ANDA');
INSERT INTO `master_karyawan` VALUES ('166', '668', 'SYARIF');
INSERT INTO `master_karyawan` VALUES ('167', '669', 'Maemunah');
INSERT INTO `master_karyawan` VALUES ('168', '670', 'YAYAH');
INSERT INTO `master_karyawan` VALUES ('169', '671', 'AFFAN HABI BURAHMAN');
INSERT INTO `master_karyawan` VALUES ('170', '672', 'GALANG');
INSERT INTO `master_karyawan` VALUES ('171', '673', 'KOSASIH');
INSERT INTO `master_karyawan` VALUES ('172', '674', 'IRWAN');
INSERT INTO `master_karyawan` VALUES ('173', '675', 'ULLI');
INSERT INTO `master_karyawan` VALUES ('174', '676', 'HENDRI');
INSERT INTO `master_karyawan` VALUES ('175', '678', 'WELLY S');
INSERT INTO `master_karyawan` VALUES ('176', '679', 'MUNJAJI');
INSERT INTO `master_karyawan` VALUES ('177', '680', 'SUCI PUJI SURYANI');
INSERT INTO `master_karyawan` VALUES ('178', '681', 'AHMAD RIFAL');
INSERT INTO `master_karyawan` VALUES ('179', '682', 'JAENUDIN');
INSERT INTO `master_karyawan` VALUES ('180', '683', 'NASRUDIN');
INSERT INTO `master_karyawan` VALUES ('181', '684', 'GAGAT');
INSERT INTO `master_karyawan` VALUES ('182', '685', 'SITI KHALIMATUS SADIAH');
INSERT INTO `master_karyawan` VALUES ('183', '686', 'YANA');
INSERT INTO `master_karyawan` VALUES ('184', '687', 'ELANG KRISTI A');
INSERT INTO `master_karyawan` VALUES ('185', '688', 'M RIANDI');
INSERT INTO `master_karyawan` VALUES ('186', '689', 'IMAM AHMAD MUHYIDIN');
INSERT INTO `master_karyawan` VALUES ('187', '690', 'SUGIANTORO');
INSERT INTO `master_karyawan` VALUES ('188', '691', 'HANS ADHITYA');
INSERT INTO `master_karyawan` VALUES ('189', '692', 'BUDI HARYANTO');
INSERT INTO `master_karyawan` VALUES ('190', '693', 'PARHANUDIN');
INSERT INTO `master_karyawan` VALUES ('191', '694', 'IRFAN');
INSERT INTO `master_karyawan` VALUES ('192', '695', 'BUSTOMI');
INSERT INTO `master_karyawan` VALUES ('193', '696', 'WISNU LAZUARDI ZAMAN');
INSERT INTO `master_karyawan` VALUES ('194', '697', 'M IQBAL');
INSERT INTO `master_karyawan` VALUES ('195', '698', 'EVI');
INSERT INTO `master_karyawan` VALUES ('196', '700', 'PATMAWATI');
INSERT INTO `master_karyawan` VALUES ('197', '701', 'SOLEH');
INSERT INTO `master_karyawan` VALUES ('198', '702', 'ARIS');
INSERT INTO `master_karyawan` VALUES ('199', '703', 'MASRONI');
INSERT INTO `master_karyawan` VALUES ('200', '704', 'M YANI');
INSERT INTO `master_karyawan` VALUES ('201', '705', 'IWAN');
INSERT INTO `master_karyawan` VALUES ('202', '706', 'SYAIFUL');
INSERT INTO `master_karyawan` VALUES ('203', '707', 'IJAR');
INSERT INTO `master_karyawan` VALUES ('204', '708', 'SOBUR');
INSERT INTO `master_karyawan` VALUES ('205', '709', 'DEDIH');
INSERT INTO `master_karyawan` VALUES ('206', '710', 'Maemunah');
INSERT INTO `master_karyawan` VALUES ('207', '711', 'ANUGRAH');
INSERT INTO `master_karyawan` VALUES ('208', '712', 'AZIS M');
INSERT INTO `master_karyawan` VALUES ('209', '713', 'HOLIL');
INSERT INTO `master_karyawan` VALUES ('210', '714', 'ARDI');
INSERT INTO `master_karyawan` VALUES ('211', '715', 'YULIANA');
INSERT INTO `master_karyawan` VALUES ('212', '716', 'NOVIYANTI');
INSERT INTO `master_karyawan` VALUES ('213', '717', 'ANDRI LESMANA');
INSERT INTO `master_karyawan` VALUES ('214', '718', 'YOHANES BOSCO BOYKE . P');
INSERT INTO `master_karyawan` VALUES ('215', '719', 'WARSONO');
INSERT INTO `master_karyawan` VALUES ('216', '720', 'WIDODO');
INSERT INTO `master_karyawan` VALUES ('217', '722', 'MUHAMMAD YUSUF');
INSERT INTO `master_karyawan` VALUES ('218', '723', 'WAHYU SEPTIAWAN');
INSERT INTO `master_karyawan` VALUES ('219', '724', 'ARIEF PANDU');
INSERT INTO `master_karyawan` VALUES ('220', '725', 'IRVAN');
INSERT INTO `master_karyawan` VALUES ('221', '726', 'BUDI SETIAWAN');
INSERT INTO `master_karyawan` VALUES ('222', '727', 'PURWASARI');
INSERT INTO `master_karyawan` VALUES ('223', '728', 'NILAWATI');
INSERT INTO `master_karyawan` VALUES ('224', '729', 'ULIAH');
INSERT INTO `master_karyawan` VALUES ('225', '730', 'CECEP');
INSERT INTO `master_karyawan` VALUES ('226', '731', 'ABDUL ROHMAN');
INSERT INTO `master_karyawan` VALUES ('227', '732', 'HERIYATI');
INSERT INTO `master_karyawan` VALUES ('228', '733', 'ANNISA   YOGASARA DEWI');
INSERT INTO `master_karyawan` VALUES ('229', '734', 'IBNU');
INSERT INTO `master_karyawan` VALUES ('230', '735', 'HERMAWAN');
INSERT INTO `master_karyawan` VALUES ('231', '736', 'UDI');
INSERT INTO `master_karyawan` VALUES ('232', '737', 'SUHERMAN');
INSERT INTO `master_karyawan` VALUES ('233', '740', 'ROHMAN');
INSERT INTO `master_karyawan` VALUES ('234', '741', 'RIDWAN');
INSERT INTO `master_karyawan` VALUES ('235', '742', 'SUMANTRI');
INSERT INTO `master_karyawan` VALUES ('236', '743', 'YANA');
INSERT INTO `master_karyawan` VALUES ('237', '745', 'L UTHFI');
INSERT INTO `master_karyawan` VALUES ('238', '746', 'MAULUDIN');
INSERT INTO `master_karyawan` VALUES ('239', '747', 'FAHRUL');
INSERT INTO `master_karyawan` VALUES ('240', '748', 'ALI');
INSERT INTO `master_karyawan` VALUES ('241', '749', 'LUKMANUL HAKIM');
INSERT INTO `master_karyawan` VALUES ('242', '751', 'IRVAN KEB');
INSERT INTO `master_karyawan` VALUES ('243', '752', 'SITI ROBIATUL A');
INSERT INTO `master_karyawan` VALUES ('244', '753', 'FAUZI');
INSERT INTO `master_karyawan` VALUES ('245', '754', 'SUHARYATI');
INSERT INTO `master_karyawan` VALUES ('246', '755', 'SITI SOBARIAH NURJANAH');
INSERT INTO `master_karyawan` VALUES ('247', '756', 'RUSTAM');
INSERT INTO `master_karyawan` VALUES ('248', '757', 'SILVI ROSALIA');
INSERT INTO `master_karyawan` VALUES ('249', '758', 'RACHMADONA');
INSERT INTO `master_karyawan` VALUES ('250', '759', 'RAHAYU NING JARATI');
INSERT INTO `master_karyawan` VALUES ('251', '760', 'FERRY');
INSERT INTO `master_karyawan` VALUES ('252', '761', 'JOREX DANIEL');
INSERT INTO `master_karyawan` VALUES ('253', '762', 'DEDE SUHAYA');
INSERT INTO `master_karyawan` VALUES ('254', '763', 'JOREX DANIEL MOMONGAN');
INSERT INTO `master_karyawan` VALUES ('255', '764', 'TEGAR');
INSERT INTO `master_karyawan` VALUES ('256', '765', 'ESTI');
INSERT INTO `master_karyawan` VALUES ('257', '766', 'IVAN');
INSERT INTO `master_karyawan` VALUES ('258', '767', 'JUNAEDI');
INSERT INTO `master_karyawan` VALUES ('259', '768', 'EDI CIBUY');
INSERT INTO `master_karyawan` VALUES ('260', '769', 'JAENUDIN');
INSERT INTO `master_karyawan` VALUES ('261', '770', 'JUMANAH');
INSERT INTO `master_karyawan` VALUES ('262', '771', 'ANA');
INSERT INTO `master_karyawan` VALUES ('263', '772', 'NENENG');
INSERT INTO `master_karyawan` VALUES ('264', '773', 'DEWI');
INSERT INTO `master_karyawan` VALUES ('265', '774', 'AHMAD');
INSERT INTO `master_karyawan` VALUES ('266', '775', 'ANDA X GA');
INSERT INTO `master_karyawan` VALUES ('267', '777', 'JAYA');
INSERT INTO `master_karyawan` VALUES ('268', '779', 'INDARTO');
INSERT INTO `master_karyawan` VALUES ('269', '780', 'DEANE');
