DROP TABLE IF EXISTS `tbl_comment`;
CREATE TABLE tbl_comment
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	content TEXT NOT NULL,
	status INTEGER NOT NULL,
	create_time INTEGER,
	author VARCHAR(128) NOT NULL,
	email VARCHAR(128) NOT NULL,
	url VARCHAR(128),
	post_id INTEGER NOT NULL
	/*CONSTRAINT FK_comment_post FOREIGN KEY (post_id)
		REFERENCES tbl_post (id) ON DELETE CASCADE ON UPDATE RESTRICT*/
);
INSERT INTO `tbl_comment` VALUES(1,'This is a test comment.',2,1230952187,'Tester','tester@example.com',NULL,2);
DROP TABLE IF EXISTS `tbl_lookup`;
CREATE TABLE tbl_lookup
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(128) NOT NULL,
	code INTEGER NOT NULL,
	type VARCHAR(128) NOT NULL,
	position INTEGER NOT NULL
);
INSERT INTO `tbl_lookup` VALUES(1,'Draft',1,'PostStatus',1);
INSERT INTO `tbl_lookup` VALUES(2,'Published',2,'PostStatus',2);
INSERT INTO `tbl_lookup` VALUES(3,'Archived',3,'PostStatus',3);
INSERT INTO `tbl_lookup` VALUES(4,'Pending Approval',1,'CommentStatus',1);
INSERT INTO `tbl_lookup` VALUES(5,'Approved',2,'CommentStatus',2);
DROP TABLE IF EXISTS `tbl_post`;
CREATE TABLE tbl_post
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(128) NOT NULL,
	content TEXT NOT NULL,
	tags TEXT,
	status INTEGER NOT NULL,
	create_time INTEGER,
	update_time INTEGER,
	author_id INTEGER NOT NULL
	/*CONSTRAINT FK_post_author FOREIGN KEY (author_id)
		REFERENCES tbl_user (id) ON DELETE CASCADE ON UPDATE RESTRICT*/
);
INSERT INTO `tbl_post` VALUES(1,'Welcome!','This blog system is developed using Yii. It is meant to demonstrate how to use Yii to build a complete real-world application. Complete source code may be found in the Yii releases.

Feel free to try this system by writing new posts and leaving comments.','yii, blog',2,1230952187,1230952187,1);
INSERT INTO `tbl_post` VALUES(2,'A Test Post','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','test',2,1230952187,1230952187,1);
DROP TABLE IF EXISTS `tbl_tag`;
CREATE TABLE tbl_tag
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(128) NOT NULL,
	frequency INTEGER DEFAULT 1
);
INSERT INTO `tbl_tag` VALUES(1,'yii',1);
INSERT INTO `tbl_tag` VALUES(2,'blog',1);
INSERT INTO `tbl_tag` VALUES(3,'test',1);
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE tbl_user
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(128) NOT NULL,
	password VARCHAR(128) NOT NULL,
	salt VARCHAR(128) NOT NULL,
	email VARCHAR(128) NOT NULL,
	profile TEXT
);
INSERT INTO `tbl_user` VALUES(1,'demo','2e5c7db760a33498023813489cfadc0b','28b206548469ce62182048fd9cf91760','webmaster@example.com',NULL);
