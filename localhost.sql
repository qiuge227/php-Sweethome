CREATE DATABASE `mysite` DEFAULT CHARACTER SET gb2312 COLLATE gb2312_chinese_ci;
USE `mysite`;



CREATE TABLE IF NOT EXISTS `message` (
  
	`_id` int(11) NOT NULL auto_increment,
  
	`title` varchar(50) NOT NULL,
  
	`content` varchar(100) NOT NULL,
  `orginal` int(11) NOT NULL,
  `upper` int(11) NOT NULL,
  `poster` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `creatTime` date NOT NULL,
  `uemail` varchar(50) NOT NULL,
  `uspace` varchar(50) NOT NULL,
  `avatar` int(11) NOT NULL,
  PRIMARY KEY  (`_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=8 ;
	

INSERT INTO `message` (`_id`, `title`, `content`, `orginal`, `upper`, `poster`, `ip`, `creatTime`, `uemail`, `uspace`, `avatar`) VALUES
(1, '普通会员能分享什么呢？', '什么都可以分享的', 0, 0, '匿名网友', '127.0.0.1', '2014-06-11', 'gemeiwangji789@sina.cn', 'gemeiwangji789', 1),
(2, '前端兼容性问题', '不支持IE7', 0, 0, '匿名网友', '127.0.0.1', '2014-06-11', 'gemeiwangji789@sina.cn', 'gemeiwangji789space', 1),
(3, '回复', '加油吧', 1, 1, 'Admins', '127.0.0.1', '2014-06-11', 'gemeiwangji789@sina.cn', 'gemeiwangji789', 1),
(4, '站点新建', '欢迎访问', 0, 0, 'Admins', '127.0.0.1', '2014-06-11', 'gemeiwangji789@sina.cn', 'gemeiwangji789', 1),
(5, '站点问题', '新建站点，问题不少，欢迎指正', 0, 0, 'Admins', '127.0.0.1', '2014-06-11', 'gemeiwangji789@sina.cn', 'gemeiwangji789', 1),
(6, '站点问题', '发现问题，页面效果不好', 0, 0, '匿名网友', '127.0.0.1', '2014-06-11', 'gemeiwangji789@sina.cn', 'gemeiwangji789', 7),
(7, 'help', 'there are many errors', 0, 0, '匿名网友', '127.0.0.1', '2014-06-11', 'gemeiwangji789@sina.cn', 'gemeiwangji789', 13);




CREATE TABLE IF NOT EXISTS `userbased` (
  `uid` int(11) NOT NULL auto_increment,
  `uname` varchar(50) NOT NULL,
  `upsw` varchar(50) NOT NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=2 ;



INSERT INTO `userbased` (`uid`, `uname`, `upsw`) VALUES
(1, 'Admins', 'Admins');



CREATE TABLE IF NOT EXISTS `userinfo` (
  `uname` varchar(50) NOT NULL,
  `uoname` varchar(50) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city` varchar(10) NOT NULL,
  PRIMARY KEY  (`uname`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
INSERT INTO `userinfo` (`uname`, `uoname`, `gender`, `email`, `city`) VALUES
('Admins', 'Admins', '女', 'gemeiwangji789@sina.cn', '北京');
