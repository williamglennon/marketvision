CREATE TABLE passwordreset (
    passwordResetId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    passwordResetEmail TEXT NOT NULL,
    passwordResetSelector TEXT NOT NULL,
    passwordResetToken LONGTEXT NOT NULL,
    passwordResetExpires TEXT NOT NULL
);