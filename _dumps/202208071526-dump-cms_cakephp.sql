-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: cms_cakephp
-- ------------------------------------------------------
-- Server version	5.7.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `cell_phone` varchar(100) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `about` longtext,
  `vision` longtext,
  `mission` longtext,
  `values_about` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about`
--

LOCK TABLES `about` WRITE;
/*!40000 ALTER TABLE `about` DISABLE KEYS */;
INSERT INTO `about` VALUES (1,'123','gnail@gnail.com',NULL,NULL,'','','','','<p>123</p>','<p>123</p>','<p>123</p>','<p>12323123123213</p>');
/*!40000 ALTER TABLE `about` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `subtitle` varchar(60) NOT NULL,
  `slug` varchar(60) NOT NULL,
  `content` longtext,
  `user_id` int(11) NOT NULL,
  `show_website` tinyint(1) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  `blog_category_id` varchar(60) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,'Titulo BLog 1','SubTitulo BLog 1','titulo-blog-1','<p>asdasdasdasdasdasd</p>',1,1,1,'1','2022-08-01 15:23:55','2022-08-01 21:19:17'),(2,'Blog teste 2','Sub titulo Blog Teste 2','blog-teste-2','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Urna condimentum mattis pellentesque id nibh tortor id. Amet commodo nulla facilisi nullam vehicula ipsum. Amet facilisis magna etiam tempor orci eu lobortis elementum. Dui sapien eget mi proin sed. Pharetra diam sit amet nisl suscipit adipiscing bibendum. Amet justo donec enim diam vulputate ut. Mattis pellentesque id nibh tortor id aliquet lectus proin. Nulla at volutpat diam ut venenatis tellus. Vitae auctor eu augue ut. Et ligula ullamcorper malesuada proin libero nunc consequat interdum. Molestie a iaculis at erat pellentesque adipiscing commodo elit. Ut morbi tincidunt augue interdum. Mattis ullamcorper velit sed ullamcorper morbi. Enim tortor at auctor urna.</p>\r\n\r\n<p>Vitae purus faucibus ornare suspendisse sed nisi. Elit eget gravida cum sociis natoque penatibus et magnis dis. Neque convallis a cras semper auctor neque vitae tempus. Congue nisi vitae suscipit tellus mauris. Ornare aenean euismod elementum nisi quis eleifend quam. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Dui id ornare arcu odio ut sem nulla pharetra. Volutpat diam ut venenatis tellus. Curabitur vitae nunc sed velit dignissim sodales ut eu sem. Libero id faucibus nisl tincidunt eget nullam non. Sit amet dictum sit amet justo donec enim diam. Consectetur adipiscing elit pellentesque habitant morbi tristique senectus et. Tristique senectus et netus et malesuada. Quam nulla porttitor massa id neque. Fames ac turpis egestas maecenas pharetra convallis posuere morbi.</p>\r\n\r\n<p>Leo a diam sollicitudin tempor id. Elit ut aliquam purus sit amet luctus venenatis lectus. Faucibus in ornare quam viverra. Purus viverra accumsan in nisl nisi. Sed blandit libero volutpat sed cras ornare arcu dui vivamus. A erat nam at lectus urna. Dui id ornare arcu odio ut sem nulla pharetra. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Vestibulum morbi blandit cursus risus. Erat velit scelerisque in dictum non consectetur a erat nam. Ac placerat vestibulum lectus mauris. Neque egestas congue quisque egestas. Penatibus et magnis dis parturient montes nascetur.</p>\r\n\r\n<p>Nec nam aliquam sem et. Lectus magna fringilla urna porttitor rhoncus. Neque egestas congue quisque egestas diam in arcu cursus. Leo vel orci porta non pulvinar neque. Cras sed felis eget velit aliquet sagittis id. Egestas maecenas pharetra convallis posuere. Fringilla ut morbi tincidunt augue interdum velit euismod in pellentesque. Bibendum arcu vitae elementum curabitur vitae nunc sed. Vestibulum mattis ullamcorper velit sed ullamcorper. Nisl condimentum id venenatis a condimentum vitae. Turpis egestas integer eget aliquet nibh praesent tristique magna sit. Feugiat pretium nibh ipsum consequat. Aliquet sagittis id consectetur purus ut faucibus pulvinar elementum integer. Aliquet bibendum enim facilisis gravida neque convallis. Vitae elementum curabitur vitae nunc sed. Mauris nunc congue nisi vitae suscipit tellus mauris a diam. Et malesuada fames ac turpis egestas integer eget. Dapibus ultrices in iaculis nunc. Sed viverra tellus in hac habitasse.</p>\r\n\r\n<p>Fringilla urna porttitor rhoncus dolor purus non enim. Netus et malesuada fames ac turpis. Volutpat odio facilisis mauris sit amet massa vitae. Risus at ultrices mi tempus imperdiet nulla malesuada. Enim sit amet venenatis urna cursus. Morbi tincidunt ornare massa eget egestas. Metus aliquam eleifend mi in nulla posuere sollicitudin aliquam. Sit amet tellus cras adipiscing enim eu turpis egestas pretium. Id leo in vitae turpis massa sed elementum. Porttitor lacus luctus accumsan tortor posuere ac ut consequat. Turpis massa sed elementum tempus egestas sed sed risus pretium. Odio facilisis mauris sit amet massa vitae tortor condimentum lacinia. Dolor sed viverra ipsum nunc aliquet.</p>\r\n\r\n<p>Faucibus pulvinar elementum integer enim neque. Donec pretium vulputate sapien nec sagittis aliquam. Arcu non odio euismod lacinia at quis. Massa tincidunt nunc pulvinar sapien. Vel risus commodo viverra maecenas accumsan lacus vel facilisis volutpat. Proin sed libero enim sed faucibus turpis in eu mi. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Vitae turpis massa sed elementum. Ut tellus elementum sagittis vitae et leo duis. Lacus sed turpis tincidunt id. In nibh mauris cursus mattis molestie a iaculis at erat. Sit amet cursus sit amet dictum sit amet justo donec. Faucibus pulvinar elementum integer enim. Tristique senectus et netus et malesuada fames ac. Duis at tellus at urna condimentum.</p>\r\n\r\n<p>Aliquam sem et tortor consequat id porta nibh venenatis. Enim neque volutpat ac tincidunt vitae semper quis lectus. Arcu vitae elementum curabitur vitae nunc sed. Lorem sed risus ultricies tristique nulla aliquet enim tortor at. Vestibulum morbi blandit cursus risus at ultrices mi. Maecenas ultricies mi eget mauris pharetra et ultrices neque ornare. Lectus mauris ultrices eros in cursus. A arcu cursus vitae congue mauris. Fringilla ut morbi tincidunt augue interdum velit. Tincidunt praesent semper feugiat nibh sed pulvinar proin gravida. Risus sed vulputate odio ut enim blandit volutpat. Adipiscing elit pellentesque habitant morbi tristique senectus et netus. Sagittis orci a scelerisque purus semper eget duis. Tristique senectus et netus et. Ligula ullamcorper malesuada proin libero nunc consequat interdum. Tortor vitae purus faucibus ornare suspendisse.</p>\r\n\r\n<p>Augue ut lectus arcu bibendum at. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus urna. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit lectus. Morbi tincidunt ornare massa eget egestas purus viverra accumsan. At urna condimentum mattis pellentesque id. Sed tempus urna et pharetra pharetra massa. Neque volutpat ac tincidunt vitae semper quis lectus nulla. Sodales ut eu sem integer vitae justo eget magna fermentum. Duis ut diam quam nulla porttitor massa id neque. Fermentum iaculis eu non diam phasellus vestibulum lorem. Hendrerit dolor magna eget est lorem ipsum. Ut tortor pretium viverra suspendisse potenti. Nunc scelerisque viverra mauris in aliquam sem fringilla ut. Feugiat pretium nibh ipsum consequat nisl vel. Amet porttitor eget dolor morbi non arcu.</p>\r\n\r\n<p>Vel elit scelerisque mauris pellentesque. Commodo elit at imperdiet dui accumsan sit amet. Vulputate enim nulla aliquet porttitor lacus. Lobortis mattis aliquam faucibus purus in massa tempor. Tellus mauris a diam maecenas sed enim ut. At augue eget arcu dictum. Viverra justo nec ultrices dui. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Orci nulla pellentesque dignissim enim. Mattis enim ut tellus elementum sagittis vitae et leo. Ac auctor augue mauris augue neque gravida in. Diam ut venenatis tellus in metus vulputate eu. Ornare aenean euismod elementum nisi quis. Purus semper eget duis at tellus at urna. Nunc eget lorem dolor sed viverra ipsum. Quis auctor elit sed vulputate mi sit amet mauris.</p>\r\n\r\n<p>Cursus risus at ultrices mi. Facilisis leo vel fringilla est ullamcorper. Laoreet sit amet cursus sit amet dictum sit amet. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam. Nibh tellus molestie nunc non blandit massa enim. Imperdiet dui accumsan sit amet nulla facilisi morbi. Justo eget magna fermentum iaculis eu. Viverra justo nec ultrices dui. Ut porttitor leo a diam. Congue nisi vitae suscipit tellus. Urna condimentum mattis pellentesque id nibh tortor.</p>\r\n\r\n<p>Molestie ac feugiat sed lectus vestibulum mattis ullamcorper velit. Vitae aliquet nec ullamcorper sit. Volutpat blandit aliquam etiam erat. Lorem ipsum dolor sit amet consectetur adipiscing elit duis. Nascetur ridiculus mus mauris vitae ultricies leo. Ac orci phasellus egestas tellus rutrum tellus. Netus et malesuada fames ac turpis egestas. Mi ipsum faucibus vitae aliquet nec ullamcorper sit. At in tellus integer feugiat scelerisque varius morbi enim nunc. Est lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque. Urna cursus eget nunc scelerisque viverra. Dignissim cras tincidunt lobortis feugiat vivamus at. Urna molestie at elementum eu facilisis sed odio morbi quis. Aliquet nec ullamcorper sit amet risus nullam eget felis. Tempus iaculis urna id volutpat lacus. Sapien pellentesque habitant morbi tristique. Non consectetur a erat nam at. Tempus egestas sed sed risus pretium quam vulputate. Malesuada nunc vel risus commodo.</p>\r\n\r\n<p>Elementum curabitur vitae nunc sed velit dignissim sodales ut eu. Convallis aenean et tortor at risus viverra adipiscing. Est velit egestas dui id. Pellentesque eu tincidunt tortor aliquam nulla facilisi cras fermentum. Arcu cursus vitae congue mauris rhoncus aenean vel. Arcu cursus euismod quis viverra nibh. In iaculis nunc sed augue lacus viverra. Metus dictum at tempor commodo ullamcorper a lacus vestibulum sed. Elementum curabitur vitae nunc sed velit. Est ultricies integer quis auctor elit sed vulputate mi. Lobortis mattis aliquam faucibus purus.</p>\r\n\r\n<p>Donec et odio pellentesque diam volutpat commodo. Lacus vel facilisis volutpat est velit egestas dui id. Nisl nisi scelerisque eu ultrices vitae auctor eu augue ut. Velit dignissim sodales ut eu sem integer. Bibendum est ultricies integer quis auctor elit sed vulputate. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed velit. Orci porta non pulvinar neque laoreet. Nulla aliquet porttitor lacus luctus accumsan. Tellus orci ac auctor augue mauris augue neque. Aenean vel elit scelerisque mauris pellentesque.</p>\r\n\r\n<p>Sed cras ornare arcu dui vivamus arcu felis bibendum. Et netus et malesuada fames ac. Ultricies tristique nulla aliquet enim. Molestie ac feugiat sed lectus vestibulum mattis ullamcorper velit sed. A scelerisque purus semper eget duis at tellus at urna. Egestas fringilla phasellus faucibus scelerisque. Nisi quis eleifend quam adipiscing vitae proin sagittis nisl. Neque convallis a cras semper auctor neque vitae tempus. Etiam erat velit scelerisque in. Cursus risus at ultrices mi tempus. Viverra ipsum nunc aliquet bibendum enim facilisis. Tellus elementum sagittis vitae et. Venenatis urna cursus eget nunc scelerisque viverra. Adipiscing tristique risus nec feugiat in. Justo nec ultrices dui sapien eget mi. Vel turpis nunc eget lorem dolor sed viverra. Ornare arcu odio ut sem nulla pharetra diam sit amet.</p>',1,0,1,'1','2022-08-01 20:02:42','2022-08-01 21:00:12'),(3,'Artigo Titulo 1','Artigo  SubTitulo 1','artigo-titulo-1','<p>Egestas erat imperdiet sed euismod nisi. Lorem donec massa sapien faucibus et. Molestie a iaculis at erat pellentesque adipiscing commodo elit. Lacus viverra vitae congue eu. Vitae suscipit tellus mauris a diam maecenas sed enim. Ut placerat orci nulla pellentesque dignissim. Ultrices neque ornare aenean euismod elementum nisi. Tellus integer feugiat scelerisque varius morbi enim nunc faucibus. In vitae turpis massa sed elementum. Nunc mattis enim ut tellus elementum sagittis vitae. Phasellus egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam. Sagittis eu volutpat odio facilisis mauris sit amet massa vitae. Aliquet bibendum enim facilisis gravida neque convallis a cras.</p>\r\n\r\n<p>Gravida rutrum quisque non tellus orci ac auctor augue. Euismod lacinia at quis risus sed vulputate odio ut enim. Ultricies mi quis hendrerit dolor magna eget est lorem ipsum. Auctor elit sed vulputate mi sit. Lacinia at quis risus sed vulputate odio. Vulputate odio ut enim blandit volutpat maecenas. Senectus et netus et malesuada fames. Venenatis tellus in metus vulputate eu scelerisque felis imperdiet proin. Tincidunt augue interdum velit euismod. Amet purus gravida quis blandit turpis cursus in. Lacinia at quis risus sed vulputate. Rhoncus mattis rhoncus urna neque viverra justo nec. Ultrices sagittis orci a scelerisque purus semper eget duis at. Nulla facilisi cras fermentum odio.</p>\r\n\r\n<p>Pretium lectus quam id leo. Vitae aliquet nec ullamcorper sit amet risus nullam. Neque egestas congue quisque egestas diam in arcu cursus euismod. Vulputate ut pharetra sit amet aliquam id diam maecenas ultricies. Neque volutpat ac tincidunt vitae. Blandit massa enim nec dui. Commodo quis imperdiet massa tincidunt nunc pulvinar sapien et ligula. Eu lobortis elementum nibh tellus molestie nunc non. Ut sem nulla pharetra diam sit. Sit amet nisl purus in mollis nunc sed id. Ut pharetra sit amet aliquam id. Mauris pharetra et ultrices neque ornare aenean. Rhoncus aenean vel elit scelerisque mauris. Vulputate mi sit amet mauris commodo quis. Donec ultrices tincidunt arcu non sodales neque. Arcu non odio euismod lacinia at quis risus sed. Morbi quis commodo odio aenean sed adipiscing diam. Sed velit dignissim sodales ut eu sem. Velit aliquet sagittis id consectetur. Diam donec adipiscing tristique risus nec feugiat in fermentum.</p>\r\n\r\n<p>Ullamcorper eget nulla facilisi etiam dignissim diam quis enim lobortis. Eros in cursus turpis massa tincidunt dui. Pretium viverra suspendisse potenti nullam ac tortor vitae. Magna fringilla urna porttitor rhoncus. Scelerisque in dictum non consectetur a erat. Montes nascetur ridiculus mus mauris vitae ultricies. Nulla aliquet porttitor lacus luctus accumsan tortor posuere ac ut. In hac habitasse platea dictumst vestibulum. Fames ac turpis egestas maecenas pharetra convallis. Nibh tortor id aliquet lectus proin nibh nisl condimentum id. Nullam vehicula ipsum a arcu cursus vitae congue mauris rhoncus. Orci eu lobortis elementum nibh tellus molestie nunc non. Morbi leo urna molestie at elementum. Purus in mollis nunc sed id semper risus. Ut diam quam nulla porttitor massa id neque. Et ultrices neque ornare aenean.</p>\r\n\r\n<p>Placerat in egestas erat imperdiet sed. Sed tempus urna et pharetra pharetra massa. Ullamcorper malesuada proin libero nunc. Morbi tristique senectus et netus et malesuada fames ac. Eget sit amet tellus cras adipiscing enim eu turpis. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi. Lorem dolor sed viverra ipsum. Nisi quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Vitae proin sagittis nisl rhoncus mattis rhoncus. Ac placerat vestibulum lectus mauris ultrices eros. Sit amet cursus sit amet dictum. Massa sapien faucibus et molestie ac. Tincidunt vitae semper quis lectus nulla. Pharetra diam sit amet nisl suscipit adipiscing.</p>\r\n\r\n<p>Auctor augue mauris augue neque gravida in fermentum. Ipsum nunc aliquet bibendum enim facilisis gravida neque convallis a. Senectus et netus et malesuada fames. Cursus vitae congue mauris rhoncus aenean. Egestas quis ipsum suspendisse ultrices. Tortor dignissim convallis aenean et tortor. Tellus orci ac auctor augue. Nec ullamcorper sit amet risus nullam eget felis eget nunc. Feugiat nisl pretium fusce id velit. Eu ultrices vitae auctor eu. Lacus vestibulum sed arcu non odio. Lacus sed viverra tellus in hac habitasse platea. In pellentesque massa placerat duis ultricies lacus. Lobortis elementum nibh tellus molestie nunc non blandit. Pharetra massa massa ultricies mi quis hendrerit dolor. Viverra adipiscing at in tellus integer feugiat. Egestas congue quisque egestas diam in. Neque ornare aenean euismod elementum nisi quis. Nunc eget lorem dolor sed viverra. Quam quisque id diam vel.</p>\r\n\r\n<p>Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae. Amet aliquam id diam maecenas ultricies mi eget mauris pharetra. Adipiscing elit pellentesque habitant morbi tristique senectus et. Ante metus dictum at tempor commodo ullamcorper a. Nec ultrices dui sapien eget mi proin sed libero enim. Neque egestas congue quisque egestas. Lectus urna duis convallis convallis tellus id. Tincidunt id aliquet risus feugiat. Libero justo laoreet sit amet cursus sit. Vitae purus faucibus ornare suspendisse sed nisi lacus sed viverra. Leo vel fringilla est ullamcorper. Nunc faucibus a pellentesque sit amet. Montes nascetur ridiculus mus mauris vitae ultricies leo integer. Tincidunt tortor aliquam nulla facilisi cras fermentum odio. Diam vel quam elementum pulvinar. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Commodo ullamcorper a lacus vestibulum sed.</p>\r\n\r\n<p>Tempor commodo ullamcorper a lacus vestibulum sed arcu. Maecenas accumsan lacus vel facilisis. Nec feugiat in fermentum posuere urna nec tincidunt praesent semper. Senectus et netus et malesuada fames ac. Sit amet facilisis magna etiam tempor orci eu lobortis. Volutpat commodo sed egestas egestas fringilla. Eu feugiat pretium nibh ipsum consequat nisl vel. Nunc lobortis mattis aliquam faucibus purus. Tincidunt augue interdum velit euismod in pellentesque massa. Est ultricies integer quis auctor elit sed. Fames ac turpis egestas integer. Euismod lacinia at quis risus sed vulputate. Fusce id velit ut tortor pretium viverra suspendisse.</p>\r\n\r\n<p>Mauris commodo quis imperdiet massa tincidunt nunc. Proin sagittis nisl rhoncus mattis rhoncus urna neque viverra justo. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Consequat interdum varius sit amet mattis vulputate enim. Lobortis elementum nibh tellus molestie nunc non. Aliquam sem fringilla ut morbi tincidunt augue interdum velit. Eu volutpat odio facilisis mauris sit amet massa. Commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend. Porta nibh venenatis cras sed felis. Justo eget magna fermentum iaculis eu non diam phasellus vestibulum.</p>\r\n\r\n<p>Et molestie ac feugiat sed. Dictum at tempor commodo ullamcorper a lacus vestibulum sed arcu. Accumsan tortor posuere ac ut consequat semper viverra nam. Tellus at urna condimentum mattis pellentesque. Id ornare arcu odio ut sem nulla. Mattis molestie a iaculis at erat pellentesque adipiscing commodo elit. Viverra tellus in hac habitasse platea dictumst vestibulum. Eget est lorem ipsum dolor sit amet consectetur adipiscing. Eros in cursus turpis massa tincidunt dui. Pretium lectus quam id leo in vitae. Nulla pharetra diam sit amet nisl suscipit adipiscing bibendum est. Posuere morbi leo urna molestie at elementum. Consectetur adipiscing elit ut aliquam purus sit amet luctus. Aenean pharetra magna ac placerat vestibulum lectus. Consequat id porta nibh venenatis cras. Amet tellus cras adipiscing enim eu turpis. Cras tincidunt lobortis feugiat vivamus at.</p>\r\n\r\n<p>Quis hendrerit dolor magna eget est lorem. A lacus vestibulum sed arcu non. Aenean sed adipiscing diam donec adipiscing tristique risus nec feugiat. Sed viverra tellus in hac habitasse platea dictumst vestibulum. Nunc pulvinar sapien et ligula ullamcorper malesuada proin libero. Tortor aliquam nulla facilisi cras fermentum odio eu feugiat. Lectus magna fringilla urna porttitor rhoncus dolor purus. Id consectetur purus ut faucibus pulvinar. Duis at tellus at urna condimentum mattis pellentesque id nibh. Vulputate mi sit amet mauris.</p>\r\n\r\n<p>Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Dolor magna eget est lorem ipsum. Aenean sed adipiscing diam donec. Pellentesque nec nam aliquam sem et tortor consequat. Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Ut ornare lectus sit amet est placerat in. Mi sit amet mauris commodo quis imperdiet massa. Hendrerit dolor magna eget est lorem. In fermentum posuere urna nec tincidunt praesent semper feugiat nibh. Pretium aenean pharetra magna ac placerat vestibulum. Montes nascetur ridiculus mus mauris. Cursus euismod quis viverra nibh cras pulvinar. Suscipit adipiscing bibendum est ultricies. Quis auctor elit sed vulputate mi sit amet mauris commodo. Vitae congue eu consequat ac felis donec. Lectus arcu bibendum at varius vel pharetra vel turpis. Cursus eget nunc scelerisque viverra mauris. Tristique senectus et netus et malesuada fames ac turpis egestas.</p>\r\n\r\n<p>Tincidunt eget nullam non nisi est sit amet. Porta nibh venenatis cras sed felis eget velit aliquet sagittis. Mauris in aliquam sem fringilla ut morbi tincidunt augue interdum. Sit amet facilisis magna etiam. Aliquam faucibus purus in massa tempor nec feugiat nisl pretium. Nulla facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum. Vulputate mi sit amet mauris commodo quis imperdiet. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Tristique senectus et netus et. Quis risus sed vulputate odio ut enim blandit. Commodo elit at imperdiet dui accumsan. Adipiscing elit duis tristique sollicitudin nibh sit. Ut sem nulla pharetra diam. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus vel. Habitasse platea dictumst vestibulum rhoncus est.</p>\r\n\r\n<p>Scelerisque eleifend donec pretium vulputate sapien nec sagittis. Convallis posuere morbi leo urna. Sed arcu non odio euismod lacinia at quis. Neque volutpat ac tincidunt vitae semper quis lectus. Neque ornare aenean euismod elementum nisi quis eleifend. Pretium vulputate sapien nec sagittis aliquam malesuada bibendum. Et sollicitudin ac orci phasellus. Turpis in eu mi bibendum. Augue ut lectus arcu bibendum. Ornare quam viverra orci sagittis eu volutpat odio facilisis mauris. Dui ut ornare lectus sit amet. Tempus iaculis urna id volutpat lacus laoreet non curabitur. Dui faucibus in ornare quam viverra orci sagittis eu volutpat. Ornare aenean euismod elementum nisi quis eleifend quam. Nascetur ridiculus mus mauris vitae. Placerat vestibulum lectus mauris ultrices eros in. Diam volutpat commodo sed egestas egestas fringilla. Dignissim convallis aenean et tortor. Elementum sagittis vitae et leo duis ut diam. Quis viverra nibh cras pulvinar mattis nunc sed.</p>',1,1,1,'2','2022-08-01 21:14:46','2022-08-01 21:14:46'),(4,'teste meu conteudo','teste','teste-meu-conteudo','<p>dadasd</p>',15,1,8,'1','2022-08-01 22:15:05','2022-08-01 22:54:19'),(5,'teste meu blog','teste','teste-meu-blog','<p>asdasdasdasd</p>',15,1,1,'1','2022-08-01 22:21:01','2022-08-01 22:21:01');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs_categories`
