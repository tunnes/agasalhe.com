-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 23/10/2017 às 01:28
-- Versão do servidor: 5.5.54-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `db_desapeguei`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `code` char(2) NOT NULL DEFAULT '',
  `name` varchar(60) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `countries`
--

INSERT INTO `countries` (`code`, `name`) VALUES
('AD', 'Andorra'),
('AE', 'United Arab Emirates'),
('AF', 'Afghanistan'),
('AG', 'Antigua and Barbuda'),
('AI', 'Anguilla'),
('AL', 'Albania'),
('AM', 'Armenia'),
('AN', 'Netherlands Antilles'),
('AO', 'Angola'),
('AQ', 'Antarctica'),
('AR', 'Argentina'),
('AT', 'Austria'),
('AU', 'Australia'),
('AW', 'Aruba'),
('AZ', 'Azerbaijan'),
('BA', 'Bosnia and Herzegovina'),
('BB', 'Barbados'),
('BD', 'Bangladesh'),
('BE', 'Belgium'),
('BF', 'Burkina Faso'),
('BG', 'Bulgaria'),
('BH', 'Bahrain'),
('BI', 'Burundi'),
('BJ', 'Benin'),
('BM', 'Bermuda'),
('BN', 'Brunei Darussalam'),
('BO', 'Bolivia'),
('BR', 'Brazil'),
('BS', 'Bahamas'),
('BT', 'Bhutan'),
('BV', 'Bouvet Island'),
('BW', 'Botswana'),
('BY', 'Belarus'),
('BZ', 'Belize'),
('CA', 'Canada'),
('CC', 'Cocos (Keeling) Islands'),
('CF', 'Central African Republic'),
('CG', 'Congo'),
('CH', 'Switzerland'),
('CI', 'Ivory Coast'),
('CK', 'Cook Islands'),
('CL', 'Chile'),
('CM', 'Cameroon'),
('CN', 'China'),
('CO', 'Colombia'),
('CR', 'Costa Rica'),
('CU', 'Cuba'),
('CV', 'Cape Verde'),
('CX', 'Christmas Island'),
('CY', 'Cyprus'),
('CZ', 'Czech Republic'),
('DE', 'Germany'),
('DJ', 'Djibouti'),
('DK', 'Denmark'),
('DM', 'Dominica'),
('DO', 'Dominican Republic'),
('DS', 'American Samoa'),
('DZ', 'Algeria'),
('EC', 'Ecuador'),
('EE', 'Estonia'),
('EG', 'Egypt'),
('EH', 'Western Sahara'),
('ER', 'Eritrea'),
('ES', 'Spain'),
('ET', 'Ethiopia'),
('FI', 'Finland'),
('FJ', 'Fiji'),
('FK', 'Falkland Islands (Malvinas)'),
('FM', 'Micronesia, Federated States of'),
('FO', 'Faroe Islands'),
('FR', 'France'),
('FX', 'France, Metropolitan'),
('GA', 'Gabon'),
('GB', 'United Kingdom'),
('GD', 'Grenada'),
('GE', 'Georgia'),
('GF', 'French Guiana'),
('GH', 'Ghana'),
('GI', 'Gibraltar'),
('GK', 'Guernsey'),
('GL', 'Greenland'),
('GM', 'Gambia'),
('GN', 'Guinea'),
('GP', 'Guadeloupe'),
('GQ', 'Equatorial Guinea'),
('GR', 'Greece'),
('GS', 'South Georgia South Sandwich Islands'),
('GT', 'Guatemala'),
('GU', 'Guam'),
('GW', 'Guinea-Bissau'),
('GY', 'Guyana'),
('HK', 'Hong Kong'),
('HM', 'Heard and Mc Donald Islands'),
('HN', 'Honduras'),
('HR', 'Croatia (Hrvatska)'),
('HT', 'Haiti'),
('HU', 'Hungary'),
('ID', 'Indonesia'),
('IE', 'Ireland'),
('IL', 'Israel'),
('IM', 'Isle of Man'),
('IN', 'India'),
('IO', 'British Indian Ocean Territory'),
('IQ', 'Iraq'),
('IR', 'Iran (Islamic Republic of)'),
('IS', 'Iceland'),
('IT', 'Italy'),
('JE', 'Jersey'),
('JM', 'Jamaica'),
('JO', 'Jordan'),
('JP', 'Japan'),
('KE', 'Kenya'),
('KG', 'Kyrgyzstan'),
('KH', 'Cambodia'),
('KI', 'Kiribati'),
('KM', 'Comoros'),
('KN', 'Saint Kitts and Nevis'),
('KP', 'Korea, Democratic People''s Republic of'),
('KR', 'Korea, Republic of'),
('KW', 'Kuwait'),
('KY', 'Cayman Islands'),
('KZ', 'Kazakhstan'),
('LA', 'Lao People''s Democratic Republic'),
('LB', 'Lebanon'),
('LC', 'Saint Lucia'),
('LI', 'Liechtenstein'),
('LK', 'Sri Lanka'),
('LR', 'Liberia'),
('LS', 'Lesotho'),
('LT', 'Lithuania'),
('LU', 'Luxembourg'),
('LV', 'Latvia'),
('LY', 'Libyan Arab Jamahiriya'),
('MA', 'Morocco'),
('MC', 'Monaco'),
('MD', 'Moldova, Republic of'),
('ME', 'Montenegro'),
('MG', 'Madagascar'),
('MH', 'Marshall Islands'),
('MK', 'Macedonia'),
('ML', 'Mali'),
('MM', 'Myanmar'),
('MN', 'Mongolia'),
('MO', 'Macau'),
('MP', 'Northern Mariana Islands'),
('MQ', 'Martinique'),
('MR', 'Mauritania'),
('MS', 'Montserrat'),
('MT', 'Malta'),
('MU', 'Mauritius'),
('MV', 'Maldives'),
('MW', 'Malawi'),
('MX', 'Mexico'),
('MY', 'Malaysia'),
('MZ', 'Mozambique'),
('NA', 'Namibia'),
('NC', 'New Caledonia'),
('NE', 'Niger'),
('NF', 'Norfolk Island'),
('NG', 'Nigeria'),
('NI', 'Nicaragua'),
('NL', 'Netherlands'),
('NO', 'Norway'),
('NP', 'Nepal'),
('NR', 'Nauru'),
('NU', 'Niue'),
('NZ', 'New Zealand'),
('OM', 'Oman'),
('PA', 'Panama'),
('PE', 'Peru'),
('PF', 'French Polynesia'),
('PG', 'Papua New Guinea'),
('PH', 'Philippines'),
('PK', 'Pakistan'),
('PL', 'Poland'),
('PM', 'St. Pierre and Miquelon'),
('PN', 'Pitcairn'),
('PR', 'Puerto Rico'),
('PS', 'Palestine'),
('PT', 'Portugal'),
('PW', 'Palau'),
('PY', 'Paraguay'),
('QA', 'Qatar'),
('RE', 'Reunion'),
('RO', 'Romania'),
('RS', 'Serbia'),
('RU', 'Russian Federation'),
('RW', 'Rwanda'),
('SA', 'Saudi Arabia'),
('SB', 'Solomon Islands'),
('SC', 'Seychelles'),
('SD', 'Sudan'),
('SE', 'Sweden'),
('SG', 'Singapore'),
('SH', 'St. Helena'),
('SI', 'Slovenia'),
('SJ', 'Svalbard and Jan Mayen Islands'),
('SK', 'Slovakia'),
('SL', 'Sierra Leone'),
('SM', 'San Marino'),
('SN', 'Senegal'),
('SO', 'Somalia'),
('SR', 'Suriname'),
('ST', 'Sao Tome and Principe'),
('SV', 'El Salvador'),
('SY', 'Syrian Arab Republic'),
('SZ', 'Swaziland'),
('TC', 'Turks and Caicos Islands'),
('TD', 'Chad'),
('TF', 'French Southern Territories'),
('TG', 'Togo'),
('TH', 'Thailand'),
('TJ', 'Tajikistan'),
('TK', 'Tokelau'),
('TM', 'Turkmenistan'),
('TN', 'Tunisia'),
('TO', 'Tonga'),
('TP', 'East Timor'),
('TR', 'Turkey'),
('TT', 'Trinidad and Tobago'),
('TV', 'Tuvalu'),
('TW', 'Taiwan'),
('TY', 'Mayotte'),
('TZ', 'Tanzania, United Republic of'),
('UA', 'Ukraine'),
('UG', 'Uganda'),
('UM', 'United States minor outlying islands'),
('US', 'United States'),
('UY', 'Uruguay'),
('UZ', 'Uzbekistan'),
('VA', 'Vatican City State'),
('VC', 'Saint Vincent and the Grenadines'),
('VE', 'Venezuela'),
('VG', 'Virgin Islands (British)'),
('VI', 'Virgin Islands (U.S.)'),
('VN', 'Vietnam'),
('VU', 'Vanuatu'),
('WF', 'Wallis and Futuna Islands'),
('WS', 'Samoa'),
('XK', 'Kosovo'),
('YE', 'Yemen'),
('ZA', 'South Africa'),
('ZM', 'Zambia'),
('ZR', 'Zaire'),
('ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Estrutura para tabela `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `use_state` enum('NOVO','USADO','SEMI-NOVO') DEFAULT NULL,
  `category` enum('MOVEL','ELETRONICO','ELETRODOMESTICO','BRINQUEDO','ROUPA','UTENSILIO','FERRAMENTA','INSTRUMENTO') DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=93 ;

--
-- Fazendo dump de dados para tabela `items`
--

INSERT INTO `items` (`id`, `title`, `description`, `active`, `use_state`, `category`, `user_id`) VALUES
(62, 'Dr.', 'Eum quaerat beatae et asperiores et. Rem dolores assumenda id. Aut dolorum sed reprehenderit aut.', 0, 'SEMI-NOVO', 'BRINQUEDO', 62),
(63, 'Prof.', 'Voluptates aspernatur est occaecati et eius mollitia. Quo aut sapiente rerum. Sapiente accusamus et rerum id minima.', 1, 'SEMI-NOVO', 'ROUPA', 63),
(64, 'Miss', 'Dicta ducimus quibusdam sed possimus omnis non aut. Et magni pariatur quia in.', 1, 'NOVO', 'ELETRONICO', 64),
(65, 'Miss', 'Eos odio voluptas doloremque facilis minima et. Asperiores voluptatum fuga dolorem consequatur.', 0, 'USADO', 'MOVEL', 65),
(66, 'Prof.', 'Deserunt laudantium possimus aut voluptatibus. Quis dolore eveniet et voluptatibus temporibus eius corrupti.', 1, 'NOVO', 'ROUPA', 66),
(67, 'Dr.', 'Cumque dolorum non sed optio velit. Est accusamus cum earum libero occaecati dignissimos voluptatem.', 1, 'USADO', 'INSTRUMENTO', 67),
(68, 'Prof.', 'Velit est possimus qui. Sunt accusamus suscipit qui ratione. Aut nisi libero vel voluptatem doloribus.', 0, 'USADO', 'ROUPA', 68),
(69, 'Mrs.', 'Laboriosam minus sint voluptatem et. Aut hic velit qui deserunt nemo ab. Perspiciatis eum id eos aliquid.', 0, 'USADO', 'ELETRODOMESTICO', 69),
(70, 'Dr.', 'Nemo voluptate asperiores aliquam a. Omnis consequatur nesciunt qui rerum quas explicabo. Quo in et facere.', 0, 'SEMI-NOVO', 'ELETRONICO', 70),
(71, 'Mr.', 'Totam ut reiciendis qui quia. Quo dolorum et in sit adipisci qui est. Enim porro officia quo beatae nesciunt.', 1, 'NOVO', 'ELETRONICO', 71),
(72, 'Miss', 'Laborum non fuga nam ducimus aliquam. Repellat debitis velit tempore ut. Accusantium aspernatur sunt esse dolorem.', 1, 'NOVO', 'ROUPA', 72),
(73, 'Ms.', 'In nemo sit optio numquam. Soluta qui expedita et nulla. Similique qui dolore aliquam animi.', 1, 'USADO', 'MOVEL', 73),
(74, 'Ms.', 'Ut sit doloribus quis. Earum ut vel sapiente vitae neque doloribus culpa.', 0, 'NOVO', 'BRINQUEDO', 74),
(75, 'Dr.', 'Illum nemo unde et et totam quod. Impedit est doloremque tempora est aperiam.', 1, 'USADO', 'INSTRUMENTO', 75),
(76, 'Prof.', 'Enim dicta aut et sit dolore. Pariatur earum enim ut voluptatem. Qui adipisci qui libero nam modi quisquam.', 1, 'NOVO', 'MOVEL', 76),
(77, 'Ms.', 'Et vero sit deserunt veniam fuga et praesentium. Qui ut ab beatae qui.', 0, 'SEMI-NOVO', 'ELETRODOMESTICO', 77),
(78, 'Prof.', 'Voluptatibus odit aut odit. Maxime non dicta laborum cumque repudiandae dignissimos. Ut est ut aliquam qui.', 0, 'USADO', 'BRINQUEDO', 78),
(79, 'Prof.', 'Atque ut aut quasi numquam dolor. Odio accusantium sed fugit ut enim est repudiandae. Iste nesciunt impedit ratione.', 0, 'SEMI-NOVO', 'MOVEL', 79),
(80, 'Dr.', 'Molestiae in dolorem fuga sit. Perferendis sapiente iusto nam mollitia. Voluptatem ea consequatur animi.', 0, 'SEMI-NOVO', 'ROUPA', 80),
(81, 'Mrs.', 'Molestiae error aliquam incidunt atque et. Modi hic eveniet et assumenda.', 1, 'NOVO', 'BRINQUEDO', 81),
(82, 'Miss', 'Molestiae quas aspernatur odio autem doloribus iure commodi dolores. Ea aut quam qui molestiae quam qui.', 0, 'USADO', 'INSTRUMENTO', 82),
(83, 'Dr.', 'Odio dolores repellendus esse eos. Modi et modi officia. Eos veritatis quia repellendus et dolorum eos.', 1, 'USADO', 'ROUPA', 83),
(84, 'Dr.', 'In velit quis optio ipsam. Amet ad minus ullam fugit.', 0, 'USADO', 'FERRAMENTA', 84),
(85, 'Mrs.', 'Provident numquam culpa quia delectus laboriosam earum. Quas ut id quisquam voluptas temporibus voluptatum cupiditate.', 1, 'USADO', 'ROUPA', 85),
(86, 'Prof.', 'Eaque eaque qui animi vitae. Qui eos earum odio tempora dolor et. Qui ab ut nobis aliquam voluptatem.', 1, 'USADO', 'MOVEL', 86),
(87, 'Mr.', 'Est et accusantium fugiat est soluta qui. Est dolor molestiae et. Rerum aut architecto itaque ea.', 0, 'NOVO', 'ELETRODOMESTICO', 87),
(88, 'Mr.', 'Sed et tempora est. Non doloremque sit numquam voluptas illo exercitationem.', 1, 'USADO', 'FERRAMENTA', 88),
(89, 'Prof.', 'Consequatur quia tenetur deleniti est. Hic quas id sit. Aut dolorem quod minus nihil.', 0, 'USADO', 'BRINQUEDO', 89),
(90, 'Mr.', 'Voluptatem totam vitae deserunt voluptas. Expedita tenetur cumque voluptatem dolore non sed.', 0, 'SEMI-NOVO', 'FERRAMENTA', 90),
(91, 'Miss', 'Iure labore vitae ut optio suscipit est impedit illum. Ut explicabo fuga a odio tenetur dicta.', 1, 'USADO', 'ELETRONICO', 91),
(92, 'teste', 'teste dnv', 1, 'NOVO', 'ELETRONICO', 62);

-- --------------------------------------------------------

--
-- Estrutura para tabela `item_images`
--

CREATE TABLE IF NOT EXISTS `item_images` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `image` mediumblob NOT NULL,
  `alt` varchar(80) DEFAULT NULL,
  `item_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Fazendo dump de dados para tabela `item_images`
--

INSERT INTO `item_images` (`id`, `image`, `alt`, `item_id`) VALUES
(1, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3637303036, 'Facere hic aut quae sed quo culpa. Rerum dicta et fuga distinctio reiciendis hic', 62),
(2, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3930363831, 'Enim itaque aliquam doloribus. Molestias et quibusdam illum et cum. Qui tenetur ', 63),
(3, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3338363637, 'Perferendis vel sint eum excepturi aut. Rem ullam numquam quos autem culpa. Ad q', 64),
(4, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3136323133, 'Qui est natus tempore laborum. Repellendus placeat omnis aut quam. Placeat et re', 65),
(5, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3434323732, 'Soluta quo sed nulla quibusdam deleniti. Voluptatem ad ea ducimus.', 66),
(6, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3338313839, 'Eaque sapiente suscipit dolor mollitia vel quis excepturi. Earum accusantium bla', 67),
(7, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3237383538, 'Rerum soluta iusto aspernatur. Dolores quos vel consequatur soluta aut vel disti', 68),
(8, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3433373735, 'Voluptatem assumenda minima est rerum numquam et ducimus occaecati. Eos recusand', 69),
(9, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3138343538, 'Eos et ratione facilis dolorem. Corrupti veniam nostrum voluptatum accusamus et.', 70),
(10, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3631363738, 'Quis quae dolorum voluptas voluptatem maxime. Eum voluptates rem consequatur. Qu', 71),
(11, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3635303732, 'Nihil est adipisci eos hic adipisci possimus consequuntur. In sed nisi officiis ', 72),
(12, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3532343230, 'Commodi necessitatibus et minima. Nihil quis id at quas.', 73),
(13, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3835303134, 'Sed sequi non nihil ducimus mollitia fuga. Id impedit velit quis.', 74),
(14, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3431393232, 'Natus ut autem qui neque. In sunt mollitia rem non enim ea. Non dolorum fuga ips', 75),
(15, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3439393139, 'Aut voluptatem officiis labore dolore ut. Itaque voluptates rerum quae aut verit', 76),
(16, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3436363130, 'Corporis iure iusto maxime porro. Dolorem necessitatibus est harum aut ea id. Et', 77),
(17, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3534353632, 'Necessitatibus molestiae qui vel ut quia. Veritatis magni reiciendis explicabo i', 78),
(18, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3238353031, 'Aut ad exercitationem officia. Et sed harum facere voluptatem perferendis autem.', 79),
(19, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3735303136, 'Vel ab corporis et sed. Nulla laudantium cum laborum est atque sequi. Id qui quo', 80),
(20, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3634373037, 'Rerum sit odit consequatur quas. Earum ducimus ut velit ipsa ut. Sed ea id ut qu', 81),
(21, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3638323436, 'Voluptas sunt quae quis et non minus. Animi odit dignissimos numquam voluptate.', 82),
(22, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3539303738, 'Rerum quo tempore ratione tenetur quas cumque. Voluptatibus saepe sint quas temp', 83),
(23, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3339303139, 'Aut aut doloremque quia iusto. Harum eos recusandae modi. Eveniet aliquid dolor ', 84),
(24, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3733353930, 'Maxime eligendi ad iusto error quas. Et qui tempore quis. Rem et sit facere dolo', 85),
(25, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3132393734, 'Blanditiis vitae non minus aut. Et est consequatur eum nihil assumenda ut. Ut eo', 86),
(26, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3336353333, 'Atque tempore sapiente eum optio inventore libero deleniti. Et dolore optio sapi', 87),
(27, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3138393337, 'Ab aspernatur architecto molestias nobis ut aut aut. Reprehenderit adipisci qui ', 88),
(28, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3532353937, 'Odio illo earum suscipit maiores. Ut id ut velit vero.', 89),
(29, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3937353930, 'Eius minima consectetur in eum qui deserunt qui. Laborum vitae ipsum sequi quis ', 90),
(30, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3534333733, 'Molestias animi consequatur ea sed. Et accusamus optio cumque. Iure voluptate et', 91),
(31, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3731353932, 'Architecto dolor qui facilis doloribus. Quia praesentium repellendus aut quis. R', 62),
(32, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3336383734, 'Ut est quam est illum. Sed hic et non accusantium eveniet ex necessitatibus. Mol', 63),
(33, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3831343035, 'Voluptatem et nam quos veritatis suscipit dolore. Dolores aut quam et dolorum re', 64),
(34, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3737393632, 'Nihil nobis quo optio ullam. Inventore consectetur quo nulla fugit et. Delectus ', 65),
(35, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3339393232, 'Error odit corrupti quae necessitatibus. Consequatur unde et ea cumque. Sunt qui', 66),
(36, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3631393939, 'Pariatur temporibus saepe et odit et fugit culpa quis. Sed exercitationem aperia', 67),
(37, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3736383834, 'Vitae cum aliquam sit nostrum cum. Omnis rerum natus id eos est error accusamus ', 68),
(38, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3532393630, 'Saepe enim autem quam quasi. Corrupti et sit praesentium corrupti.', 69),
(39, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3537383834, 'Impedit velit amet et doloribus quis. Voluptatem fuga amet omnis saepe.', 70),
(40, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3936393837, 'Explicabo atque dicta impedit voluptatem ut consequatur. Sit sapiente quia offic', 71),
(41, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3430333039, 'Ea cum et doloribus optio. Eveniet iure et reiciendis omnis. Qui dignissimos ab ', 72),
(42, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3334373632, 'Eaque dolorem in consequatur soluta aliquid nostrum. Nulla quis sunt nihil et es', 73),
(43, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3230353734, 'Esse modi explicabo sit. Voluptatem culpa laborum id quo sit labore expedita. Te', 74),
(44, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3739373932, 'Quod aut recusandae quis aut repellat iure iusto. Molestias sunt ea eos. Digniss', 75),
(45, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3237393634, 'Sint reprehenderit minus odio. Doloremque autem eaque dolorem. Provident ipsum n', 76),
(46, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3530353338, 'Tenetur non nisi vitae. Aspernatur aut id alias. Fuga debitis deleniti ab quam.', 77),
(47, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3738383238, 'Quas non similique sunt ad ipsum sit et. Sapiente nemo molestias eaque qui. Reic', 78),
(48, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3538323834, 'Consequatur laboriosam reiciendis et. Quia molestias officia minima suscipit inv', 79),
(49, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3534323434, 'Cupiditate sunt molestiae dolores ut ea odio ea. Nihil quisquam quia nostrum nam', 80),
(50, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3430363139, 'Laboriosam et quia ut maxime sed. Sequi quo accusantium aut et ipsam quo.', 81),
(51, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3239333630, 'Et possimus nam blanditiis libero minus ducimus quasi. Quos repellat voluptas su', 82),
(52, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3735363036, 'Id voluptates perspiciatis nostrum et veniam maiores. Velit maxime quisquam ut q', 83),
(53, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3134313137, 'Eum rem ab alias a. A deserunt inventore aut vel odit et. Fuga vel qui iure sed ', 84),
(54, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3730323231, 'Non quo aut repudiandae tempora. Atque odio animi et nostrum dolor. Sit quibusda', 85),
(55, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3931363538, 'At repellendus nihil cumque officia dolores. Quo dolores soluta nam dolore molli', 86),
(56, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3730363839, 'Et pariatur et autem laboriosam pariatur tempore. Sint iure enim cum quo. Sit ul', 87),
(57, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3639393831, 'Qui voluptatem et incidunt ut. Est quam et suscipit ut ut magni et.', 88),
(58, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3631353232, 'Voluptas aut illo eligendi rerum. Veniam dolorem in beatae nulla. Quibusdam tene', 89),
(59, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3737353039, 'Non est non dolores blanditiis repudiandae nihil iusto. Voluptas tempora quos ut', 90),
(60, 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3138313834, 'Quaerat perspiciatis aut dolor facere sit rem. Soluta quidem ut dolorem eos pari', 91);

-- --------------------------------------------------------

--
-- Estrutura para tabela `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `user_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`item_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `likes`
--

INSERT INTO `likes` (`user_id`, `item_id`) VALUES
(64, 62),
(65, 62),
(62, 63),
(62, 64),
(62, 65),
(64, 65),
(64, 92),
(65, 92),
(66, 92);

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(20170917145509);

-- --------------------------------------------------------

--
-- Estrutura para tabela `trades`
--

CREATE TABLE IF NOT EXISTS `trades` (
  `item_theirs` int(10) unsigned NOT NULL,
  `item_yours` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `status` enum('PENDING','REFUSED','DONE') NOT NULL,
  PRIMARY KEY (`item_theirs`,`item_yours`),
  KEY `fk_item_yours` (`item_yours`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `trades`
--

INSERT INTO `trades` (`item_theirs`, `item_yours`, `created`, `status`) VALUES
(62, 63, '2017-10-22 17:12:19', 'REFUSED'),
(62, 67, '2017-10-22 19:44:47', 'REFUSED'),
(65, 62, '2017-10-22 17:43:18', 'PENDING'),
(68, 67, '2017-10-22 17:37:10', 'PENDING');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(80) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `profile_image` mediumblob,
  `about_me` varchar(250) DEFAULT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `state` varchar(60) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `birth` date NOT NULL,
  `recovery_hash` varchar(255) DEFAULT NULL,
  `recovery_validity` datetime DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `fcm` varchar(255) DEFAULT NULL,
  `country` char(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country` (`country`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=95 ;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `nickname`, `profile_image`, `about_me`, `gender`, `state`, `city`, `birth`, `recovery_hash`, `recovery_validity`, `phone`, `fcm`, `country`) VALUES
(62, 'tarcisio.thallys@gmail.com', '$2y$10$zmTpVCKfT6O0eOSgbAurjunK.D1NArWv1bw55NBqGDdKvLMMG/P8.', 'tarcisio lindao :D', 'teste', NULL, NULL, 'M', NULL, NULL, '1997-06-12', NULL, NULL, NULL, NULL, 'BR'),
(63, 'marcelo35@marvin.info', 'Cumque.', 'Leila Quitzon', 'Molestias.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3831393138, 'Et neque rem aut non hic. Cupiditate accusamus et hic fugiat. Ad dolor vero aperiam voluptas quibusdam.', 'F', NULL, NULL, '2003-08-17', NULL, NULL, NULL, NULL, 'BR'),
(64, 'ola92@gmail.com', 'Aperiam.', 'Ida McDermott', 'Commodi.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3934343332, 'Fugit sed iure est nostrum voluptatem explicabo harum. Eum et voluptas nulla eos maiores sunt omnis rerum.', 'M', NULL, NULL, '2005-09-17', NULL, NULL, NULL, NULL, 'BR'),
(65, 'marvin28@yahoo.com', 'Est hic.', 'Dr. Missouri Orn DDS', 'Officia.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3135393733, 'Consequatur consequatur culpa eius officia. Et id et deserunt rerum iure voluptatem enim quos.', 'F', NULL, NULL, '1984-05-29', NULL, NULL, NULL, NULL, 'BR'),
(66, 'martine99@yahoo.com', 'Debitis.', 'Torey Volkman', 'Nobis.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3132323739, 'Aut fugit vel quidem veniam. Mollitia quisquam et cupiditate est. Numquam voluptas aliquid quis quis qui ut quis sed.', 'M', NULL, NULL, '2009-02-26', NULL, NULL, NULL, NULL, 'BR'),
(67, 'ogoodwin@rutherford.com', 'Hic.', 'Damian Konopelski', 'Facilis at.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3836393834, 'Ut accusamus est praesentium. Cupiditate quas ut cumque. Totam vel hic voluptatibus. Ex maxime et nemo earum.', 'M', NULL, NULL, '1983-02-05', NULL, NULL, NULL, NULL, 'BR'),
(68, 'walker.carissa@schaefer.com', 'Dolores.', 'Nelle Feil', 'Placeat.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3138383832, 'Sed adipisci esse exercitationem aspernatur libero illum id. Aut sint nihil omnis illum provident iure et.', 'M', NULL, NULL, '2011-11-07', NULL, NULL, NULL, NULL, 'BR'),
(69, 'roscoe.langosh@corwin.com', 'Dolor.', 'Geraldine Wilderman', 'Quas quam.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3436313537, 'Ea eum eum ducimus aut ut. Qui molestias eaque est a. Sunt aut velit vitae iusto harum officiis autem enim.', 'M', NULL, NULL, '1990-04-16', NULL, NULL, NULL, NULL, 'BR'),
(70, 'aidan24@heidenreich.com', 'Iure.', 'Audrey Toy', 'Pariatur.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3534313234, 'Et est laboriosam commodi et. Tempora aut labore earum sequi doloribus.', 'M', NULL, NULL, '2003-10-24', NULL, NULL, NULL, NULL, 'BR'),
(71, 'hpaucek@gmail.com', 'Et.', 'Mariela Schuster', 'Beatae quia.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3235393833, 'Veritatis atque aspernatur qui quia quasi velit quibusdam quasi. Et sed eum culpa autem. Aliquid est est sit eos.', 'M', NULL, NULL, '2014-09-19', NULL, NULL, NULL, NULL, 'BR'),
(72, 'ullrich.joanny@russel.biz', 'Sit a.', 'Keanu Collins', 'Perferendis.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3439353730, 'Fugit suscipit saepe eos corrupti et. Cupiditate odit aperiam non.', 'M', NULL, NULL, '2004-02-24', NULL, NULL, NULL, NULL, 'BR'),
(73, 'kallie.stehr@hotmail.com', 'Enim.', 'Prof. Cecil Feil', 'Reiciendis.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3633353837, 'Sit id nihil ut fugiat ut laboriosam id. Autem non tenetur qui sunt.', 'F', NULL, NULL, '1977-04-09', NULL, NULL, NULL, NULL, 'BR'),
(74, 'schowalter.doyle@yahoo.com', 'Qui.', 'Dell Marks', 'A.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3439313432, 'Sed est ipsum non omnis velit ea ipsum. Quis ut suscipit voluptatem. Ut aliquid natus libero dignissimos itaque.', 'F', NULL, NULL, '2004-04-22', NULL, NULL, NULL, NULL, 'BR'),
(75, 'josie.greenholt@hotmail.com', 'Ut ut.', 'Prof. Thomas Ebert V', 'Facere.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3539373634, 'Eos neque a temporibus dolores aspernatur quis sed. Vel animi minima sit omnis est.', 'F', NULL, NULL, '1977-09-03', NULL, NULL, NULL, NULL, 'BR'),
(76, 'wintheiser.kelly@heidenreich.net', 'Natus.', 'Ronaldo Wiegand', 'Dolores.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3934373032, 'Doloremque fugiat velit facere qui. Iure voluptatem totam exercitationem eaque nihil. Accusamus fuga ut enim quia.', 'F', NULL, NULL, '2003-06-01', NULL, NULL, NULL, NULL, 'BR'),
(77, 'seth45@schoen.info', 'Fuga.', 'Tevin Emard', 'Ullam.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3730343437, 'Et nisi et fugit sed sunt repellat eos ab. Expedita repudiandae commodi repellendus natus.', 'M', NULL, NULL, '1996-07-14', NULL, NULL, NULL, NULL, 'BR'),
(78, 'egutkowski@gutmann.org', 'Dicta.', 'Ena Schiller', 'Consequatur.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3334333332, 'Voluptatem eos odit et sunt nisi. Laboriosam voluptatibus ipsam et officia. Quia ut voluptatem culpa id et voluptatem.', 'F', NULL, NULL, '1975-11-01', NULL, NULL, NULL, NULL, 'BR'),
(79, 'oaufderhar@hintz.biz', 'Eum.', 'Alicia Pfannerstill III', 'Explicabo.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3639323938, 'Voluptate fugiat quia aliquid sed cum. Voluptatem iste fugit explicabo et. Dolor illo quis maiores odio fugiat.', 'F', NULL, NULL, '1998-03-04', NULL, NULL, NULL, NULL, 'BR'),
(80, 'lborer@gmail.com', 'Esse.', 'Evangeline Kovacek', 'Sapiente.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3237353734, 'Sed aut officiis praesentium earum. Hic explicabo nihil occaecati officia.', 'F', NULL, NULL, '1971-07-06', NULL, NULL, NULL, NULL, 'BR'),
(81, 'edwina.mayert@gmail.com', 'Quos.', 'Stanford Casper', 'Consequatur.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3835393539, 'Voluptatem rem qui velit unde fugit. Quis quo unde ducimus ex.', 'M', NULL, NULL, '2000-03-26', NULL, NULL, NULL, NULL, 'BR'),
(82, 'elisa48@gmail.com', 'Animi.', 'Miss Chelsea Beatty', 'Eos beatae.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3235323931, 'Voluptatum nihil neque atque magnam. Et quam vel deleniti alias et. Dignissimos adipisci et eos sunt.', 'F', NULL, NULL, '2016-01-11', NULL, NULL, NULL, NULL, 'BR'),
(83, 'considine.kali@mohr.com', 'Et.', 'Jedediah Kris', 'Voluptatem.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3433303630, 'Aut necessitatibus iusto aut. Natus voluptas animi consequuntur ut non. Et eum repellat deleniti voluptatem odit nemo.', 'F', NULL, NULL, '1996-08-08', NULL, NULL, NULL, NULL, 'BR'),
(84, 'fcarter@yahoo.com', 'Ducimus.', 'Aurelia Schoen', 'Eos soluta.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3937383236, 'Et et et hic dolorem vel quasi ut. Repellendus magni sunt aut. Et sint ut recusandae.', 'F', NULL, NULL, '1980-02-02', NULL, NULL, NULL, NULL, 'BR'),
(85, 'lebsack.candice@jacobson.com', 'Cumque.', 'Maude Simonis', 'Temporibus.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3337363036, 'Quibusdam ea eaque dicta ullam laborum voluptate. Sint tenetur impedit sed. Autem expedita eos libero rerum.', 'M', NULL, NULL, '1994-05-28', NULL, NULL, NULL, NULL, 'BR'),
(86, 'dbreitenberg@casper.org', 'Nihil.', 'Mrs. Mariana Heller II', 'Temporibus.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3439393739, 'Ad odio laborum omnis numquam. Neque officiis exercitationem aliquid. Ex qui iusto non ipsam dicta.', 'F', NULL, NULL, '1984-08-06', NULL, NULL, NULL, NULL, 'BR'),
(87, 'laney43@hotmail.com', 'Commodi.', 'Anibal Koch MD', 'A non qui.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3530343437, 'Vero nemo quam molestias voluptatem. Corrupti est sed culpa velit est. Facere architecto molestias et.', 'F', NULL, NULL, '2004-06-22', NULL, NULL, NULL, NULL, 'BR'),
(88, 'henriette28@gmail.com', 'Ut.', 'Courtney Champlin', 'Asperiores.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3633363734, 'Id ad quod quis rem. Et velit inventore tempore ut aut consequatur eum. Consequatur et non error.', 'M', NULL, NULL, '2001-08-06', NULL, NULL, NULL, NULL, 'BR'),
(89, 'tre.waelchi@yahoo.com', 'Quasi.', 'Christine Schmidt', 'Sed.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3534383431, 'Sint aut laudantium rem odit eius. Minus corporis eum fugit placeat. Sit a itaque molestiae quo.', 'M', NULL, NULL, '2016-08-21', NULL, NULL, NULL, NULL, 'BR'),
(90, 'deshaun.schulist@labadie.com', 'In hic.', 'Dr. Hilton Hickle', 'Possimus.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3439303530, 'Qui saepe optio quo ipsam est. Quibusdam similique fugit ut voluptatem rerum minus.', 'F', NULL, NULL, '1999-05-08', NULL, NULL, NULL, NULL, 'BR'),
(91, 'nicole25@yahoo.com', 'Qui hic.', 'Ransom Ward', 'Velit.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3839333331, 'Autem sunt culpa animi laborum. Non minus aspernatur sunt laborum ab velit ipsum. Rem et voluptatum quo odio sapiente.', 'M', NULL, NULL, '2000-12-31', NULL, NULL, NULL, NULL, 'BR'),
(92, 'cbreitenberg@hotmail.com', 'Velit.', 'Dr. Hershel Schumm', 'Cupiditate.', 0x687474703a2f2f6c6f72656d706978656c2e636f6d2f3634302f3438302f3f3434313631, 'Dolorum assumenda dolorem temporibus beatae non. Enim commodi ea commodi. Aut laudantium exercitationem libero unde.', 'M', NULL, NULL, '1973-11-28', NULL, NULL, NULL, NULL, 'BR'),
(93, 'teste@teste.com', '$2y$10$O3EpHGNIgCOkzRGZ/GqE0eL8sFxca3hdLaJf6Myce0FgIa4YDTPo2', 'tarcizito', 'tarcizito', NULL, NULL, 'M', NULL, NULL, '1997-04-12', NULL, NULL, NULL, NULL, 'BR'),
(94, 'teste2@teste.com', '$2y$10$vmi/HGVXlygRh4RIWGAo9.nlycZVNNODRjUcxPcFrW/8rJ9ffAaqK', 'tarcizito', 'foda', NULL, NULL, 'M', NULL, NULL, '1997-04-12', NULL, NULL, NULL, NULL, 'BR');

-- --------------------------------------------------------

--
-- Estrutura para tabela `wishes`
--

CREATE TABLE IF NOT EXISTS `wishes` (
  `user_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`item_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `item_images`
--
ALTER TABLE `item_images`
  ADD CONSTRAINT `item_images_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Restrições para tabelas `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Restrições para tabelas `trades`
--
ALTER TABLE `trades`
  ADD CONSTRAINT `fk_item_theirs` FOREIGN KEY (`item_theirs`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `fk_item_yours` FOREIGN KEY (`item_yours`) REFERENCES `items` (`id`);

--
-- Restrições para tabelas `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`country`) REFERENCES `countries` (`code`);

--
-- Restrições para tabelas `wishes`
--
ALTER TABLE `wishes`
  ADD CONSTRAINT `wishes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wishes_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
