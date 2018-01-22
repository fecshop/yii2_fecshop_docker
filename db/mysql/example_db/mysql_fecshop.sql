-- phpMyAdmin SQL Dump
-- version 3.3.10
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 06 月 22 日 10:28
-- 服务器版本: 5.6.14
-- PHP 版本: 5.4.34

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `fecshop`
--

--
-- 转存表中的数据 `product_custom_option_qty`
--

INSERT INTO `product_custom_option_qty` (`id`, `product_id`, `custom_option_sku`, `qty`) VALUES
(10, '581c6833f656f2042f2f0b77', 'red-s-s2-s3', 99978),
(11, '581c6833f656f2042f2f0b77', 'red-m-s2-s3', 99997),
(12, '581c6833f656f2042f2f0b77', 'red-m-m2-s3', 99990),
(13, '581c6833f656f2042f2f0b77', 'red-m-m2-m3', 99874),
(14, '581c6833f656f2042f2f0b77', 'red-m-m2-l3', 100002),
(15, '581c6833f656f2042f2f0b77', 'red-m-l2-l3', 99998),
(16, '581c6833f656f2042f2f0b77', 'red-m-l2-s3', 99999),
(17, '581c6833f656f2042f2f0b77', 'red-m-l2-m3', 99999),
(18, '581c6833f656f2042f2f0b77', 'red-l-l2-m3', 99996),
(19, '581c6833f656f2042f2f0b77', 'red-l-m2-m3', 99999),
(20, '581c6833f656f2042f2f0b77', 'red-l-m2-l3', 99999),
(21, '581c6833f656f2042f2f0b77', 'black-s-s2-s3', 99998),
(22, '581c6833f656f2042f2f0b77', 'black-s-l2-s3', 99997),
(23, '581c6833f656f2042f2f0b77', 'black-s-xl2-s3', 99999),
(24, '581c6833f656f2042f2f0b77', 'black-s-s2-l3', 99999),
(25, '581c6833f656f2042f2f0b77', 'blue-s-s2-s3', 10000),
(26, '581ae91ff656f20f052f0b77', 'red-xl', 99999),
(27, '581ae91ff656f20f052f0b77', 'black-s', 99992),
(28, '581ae91ff656f20f052f0b77', 'black-m', 99989),
(29, '581ae91ff656f20f052f0b77', 'black-l', 100143),
(30, '581ae91ff656f20f052f0b77', 'black-xxxl', 100001),
(31, '581ae91ff656f20f052f0b77', 'red-l', 32),
(32, '581ae91ff656f20f052f0b77', 'red-s', 99990),
(33, '581ae91ff656f20f052f0b77', 'red-m', 0),
(34, '57bac5c6f656f2940a3bf570', 'red-s', 444),
(35, '57bac5c6f656f2940a3bf570', 'white-s', 444),
(36, '57bac5c6f656f2940a3bf570', 'white-l', 444),
(37, '57bac5c6f656f2940a3bf570', 'white-xxl', 444);

--
-- 转存表中的数据 `product_flat_qty`
--

INSERT INTO `product_flat_qty` (`id`, `product_id`, `qty`) VALUES
(1, '59478b09bfb7ae529444f683', 666),
(2, '59290102bfb7ae30f71ad895', 44),
(3, '59479a17bfb7ae5c5a4f2d33', 44),
(4, '59479a76bfb7ae5c5a4f2d35', 22),
(8, '59290098bfb7ae30f71ad893', 4441),
(9, '581c6833f656f2042f2f0b77', 222210),
(10, '581ae91ff656f20f052f0b77', 222221),
(11, '581994c6f656f28b2a2f0b79', 331),
(12, '5819949cf656f28b2a2f0b77', 333),
(13, '58199480f656f28a2a2f0b7b', 334),
(14, '58199472f656f28a2a2f0b79', 332),
(15, '5819941ef656f28a2a2f0b77', 328),
(16, '580835edf656f26e122f0b79', 4444),
(17, '580835d0f656f240742f0b7c', 4410),
(18, '5808352af656f23f742f0b7a', 4438),
(19, '580835baf656f23f742f0b7c', 4444),
(20, '580834f3f656f240742f0b7a', 4438),
(21, '580834e8f656f23f742f0b77', 4442),
(22, '5808348bf656f240742f0b78', 4444),
(23, '58083337f656f26e122f0b77', 33),
(24, '57e8dd52f656f2a5746234e6', 33),
(25, '57e8d9a7f656f2e16b6234e5', 26),
(26, '57d6307df656f2b018df9deb', 333339),
(27, '57d62e84f656f2b57ddf9def', 27),
(28, '57d61555f656f29808df9ded', 19),
(29, '57d61233f656f2b57ddf9ded', 33),
(30, '57d610e8f656f29808df9deb', 16),
(31, '57d611b4f656f20070df9deb', 14),
(32, '57d60c6cf656f2b57ddf9deb', 313),
(33, '57cfc282f656f21231df9ded', 23),
(34, '57cfc212f656f28b5adf9deb', 296),
(35, '57c7daecf656f273013bf570', 21),
(36, '57c7da9af656f2577a3bf56e', 50),
(37, '57c7da4af656f273013bf56e', 32),
(38, '57c7da1ef656f20c713bf56e', 299),
(39, '57c3aaa9f656f24f353bf56e', 27),
(40, '57bac5c6f656f2940a3bf570', 20),
(41, '57bac59ef656f24f123bf56e', 19),
(42, '57bab43bf656f2e8103bf56e', 386),
(43, '57bab0d5f656f2940a3bf56e', 16);
