CREATE DATABASE IF NOT EXISTS sqli;
USE sqli;

CREATE TABLE article (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  text TEXT
);

INSERT INTO article (title, text) VALUES
('Major Data Breach in Tech Industry', 'Millions of records leaked due to misconfiguration. Administrators are investigating the issue.'),
('AI Security Risks in 2025', 'Experts warn about insecure AI pipelines. Always validate your inputs and use secure coding practices.'),
('Hidden Security Message', 'Database contains important information. Look for hidden data in the system.'),
('Web Security Fundamentals', 'Learn about SQL injection, XSS, CSRF and other OWASP Top 10 vulnerabilities.');

CREATE TABLE user (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(50),
  flag VARCHAR(255)
);

INSERT INTO user (username, password, flag)
VALUES ('adminflag', 'PrakKI2023FilkomUB', 'Flag{YES_KAMU_BERHASIL_latest_tech_news}');

CREATE TABLE IF NOT EXISTS hidden_flags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    flag_name VARCHAR(100),
    flag_value VARCHAR(255)
);

INSERT INTO hidden_flags (flag_name, flag_value) VALUES
('flag1', 'Flag{SQLi_Master_2023}'),
('flag2', 'Flag{Union_Injection_Success}'),
('flag3', 'Flag{Database_Extracted}');