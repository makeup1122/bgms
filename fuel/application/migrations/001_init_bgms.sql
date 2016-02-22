-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-01-31 22:44:32
-- 服务器版本： 5.5.47-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bgms`
--

-- --------------------------------------------------------

--
-- 表的结构 `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL COMMENT '自增主键',
  `name` varchar(24) NOT NULL COMMENT '属性名',
  `value` varchar(64) NOT NULL COMMENT '属性值',
  `remark` text NOT NULL COMMENT '字段说明'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL COMMENT '自增主键',
  `ip` varchar(16) DEFAULT NULL COMMENT '设备IP地址',
  `print_status` varchar(36) NOT NULL COMMENT '打印设备状态',
  `print_info` varchar(64) NOT NULL COMMENT '打印设备信息',
  `scan_status` varchar(36) NOT NULL COMMENT '扫描设备状态',
  `scan_info` varchar(64) NOT NULL COMMENT '扫描设备信息',
  `status` int(11) NOT NULL COMMENT '设备状态',
  `login_time` datetime DEFAULT NULL COMMENT '登录注册时间',
  `logout_time` datetime NOT NULL COMMENT '注销时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `print_log`
--

CREATE TABLE `print_log` (
  `id` int(11) NOT NULL COMMENT '自增主键',
  `devID` int(11) DEFAULT NULL COMMENT '设备ID',
  `print_time` varchar(64) DEFAULT NULL COMMENT '打印的时间',
  `print_barcode` varchar(24) DEFAULT NULL COMMENT '打印的一维码内容',
  `print_info` varchar(64) DEFAULT NULL COMMENT '打印的信息',
  `print_type` int(1) NOT NULL COMMENT '打印类型',
  `idtype` varchar(8) NOT NULL COMMENT '证件类型',
  `scan_pic` varchar(64) NOT NULL COMMENT '扫描采集图像存放路径',
  `people_num` int(11) NOT NULL COMMENT '人数（团体票、其他票）',
  `sex` varchar(2) NOT NULL COMMENT '性别',
  `id_num` varchar(32) NOT NULL COMMENT '证件号码',
  `name` varchar(12) NOT NULL COMMENT '姓名',
  `hasChild` int(11) NOT NULL COMMENT '是否携带儿童',
  `hasGroup` int(11) NOT NULL COMMENT '是否为团队携带者',
  `stamp_time` datetime NOT NULL COMMENT '时间戳',
  `result` int(11) NOT NULL COMMENT '打印结果',
  `error_msg` varchar(64) NOT NULL COMMENT '错误信息',
  `isdelete` int(1) NOT NULL COMMENT '是否删除'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT '用户ID',
  `username` varchar(12) DEFAULT NULL COMMENT '用户名',
  `password` varchar(128) DEFAULT NULL COMMENT '密码',
  `verify` varchar(6) DEFAULT NULL COMMENT '随机盐',
  `email` varchar(64) DEFAULT NULL COMMENT '邮箱',
  `mobile` varchar(14) DEFAULT NULL COMMENT '手机号码',
  `remark` varchar(128) DEFAULT NULL COMMENT '备注',
  `status` int(1) DEFAULT NULL COMMENT '状态',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `update_time` datetime NOT NULL COMMENT '修改时间',
  `last_login_time` datetime NOT NULL COMMENT '最后登录时间',
  `last_login_ip` varchar(16) NOT NULL COMMENT '最后登录的IP',
  `role_id` int(1) NOT NULL COMMENT '角色ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `print_log`
--
ALTER TABLE `print_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键', AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键', AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `print_log`
--
ALTER TABLE `print_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键', AUTO_INCREMENT=20;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
