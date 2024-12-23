CREATE TABLE `user` (
    `username` VARCHAR(100) PRIMARY KEY,
    `password` VARCHAR(255) NOT NULL  -- 用于存储加密后的密码
);

INSERT INTO `user` VALUES ('admin', 'root123');