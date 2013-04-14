delimiter $$

CREATE TABLE `content_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `script_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8$$


delimiter $$

CREATE TABLE `lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_key` varchar(45) NOT NULL,
  `original` longtext NOT NULL,
  `translated` longtext,
  `langcol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8$$


delimiter $$

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `link` varchar(500) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `_order` int(11) NOT NULL,
  `login_required` int(11) NOT NULL DEFAULT '0',
  `visible` int(11) DEFAULT '1',
  `title_loggedin` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8$$


delimiter $$

CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8$$


delimiter $$

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `type_id` int(11) NOT NULL,
  `date_created` int(12) NOT NULL,
  `menu_item_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pages_menu_items_idx` (`menu_item_id`),
  KEY `fk_pages_content_type_idx` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8$$


delimiter $$

CREATE TABLE `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `location` varchar(300) DEFAULT NULL,
  `header_code` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8$$


delimiter $$

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(355) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `registration_time` int(12) DEFAULT NULL,
  `last_login_time` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8$$


