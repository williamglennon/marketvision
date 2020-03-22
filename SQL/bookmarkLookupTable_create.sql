CREATE TABLE bookmarksusers (
     bookmark_id INT(11) FOREIGN KEY REFERENCES bookmarks(bookmark_id),
     user_id INT(11) FOREIGN KEY REFERENCES users(user_id),
     PRIMARY KEY (user_id,bookmark_id)
);