ALTER TABLE `blog_articles` ADD `community` INT NULL DEFAULT '0' AFTER `featured_my_blog`;
ALTER TABLE `blog_articles` CHANGE `community` `community_blog` INT(11) NULL DEFAULT '0';
