
DROP TABLE IF EXISTS `np_category`;
CREATE TABLE IF NOT EXISTS `np_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `name` varchar(255) NOT NULL COMMENT '栏目名',
  `aliases` varchar(255) NOT NULL DEFAULT '' COMMENT '别名',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO关键词',
  `seo_description` varchar(555) NOT NULL DEFAULT '' COMMENT 'SEO描述',
  `image` varchar(255) NOT NULL DEFAULT '' COMMENT '图标',
  `type_id` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '类型ID',
  `model_id` smallint(6) unsigned NOT NULL COMMENT '模型ID',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '显示',
  `is_channel` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '频道页',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `access_id` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '权限',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '外链地址',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `lang` varchar(20) NOT NULL DEFAULT 'zh-cn' COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `aliases` (`aliases`),
  KEY `pid` (`pid`),
  KEY `type_id` (`type_id`),
  KEY `model_id` (`model_id`),
  KEY `is_show` (`is_show`),
  KEY `access_id` (`access_id`),
  KEY `lang` (`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='栏目表';