--

DROP TABLE IF EXISTS `blogs_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `slug` varchar(60) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs_categories`
--

LOCK TABLES `blogs_categories` WRITE;
/*!40000 ALTER TABLE `blogs_categories` DISABLE KEYS */;
INSERT INTO `blogs_categories` VALUES (1,'Blog','blog',1,'2022-08-01 14:50:55','2022-08-01 14:50:55'),(2,'Artigos','artigos',1,'2022-08-01 14:51:09','2022-08-01 14:51:09'),(3,'teste ','teste',8,'2022-08-01 14:54:43','2022-08-01 14:54:56');
/*!40000 ALTER TABLE `blogs_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` longtext NOT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'teste','teste@teste.teste','Teste assunto','algum assunto','alguma mensagem grande',NULL,NULL,'2022-03-08 01:01:01','2022-03-08 01:01:01');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts_newsletters`
--

DROP TABLE IF EXISTS `contacts_newsletters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts_newsletters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts_newsletters`
--

LOCK TABLES `contacts_newsletters` WRITE;
/*!40000 ALTER TABLE `contacts_newsletters` DISABLE KEYS */;
INSERT INTO `contacts_newsletters` VALUES (1,'Teste','#del-1#test@gmail.com','123456789',8,'2022-01-01 00:00:00','2022-08-03 13:47:24');
/*!40000 ALTER TABLE `contacts_newsletters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `status` int(11) NOT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levels`
--

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` VALUES (1,'Administrador',1,0,'2022-07-12 18:35:00','2022-08-01 21:38:57'),(2,'Nivel Teste',8,1,'2022-07-19 11:39:31','2022-07-19 12:15:25'),(3,'Teste',8,1,'2022-07-22 23:00:39','2022-07-25 20:46:48'),(4,'testando',8,1,'2022-07-25 20:49:23','2022-07-25 20:49:34'),(5,'asdasdasd asdsadasdas ',8,1,'2022-07-25 20:53:39','2022-07-25 20:53:56'),(6,'asdsadasdasd',8,1,'2022-07-25 21:00:15','2022-07-25 21:07:42'),(7,'asdsadasdasd',8,1,'2022-07-25 21:01:37','2022-07-25 21:03:20'),(8,'Blogueiro',1,1,'2022-07-29 01:11:52','2022-08-02 02:19:21');
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `levels_permissions`
--

DROP TABLE IF EXISTS `levels_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `levels_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level_id` int(11) NOT NULL DEFAULT '11',
  `prefix` varchar(150) NOT NULL,
  `controller` varchar(150) NOT NULL,
  `action` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=389 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levels_permissions`
--

LOCK TABLES `levels_permissions` WRITE;
/*!40000 ALTER TABLE `levels_permissions` DISABLE KEYS */;
INSERT INTO `levels_permissions` VALUES (80,2,'Admin','About','index'),(81,2,'Admin','About','view'),(82,2,'Admin','About','add'),(83,2,'Admin','About','edit'),(84,2,'Admin','About','delete'),(85,2,'Admin','Levels','index'),(86,2,'Admin','Levels','add'),(87,2,'Admin','Levels','edit'),(88,2,'Admin','Levels','delete'),(89,2,'Admin','LogsAccess','index'),(90,2,'Admin','LogsAccess','view'),(91,2,'Admin','LogsAccess','add'),(92,2,'Admin','LogsAccess','edit'),(93,2,'Admin','LogsAccess','delete'),(94,2,'Admin','LogsChange','index'),(95,2,'Admin','LogsChange','view'),(96,2,'Admin','LogsChange','add'),(97,2,'Admin','LogsChange','edit'),(98,2,'Admin','LogsChange','delete'),(99,2,'Admin','SystemParameters','index'),(100,2,'Admin','SystemParameters','view'),(101,2,'Admin','SystemParameters','add'),(102,2,'Admin','SystemParameters','edit'),(103,2,'Admin','SystemParameters','delete'),(104,2,'Admin','Users','index'),(105,2,'Admin','Users','add'),(106,2,'Admin','Users','edit'),(107,2,'Admin','Users','delete'),(163,3,'Admin','About','index'),(164,3,'Admin','About','view'),(165,3,'Admin','About','add'),(166,3,'Admin','About','edit'),(167,3,'Admin','About','delete'),(168,3,'Admin','Levels','index'),(169,3,'Admin','Levels','add'),(170,3,'Admin','Levels','edit'),(171,3,'Admin','Levels','delete'),(172,3,'Admin','LogsAccess','index'),(173,3,'Admin','LogsAccess','view'),(174,3,'Admin','LogsAccess','add'),(175,3,'Admin','LogsAccess','edit'),(176,3,'Admin','LogsAccess','delete'),(177,3,'Admin','LogsChange','index'),(178,3,'Admin','LogsChange','view'),(179,3,'Admin','LogsChange','add'),(180,3,'Admin','LogsChange','edit'),(181,3,'Admin','LogsChange','delete'),(182,3,'Admin','SystemParameters','index'),(183,3,'Admin','SystemParameters','view'),(184,3,'Admin','SystemParameters','add'),(185,3,'Admin','SystemParameters','edit'),(186,3,'Admin','SystemParameters','delete'),(187,3,'Admin','Users','index'),(188,3,'Admin','Users','add'),(189,3,'Admin','Users','edit'),(190,3,'Admin','Users','delete'),(212,4,'Admin','Levels','index'),(213,4,'Admin','Levels','add'),(214,4,'Admin','Levels','edit'),(215,4,'Admin','Levels','delete'),(216,5,'Admin','Levels','index'),(217,6,'Admin','About','edit'),(218,6,'Admin','Levels','index'),(219,6,'Admin','Levels','add'),(220,6,'Admin','Levels','edit'),(221,6,'Admin','Levels','delete'),(222,7,'Admin','About','edit'),(223,7,'Admin','Levels','index'),(224,7,'Admin','Levels','add'),(225,7,'Admin','Levels','edit'),(226,7,'Admin','Levels','delete'),(320,1,'Admin','About','edit'),(321,1,'Admin','About','banners'),(322,1,'Admin','BlogsCategories','index'),(323,1,'Admin','BlogsCategories','add'),(324,1,'Admin','BlogsCategories','edit'),(325,1,'Admin','BlogsCategories','delete'),(326,1,'Admin','Blogs','index'),(327,1,'Admin','Blogs','add'),(328,1,'Admin','Blogs','edit'),(329,1,'Admin','Blogs','editOnlyYourContents'),(330,1,'Admin','Blogs','delete'),(331,1,'Admin','Levels','index'),(332,1,'Admin','Levels','add'),(333,1,'Admin','Levels','edit'),(334,1,'Admin','Levels','delete'),(335,1,'Admin','LogsAccess','index'),(336,1,'Admin','LogsChange','index'),(337,1,'Admin','LogsChange','view'),(338,1,'Admin','SystemParameters','edit'),(339,1,'Admin','Tags','index'),(340,1,'Admin','Tags','add'),(341,1,'Admin','Tags','edit'),(342,1,'Admin','Tags','delete'),(343,1,'Admin','Users','index'),(344,1,'Admin','Users','add'),(345,1,'Admin','Users','edit'),(346,1,'Admin','Users','delete'),(382,8,'Admin','Blogs','add'),(383,8,'Admin','Blogs','searchOwners'),(384,8,'Admin','Blogs','editOwner'),(385,8,'Admin','Tags','index'),(386,8,'Admin','Tags','add'),(387,8,'Admin','Tags','edit'),(388,8,'Admin','Tags','delete');
/*!40000 ALTER TABLE `levels_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs_access`
--

DROP TABLE IF EXISTS `logs_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(60) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs_access`
--

LOCK TABLES `logs_access` WRITE;
/*!40000 ALTER TABLE `logs_access` DISABLE KEYS */;
INSERT INTO `logs_access` VALUES (1,'1','::1','2022-07-23 02:49:34'),(3,'1','::1','2022-08-02 14:44:43'),(4,'1','::1','2022-08-02 14:45:05'),(5,'1','::1','2022-08-02 15:15:47'),(6,'1','::1','2022-08-02 17:07:17'),(7,'15','::1','2022-08-02 17:46:21'),(8,'1','::1','2022-08-02 18:10:36'),(9,'1','::1','2022-08-03 13:09:31'),(10,'1','::1','2022-08-06 16:00:05');
/*!40000 ALTER TABLE `logs_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs_change`
--

DROP TABLE IF EXISTS `logs_change`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs_change` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `table_name` varchar(45) NOT NULL,
  `record_id` int(11) NOT NULL DEFAULT '1',
  `action_type` varchar(45) NOT NULL,
  `new_value` longtext NOT NULL,
  `old_value` longtext NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs_change`
--

LOCK TABLES `logs_change` WRITE;
/*!40000 ALTER TABLE `logs_change` DISABLE KEYS */;
INSERT INTO `logs_change` VALUES (1,1,'SystemParameters',1,'Update','{\"social_reason\":\"Raz\\u00e3o do Client\",\"modified\":\"2022-07-25T18:10:55-03:00\"}','{\"social_reason\":\"Raz\\u00e3o do Cliente\",\"modified\":\"2022-07-25T15:12:42-03:00\"}','2022-07-25 18:10:55'),(3,1,'Users',13,'Create','{\"user\":\"dionata11\",\"password\":\"$2y$10$kLw1J7DmS0uUF1Os48NEx.R\\/oDiIsPAYpByJhh0jlbPB.SugUgBpC\",\"level_id\":1,\"status\":1,\"created\":\"2022-07-25T18:34:19-03:00\",\"modified\":\"2022-07-25T18:34:19-03:00\",\"id\":13}','[]','2022-07-25 18:34:19'),(4,1,'Users',13,'Update','{\"status\":8,\"user\":\"#del-13#dionata11\",\"modified\":\"2022-07-25T18:35:26-03:00\"}','{\"status\":1,\"user\":\"dionata11\",\"modified\":\"2022-07-25T18:34:19-03:00\"}','2022-07-25 18:35:26'),(5,1,'users',13,'Delete','{\"status\":8,\"user\":\"#del-13#dionata11\",\"modified\":\"2022-07-25T18:38:57-03:00\"}','{\"status\":1,\"user\":\"dionata11\",\"modified\":\"2022-07-25T18:35:26-03:00\"}','2022-07-25 18:38:57'),(6,1,'Users',1,'Update','{\"password\":\"$2y$10$yGxzmO9iCSria.XQyU0rve9j98RpBVNi4IVa\\/lJQ8XG68F1rlfQPO\",\"modified\":\"2022-07-25T18:43:22-03:00\"}','{\"password\":\"$2y$10$.kBBe1zQvDwBQwPThyvFt.cCzqRAleyTu.vcPV68bhfUs4sLcrRN.\",\"modified\":\"2022-07-12T21:37:44-03:00\"}','2022-07-25 18:43:22'),(7,1,'LogsAccess',2,'Delete','[]','{\"id\":2,\"user_id\":\"1\",\"ip\":\"::1\",\"created\":\"2022-07-23T02:49:53-03:00\",\"user\":{\"id\":1,\"user\":\"dionata\",\"status\":1,\"super\":true,\"level_id\":1,\"created\":\"2022-07-12T21:37:44-03:00\",\"modified\":\"2022-07-25T18:43:22-03:00\"}}','2022-07-25 19:09:23'),(8,1,'Levels',3,'Delete','[]','{\"status\":1,\"modified\":\"2022-07-22T23:00:39-03:00\"}','2022-07-25 20:46:49'),(9,1,'Levels',4,'Create','{\"status\":1,\"name\":\"testando\",\"created\":\"2022-07-25T20:49:23-03:00\",\"modified\":\"2022-07-25T20:49:23-03:00\",\"id\":4}','[]','2022-07-25 20:49:23'),(10,1,'Levels',4,'Delete','[]','{\"modified\":\"2022-07-25T20:49:23-03:00\"}','2022-07-25 20:49:34'),(11,1,'Levels',5,'Create','{\"status\":1,\"name\":\"asdasdasd asdsadasdas \",\"created\":\"2022-07-25T20:53:39-03:00\",\"modified\":\"2022-07-25T20:53:39-03:00\",\"id\":5}','[]','2022-07-25 20:53:39'),(12,1,'Levels',5,'Delete','[]','{\"id\":5,\"name\":\"asdasdasd asdsadasdas \",\"deletable\":true,\"created\":\"2022-07-25T20:53:39-03:00\",\"modified\":\"2022-07-25T20:53:56-03:00\"}','2022-07-25 20:53:56'),(13,1,'Levels',6,'Create','[1,\"2022-07-25T21:00:15-03:00\",\"2022-07-25T21:00:15-03:00\",6,\"asdsadasdasd\"]','[]','2022-07-25 21:00:15'),(14,1,'Levels',7,'Create','{\"created\":\"2022-07-25T21:01:37-03:00\",\"id\":7,\"modified\":\"2022-07-25T21:01:37-03:00\",\"name\":\"asdsadasdasd\",\"status\":1}','[]','2022-07-25 21:01:37'),(15,1,'Levels',7,'Delete','[]','{\"created\":\"2022-07-25T21:01:37-03:00\",\"id\":7,\"modified\":\"2022-07-25T21:03:20-03:00\",\"name\":\"asdsadasdasd\"}','2022-07-25 21:03:20'),(16,1,'Levels',6,'Delete','[]','{\"created\":\"2022-07-25T21:00:15-03:00\",\"id\":6,\"modified\":\"2022-07-25T21:07:42-03:00\",\"name\":\"asdsadasdasd\"}','2022-07-25 21:07:42'),(17,1,'Users',1,'Update','{\"modified\":\"2022-07-26T16:45:44-03:00\"}','{\"modified\":\"2022-07-25T18:43:22-03:00\"}','2022-07-26 16:45:44'),(18,1,'Users',1,'Update','{\"modified\":\"2022-07-26T16:46:46-03:00\"}','{\"modified\":\"2022-07-26T16:45:44-03:00\"}','2022-07-26 16:46:46'),(19,1,'Users',1,'Update','{\"modified\":\"2022-07-26T16:48:16-03:00\"}','{\"modified\":\"2022-07-26T16:46:46-03:00\"}','2022-07-26 16:48:16'),(20,1,'Users',1,'Update','{\"modified\":\"2022-07-26T16:49:49-03:00\"}','{\"modified\":\"2022-07-26T16:48:16-03:00\"}','2022-07-26 16:49:49'),(21,1,'Users',1,'Update','{\"modified\":\"2022-07-26T16:51:55-03:00\"}','{\"modified\":\"2022-07-26T16:49:49-03:00\"}','2022-07-26 16:51:55'),(22,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:11:31-03:00\"}','{\"modified\":\"2022-07-26T16:51:55-03:00\"}','2022-07-26 17:11:31'),(23,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:11:58-03:00\"}','{\"modified\":\"2022-07-26T17:11:31-03:00\"}','2022-07-26 17:11:58'),(24,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:12:13-03:00\"}','{\"modified\":\"2022-07-26T17:11:58-03:00\"}','2022-07-26 17:12:13'),(25,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:14:15-03:00\"}','{\"modified\":\"2022-07-26T17:12:13-03:00\"}','2022-07-26 17:14:15'),(26,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:14:40-03:00\"}','{\"modified\":\"2022-07-26T17:14:15-03:00\"}','2022-07-26 17:14:40'),(27,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:15:42-03:00\"}','{\"modified\":\"2022-07-26T17:14:40-03:00\"}','2022-07-26 17:15:42'),(28,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:19:01-03:00\"}','{\"modified\":\"2022-07-26T17:15:42-03:00\"}','2022-07-26 17:19:01'),(29,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:19:30-03:00\"}','{\"modified\":\"2022-07-26T17:19:01-03:00\"}','2022-07-26 17:19:30'),(30,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:19:57-03:00\"}','{\"modified\":\"2022-07-26T17:19:30-03:00\"}','2022-07-26 17:19:57'),(31,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:20:50-03:00\"}','{\"modified\":\"2022-07-26T17:19:57-03:00\"}','2022-07-26 17:20:50'),(32,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:22:18-03:00\"}','{\"modified\":\"2022-07-26T17:20:50-03:00\"}','2022-07-26 17:22:18'),(33,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:23:13-03:00\"}','{\"modified\":\"2022-07-26T17:22:18-03:00\"}','2022-07-26 17:23:13'),(34,1,'Users',14,'Create','{\"created\":\"2022-07-26T17:27:58-03:00\",\"id\":14,\"level_id\":1,\"modified\":\"2022-07-26T17:27:58-03:00\",\"status\":1,\"user\":\"dionata\"}','[]','2022-07-26 17:27:58'),(35,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:31:47-03:00\"}','{\"modified\":\"2022-07-26T17:23:13-03:00\"}','2022-07-26 17:31:47'),(36,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:31:54-03:00\"}','{\"modified\":\"2022-07-26T17:31:47-03:00\"}','2022-07-26 17:31:54'),(37,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:32:27-03:00\"}','{\"modified\":\"2022-07-26T17:31:54-03:00\"}','2022-07-26 17:32:27'),(38,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:33:05-03:00\"}','{\"modified\":\"2022-07-26T17:32:27-03:00\"}','2022-07-26 17:33:05'),(39,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:33:15-03:00\"}','{\"modified\":\"2022-07-26T17:33:05-03:00\"}','2022-07-26 17:33:15'),(40,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:33:22-03:00\"}','{\"modified\":\"2022-07-26T17:33:15-03:00\"}','2022-07-26 17:33:22'),(41,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:33:37-03:00\"}','{\"modified\":\"2022-07-26T17:33:22-03:00\"}','2022-07-26 17:33:37'),(42,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:34:29-03:00\"}','{\"modified\":\"2022-07-26T17:33:37-03:00\"}','2022-07-26 17:34:29'),(43,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:34:59-03:00\"}','{\"modified\":\"2022-07-26T17:34:29-03:00\"}','2022-07-26 17:34:59'),(44,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:50:44-03:00\"}','{\"modified\":\"2022-07-26T17:34:59-03:00\"}','2022-07-26 17:50:44'),(45,1,'Users',1,'Update','{\"modified\":\"2022-07-26T17:50:54-03:00\"}','{\"modified\":\"2022-07-26T17:50:44-03:00\"}','2022-07-26 17:50:54'),(46,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:11:03-03:00\"}','{\"modified\":\"2022-07-26T17:50:54-03:00\"}','2022-07-26 18:11:03'),(47,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:12:28-03:00\"}','{\"modified\":\"2022-07-26T18:11:03-03:00\"}','2022-07-26 18:12:28'),(48,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:13:25-03:00\"}','{\"modified\":\"2022-07-26T18:12:28-03:00\"}','2022-07-26 18:13:25'),(49,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:14:37-03:00\"}','{\"modified\":\"2022-07-26T18:13:25-03:00\"}','2022-07-26 18:14:37'),(50,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:14:58-03:00\"}','{\"modified\":\"2022-07-26T18:14:37-03:00\"}','2022-07-26 18:14:58'),(51,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:16:30-03:00\"}','{\"modified\":\"2022-07-26T18:14:58-03:00\"}','2022-07-26 18:16:30'),(52,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:18:09-03:00\"}','{\"modified\":\"2022-07-26T18:16:30-03:00\"}','2022-07-26 18:18:09'),(53,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:19:10-03:00\"}','{\"modified\":\"2022-07-26T18:18:09-03:00\"}','2022-07-26 18:19:11'),(54,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:19:19-03:00\"}','{\"modified\":\"2022-07-26T18:19:10-03:00\"}','2022-07-26 18:19:19'),(55,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:19:37-03:00\"}','{\"modified\":\"2022-07-26T18:19:19-03:00\"}','2022-07-26 18:19:37'),(56,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:20:28-03:00\"}','{\"modified\":\"2022-07-26T18:19:37-03:00\"}','2022-07-26 18:20:28'),(57,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:21:12-03:00\"}','{\"modified\":\"2022-07-26T18:20:28-03:00\"}','2022-07-26 18:21:12'),(58,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:21:19-03:00\"}','{\"modified\":\"2022-07-26T18:21:12-03:00\"}','2022-07-26 18:21:19'),(59,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:21:42-03:00\"}','{\"modified\":\"2022-07-26T18:21:19-03:00\"}','2022-07-26 18:21:42'),(60,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:21:58-03:00\"}','{\"modified\":\"2022-07-26T18:21:42-03:00\"}','2022-07-26 18:21:58'),(61,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:28:49-03:00\"}','{\"modified\":\"2022-07-26T18:21:58-03:00\"}','2022-07-26 18:28:49'),(62,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:33:34-03:00\"}','{\"modified\":\"2022-07-26T18:28:49-03:00\"}','2022-07-26 18:33:34'),(63,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:34:48-03:00\"}','{\"modified\":\"2022-07-26T18:33:34-03:00\"}','2022-07-26 18:34:48'),(64,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:35:09-03:00\"}','{\"modified\":\"2022-07-26T18:34:48-03:00\"}','2022-07-26 18:35:09'),(65,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:35:11-03:00\"}','{\"modified\":\"2022-07-26T18:35:09-03:00\"}','2022-07-26 18:35:11'),(66,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:35:16-03:00\"}','{\"modified\":\"2022-07-26T18:35:11-03:00\"}','2022-07-26 18:35:16'),(67,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:37:14-03:00\"}','{\"modified\":\"2022-07-26T18:35:16-03:00\"}','2022-07-26 18:37:14'),(68,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:38:26-03:00\"}','{\"modified\":\"2022-07-26T18:37:14-03:00\"}','2022-07-26 18:38:26'),(69,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:40:20-03:00\"}','{\"modified\":\"2022-07-26T18:38:26-03:00\"}','2022-07-26 18:40:20'),(70,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:40:39-03:00\"}','{\"modified\":\"2022-07-26T18:40:20-03:00\"}','2022-07-26 18:40:39'),(71,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:41:17-03:00\"}','{\"modified\":\"2022-07-26T18:40:39-03:00\"}','2022-07-26 18:41:17'),(72,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:43:19-03:00\"}','{\"modified\":\"2022-07-26T18:41:17-03:00\"}','2022-07-26 18:43:19'),(73,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:45:46-03:00\"}','{\"modified\":\"2022-07-26T18:43:19-03:00\"}','2022-07-26 18:45:46'),(74,1,'Users',1,'Update','{\"modified\":\"2022-07-26T18:46:02-03:00\"}','{\"modified\":\"2022-07-26T18:45:46-03:00\"}','2022-07-26 18:46:02'),(75,1,'Users',14,'Delete','[]','{\"created\":\"2022-07-26T17:27:58-03:00\",\"id\":14,\"level_id\":1,\"modified\":\"2022-07-28T11:17:31-03:00\",\"user\":\"#del-14#dionata\"}','2022-07-28 11:17:31'),(76,1,'Users',1,'Update','{\"modified\":\"2022-07-28T11:58:15-03:00\"}','{\"modified\":\"2022-07-26T18:46:02-03:00\"}','2022-07-28 11:58:15'),(77,1,'Users',1,'Update','{\"modified\":\"2022-07-29T01:05:49-03:00\"}','{\"modified\":\"2022-07-28T11:58:15-03:00\"}','2022-07-29 01:05:49'),(78,1,'Levels',8,'Create','{\"created\":\"2022-07-29T01:11:52-03:00\",\"id\":8,\"modified\":\"2022-07-29T01:11:52-03:00\",\"name\":\"asdasd\",\"status\":1}','[]','2022-07-29 01:11:52'),(79,1,'Levels',1,'Update','{\"modified\":\"2022-07-30T17:28:40-03:00\",\"permissions\":[\"Admin:About:index\",\"Admin:About:view\",\"Admin:About:add\",\"Admin:About:edit\",\"Admin:About:delete\",\"Admin:Levels:index\",\"Admin:Levels:add\",\"Admin:Levels:edit\",\"Admin:Levels:delete\",\"Admin:LogsAccess:index\",\"Admin:LogsAccess:view\",\"Admin:LogsChange:index\",\"Admin:LogsChange:view\",\"Admin:LogsChange:add\",\"Admin:LogsChange:edit\",\"Admin:LogsChange:delete\",\"Admin:SystemParameters:edit\",\"Admin:Users:index\",\"Admin:Users:add\",\"Admin:Users:edit\",\"Admin:Users:delete\"]}','{\"modified\":\"2022-07-23T03:23:57-03:00\",\"permissions\":[\"Admin:About:index\",\"Admin:About:view\",\"Admin:About:add\",\"Admin:About:edit\",\"Admin:About:delete\",\"Admin:Levels:index\",\"Admin:Levels:add\",\"Admin:Levels:edit\",\"Admin:Levels:delete\",\"Admin:LogsAccess:index\",\"Admin:LogsAccess:view\",\"Admin:LogsChange:index\",\"Admin:LogsChange:view\",\"Admin:LogsChange:add\",\"Admin:LogsChange:edit\",\"Admin:LogsChange:delete\",\"Admin:SystemParameters:edit\",\"Admin:Users:index\",\"Admin:Users:add\",\"Admin:Users:edit\",\"Admin:Users:delete\"]}','2022-07-30 17:28:40'),(80,1,'Users',1,'Update','{\"modified\":\"2022-07-30T19:38:35-03:00\"}','{\"modified\":\"2022-07-29T01:05:49-03:00\"}','2022-07-30 19:38:36'),(81,1,'Users',1,'Update','{\"modified\":\"2022-07-30T19:41:21-03:00\"}','{\"modified\":\"2022-07-30T19:38:35-03:00\"}','2022-07-30 19:41:21'),(82,1,'Levels',1,'Update','{\"modified\":\"2022-08-01T11:38:26-03:00\",\"permissions\":[\"Admin:About:edit\",\"Admin:About:banners\",\"Admin:Levels:index\",\"Admin:Levels:add\",\"Admin:Levels:edit\",\"Admin:Levels:delete\",\"Admin:LogsAccess:index\",\"Admin:LogsChange:index\",\"Admin:LogsChange:view\",\"Admin:SystemParameters:edit\",\"Admin:Users:index\",\"Admin:Users:add\",\"Admin:Users:edit\",\"Admin:Users:delete\"]}','{\"modified\":\"2022-07-30T17:28:40-03:00\",\"permissions\":[\"Admin:About:edit\",\"Admin:About:banners\",\"Admin:Levels:index\",\"Admin:Levels:add\",\"Admin:Levels:edit\",\"Admin:Levels:delete\",\"Admin:LogsAccess:index\",\"Admin:LogsChange:index\",\"Admin:LogsChange:view\",\"Admin:SystemParameters:edit\",\"Admin:Users:index\",\"Admin:Users:add\",\"Admin:Users:edit\",\"Admin:Users:delete\"]}','2022-08-01 11:38:26'),(83,1,'Tags',1,'Create','{\"created\":\"2022-08-01T11:44:04-03:00\",\"id\":1,\"modified\":\"2022-08-01T11:44:04-03:00\",\"name\":\"Blog\"}','[]','2022-08-01 11:44:04'),(84,1,'Tags',2,'Create','{\"created\":\"2022-08-01T11:44:21-03:00\",\"id\":2,\"modified\":\"2022-08-01T11:44:21-03:00\",\"name\":\"Artigos\"}','[]','2022-08-01 11:44:21'),(85,1,'Tags',1,'Create','{\"created\":\"2022-08-01T11:58:06-03:00\",\"id\":1,\"modified\":\"2022-08-01T11:58:06-03:00\",\"name\":\"teste nome\",\"slug\":\"teste-nome\",\"status\":1}','[]','2022-08-01 11:58:06'),(86,1,'Tags',2,'Create','{\"created\":\"2022-08-01T11:58:39-03:00\",\"id\":2,\"modified\":\"2022-08-01T11:58:39-03:00\",\"name\":\"Test aaa NBA blog Com Ac\\u00eanto\",\"slug\":\"Test-aaa-NBA-blog-Com-Acento\",\"status\":1}','[]','2022-08-01 11:58:39'),(87,1,'Tags',2,'Update','{\"modified\":\"2022-08-01T11:59:00-03:00\",\"slug\":\"test-aaa-nba-blog-com-acento\"}','{\"modified\":\"2022-08-01T11:58:39-03:00\",\"slug\":\"Test-aaa-NBA-blog-Com-Acento\"}','2022-08-01 11:59:00'),(88,1,'Tags',2,'Delete','[]','{\"created\":\"2022-08-01T11:58:39-03:00\",\"id\":2,\"modified\":\"2022-08-01T14:19:59-03:00\",\"name\":\"Test aaa NBA blog Com Ac\\u00eanto\",\"slug\":\"test-aaa-nba-blog-com-acento\"}','2022-08-01 14:19:59'),(89,1,'Tags',3,'Create','{\"created\":\"2022-08-01T14:22:51-03:00\",\"id\":3,\"modified\":\"2022-08-01T14:22:51-03:00\",\"name\":\"Test 2\",\"slug\":\"test-2\",\"status\":1}','[]','2022-08-01 14:22:51'),(90,1,'Tags',3,'Delete','[]','{\"created\":\"2022-08-01T14:22:51-03:00\",\"id\":3,\"modified\":\"2022-08-01T14:23:14-03:00\",\"name\":\"Test 2\",\"slug\":\"test-2\"}','2022-08-01 14:23:14'),(91,1,'Levels',1,'Update','{\"modified\":\"2022-08-01T14:43:45-03:00\",\"permissions\":[\"Admin:About:edit\",\"Admin:About:banners\",\"Admin:Levels:index\",\"Admin:Levels:add\",\"Admin:Levels:edit\",\"Admin:Levels:delete\",\"Admin:LogsAccess:index\",\"Admin:LogsChange:index\",\"Admin:LogsChange:view\",\"Admin:SystemParameters:edit\",\"Admin:Tags:index\",\"Admin:Tags:add\",\"Admin:Tags:edit\",\"Admin:Tags:delete\",\"Admin:Users:index\",\"Admin:Users:add\",\"Admin:Users:edit\",\"Admin:Users:delete\"]}','{\"modified\":\"2022-08-01T11:38:26-03:00\",\"permissions\":[\"Admin:About:edit\",\"Admin:About:banners\",\"Admin:Levels:index\",\"Admin:Levels:add\",\"Admin:Levels:edit\",\"Admin:Levels:delete\",\"Admin:LogsAccess:index\",\"Admin:LogsChange:index\",\"Admin:LogsChange:view\",\"Admin:SystemParameters:edit\",\"Admin:Tags:index\",\"Admin:Tags:add\",\"Admin:Tags:edit\",\"Admin:Tags:delete\",\"Admin:Users:index\",\"Admin:Users:add\",\"Admin:Users:edit\",\"Admin:Users:delete\"]}','2022-08-01 14:43:45'),(92,1,'Tags',4,'Create','{\"created\":\"2022-08-01T14:45:47-03:00\",\"id\":4,\"modified\":\"2022-08-01T14:45:47-03:00\",\"name\":\"Blog\",\"slug\":\"blog\",\"status\":1}','[]','2022-08-01 14:45:47'),(93,1,'BlogsCategories',1,'Create','{\"created\":\"2022-08-01T14:50:55-03:00\",\"id\":1,\"modified\":\"2022-08-01T14:50:55-03:00\",\"name\":\"Blog\",\"slug\":\"blog\",\"status\":1}','[]','2022-08-01 14:50:55'),(94,1,'BlogsCategories',2,'Create','{\"created\":\"2022-08-01T14:51:09-03:00\",\"id\":2,\"modified\":\"2022-08-01T14:51:09-03:00\",\"name\":\"Artigos\",\"slug\":\"artigos\",\"status\":1}','[]','2022-08-01 14:51:09'),(95,1,'BlogsCategories',3,'Create','{\"created\":\"2022-08-01T14:54:43-03:00\",\"id\":3,\"modified\":\"2022-08-01T14:54:43-03:00\",\"name\":\"teste \",\"slug\":\"teste\",\"status\":1}','[]','2022-08-01 14:54:43'),(96,1,'BlogsCategories',3,'Delete','[]','{\"created\":\"2022-08-01T14:54:43-03:00\",\"id\":3,\"modified\":\"2022-08-01T14:54:56-03:00\",\"name\":\"teste \",\"slug\":\"teste\"}','2022-08-01 14:54:56'),(97,1,'Levels',1,'Update','{\"modified\":\"2022-08-01T15:11:26-03:00\",\"permissions\":[\"Admin:About:edit\",\"Admin:About:banners\",\"Admin:BlogsCategories:index\",\"Admin:BlogsCategories:add\",\"Admin:BlogsCategories:edit\",\"Admin:BlogsCategories:delete\",\"Admin:Levels:index\",\"Admin:Levels:add\",\"Admin:Levels:edit\",\"Admin:Levels:delete\",\"Admin:LogsAccess:index\",\"Admin:LogsChange:index\",\"Admin:LogsChange:view\",\"Admin:SystemParameters:edit\",\"Admin:Tags:index\",\"Admin:Tags:add\",\"Admin:Tags:edit\",\"Admin:Tags:delete\",\"Admin:Users:index\",\"Admin:Users:add\",\"Admin:Users:edit\",\"Admin:Users:delete\"]}','{\"modified\":\"2022-08-01T14:43:45-03:00\",\"permissions\":[\"Admin:About:edit\",\"Admin:About:banners\",\"Admin:BlogsCategories:index\",\"Admin:BlogsCategories:add\",\"Admin:BlogsCategories:edit\",\"Admin:BlogsCategories:delete\",\"Admin:Levels:index\",\"Admin:Levels:add\",\"Admin:Levels:edit\",\"Admin:Levels:delete\",\"Admin:LogsAccess:index\",\"Admin:LogsChange:index\",\"Admin:LogsChange:view\",\"Admin:SystemParameters:edit\",\"Admin:Tags:index\",\"Admin:Tags:add\",\"Admin:Tags:edit\",\"Admin:Tags:delete\",\"Admin:Users:index\",\"Admin:Users:add\",\"Admin:Users:edit\",\"Admin:Users:delete\"]}','2022-08-01 15:11:26'),(98,1,'Blogs',1,'Create','{\"blog_category_id\":\"1\",\"content\":\"<p>asdasdasdasdasdasd<\\/p>\",\"created\":\"2022-08-01T15:23:55-03:00\",\"id\":1,\"modified\":\"2022-08-01T15:23:55-03:00\",\"slug\":\"123\",\"subtitle\":\"asdasdasd\",\"title\":\"123\",\"user_id\":1}','[]','2022-08-01 15:23:55'),(99,1,'Blogs',2,'Create','{\"blog_category_id\":\"1\",\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Urna condimentum mattis pellentesque id nibh tortor id. Amet commodo nulla facilisi nullam vehicula ipsum. Amet facilisis magna etiam tempor orci eu lobortis elementum. Dui sapien eget mi proin sed. Pharetra diam sit amet nisl suscipit adipiscing bibendum. Amet justo donec enim diam vulputate ut. Mattis pellentesque id nibh tortor id aliquet lectus proin. Nulla at volutpat diam ut venenatis tellus. Vitae auctor eu augue ut. Et ligula ullamcorper malesuada proin libero nunc consequat interdum. Molestie a iaculis at erat pellentesque adipiscing commodo elit. Ut morbi tincidunt augue interdum. Mattis ullamcorper velit sed ullamcorper morbi. Enim tortor at auctor urna.<\\/p>\\r\\n\\r\\n<p>Vitae purus faucibus ornare suspendisse sed nisi. Elit eget gravida cum sociis natoque penatibus et magnis dis. Neque convallis a cras semper auctor neque vitae tempus. Congue nisi vitae suscipit tellus mauris. Ornare aenean euismod elementum nisi quis eleifend quam. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Dui id ornare arcu odio ut sem nulla pharetra. Volutpat diam ut venenatis tellus. Curabitur vitae nunc sed velit dignissim sodales ut eu sem. Libero id faucibus nisl tincidunt eget nullam non. Sit amet dictum sit amet justo donec enim diam. Consectetur adipiscing elit pellentesque habitant morbi tristique senectus et. Tristique senectus et netus et malesuada. Quam nulla porttitor massa id neque. Fames ac turpis egestas maecenas pharetra convallis posuere morbi.<\\/p>\\r\\n\\r\\n<p>Leo a diam sollicitudin tempor id. Elit ut aliquam purus sit amet luctus venenatis lectus. Faucibus in ornare quam viverra. Purus viverra accumsan in nisl nisi. Sed blandit libero volutpat sed cras ornare arcu dui vivamus. A erat nam at lectus urna. Dui id ornare arcu odio ut sem nulla pharetra. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Vestibulum morbi blandit cursus risus. Erat velit scelerisque in dictum non consectetur a erat nam. Ac placerat vestibulum lectus mauris. Neque egestas congue quisque egestas. Penatibus et magnis dis parturient montes nascetur.<\\/p>\\r\\n\\r\\n<p>Nec nam aliquam sem et. Lectus magna fringilla urna porttitor rhoncus. Neque egestas congue quisque egestas diam in arcu cursus. Leo vel orci porta non pulvinar neque. Cras sed felis eget velit aliquet sagittis id. Egestas maecenas pharetra convallis posuere. Fringilla ut morbi tincidunt augue interdum velit euismod in pellentesque. Bibendum arcu vitae elementum curabitur vitae nunc sed. Vestibulum mattis ullamcorper velit sed ullamcorper. Nisl condimentum id venenatis a condimentum vitae. Turpis egestas integer eget aliquet nibh praesent tristique magna sit. Feugiat pretium nibh ipsum consequat. Aliquet sagittis id consectetur purus ut faucibus pulvinar elementum integer. Aliquet bibendum enim facilisis gravida neque convallis. Vitae elementum curabitur vitae nunc sed. Mauris nunc congue nisi vitae suscipit tellus mauris a diam. Et malesuada fames ac turpis egestas integer eget. Dapibus ultrices in iaculis nunc. Sed viverra tellus in hac habitasse.<\\/p>\\r\\n\\r\\n<p>Fringilla urna porttitor rhoncus dolor purus non enim. Netus et malesuada fames ac turpis. Volutpat odio facilisis mauris sit amet massa vitae. Risus at ultrices mi tempus imperdiet nulla malesuada. Enim sit amet venenatis urna cursus. Morbi tincidunt ornare massa eget egestas. Metus aliquam eleifend mi in nulla posuere sollicitudin aliquam. Sit amet tellus cras adipiscing enim eu turpis egestas pretium. Id leo in vitae turpis massa sed elementum. Porttitor lacus luctus accumsan tortor posuere ac ut consequat. Turpis massa sed elementum tempus egestas sed sed risus pretium. Odio facilisis mauris sit amet massa vitae tortor condimentum lacinia. Dolor sed viverra ipsum nunc aliquet.<\\/p>\\r\\n\\r\\n<p>Faucibus pulvinar elementum integer enim neque. Donec pretium vulputate sapien nec sagittis aliquam. Arcu non odio euismod lacinia at quis. Massa tincidunt nunc pulvinar sapien. Vel risus commodo viverra maecenas accumsan lacus vel facilisis volutpat. Proin sed libero enim sed faucibus turpis in eu mi. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Vitae turpis massa sed elementum. Ut tellus elementum sagittis vitae et leo duis. Lacus sed turpis tincidunt id. In nibh mauris cursus mattis molestie a iaculis at erat. Sit amet cursus sit amet dictum sit amet justo donec. Faucibus pulvinar elementum integer enim. Tristique senectus et netus et malesuada fames ac. Duis at tellus at urna condimentum.<\\/p>\\r\\n\\r\\n<p>Aliquam sem et tortor consequat id porta nibh venenatis. Enim neque volutpat ac tincidunt vitae semper quis lectus. Arcu vitae elementum curabitur vitae nunc sed. Lorem sed risus ultricies tristique nulla aliquet enim tortor at. Vestibulum morbi blandit cursus risus at ultrices mi. Maecenas ultricies mi eget mauris pharetra et ultrices neque ornare. Lectus mauris ultrices eros in cursus. A arcu cursus vitae congue mauris. Fringilla ut morbi tincidunt augue interdum velit. Tincidunt praesent semper feugiat nibh sed pulvinar proin gravida. Risus sed vulputate odio ut enim blandit volutpat. Adipiscing elit pellentesque habitant morbi tristique senectus et netus. Sagittis orci a scelerisque purus semper eget duis. Tristique senectus et netus et. Ligula ullamcorper malesuada proin libero nunc consequat interdum. Tortor vitae purus faucibus ornare suspendisse.<\\/p>\\r\\n\\r\\n<p>Augue ut lectus arcu bibendum at. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus urna. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit lectus. Morbi tincidunt ornare massa eget egestas purus viverra accumsan. At urna condimentum mattis pellentesque id. Sed tempus urna et pharetra pharetra massa. Neque volutpat ac tincidunt vitae semper quis lectus nulla. Sodales ut eu sem integer vitae justo eget magna fermentum. Duis ut diam quam nulla porttitor massa id neque. Fermentum iaculis eu non diam phasellus vestibulum lorem. Hendrerit dolor magna eget est lorem ipsum. Ut tortor pretium viverra suspendisse potenti. Nunc scelerisque viverra mauris in aliquam sem fringilla ut. Feugiat pretium nibh ipsum consequat nisl vel. Amet porttitor eget dolor morbi non arcu.<\\/p>\\r\\n\\r\\n<p>Vel elit scelerisque mauris pellentesque. Commodo elit at imperdiet dui accumsan sit amet. Vulputate enim nulla aliquet porttitor lacus. Lobortis mattis aliquam faucibus purus in massa tempor. Tellus mauris a diam maecenas sed enim ut. At augue eget arcu dictum. Viverra justo nec ultrices dui. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Orci nulla pellentesque dignissim enim. Mattis enim ut tellus elementum sagittis vitae et leo. Ac auctor augue mauris augue neque gravida in. Diam ut venenatis tellus in metus vulputate eu. Ornare aenean euismod elementum nisi quis. Purus semper eget duis at tellus at urna. Nunc eget lorem dolor sed viverra ipsum. Quis auctor elit sed vulputate mi sit amet mauris.<\\/p>\\r\\n\\r\\n<p>Cursus risus at ultrices mi. Facilisis leo vel fringilla est ullamcorper. Laoreet sit amet cursus sit amet dictum sit amet. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam. Nibh tellus molestie nunc non blandit massa enim. Imperdiet dui accumsan sit amet nulla facilisi morbi. Justo eget magna fermentum iaculis eu. Viverra justo nec ultrices dui. Ut porttitor leo a diam. Congue nisi vitae suscipit tellus. Urna condimentum mattis pellentesque id nibh tortor.<\\/p>\\r\\n\\r\\n<p>Molestie ac feugiat sed lectus vestibulum mattis ullamcorper velit. Vitae aliquet nec ullamcorper sit. Volutpat blandit aliquam etiam erat. Lorem ipsum dolor sit amet consectetur adipiscing elit duis. Nascetur ridiculus mus mauris vitae ultricies leo. Ac orci phasellus egestas tellus rutrum tellus. Netus et malesuada fames ac turpis egestas. Mi ipsum faucibus vitae aliquet nec ullamcorper sit. At in tellus integer feugiat scelerisque varius morbi enim nunc. Est lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque. Urna cursus eget nunc scelerisque viverra. Dignissim cras tincidunt lobortis feugiat vivamus at. Urna molestie at elementum eu facilisis sed odio morbi quis. Aliquet nec ullamcorper sit amet risus nullam eget felis. Tempus iaculis urna id volutpat lacus. Sapien pellentesque habitant morbi tristique. Non consectetur a erat nam at. Tempus egestas sed sed risus pretium quam vulputate. Malesuada nunc vel risus commodo.<\\/p>\\r\\n\\r\\n<p>Elementum curabitur vitae nunc sed velit dignissim sodales ut eu. Convallis aenean et tortor at risus viverra adipiscing. Est velit egestas dui id. Pellentesque eu tincidunt tortor aliquam nulla facilisi cras fermentum. Arcu cursus vitae congue mauris rhoncus aenean vel. Arcu cursus euismod quis viverra nibh. In iaculis nunc sed augue lacus viverra. Metus dictum at tempor commodo ullamcorper a lacus vestibulum sed. Elementum curabitur vitae nunc sed velit. Est ultricies integer quis auctor elit sed vulputate mi. Lobortis mattis aliquam faucibus purus.<\\/p>\\r\\n\\r\\n<p>Donec et odio pellentesque diam volutpat commodo. Lacus vel facilisis volutpat est velit egestas dui id. Nisl nisi scelerisque eu ultrices vitae auctor eu augue ut. Velit dignissim sodales ut eu sem integer. Bibendum est ultricies integer quis auctor elit sed vulputate. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed velit. Orci porta non pulvinar neque laoreet. Nulla aliquet porttitor lacus luctus accumsan. Tellus orci ac auctor augue mauris augue neque. Aenean vel elit scelerisque mauris pellentesque.<\\/p>\\r\\n\\r\\n<p>Sed cras ornare arcu dui vivamus arcu felis bibendum. Et netus et malesuada fames ac. Ultricies tristique nulla aliquet enim. Molestie ac feugiat sed lectus vestibulum mattis ullamcorper velit sed. A scelerisque purus semper eget duis at tellus at urna. Egestas fringilla phasellus faucibus scelerisque. Nisi quis eleifend quam adipiscing vitae proin sagittis nisl. Neque convallis a cras semper auctor neque vitae tempus. Etiam erat velit scelerisque in. Cursus risus at ultrices mi tempus. Viverra ipsum nunc aliquet bibendum enim facilisis. Tellus elementum sagittis vitae et. Venenatis urna cursus eget nunc scelerisque viverra. Adipiscing tristique risus nec feugiat in. Justo nec ultrices dui sapien eget mi. Vel turpis nunc eget lorem dolor sed viverra. Ornare arcu odio ut sem nulla pharetra diam sit amet.<\\/p>\",\"created\":\"2022-08-01T20:02:42-03:00\",\"id\":2,\"modified\":\"2022-08-01T20:02:42-03:00\",\"slug\":\"asdasdasd\",\"status\":1,\"subtitle\":\"asdasdasd\",\"title\":\"asdasdasd\",\"user_id\":1}','[]','2022-08-01 20:02:42'),(100,1,'Blogs',2,'Update','{\"modified\":\"2022-08-01T20:03:55-03:00\",\"slug\":\"blog-teste-2\",\"subtitle\":\"Sub titulo Blog Teste 2\",\"title\":\"Blog teste 2\"}','{\"modified\":\"2022-08-01T20:02:42-03:00\",\"slug\":\"asdasdasd\",\"subtitle\":\"asdasdasd\",\"title\":\"asdasdasd\"}','2022-08-01 20:03:55'),(101,1,'Blogs',2,'Update','{\"modified\":\"2022-08-01T20:57:52-03:00\",\"tags_ids\":[\"1\",\"4\"]}','{\"modified\":\"2022-08-01T20:03:55-03:00\",\"tags_ids\":[\"1\",\"4\"]}','2022-08-01 20:57:52'),(102,1,'Blogs',2,'Update','{\"modified\":\"2022-08-01T20:58:44-03:00\",\"tags_ids\":[]}','{\"modified\":\"2022-08-01T20:57:52-03:00\",\"tags_ids\":[]}','2022-08-01 20:58:44'),(103,1,'Blogs',2,'Update','{\"modified\":\"2022-08-01T20:59:00-03:00\",\"tags_ids\":[]}','{\"modified\":\"2022-08-01T20:58:44-03:00\",\"tags_ids\":[]}','2022-08-01 20:59:00'),(104,1,'Blogs',2,'Update','{\"modified\":\"2022-08-01T21:00:02-03:00\",\"tags_ids\":[]}','{\"modified\":\"2022-08-01T20:59:00-03:00\",\"tags_ids\":[]}','2022-08-01 21:00:02'),(105,1,'Blogs',2,'Update','{\"modified\":\"2022-08-01T21:00:12-03:00\",\"tags_ids\":[\"4\",\"1\"]}','{\"modified\":\"2022-08-01T21:00:02-03:00\",\"tags_ids\":[\"4\",\"1\"]}','2022-08-01 21:00:12'),(106,1,'Blogs',1,'Update','{\"modified\":\"2022-08-01T21:06:17-03:00\",\"tags_ids\":[]}','{\"modified\":\"2022-08-01T15:23:55-03:00\",\"tags_ids\":[]}','2022-08-01 21:06:17'),(107,1,'Blogs',1,'Update','{\"modified\":\"2022-08-01T21:06:22-03:00\",\"tags_ids\":[]}','{\"modified\":\"2022-08-01T21:06:17-03:00\",\"tags_ids\":[]}','2022-08-01 21:06:22'),(108,1,'Blogs',1,'Update','{\"modified\":\"2022-08-01T21:06:30-03:00\",\"tags_ids\":[\"1\"]}','{\"modified\":\"2022-08-01T21:06:22-03:00\",\"tags_ids\":[\"1\"]}','2022-08-01 21:06:30'),(109,1,'Blogs',1,'Update','{\"modified\":\"2022-08-01T21:06:51-03:00\",\"tags_ids\":[\"1\"]}','{\"modified\":\"2022-08-01T21:06:30-03:00\",\"tags_ids\":[\"1\"]}','2022-08-01 21:06:51'),(110,1,'Blogs',1,'Update','{\"modified\":\"2022-08-01T21:07:25-03:00\",\"tags_ids\":[\"1\"]}','{\"modified\":\"2022-08-01T21:06:51-03:00\",\"tags_ids\":[\"1\"]}','2022-08-01 21:07:25'),(111,1,'Blogs',1,'Update','{\"modified\":\"2022-08-01T21:07:54-03:00\",\"tags_ids\":[\"1\"]}','{\"modified\":\"2022-08-01T21:07:25-03:00\",\"tags_ids\":[\"1\"]}','2022-08-01 21:07:54'),(112,1,'Blogs',1,'Update','{\"modified\":\"2022-08-01T21:08:26-03:00\",\"tags_ids\":[\"1\"]}','{\"modified\":\"2022-08-01T21:07:54-03:00\",\"tags_ids\":[\"1\"]}','2022-08-01 21:08:26'),(113,1,'Blogs',1,'Update','{\"modified\":\"2022-08-01T21:08:57-03:00\",\"tags_ids\":[\"1\"]}','{\"modified\":\"2022-08-01T21:08:26-03:00\",\"tags_ids\":[\"1\"]}','2022-08-01 21:08:57'),(114,1,'Blogs',1,'Update','{\"modified\":\"2022-08-01T21:09:20-03:00\",\"tags_ids\":[\"1\"]}','{\"modified\":\"2022-08-01T21:08:57-03:00\",\"tags_ids\":[\"1\"]}','2022-08-01 21:09:20'),(115,1,'Blogs',1,'Update','{\"modified\":\"2022-08-01T21:09:34-03:00\",\"tags_ids\":[\"1\"]}','{\"modified\":\"2022-08-01T21:09:20-03:00\",\"tags_ids\":[\"1\"]}','2022-08-01 21:09:34'),(116,1,'Blogs',1,'Update','{\"modified\":\"2022-08-01T21:09:41-03:00\",\"tags_ids\":[]}','{\"modified\":\"2022-08-01T21:09:34-03:00\",\"tags_ids\":[]}','2022-08-01 21:09:41'),(117,1,'Blogs',1,'Update','{\"modified\":\"2022-08-01T21:10:00-03:00\",\"tags_ids\":[\"1\"]}','{\"modified\":\"2022-08-01T21:09:41-03:00\",\"tags_ids\":[\"1\"]}','2022-08-01 21:10:00'),(118,1,'Blogs',1,'Update','{\"modified\":\"2022-08-01T21:10:09-03:00\",\"tags_ids\":[\"4\"]}','{\"modified\":\"2022-08-01T21:10:00-03:00\",\"tags_ids\":[\"4\"]}','2022-08-01 21:10:09'),(119,1,'Blogs',1,'Update','{\"modified\":\"2022-08-01T21:10:21-03:00\",\"show_website\":true,\"tags_ids\":[\"1\"]}','{\"modified\":\"2022-08-01T21:10:09-03:00\",\"show_website\":false,\"tags_ids\":[\"1\"]}','2022-08-01 21:10:21'),(120,1,'Blogs',3,'Create','{\"blog_category_id\":\"2\",\"content\":\"<p>Egestas erat imperdiet sed euismod nisi. Lorem donec massa sapien faucibus et. Molestie a iaculis at erat pellentesque adipiscing commodo elit. Lacus viverra vitae congue eu. Vitae suscipit tellus mauris a diam maecenas sed enim. Ut placerat orci nulla pellentesque dignissim. Ultrices neque ornare aenean euismod elementum nisi. Tellus integer feugiat scelerisque varius morbi enim nunc faucibus. In vitae turpis massa sed elementum. Nunc mattis enim ut tellus elementum sagittis vitae. Phasellus egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam. Sagittis eu volutpat odio facilisis mauris sit amet massa vitae. Aliquet bibendum enim facilisis gravida neque convallis a cras.<\\/p>\\r\\n\\r\\n<p>Gravida rutrum quisque non tellus orci ac auctor augue. Euismod lacinia at quis risus sed vulputate odio ut enim. Ultricies mi quis hendrerit dolor magna eget est lorem ipsum. Auctor elit sed vulputate mi sit. Lacinia at quis risus sed vulputate odio. Vulputate odio ut enim blandit volutpat maecenas. Senectus et netus et malesuada fames. Venenatis tellus in metus vulputate eu scelerisque felis imperdiet proin. Tincidunt augue interdum velit euismod. Amet purus gravida quis blandit turpis cursus in. Lacinia at quis risus sed vulputate. Rhoncus mattis rhoncus urna neque viverra justo nec. Ultrices sagittis orci a scelerisque purus semper eget duis at. Nulla facilisi cras fermentum odio.<\\/p>\\r\\n\\r\\n<p>Pretium lectus quam id leo. Vitae aliquet nec ullamcorper sit amet risus nullam. Neque egestas congue quisque egestas diam in arcu cursus euismod. Vulputate ut pharetra sit amet aliquam id diam maecenas ultricies. Neque volutpat ac tincidunt vitae. Blandit massa enim nec dui. Commodo quis imperdiet massa tincidunt nunc pulvinar sapien et ligula. Eu lobortis elementum nibh tellus molestie nunc non. Ut sem nulla pharetra diam sit. Sit amet nisl purus in mollis nunc sed id. Ut pharetra sit amet aliquam id. Mauris pharetra et ultrices neque ornare aenean. Rhoncus aenean vel elit scelerisque mauris. Vulputate mi sit amet mauris commodo quis. Donec ultrices tincidunt arcu non sodales neque. Arcu non odio euismod lacinia at quis risus sed. Morbi quis commodo odio aenean sed adipiscing diam. Sed velit dignissim sodales ut eu sem. Velit aliquet sagittis id consectetur. Diam donec adipiscing tristique risus nec feugiat in fermentum.<\\/p>\\r\\n\\r\\n<p>Ullamcorper eget nulla facilisi etiam dignissim diam quis enim lobortis. Eros in cursus turpis massa tincidunt dui. Pretium viverra suspendisse potenti nullam ac tortor vitae. Magna fringilla urna porttitor rhoncus. Scelerisque in dictum non consectetur a erat. Montes nascetur ridiculus mus mauris vitae ultricies. Nulla aliquet porttitor lacus luctus accumsan tortor posuere ac ut. In hac habitasse platea dictumst vestibulum. Fames ac turpis egestas maecenas pharetra convallis. Nibh tortor id aliquet lectus proin nibh nisl condimentum id. Nullam vehicula ipsum a arcu cursus vitae congue mauris rhoncus. Orci eu lobortis elementum nibh tellus molestie nunc non. Morbi leo urna molestie at elementum. Purus in mollis nunc sed id semper risus. Ut diam quam nulla porttitor massa id neque. Et ultrices neque ornare aenean.<\\/p>\\r\\n\\r\\n<p>Placerat in egestas erat imperdiet sed. Sed tempus urna et pharetra pharetra massa. Ullamcorper malesuada proin libero nunc. Morbi tristique senectus et netus et malesuada fames ac. Eget sit amet tellus cras adipiscing enim eu turpis. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi. Lorem dolor sed viverra ipsum. Nisi quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Vitae proin sagittis nisl rhoncus mattis rhoncus. Ac placerat vestibulum lectus mauris ultrices eros. Sit amet cursus sit amet dictum. Massa sapien faucibus et molestie ac. Tincidunt vitae semper quis lectus nulla. Pharetra diam sit amet nisl suscipit adipiscing.<\\/p>\\r\\n\\r\\n<p>Auctor augue mauris augue neque gravida in fermentum. Ipsum nunc aliquet bibendum enim facilisis gravida neque convallis a. Senectus et netus et malesuada fames. Cursus vitae congue mauris rhoncus aenean. Egestas quis ipsum suspendisse ultrices. Tortor dignissim convallis aenean et tortor. Tellus orci ac auctor augue. Nec ullamcorper sit amet risus nullam eget felis eget nunc. Feugiat nisl pretium fusce id velit. Eu ultrices vitae auctor eu. Lacus vestibulum sed arcu non odio. Lacus sed viverra tellus in hac habitasse platea. In pellentesque massa placerat duis ultricies lacus. Lobortis elementum nibh tellus molestie nunc non blandit. Pharetra massa massa ultricies mi quis hendrerit dolor. Viverra adipiscing at in tellus integer feugiat. Egestas congue quisque egestas diam in. Neque ornare aenean euismod elementum nisi quis. Nunc eget lorem dolor sed viverra. Quam quisque id diam vel.<\\/p>\\r\\n\\r\\n<p>Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae. Amet aliquam id diam maecenas ultricies mi eget mauris pharetra. Adipiscing elit pellentesque habitant morbi tristique senectus et. Ante metus dictum at tempor commodo ullamcorper a. Nec ultrices dui sapien eget mi proin sed libero enim. Neque egestas congue quisque egestas. Lectus urna duis convallis convallis tellus id. Tincidunt id aliquet risus feugiat. Libero justo laoreet sit amet cursus sit. Vitae purus faucibus ornare suspendisse sed nisi lacus sed viverra. Leo vel fringilla est ullamcorper. Nunc faucibus a pellentesque sit amet. Montes nascetur ridiculus mus mauris vitae ultricies leo integer. Tincidunt tortor aliquam nulla facilisi cras fermentum odio. Diam vel quam elementum pulvinar. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Commodo ullamcorper a lacus vestibulum sed.<\\/p>\\r\\n\\r\\n<p>Tempor commodo ullamcorper a lacus vestibulum sed arcu. Maecenas accumsan lacus vel facilisis. Nec feugiat in fermentum posuere urna nec tincidunt praesent semper. Senectus et netus et malesuada fames ac. Sit amet facilisis magna etiam tempor orci eu lobortis. Volutpat commodo sed egestas egestas fringilla. Eu feugiat pretium nibh ipsum consequat nisl vel. Nunc lobortis mattis aliquam faucibus purus. Tincidunt augue interdum velit euismod in pellentesque massa. Est ultricies integer quis auctor elit sed. Fames ac turpis egestas integer. Euismod lacinia at quis risus sed vulputate. Fusce id velit ut tortor pretium viverra suspendisse.<\\/p>\\r\\n\\r\\n<p>Mauris commodo quis imperdiet massa tincidunt nunc. Proin sagittis nisl rhoncus mattis rhoncus urna neque viverra justo. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Consequat interdum varius sit amet mattis vulputate enim. Lobortis elementum nibh tellus molestie nunc non. Aliquam sem fringilla ut morbi tincidunt augue interdum velit. Eu volutpat odio facilisis mauris sit amet massa. Commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend. Porta nibh venenatis cras sed felis. Justo eget magna fermentum iaculis eu non diam phasellus vestibulum.<\\/p>\\r\\n\\r\\n<p>Et molestie ac feugiat sed. Dictum at tempor commodo ullamcorper a lacus vestibulum sed arcu. Accumsan tortor posuere ac ut consequat semper viverra nam. Tellus at urna condimentum mattis pellentesque. Id ornare arcu odio ut sem nulla. Mattis molestie a iaculis at erat pellentesque adipiscing commodo elit. Viverra tellus in hac habitasse platea dictumst vestibulum. Eget est lorem ipsum dolor sit amet consectetur adipiscing. Eros in cursus turpis massa tincidunt dui. Pretium lectus quam id leo in vitae. Nulla pharetra diam sit amet nisl suscipit adipiscing bibendum est. Posuere morbi leo urna molestie at elementum. Consectetur adipiscing elit ut aliquam purus sit amet luctus. Aenean pharetra magna ac placerat vestibulum lectus. Consequat id porta nibh venenatis cras. Amet tellus cras adipiscing enim eu turpis. Cras tincidunt lobortis feugiat vivamus at.<\\/p>\\r\\n\\r\\n<p>Quis hendrerit dolor magna eget est lorem. A lacus vestibulum sed arcu non. Aenean sed adipiscing diam donec adipiscing tristique risus nec feugiat. Sed viverra tellus in hac habitasse platea dictumst vestibulum. Nunc pulvinar sapien et ligula ullamcorper malesuada proin libero. Tortor aliquam nulla facilisi cras fermentum odio eu feugiat. Lectus magna fringilla urna porttitor rhoncus dolor purus. Id consectetur purus ut faucibus pulvinar. Duis at tellus at urna condimentum mattis pellentesque id nibh. Vulputate mi sit amet mauris.<\\/p>\\r\\n\\r\\n<p>Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Dolor magna eget est lorem ipsum. Aenean sed adipiscing diam donec. Pellentesque nec nam aliquam sem et tortor consequat. Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Ut ornare lectus sit amet est placerat in. Mi sit amet mauris commodo quis imperdiet massa. Hendrerit dolor magna eget est lorem. In fermentum posuere urna nec tincidunt praesent semper feugiat nibh. Pretium aenean pharetra magna ac placerat vestibulum. Montes nascetur ridiculus mus mauris. Cursus euismod quis viverra nibh cras pulvinar. Suscipit adipiscing bibendum est ultricies. Quis auctor elit sed vulputate mi sit amet mauris commodo. Vitae congue eu consequat ac felis donec. Lectus arcu bibendum at varius vel pharetra vel turpis. Cursus eget nunc scelerisque viverra mauris. Tristique senectus et netus et malesuada fames ac turpis egestas.<\\/p>\\r\\n\\r\\n<p>Tincidunt eget nullam non nisi est sit amet. Porta nibh venenatis cras sed felis eget velit aliquet sagittis. Mauris in aliquam sem fringilla ut morbi tincidunt augue interdum. Sit amet facilisis magna etiam. Aliquam faucibus purus in massa tempor nec feugiat nisl pretium. Nulla facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum. Vulputate mi sit amet mauris commodo quis imperdiet. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Tristique senectus et netus et. Quis risus sed vulputate odio ut enim blandit. Commodo elit at imperdiet dui accumsan. Adipiscing elit duis tristique sollicitudin nibh sit. Ut sem nulla pharetra diam. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus vel. Habitasse platea dictumst vestibulum rhoncus est.<\\/p>\\r\\n\\r\\n<p>Scelerisque eleifend donec pretium vulputate sapien nec sagittis. Convallis posuere morbi leo urna. Sed arcu non odio euismod lacinia at quis. Neque volutpat ac tincidunt vitae semper quis lectus. Neque ornare aenean euismod elementum nisi quis eleifend. Pretium vulputate sapien nec sagittis aliquam malesuada bibendum. Et sollicitudin ac orci phasellus. Turpis in eu mi bibendum. Augue ut lectus arcu bibendum. Ornare quam viverra orci sagittis eu volutpat odio facilisis mauris. Dui ut ornare lectus sit amet. Tempus iaculis urna id volutpat lacus laoreet non curabitur. Dui faucibus in ornare quam viverra orci sagittis eu volutpat. Ornare aenean euismod elementum nisi quis eleifend quam. Nascetur ridiculus mus mauris vitae. Placerat vestibulum lectus mauris ultrices eros in. Diam volutpat commodo sed egestas egestas fringilla. Dignissim convallis aenean et tortor. Elementum sagittis vitae et leo duis ut diam. Quis viverra nibh cras pulvinar mattis nunc sed.<\\/p>\",\"created\":\"2022-08-01T21:14:46-03:00\",\"id\":3,\"modified\":\"2022-08-01T21:14:46-03:00\",\"show_website\":true,\"slug\":\"artigo-titulo-1\",\"status\":1,\"subtitle\":\"Artigo  SubTitulo 1\",\"tags_ids\":[],\"title\":\"Artigo Titulo 1\",\"user_id\":1}','[]','2022-08-01 21:14:46'),(121,1,'Blogs',1,'Update','{\"modified\":\"2022-08-01T21:19:17-03:00\",\"slug\":\"titulo-blog-1\",\"subtitle\":\"SubTitulo BLog 1\",\"tags_ids\":[],\"title\":\"Titulo BLog 1\"}','{\"modified\":\"2022-08-01T21:10:21-03:00\",\"slug\":\"123\",\"subtitle\":\"asdasdasd\",\"tags_ids\":[],\"title\":\"123\"}','2022-08-01 21:19:17'),(122,1,'Levels',1,'Update','{\"modified\":\"2022-08-01T21:38:57-03:00\",\"permissions\":[\"Admin:About:edit\",\"Admin:About:banners\",\"Admin:BlogsCategories:index\",\"Admin:BlogsCategories:add\",\"Admin:BlogsCategories:edit\",\"Admin:BlogsCategories:delete\",\"Admin:Blogs:index\",\"Admin:Blogs:add\",\"Admin:Blogs:edit\",\"Admin:Blogs:delete\",\"Admin:Levels:index\",\"Admin:Levels:add\",\"Admin:Levels:edit\",\"Admin:Levels:delete\",\"Admin:LogsAccess:index\",\"Admin:LogsChange:index\",\"Admin:LogsChange:view\",\"Admin:SystemParameters:edit\",\"Admin:Tags:index\",\"Admin:Tags:add\",\"Admin:Tags:edit\",\"Admin:Tags:delete\",\"Admin:Users:index\",\"Admin:Users:add\",\"Admin:Users:edit\",\"Admin:Users:delete\"]}','{\"modified\":\"2022-08-01T15:11:26-03:00\",\"permissions\":[\"Admin:About:edit\",\"Admin:About:banners\",\"Admin:BlogsCategories:index\",\"Admin:BlogsCategories:add\",\"Admin:BlogsCategories:edit\",\"Admin:BlogsCategories:delete\",\"Admin:Blogs:index\",\"Admin:Blogs:add\",\"Admin:Blogs:edit\",\"Admin:Blogs:delete\",\"Admin:Levels:index\",\"Admin:Levels:add\",\"Admin:Levels:edit\",\"Admin:Levels:delete\",\"Admin:LogsAccess:index\",\"Admin:LogsChange:index\",\"Admin:LogsChange:view\",\"Admin:SystemParameters:edit\",\"Admin:Tags:index\",\"Admin:Tags:add\",\"Admin:Tags:edit\",\"Admin:Tags:delete\",\"Admin:Users:index\",\"Admin:Users:add\",\"Admin:Users:edit\",\"Admin:Users:delete\"]}','2022-08-01 21:38:57'),(123,1,'Levels',8,'Update','{\"modified\":\"2022-08-01T22:01:16-03:00\",\"name\":\"Blogueiro\",\"permissions\":[\"Admin:About:edit\",\"Admin:Levels:index\",\"Admin:Levels:add\",\"Admin:Levels:edit\",\"Admin:Levels:delete\",\"Admin:LogsAccess:index\",\"Admin:LogsChange:index\",\"Admin:LogsChange:view\",\"Admin:SystemParameters:edit\",\"Admin:Users:index\",\"Admin:Users:add\",\"Admin:Users:edit\",\"Admin:Users:delete\"]}','{\"modified\":\"2022-07-29T01:11:52-03:00\",\"name\":\"asdasd\",\"permissions\":[\"Admin:About:edit\",\"Admin:Levels:index\",\"Admin:Levels:add\",\"Admin:Levels:edit\",\"Admin:Levels:delete\",\"Admin:LogsAccess:index\",\"Admin:LogsChange:index\",\"Admin:LogsChange:view\",\"Admin:SystemParameters:edit\",\"Admin:Users:index\",\"Admin:Users:add\",\"Admin:Users:edit\",\"Admin:Users:delete\"]}','2022-08-01 22:01:16'),(124,1,'Users',15,'Create','{\"created\":\"2022-08-01T22:01:58-03:00\",\"id\":15,\"level_id\":8,\"modified\":\"2022-08-01T22:01:58-03:00\",\"status\":1,\"user\":\"blogueiro\"}','[]','2022-08-01 22:01:58'),(125,15,'Levels',8,'Update','{\"modified\":\"2022-08-01T22:02:43-03:00\",\"permissions\":[\"Admin:About:edit\",\"Admin:Blogs:index\",\"Admin:Blogs:add\",\"Admin:Blogs:editYourContents\",\"Admin:Blogs:deleteYourContents\",\"Admin:Levels:index\",\"Admin:Levels:add\",\"Admin:Levels:edit\",\"Admin:Levels:delete\",\"Admin:LogsAccess:index\",\"Admin:LogsChange:index\",\"Admin:LogsChange:view\",\"Admin:SystemParameters:edit\",\"Admin:Users:index\",\"Admin:Users:add\",\"Admin:Users:edit\",\"Admin:Users:delete\"]}','{\"modified\":\"2022-08-01T22:01:16-03:00\",\"permissions\":[\"Admin:About:edit\",\"Admin:Blogs:index\",\"Admin:Blogs:add\",\"Admin:Blogs:editYourContents\",\"Admin:Blogs:deleteYourContents\",\"Admin:Levels:index\",\"Admin:Levels:add\",\"Admin:Levels:edit\",\"Admin:Levels:delete\",\"Admin:LogsAccess:index\",\"Admin:LogsChange:index\",\"Admin:LogsChange:view\",\"Admin:SystemParameters:edit\",\"Admin:Users:index\",\"Admin:Users:add\",\"Admin:Users:edit\",\"Admin:Users:delete\"]}','2022-08-01 22:02:43'),(126,15,'Blogs',4,'Create','{\"blog_category_id\":\"1\",\"content\":\"<p>dadasd<\\/p>\",\"created\":\"2022-08-01T22:15:05-03:00\",\"id\":4,\"modified\":\"2022-08-01T22:15:05-03:00\",\"show_website\":true,\"slug\":\"teste-meu-conteudo\",\"status\":1,\"subtitle\":\"teste\",\"tags_ids\":[],\"title\":\"teste meu conteudo\",\"user_id\":15}','[]','2022-08-01 22:15:05'),(127,15,'Blogs',5,'Create','{\"blog_category_id\":\"1\",\"content\":\"<p>asdasdasdasd<\\/p>\",\"created\":\"2022-08-01T22:21:01-03:00\",\"id\":5,\"modified\":\"2022-08-01T22:21:01-03:00\",\"show_website\":true,\"slug\":\"teste-meu-blog\",\"status\":1,\"subtitle\":\"teste\",\"tags_ids\":[],\"title\":\"teste meu blog\",\"user_id\":15}','[]','2022-08-01 22:21:01'),(128,1,'Levels',8,'Update','{\"modified\":\"2022-08-01T22:32:01-03:00\",\"permissions\":[\"Admin:About:edit\",\"Admin:Blogs:index\",\"Admin:Blogs:add\",\"Admin:Blogs:editYourContents\",\"Admin:Blogs:deleteYourContents\",\"Admin:Tags:index\",\"Admin:Tags:add\",\"Admin:Tags:edit\",\"Admin:Tags:delete\"]}','{\"modified\":\"2022-08-01T22:02:43-03:00\",\"permissions\":[\"Admin:About:edit\",\"Admin:Blogs:index\",\"Admin:Blogs:add\",\"Admin:Blogs:editYourContents\",\"Admin:Blogs:deleteYourContents\",\"Admin:Tags:index\",\"Admin:Tags:add\",\"Admin:Tags:edit\",\"Admin:Tags:delete\"]}','2022-08-01 22:32:01'),(129,15,'Blogs',4,'Delete','[]','{\"blog_category_id\":\"1\",\"content\":\"<p>dadasd<\\/p>\",\"created\":\"2022-08-01T22:15:05-03:00\",\"id\":4,\"modified\":\"2022-08-01T22:54:19-03:00\",\"show_website\":true,\"slug\":\"teste-meu-conteudo\",\"subtitle\":\"teste\",\"title\":\"teste meu conteudo\",\"user_id\":15}','2022-08-01 22:54:19'),(130,1,'Levels',8,'Update','{\"modified\":\"2022-08-02T02:19:21-03:00\",\"permissions\":[\"Admin:About:edit\",\"Admin:Blogs:add\",\"Admin:Blogs:searchYourContents\",\"Admin:Blogs:editYourContents\",\"Admin:Blogs:deleteYourContents\",\"Admin:Tags:index\",\"Admin:Tags:add\",\"Admin:Tags:edit\",\"Admin:Tags:delete\"]}','{\"modified\":\"2022-08-01T22:32:01-03:00\",\"permissions\":[\"Admin:About:edit\",\"Admin:Blogs:add\",\"Admin:Blogs:searchYourContents\",\"Admin:Blogs:editYourContents\",\"Admin:Blogs:deleteYourContents\",\"Admin:Tags:index\",\"Admin:Tags:add\",\"Admin:Tags:edit\",\"Admin:Tags:delete\"]}','2022-08-02 02:19:21'),(131,1,'Users',1,'Update','{\"first_access\":\"2022-08-02T14:44:43-03:00\",\"last_access\":\"2022-08-02T14:44:43-03:00\",\"modified\":\"2022-08-02T14:44:43-03:00\"}','{\"first_access\":null,\"last_access\":null,\"modified\":\"2022-07-30T19:41:21-03:00\"}','2022-08-02 14:44:43'),(132,1,'Users',1,'Update','{\"last_access\":\"2022-08-02T14:45:05-03:00\",\"modified\":\"2022-08-02T14:45:05-03:00\"}','{\"last_access\":\"2022-08-02T14:44:43-03:00\",\"modified\":\"2022-08-02T14:44:43-03:00\"}','2022-08-02 14:45:05'),(133,1,'Users',15,'Update','{\"email\":\"dionata.nunes.garcia@gmail.com\",\"modified\":\"2022-08-02T14:57:10-03:00\",\"name\":\"Dionata Nunes Garcia\"}','{\"email\":\"\",\"modified\":\"2022-08-01T22:01:58-03:00\",\"name\":\"\"}','2022-08-02 14:57:10'),(134,1,'Users',15,'Update','{\"cell_phone\":\"12312312312\",\"modified\":\"2022-08-02T15:00:23-03:00\",\"phone\":\"12312321232\"}','{\"cell_phone\":null,\"modified\":\"2022-08-02T14:57:10-03:00\",\"phone\":null}','2022-08-02 15:00:23'),(135,1,'Users',15,'Update','{\"cell_phone\":\"21312312111\",\"modified\":\"2022-08-02T15:00:34-03:00\"}','{\"cell_phone\":\"12312312312\",\"modified\":\"2022-08-02T15:00:23-03:00\"}','2022-08-02 15:00:34'),(136,1,'Users',1,'Update','{\"last_access\":\"2022-08-02T15:15:47-03:00\",\"modified\":\"2022-08-02T15:15:47-03:00\"}','{\"last_access\":\"2022-08-02T14:45:05-03:00\",\"modified\":\"2022-08-02T14:45:05-03:00\"}','2022-08-02 15:15:47'),(137,1,'Users',1,'Update','{\"cell_phone\":\"12332132112\",\"email\":\"DionataGarcia@gmail.com\",\"modified\":\"2022-08-02T15:26:14-03:00\",\"name\":\"DionataGarcia\",\"phone\":\"32121332113\"}','{\"cell_phone\":null,\"email\":\"\",\"modified\":\"2022-08-02T15:15:47-03:00\",\"name\":\"\",\"phone\":null}','2022-08-02 15:26:14'),(138,1,'Users',1,'Update','{\"last_access\":\"2022-08-02T17:07:17-03:00\",\"modified\":\"2022-08-02T17:07:17-03:00\"}','{\"last_access\":\"2022-08-02T15:15:47-03:00\",\"modified\":\"2022-08-02T15:26:14-03:00\"}','2022-08-02 17:07:17'),(139,15,'Users',15,'Update','{\"first_access\":\"2022-08-02T17:46:21-03:00\",\"last_access\":\"2022-08-02T17:46:21-03:00\",\"modified\":\"2022-08-02T17:46:21-03:00\"}','{\"first_access\":null,\"last_access\":null,\"modified\":\"2022-08-02T17:16:35-03:00\"}','2022-08-02 17:46:21'),(140,1,'Users',1,'Update','{\"last_access\":\"2022-08-02T18:10:35-03:00\",\"modified\":\"2022-08-02T18:10:35-03:00\"}','{\"last_access\":\"2022-08-02T17:07:17-03:00\",\"modified\":\"2022-08-02T17:07:17-03:00\"}','2022-08-02 18:10:35'),(141,1,'Testimonials',1,'Create','{\"content\":\"<p>Teste texto sobre testemunho<\\/p>\",\"created\":\"2022-08-02T20:00:31-03:00\",\"id\":1,\"modified\":\"2022-08-02T20:00:31-03:00\",\"name\":\"Test nome\",\"note\":3,\"profession\":\"Test profiss\\u00e3o\",\"slug\":\"test-nome\",\"status\":1,\"user_id\":1}','[]','2022-08-02 20:00:31'),(142,1,'Users',1,'Update','{\"last_access\":\"2022-08-03T13:09:30-03:00\",\"modified\":\"2022-08-03T13:09:31-03:00\"}','{\"last_access\":\"2022-08-02T18:10:35-03:00\",\"modified\":\"2022-08-02T18:10:35-03:00\"}','2022-08-03 13:09:31'),(143,1,'Users',1,'Update','{\"last_access\":\"2022-08-06T16:00:04-03:00\",\"modified\":\"2022-08-06T16:00:05-03:00\"}','{\"last_access\":\"2022-08-03T13:09:30-03:00\",\"modified\":\"2022-08-03T13:09:31-03:00\"}','2022-08-06 16:00:05');
/*!40000 ALTER TABLE `logs_change` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phinxlog`
--

LOCK TABLES `phinxlog` WRITE;
/*!40000 ALTER TABLE `phinxlog` DISABLE KEYS */;
INSERT INTO `phinxlog` VALUES (20220711191359,'AddCommonTables','2022-07-12 06:17:05','2022-07-12 06:17:06',0),(20220801140520,'CreateTableBlogs','2022-08-01 14:53:47','2022-08-01 14:53:48',0),(20220801214712,'AlterTableBlogsAddStatusAndShowWebsite','2022-08-01 21:52:13','2022-08-01 21:52:13',0),(20220802171918,'AlterTableAddFieldsProfile','2022-08-02 17:36:17','2022-08-02 17:36:18',0),(20220802214503,'CreateTableTestimonials','2022-08-02 21:50:26','2022-08-02 21:50:26',0),(20220803002455,'CreateTableContactsNewsLetters','2022-08-03 01:26:03','2022-08-03 01:26:03',0),(20220803143705,'CreateTableContacts','2022-08-03 15:56:45','2022-08-03 15:56:46',0);
/*!40000 ALTER TABLE `phinxlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Ativo','ACTIVE','2022-07-16 00:00:00','2022-07-16 00:00:00'),(2,'Inativo','INACTIVE','2022-07-16 00:00:00','2022-07-16 00:00:00'),(3,'Pendente','PENDING','2022-07-16 00:00:00','2022-07-16 00:00:00'),(4,'Cancelado','CANCELED','2022-07-16 00:00:00','2022-07-16 00:00:00'),(5,'Rascunho','DRAFT','2022-07-16 00:00:00','2022-07-16 00:00:00'),(6,'Excluído','EXCLUDED','2022-07-16 00:00:00','2022-07-16 00:00:00'),(7,'Suspenso','SUSPENDED','2022-07-16 00:00:00','2022-07-16 00:00:00'),(8,'Expirado','EXPIRED','2022-07-16 00:00:00','2022-07-16 00:00:00'),(9,'Bloqueado','BLOCKED','2022-07-16 00:00:00','2022-07-16 00:00:00'),(10,'Aguardando','WAITING','2022-07-16 00:00:00','2022-07-16 00:00:00'),(11,'Finalizado','FINISHED','2022-07-16 00:00:00','2022-07-16 00:00:00'),(12,'Pré Inscrição','PRE_INSCRIPTION','2022-07-16 00:00:00','2022-07-16 00:00:00');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_parameters`
--

DROP TABLE IF EXISTS `system_parameters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_parameters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `social_reason` varchar(255) NOT NULL,
  `fantasy_name` varchar(255) NOT NULL,
  `cnpj_cpf` varchar(20) NOT NULL,
  `generate_access_logs` tinyint(1) NOT NULL DEFAULT '1',
  `generate_change_log` tinyint(1) NOT NULL DEFAULT '1',
  `emails` longtext NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_parameters`
--

LOCK TABLES `system_parameters` WRITE;
/*!40000 ALTER TABLE `system_parameters` DISABLE KEYS */;
INSERT INTO `system_parameters` VALUES (1,'Razão do Client','Nome Fantasia do Cliente','32131231231231',1,1,'asdasdasdasdasd','2022-07-23 00:53:42','2022-07-25 18:10:55');
/*!40000 ALTER TABLE `system_parameters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `slug` varchar(60) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'teste nome','teste-nome',1,'2022-08-01 11:58:06','2022-08-01 11:58:06'),(2,'Test aaa NBA blog Com Acênto','test-aaa-nba-blog-com-acento',8,'2022-08-01 11:58:39','2022-08-01 14:19:59'),(3,'Test 2','test-2',8,'2022-08-01 14:22:51','2022-08-01 14:23:14'),(4,'Blog','blog',1,'2022-08-01 14:45:47','2022-08-01 14:45:47');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags_models`
--

DROP TABLE IF EXISTS `tags_models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags_models` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` varchar(60) NOT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags_models`
--

LOCK TABLES `tags_models` WRITE;
/*!40000 ALTER TABLE `tags_models` DISABLE KEYS */;
INSERT INTO `tags_models` VALUES (14,'1',5,'Blogs');
/*!40000 ALTER TABLE `tags_models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `content` longtext,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'Test nome','test-nome','Test profissão','1',1,3,'<p>Teste texto sobre testemunho</p>','2022-08-02 20:00:31','2022-08-02 20:00:31');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uploads`
--

DROP TABLE IF EXISTS `uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(1000) NOT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `order_files` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploads`
--

LOCK TABLES `uploads` WRITE;
/*!40000 ALTER TABLE `uploads` DISABLE KEYS */;
INSERT INTO `uploads` VALUES (22,'2022-07-30-18-15-15-Requeijoes.png',1,'Banners','image/png',1,1,'png','Requeijoes.png','','2022-07-30 18:15:15','2022-07-30 18:15:15'),(49,'2022-08-01-15-51-06-Blogs-1-c9e1b141-11ec-45a0-b38f-4a783bca2486.pdf',1,'Blogs','application/pdf',1,1,'pdf','Dionata_Garcia_-_Merito.pdf','','2022-08-01 15:51:06','2022-08-01 15:51:06'),(50,'2022-08-01-15-51-06-Blogs-1-2bfbb241-2c82-4274-ab63-de0c0651d12b.pdf',1,'Blogs','application/pdf',1,1,'pdf','edital_20_2022_resultado_final_integrado_Pelotas.pdf','','2022-08-01 15:51:06','2022-08-01 15:51:06'),(51,'2022-08-01-15-51-06-Blogs-1-7fd44d24-c634-4c49-a4f6-19c50146f32b.pdf',1,'Blogs','application/pdf',1,1,'pdf','Horário NSL 30-05-22.pdf','','2022-08-01 15:51:06','2022-08-01 15:51:06'),(52,'2022-08-01-15-51-06-Blogs-1-2a466be0-8a8f-42bb-9290-555ab3f2c73d.png',1,'Blogs','image/png',1,1,'png','New Project.png','','2022-08-01 15:51:06','2022-08-01 15:51:06'),(53,'2022-08-01-15-51-06-Blogs-1-157cf121-bd6e-4912-ae04-4b32a04ef7c6.png',1,'Blogs','image/png',1,1,'png','Outros.png','','2022-08-01 15:51:06','2022-08-01 15:51:06'),(54,'2022-08-01-15-51-06-Blogs-1-48672f9c-bfe0-4498-97aa-cac7ec763be1.png',1,'Blogs','image/png',1,1,'png','Queijos.png','','2022-08-01 15:51:06','2022-08-01 15:51:06'),(55,'2022-08-01-15-51-06-Blogs-1-506318ba-c470-4354-819f-ee8fecf0cef9.png',1,'Blogs','image/png',1,1,'png','Requeijoes.png','','2022-08-01 15:51:06','2022-08-01 15:51:06'),(56,'2022-08-01-22-01-58-Users-15-a216f55d-e34a-4015-af6b-ed7afd3e9764.png',15,'Users','image/png',1,1,'png','wini niver.png','','2022-08-01 22:01:58','2022-08-01 22:01:58'),(57,'2022-08-02-15-29-28-Users-1-23c3991d-1978-4070-a8e6-ab9ca295942b.png',1,'Users','image/png',1,1,'png','wini niver.png','','2022-08-02 15:29:28','2022-08-02 15:29:28'),(58,'2022-08-02-20-31-29-Testimonials-1-2ff3c920-81a8-415c-9c74-03dcc650d3a5.png',1,'Testimonials','image/png',1,1,'png','wini niver.png','','2022-08-02 20:31:29','2022-08-02 20:31:29');
/*!40000 ALTER TABLE `uploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `last_access` datetime DEFAULT NULL,
  `first_access` datetime DEFAULT NULL,
  `cell_phone` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `super` tinyint(1) NOT NULL DEFAULT '0',
  `level_id` int(11) NOT NULL DEFAULT '11',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'dionata','$2y$10$QwIqzQCBYS7BOh5TvEX.F.dIHYoPFsaK9Quwf19C5s4k0zPU6oh..','DionataGarcia','DionataGarcia@gmail.com',1,'2022-08-06 16:00:04','2022-08-02 14:44:43','12332132112','32121332113',1,1,'2022-07-12 21:37:44','2022-08-06 16:00:05'),(15,'blogueiro','$2y$10$X/GngDo28Bh9/BrWbRB2O.MT52wJZOWvGHAWSXgInFlv6qHb7KDDC','Dionata Nunes Garcia','dionata.nunes.garcia@gmail.com',1,'2022-08-02 17:46:21','2022-08-02 17:46:21','21312312111','12312321232',0,8,'2022-08-01 22:01:58','2022-08-02 17:46:21');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'cms_cakephp'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-07 15:26:53
