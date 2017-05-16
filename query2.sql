CREATE TABLE incoming (
    `storage_id` integer not null,
    `category_id` integer not null,
    `quantity` integer not null,
    `time` datetime not null
);
INSERT INTO `incoming` (`storage_id`,`category_id`,`quantity`,`time`) VALUES (1,32,3,'2015-03-17 13:55:32');
INSERT INTO `incoming` (`storage_id`,`category_id`,`quantity`,`time`) VALUES (1,32,8,'2015-03-17 13:15:22');
INSERT INTO `incoming` (`storage_id`,`category_id`,`quantity`,`time`) VALUES (3,32,23,'2015-03-17 14:45:57');
INSERT INTO `incoming` (`storage_id`,`category_id`,`quantity`,`time`) VALUES (1,7,13,'2015-03-17 15:56:12');
INSERT INTO `incoming` (`storage_id`,`category_id`,`quantity`,`time`) VALUES (1,32,7,'2015-03-17 17:05:37');
INSERT INTO `incoming` (`storage_id`,`category_id`,`quantity`,`time`) VALUES (2,17,1,'2015-03-18 13:13:22');
INSERT INTO `incoming` (`storage_id`,`category_id`,`quantity`,`time`) VALUES (1,7,13,'2015-03-19 21:53:17');



SELECT
	storage_id, category_id, quantity 
FROM incoming t1
WHERE NOT EXISTS 
(SELECT 1 FROM incoming t2 WHERE t2.storage_id = t1.storage_id && t2.category_id = t1.category_id && t2.time > t1.time)
ORDER BY storage_id ASC, category_id ASC;