-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2016 at 07:38 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hardware_shopee`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(50) NOT NULL DEFAULT '',
  `cat_description` text NOT NULL,
  `main_cat_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_description`, `main_cat_id`) VALUES
(2, 'Dell Laptops', 'Dell Laptops', 1),
(3, 'Destop Accessories', 'Destop Accessories', 3),
(24, 'mac laptops', 'mac laptops', 1),
(8, 'Lenovo Lapotps', 'Lenovo Lapotps', 1),
(9, 'New Computers', 'New Computers', 2),
(7, 'Laptop Accessories', 'Laptop Accessories', 3),
(10, 'Old Computers', 'Old Computers', 2),
(11, 'Old laptops', 'Old laptops', 1),
(12, 'Old Laptop repair', 'Old Laptop repair', 3),
(13, 'Old Laptop Spares', 'Old Laptop Spares', 3),
(14, 'Softwares', 'Softwares', 3),
(15, 'Printers and Scanners', 'Printers & Scanners', 3),
(16, 'Sony Laptops', 'Sony Laptops', 1),
(17, 'Special Offers', 'Special Offers', 3),
(18, 'Storage Drives', 'Storage Drives', 3),
(19, 'Toshiba Laptops', 'Toshiba Laptops', 1),
(23, 'aaaa', 'aaa', 0),
(25, 'Apple Laptops', 'Apple Laptops', 1),
(26, 'Apple Laptops', 'Apple Laptops', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_category`
--

CREATE TABLE `tbl_main_category` (
  `maincat_id` int(10) UNSIGNED NOT NULL,
  `maincat_name` varchar(50) NOT NULL DEFAULT '',
  `maincat_description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_main_category`
--

INSERT INTO `tbl_main_category` (`maincat_id`, `maincat_name`, `maincat_description`) VALUES
(2, 'Desktop', 'Desktop'),
(1, 'Laptop', 'Laptop'),
(3, 'Peripherals', 'Peripherals'),
(25, '22', 'asdasd'),
(26, 'sdfsd', 'fsdfsdf'),
(27, 'sdfsdf', 'sdfsdf'),
(28, 'gfhfgh', 'fghfgh'),
(29, 'jhll', 'jkljkl');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pd_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `pd_name` varchar(100) NOT NULL DEFAULT '',
  `pd_description` text NOT NULL,
  `pd_price` decimal(9,2) NOT NULL DEFAULT '0.00',
  `pd_qty` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `pd_image` varchar(200) DEFAULT NULL,
  `pd_thumbnail` varchar(200) DEFAULT NULL,
  `pd_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pd_last_update` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pd_views` int(10) DEFAULT NULL,
  `hotdeals` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pd_id`, `cat_id`, `pd_name`, `pd_description`, `pd_price`, `pd_qty`, `pd_image`, `pd_thumbnail`, `pd_date`, `pd_last_update`, `pd_views`, `hotdeals`) VALUES
