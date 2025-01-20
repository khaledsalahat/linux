CREATE DATABASE IF NOT EXISTS dictionary;

USE dictionary;

CREATE TABLE IF NOT EXISTS entries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    word VARCHAR(255) NOT NULL,
    definition TEXT NOT NULL
);

INSERT INTO entries (word, definition) VALUES
('apple', 'A fruit that grows on trees and is typically red, green, or yellow.'),
('banana', 'A long curved fruit that grows in clusters and has soft pulpy flesh and yellow skin when ripe.'),
('cherry', 'A small, round stone fruit that is typically bright or dark red.'),
('date', 'A sweet brownish fruit from the date palm.'),
('elderberry', 'A small, dark purple berry from the elder tree.'),
('fig', 'A soft fruit with a thin skin that can be eaten fresh or dried.'),
('grape', 'A small round fruit, typically green, purple, or red, used for making wine or eaten fresh.'),
('kiwi', 'A small fruit with a hairy skin and green flesh inside, known for its distinct tangy taste.'),
('lemon', 'A yellow citrus fruit known for its sour taste.'),
('mango', 'A tropical fruit with smooth skin, juicy flesh, and a large seed inside.'),
('nectarine', 'A smooth-skinned fruit similar to a peach.'),
('orange', 'A citrus fruit with a tough skin, typically orange in color.'),
('pear', 'A sweet fruit with a rounded base and a tapering top.'),
('quince', 'A hard, acidic fruit used for preserves or flavoring.'),
('raspberry', 'A small, soft, red fruit that grows on bushes.'),
('strawberry', 'A small, juicy red fruit with tiny seeds on its surface.'),
('tangerine', 'A small citrus fruit with a loose skin and sweet taste.'),
('watermelon', 'A large fruit with a hard green rind and sweet, juicy, red or yellow flesh.');
