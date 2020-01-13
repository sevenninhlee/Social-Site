ALTER TABLE `blog_articles` ADD `community` INT NULL DEFAULT '0' AFTER `featured_my_blog`;
ALTER TABLE `blog_articles` CHANGE `community` `community_blog` INT(11) NULL DEFAULT '0';
ALTER TABLE `blog_articles` CHANGE `community_blog` `community_blog` INT(11) NOT NULL DEFAULT '0';
ALTER TABLE `users` ADD `username` VARCHAR(255) NULL AFTER `lastname`;

