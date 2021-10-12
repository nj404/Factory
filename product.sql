CREATE TABLE `product` (
  `id_code` int(10) NOT NULL,
  `name` varchar(75) NOT NULL,
  `price` double(9,2) NOT NULL,
  `quantity` int(10) NOT NULL,
  PRIMARY KEY (`id_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `product` (`id_code`, `name`, `price`, `quantity`) VALUES
(1234567, 'Хлеб обеденный', 7.25, 45),
(6478392, 'Булка с маком', 10.15, 25),
(9835273, 'Рогалик', 3.50, 50),
(8936274, 'Печенье', 50.35, 15),
(6294739, 'Рулет с повидлом', 12.75, 32),
(7364920, 'Лаваш', 10.55, 70),
(5395021, 'Печенье \"Шахматное\"', 45.30, 10);
