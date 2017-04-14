-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: osadmin
-- ------------------------------------------------------
-- Server version	5.7.17

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
-- Dumping data for table `osa_menu_url`
--

LOCK TABLES `osa_menu_url` WRITE;
/*!40000 ALTER TABLE `osa_menu_url` DISABLE KEYS */;
INSERT INTO `osa_menu_url` VALUES (1,'首页','/panel/index.php',1,0,1,1,'后台首页',0),(2,'账号列表','/panel/users.php',1,1,1,1,'账号列表',0),(3,'修改账号','/panel/user_modify.php',1,0,1,0,'修改账号',2),(4,'新建账号','/panel/user_add.php',1,0,1,1,'新建账号',2),(5,'个人信息','/panel/profile.php',1,0,1,1,'个人信息',0),(6,'账号组成员','/panel/group.php',1,0,1,0,'显示账号组详情及该组成员',7),(7,'账号组管理','/panel/groups.php',1,1,1,1,'增加管理员',0),(8,'修改账号组','/panel/group_modify.php',1,0,1,0,'修改账号组',7),(9,'新建账号组','/panel/group_add.php',1,0,1,1,'新建账号组',7),(10,'权限管理','/panel/group_role.php',1,1,1,1,'用户权限依赖于账号组的权限',0),(11,'菜单模块','/panel/modules.php',1,1,1,1,'菜单里的模块',0),(12,'编辑菜单模块','/panel/module_modify.php',1,0,1,0,'编辑模块',11),(13,'添加菜单模块','/panel/module_add.php',1,0,1,1,'添加菜单模块',11),(14,'功能列表','/panel/menus.php',1,1,1,1,'菜单功能及可访问的链接',0),(15,'增加功能','/panel/menu_add.php',1,0,1,1,'增加功能',14),(16,'功能修改','/panel/menu_modify.php',1,0,1,0,'修改功能',14),(17,'设置模板','/panel/set.php',1,0,1,1,'设置模板',0),(18,'便签管理','/panel/quicknotes.php',1,1,1,1,'quick note',0),(19,'菜单链接列表','/panel/module.php',1,0,1,0,'显示模块详情及该模块下的菜单',11),(20,'登入','/login.php',1,0,1,1,'登入页面',0),(21,'操作记录','/panel/syslog.php',1,1,1,1,'用户操作的历史行为',0),(22,'系统信息','/panel/system.php',1,1,1,1,'显示系统相关信息',0),(23,'ajax访问修改快捷菜单','/ajax/shortcut.php',1,0,1,0,'ajax请求',0),(24,'添加便签','/panel/quicknote_add.php',1,0,1,1,'添加quicknote的内容',18),(25,'修改便签','/panel/quicknote_modify.php',1,0,1,0,'修改quicknote的内容',18),(26,'系统设置','/panel/setting.php',1,0,1,0,'系统设置',0),(101,'样例','/sample/sample.php',2,1,1,1,'',0),(103,'读取XLS文件','/sample/read_excel.php',2,1,1,1,'',0);
/*!40000 ALTER TABLE `osa_menu_url` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `osa_module`
--

LOCK TABLES `osa_module` WRITE;
/*!40000 ALTER TABLE `osa_module` DISABLE KEYS */;
INSERT INTO `osa_module` VALUES (1,'控制面板','/panel/index.php',0,'配置OSAdmin的相关功能','icon-th',1),(2,'样例模块','/panel/index.php',1,'样例模块','icon-leaf',1);
/*!40000 ALTER TABLE `osa_module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `osa_quick_note`
--

LOCK TABLES `osa_quick_note` WRITE;
/*!40000 ALTER TABLE `osa_quick_note` DISABLE KEYS */;
INSERT INTO `osa_quick_note` VALUES (6,'孔子说：万能的不是神，是程序员！',1),(7,'听说飞信被渗透了几百台服务器',1),(8,'（yamete）＝不要 ，一般音译为”亚美爹”，正确发音是：亚灭贴',1),(9,'（kimochiii）＝爽死了，一般音译为”可莫其”，正确发音是：克一莫其一一 ',1),(10,'（itai）＝疼 ，一般音译为以太',1),(11,'（iku）＝要出来了 ，一般音译为一库',1),(12,'（soko dame）＝那里……不可以 一般音译：锁扩，打灭',1),(13,'(hatsukashi)＝羞死人了 ，音译：哈次卡西',1),(14,'（atashinookuni）＝到人家的身体里了，音译：啊她西诺喔库你',1),(15,'（mottto mottto）＝还要，还要，再大力点的意思 音译：毛掏 毛掏',1),(20,'这是一条含HTML的便签 <a href=\"http://www.osadmin.org\">osadmin.org</a>',1),(23,'你造吗？quick note可以关掉的，在右上角的我的账号里可以设置的。',1),(24,'你造吗？“功能”其实就是“链接”啦啦，权限控制是根据用户访问的链接来验证的。',1),(25,'你造吗？权限是赋予给账号组的，账号组下的用户拥有相同的权限。',1),(26,'Hi，你注意到navibar上的+号和-号了吗？',1),(27,'假如世界上只剩下两坨屎，我一定会把热的留给你',1),(28,'你造吗？这页面设计用是bootstrap模板改的',1),(29,'你造吗？这全部都是我一个人开发的，可特么累了',1),(30,'客官有什么建议可以直接在weibo.com上<a target=_blank  href =\"http://weibo.com/osadmin\">@OSAdmin官网</a> 本店服务一定会让客官满意的！亚美爹！',1);
/*!40000 ALTER TABLE `osa_quick_note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `osa_sys_log`
--

LOCK TABLES `osa_sys_log` WRITE;
/*!40000 ALTER TABLE `osa_sys_log` DISABLE KEYS */;
INSERT INTO `osa_sys_log` VALUES (1,'admin','LOGIN','User','1','{\"IP\":\"::1\"}',1492170220);
/*!40000 ALTER TABLE `osa_sys_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `osa_system`
--

LOCK TABLES `osa_system` WRITE;
/*!40000 ALTER TABLE `osa_system` DISABLE KEYS */;
INSERT INTO `osa_system` VALUES ('timezone','\"Asia/Shanghai\"');
/*!40000 ALTER TABLE `osa_system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `osa_user`
--

LOCK TABLES `osa_user` WRITE;
/*!40000 ALTER TABLE `osa_user` DISABLE KEYS */;
INSERT INTO `osa_user` VALUES (1,'admin','e10adc3949ba59abbe56e057f20f883e','SomewhereYu','13800138001','admin@osadmin.org','初始的超级管理员!',1492170220,1,'::1',1,'wintertide','2,7,10,11,13,14,18,21,24',0),(26,'demo','e10adc3949ba59abbe56e057f20f883e','SomewhereYu','15812345678','yuwenqi@osadmin.org','默认用户组成员',1371605873,1,'127.0.0.1',2,'schoolpainting','',1);
/*!40000 ALTER TABLE `osa_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `osa_user_group`
--

LOCK TABLES `osa_user_group` WRITE;
/*!40000 ALTER TABLE `osa_user_group` DISABLE KEYS */;
INSERT INTO `osa_user_group` VALUES (1,'超级管理员组','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,101,103',1,'万能的不是神，是程序员'),(2,'默认账号组','1,5,17,18,20,22,23,24,25,101',1,'默认账号组');
/*!40000 ALTER TABLE `osa_user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sample`
--

LOCK TABLES `sample` WRITE;
/*!40000 ALTER TABLE `sample` DISABLE KEYS */;
INSERT INTO `sample` VALUES (1,'这是一个样例');
/*!40000 ALTER TABLE `sample` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-14 20:43:44