(1, 1, 'ACER eMachine 732Z, Dual Core ,1Gb,320GB,15.6 Led ', 'Acer eMachine eMe732z Specifications :\r\n\r\nOperating System : Linux (Linpus)\r\nCPU : Intel Pentium P6100 processor , 3MB L2 cache , 2GHz\r\nMobile Intel HM55 Express Chipset\r\nSystem memory\r\nDual-channel DDR3 SDRAM support\r\n1 GB DDR3 memory, upgradable to 4GB using two soDIMM modules\r\nDisplay : 15.6-inch HD 1366 x 768 (WXGA) pixel resolution,16:9 aspect ratio\r\nGraphics : Intel HD Graphics with 128 MB of dedicated system memory, supporting Microsoft DirectX 10\r\nHDMI (High-Definition Multimedia Interface) with HDCP (High-bandwidth Digital Content Protection) support\r\nAudio\r\nHigh-definition audio support with built-in stereo speakers\r\nMS-Sound compatible\r\nStorage\r\nHard disk drive: 320 GB\r\n2-in-1 card reader , Secure Digital (SD), MultiMediaCard (MMC)\r\nOptical media drive : 8X DVD-Super Multi double-layer drive\r\nWebcam with 1280 x 1024 resolution\r\nWLAN : 802.11 b/g/n Wi-Fi CERTIFIED\r\nLAN: Gigabit Ethernet, Wake-on-LAN ready ', '18500.00', 0, 'Dynet.jpg', 'Dynet.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 23, 1),
(2, 1, 'Acer Core i3 Laptop 4738 @ ACS INFOTECH Pune', 'Aspire 4738 (Ci3/2GB/Linux) Black\r\nIntel Core i3-380M processor (3 MB L3 cache, 2.53 GHz, DDR3 1066 MHz))/ Intel HM55Chipset / 2 GB DDR3 RAM / 14" HD / DVD Writer/ 500 GB HDD / BT/ MultiCR / GigaLAN / WebCam/ 3x USB Ports / HDMI/ /6\r\nCell/ LNX/ 1Yr/CC\r\nPrice Rs. 26,499', '26490.00', 0, 'esys_desktop.jpg', 'esys_desktop.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, 0),
(3, 1, 'Acer Aspire 4745 , Core i3 with Windows 7.0', 'PROCESSOR CORE i3\r\nGHZ,CACHE 2.13 GHz\r\nRAM 3 GB\r\nHDD 500 GB\r\nDISPLAY 14.1\r\nGRAPHICS 128 MB SH\r\nOPTICAL DRIVE DVD+RW\r\nWI-FI YES\r\nBLUETOOTH YES\r\nWEBCAM YES\r\nFINGERPRINT NO\r\nWEIGHT 2.7 KGS\r\nO.S Wind-7 HP\r\nL.B.P 32490*\r\nTaxes :- Extra On ', '32490.00', 0, 'hcl-desktop-pc.jpg', 'hcl-desktop-pc.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15, 0),
(4, 1, 'Acer Aspire 5742z, Dual Core ,500Gb,2Gb @ ACS Pune', 'Acer Aspire 5742z The new Acer Aspire 5742z is an affordable price 15.6-inch display laptop powered by the Intel Pentium processor and DDR3 memory .It is pre-loaded with the Windows 7 Home basic OS .\r\nAcer Aspire 5742z laptop specifications : Processor : 2.0 GHz Intel Pentium processor P6100 , 3 MB L3 cache Motherboard Chipset : Intel HM55 Chipset Display\r\nScreen Size : 15.6-inch HD LED\r\nMemory : 2GB DDR3\r\nHard Disk Drive : 500 GB HDD\r\nOptical Drive : DVD Writer\r\nLAN : Gigabit Ethernet LAN Wireless\r\nLAN : WiFi Sound speakers In-built Webcam Card Reader : Multi-Card Reader Bluetooth USB Port : 3 x USB Ports Battery : 6 Cell Operating system : Dos Colour : Black, Red, Brown ', '21990.00', 0, 'hp-Deskjet.jpg', 'hp-Deskjet.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, 1),
(5, 1, 'Acer Aspire 4750z, Dual Core ,500Gb,2Gb @ ACS Pune', 'Acer Aspire 4750z\r\nThe new Acer Aspire 4738z is an affordable price 14-inch display laptop powered by Intel Pentium Dual Core B940 processor and Intel GMA graphics.It is a basic entry level 14-inch display laptop sporting standard 3 USB ports and an HDMI port for connecting it to your TV .\r\n\r\nAcer Aspire 4738z laptop specifications :\r\n\r\nProcessor : Intel Pentium Dual Core B940, 2ND GEN CPU 2.10Ghz, 3MB L3 Cache\r\nOperating System : Free DOS\r\nMemory : 2GB DDR3 SDRAM 1066 MHz PC3-8500, Upto 8GB\r\nChipset : Intel HM55 Express Chipset\r\nHard Disk : 500GB SATA @ 5400RPM\r\nOptical Drive : DVD+RW/+R Writer\r\nDisplay Screen : 14-inch HD widescreen display ,1366 x 768 resolution\r\nGraphic Card : Intel Graphics Media Accelerator HD (Intel GMA)\r\nWireless LAN 802.11 b/g/n\r\nBluetooth\r\nWeb Camera\r\nHDMI Port\r\nUSB Port : 3\r\nEthernet LAN\r\nHigh Definition Audio\r\nDolby Digital Audio Speakers\r\n6 Cell Battery\r\n1 Year Warranty ', '20990.00', 0, 'esys_desktop.jpg', 'esys_desktop.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15, 0),
(6, 2, 'Dell -580S- Desktop @ ACS INFOTECH PUNE', 'DELL DESKTOP DC\r\n\r\nINTELDC2.8GHz/2GB/320GB/DVDRW/KBMS/\r\n18.5 LCD SCREEN /DOS/1 YEAR WARRANTY 23500', '23500.00', 0, 'hp-Deskjet.jpg', 'hp-Deskjet.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15, 0),
(7, 2, 'Dell Inspiron 14 R Laptop For Sale= ACS INFOTECH= ', 'Dell Inspiron 14R Technical Specification:\r\n14.0? inch (1366x768 pixels) Widescreen HD Display with TrueLife\r\nIntel Core i3-380M Processor (2.53Ghz, 1066MHz FSB, 3MB cache)\r\nIntegrated Intel High Definition Graphics\r\n3GB DDR3 1066 MHz RAM\r\n320GB Sata Hard Disk\r\nO.S:- DOS\r\nTray Load DVD+/-RW\r\nWi-Fi 802.11 b/g/n\r\nBluetooth v2.1+EDR\r\nMemory Card Reader\r\nWebcam with Mic\r\nSRS Premium Sound with Stereo Sound\r\n6-cell Lithium Ion Battery\r\n65 W AC Adapter\r\n', '29500.00', 0, 'hp-desktop.jpg', 'hp-desktop.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 11, 0),
(8, 2, 'Dell Inspiron 15 R Laptop For Sale =ACS INFOTECH=', 'Dell Inspiron 15R Technical Specification:\r\nWindows 7 Home Premium OS\r\n15.6? inch (1366 pixels) Widescreen HD Display with TrueLife\r\nIntel Core i3-380M Processor (2.53Ghz, 1066MHz FSB, 3MB cache)\r\nIntegrated Intel High Definition Graphics\r\n3GB DDR3 1066 MHz RAM\r\n320GB Sata Hard Disk\r\nTray Load DVD+/-RW\r\nWi-Fi 802.11 b/g/n\r\nBluetooth v2.1+EDR\r\nMemory Card Reader\r\nWebcam with Mic\r\nSRS Premium Sound with Stereo Sound\r\n6-cell Lithium Ion Battery\r\n65 W AC Adapter\r\n', '33990.00', 0, 'Kingston.jpg', 'Kingston.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, 0),
(9, 2, 'Dell Inspiron 14R Laptop 4Gb,500GB', 'DELL Inspiron\r\nSystem Ins 14R\r\nProc CORE i3-370M 2.4 GHZ\r\nO/S DOS\r\nRAM 4GB\r\nHDD 500GB\r\nGraph. Intel Onboard\r\nODD DVD RW\r\nAntivirus n/a\r\nScreen 14.0 WLED\r\nService CC\r\nKBD Std\r\nColor Black\r\nSoftware No\r\nBackpack NO\r\nBattery 6-cell\r\nA.S.P 35000\r\nMODEL NEW', '35000.00', 0, 'Dynet.jpg', 'Dynet.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 0),
(10, 2, 'Dell All in One Desktop Ins.One 19 @ ACS INFOTECH', 'INS.One 19 AIO= Dual Core 2.7/ 2gb / 320 / DVD /1.3mp Camera / 18.5 screen / Card Reader / Lan / Serial & parallel port / Free Dos / wireless KB & M / 3-3-3 years Onsite Warrantyï¿½ï¿½', '28990.00', 0, 'esys_desktop.jpg', 'esys_desktop.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 16, 1),
(11, 3, 'External TV Tunner Gadmei XGA/VGA LCD TV @ ACS', 'Product Features\r\nHighest resolution: 1280 X 1024 /75Hz\r\nResolution rate up to 800*600, 1024*768 or 1280*1024\r\nRefresh rate up to 60Hz or 75Hz\r\nBuilt-in Speaker\r\nStereo FM function\r\nWorks without your PC, no drivers or software needed\r\nSimply plug in an aerial lead, and connect to your LCD or CRT monitor\r\nConnect a set of speakers for sound\r\nCompatible with LCD/CRT monitors, PDP and Projectors\r\nThis TV BOX is a high quality digital colour PCTV, with 24 bits true colour picture\r\nUnique MMI AV Cable can be connected with DVD/PS2/XBOX/Game CUBE/VCR\r\nSupports multipicture, exploring\r\n4,9 or 16 Thumbnail scanning of TV channels\r\nYou can quickly see what''s on every channel\r\nSupports watching TV under windows system (PIP) Function\r\n3D noise-reduction\r\nFull subjoin channel receiving and compatible with Cable TV and Wireless TV of a PAL/I system, up to 256 channels\r\nNo installation software needed, compatible with any PC system\r\nPlug and Play, cot occupying computer resource\r\nFull function remote control\r\nSame as colour TV interface, convenient operateration\r\nOSD display control on the PC model', '1400.00', 0, 'hcl-desktop-pc.jpg', 'hcl-desktop-pc.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 16, 0),
(12, 3, 'All Desktop & Laptops Accessories @ ACS INFOTECH', '1TERABYTE SEAGATE SATA RS.3650/-\r\n1 TERBAYTE EXTERNAL SEAGATE RS.5125/-\r\n1 TERABYTE WD EXTERNAL RS.4800/-\r\n1 TERBAYTE IOMEGA EXTERNAL RS.4700/-\r\n\r\n40GB DESKTOP IDE RS.1350/-\r\n80GB IDE DESKTOP RS. 1800/-\r\n160GB IDE DESKTOP RS.2350/-\r\n320GB IDE DESKTOP RS.2975/-\r\n\r\n320GB WD DESKTOP SATA RS.1760/-\r\n500GB SEAGTE DESKTOP SATA RS.2025/-\r\n1 TERABYTE HITACHI SATA RS.3650/-\r\n\r\n\r\n320GB PORTABLE IOMEGA RS.3275/-\r\n500GB PORTABLE SEAGTE RS.4400/-\r\n\r\nLaptop Accessories\r\n@ LOWEST RATE,\r\n@ Best Support and best quality assured.', '3650.00', 0, 'hp-Deskjet.jpg', 'hp-Deskjet.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, 0),
(13, 3, 'All Desktop Spare Parts @ ACS INFOTECH', 'DETAILS OF Materials Intel Atom 1.8ghz. intel Mother Board\r\nCPU & M/B\r\nWarranty Rs.3000/-\r\n\r\n3- Year From Co.\r\nDDR II RAM\r\n3-Year Warranty Rs.1600/- (1GB)\r\n\r\nTranscend 667\r\nOPTICAL DRIVE\r\n1- Year Warranty Rs.1050/(DVDRW)\r\n\r\nMONITOR/ LCD\r\n3- Years Warranty RS 5250/ (16ï¿½LCD)\r\nSamsung/LG\r\n\r\nATX CABINET\r\n2- Years Warranty RS 1275\r\nVIP Or Circle\r\n\r\nSCROLL MOUSE\r\n1-Year Warranty RS 375/-\r\nLogitech Optical\r\n\r\nKEYBOARD\r\n1-Year Warranty RS 400/-\r\nLogitech Multimedia\r\n\r\nSPEAKERï¿½S\r\n1- Year Warranty RS 450/-\r\n\r\nCreative 2-speaker\r\nHARD DISK\r\n5- Year Warranty RS.1950/-(250GB)\r\n\r\nSATA - Seagate\r\nWarranty Charges\r\n( This is Optional , Only Parts Carry In W) Rs.1250/-\r\nAssembling& Installation Charges\r\n\r\nTOTAL RS 16600/-', '1900.00', 0, 'hp-desktop.jpg', 'hp-desktop.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 13, 1),
(14, 3, 'Samsung External DVD Writer @ ACS INFOTECH', 'The SE-S084B series adopts a single interconnect cable for both data transmission and power supply. The DVD writer is connected through a USB port without the need for a separate power cable. This tray-type slim DVD writer weighs less than a pound (0.4kg) making it an easy-to-carry portable device.\r\n\r\n"By adopting lead-free soldering technology, the SE-S084B has an eco-friendly design and is RoHS compliant" said Jin-soo Lee, vice president of strategic marketing for Toshiba Samsung Storage Technology. "The new external DVD writers offer a wide choice of color and added portability for enhanced usability."\r\n\r\nAs with Samsung''s complete WriteMaster optical disc drive lineup, the SE-S084B features specific technology including SAT (Speed Adjustment Technology), TAC(Tilt Actuator Compensation) and Double OPC (Optimum Power Control). Buffer Under Run Free Technology supports stable writing under high speed, and Magic Speed and ABS (Automatic Ball Balancing System) technologies that reduce vibration and noise.\r\n\r\nThe new external DVD is available in an 8X DVD+R and DVD-R writer, a 6X DVD+R and -R Dual Layer writer, and a 5X DVD-RAM writer, with color options of black, white, silver, pink, blue, sky-blue and red. The SE-S084B series is available now in the INDIA @ Rs. 1990\r\n\r\nLimited Period Offer ', '1900.00', 0, 'Kingston.jpg', 'Kingston.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 20, 0),
(15, 3, 'Assembled Computer Price @ ACS INFOTECH ', 'DETAILS OF Materials\r\nIntel C-D 3.0 Ghz Intel Orignl\r\nCPU & M/B Warranty Rs. 8500/-\r\n3- Years From Co.\r\n\r\nDDR III RAM\r\n3-Year Warranty RS.1300 (2GB)\r\nTranscend 1333\r\n\r\nOPTICAL DRIVE\r\n1- Year Warranty Rs.1050 (DVD Rw)\r\nMONITOR/ LCD\r\n\r\n3- Years Warranty Rs.6100/-(20 LCD )\r\nWide Samsung/LG\r\n\r\nATX CABINET\r\n2- Years Warranty RS 1300/- ( 2-Fan)\r\nVIP Or Circle\r\n\r\nSCROLL MOUSE\r\n1-Year Warranty RS 400/-\r\nLogitech Optical\r\n\r\nKEYBOARD\r\n1-Year Warranty RS 400/-\r\nLogitech Multimedi\r\n\r\nSPEAKERï¿½ï¿½ï¿½S\r\n1- Year Warranty RS 450/-\r\nArtist / Creative\r\n\r\nHARD DISK\r\n3- Year Warranty RS 3200/-(1TB)\r\nSATA Seagate\r\n\r\nWarranty Charges\r\n( This is Optional , Only Parts Carry In W) Rs.1500/-\r\nAssembling& Installation Charges\r\n=====================================', '0.00', 0, 'Dynet.jpg', 'Dynet.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 0),
(16, 3, 'Assembled Computer Dealer in PUNE', 'DETAILS\r\nDISCIPTION AS COMPUTERS:-\r\n\r\n1) Intel Dual Core 3.0 Ghz. Intel 41RW Orignal\r\nMother Board.+ CPU & M/B 3 Year Wararnty RS 5700/-\r\n\r\n2) DDR III RAM\r\n3-Year Warranty RS.1250 (2GB )\r\nTranscend DDR-2\r\n\r\n3) Dvd Writer\r\n1- Year Warranty RS900/(DVDRW)\r\n\r\n\r\n4) MONITOR/ LCD\r\n3-Year Warranty. Rs.5500/(18.5ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½Lcd)\r\nLG - Make 3-Year Warranty\r\n\r\n\r\n5) ATX CABINET RS 1250/-\r\nVIP Or Circle ( 2- Year Warranty )\r\n\r\n6) SCROLL MOUSE RS 300/-\r\nLogitech Optical ( 1- Year Warranty )\r\n\r\n7) KEYBOARD RS 400/-\r\nLogitech Multimdia ( 1- Year Warranty )\r\n\r\n\r\n8) SPEAKERS 400/- Creative / Logitech\r\n( 1- Year Warranty )\r\n\r\n9) HARD DISK RS 200 0/-(500Gb)\r\nSATA Seagate ( 3- Year Warranty )\r\n\r\n10 ) Installation & Asembling Charges:- RS 500-\r\n', '18000.00', 0, 'esys_desktop.jpg', 'esys_desktop.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 0),
(17, 3, 'Assembled Computer Dealer in Pune= ACS INFOTECH=', 'INTEL ATOM 1.6GHZ + Mother Board\r\nCPU & M/B\r\nWararnty Rs :- 3000/-\r\n3- Year From Co.\r\n\r\nDDR II RAM\r\n3-Year Warranty Rs.1000/- (1GB)\r\nTranscend DDR-2\r\n\r\nDvd Writer\r\n1- Year Warranty Rs.900/(DVDRW)\r\nMONITOR/ LCD\r\n\r\n3-Year Warranty. RS 4550/ (16 Lcd)\r\nLG\r\n\r\nATX CABINET RS 1250/-\r\nVIP Or Circle\r\n\r\nSCROLL MOUSE RS 300/-\r\nLogitech Optical\r\n\r\nKEYBOARD RS 450/-\r\nLogitech Multimedia\r\n\r\nSPEAKERï¿½S RS 400/-\r\nCreative 2-speaker\r\n\r\nHARD DISK RS.1850/-(320GB)\r\nSATA - Seagate\r\n\r\n1 Yr Onsite Warranty Installation & Assem RS 1250/-\r\n\r\n', '20000.00', 0, 'hcl-desktop-pc.jpg', 'hcl-desktop-pc.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 0),
(18, 4, 'INTEL CORE-I 3 NEW COMPUTER FOR SALE', 'Intel Corei 3.CPU, Intel 55PJ Orgnal Mother Board. CPU & M/B Wararnty RS 9500/- 3- Years From Co.\r\n\r\nDDR III RAM 3-Year Warranty RS.1250 (2GB ) Transcend DDR-3\r\n\r\nDvd Writer 1- Year Warranty RS 900/(DVDRW)\r\n\r\nMONITOR/ LCD 3-Year Warranty. Rs 5750/(20Lcd) Samsung/LG\r\n\r\nATX CABINET RS 1250/- VIP Or Circle\r\n\r\nSCROLL MOUSE RS 300/- Logitech Optical\r\n\r\nKEYBOARD RS 450/- LogitechMultimdia\r\n\r\nSPEAKER Set RS 1100/- Creative 2:1 Wofer\r\n\r\nHARD DISK RS 2800/-(1TB) SATA Seagate\r\n====================================== Note:- Prices may Change ,Pl Call Before Placing Order ', '0.00', 0, 'seagate-portable.jpg', 'seagate-portable.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 6, 0),
(22, 4, 'INTEL CORE-2 DUO NEW COMPUTER FOR SALE', 'Description :\r\nIntel C2D 2.9 Ghz.\r\nIntel RQ 31 Orignal Mother Board. CPU & M/B Wararnty RS 8000/- 3- Years From Co.\r\n\r\nDDR III RAM 3-Year Warranty RS.1250 (2GB )\r\nTranscend DDR-3\r\n\r\nDvd Writer 1- Year Warranty RS900/(DVDRW)\r\n\r\nMONITOR/ LCD 3-Year Warranty. Rs.6250/(20 Lcd) Samsung/LG\r\n\r\nATX CABINET RS 1250/- VIP Or Circle /I-Boll SCROLL MOUSE RS 300/- Logitech Optical\r\n\r\nKEYBOARD RS 450/- Logitech Multimdia\r\n\r\nSPEAKER Set RS 1100/- Creative 2:1 Wofer\r\n\r\nHARD DISK RS 2850/-(1TB) SATA Seagate\r\n=====================================\r\nPrice may Change Any time , Pl Confirm Exact Price Before Placing Order\r\n\r\n\r\n\r\n', '0.00', 0, 'ViewSonic_LCD_Monitor.jpg', 'ViewSonic_LCD_Monitor.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 0),
(23, 5, 'HP DreamScreen 400 All in One Tablet', 'The new HP DreamScreen 400 is a 18.5-inch all-in-one touchscreen desktop computer . It is pre-loaded with a Linux based operating system .\r\nThe developed in India, for Indiaï¿½ tabletop product is designed to enhance education, deliver news and entertainment, link families, enrich spiritual life and provide access to the web via a touch interface.\r\n=========================================\r\nHP DreamScreen 400 touchscreen All-in-one Tablet :\r\n\r\n18.5 inches touch-enabled widescreen display\r\nIntel Processor\r\n250GB hard disk drive\r\n2 Gb RAM\r\n1.3MP webcam\r\nWall mountable\r\nBuilt-in webcam and microphone for video calls with friends and\r\nfamily\r\nBuilt-in stereo speakers deliver high quality stereo sound\r\n2 USB v2.0 ports\r\nEthernet LAN port\r\nOptical Disk Drive\r\nMulti Card Reader\r\nVolume Control Button\r\nBrightness Control Button\r\nWireless LAN Connectivity ', '20990.00', 0, 'Kingston.jpg', 'Kingston.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 0),
(24, 5, 'HP TouchSmart tm2-2102tu Notebook PC', 'Laptop Specifications :\r\n\r\nSystem Features :\r\nOperating System Installed : Genuine Windows 7 Home Premium 64-bit\r\nProcessor : Intel Core i3-380UM Processor , 1.33 GHz\r\nChipset : Intel HM55 Chipset\r\nMemory :\r\nStandard Memory : 3 GB DDR3 (1 x 1024 MB + 1 x 2048 MB)\r\nMaximum Memory : Supports up to 8 GB DDR3 memory\r\nMemory Slots : 2 User accessible memory slots\r\nStorage :\r\nInternal Drives : 320 GB SATA Hard Disk Drive, 7200 rpm\r\nDisplay :\r\nDisplay (Monitor) Size : 30.7 cm (12.1") diagonal High-Definition HP BrightView Touchscreen Convertible Display\r\nDisplay Resolution : 1280 x 800\r\nGraphics : Intel HD Graphics\r\nExpansion Features :\r\nPorts :\r\n1 VGA port\r\n1 HDMI Port\r\n1 headphone-out/microphone-in combo jack\r\n3 USB 2.0 Ports\r\n1 RJ45 ethernet port\r\nSlots : 5-in-1 integrated Digital Media Reader for Secure Digital cards, MultiMedia cards, Memory Stick, Memory Stick Pro or xD Picture cards\r\nMedia Devices :\r\nWebcam : HP TrueVision Webcam with Integrated Digital Microphone (VGA low-light)\r\nAudio Features : Altec Lansing speakers - Dolby Advanced Audio\r\nInput Devices :\r\nPointing Device : HP Clickpad with On/Off button\r\nKeyboard : Full size island-style keyboard\r\nCommunications :\r\nNetwork Interface : Integrated 10/100/1000 Gigabit Ethernet LAN\r\nWireless Technologies :\r\n802.11 b/g/n\r\nBluetooth Wireless Networking\r\nDimensions and Weight :\r\nProduct Weight : Starting at 1.893 kg\r\nProduct Dimension (W x D x H) : 23.0 cm x 32.6 cm x 2.43 cm / 3.00 cm\r\nPower :\r\nPower Supply Type : 65W AC Power Adapter\r\nEnergy efficiency compliance : ENERGY STAR qualified\r\nSecurity :\r\nSecurity Management : Kensington MicroSaver lock slot; Power-on password; Accepts 3rd party security lock devices; Integrated Fingerprint reader\r\nIncluded with Purchase :\r\nWarranty : 1 year, parts and labor', '34990.00', 0, 'Dynet.jpg', 'Dynet.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 0),
(25, 5, 'HP Pavilion dv Series Laptop Price ', '"dv6 IMR\r\n\r\nDV6-6115Tx DV6-6044Tx LZ801PA#ACJ QB363PA#ACJ "2nd Gen i5- 1GB Dedicated\r\nGraphics" 2nd Gen. Core i5-2410M - 2.3 GHz ( with TB upto 2.9Ghz) / 3MB Processor , 4 GBDDR3 RAM , 500 GB HDD , Windows 7 Home Basic (64-Bit) , Wireless , Bluetooth , 1 GB GDDR5 Dedicated Graphics Radeon 6490MEspresso Black 15.6" HD LED Backlit WS 42,083 + VAT\r\n\r\n======================================\r\nDV4-3016Tx "LQ389PA#ACJ\r\n" "2nd Gen i5- 1GB Dedicated\r\nGraphics" 2nd Gen. Core i5-2410M - 2.3 GHz ( with TB upto 2.9Ghz)/ 3MB Processor , 4 GBDDR3 RAM , 500 GB HDD , Windows 7 Home Basic (64-Bit) , Wireless , Bluetooth , 1 GB GDDR5 Dedicated Graphics Radeon 6750M Ultra Fast Espresso Black 14.1" HD LED Backlit WS 42,083 + VAT\r\n\r\n======================================\r\nDV6-6043Tx DV6-6116Tx QB362PA#ACJ LZ802PA#ACJ "2nd Gen i3- 1GB Dedicated\r\nGraphics" "2nd Gen. Core i3-2310M - 2.1 GHz/ 3MB Processor ,\r\n4 GBDDR3 RAM, 500 GB HDD , Windows 7 Home Basic (64-Bit) , Wireless , Bluetooth , 1 GB GDDR5 Dedicated Graphics Radeon 6490M" Espresso Black 15.6" HD LED Backlit WS 39,512 +VAT\r\n\r\n======================================\r\n"dv6-6018TX\r\n" "LQ461PA#ACJ\r\n" "2nd Gen i3- 1GB Ded.\r\nGraphics 2nd Gen. Core i3-2310M - 2.1 GHz/ 3MB Processor , 3 GBDDR3 RAM , 500 GB HDD , Windows 7 Home Basic (64-Bit) , Wireless , Bluetooth , 1 GB GDDR5 Ded. Graphics Radeon 6490M "Espresso Black\r\n"15.6"" HD LED Backlit Widescreen\r\n" 38,440 +VAT\r\n\r\n======================================\r\nDV4-3015Tx LQ388PA#ACJ "2nd Gen i3- 1GB Dedicated\r\nGraphics" "2nd Generation Core i3-2310M - 2.1 GHz/ 3MB Processor ,\r\n3 GBDDR3 RAM , 500 GB HDD , Windows 7 Home Basic (64-Bit) , Wireless , Bluetooth , 1 GB GDDR5 Dedicated Graphics Radeon 6750M Ultra Fast" Espresso Black 14.1" HD LED Backlit WS 38,482 + VAT\r\n\r\n======================================\r\ndv6-6003TU LQ387PA#ACJ\r\n2nd Gen i5- Integrated Graphics\r\n"intel 2nd Gen. Core i5-2410M - 2.3 GHz (with TB upto2.9Ghz)/ 3MB Processor ,\r\n3 GBDDR3 RAM , 500 GB HDD , Windows 7 Home Basic (64-Bit) , Wireless , Bluetooth, Intel HD Graphics 3000 Espresso Black\r\n" "15.6"" HD LED Backlit Widescreen\r\n" 38,420 + vat\r\n\r\n==============================\r\n"dv6-600 TU\r\n" "LQ3867PA#ACJ\r\n" "2nd Gen i3- Integrated\r\nGraphics\r\n" "2nd Gen. Core i3-2310M - 2.1 GHz (with TB upto2.9Ghz)/ 3MB Processor ,\r\n3 GBDDR3 RAM , 500 GB HDD , Windows 7 Home Basic (64-Bit) , Wireless , Bluetooth, Intel HD Graphics 3000\r\n" "Espresso Black\r\n" "15.6"" HD LED Backlit Widescreen\r\n" 36,400 + vat\r\n======================================\r\n', '0.00', 0, 'esys_desktop.jpg', 'esys_desktop.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 0),
(26, 5, 'HP Pavillion G- Series Laptop Price List ', 'G6-1118TX 2nd Gen i5- 1GB Ded. Graphics\r\n2nd Gen. Core i5-2410m - 2.33 GHz /3MB Processor , 4 GBDDR3 RAM , 640 GB HDD , Windows 7 Basic- 64 bit with Office Starter , Wireless , Bluetooth , 1 GB Ded. Graphics ATI RADEON 6470M Charcoal Grey,15.6"" HP HD BrightView LED 40,500/-\r\n\r\n=====================================\r\nG4-1121TX QB404PA#ACJ "2nd Gen i5- 1GB Ded. Graphics " "2nd Gen. Core i5-2410m - 2.33 GHz /3MB Processor , 4 GBDDR3 RAM , 640 GB HDD , Windows 7 Basic- 64 bit with Office Starter , Wireless , Bluetooth , 1 GB Ded. Graphics ATI RADEON 6470M "Sonoma Red 14.0 HP HD BrightView LED = 39900\r\n==================================\r\n"g6-1017TU LR774PA#ACJ\r\n"Intel 2nd Gen i5- Integrated Graphics\r\n2nd Gen. Core i5-2410m - 2.33 GHz /3MB Processor , 4 GBDDR3 RAM , 500 GB HDD , Windows 7 Basic with Office Starter , Wireless , Bluetooth , Intel HD Graphics 3000 Charcoal Grey\r\n15.6"" HP HD BrightView LED 36,619\r\n===================================\r\n"g4-1009TU" "LN403PA#ACJ\r\n\r\n"Intel 2nd Gen i5- Integrated Graphics 2nd Gen. Core i5-2410m - 2.33 GHz /3MB Processor , 4 GBDDR3 RAM , 500 GB HDD , Windows 7 Basic with Office Starter , Wireless , Bluetooth , Intel HD Graphics 3000 Sonoma Red 14.0 HP HD BrightView LED 35,666\r\n====================================\r\nG6-1117TX QB406PA#ACJ "2i3-1GB\r\nDed. Grfx" "2nd Gen. Core i3-2310m Processor , 3 GBDDR3 RAM , 500 GB HDD , Windows 7 Basic- 64 bit with Office Starter , Wireless , Bluetooth , 1 GB Ded. Graphics ATI RADEON 6470M Charcoal Grey 15.6"" HP HD BrightView LED 34500/-\r\n=====================================\r\nG4-1120TX QB402PA#ACJ "2i3-1GB\r\nDed. Grfx" "2nd Gen. Core i3-2310m Processor , 3 GBDDR3 RAM , 500 GB HDD , Windows 7 Basic- 64 bit with Office Starter , Wireless , Bluetooth , 1 GB Ded. Graphics ATI RADEON 6470M Sonoma Red\r\n14.0"" HP HD BrightView LED =34,619', '0.00', 0, 'hp-Deskjet.jpg', 'hp-Deskjet.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 0),
(27, 5, 'Compaq Laptop Price List = ACS INFOTECH=', 'COMPAQ PRESARIO:- CQ62-452TU\r\nINTEL Core i5 460M - 2.53 GHz/3GB/500GB/DOS Black15.6" BrightView LED 31,190\r\n===================================\r\nCOMPAQ PRESARIO CQ42-462TU\r\nINTEL Core i5 460M - 2.53 GHz/3GB/320GB/DOS Black14.0" BrightView LED 30,130\r\n\r\n====================================\r\nCompaq 621 621-OS Intel C2D T6670/2GB DDR3/320GB/Win7 Basic/WTBT/15.6"/512MB VRAM Red 15.6" BrightView LED\r\n27,270\r\n======================================COMPAQ CQ62-455TU Intel Core i3-380M/2GB/500GB/DOS Black 15.6" BrightView LED 26,670\r\n\r\n=====================================\r\nCompaq 621 621-DOS\r\nIntel C2D T6670 /2.2GHz/2GB/320GB/FreeDOS/WTBT/ 15.6"/512MB VRAM Black & Red15.6" BrightView LED 25,250\r\n\r\n================================\r\nCQ42-464TU Intel PDC T6200 -\r\n\r\n2.13GHz/2GB/500/Win7Basic Black 14.0" BrightView LED 24,230\r\n====================================\r\nCQ42-463TU CQ42-463TU Intel PDC T6200 - 2.13GHz/2GB/500GB/DOS Black 14.0" BrightView LED 21,410\r\n=====================================\r\nCQ42-451TU Intel PDC T6200 - 2.13GHz/2GB/320GB/DOS Black 14.0" BrightView LED 21,110\r\n\r\n====================================\r\nCQ62-454TU Intel PDC P6200 - 2.13GHz/1GB/320GB/DOS Black15.6" BrightView LED 20,700\r\n\r\n====================================\r\nCompaq 325 CQ325 AMD V140, DDR3 1066 MHz)/1GB DDR3/250GB/Win7 Starter/WTBT/13.3" Black & Red 13.3" BrightView LED 20,450\r\n\r\n====================================\r\nCOMPAQ CQ42-450TU Intel PDC P6200 - 2.13GHz/1GB/320GB/DOS Black 14.0" BrightView LED 20,200 ', '0.00', 0, 'hp-desktop.jpg', 'hp-desktop.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, 0),
(28, 5, 'HP Pavillion Dv-6 with Graphic Card Laptop @ ACS', 'Pavilion dv6 DV6-6115Tx/DV6-6044Tx\r\n\r\n2nd Generation Core i5-2410M - 2.3 GHz ( with TB upto 2.9Ghz)/ 3MB Processor , 4 GBDDR3 RAM , 500 GB HDD , Windows 7 Home Basic (64-Bit) , Wireless , Bluetooth , 1 GB GDDR5 Dedicated Graphics Radeon 6490M Espresso Black 15.6" HD LED Backlit Widescreen 42,083\r\n=================================\r\nPavilion dv4 DV4-3016Tx\r\n\r\n2nd Generation Core i5-2410M - 2.3 GHz ( with TB upto 2.9Ghz)/ 3MB Processor , 4 GBDDR3 RAM , 500 GB HDD , Windows 7 Home Basic (64-Bit) , Wireless , Bluetooth , 1 GB GDDR5 Dedicated Graphics Radeon 6750M Ultra FastEspresso Black, 14.1" HD LED Backlit Widescreen 42,083\r\n\r\n======================================\r\nPavilion dv6 DV6-6043Tx/DV6-6116Tx\r\n\r\n"2nd Generation Core i3-2310M - 2.1 GHz/ 3MB Processor , 4 GBDDR3 RAM , 500 GB HDD , Windows 7 Home Basic (64-Bit) , Wireless , Bluetooth , 1 GB GDDR5 Dedicated Graphics Radeon 6490M" Espresso Black 15.6" HD LED Backlit Widescreen 39,512\r\n\r\n===================================\r\nPavilion dv6 DV6-6018Tx\r\n\r\n"2nd Generation Core i3-2310M - 2.1 GHz/ 3MB Processor , 3 GBDDR3 RAM , 500 GB HDD , Windows 7 Home Basic (64-Bit) , Wireless , Bluetooth , 1 GB GDDR5 Dedicated Graphics Radeon 6490M" Espresso Black 15.6" HD LED Backlit Widescreen 38,434\r\n\r\n=====================================\r\nPavilion dv4 DV4-3015Tx\r\n\r\n"2nd Generation Core i3-2310M - 2.1 GHz/ 3MB Processor , 3 GBDDR3 RAM , 500 GB HDD , Windows 7 Home Basic (64-Bit) , Wireless , Bluetooth , 1 GB GDDR5 Dedicated Graphics Radeon 6750M Ultra Fast" Espresso Black 14.1" HD LED Backlit Widescreen 38,482\r\n\r\n====================================\r\nPavilion dv6 DV6-6003TU\r\n\r\n2nd Generation Core i5-2410M - 2.3 GHz (with TB upto2.9Ghz)/ 3MB Processor , 3 GBDDR3 RAM , 500 GB HDD , Windows 7 Home Basic (64-Bit) , Wireless , Bluetooth, Intel HD Graphics 3000 Espresso Black 15.6" HD LED Backlit Widescreen 38,500 ', '38500.00', 0, 'Wireless_PCI_Card.jpg', 'Wireless_PCI_Card.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 16, 0),
(29, 6, 'LAPTOPS BATTERY , ADAPTOR PRICE LIST IN PUNE =ACS', 'Laptops Accessories and Spares Part Price list 1)Compaq/HP 65W Adaptor (1-Year Warranty) 1650/- 2)Compaq/HP 90W Adaptor (1-Year Warranty) 2200/- 3)Dell 65W ,19.5v,3.42Amp (1-Year Warranty) 1500/- 4)Dell 90W ,19.5V,4.62Amp (1-Year Warranty) 1800/- 5)Sony Vaio 65W ,19.5 V ,3.5A (1-YrWarnaty) 2400/- 6)Toshiba 65W Adaptor(1-Year Warranty) 1500/- 7)Lenovo 65W Adaptor(1-Year Warranty) 1800/- 8)Acer 65W Adaptor(1-Year Warranty) 1800/- 10)1 GB DDR-2 Laptop RAM (Transcend co.) 1250/- 11) 2 GB DDR-2 Laptop RAM(Transcend co ) 2200/- 12) 2 GB DDR-3 Laptop RAM (Transcend co.) 1850/- 13)4 GB DDR-3 Laptop RAM(Transcend co ) 4200/- 14) 512MB DDR-1 Laptop RAM( Trans. Co.) 1200/- 12) 1GB DDR-1 Laptop RAM 333Mhz.(Tran.) 2450/- 13) Laptop 320GB Sata Seagate Harddisk (3-Yr w) 3000/- 14) Laptop 500GB Sata Seagate Harddisk (3-Yr w) 3500/- 15) Laptop 160GB IDE Samsung Harddisk (3-Yr w) 3500/- 16)External 320 GB Seagete Harddisk ( 3-Yr w) 2700/- 17) External 500 GB Seagate Harddisk ( 3-Yr W) 3500/- 18)External 1TB Seagate HDD ( 3-Yr w) 5700/- 19) Compatible Battery For Compaq /HP 2000/- 20) HP Original Battery For Compaq /HP - 3500/- 21) Keypad Compaq/Dell/Toshiba(New) 3 Months Warranty 1500/- 22) Dvd Writer Fr HP/Acer/Dell (New) 1Yr w 2500/- 23) Slot IN Dvd Writer Fr.Lenovo/Dell 1Yr w 4500/- 24) Dvd Writer Fr Toshiba/IBM ThinkPad 4500/- ', '1500.00', 0, 'wireless-adsl-modem-router.jpg', 'wireless-adsl-modem-router.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 13, 0),
(30, 6, 'LAPTOP LCD SCREEN DEALER IN PUNE', '	\r\n\r\n1)14.1 Wide LCD Screen ( 3-Months Wrty) 4750/- 2)15.4 Wide LCD Screen ( 3-Months Wrty) 4750/- 3)14.1 Wide LCD Screen (12-Months Wrty) 6000/- 4)15.4 Wide LCD Screen ( 12-Months Wrty) 6000/-\r\n5)14.0 Wide LCD Screen ( 3-Months Wrty) 4000/- 6)14.0 Wide LCD Screen ( 12-Months Wrty) 5500/-\r\n7)14.0 Square LCD Screen ( 3- Mnths Wrty) 6000/-\r\n8)15.0 Square LCD Screen (3 -Mnths Wrty) 6000/-9)14.0 Square LCD Screen (12-Mnths Wrty) 7250/-\r\n10)15.4 Square LCD Screen ( 12-Mnths Wrty) 7250/-\r\n11)15.6 Wide LCD Screen ( 3-Months Wrty) 5500/-\r\n12)15.6 Wide LCD Screen ( 12-Months Wrty) 7000/-\r\n13) 15.6 Wide LED Screen ( 3-Months Wrty) 5500/-\r\n14)14.1. Wide LED Screen ( 3-Months Wrty) 5500 *\r\n27) Display Cable For Laptops ( 3-Months W) 1800/-\r\n*28) Inverter System For Laptops (3-Mnths W) 1750/-\r\n*29) Motherboards For Laptops ( 3-Mnths W) 8000/- *\r\n30) Hinge(1Nos.) For Laptops (1- Months W) 1500/-\r\n(* Approximate Quote, Prices may vary from Laptops Make & Model No. Pl Call Confirm before Placing Order)\r\n1)Payment : 50% Advance 50% after Delivery Cheque in favor of ACS INFOTECH 2)Taxes :5% VAT included as above price & Octrio Extra if Applicable. 3)Delivery : 24 Hours. from the Confirmed P.O. 4) Transportation:- All Material Delivery in PUNE city only. ACS INFOTECH PUNE II Floor, Shastri Commercial Complex Near Laxminarayan Theatre, Gultekdi Road Mukundnagar Corner, Pune 37 Ph:- + 91 2024266775 / 24265064 Hand phone: 9372025127 / 9422025127 Email: info@acsinfotech.net Website: www.acsinfotech.net ', '4000.00', 0, 'ViewSonic_LCD_Monitor.jpg', 'ViewSonic_LCD_Monitor.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 25, 0),
(31, 6, 'Laptops MotherBoard Price List Pune=ACS Infotech', '	\r\n\r\nLaptop Motherboards\r\n\r\nWe offer a wide range of laptop motherboards for all reputed brands such as Compaq ,Dell , HP, Sony, Lenovo , IBM ,Acer . The random access memory, central processing unit, disk drives, hard drive and optical drives are all plugged into interfaces on the motherboard. Our range of laptop motherboards is offered at most effective\r\n\r\nLaptop Mother Board Starts form 6500 to 15500/-\r\n\r\nPlease Call Before Placing Order For Motherboard', '0.00', 0, 'seagate-portable.jpg', 'seagate-portable.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 20, 0),
(32, 7, 'LENOVO LAPTOP PRICE LIST = ACS INFOTECH PUNE=', 'LENOVO IDEAPAD & IDEACENTRE - GANESH FESTIVAL BONANZA OFFER=Call 9422025127-Yunus\r\nLenovo IdeaPad S10 III & S100 Series Atom Processor Mini Netbook - One Yr\r\nS100 (59300428) Intel Atom N455 1.66GHz/1GB/250GB/CAMERA/BTH/10.1 WSVGA/DOS @ Rs 15,250/- (Black Color)\r\nS10 III (59051325) Intel Atom N455 1.66GHz/1GB/250GB/CAMERA/BTH/10.1 WSVGA/MacAfee/WIN 7S @ Rs. 16,250/- (Black Color)\r\nS100 (59300427) Intel Atom N455 1.66GHz/2GB/320GB/CAMERA/BTH/10.1 WSVGA/MacAfee/WIN 7S @ Rs. 18,500/- (Black Color)\r\nLenovo Ideapad G Series Dual Core/Core i3 Processor Notebook - One Yr\r\nG570 (59301881) - Intel 2nd Gen B940 2.0GHz/2GB/500GB/DVDRW/CAMERA/15.6ï¿½ WXGA//Num Pad/DOS @ Rs. 23,500/-\r\nG560 (59304299) Intel Core i3 370M 2.4 GHz/2GB/500GB/DVD-RW/CAMERA/BTH/CR/15.6ï¿½ HD LED Glare/Num Pad/Mat Finish/DOS @ Rs. 26,000/-\r\nG470 (59066925) Intel Core i3 2310 2.1GHz/2 GB/500 GB/DVDRW/CAMERA/BTH/CR/14.1ï¿½ HD LED Glare/ Num Pad/DOS @ Rs. 28,750/-\r\nG570 (59304871) Intel Core i3 2310 2.1GHz/2 GB/500GB/DVDRW/CAMERA/BTH/CR/15.6ï¿½ HD LED Glare/ Num Pad/DOS @ Rs. 28,750/-\r\nLenovo IdeaPad Z Series Core i3 Processor Notebook - One Yr Onsite (2 Color Option)\r\nZ570 (59304252) Intel Core i3 2310 2.1GHz/3GB/750GB/DVDRW/Camera/BTH/CR/15.6ï¿½ HD LED Glare/Num Pad/MacAfee/WIN 7 HB @ 34,250/- M. G.\r\nNew Arrival- Z570 (59304231) Intel Core i3 2310 2.1GHz/4GB/750GB/DVDRW/nVidia 1GB/Camera/BTH/CR/15.6ï¿½ HD LED Glare/Num Pad/DOS @ 36,750/- M. G.\r\nZ570 (59304243/2682) Intel Core i3 2310 2.1GHz/3GB/750GB/DVDRW/nVidia 1GB /Camera/BTH/CR/15.6ï¿½ HD LED Glare/Num Pad/MacAfee/WIN 7 HB @ Rs. 38,500/- M. G. & T. B.\r\nLenovo IdeaPad Z Series ï¿½ Core i5 Processor Notebook- One Yr Onsite\r\nIdea Pad Z570 (59067847) Intel Core i5 2410 2.3GHz/3GB/640GB/DVDRW/Camera/BTH/CR/15.6ï¿½ HD LED Glare/Num Pad/MacAfee/ WIN 7 HP @ Rs. 37,750/- M. G.\r\nNew Arrival- Idea Pad Z570 (59304327) Intel Core i5 2410 2.3GHz/4GB/750GB/DVDRW/nVidia 1GB/Camera/BTH/CR/15.6ï¿½ HD LED Glare/Num Pad/DOS @ Rs. 39,750/- M. G.\r\nIdea Pad Z570 (59069595) Intel Core i5 2410 2.3GHz/3GB/640GB/DVDRW/nVidia 1GB/Camera/BTH/CR/15.6ï¿½ HD LED Glare/Num Pad/MacAfee AV/ WIN 7 HP @ Rs. 42,250/- M. G.\r\nIdea Pad Z570 (59304310) Intel Core i5 2410 2.3GHz/4GB/750GB/DVDRW/nVidia 1GB/Camera/BTH/CR/15.6ï¿½ HD LED Glare/Num Pad/MacAfee AV/ WIN 7 HP @ Rs. 43,750/- M. G.\r\nLenovo IdeaPad Y Series ï¿½ Core i7 Processor Notebook -One Yr Onsite\r\nIdea Pad Y570 (59301914) Intel i5 2410 2.3GHz/4GB/750GB/DVDRW/1GB ATI/Camera/BTH/CR/15.6ï¿½ HD LED Glare/MacAfee/WIN 7 HP @ Rs.48,500/- M. G.\r\nIdea Pad Y570 (59305641) Intel i7 2630QM 2.0GHz/6GB/750GB/DVDRW/2GB ATI/Camera/BTH/CR/15.6ï¿½ HD LED Glare/MacAfee/WIN 7 HP @ Rs.57,500/- M. G.\r\nLenovo All-in-One (AIO) IdeaCentre Atom Dual Core Processor Desktop PCï¿½s\r\nIdea Centre C200 (57129907) Intel Atom 1.8GHz/2GB/500GB/DVDRW/CAMERA/18.5ï¿½/DOS/1 Year @ Rs. 20,150/-\r\nIdea Centre C200 (57129906) Intel Atom 1.8GHz/2GB/500GB/DVDRW/CAMERA/18.5ï¿½/WIN 7 HB/1 Year @ Rs. 22,250/-\r\nNew Arrival- Idea Centre B300 (57301792) Intel Dual Core E6700 3.2GHz/2GB/500GB/DVDRW/CAMERA/BTH/20ï¿½/Wireless KBD & Mouse/DOS/1 Year @ Rs. 24,500/-\r\nIdea Centre B300 (57121823) Intel Dual Core E5400 2.7GHz/2GB/500GB/DVDRW/CAMERA/BTH/20ï¿½/Wired KBD & Mouse/W7HB/3 Year @ Rs. 31,250/- (Ltd Stock)\r\nIdea Centre B320 (57124189) Intel Core i3 550 3.1GHz/3GB/1TB/512 MB Graphics/DVDRW/CAMERA/BTH/21.5ï¿½/Wired KBD & Mouse/Win7HB/3 Yrs @ Rs. 40,000/-\r\nImmediate Delivery.\r\n\r\nCALL- Yunus ï¿½ 9422025127/9372025127/02024266775/24265064 ,Visit us @ www.acsinfotech.net', '0.00', 0, 'Dynet.jpg', 'Dynet.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0),
(33, 7, 'AUTHORISED SERVICE CENTER CONTACT NO.IN PUNE', '	\r\n\r\nService Centers Brand Number Toll Free Number\r\n\r\nAcer :- 32544448, 1800-116-677\r\nAltek Lansing:- 26119321 ; 26136332 ;26119321\r\nAMD :- 1800-425-6664\r\nAOC Monitors:- 4010096 1800-425-4318\r\nAPC:- 25410736/35 1800-425-4272\r\nApple :- 1800-425-0744 1800-425-4683\r\nArtis:- 66012381/82\r\nAsus:- 26119321\r\nBenq (Neoteric) :- 32335724 ; 32949464 Brother :- 1800-22-24-22 1800-209-8904 Canon :- 24262015 ; 24260199 1800-345-3366 Champion UPS:- 26871716 ; 26872083\r\nCircle :- 64016108\r\nCompaq :- 40152000 ; 64013152 ;25666233, 1800112299\r\nCompex:- 26119321\r\nDELL :- 24320021 1800-425-8101\r\nD-link :- 25450018\r\nDSK DIGITAL:- 25512513 ; 25511481 1800 233 1255 Epson :- 39001600 1800-425-0011\r\nE Scan :- 1800-180-6080\r\nFrontech Service :- 32500471 ; 25539513 1800-345-3030\r\nHCL :- 40114422 ; 40114447 1860 1800 425 HITACHI HARDDISK:- 1800-103-1357\r\nHP Desktops :- 1800-11-2299\r\nHP Designjet support:- 1800-425-8999\r\nHP Laptops:- 1800-11-2299\r\nHP Printers :- 30304499 1800-425-4999 HP/COMPAQ :- 24327880 ; 1 ;3 ; 4 40152000 HP PC :- 1800-114-772\r\nI Ball:- 64011218 ; 32931533\r\nIBM/Lenovo :- 26449724 1800-425-3333\r\nIntel :- 40152000 ; 9049006510\r\nIntex :- 66096449 1800-11-6789\r\nJetway :- 26119321\r\nKingston Memory :- 25520041 ; 64013569 1800-425-4515\r\nKobian (Mercury):- 32345234\r\nKodak :- 9766552406 1800-22-4949 Lenova :- 1800-425-6666\r\nLexmark :- 64018569 1800-22-4477\r\nLG GSM MOBILE PHONE :- 24471155 1860-180-9999\r\nLG DVD Writer :- 40149444\r\nLogitech :- 26119321\r\nMercury(Kobain) :- 1800-425-5464\r\nMicrosoft Hardware :- 32914448 ; 24465716 1800-102-1100\r\nMotorola:- 40152000 ; 9049006510\r\nNetgare:- 26119321\r\nNumeric UPS :- 1800-425-3266 PANASONIC:- 25532097 Philips :- 40152000 ; 9049006510 Pixelview :- 26119321 Powersafe UPS :- 66012381 Pronet Networking Products :- 66012382 Proview :- 9371095751 Quickheal Support:- 9422318459 ; 9422318529 1800-2333-733 Samsung :- 26053723 ; 26053355 1800-110-011 Rashi:- 26136332 Sandisk :- 26136332 Seagate :- 25521289 1800-180-1104 Senao:- 26136332 Siemence:- 26136332 Simmtronics :- 30220442 ; 32400127 Sony:- 26119321 1800-111-188 Supertron(Supercomp):- 66206177 ; 83 Tally :- 1800-425-8859 TCL :- 25511481 1800-233-1255 Toshiba :- 1800-180-3533 TRENDNET:- 25454270 ; 71 1800-425-4255 TVSE Keyboard:- 25431848 1800-425-4566 TVSE Printer :- 9096753810 1800-425-4566 Umax :- 32335724 ; 9324757112 Viewsonic :- 011-2699006 1800-11-9999 VIP Cabinets & Smps:- 9823326753 ; 66012381; 82 Wep Peripherals LTD :- 1800-4256-446 1800-425-9494 Wipro:- 180011-9393 XFX :- 26136332 Xerox:- 1800-180-1225\r\nold Laptops repair center :- 24265064/9422025127 ', '0.00', 0, 'esys_desktop.jpg', 'esys_desktop.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(34, 7, 'ALL LAPTOP''S SPARES, LCD SCREEN/HARDDISK RAM', '', '0.00', 0, 'hcl-desktop-pc.jpg', 'hcl-desktop-pc.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0),
(35, 8, 'LAPTOP''S SPARES Parts Available @ ACS INFOTECH', '', '0.00', 0, 'hp-Deskjet.jpg', 'hp-Deskjet.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(38, 0, 'pd_name', 'pd_description', '0.00', 0, 'hp-desktop.jpg', 'hp-desktop.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(39, 0, 'pd_name', 'pd_description', '0.00', 0, 'pd_image', 'pd_thumbnail', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(41, 0, 'pd_name', 'pd_description', '0.00', 0, 'HP-LaserJetPrinter.jpg', 'HP-LaserJetPrinter.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(42, 1, 'aasdas', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '22222.00', 22, 'HP-LaserJetPrinter.jpg', 'HP-LaserJetPrinter.jpg', '2011-10-01 00:00:00', '2011-10-01 00:00:00', 0, 0),
(43, 1, 'ashu', 'ashutosh', '0.00', 1, 'harddisk.jpg', 'harddisk.jpg', '2011-10-01 00:00:00', '2011-10-01 00:00:00', 0, 0),
(44, 1, 'max', 'max', '30000.00', 2, 'HP-Scanjet.jpg', 'HP-Scanjet.jpg', '2011-10-01 00:00:00', '2011-10-01 00:00:00', 0, 0),
(45, 1, 'kshitij', 'kshitij', '9999999.99', 1, 'hp-Deskjet.jpg', 'hp-Deskjet.jpg', '2011-10-01 00:00:00', '2011-10-01 00:00:00', 0, 0),
(46, 1, 'aasdsa', 'sadasdasda', '213123.00', 23, 'Dynet.jpg', 'Dynet.jpg', '2011-10-01 00:00:00', '2011-10-01 00:00:00', 0, 0),
(47, 1, 'ketki', 'ketki', '9999999.99', 1, 'esys_desktop.jpg', 'esys_desktop.jpg', '2011-10-01 00:00:00', '2011-10-01 00:00:00', 0, 0),
(48, 1, 'aaaa', 'asdasdasd', '22222.00', 22, 'Wireless-USB-Dongle.jpg', 'Wireless-USB-Dongle.jpg', '2011-10-01 00:00:00', '2011-10-01 00:00:00', 0, 0),
(49, 1, 'aaaaaaaaaaaaaaaaaaaaa', 'sadasdasdasd', '3333333.00', 22, 'hp-Deskjet.jpg', 'hp-Deskjet.jpg', '2011-10-01 00:00:00', '2011-10-01 00:00:00', 0, 0),
(50, 7, 'ash', 'discription', '2.00', 2, 'hp-desktop.jpg', 'hp-desktop.jpg', '2011-10-02 00:00:00', '2011-10-02 00:00:00', 0, 0),
(51, 3, 'Mouse', 'Destop Accessories', '150.00', 10, 'HP-LaserJetPrinter.jpg', 'HP-LaserJetPrinter.jpg', '2011-10-02 00:00:00', '2011-10-02 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(20) NOT NULL DEFAULT '',
  `user_password` varchar(32) NOT NULL DEFAULT '',
  `user_regdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_password`, `user_regdate`, `user_last_login`) VALUES
(4, 'webmaster', 'webmaster', '2005-03-02 17:52:51', '0000-00-00 00:00:00'),
(1, 'admin', 'admin', '2005-02-20 17:35:44', '2011-10-07 07:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitcount`
--

CREATE TABLE `tbl_visitcount` (
  `count_date` date NOT NULL,
  `visit_count` int(10) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_visitcount`
--

INSERT INTO `tbl_visitcount` (`count_date`, `visit_count`, `id`) VALUES
('2011-10-07', 89, 1),
('2011-10-08', 10, 2),
('2011-10-09', 50, 3),
('2011-10-10', 100, 4),
('2011-10-11', 5, 5),
('2011-10-12', 150, 6),
('2011-10-13', 50, 7),
('2011-10-14', 10, 8),
('2011-10-15', 2, 9),
('2011-10-16', 22, 10),
('2011-10-17', 33, 11),
('2011-10-18', 77, 12),
('2011-10-19', 5, 13),
('2011-10-20', 4, 14),
('2011-10-21', 50, 15),
('2011-10-22', 10, 16),
('2011-10-23', 50, 17),
('2011-10-24', 100, 18),
('2011-10-25', 5, 19),
('2011-10-26', 150, 20),
('2011-10-27', 50, 21),
('2011-10-28', 10, 22),
('2011-10-29', 2, 23),
('2011-10-30', 22, 24),
('2011-10-31', 33, 25),
('2011-10-01', 77, 26),
('2011-10-02', 5, 27),
('2011-10-03', 5, 28),
('2011-10-04', 10, 29),
('2016-06-25', 9, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `cat_name` (`cat_name`);

--
-- Indexes for table `tbl_main_category`
--
ALTER TABLE `tbl_main_category`
  ADD PRIMARY KEY (`maincat_id`),
  ADD KEY `maincat_name` (`maincat_name`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `pd_name` (`pd_name`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `tbl_visitcount`
--
ALTER TABLE `tbl_visitcount`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbl_main_category`
--
ALTER TABLE `tbl_main_category`
  MODIFY `maincat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_visitcount`
--
ALTER TABLE `tbl_visitcount`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
