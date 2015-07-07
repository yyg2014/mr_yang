create table `cate`(
	`id` int unsigned not null auto_increment primary key,
	`name` varchar(32),
	`pid` int unsigned not null default 0,
	`path` varchar(50)
)engine=myisam default charset=utf8; 