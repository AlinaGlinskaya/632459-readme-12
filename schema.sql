CREATE DATABASE readme
  DEFAULT CHARACTER SET utf8;

USE readme;

CREATE TABLE IF NOT EXISTS users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	dt_reg DATETIME NOT NULL,
	email VARCHAR(255) UNIQUE NOT NULL,
	login VARCHAR(255) NOT NULL,
	password VARCHAR(64) NOT NULL,
	avatar_path VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS posts (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  post_dt DATETIME NOT NULL,
  post_title TEXT,
  post_text TEXT,
  cite_author TEXT,
  post_img VARCHAR(255),
  post_video VARCHAR(255),
  post_link VARCHAR(255),
  show_count INT UNSIGNED,
	post_user_id INT UNSIGNED,
	content_type INT UNSIGNED,
	hashtag_id INT UNSIGNED,
  CONSTRAINT user_fk FOREIGN KEY (post_user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT content_type_fk FOREIGN KEY (content_type) REFERENCES content_types (id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT hashtag_fk FOREIGN KEY (hashtag_id) REFERENCES hashtags (id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS comments (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  comment_dt DATETIME NOT NULL,
  comment_text TEXT,
	comment_user_id INT UNSIGNED,
	comment_post_id INT UNSIGNED,
  CONSTRAINT comment_author_fk FOREIGN KEY (comment_user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT commented_post_fk FOREIGN KEY (comment_post_id) REFERENCES posts (id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS messages (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  message_dt DATETIME NOT NULL,
  message_text TEXT,
	sender_id INT UNSIGNED,
	reciever_id INT UNSIGNED,
  CONSTRAINT sender_fk FOREIGN KEY (sender_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT reciever_fk FOREIGN KEY (reciever_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS subscriptions (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	subscribe_id INT UNSIGNED,
	follower_id INT UNSIGNED,
  CONSTRAINT subscribe_fk FOREIGN KEY (subscribe_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT follower_fk FOREIGN KEY (follower_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS content_types (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  content_type VARCHAR(255),
  content_class VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS likes (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	like_user_id INT UNSIGNED,
	like_post_id INT UNSIGNED
  CONSTRAINT like_user_fk FOREIGN KEY (like_user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT like_post_fk FOREIGN KEY (like_post_id) REFERENCES posts (id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS hashtags (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  hashtag_name TEXT
);

CREATE UNIQUE INDEX user_email ON users(email);
CREATE INDEX user_login ON users(login);
