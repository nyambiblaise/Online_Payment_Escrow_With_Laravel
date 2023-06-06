-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2021 at 07:48 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payescrow`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `is_super`, `image`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$.sO9kLAurqjCYnUatIQeDuwxOqPC7KWPKEIOy5rYf8sGMm0zkLdZm', 0, '60c74716c6a711623672598.jpg', '019111111114', 'Dhaka Bangladesha', 'XSxIX5FoP7zIhdzDc8vYiySXaA9VHRYWiyBf6MNbp3lXTgfiCgIT5vXcILse', '2020-11-03 03:41:33', '2021-06-14 06:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `chat_notifications`
--

CREATE TABLE `chat_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `escrow_id` bigint(20) DEFAULT NULL,
  `chat_notificational_id` bigint(20) DEFAULT NULL,
  `chat_notificational_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `is_read_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configures`
--

CREATE TABLE `configures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_title` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_zone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fraction_number` int(11) DEFAULT NULL,
  `paginate` int(11) DEFAULT NULL,
  `email_verification` tinyint(1) NOT NULL DEFAULT 0,
  `email_notification` tinyint(1) NOT NULL DEFAULT 0,
  `sms_verification` tinyint(1) NOT NULL DEFAULT 0,
  `sms_notification` tinyint(1) NOT NULL DEFAULT 0,
  `minimum_escrow` decimal(11,2) NOT NULL DEFAULT 0.00,
  `maximum_escrow` decimal(11,2) NOT NULL DEFAULT 0.00,
  `escrow_charge` decimal(11,2) NOT NULL DEFAULT 0.00,
  `sender_email` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_email_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_configuration` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `push_notification` tinyint(1) NOT NULL DEFAULT 0,
  `google_captcha` tinyint(1) NOT NULL DEFAULT 0,
  `google_captcha_key` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configures`
--

INSERT INTO `configures` (`id`, `site_title`, `time_zone`, `currency`, `currency_symbol`, `theme`, `fraction_number`, `paginate`, `email_verification`, `email_notification`, `sms_verification`, `sms_notification`, `minimum_escrow`, `maximum_escrow`, `escrow_charge`, `sender_email`, `sender_email_name`, `email_description`, `email_configuration`, `push_notification`, `google_captcha`, `google_captcha_key`, `created_at`, `updated_at`) VALUES
(1, 'PayEscrow', 'UTC', 'USD', '$', NULL, 2, 20, 0, 0, 0, 0, '10.00', '10000.00', '2.00', 'support@mail.com', 'Bug Finder', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n<meta name=\"viewport\" content=\"width=device-width\">\r\n<style type=\"text/css\">\r\n    @media only screen and (min-width: 620px) {\r\n        * [lang=x-wrapper] h1 {\r\n        }\r\n\r\n        * [lang=x-wrapper] h1 {\r\n            font-size: 26px !important;\r\n            line-height: 34px !important\r\n        }\r\n\r\n        * [lang=x-wrapper] h2 {\r\n        }\r\n\r\n        * [lang=x-wrapper] h2 {\r\n            font-size: 20px !important;\r\n            line-height: 28px !important\r\n        }\r\n\r\n        * [lang=x-wrapper] h3 {\r\n        }\r\n\r\n        * [lang=x-layout__inner] p,\r\n        * [lang=x-layout__inner] ol,\r\n        * [lang=x-layout__inner] ul {\r\n        }\r\n\r\n        * div [lang=x-size-8] {\r\n            font-size: 8px !important;\r\n            line-height: 14px !important\r\n        }\r\n\r\n        * div [lang=x-size-9] {\r\n            font-size: 9px !important;\r\n            line-height: 16px !important\r\n        }\r\n\r\n        * div [lang=x-size-10] {\r\n            font-size: 10px !important;\r\n            line-height: 18px !important\r\n        }\r\n\r\n        * div [lang=x-size-11] {\r\n            font-size: 11px !important;\r\n            line-height: 19px !important\r\n        }\r\n\r\n        * div [lang=x-size-12] {\r\n            font-size: 12px !important;\r\n            line-height: 19px !important\r\n        }\r\n\r\n        * div [lang=x-size-13] {\r\n            font-size: 13px !important;\r\n            line-height: 21px !important\r\n        }\r\n\r\n        * div [lang=x-size-14] {\r\n            font-size: 14px !important;\r\n            line-height: 21px !important\r\n        }\r\n\r\n        * div [lang=x-size-15] {\r\n            font-size: 15px !important;\r\n            line-height: 23px !important\r\n        }\r\n\r\n        * div [lang=x-size-16] {\r\n            font-size: 16px !important;\r\n            line-height: 24px !important\r\n        }\r\n\r\n        * div [lang=x-size-17] {\r\n            font-size: 17px !important;\r\n            line-height: 26px !important\r\n        }\r\n\r\n        * div [lang=x-size-18] {\r\n            font-size: 18px !important;\r\n            line-height: 26px !important\r\n        }\r\n\r\n        * div [lang=x-size-18] {\r\n            font-size: 18px !important;\r\n            line-height: 26px !important\r\n        }\r\n\r\n        * div [lang=x-size-20] {\r\n            font-size: 20px !important;\r\n            line-height: 28px !important\r\n        }\r\n\r\n        * div [lang=x-size-22] {\r\n            font-size: 22px !important;\r\n            line-height: 31px !important\r\n        }\r\n\r\n        * div [lang=x-size-24] {\r\n            font-size: 24px !important;\r\n            line-height: 32px !important\r\n        }\r\n\r\n        * div [lang=x-size-26] {\r\n            font-size: 26px !important;\r\n            line-height: 34px !important\r\n        }\r\n\r\n        * div [lang=x-size-28] {\r\n            font-size: 28px !important;\r\n            line-height: 36px !important\r\n        }\r\n\r\n        * div [lang=x-size-30] {\r\n            font-size: 30px !important;\r\n            line-height: 38px !important\r\n        }\r\n\r\n        * div [lang=x-size-32] {\r\n            font-size: 32px !important;\r\n            line-height: 40px !important\r\n        }\r\n\r\n        * div [lang=x-size-34] {\r\n            font-size: 34px !important;\r\n            line-height: 43px !important\r\n        }\r\n\r\n        * div [lang=x-size-36] {\r\n            font-size: 36px !important;\r\n            line-height: 43px !important\r\n        }\r\n\r\n        * div [lang=x-size-40] {\r\n            font-size: 40px !important;\r\n            line-height: 47px !important\r\n        }\r\n\r\n        * div [lang=x-size-44] {\r\n            font-size: 44px !important;\r\n            line-height: 50px !important\r\n        }\r\n\r\n        * div [lang=x-size-48] {\r\n            font-size: 48px !important;\r\n            line-height: 54px !important\r\n        }\r\n\r\n        * div [lang=x-size-56] {\r\n            font-size: 56px !important;\r\n            line-height: 60px !important\r\n        }\r\n\r\n        * div [lang=x-size-64] {\r\n            font-size: 64px !important;\r\n            line-height: 63px !important\r\n        }\r\n    }\r\n</style>\r\n<style type=\"text/css\">\r\n    body {\r\n        margin: 0;\r\n        padding: 0;\r\n    }\r\n\r\n    table {\r\n        border-collapse: collapse;\r\n        table-layout: fixed;\r\n    }\r\n\r\n    * {\r\n        line-height: inherit;\r\n    }\r\n\r\n    [x-apple-data-detectors],\r\n    [href^=\"tel\"],\r\n    [href^=\"sms\"] {\r\n        color: inherit !important;\r\n        text-decoration: none !important;\r\n    }\r\n\r\n    .wrapper .footer__share-button a:hover,\r\n    .wrapper .footer__share-button a:focus {\r\n        color: #ffffff !important;\r\n    }\r\n\r\n    .btn a:hover,\r\n    .btn a:focus,\r\n    .footer__share-button a:hover,\r\n    .footer__share-button a:focus,\r\n    .email-footer__links a:hover,\r\n    .email-footer__links a:focus {\r\n        opacity: 0.8;\r\n    }\r\n\r\n    .preheader,\r\n    .header,\r\n    .layout,\r\n    .column {\r\n        transition: width 0.25s ease-in-out, max-width 0.25s ease-in-out;\r\n    }\r\n\r\n    .layout,\r\n    .header {\r\n        max-width: 400px !important;\r\n        -fallback-width: 95% !important;\r\n        width: calc(100% - 20px) !important;\r\n    }\r\n\r\n    div.preheader {\r\n        max-width: 360px !important;\r\n        -fallback-width: 90% !important;\r\n        width: calc(100% - 60px) !important;\r\n    }\r\n\r\n    .snippet,\r\n    .webversion {\r\n        Float: none !important;\r\n    }\r\n\r\n    .column {\r\n        max-width: 400px !important;\r\n        width: 100% !important;\r\n    }\r\n\r\n    .fixed-width.has-border {\r\n        max-width: 402px !important;\r\n    }\r\n\r\n    .fixed-width.has-border .layout__inner {\r\n        box-sizing: border-box;\r\n    }\r\n\r\n    .snippet,\r\n    .webversion {\r\n        width: 50% !important;\r\n    }\r\n\r\n    .ie .btn {\r\n        width: 100%;\r\n    }\r\n\r\n    .ie .column,\r\n    [owa] .column,\r\n    .ie .gutter,\r\n    [owa] .gutter {\r\n        display: table-cell;\r\n        float: none !important;\r\n        vertical-align: top;\r\n    }\r\n\r\n    .ie div.preheader,\r\n    [owa] div.preheader,\r\n    .ie .email-footer,\r\n    [owa] .email-footer {\r\n        max-width: 560px !important;\r\n        width: 560px !important;\r\n    }\r\n\r\n    .ie .snippet,\r\n    [owa] .snippet,\r\n    .ie .webversion,\r\n    [owa] .webversion {\r\n        width: 280px !important;\r\n    }\r\n\r\n    .ie .header,\r\n    [owa] .header,\r\n    .ie .layout,\r\n    [owa] .layout,\r\n    .ie .one-col .column,\r\n    [owa] .one-col .column {\r\n        max-width: 600px !important;\r\n        width: 600px !important;\r\n    }\r\n\r\n    .ie .fixed-width.has-border,\r\n    [owa] .fixed-width.has-border,\r\n    .ie .has-gutter.has-border,\r\n    [owa] .has-gutter.has-border {\r\n        max-width: 602px !important;\r\n        width: 602px !important;\r\n    }\r\n\r\n    .ie .two-col .column,\r\n    [owa] .two-col .column {\r\n        width: 300px !important;\r\n    }\r\n\r\n    .ie .three-col .column,\r\n    [owa] .three-col .column,\r\n    .ie .narrow,\r\n    [owa] .narrow {\r\n        width: 200px !important;\r\n    }\r\n\r\n    .ie .wide,\r\n    [owa] .wide {\r\n        width: 400px !important;\r\n    }\r\n\r\n    .ie .two-col.has-gutter .column,\r\n    [owa] .two-col.x_has-gutter .column {\r\n        width: 290px !important;\r\n    }\r\n\r\n    .ie .three-col.has-gutter .column,\r\n    [owa] .three-col.x_has-gutter .column,\r\n    .ie .has-gutter .narrow,\r\n    [owa] .has-gutter .narrow {\r\n        width: 188px !important;\r\n    }\r\n\r\n    .ie .has-gutter .wide,\r\n    [owa] .has-gutter .wide {\r\n        width: 394px !important;\r\n    }\r\n\r\n    .ie .two-col.has-gutter.has-border .column,\r\n    [owa] .two-col.x_has-gutter.x_has-border .column {\r\n        width: 292px !important;\r\n    }\r\n\r\n    .ie .three-col.has-gutter.has-border .column,\r\n    [owa] .three-col.x_has-gutter.x_has-border .column,\r\n    .ie .has-gutter.has-border .narrow,\r\n    [owa] .has-gutter.x_has-border .narrow {\r\n        width: 190px !important;\r\n    }\r\n\r\n    .ie .has-gutter.has-border .wide,\r\n    [owa] .has-gutter.x_has-border .wide {\r\n        width: 396px !important;\r\n    }\r\n\r\n    .ie .fixed-width .layout__inner {\r\n        border-left: 0 none white !important;\r\n        border-right: 0 none white !important;\r\n    }\r\n\r\n    .ie .layout__edges {\r\n        display: none;\r\n    }\r\n\r\n    .mso .layout__edges {\r\n        font-size: 0;\r\n    }\r\n\r\n    .layout-fixed-width,\r\n    .mso .layout-full-width {\r\n        background-color: #ffffff;\r\n    }\r\n\r\n    @media only screen and (min-width: 620px) {\r\n\r\n        .column,\r\n        .gutter {\r\n            display: table-cell;\r\n            Float: none !important;\r\n            vertical-align: top;\r\n        }\r\n\r\n        div.preheader,\r\n        .email-footer {\r\n            max-width: 560px !important;\r\n            width: 560px !important;\r\n        }\r\n\r\n        .snippet,\r\n        .webversion {\r\n            width: 280px !important;\r\n        }\r\n\r\n        .header,\r\n        .layout,\r\n        .one-col .column {\r\n            max-width: 600px !important;\r\n            width: 600px !important;\r\n        }\r\n\r\n        .fixed-width.has-border,\r\n        .fixed-width.ecxhas-border,\r\n        .has-gutter.has-border,\r\n        .has-gutter.ecxhas-border {\r\n            max-width: 602px !important;\r\n            width: 602px !important;\r\n        }\r\n\r\n        .two-col .column {\r\n            width: 300px !important;\r\n        }\r\n\r\n        .three-col .column,\r\n        .column.narrow {\r\n            width: 200px !important;\r\n        }\r\n\r\n        .column.wide {\r\n            width: 400px !important;\r\n        }\r\n\r\n        .two-col.has-gutter .column,\r\n        .two-col.ecxhas-gutter .column {\r\n            width: 290px !important;\r\n        }\r\n\r\n        .three-col.has-gutter .column,\r\n        .three-col.ecxhas-gutter .column,\r\n        .has-gutter .narrow {\r\n            width: 188px !important;\r\n        }\r\n\r\n        .has-gutter .wide {\r\n            width: 394px !important;\r\n        }\r\n\r\n        .two-col.has-gutter.has-border .column,\r\n        .two-col.ecxhas-gutter.ecxhas-border .column {\r\n            width: 292px !important;\r\n        }\r\n\r\n        .three-col.has-gutter.has-border .column,\r\n        .three-col.ecxhas-gutter.ecxhas-border .column,\r\n        .has-gutter.has-border .narrow,\r\n        .has-gutter.ecxhas-border .narrow {\r\n            width: 190px !important;\r\n        }\r\n\r\n        .has-gutter.has-border .wide,\r\n        .has-gutter.ecxhas-border .wide {\r\n            width: 396px !important;\r\n        }\r\n    }\r\n\r\n    @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {\r\n        .fblike {\r\n            background-image: url(https://i3.createsend1.com/static/eb/customise/13-the-blueprint-3/images/fblike@2x.png) !important;\r\n        }\r\n\r\n        .tweet {\r\n            background-image: url(https://i4.createsend1.com/static/eb/customise/13-the-blueprint-3/images/tweet@2x.png) !important;\r\n        }\r\n\r\n        .linkedinshare {\r\n            background-image: url(https://i6.createsend1.com/static/eb/customise/13-the-blueprint-3/images/lishare@2x.png) !important;\r\n        }\r\n\r\n        .forwardtoafriend {\r\n            background-image: url(https://i5.createsend1.com/static/eb/customise/13-the-blueprint-3/images/forward@2x.png) !important;\r\n        }\r\n    }\r\n\r\n    @media (max-width: 321px) {\r\n        .fixed-width.has-border .layout__inner {\r\n            border-width: 1px 0 !important;\r\n        }\r\n\r\n        .layout,\r\n        .column {\r\n            min-width: 320px !important;\r\n            width: 320px !important;\r\n        }\r\n\r\n        .border {\r\n            display: none;\r\n        }\r\n    }\r\n\r\n    .mso div {\r\n        border: 0 none white !important;\r\n    }\r\n\r\n    .mso .w560 .divider {\r\n        margin-left: 260px !important;\r\n        margin-right: 260px !important;\r\n    }\r\n\r\n    .mso .w360 .divider {\r\n        margin-left: 160px !important;\r\n        margin-right: 160px !important;\r\n    }\r\n\r\n    .mso .w260 .divider {\r\n        margin-left: 110px !important;\r\n        margin-right: 110px !important;\r\n    }\r\n\r\n    .mso .w160 .divider {\r\n        margin-left: 60px !important;\r\n        margin-right: 60px !important;\r\n    }\r\n\r\n    .mso .w354 .divider {\r\n        margin-left: 157px !important;\r\n        margin-right: 157px !important;\r\n    }\r\n\r\n    .mso .w250 .divider {\r\n        margin-left: 105px !important;\r\n        margin-right: 105px !important;\r\n    }\r\n\r\n    .mso .w148 .divider {\r\n        margin-left: 54px !important;\r\n        margin-right: 54px !important;\r\n    }\r\n\r\n    .mso .font-avenir,\r\n    .mso .font-cabin,\r\n    .mso .font-open-sans,\r\n    .mso .font-ubuntu {\r\n        font-family: sans-serif !important;\r\n    }\r\n\r\n    .mso .font-bitter,\r\n    .mso .font-merriweather,\r\n    .mso .font-pt-serif {\r\n        font-family: Georgia, serif !important;\r\n    }\r\n\r\n    .mso .font-lato,\r\n    .mso .font-roboto {\r\n        font-family: Tahoma, sans-serif !important;\r\n    }\r\n\r\n    .mso .font-pt-sans {\r\n        font-family: \"Trebuchet MS\", sans-serif !important;\r\n    }\r\n\r\n    .mso .footer__share-button p {\r\n        margin: 0;\r\n    }\r\n\r\n    @media only screen and (min-width: 620px) {\r\n        .wrapper .size-8 {\r\n            font-size: 8px !important;\r\n            line-height: 14px !important;\r\n        }\r\n\r\n        .wrapper .size-9 {\r\n            font-size: 9px !important;\r\n            line-height: 16px !important;\r\n        }\r\n\r\n        .wrapper .size-10 {\r\n            font-size: 10px !important;\r\n            line-height: 18px !important;\r\n        }\r\n\r\n        .wrapper .size-11 {\r\n            font-size: 11px !important;\r\n            line-height: 19px !important;\r\n        }\r\n\r\n        .wrapper .size-12 {\r\n            font-size: 12px !important;\r\n            line-height: 19px !important;\r\n        }\r\n\r\n        .wrapper .size-13 {\r\n            font-size: 13px !important;\r\n            line-height: 21px !important;\r\n        }\r\n\r\n        .wrapper .size-14 {\r\n            font-size: 14px !important;\r\n            line-height: 21px !important;\r\n        }\r\n\r\n        .wrapper .size-15 {\r\n            font-size: 15px !important;\r\n            line-height: 23px !important;\r\n        }\r\n\r\n        .wrapper .size-16 {\r\n            font-size: 16px !important;\r\n            line-height: 24px !important;\r\n        }\r\n\r\n        .wrapper .size-17 {\r\n            font-size: 17px !important;\r\n            line-height: 26px !important;\r\n        }\r\n\r\n        .wrapper .size-18 {\r\n            font-size: 18px !important;\r\n            line-height: 26px !important;\r\n        }\r\n\r\n        .wrapper .size-20 {\r\n            font-size: 20px !important;\r\n            line-height: 28px !important;\r\n        }\r\n\r\n        .wrapper .size-22 {\r\n            font-size: 22px !important;\r\n            line-height: 31px !important;\r\n        }\r\n\r\n        .wrapper .size-24 {\r\n            font-size: 24px !important;\r\n            line-height: 32px !important;\r\n        }\r\n\r\n        .wrapper .size-26 {\r\n            font-size: 26px !important;\r\n            line-height: 34px !important;\r\n        }\r\n\r\n        .wrapper .size-28 {\r\n            font-size: 28px !important;\r\n            line-height: 36px !important;\r\n        }\r\n\r\n        .wrapper .size-30 {\r\n            font-size: 30px !important;\r\n            line-height: 38px !important;\r\n        }\r\n\r\n        .wrapper .size-32 {\r\n            font-size: 32px !important;\r\n            line-height: 40px !important;\r\n        }\r\n\r\n        .wrapper .size-34 {\r\n            font-size: 34px !important;\r\n            line-height: 43px !important;\r\n        }\r\n\r\n        .wrapper .size-36 {\r\n            font-size: 36px !important;\r\n            line-height: 43px !important;\r\n        }\r\n\r\n        .wrapper .size-40 {\r\n            font-size: 40px !important;\r\n            line-height: 47px !important;\r\n        }\r\n\r\n        .wrapper .size-44 {\r\n            font-size: 44px !important;\r\n            line-height: 50px !important;\r\n        }\r\n\r\n        .wrapper .size-48 {\r\n            font-size: 48px !important;\r\n            line-height: 54px !important;\r\n        }\r\n\r\n        .wrapper .size-56 {\r\n            font-size: 56px !important;\r\n            line-height: 60px !important;\r\n        }\r\n\r\n        .wrapper .size-64 {\r\n            font-size: 64px !important;\r\n            line-height: 63px !important;\r\n        }\r\n    }\r\n\r\n    .mso .size-8,\r\n    .ie .size-8 {\r\n        font-size: 8px !important;\r\n        line-height: 14px !important;\r\n    }\r\n\r\n    .mso .size-9,\r\n    .ie .size-9 {\r\n        font-size: 9px !important;\r\n        line-height: 16px !important;\r\n    }\r\n\r\n    .mso .size-10,\r\n    .ie .size-10 {\r\n        font-size: 10px !important;\r\n        line-height: 18px !important;\r\n    }\r\n\r\n    .mso .size-11,\r\n    .ie .size-11 {\r\n        font-size: 11px !important;\r\n        line-height: 19px !important;\r\n    }\r\n\r\n    .mso .size-12,\r\n    .ie .size-12 {\r\n        font-size: 12px !important;\r\n        line-height: 19px !important;\r\n    }\r\n\r\n    .mso .size-13,\r\n    .ie .size-13 {\r\n        font-size: 13px !important;\r\n        line-height: 21px !important;\r\n    }\r\n\r\n    .mso .size-14,\r\n    .ie .size-14 {\r\n        font-size: 14px !important;\r\n        line-height: 21px !important;\r\n    }\r\n\r\n    .mso .size-15,\r\n    .ie .size-15 {\r\n        font-size: 15px !important;\r\n        line-height: 23px !important;\r\n    }\r\n\r\n    .mso .size-16,\r\n    .ie .size-16 {\r\n        font-size: 16px !important;\r\n        line-height: 24px !important;\r\n    }\r\n\r\n    .mso .size-17,\r\n    .ie .size-17 {\r\n        font-size: 17px !important;\r\n        line-height: 26px !important;\r\n    }\r\n\r\n    .mso .size-18,\r\n    .ie .size-18 {\r\n        font-size: 18px !important;\r\n        line-height: 26px !important;\r\n    }\r\n\r\n    .mso .size-20,\r\n    .ie .size-20 {\r\n        font-size: 20px !important;\r\n        line-height: 28px !important;\r\n    }\r\n\r\n    .mso .size-22,\r\n    .ie .size-22 {\r\n        font-size: 22px !important;\r\n        line-height: 31px !important;\r\n    }\r\n\r\n    .mso .size-24,\r\n    .ie .size-24 {\r\n        font-size: 24px !important;\r\n        line-height: 32px !important;\r\n    }\r\n\r\n    .mso .size-26,\r\n    .ie .size-26 {\r\n        font-size: 26px !important;\r\n        line-height: 34px !important;\r\n    }\r\n\r\n    .mso .size-28,\r\n    .ie .size-28 {\r\n        font-size: 28px !important;\r\n        line-height: 36px !important;\r\n    }\r\n\r\n    .mso .size-30,\r\n    .ie .size-30 {\r\n        font-size: 30px !important;\r\n        line-height: 38px !important;\r\n    }\r\n\r\n    .mso .size-32,\r\n    .ie .size-32 {\r\n        font-size: 32px !important;\r\n        line-height: 40px !important;\r\n    }\r\n\r\n    .mso .size-34,\r\n    .ie .size-34 {\r\n        font-size: 34px !important;\r\n        line-height: 43px !important;\r\n    }\r\n\r\n    .mso .size-36,\r\n    .ie .size-36 {\r\n        font-size: 36px !important;\r\n        line-height: 43px !important;\r\n    }\r\n\r\n    .mso .size-40,\r\n    .ie .size-40 {\r\n        font-size: 40px !important;\r\n        line-height: 47px !important;\r\n    }\r\n\r\n    .mso .size-44,\r\n    .ie .size-44 {\r\n        font-size: 44px !important;\r\n        line-height: 50px !important;\r\n    }\r\n\r\n    .mso .size-48,\r\n    .ie .size-48 {\r\n        font-size: 48px !important;\r\n        line-height: 54px !important;\r\n    }\r\n\r\n    .mso .size-56,\r\n    .ie .size-56 {\r\n        font-size: 56px !important;\r\n        line-height: 60px !important;\r\n    }\r\n\r\n    .mso .size-64,\r\n    .ie .size-64 {\r\n        font-size: 64px !important;\r\n        line-height: 63px !important;\r\n    }\r\n\r\n    .footer__share-button p {\r\n        margin: 0;\r\n    }\r\n</style>\r\n\r\n<title></title>\r\n<!--[if !mso]><!-->\r\n<style type=\"text/css\">\r\n    @import url(https://fonts.googleapis.com/css?family=Bitter:400,700,400italic|Cabin:400,700,400italic,700italic|Open+Sans:400italic,700italic,700,400);\r\n</style>\r\n<link href=\"https://fonts.googleapis.com/css?family=Bitter:400,700,400italic|Cabin:400,700,400italic,700italic|Open+Sans:400italic,700italic,700,400\" rel=\"stylesheet\" type=\"text/css\">\r\n<!--<![endif]-->\r\n<style type=\"text/css\">\r\n    body {\r\n        background-color: #f5f7fa\r\n    }\r\n\r\n    .mso h1 {\r\n    }\r\n\r\n    .mso h1 {\r\n        font-family: sans-serif !important\r\n    }\r\n\r\n    .mso h2 {\r\n    }\r\n\r\n    .mso h3 {\r\n    }\r\n\r\n    .mso .column,\r\n    .mso .column__background td {\r\n    }\r\n\r\n    .mso .column,\r\n    .mso .column__background td {\r\n        font-family: sans-serif !important\r\n    }\r\n\r\n    .mso .btn a {\r\n    }\r\n\r\n    .mso .btn a {\r\n        font-family: sans-serif !important\r\n    }\r\n\r\n    .mso .webversion,\r\n    .mso .snippet,\r\n    .mso .layout-email-footer td,\r\n    .mso .footer__share-button p {\r\n    }\r\n\r\n    .mso .webversion,\r\n    .mso .snippet,\r\n    .mso .layout-email-footer td,\r\n    .mso .footer__share-button p {\r\n        font-family: sans-serif !important\r\n    }\r\n\r\n    .mso .logo {\r\n    }\r\n\r\n    .mso .logo {\r\n        font-family: Tahoma, sans-serif !important\r\n    }\r\n\r\n    .logo a:hover,\r\n    .logo a:focus {\r\n        color: #859bb1 !important\r\n    }\r\n\r\n    .mso .layout-has-border {\r\n        border-top: 1px solid #b1c1d8;\r\n        border-bottom: 1px solid #b1c1d8\r\n    }\r\n\r\n    .mso .layout-has-bottom-border {\r\n        border-bottom: 1px solid #b1c1d8\r\n    }\r\n\r\n    .mso .border,\r\n    .ie .border {\r\n        background-color: #b1c1d8\r\n    }\r\n\r\n    @media only screen and (min-width: 620px) {\r\n        .wrapper h1 {\r\n        }\r\n\r\n        .wrapper h1 {\r\n            font-size: 26px !important;\r\n            line-height: 34px !important\r\n        }\r\n\r\n        .wrapper h2 {\r\n        }\r\n\r\n        .wrapper h2 {\r\n            font-size: 20px !important;\r\n            line-height: 28px !important\r\n        }\r\n\r\n        .wrapper h3 {\r\n        }\r\n\r\n        .column p,\r\n        .column ol,\r\n        .column ul {\r\n        }\r\n    }\r\n\r\n    .mso h1,\r\n    .ie h1 {\r\n    }\r\n\r\n    .mso h1,\r\n    .ie h1 {\r\n        font-size: 26px !important;\r\n        line-height: 34px !important\r\n    }\r\n\r\n    .mso h2,\r\n    .ie h2 {\r\n    }\r\n\r\n    .mso h2,\r\n    .ie h2 {\r\n        font-size: 20px !important;\r\n        line-height: 28px !important\r\n    }\r\n\r\n    .mso h3,\r\n    .ie h3 {\r\n    }\r\n\r\n    .mso .layout__inner p,\r\n    .ie .layout__inner p,\r\n    .mso .layout__inner ol,\r\n    .ie .layout__inner ol,\r\n    .mso .layout__inner ul,\r\n    .ie .layout__inner ul {\r\n    }\r\n</style>\r\n<meta name=\"robots\" content=\"noindex,nofollow\">\r\n\r\n<meta property=\"og:title\" content=\"Just One More Step\">\r\n\r\n<link href=\"https://css.createsend1.com/css/social.min.css?h=0ED47CE120160920\" media=\"screen,projection\" rel=\"stylesheet\" type=\"text/css\">\r\n\r\n\r\n<div class=\"wrapper\" style=\"min-width: 320px;background-color: #f5f7fa;\" lang=\"x-wrapper\">\r\n    <div class=\"preheader\" style=\"margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;\">\r\n        <div style=\"border-collapse: collapse;display: table;width: 100%;\">\r\n            <div class=\"snippet\" style=\"display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;padding: 10px 0 5px 0;color: #b9b9b9;\">\r\n            </div>\r\n            <div class=\"webversion\" style=\"display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;padding: 10px 0 5px 0;text-align: right;color: #b9b9b9;\">\r\n            </div>\r\n        </div>\r\n\r\n        <div class=\"layout one-col fixed-width\" style=\"margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;\">\r\n            <div class=\"layout__inner\" style=\"border-collapse: collapse;display: table;width: 100%;background-color: #c4e5dc;\" lang=\"x-layout__inner\">\r\n                <div class=\"column\" style=\"text-align: left;color: #60666d;font-size: 14px;line-height: 21px;max-width:600px;min-width:320px;\">\r\n                    <div style=\"margin-left: 20px;margin-right: 20px;margin-top: 24px;margin-bottom: 24px;\">\r\n                        <h1 style=\"margin-top: 0;margin-bottom: 0;font-style: normal;font-weight: normal;color: #44a8c7;font-size: 36px;line-height: 43px;font-family: bitter,georgia,serif;text-align: center;\">\r\n                            <img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAW4AAABECAYAAACh4t9rAAAORklEQVR4nO2dPXIiOxeGNbe+ckbARMR4CTgihiXQS8DeASwBdoBZAiwBYkfDEobY0SVwRvSVuK88GtzdOkc//eM+TxU1VfeaRq2fV0dH50g/rpvxRCl1UPE44kn637P+9+Hl7RLx+UJieoMsdp8I5uN990PaXRD+438J6mFy96+6bsYnpdReKbUVERcEQQjjn4rqb6SUWimlfl8348V1M+5LuwmCIPhRlXAb+paAz6TNBEEQ+FQt3AYt4LvrZrySNhMEQeBRl3AbtNvkVdpMEASBTt3CrZmL5S0IgkCnCcKtYHmLz1sQBIFAU4Rb8yrRJoIgCG6aJNxatOcNKIcgCEKj4SbgTB9e3o5F/xMWs47ZHiqlZlYyDpWFUmotXaZVTD/ed4V9QhCE+ETNnERWpBnEW6TT72BNU+hrX/fDy9te2loQBCGfpK4SWOdTpRQnzZ1rpQuCIHSK5D7uh5c3fU7JkvGVUcLiCIIgtJ5KNicfXt62OCmQggi3IAhCCVVGlZD91tfNWMRbEAShgCqF+8T4W4nnFgRBKKBK4ZZzuAVBECLQpAQcQRAEgUCVwi3uD0EQhAikuLqsCM6GIzUCpRAcWjVCXHjebx/hdz9Jwk836A0yuz/0keE7xMubxLEL+sXtvtSP910lLr7eIOsX9NPLx/uOsz+UHJR1juzoUeh9oHjeDG0xumsXwwltcxu3Xc/WrVK4yaf/Pby8eQv3dTOeI3X+vuHvmZhkn+tmrH/v2U7nR2SLMxno4eWtMEUfRwBwzl8JupMTmaquCfIceaKaQRCj8/G+i3L8QW+QUfqE3daffbU3yHQo6z6FUPQG2czqh4Vl6w0yZYwMTCZe7Yd6cK189bvmjj9LsBcxVtAoD/VoDNPHbn/bG2QXRKqti8pb8rtDoh6dXXXdG2QLxzP0xLslloukObofVCLc+p5JgpAavAYIhHbH+B0b/Z3DdTNeP7y8mWShCa5Zc1EoLlqELcufSohYLQgNnwU8P4+UB4MFCTeEZheYjavfb94bZLpfPnNFoqBMc3w4fXWEjy6LLoMWgy1zRUARyQuefV9u/b3XnDKz66PkWRz6VtusIeCkutBtiEnD9fsXYhhzqU70BtmeWLY5cTw9JvdxQ1Bds5INe1kIK/tXYEdQOBf8AEs5Vuo9abYF3iIIa9tV5tjWdmOB9fI7Yjvq5/yCteYFLOxfGOghfXVo7m6FAMXkiyXdG2T6tw4FZSYLt560eoPsteRZvizQNhwDiTIu+4T63RIi5pxtZLmLXNxWREmFG2JyYC6rWBY3RDvm9WemzFGW/8ys0SHexwdKo3MmkdaCQfCaYEP85GtxQ/x8V4RF3N6zN8h2eOeoQGh3TMOr6P37GFepVmhDiDf1+RTBVa7ywpJ2jStKmWbE/nr7rejCra1V7R64bsY7D9G+lB0bm/NbsUXbMIo86DlLfnbHvm7GQ8L3KB3su7BIcHSCrr9nny/CygwWvzIibqLaK5QdZ2+qCEu0q8iIfqWIN+qLsvocwbVThmsyHxLKRFkZns1eC9fHrd0IzK+wIAscxKoVd1Vqq5vh5x/plQpnAiOKQtDGZ1uASHBE8mwNvLxoBgN7E0z9Ee2U+wBn3wmlDKwQYrmZqhJtw6o3yE6EaJw1wxouG4+U/jYrMpwYm6Wf+tikBByuRZhiKZySJFY3/PHiJvkDte4u2Gx8/HjfTfF51Bs/aCt7kjv6RLjAykp9q1MWOWTRWJjUya90MkPURdVnD/UpK3FMxBQDaV60t0Hc5NRMSnzwlPH71wqhScK9plqEcJFwrYELBuT07rP02RDlwvR1z7CioEAK8QoJsWwZ1H6xzAvT0oP54323hICbgcK2aGH5p14RLhPEeJNEz6KwX0HsuHVwzhmnPmN0RPR3Uw2aomdxXElFzyCV056gq4zjLuNUFg+dA9eKWZdMDHrGXWMjdZXYOlgzBsWCKBgxO+d3gNp+pRMZBkmmrSTPDckVd38H/eOvOGpMABO0sz0p7WPFuecQawOV69dfFrzTbYwiKoez0l64+r6O00Z4peudb2GHtnhiZcIxIPUzlnfPGBHr+6/3aILFfeHEFiO8kCOuOrFm6bLmrdt6klnfHlZ3aQfFysPV6Cemv7ztUAc1qQ/5WLRWrDYV3T7aZfPFj64HuRYX7cpB/zym8msT2MI188P65E4esLY5dfDsmoiQDMO5UWsIsXdBmQDzXJI+brD771Ce8SUpqm6L+4ILiDkWDWeGW0MsSSBhZhopJrywTESr2wz+sk5F2pRklM0HzmTUJFbISOQmsVDgLJ9PEGUniCg4alGsKhXflBHCypnEOHWQ67bKQ5ehN8gybHhSmBCiR/bEFdKnBc/YULznfkyTYrfv/0Odwn2CNcy1aKjCffHJvIN4c1wa3OdzIkwKhRuuHWfmF2fi8iRJOngAR0Yf0YN1oTPb0B+pGW4uOH2Unckamr3JZAth5dYLtQ7OXJeP7m/IZKX8hvNv9LvhaAOXIXSz4GH5+4Z33kID9USF1YBrsshNu6/LVbKGpe3jlqB2CO/wtwrEjvr8soQcSsdJ5QNtMtxJxKxs9ET9b2+Q6SSORUiGJKePVizCXPRq4NlzMiPXgWfZyGOImJxE3qRkZDkWYb7rHQ1W9UUKuhCPFJ9zHi6f7x1N9utSs7ZUnkAj4oQyMLp46mHoO4+sdPJXroBjUFP7aZPbx2s1oP64Eah4jVPmQVvO/QxMoJRnTghuFZfBNMHGpku4C0OkUwv3CT/8DMF+DgxLI29KNnlDDpMW1Roewi1iQ0246UoI4CcYgLFWGnMIOGdZTO6jTTuu9Q6vhCNAFu7AOohdf6GhgeYZ93kAeewIv1PouuP6uKnxlKcuZOkFsmUcj7kwlgkxvV11LATwnnXJOew+rLAhGDOSo+mRPm3oP1SNIa2A4DunhAaWsYbPfO2IYaeUqdAA4Qp310LLkmFtglISFCZasGFBU/xiR8/9g28BBs40cqr17TjVhLHTTSLWJm1T4LxLSGDC0VqlcAwz17O+8G3vnGT6w+uC5evGO1GW7Z2/0QfCM428QbsK3LS0qToNnENbJv0UIbv7gIvNP/sa8dTAMkq/+50vC451QE4ymL7uOTG9/VxBVEwrQPKKSV+PVSeUDSUK/YiTQGxChZtzRrfXBIZN4Oj1FyC455ywWN8+57x5p23CnSoBoE44VjfFrSKifQfOH9H+6Z/YKOfU+T2lBkHCJJXWwNzU9DWwyHXnkWfgM4a+GGCoB59nOb/TKuGGhUodcLOcaAwSAZcZsGFa3S66dOY2G1jgW8Qm/0S4G7e+KBYiVbjmKS5AaAhUsVx41gFVuNmrB0ZooKHsXknu2CaN4Ta6SjgNseL6uvH3VZ/zHUts9xLNQwdngGgL/IkhtpT+RBWtYeoLFmqEWgfc89PNUapUo8w3mIIzJgvF2cPqJm0MN+V0QA6clOYRLn+YUgQNos29tScYRJhsI5zdXEfEwwFnfiRHH2xE/Y3eIDtgEDgHDc6/WBJjaykT45HRltrivFCjVbR12pKIjz3DAFogYsfZVvCJcwwrr416Zmigq9zUCxsoz7rRRoub2xC6oX/htvVCrAuH69rtDxXdYxcTbvJAwswE11itiEtxqhg6V3zYWOK0xQr3RpaKBLLtDgkuCI4O45ICg7Ot0K4cw+oYmOBDGZPOQ8oYVje5vK2zuLU4XTdjjtWtMGvurpux8V2Z66pG1nGNte7w471CrO4unkvyBYibbZHpwT7DWcplg4c6YVPFaMu0DGco58kKSbP7qJ1QRL2aq27WzHG6gN/fjNFT4BgNHROUUwOpbhCK1U02StvoKlEeHcLQdJ8iZ0llc5bEqM8QsTx3xxAW3QKD43j3/2aM/kQaXNr1wbjWyoZy3vztPXuD7KnJbhO4G/bM6BnuWeZFBJ9aSTg1kGwha6vbcaIhyVVkaGUcN0Tq2yWZwNURJRSpo+wc1pGZuA/W55Wz0cUMdUvp/B8SffJ181zDee3eN/LnUDYeuWO1bJyyntXmBJw6OkQV+IQPdT5T0uMaKS5sMYA1lvKmmgluY28s5gq4gLh5LreM2VgrkZLQQGeSTM6zjiWutm4IN6JEUnWI2mKhPaxu73PHvxMYFClFculzWh6WvynLtWj6ZiUmMM6VY74Y0a7i1EDfVW7e99i3MLU65R0HKcW+J1KfFV7HfX42nE4hCTcAIjmNvBK74Nou73q2ypVKuBqfxAMxfUx4KqJ+/lOKDVsYBXaf8l7lFljd7L7V+rNKLPEO9fOecStP7f5iWN0U8enkmdtlYGA84QjiUKE8woILnhxRrkeUKxaflwxHfGYykLk6jezmvGA19JT4NiG7jteBrhj7WV4hi9/ikCntKtC36mBgUA4xt7lgMD01JTKDeJ+kEt92PhCINfrDs4eVt8dt5lGX3Va5fqLP+QiNuSjiEeVr3cSNYwdM2/j24RPqsKqJyz41MGjc3VndXs8iZ6K1DYjfyIoDveeE88UbJ37XzfhA2GjTZX+qqEitB6GCdqjdEB97dXPCPYuV7Rkg6WZixWrnYcoYmlDSSNA2xlgpGq8KYqfbhhvdEwVsBPdjXKiBfYkFJjA231a42wpuuPlNKP6zHN8qCNWBSXYYGh9uMLe9+3xXhLthXDfjV0ICgk648ZqpBUFoP9/5IoXWIfdJCoJAQYS7WVBTg0W4BaHDiHA3BMZ9kpJwIwgdR4S7OcyIiRRibQtCxxHhbg4Ua/uIhCNBEDqMCHcDwCUOMW7aEAShA4hwNwPKpuS5iclCgiBUjwh3zSDDk3IcqVjbgiDcEOGuH4q1TbqyXxCEbiDCXSOchBsJARQEwSDCXS9Rr+wXBKEbiHDXBBJuKMK9lzO3BUH4RCn1fxG7N8bmekshAAAAAElFTkSuQmCC\" style=\"width: 50%;\" data-filename=\"logo.png\">\r\n                        </h1>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n\r\n            <div class=\"layout one-col fixed-width\" style=\"margin: 0 auto;max-width: 600px;min-width: 320px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;\">\r\n                <div class=\"layout__inner\" style=\"border-collapse: collapse;display: table;width: 100%;background-color: #ffffff;\" lang=\"x-layout__inner\">\r\n                    <div class=\"column\" style=\"text-align: left;color: #60666d;background: #edf1eb;font-size: 14px;line-height: 21px;max-width:600px;min-width:320px;width:320px;\">\r\n\r\n                        <div style=\"margin-left: 20px;margin-right: 20px;margin-top: 24px;\">\r\n                            <div style=\"line-height:10px;font-size:1px\"> </div>\r\n                        </div>\r\n\r\n                        <div style=\"margin-left: 20px;margin-right: 20px;\">\r\n\r\n                            <p style=\"margin-top: 16px;margin-bottom: 0;\"><strong>Hello [[name]],</strong></p>\r\n                            <p style=\"margin-top: 20px;margin-bottom: 20px;\"><strong>[[message]]</strong></p>\r\n                            <p style=\"margin-top: 20px;margin-bottom: 20px;\"><br></p>\r\n                        </div>\r\n\r\n                    </div>\r\n                </div>\r\n            </div>\r\n\r\n            <div class=\"layout__inner\" style=\"border-collapse: collapse;display: table;width: 100%;background-color: #2c3262; margin-bottom: 20px\" lang=\"x-layout__inner\">\r\n                <div class=\"column\" style=\"text-align: left;color: #60666d;font-size: 14px;line-height: 21px;max-width:600px;min-width:320px;\">\r\n                    <div style=\"margin-top: 5px;margin-bottom: 5px;\">\r\n                        <p style=\"margin-top: 0;margin-bottom: 0;font-style: normal;font-weight: normal;color: #ffffff;font-size: 16px;line-height: 35px;font-family: bitter,georgia,serif;text-align: center;\">\r\n                            2021 ©  All Right Reserved\r\n                        </p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n\r\n        </div>\r\n\r\n\r\n        <div style=\"border-collapse: collapse;display: table;width: 100%;\">\r\n            <div class=\"snippet\" style=\"display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;padding: 10px 0 5px 0;color: #b9b9b9;\">\r\n            </div>\r\n            <div class=\"webversion\" style=\"display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;padding: 10px 0 5px 0;text-align: right;color: #b9b9b9;\">\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>', '{\"name\":\"smtp\",\"smtp_host\":\"smtp.mailtrap.io\",\"smtp_port\":\"2525\",\"smtp_encryption\":\"tls\",\"smtp_username\":\"6dc63521f5ad2c\",\"smtp_password\":\"65316dc7a18ddf\"}', 1, 0, '6Lf6nkwbAAAAAD310jBUyQ8lA_KJPK0afoBVtIS4', '2021-06-17 00:57:42', '2021-06-26 13:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=> request connection, 1=> Connected, 2=> Blocked, 3 => cancel',
  `modified_by` bigint(20) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'slider', '2021-06-13 05:15:54', '2021-06-13 05:15:54'),
(2, 'slider', '2021-06-13 05:16:06', '2021-06-13 05:16:06'),
(3, 'slider', '2021-06-13 05:16:14', '2021-06-13 05:16:14'),
(4, 'slider', '2021-06-13 05:16:21', '2021-06-13 05:16:21'),
(5, 'why-chose-us', '2021-06-13 05:20:28', '2021-06-13 05:20:28'),
(6, 'why-chose-us', '2021-06-13 05:20:44', '2021-06-13 05:20:44'),
(7, 'why-chose-us', '2021-06-13 05:20:58', '2021-06-13 05:20:58'),
(8, 'why-chose-us', '2021-06-13 05:21:16', '2021-06-13 05:21:16'),
(9, 'how-it-work', '2021-06-13 05:23:43', '2021-06-13 05:23:43'),
(10, 'how-it-work', '2021-06-13 05:23:53', '2021-06-13 05:23:53'),
(11, 'how-it-work', '2021-06-13 05:24:04', '2021-06-13 05:24:04'),
(12, 'how-it-work', '2021-06-13 05:24:14', '2021-06-13 05:24:14'),
(13, 'faq', '2021-06-13 05:25:59', '2021-06-13 05:25:59'),
(14, 'faq', '2021-06-13 05:26:23', '2021-06-13 05:26:23'),
(15, 'faq', '2021-06-13 05:26:48', '2021-06-13 05:26:48'),
(16, 'faq', '2021-06-13 05:27:41', '2021-06-13 05:27:41'),
(17, 'faq', '2021-06-13 05:28:06', '2021-06-13 05:28:06'),
(18, 'faq', '2021-06-13 05:28:27', '2021-06-13 05:28:27'),
(19, 'faq', '2021-06-13 05:29:00', '2021-06-13 05:29:00'),
(20, 'faq', '2021-06-13 05:29:18', '2021-06-13 05:29:18'),
(21, 'testimonial', '2021-06-13 06:05:35', '2021-06-13 06:05:35'),
(22, 'testimonial', '2021-06-13 06:05:47', '2021-06-13 06:05:47'),
(23, 'testimonial', '2021-06-13 06:06:00', '2021-06-13 06:06:00'),
(24, 'testimonial', '2021-06-13 06:06:20', '2021-06-13 06:06:20'),
(25, 'testimonial', '2021-06-13 06:08:04', '2021-06-13 06:08:04'),
(29, 'social', '2021-06-13 07:05:36', '2021-06-13 07:05:36'),
(31, 'social', '2021-06-13 07:06:44', '2021-06-13 07:06:44'),
(32, 'social', '2021-06-13 07:07:18', '2021-06-13 07:07:18'),
(33, 'support', '2021-06-13 07:10:25', '2021-06-13 07:10:25'),
(34, 'support', '2021-06-13 07:11:01', '2021-06-13 07:11:01'),
(35, 'blog', '2021-06-13 07:13:57', '2021-06-13 07:13:57'),
(36, 'blog', '2021-06-13 07:14:18', '2021-06-13 07:14:18'),
(37, 'blog', '2021-06-13 07:14:31', '2021-06-13 07:14:31'),
(38, 'blog', '2021-06-13 07:14:52', '2021-06-13 07:14:52'),
(39, 'blog', '2021-06-13 07:15:04', '2021-06-13 07:15:04'),
(40, 'blog', '2021-06-13 07:15:34', '2021-06-13 07:15:34'),
(41, 'slider', '2021-06-13 08:28:57', '2021-06-13 08:28:57'),
(42, 'social', '2021-06-13 23:40:44', '2021-06-13 23:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `content_details`
--

CREATE TABLE `content_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_details`
--

INSERT INTO `content_details` (`id`, `content_id`, `language_id`, `description`, `created_at`, `updated_at`) VALUES
(217, 1, 20, '{\"title\":\"THE PLACE TO INVITE\",\"sub_title\":\"YOUR FRIENDS\",\"details\":\"Track details and more importantly to keep a record of our wins and losses.\",\"button_name\":\"Sign Up Now\",\"button_note\":\"Only Takes 2 minutes\"}', '2021-06-13 05:15:54', '2021-06-15 06:52:18'),
(218, 2, 20, '{\"title\":\"DEPOSIT YOUR FUND\",\"sub_title\":\"FOR ESCROW\",\"details\":\"Track details and more importantly to keep a record of our wins and losses.\",\"button_name\":\"Sign Up Now\",\"button_note\":\"Only Takes 2 minutes\"}', '2021-06-13 05:16:06', '2021-06-16 06:03:50'),
(219, 3, 20, '{\"title\":\"MAKE AN ESCROW\",\"sub_title\":\"FOR OPPONENTS\",\"details\":\"Track details and more importantly to keep a record of our wins and losses.\",\"button_name\":\"Sign Up Now\",\"button_note\":\"Only Takes 2 minutes\"}', '2021-06-13 05:16:14', '2021-06-16 06:05:21'),
(220, 4, 20, '{\"title\":\"EARN FORM DEAL\",\"sub_title\":\"FROM CLIENTS\",\"details\":\"Track details and more importantly to keep a record of our wins and losses.\",\"button_name\":\"Sign Up Now\",\"button_note\":\"Only Takes 2 minutes\"}', '2021-06-13 05:16:21', '2021-06-16 06:07:34'),
(221, 5, 20, '{\"title\":\"Professional Services\",\"information\":\"Lorem ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.\"}', '2021-06-13 05:20:28', '2021-06-13 05:20:28'),
(222, 6, 20, '{\"title\":\"Low costing\",\"information\":\"Lorem ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.\"}', '2021-06-13 05:20:44', '2021-06-13 05:20:44'),
(223, 7, 20, '{\"title\":\"Live Support\",\"information\":\"Lorem ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.\"}', '2021-06-13 05:20:58', '2021-06-13 05:20:58'),
(224, 8, 20, '{\"title\":\"Safe and Secure\",\"information\":\"Lorem ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.\"}', '2021-06-13 05:21:16', '2021-06-13 05:21:16'),
(225, 9, 20, '{\"title\":\"Make Escrow\"}', '2021-06-13 05:23:43', '2021-06-13 05:23:43'),
(226, 10, 20, '{\"title\":\"Choose Opponent\"}', '2021-06-13 05:23:53', '2021-06-13 05:23:53'),
(227, 11, 20, '{\"title\":\"Complete &amp; Collect\"}', '2021-06-13 05:24:04', '2021-06-13 05:24:04'),
(228, 12, 20, '{\"title\":\"Repeat\"}', '2021-06-13 05:24:14', '2021-06-13 05:24:14'),
(229, 13, 20, '{\"title\":\"How much time I will spend on planning?\",\"description\":\"An adjustment date is the day when the interest rate changes on an adjustable rate mortgage (ARM). After an initial period where an ARM loan interest rate remains the same, the rate changes on the adjustment date to reflect the new ARM loan rate. The ARM loan rate will then continue to adjust over the remaining life of the loan as described in your Note. An initial interest rate is the starting interest rate of an adjustable rate mortgage (ARM). This initial interest rate on an ARM loan is fixed for a certain period of time, and then adjusts to reflect overall market rates.\"}', '2021-06-13 05:25:59', '2021-06-13 05:28:39'),
(230, 14, 20, '{\"title\":\"What is an amortization schedule and how can I see it?\",\"description\":\"An amortization schedule is a schedule showing the effects of making principal and interest payments over the life of your loan as it relates to the loan balance and interest paid. It can be a useful tool to help determine the effects of making more than the required monthly payment, or in observing how much of your payment is applied to the principal reduction versus interest over the life of your loan. You can see your amortization schedule by visiting the Amortization Calculator page of your online account and submitting the needed inputs to calculate your results. For more general information, visit the Home Loan Calculators page.\"}', '2021-06-13 05:26:23', '2021-06-13 05:26:23'),
(231, 15, 20, '{\"title\":\"What is an ARM Adjustment Period?\",\"description\":\"An adjustable rate mortgage (ARM) adjustment period is the frequency with which the interest rate may change. The most common ARM adjustment periods are every six months or twelve months. The frequency of ARM adjustments are outlined in the Note.\"}', '2021-06-13 05:26:48', '2021-06-13 05:26:48'),
(232, 16, 20, '{\"title\":\"How can i pay for my order?\",\"description\":\"There are many variations of passages of Lorem Ipsum dumm available at but the majority have suffered alteration some to form injected anything embarrassing.\"}', '2021-06-13 05:27:41', '2021-06-13 05:27:41'),
(233, 17, 20, '{\"title\":\"The question is Is this what we really want?\",\"description\":\"There are many variations of passages of Lorem Ipsum dumm available at but the majority have suffered alteration some to form injected anything embarrassing.\"}', '2021-06-13 05:28:06', '2021-06-13 05:28:06'),
(234, 18, 20, '{\"title\":\"Are there any discounts included?\",\"description\":\"There are many variations of passages of Lorem Ipsum dumm available at but the majority have suffered alteration some to form injected anything embarrassing.\"}', '2021-06-13 05:28:27', '2021-06-13 05:28:27'),
(235, 19, 20, '{\"title\":\"Can i specify delivery date when ordering?\",\"description\":\"There are many variations of passages of Lorem Ipsum dumm available at but the majority have suffered alteration some to form injected anything embarrassing.\"}', '2021-06-13 05:29:00', '2021-06-13 05:29:00'),
(236, 20, 20, '{\"title\":\"Is the media bootable?\",\"description\":\"There are many variations of passages of Lorem Ipsum dumm available at but the majority have suffered alteration some to form injected anything embarrassing.\"}', '2021-06-13 05:29:18', '2021-06-13 05:29:18'),
(237, 21, 20, '{\"name\":\"Alex Jotham\",\"designation\":\"Develpoer\",\"description\":\"Morem ipsum dolor sit amet, consectetur adipiscing elit.\"}', '2021-06-13 06:05:35', '2021-06-13 06:05:35'),
(238, 22, 20, '{\"name\":\"Tom Latham\",\"designation\":\"Develpoer\",\"description\":\"Morem ipsum dolor sit amet, consectetur adipiscing elit.\"}', '2021-06-13 06:05:47', '2021-06-13 06:05:47'),
(239, 23, 20, '{\"name\":\"K Y Limes\",\"designation\":\"Develpoer\",\"description\":\"Morem ipsum dolor sit amet, consectetur adipiscing elit.\"}', '2021-06-13 06:06:00', '2021-06-13 06:06:00'),
(240, 24, 20, '{\"name\":\"Harrision Tom\",\"designation\":\"Develpoer\",\"description\":\"Morem ipsum dolor sit amet, consectetur adipiscing elit.\"}', '2021-06-13 06:06:20', '2021-06-13 06:06:20'),
(241, 25, 20, '{\"name\":\"Leo Thomson\",\"designation\":\"Manager\",\"description\":\"Morem ipsum dolor sit amet, consectetur adipiscing elit.\"}', '2021-06-13 06:08:04', '2021-06-13 06:08:04'),
(242, 29, 20, '{\"name\":\"Facebook\"}', '2021-06-13 07:05:36', '2021-06-13 07:05:36'),
(244, 31, 20, '{\"name\":\"Skype\"}', '2021-06-13 07:06:44', '2021-06-13 07:06:44'),
(245, 32, 20, '{\"name\":\"Pinterest\"}', '2021-06-13 07:07:18', '2021-06-13 07:07:18'),
(246, 33, 20, '{\"title\":\"Privacy\",\"description\":\"<p><\\/p><h4><span>Unde esse accusamus nemo, alias ea, nisi corrupti?<\\/span><\\/h4><h4><span><br \\/><\\/span><\\/h4><p><span>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/span><\\/p><p><span><br \\/><\\/span><\\/p><h5><span>Culpa non accusantium ullam, maxime animi beatae?<\\/span><\\/h5><h5><span><br \\/><\\/span><\\/h5><p><span>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/span><\\/p><p><span><br \\/><\\/span><\\/p><h5><span>Culpa non accusantium ullam, maxime animi beatae?<\\/span><\\/h5><ul><li><i><\\/i><span><span>Dolorem maxime? Commodi, voluptas?<\\/span><\\/span><\\/li><li><i><\\/i><span><span>Quaerat fuga distinctio voluptas iusto exerci<\\/span><\\/span><\\/li><li><i><\\/i><span><span>Perspiciatis temporibus recusandae labore nostrum<\\/span><\\/span><\\/li><li><i><\\/i><span><span>Laborum aut veritatis enim veniam p<\\/span><\\/span><\\/li><\\/ul><p><span>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/span><\\/p><p><span><br \\/><\\/span><\\/p><h5><span>Culpa non accusantium ullam, maxime animi beatae?<\\/span><\\/h5><h5><span><br \\/><\\/span><\\/h5><p><span>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/span><\\/p><ul><li><i><\\/i><span><span>Dolorem maxime? Commodi, voluptas?<\\/span><\\/span><\\/li><li><i><\\/i><span><span>Quaerat fuga distinctio voluptas iusto exerci<\\/span><\\/span><\\/li><li><i><\\/i><span><span>Perspiciatis temporibus recusandae labore nostrum<\\/span><\\/span><\\/li><li><i><\\/i><span><span>Laborum aut veritatis enim veniam p<\\/span><\\/span><\\/li><li><span><span><br \\/><\\/span><\\/span><\\/li><\\/ul><h5><span>Culpa non accusantium ullam, maxime animi beatae?<\\/span><\\/h5><h5><span><br \\/><\\/span><\\/h5><p><span>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/span><\\/p><h5><span>Culpa non accusantium ullam, maxime animi beatae?<\\/span><\\/h5><h5><span><br \\/><\\/span><\\/h5><ul><li><i><\\/i><span><span>Dolorem maxime? Commodi, voluptas?<\\/span><\\/span><\\/li><li><i><\\/i><span><span>Quaerat fuga distinctio voluptas iusto exerci<\\/span><\\/span><\\/li><li><i><\\/i><span><span>Perspiciatis temporibus recusandae labore nostrum<\\/span><\\/span><\\/li><li><i><\\/i><span><span>Laborum aut veritatis enim veniam p<\\/span><\\/span><\\/li><\\/ul><p><span>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/span><\\/p><h5><span>Culpa non accusantium ullam, maxime animi beatae?<\\/span><\\/h5><h5><span><br \\/><\\/span><\\/h5><p><span>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/span><\\/p><p><span><br \\/><\\/span><\\/p><h5><span>Culpa non accusantium ullam, maxime animi beatae?<\\/span><\\/h5><h5><span><br \\/><\\/span><\\/h5><p><span>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/span><\\/p><ul><li><i><\\/i><span><span>Dolorem maxime? Commodi, voluptas?<\\/span><\\/span><\\/li><li><i><\\/i><span><span>Quaerat fuga distinctio voluptas iusto exerci<\\/span><\\/span><\\/li><li><i><\\/i><span><span>Perspiciatis temporibus recusandae labore nostrum<\\/span><\\/span><\\/li><li><i><\\/i><span><span>Laborum aut veritatis enim veniam p<\\/span><\\/span><\\/li><\\/ul>\"}', '2021-06-13 07:10:25', '2021-06-14 01:15:40'),
(247, 34, 20, '{\"title\":\"Terms &amp; conditions\",\"description\":\"<h4>Unde esse accusamus nemo, alias ea, nisi corrupti?<\\/h4><h4><br \\/><\\/h4><h4><\\/h4><p style=\\\"font-size:16px;\\\">Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><p style=\\\"font-size:16px;\\\"><br \\/><\\/p><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h5><br \\/><\\/h5><h4><\\/h4><p style=\\\"font-size:16px;\\\">Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><p style=\\\"font-size:16px;\\\"><br \\/><\\/p><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h4><\\/h4><ul><li><i><\\/i>Dolorem maxime? Commodi, voluptas?<\\/li><li><i><\\/i>Quaerat fuga distinctio voluptas iusto exerci<\\/li><li><i><\\/i>Perspiciatis temporibus recusandae labore nostrum<\\/li><li><i><\\/i>Laborum aut veritatis enim veniam p<\\/li><\\/ul><p style=\\\"font-size:16px;\\\">Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><p style=\\\"font-size:16px;\\\"><br \\/><\\/p><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h5><br \\/><\\/h5><h4><\\/h4><p style=\\\"font-size:16px;\\\">Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><ul><li><i><\\/i>Dolorem maxime? Commodi, voluptas?<\\/li><li><i><\\/i>Quaerat fuga distinctio voluptas iusto exerci<\\/li><li><i><\\/i>Perspiciatis temporibus recusandae labore nostrum<\\/li><li><i><\\/i>Laborum aut veritatis enim veniam p<\\/li><li><br \\/><\\/li><\\/ul><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h5><br \\/><\\/h5><h4><\\/h4><p style=\\\"font-size:16px;\\\">Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h5><br \\/><\\/h5><h4><\\/h4><ul><li><i><\\/i>Dolorem maxime? Commodi, voluptas?<\\/li><li><i><\\/i>Quaerat fuga distinctio voluptas iusto exerci<\\/li><li><i><\\/i>Perspiciatis temporibus recusandae labore nostrum<\\/li><li><i><\\/i>Laborum aut veritatis enim veniam p<\\/li><\\/ul><p style=\\\"font-size:16px;\\\">Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h5><br \\/><\\/h5><h4><\\/h4><p style=\\\"font-size:16px;\\\">Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><p style=\\\"font-size:16px;\\\"><br \\/><\\/p><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h5><br \\/><\\/h5><h4><\\/h4><p style=\\\"font-size:16px;\\\">Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><ul><li><i><\\/i>Dolorem maxime? Commodi, voluptas?<\\/li><li><i><\\/i>Quaerat fuga distinctio voluptas iusto exerci<\\/li><li><i><\\/i>Perspiciatis temporibus recusandae labore nostrum<\\/li><li><i><\\/i>Laborum aut veritatis enim veniam p<\\/li><\\/ul>\"}', '2021-06-13 07:11:01', '2021-06-14 01:15:57'),
(248, 35, 20, '{\"title\":\"Neque porro quisquam est qui dolorem ipsum quia dolor sit\",\"description\":\"<p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.\\r\\n<\\/p><p>\\r\\nHybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p>\"}', '2021-06-13 07:13:57', '2021-06-13 07:13:57'),
(249, 36, 20, '{\"title\":\"Many desktop publishing packages and web page editors\",\"description\":\"<p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.\\r\\n<\\/p><p>\\r\\nHybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p>\"}', '2021-06-13 07:14:18', '2021-06-13 07:14:18'),
(250, 37, 20, '{\"title\":\"It uses a dictionary of over 200 Latin words, combined\",\"description\":\"<p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.\\r\\n<\\/p><p>\\r\\nHybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p>\"}', '2021-06-13 07:14:31', '2021-06-13 07:15:43'),
(251, 38, 20, '{\"title\":\"Rationally encounter consequences that are extremely painful\",\"description\":\"<p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.\\r\\n<\\/p><p>\\r\\nHybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p>\"}', '2021-06-13 07:14:52', '2021-06-13 07:14:52'),
(252, 39, 20, '{\"title\":\"On the other hand, we denounce with righteous indignation and dislike men\",\"description\":\"<p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.\\r\\n<\\/p><p>\\r\\nHybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p>\"}', '2021-06-13 07:15:04', '2021-06-13 07:15:04'),
(253, 40, 20, '{\"title\":\"It will frequently occur that pleasures have to be repudiated\",\"description\":\"<p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.\\r\\n<\\/p><p>\\r\\nHybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p>\"}', '2021-06-13 07:15:34', '2021-06-13 07:15:50'),
(254, 41, 20, '{\"title\":\"SAVE YOUR MONEY\",\"sub_title\":\"BE HAPPY\",\"details\":\"Track details and more importantly to keep a record of our wins and losses.\",\"button_name\":\"Sign Up Now\",\"button_note\":\"Only Takes 2 minutes\"}', '2021-06-13 08:28:57', '2021-06-16 06:12:58'),
(255, 42, 20, '{\"name\":\"Telegram\"}', '2021-06-13 23:40:44', '2021-06-13 23:40:44'),
(256, 1, 21, '{\"title\":\"EL LUGAR PARA INVITAR\",\"sub_title\":\"tus amigas\",\"details\":\"Realice un seguimiento de los detalles y, lo que es m\\u00e1s importante, lleve un registro de nuestras victorias y p\\u00e9rdidas.\",\"button_name\":\"Reg\\u00edstrate ahora\",\"button_note\":\"Solo toma 2 minutos\"}', '2021-06-15 06:50:10', '2021-06-15 06:52:32'),
(257, 2, 21, '{\"title\":\"DEPOSITA TU FONDO\",\"sub_title\":\"PARA EL FIDEICOMISO\",\"details\":\"Realice un seguimiento de los detalles y, lo que es m\\u00e1s importante, lleve un registro de nuestras victorias y p\\u00e9rdidas.\",\"button_name\":\"Reg\\u00edstrate ahora\",\"button_note\":\"Solo toma 2 minutos\"}', '2021-06-15 06:53:32', '2021-06-16 06:04:37'),
(258, 3, 21, '{\"title\":\"HAGA UN FIDEICOMISO\",\"sub_title\":\"PARA LOS OPONENTES\",\"details\":\"Realice un seguimiento de los detalles y, lo que es m\\u00e1s importante, lleve un registro de nuestras victorias y p\\u00e9rdidas.\",\"button_name\":\"Reg\\u00edstrate ahora\",\"button_note\":\"Solo toma 2 minutos\"}', '2021-06-15 06:53:56', '2021-06-16 06:05:40'),
(259, 4, 21, '{\"title\":\"OBTENER FORMULARIO DE OFERTA\",\"sub_title\":\"DE CLIENTES\",\"details\":\"Realice un seguimiento de los detalles y, lo que es m\\u00e1s importante, lleve un registro de nuestras victorias y p\\u00e9rdidas.\",\"button_name\":\"Reg\\u00edstrate ahora\",\"button_note\":\"Solo toma 2 minutos\"}', '2021-06-15 06:55:14', '2021-06-16 06:08:34'),
(260, 41, 21, '{\"title\":\"AHORRE SU DINERO\",\"sub_title\":\"BE HAPPY\",\"details\":\"Realice un seguimiento de los detalles y, lo que es m\\u00e1s importante, lleve un registro de nuestras victorias y p\\u00e9rdidas.\",\"button_name\":\"Reg\\u00edstrate ahora\",\"button_note\":\"Solo toma 2 minutos\"}', '2021-06-15 07:18:08', '2021-06-16 06:13:17'),
(261, 9, 21, '{\"title\":\"Hacer fideicomiso\"}', '2021-06-15 07:19:36', '2021-06-15 07:19:36'),
(262, 10, 21, '{\"title\":\"Elige al oponente\"}', '2021-06-15 07:19:47', '2021-06-15 07:19:47'),
(263, 11, 21, '{\"title\":\"Completar y recopilar\"}', '2021-06-15 07:19:56', '2021-06-15 07:19:56'),
(264, 12, 21, '{\"title\":\"Repetir\"}', '2021-06-15 07:20:06', '2021-06-15 07:20:06'),
(265, 13, 21, '{\"title\":\"Cu\\u00e1nto tiempo dedicar\\u00e9 a la planificaci\\u00f3n?\",\"description\":\"<p>An adjustment date is the day when the interest rate changes on an adjustable rate mortgage (ARM). After an initial period where an ARM loan interest rate remains the same, the rate changes on the adjustment date to reflect the new ARM loan rate. The ARM loan rate will then continue to adjust over the remaining life of the loan as described in your Note. An initial interest rate is the starting interest rate of an adjustable rate mortgage (ARM). This initial interest rate on an ARM loan is fixed for a certain period of time, and then adjusts to reflect overall market rates.<br \\/><\\/p>\"}', '2021-06-15 07:21:26', '2021-06-15 07:21:26'),
(266, 14, 21, '{\"title\":\"Qu\\u00e9 es un programa de amortizaci\\u00f3n y c\\u00f3mo puedo verlo?\",\"description\":\"<p>An amortization schedule is a schedule showing the effects of making principal and interest payments over the life of your loan as it relates to the loan balance and interest paid. It can be a useful tool to help determine the effects of making more than the required monthly payment, or in observing how much of your payment is applied to the principal reduction versus interest over the life of your loan. You can see your amortization schedule by visiting the Amortization Calculator page of your online account and submitting the needed inputs to calculate your results. For more general information, visit the Home Loan Calculators page.<br \\/><\\/p>\"}', '2021-06-15 07:21:44', '2021-06-15 07:21:44'),
(267, 15, 21, '{\"title\":\"Qu\\u00e9 es un per\\u00edodo de ajuste de ARM?\",\"description\":\"<p>An adjustable rate mortgage (ARM) adjustment period is the frequency with which the interest rate may change. The most common ARM adjustment periods are every six months or twelve months. The frequency of ARM adjustments are outlined in the Note.<br \\/><\\/p>\"}', '2021-06-15 07:22:04', '2021-06-15 07:22:04'),
(268, 16, 21, '{\"title\":\"C\\u00f3mo puedo pagar mi pedido?\",\"description\":\"<p>There are many variations of passages of Lorem Ipsum dumm available at but the majority have suffered alteration some to form injected anything embarrassing.<br \\/><\\/p>\"}', '2021-06-15 07:22:21', '2021-06-15 07:22:21'),
(269, 17, 21, '{\"title\":\"La pregunta es: \\u00bfEs esto lo que realmente queremos?\",\"description\":\"<p>There are many variations of passages of Lorem Ipsum dumm available at but the majority have suffered alteration some to form injected anything embarrassing.<br \\/><\\/p>\"}', '2021-06-15 07:22:36', '2021-06-15 07:22:36'),
(270, 18, 21, '{\"title\":\"Hay descuentos incluidos?\",\"description\":\"<p>There are many variations of passages of Lorem Ipsum dumm available at but the majority have suffered alteration some to form injected anything embarrassing.<br \\/><\\/p>\"}', '2021-06-15 07:22:52', '2021-06-15 07:22:52'),
(271, 19, 21, '{\"title\":\"Puedo especificar la fecha de entrega al realizar el pedido?\",\"description\":\"<p>There are many variations of passages of Lorem Ipsum dumm available at but the majority have suffered alteration some to form injected anything embarrassing.<br \\/><\\/p>\"}', '2021-06-15 07:23:08', '2021-06-15 07:23:08'),
(272, 20, 21, '{\"title\":\"Es el medio de arranque?\",\"description\":\"<p>There are many variations of passages of Lorem Ipsum dumm available at but the majority have suffered alteration some to form injected anything embarrassing.<br \\/><\\/p>\"}', '2021-06-15 07:23:46', '2021-06-15 07:23:46'),
(273, 21, 21, '{\"name\":\"Alex Jotham\",\"designation\":\"Desarrolladora\",\"description\":\"<p>Morem ipsum dolor sit amet, consectetur adipiscing elit.<br \\/><\\/p>\"}', '2021-06-15 07:41:03', '2021-06-15 07:41:03'),
(274, 22, 21, '{\"name\":\"Tom Latham\",\"designation\":\"Desarrolladora\",\"description\":\"<p>Morem ipsum dolor sit amet, consectetur adipiscing elit.<br \\/><\\/p>\"}', '2021-06-15 07:41:20', '2021-06-15 07:41:20'),
(275, 23, 21, '{\"name\":\"K Y Limes\",\"designation\":\"Desarrolladora\",\"description\":\"<p>Morem ipsum dolor sit amet, consectetur adipiscing elit.<br \\/><\\/p>\"}', '2021-06-15 07:41:39', '2021-06-15 07:41:39'),
(276, 24, 21, '{\"name\":\"Harrision Tom\",\"designation\":\"Desarrolladora\",\"description\":\"<p>Morem ipsum dolor sit amet, consectetur adipiscing elit.<br \\/><\\/p>\"}', '2021-06-15 07:44:02', '2021-06-15 07:44:02'),
(277, 25, 21, '{\"name\":\"Leo Thomson\",\"designation\":\"Gerente\",\"description\":\"<p>Morem ipsum dolor sit amet, consectetur adipiscing elit.<br \\/><\\/p>\"}', '2021-06-15 07:44:27', '2021-06-15 07:44:27'),
(278, 5, 21, '{\"title\":\"Servicios profesionales\",\"information\":\"<p>Lorem ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.<br \\/><\\/p>\"}', '2021-06-15 07:45:56', '2021-06-15 07:45:56'),
(279, 6, 21, '{\"title\":\"Costo bajo\",\"information\":\"<p>Lorem ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.<br \\/><\\/p>\"}', '2021-06-15 07:46:13', '2021-06-15 07:46:13'),
(280, 7, 21, '{\"title\":\"Soporte vital\",\"information\":\"<p>Lorem ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.<br \\/><\\/p>\"}', '2021-06-15 07:46:27', '2021-06-15 07:46:27'),
(281, 8, 21, '{\"title\":\"Seguro y a salvo\",\"information\":\"<p>Lorem ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.<br \\/><\\/p>\"}', '2021-06-15 07:46:43', '2021-06-15 07:46:43'),
(282, 35, 21, '{\"title\":\"Neque porro quisquam est qui dolorem ipsum quia dolor sit\",\"description\":\"<p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p>\"}', '2021-06-15 07:47:21', '2021-06-15 07:47:21'),
(283, 36, 21, '{\"title\":\"Many desktop publishing packages and web page editors\",\"description\":\"<p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p>\"}', '2021-06-15 07:47:32', '2021-06-15 07:47:32'),
(284, 37, 21, '{\"title\":\"It uses a dictionary of over 200 Latin words, combined\",\"description\":\"<p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p>\"}', '2021-06-15 07:47:50', '2021-06-15 07:47:50'),
(285, 38, 21, '{\"title\":\"Rationally encounter consequences that are extremely painful\",\"description\":\"<p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p>\"}', '2021-06-15 07:47:59', '2021-06-15 07:47:59'),
(286, 39, 21, '{\"title\":\"On the other hand, we denounce with righteous indignation and dislike men\",\"description\":\"<p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p>\"}', '2021-06-15 07:48:49', '2021-06-15 07:48:49'),
(287, 40, 21, '{\"title\":\"It will frequently occur that pleasures have to be repudiated\",\"description\":\"<p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p><p>Hybrid mobile applications are like any other applications you will see on your mobile. They get easily installed on your mobile device. You can look for these apps in the App stores. By using these apps, you can engage your friends via social media, play games, track your health, take photos and much more.<\\/p><p>Hybrid mobile applications are developed using a combination of web technologies like CSS, HTML, and JS as same as websites on the internet. The major difference is that hybrid applications are hosted inside a native app which further uses a mobile platform\'s WebView. Here, WebView is a chromeless browser window which is typically configured to run fullscreen.<\\/p>\"}', '2021-06-15 07:49:00', '2021-06-15 07:49:00'),
(288, 29, 21, '{\"name\":\"Facebook\"}', '2021-06-15 07:49:16', '2021-06-15 07:49:16'),
(289, 31, 21, '{\"name\":\"Skype\"}', '2021-06-15 07:49:41', '2021-06-15 07:49:41');
INSERT INTO `content_details` (`id`, `content_id`, `language_id`, `description`, `created_at`, `updated_at`) VALUES
(290, 32, 21, '{\"name\":\"Pinterest\"}', '2021-06-15 07:49:54', '2021-06-15 07:49:54'),
(291, 42, 21, '{\"name\":\"Telegrama\"}', '2021-06-15 07:50:04', '2021-06-15 07:50:04'),
(292, 33, 21, '{\"title\":\"Intimidad\",\"description\":\"<h4>Unde esse accusamus nemo, alias ea, nisi corrupti?<\\/h4><h4><br \\/><\\/h4><p>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><p><br \\/><\\/p><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h5><br \\/><\\/h5><p>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><p><br \\/><\\/p><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><ul><li><i><\\/i>Dolorem maxime? Commodi, voluptas?<\\/li><li><i><\\/i>Quaerat fuga distinctio voluptas iusto exerci<\\/li><li><i><\\/i>Perspiciatis temporibus recusandae labore nostrum<\\/li><li><i><\\/i>Laborum aut veritatis enim veniam p<\\/li><\\/ul><p>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><p><br \\/><\\/p><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h5><br \\/><\\/h5><p>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><ul><li><i><\\/i>Dolorem maxime? Commodi, voluptas?<\\/li><li><i><\\/i>Quaerat fuga distinctio voluptas iusto exerci<\\/li><li><i><\\/i>Perspiciatis temporibus recusandae labore nostrum<\\/li><li><i><\\/i>Laborum aut veritatis enim veniam p<\\/li><li><br \\/><\\/li><\\/ul><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h5><br \\/><\\/h5><p>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h5><br \\/><\\/h5><ul><li><i><\\/i>Dolorem maxime? Commodi, voluptas?<\\/li><li><i><\\/i>Quaerat fuga distinctio voluptas iusto exerci<\\/li><li><i><\\/i>Perspiciatis temporibus recusandae labore nostrum<\\/li><li><i><\\/i>Laborum aut veritatis enim veniam p<\\/li><\\/ul><p>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h5><br \\/><\\/h5><p>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><p><br \\/><\\/p><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h5><br \\/><\\/h5><p>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><ul><li><i><\\/i>Dolorem maxime? Commodi, voluptas?<\\/li><li><i><\\/i>Quaerat fuga distinctio voluptas iusto exerci<\\/li><li><i><\\/i>Perspiciatis temporibus recusandae labore nostrum<\\/li><li><i><\\/i>Laborum aut veritatis enim veniam p<\\/li><\\/ul>\"}', '2021-06-15 07:51:07', '2021-06-15 07:51:07'),
(293, 34, 21, '{\"title\":\"T\\u00e9rminos y condiciones\",\"description\":\"<h4>Unde esse accusamus nemo, alias ea, nisi corrupti?<\\/h4><h4><br \\/><\\/h4><h4><\\/h4><p>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><p><br \\/><\\/p><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h5><br \\/><\\/h5><h4><\\/h4><p>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><p><br \\/><\\/p><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h4><\\/h4><ul><li><i><\\/i>Dolorem maxime? Commodi, voluptas?<\\/li><li><i><\\/i>Quaerat fuga distinctio voluptas iusto exerci<\\/li><li><i><\\/i>Perspiciatis temporibus recusandae labore nostrum<\\/li><li><i><\\/i>Laborum aut veritatis enim veniam p<\\/li><\\/ul><p>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><p><br \\/><\\/p><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h5><br \\/><\\/h5><h4><\\/h4><p>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><ul><li><i><\\/i>Dolorem maxime? Commodi, voluptas?<\\/li><li><i><\\/i>Quaerat fuga distinctio voluptas iusto exerci<\\/li><li><i><\\/i>Perspiciatis temporibus recusandae labore nostrum<\\/li><li><i><\\/i>Laborum aut veritatis enim veniam p<\\/li><li><br \\/><\\/li><\\/ul><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h5><br \\/><\\/h5><h4><\\/h4><p>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h5><br \\/><\\/h5><h4><\\/h4><ul><li><i><\\/i>Dolorem maxime? Commodi, voluptas?<\\/li><li><i><\\/i>Quaerat fuga distinctio voluptas iusto exerci<\\/li><li><i><\\/i>Perspiciatis temporibus recusandae labore nostrum<\\/li><li><i><\\/i>Laborum aut veritatis enim veniam p<\\/li><\\/ul><p>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h5><br \\/><\\/h5><h4><\\/h4><p>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><p><br \\/><\\/p><h5>Culpa non accusantium ullam, maxime animi beatae?<\\/h5><h5><br \\/><\\/h5><h4><\\/h4><p>Exercitationem quia expedita nobis cum excepturi, earum sunt placeat adipisci omnis culpa. Similique provident aut facilis repudiandae sapiente praesentium eum adipisci quis.<\\/p><ul><li><i><\\/i>Dolorem maxime? Commodi, voluptas?<\\/li><li><i><\\/i>Quaerat fuga distinctio voluptas iusto exerci<\\/li><li><i><\\/i>Perspiciatis temporibus recusandae labore nostrum<\\/li><li><i><\\/i>Laborum aut veritatis enim veniam p<\\/li><\\/ul>\"}', '2021-06-15 07:51:21', '2021-06-15 07:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `content_media`
--

CREATE TABLE `content_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_media`
--

INSERT INTO `content_media` (`id`, `content_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"image\":\"60c9e7508fe941623844688.jpg\",\"button_link\":\"https:\\/\\/bugfinder.net\"}', '2021-06-13 05:15:54', '2021-06-16 05:58:08'),
(2, 2, '{\"image\":\"60c9e78724a8a1623844743.jpg\",\"button_link\":\"https:\\/\\/bugfinder.net\"}', '2021-06-13 05:16:06', '2021-06-16 05:59:04'),
(3, 3, '{\"image\":\"60c9e7c3b41b71623844803.jpg\",\"button_link\":\"https:\\/\\/bugfinder.net\"}', '2021-06-13 05:16:14', '2021-06-16 06:00:05'),
(4, 4, '{\"image\":\"60c9e84c5d6661623844940.jpg\",\"button_link\":\"https:\\/\\/bugfinder.net\"}', '2021-06-13 05:16:21', '2021-06-16 06:02:22'),
(5, 5, '{\"image\":\"60c6dfb80083d1623646136.png\"}', '2021-06-13 05:20:28', '2021-06-13 22:48:56'),
(6, 6, '{\"image\":\"60c6dfbe4fe371623646142.png\"}', '2021-06-13 05:20:44', '2021-06-13 22:49:02'),
(7, 7, '{\"image\":\"60c6dfc418ee21623646148.png\"}', '2021-06-13 05:20:58', '2021-06-13 22:49:08'),
(8, 8, '{\"image\":\"60c6dfcf521c21623646159.png\"}', '2021-06-13 05:21:16', '2021-06-13 22:49:19'),
(9, 9, '{\"image\":\"60c5eabf134f71623583423.png\"}', '2021-06-13 05:23:43', '2021-06-13 05:23:43'),
(10, 10, '{\"image\":\"60c5eaca008001623583434.png\"}', '2021-06-13 05:23:54', '2021-06-13 05:23:54'),
(11, 11, '{\"image\":\"60c5ead4cfbed1623583444.png\"}', '2021-06-13 05:24:04', '2021-06-13 05:24:04'),
(12, 12, '{\"image\":\"60c5eade5a1131623583454.png\"}', '2021-06-13 05:24:14', '2021-06-13 05:24:14'),
(13, 21, '{\"image\":\"60c6d72ebd4e11623643950.png\"}', '2021-06-13 06:05:35', '2021-06-13 22:12:30'),
(14, 22, '{\"image\":\"60c6d734750481623643956.png\"}', '2021-06-13 06:05:47', '2021-06-13 22:12:36'),
(15, 23, '{\"image\":\"60c6d73c07c301623643964.png\"}', '2021-06-13 06:06:00', '2021-06-13 22:12:44'),
(16, 24, '{\"image\":\"60c6d7428ba691623643970.png\"}', '2021-06-13 06:06:20', '2021-06-13 22:12:50'),
(17, 25, '{\"image\":\"60c6d7491e4431623643977.png\"}', '2021-06-13 06:08:04', '2021-06-13 22:12:57'),
(18, 29, '{\"link\":\"https:\\/\\/www.facebook.com\\/\",\"icon\":\"fab fa-facebook-f\"}', '2021-06-13 07:05:36', '2021-06-13 07:05:36'),
(20, 31, '{\"link\":\"https:\\/\\/www.skype.com\\/en\\/\",\"icon\":\"fab fa-skype\"}', '2021-06-13 07:06:44', '2021-06-13 07:06:44'),
(21, 32, '{\"link\":\"https:\\/\\/www.pinterest.com\\/\",\"icon\":\"fab fa-pinterest-p\"}', '2021-06-13 07:07:18', '2021-06-13 07:07:18'),
(22, 41, '{\"image\":\"60c9e8163ef091623844886.jpg\",\"button_link\":\"https:\\/\\/bugfinder.net\"}', '2021-06-13 08:28:58', '2021-06-16 06:01:27'),
(23, 42, '{\"link\":\"https:\\/\\/telegram.org\\/\",\"icon\":\"fab fa-telegram\"}', '2021-06-13 23:40:44', '2021-06-13 23:40:44'),
(24, 35, '{\"image\":\"60c70f6ad80491623658346.jpg\"}', '2021-06-14 02:12:27', '2021-06-14 02:12:27'),
(25, 36, '{\"image\":\"60c70f7ddce971623658365.jpg\"}', '2021-06-14 02:12:45', '2021-06-14 02:12:45'),
(26, 37, '{\"image\":\"60c70f871e2b71623658375.jpg\"}', '2021-06-14 02:12:55', '2021-06-14 02:12:55'),
(27, 38, '{\"image\":\"60c70f8deebeb1623658381.jpg\"}', '2021-06-14 02:13:02', '2021-06-14 02:13:02'),
(28, 39, '{\"image\":\"60c70f947e12b1623658388.jpg\"}', '2021-06-14 02:13:08', '2021-06-14 02:13:08'),
(29, 40, '{\"image\":\"60c70fa4cfecd1623658404.jpg\"}', '2021-06-14 02:13:25', '2021-06-14 02:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `template_key` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_keys` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_status` tinyint(1) NOT NULL DEFAULT 0,
  `sms_status` tinyint(1) NOT NULL DEFAULT 0,
  `lang_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `language_id`, `template_key`, `email_from`, `name`, `subject`, `template`, `sms_body`, `short_keys`, `mail_status`, `sms_status`, `lang_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'PROFILE_UPDATE', 'profile@binary.com', 'Profile has been updated', 'Profile has been updated', 'Your first name [[firstname]]\r\n\r\nlast name [[lastname]]\r\n\r\nemail [[email]]\r\n\r\nphone number [[phone]]\r\n', 'Your first name [[firstname]]\r\n\r\nlast name [[lastname]]\r\n\r\nemail [[email]]\r\n\r\nphone number [[phone]]\r\n', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\"}', 1, 1, 'us', '2021-01-23 05:20:56', '2021-01-23 05:20:56'),
(2, 1, 'ADMIN_SUPPORT_REPLY', 'support@binary.com', 'Support Ticket Reply ', 'Support Ticket Reply', '<p>Ticket ID [[ticket_id]]\r\n</p><p><span><br /></span></p><p><span>Subject [[ticket_subject]]\r\n</span></p><p><span>-----Replied------</span></p><p><span>\r\n[[reply]]</span><br /></p>', 'Ticket ID [[ticket_id]]\r\n\r\n\r\n\r\nSubject [[ticket_subject]]\r\n\r\n-----Replied------\r\n\r\n[[reply]]', '{\"ticket_id\":\"Support Ticket ID\",\"ticket_subject\":\"Subject Of Support Ticket\",\"reply\":\"Reply from Staff\\/Admin\"}', 1, 1, 'us', '2021-01-23 05:24:42', '2021-01-23 05:48:16'),
(3, 1, 'PASSWORD_CHANGED', 'support@binary.com', 'PASSWORD CHANGED ', 'Your password changed ', 'Your password changed \r\n\r\nNew password [[password]]\r\n\r\n', 'Your password changed\r\n\r\nNew password [[password]]\r\n\r\n\r\nNews [[test]]', '{\"password\":\"password\"}', 1, 1, 'us', '2021-01-23 05:24:42', '2021-01-23 05:48:16'),
(4, 1, 'ADD_BALANCE', 'support@binary.com', 'Balance Add by Admin', 'Your Account has been credited', '[[amount]] [[currency]] credited in your account.\r\n\r\nYour Current Balance [[main_balance]][[currency]]\r\n\r\nTransaction: #[[transaction]]', '[[amount]] [[currency]] credited in your account. \r\n\r\n\r\nYour Current Balance [[main_balance]][[currency]]\r\n\r\nTransaction: #[[transaction]]', '{\"transaction\":\"Transaction Number\",\"amount\":\"Request Amount By Admin\",\"currency\":\"Site Currency\", \"main_balance\":\"Users Balance After this operation\"}', 0, 1, 'us', '2021-01-23 05:24:42', '2021-03-16 01:14:56'),
(6, 1, 'DEDUCTED_BALANCE', 'support@binary.com', 'Balance deducted by Admin', 'Your Account has been debited', '[[amount]] [[currency]] debited in your account.\r\n\r\nYour Current Balance [[main_balance]][[currency]]\r\n\r\nTransaction: #[[transaction]]', '[[amount]] [[currency]] debited in your account.\r\n\r\nYour Current Balance [[main_balance]][[currency]]\r\n\r\nTransaction: #[[transaction]]', '{\"transaction\":\"Transaction Number\",\"amount\":\"Request Amount By Admin\",\"currency\":\"Site Currency\", \"main_balance\":\"Users Balance After this operation\"}', 1, 1, 'us', '2021-01-23 05:24:42', '2021-01-23 05:48:16'),
(9, 1, 'PAYMENT_COMPLETE', 'support@binary.com', 'Payment Completed', 'Your Payment Has Been Completed', '[[amount]] [[currency]] Payment Has Been successful via [[gateway_name]]\r\n\r\nCharge[[charge]] [[currency]]\r\n\r\nTranaction [[transaction]]\r\n\r\nYour Main Balance [[remaining_balance]] [[currency]]\r\n\r\n', '[[amount]] [[currency]] Payment Has Been successful via [[gateway_name]]\r\n\r\nCharge[[charge]] [[currency]]\r\n\r\nTranaction [[transaction]]\r\n\r\nYour Main Balance [[remaining_balance]] [[currency]]\r\n\r\n', '{\"gateway_name\":\"gateway name\",\"amount\":\"amount\",\"charge\":\"charge\", \"currency\":\"currency\",\"transaction\":\"transaction\",\"remaining_balance\":\"remaining balance\"}', 1, 1, 'us', '2021-01-23 05:24:42', '2021-01-23 05:48:16'),
(11, 1, 'PASSWORD_RESET', 'support@binary.com', 'Reset Password Notification', 'Reset Password Notification', 'You are receiving this email because we received a password reset request for your account.[[message]]\r\n\r\n\r\nThis password reset link will expire in 60 minutes.\r\n\r\nIf you did not request a password reset, no further action is required.', 'You are receiving this email because we received a password reset request for your account. [[message]]', '{\"message\":\"message\"}', 1, 1, 'us', '2021-01-27 00:32:07', '2021-01-27 00:32:07'),
(12, 1, 'VERIFICATION_CODE', 'support@binary.com', 'Verification Code', 'Verify Your Email ', 'Your Email verification Code  [[code]]', 'Your SMS verification Code  [[code]]', '{\"code\":\"code\"}', 1, 1, 'us', '2021-01-27 00:32:07', '2021-01-27 00:32:07'),
(21, 1, 'TWO_STEP_ENABLED', 'support@binary.com', 'TWO STEP ENABLED', 'TWO STEP ENABLED', 'Your verification code is: {{code}}', 'Your verification code is: {{code}}', '{\"action\":\"Enabled Or Disable\",\"ip\":\"Device Ip\",\"browser\":\"browser and Operating System \",\"time\":\"Time\",\"code\":\"code\"}', 1, 1, 'us', '2021-01-23 05:24:42', '2021-01-23 05:48:16'),
(22, 1, 'TWO_STEP_DISABLED', 'support@binary.com', 'TWO STEP DISABLED', 'TWO STEP DISABLED', 'Google two factor verification is disabled', 'Google two factor verification is disabled', '{\"action\":\"Enabled Or Disable\",\"ip\":\"Device Ip\",\"browser\":\"browser and Operating System \",\"time\":\"Time\"}', 1, 1, 'us', '2021-01-23 05:24:42', '2021-01-23 05:48:16'),
(24, 1, 'PAYOUT_REQUEST', 'support@binary.com', 'Withdraw request has been sent', 'Withdraw request has been sent', '[[amount]] [[currency]] withdraw requested by [[method_name]]\r\n\r\n\r\nCharge [[charge]] [[currency]]\r\n\r\nTransaction [[trx]]\r\n', '[[amount]] [[currency]] withdraw requested by [[method_name]]\r\n\r\n\r\nCharge [[charge]] [[currency]]\r\n\r\nTransaction [[trx]]\r\n', '{\"method_name\":\"method name\",\"amount\":\"amount\",\"charge\":\"charge\",\"currency\":\"currency\",\"trx\":\"transaction\"}', 1, 1, 'us', '2021-01-23 05:24:42', '2021-01-23 05:48:16'),
(27, 1, 'PAYOUT_REJECTED', 'support@binary.com', 'Withdraw request has been rejected', 'Withdraw request has been rejected', '[[amount]] [[currency]] withdraw has been rejeced\r\n\r\nPayout Method [[method]]\r\nCharge [[charge]] [[currency]]\r\nTransaction [[transaction]]\r\n\r\n\r\nAdmin feedback [[feedback]]\r\n\r\n', '[[amount]] [[currency]] withdraw has been rejeced\r\n\r\nPayout Method [[method]]\r\nCharge [[charge]] [[currency]]\r\nTransaction [[transaction]]\r\n\r\n\r\nAdmin feedback [[feedback]]\r\n\r\n', '{\"method\":\"Payout method\",\"amount\":\"amount\",\"charge\":\"charge\",\"currency\":\"currency\",\"transaction\":\"transaction\",\"feedback\":\"Admin feedback\"}', 1, 1, 'us', '2021-01-23 05:24:42', '2021-01-23 05:48:16'),
(28, 1, 'PAYOUT_APPROVE ', 'support@binary.com', 'Withdraw request has been approved', 'Withdraw request has been approved', '[[amount]] [[currency]] withdraw has been approved\r\n\r\nPayout Method [[method]]\r\nCharge [[charge]] [[currency]]\r\nTransaction [[transaction]]\r\n\r\n\r\nAdmin feedback [[feedback]]\r\n\r\n', '[[amount]] [[currency]] withdraw has been approved\r\n\r\nPayout Method [[method]]\r\nCharge [[charge]] [[currency]]\r\nTransaction [[transaction]]\r\n\r\n\r\nAdmin feedback [[feedback]]\r\n\r\n', '{\"method\":\"Payout method\",\"amount\":\"amount\",\"charge\":\"charge\",\"currency\":\"currency\",\"transaction\":\"transaction\",\"feedback\":\"Admin feedback\"}', 1, 1, 'us', '2021-01-23 05:24:42', '2021-01-23 05:48:16'),
(33, 1, 'ACCEPTED_DEAL', 'support@binary.com', 'ACCEPTED DEAL', 'ACCEPTED DEAL', '[[username]]  accepted your [[amount]] [[currency]] deal.\r\nTitle: [[deal_for]]\r\n\r\nID [[escrow_id]]', '[[username]]  accepted your [[amount]] [[currency]] deal.\r\nTitle: [[deal_for]]\r\n\r\nID [[escrow_id]]', '{\"username\":\"username\",\"amount\":\"amount\",\"currency\":\"currency\",\"deal_for\":\"Escrow Title\",\"escrow_id\":\"\"escrow_id}', 1, 1, 'us', '2021-01-23 05:24:42', '2021-03-18 05:56:41'),
(34, 1, 'REJECTED_DEAL', 'support@binary.com', 'REJECTED DEAL', 'REJECTED DEAL', '[[username]]  rejected your [[amount]] [[currency]] deal.\r\nTitle: [[deal_for]]\r\n\r\nID [[escrow_id]]', '[[username]]  rejected your [[amount]] [[currency]] deal.\r\nTitle: [[deal_for]]\r\n\r\nID [[escrow_id]]', '{\"username\":\"username\",\"amount\":\"amount\",\"currency\":\"currency\",\"deal_for\":\"Escrow Title\",\"escrow_id\":\"\"escrow_id}', 1, 1, 'us', '2021-01-23 05:24:42', '2021-03-18 05:56:41'),
(35, 1, 'RELEASED_DEAL', 'support@binary.com', 'RELEASED DEAL', 'RELEASED DEAL', '[[username]]  released your [[amount]] [[currency]] deal.\r\nTitle: [[deal_for]]\r\n\r\nID [[escrow_id]]', '[[username]]  released your [[amount]] [[currency]] deal.\r\nTitle: [[deal_for]]\r\n\r\nID [[escrow_id]]', '{\"username\":\"username\",\"amount\":\"amount\",\"currency\":\"currency\",\"deal_for\":\"Escrow Title\",\"escrow_id\":\"\"escrow_id}', 1, 1, 'us', '2021-01-23 05:24:42', '2021-03-18 05:56:41'),
(36, 1, 'REPORTED_DEAL', 'support@binary.com', 'REPORTED DEAL', 'REPORTED DEAL', '[[username]]  reported against you for [[amount]] [[currency]] deal.\r\nTitle: [[deal_for]]\r\n\r\nID [[escrow_id]]', '[[username]]  rejected your [[amount]] [[currency]] deal.\r\nTitle: [[deal_for]]\r\n\r\nID [[escrow_id]]', '{\"username\":\"username\",\"amount\":\"amount\",\"currency\":\"currency\",\"deal_for\":\"Escrow Title\",\"escrow_id\":\"\"escrow_id}', 1, 1, 'us', '2021-01-23 05:24:42', '2021-03-18 05:56:41'),
(37, 1, 'RESOLVED_DEAL', 'support@binary.com', 'RESOLVED DEAL', 'RESOLVED DEAL', 'Admin resolved your [[amount]] [[currency]] deal.\r\nTitle: [[deal_for]]\r\n\r\nID [[escrow_id]]', 'Admin resolved your [[amount]] [[currency]] deal.\r\nTitle: [[deal_for]]\r\n\r\nID [[escrow_id]]', '{\"amount\":\"amount\",\"currency\":\"currency\",\"deal_for\":\"Escrow Title\",\"escrow_id\":\"\"escrow_id}', 1, 1, 'us', '2021-01-23 05:24:42', '2021-03-18 05:56:41'),
(38, 1, 'PAYMENT_APPROVED', 'support@binary.com', 'Payment Approved', 'Your Payment Has Been Approved', '[[amount]] [[currency]] Payment Has Been successful via [[gateway_name]]\r\n\r\nCharge[[charge]] [[currency]]\r\n\r\nTranaction [[transaction]]\r\n\r\nYour Main Balance [[remaining_balance]] [[currency]]\r\n\r\n', '[[amount]] [[currency]] Payment Has Been successful via [[gateway_name]]\r\n\r\nCharge[[charge]] [[currency]]\r\n\r\nTranaction [[transaction]]\r\n\r\nYour Main Balance [[remaining_balance]] [[currency]]\r\n\r\n', '{\"gateway_name\":\"gateway name\",\"amount\":\"amount\",\"charge\":\"charge\", \"currency\":\"currency\",\"transaction\":\"transaction\",\"remaining_balance\":\"remaining balance\",\"feedback\":\"Admin Feedback\"}', 1, 1, 'us', '2021-01-23 05:24:42', '2021-01-23 05:48:16'),
(39, 1, 'DEPOSIT_REJECTED', 'support@binary.com', 'Deposit request has been rejected', 'Deposit request has been rejected', '[[amount]] [[currency]] deposit has been rejected\r\n\r\nPayment Method [[method]]\r\nCharge [[charge]] [[currency]]\r\nTransaction [[transaction]]\r\n\r\n', '[[amount]] [[currency]] deposit has been rejected\r\n\r\nPayment Method [[method]]\r\nCharge [[charge]] [[currency]]\r\nTransaction [[transaction]]\r\n\r\n', '{\"method\":\"Payout method\",\"amount\":\"amount\",\"charge\":\"charge\",\"currency\":\"currency\",\"transaction\":\"transaction\",\"feedback\":\"Admin feedback\"}', 1, 1, 'us', '2021-01-23 05:24:42', '2021-01-23 05:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `escrows`
--

CREATE TABLE `escrows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `creator_id` bigint(20) UNSIGNED NOT NULL,
  `joiner_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(11,2) NOT NULL DEFAULT 0.00,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rules` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=> Invited, 1=> Accepted, 2=> Rejected',
  `payment_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=> Hold, 1=> release, 2=> disputed, 3 => resolved',
  `resolved_by` bigint(20) NOT NULL COMMENT 'Admin ID',
  `resolved_at` datetime DEFAULT NULL,
  `invoice` bigint(20) NOT NULL,
  `reported_by` bigint(20) DEFAULT NULL,
  `report` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favor_id` bigint(20) DEFAULT NULL,
  `charge` decimal(11,2) NOT NULL DEFAULT 0.00,
  `charge_bear` enum('invitor','invitee','both','') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'invitor,invitee,both',
  `image` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gateway_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gateway_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `charge` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `rate` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `final_amount` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `btc_amount` decimal(18,8) DEFAULT NULL,
  `btc_wallet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `try` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=> Complete, 2=> Pending, 3 => Cancel',
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_by` int(11) DEFAULT 1,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: inactive, 1: active',
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currencies` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_amount` decimal(18,8) NOT NULL,
  `max_amount` decimal(18,8) NOT NULL,
  `percentage_charge` decimal(11,2) NOT NULL DEFAULT 0.00,
  `fixed_charge` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `convention_rate` decimal(18,8) NOT NULL DEFAULT 1.00000000,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `code`, `name`, `sort_by`, `image`, `status`, `parameters`, `currencies`, `extra_parameters`, `currency`, `symbol`, `min_amount`, `max_amount`, `percentage_charge`, `fixed_charge`, `convention_rate`, `note`, `created_at`, `updated_at`) VALUES
(1, 'paypal', 'Paypal', 14, '5f637b5622d23.jpg', 1, '{\"cleint_id\":\"AUrvcotEVWZkksiGir6Ih4PyalQcguQgGN-7We5O1wBny3tg1w6srbQzi6GQEO8lP3yJVha2C6lyivK9\", \"secret\":\"EPx-YEgvjKDRFFu3FAsMue_iUMbMH6jHu408rHdn4iGrUCM8M12t7mX8hghUBAWwvWErBOa4Uppfp0Eh\"}', '{\"0\":{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"USD\"}}', NULL, 'USD', 'USD', '1.00000000', '10000.00000000', '1.00', '0.50000000', '1.00000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(2, 'stripe', 'Stripe ', 24, '5f645d432b9c0.jpg', 1, '{\"secret_key\":\"sk_test_aat3tzBCCXXBkS4sxY3M8A1B\",\"publishable_key\":\"pk_test_AU3G7doZ1sbdpJLj0NaozPBu\"}', '{\"0\":{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}}', NULL, 'USD', 'USD', '1.00000000', '10000.00000000', '0.00', '0.50000000', '1.00000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(3, 'skrill', 'Skrill', 22, '5f637c7fcb9ef.jpg', 1, '{\"pay_to_email\":\"mig33@gmail.com\",\"secret_key\":\"SECRETKEY\"}', '{\"0\":{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JOD\":\"JOD\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"KWD\":\"KWD\",\"MAD\":\"MAD\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"OMR\":\"OMR\",\"PLN\":\"PLN\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"SAR\":\"SAR\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TND\":\"TND\",\"TRY\":\"TRY\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\",\"COP\":\"COP\"}}', NULL, 'USD', 'USD', '1.00000000', '10000.00000000', '0.00', '0.50000000', '1.00000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(4, 'perfectmoney', 'Perfect Money', 19, '5f64d522d8bea.jpg', 1, '{\"passphrase\":\"3rI7464tfJxhwxNnVCDHWBkyS\",\"payee_account\":\"U32174421\"}', '{\"0\":{\"USD\":\"USD\",\"EUR\":\"EUR\"}}', NULL, 'USD', 'USD', '1.00000000', '10000.00000000', '0.00', '0.50000000', '1.00000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(5, 'paytm', 'PayTM', 16, '5f637cbfb4d4c.jpg', 1, '{\"MID\":\"uAOkSk48844590235401\",\"merchant_key\":\"pcB_oEk_R@kbm1c1\",\"WEBSITE\":\"DIYtestingweb\",\"INDUSTRY_TYPE_ID\":\"Retail\",\"CHANNEL_ID\":\"WEB\",\"transaction_url\":\"https:\\/\\/securegw.paytm.in\\/order\\/process\",\"transaction_status_url\":\"https:\\/\\/securegw.paytm.in\\/order\\/status\"}', '{\"0\":{\"AUD\":\"AUD\",\"ARS\":\"ARS\",\"BDT\":\"BDT\",\"BRL\":\"BRL\",\"BGN\":\"BGN\",\"CAD\":\"CAD\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"COP\":\"COP\",\"HRK\":\"HRK\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EGP\":\"EGP\",\"EUR\":\"EUR\",\"GEL\":\"GEL\",\"GHS\":\"GHS\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"KES\":\"KES\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"MAD\":\"MAD\",\"NPR\":\"NPR\",\"NZD\":\"NZD\",\"NGN\":\"NGN\",\"NOK\":\"NOK\",\"PKR\":\"PKR\",\"PEN\":\"PEN\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"ZAR\":\"ZAR\",\"KRW\":\"KRW\",\"LKR\":\"LKR\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"TRY\":\"TRY\",\"UGX\":\"UGX\",\"UAH\":\"UAH\",\"AED\":\"AED\",\"GBP\":\"GBP\",\"USD\":\"USD\",\"VND\":\"VND\",\"XOF\":\"XOF\"}}', NULL, 'INR', 'INR', '1.00000000', '10000.00000000', '0.00', '0.50000000', '73.30000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(6, 'payeer', 'Payeer', 13, '5f64d52d09e13.jpg', 1, '{\"merchant_id\":\"1142293755\",\"secret_key\":\"1122334455\"}', '{\"0\":{\"USD\":\"USD\",\"EUR\":\"EUR\",\"RUB\":\"RUB\"}}', '{\"status\":\"ipn\"}', 'USD', 'USD', '1.00000000', '10000.00000000', '0.00', '0.50000000', '1.00000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(7, 'paystack', 'PayStack', 15, '5f637d069177e.jpg', 1, '{\"public_key\":\"pk_test_f922aa1a87101e3fd029e13024006862fdc0b8c7\",\"secret_key\":\"sk_test_b8d571f97c1b41d409ba339eb20b005377751dff\"}', '{\"0\":{\"USD\":\"USD\",\"NGN\":\"NGN\"}}', '{\"callback\":\"ipn\",\"webhook\":\"ipn\"}\r\n', 'USD', 'NGN', '1.00000000', '10000.00000000', '0.00', '0.50000000', '1.00000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(8, 'voguepay', 'VoguePay', 23, '5f637d53da3e7.jpg', 1, '{\"merchant_id\":\"9753-0112994\"}', '{\"0\":{\"NGN\":\"NGN\",\"USD\":\"USD\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"ZAR\":\"ZAR\",\"JPY\":\"JPY\",\"INR\":\"INR\",\"AUD\":\"AUD\",\"CAD\":\"CAD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PLN\":\"PLN\"}}\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', NULL, 'USD', 'USD', '1.00000000', '10000.00000000', '0.00', '0.50000000', '1.00000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(9, 'flutterwave', 'Flutterwave', 8, '5f637d6a0b22d.jpg', 1, '{\"public_key\":\"FLWPUBK_TEST-5003321b93b251536fd2e7e05232004f-X\",\"secret_key\":\"FLWSECK_TEST-d604361e2d4962f4bb2a400c5afefab1-X\",\"encryption_key\":\"FLWSECK_TEST817a365e142b\"}', '{\"0\":{\"KES\":\"KES\",\"GHS\":\"GHS\",\"NGN\":\"NGN\",\"USD\":\"USD\",\"GBP\":\"GBP\",\"EUR\":\"EUR\",\"UGX\":\"UGX\",\"TZS\":\"TZS\"}}', NULL, 'USD', 'USD', '1.00000000', '10000.00000000', '5.00', '0.50000000', '1.00000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(10, 'razorpay', 'RazorPay', 20, '5f637d80b68e0.jpg', 1, '{\"key_id\":\"rzp_test_kiOtejPbRZU90E\",\"key_secret\":\"osRDebzEqbsE1kbyQJ4y0re7\"}', '{\"0\": {\"INR\": \"INR\"}}', NULL, 'INR', 'INR', '1.00000000', '10000.00000000', '0.00', '0.50000000', '73.30000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(11, 'instamojo', 'instamojo', 9, '5f637da3c44d2.jpg', 1, '{\"api_key\":\"test_2241633c3bc44a3de84a3b33969\",\"auth_token\":\"test_279f083f7bebefd35217feef22d\",\"salt\":\"19d38908eeff4f58b2ddda2c6d86ca25\"}', '{\"0\":{\"INR\":\"INR\"}}', NULL, 'INR', 'INR', '1.00000000', '10000.00000000', '0.00', '0.50000000', '73.51000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(12, 'mollie', 'Mollie', 11, '5f637db537958.jpg', 1, '{\"api_key\":\"test_cucfwKTWfft9s337qsVfn5CC4vNkrn\"}', '{\"0\":{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\"}}', NULL, 'USD', 'USD', '1.00000000', '10000.00000000', '0.00', '0.50000000', '1.00000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(13, 'twocheckout', '2checkout', 25, '5f637e7eae68b.jpg', 1, '{\"merchant_code\":\"250507228545\",\"secret_key\":\"=+0CNzfvTItqp*ygwiQE\"}', '{\"0\":{\"AFN\":\"AFN\",\"ALL\":\"ALL\",\"DZD\":\"DZD\",\"ARS\":\"ARS\",\"AUD\":\"AUD\",\"AZN\":\"AZN\",\"BSD\":\"BSD\",\"BDT\":\"BDT\",\"BBD\":\"BBD\",\"BZD\":\"BZD\",\"BMD\":\"BMD\",\"BOB\":\"BOB\",\"BWP\":\"BWP\",\"BRL\":\"BRL\",\"GBP\":\"GBP\",\"BND\":\"BND\",\"BGN\":\"BGN\",\"CAD\":\"CAD\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"COP\":\"COP\",\"CRC\":\"CRC\",\"HRK\":\"HRK\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"DOP\":\"DOP\",\"XCD\":\"XCD\",\"EGP\":\"EGP\",\"EUR\":\"EUR\",\"FJD\":\"FJD\",\"GTQ\":\"GTQ\",\"HKD\":\"HKD\",\"HNL\":\"HNL\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"JMD\":\"JMD\",\"JPY\":\"JPY\",\"KZT\":\"KZT\",\"KES\":\"KES\",\"LAK\":\"LAK\",\"MMK\":\"MMK\",\"LBP\":\"LBP\",\"LRD\":\"LRD\",\"MOP\":\"MOP\",\"MYR\":\"MYR\",\"MVR\":\"MVR\",\"MRO\":\"MRO\",\"MUR\":\"MUR\",\"MXN\":\"MXN\",\"MAD\":\"MAD\",\"NPR\":\"NPR\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NIO\":\"NIO\",\"NOK\":\"NOK\",\"PKR\":\"PKR\",\"PGK\":\"PGK\",\"PEN\":\"PEN\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"WST\":\"WST\",\"SAR\":\"SAR\",\"SCR\":\"SCR\",\"SGD\":\"SGD\",\"SBD\":\"SBD\",\"ZAR\":\"ZAR\",\"KRW\":\"KRW\",\"LKR\":\"LKR\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"SYP\":\"SYP\",\"THB\":\"THB\",\"TOP\":\"TOP\",\"TTD\":\"TTD\",\"TRY\":\"TRY\",\"UAH\":\"UAH\",\"AED\":\"AED\",\"USD\":\"USD\",\"VUV\":\"VUV\",\"VND\":\"VND\",\"XOF\":\"XOF\",\"YER\":\"YER\"}}', '{\"approved_url\":\"ipn\"}', 'USD', 'USD', '1.00000000', '10000.00000000', '0.00', '0.50000000', '1.00000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(14, 'authorizenet', 'Authorize.Net', 1, '5f637de6d9fef.jpg', 1, '{\"login_id\":\"35s2ZJWTh2\",\"current_transaction_key\":\"3P425sHVwE8t2CzX\"}', '{\"0\":{\"AUD\":\"AUD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"USD\":\"USD\"}}', NULL, 'USD', 'USD', '1.00000000', '10000.00000000', '0.00', '0.50000000', '1.00000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(15, 'securionpay', 'SecurionPay', 21, '5f637e002d11b.jpg', 1, '{\"public_key\":\"pk_test_VZEUdaL8fYjBVbDOSkPFcgE0\",\"secret_key\":\"sk_test_yd5JJnYpsEoKtlaXDBkAFpse\"}', '{\"0\":{\"AFN\":\"AFN\", \"DZD\":\"DZD\", \"ARS\":\"ARS\", \"AUD\":\"AUD\", \"BHD\":\"BHD\", \"BDT\":\"BDT\", \"BYR\":\"BYR\", \"BAM\":\"BAM\", \"BWP\":\"BWP\", \"BRL\":\"BRL\", \"BND\":\"BND\", \"BGN\":\"BGN\", \"CAD\":\"CAD\", \"CLP\":\"CLP\", \"CNY\":\"CNY\", \"COP\":\"COP\", \"KMF\":\"KMF\", \"HRK\":\"HRK\", \"CZK\":\"CZK\", \"DKK\":\"DKK\", \"DJF\":\"DJF\", \"DOP\":\"DOP\", \"EGP\":\"EGP\", \"ETB\":\"ETB\", \"ERN\":\"ERN\", \"EUR\":\"EUR\", \"GEL\":\"GEL\", \"HKD\":\"HKD\", \"HUF\":\"HUF\", \"ISK\":\"ISK\", \"INR\":\"INR\", \"IDR\":\"IDR\", \"IRR\":\"IRR\", \"IQD\":\"IQD\", \"ILS\":\"ILS\", \"JMD\":\"JMD\", \"JPY\":\"JPY\", \"JOD\":\"JOD\", \"KZT\":\"KZT\", \"KES\":\"KES\", \"KWD\":\"KWD\", \"KGS\":\"KGS\", \"LVL\":\"LVL\", \"LBP\":\"LBP\", \"LTL\":\"LTL\", \"MOP\":\"MOP\", \"MKD\":\"MKD\", \"MGA\":\"MGA\", \"MWK\":\"MWK\", \"MYR\":\"MYR\", \"MUR\":\"MUR\", \"MXN\":\"MXN\", \"MDL\":\"MDL\", \"MAD\":\"MAD\", \"MZN\":\"MZN\", \"NAD\":\"NAD\", \"NPR\":\"NPR\", \"ANG\":\"ANG\", \"NZD\":\"NZD\", \"NOK\":\"NOK\", \"OMR\":\"OMR\", \"PKR\":\"PKR\", \"PEN\":\"PEN\", \"PHP\":\"PHP\", \"PLN\":\"PLN\", \"QAR\":\"QAR\", \"RON\":\"RON\", \"RUB\":\"RUB\", \"SAR\":\"SAR\", \"RSD\":\"RSD\", \"SGD\":\"SGD\", \"ZAR\":\"ZAR\", \"KRW\":\"KRW\", \"IKR\":\"IKR\", \"LKR\":\"LKR\", \"SEK\":\"SEK\", \"CHF\":\"CHF\", \"SYP\":\"SYP\", \"TWD\":\"TWD\", \"TZS\":\"TZS\", \"THB\":\"THB\", \"TND\":\"TND\", \"TRY\":\"TRY\", \"UAH\":\"UAH\", \"AED\":\"AED\", \"GBP\":\"GBP\", \"USD\":\"USD\", \"VEB\":\"VEB\", \"VEF\":\"VEF\", \"VND\":\"VND\", \"XOF\":\"XOF\", \"YER\":\"YER\", \"ZMK\":\"ZMK\"}}', NULL, 'USD', 'USD', '1.00000000', '10000.00000000', '0.00', '0.50000000', '1.00000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(16, 'payumoney', 'PayUmoney', 18, '5f6390dbaa6ff.jpg', 1, '{\"merchant_key\":\"gtKFFx\",\"salt\":\"eCwWELxi\"}', '{\"0\":{\"INR\":\"INR\"}}', NULL, 'INR', 'INR', '1.00000000', '10000.00000000', '0.00', '0.50000000', '73.30000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(17, 'mercadopago', 'Mercado Pago', 10, '5f645d1bc1f24.jpg', 1, '{\"access_token\":\"TEST-705032440135962-041006-ad2e021853f22338fe1a4db9f64d1491-421886156\"}', '{\"0\":{\"ARS\":\"ARS\",\"BOB\":\"BOB\",\"BRL\":\"BRL\",\"CLF\":\"CLF\",\"CLP\":\"CLP\",\"COP\":\"COP\",\"CRC\":\"CRC\",\"CUC\":\"CUC\",\"CUP\":\"CUP\",\"DOP\":\"DOP\",\"EUR\":\"EUR\",\"GTQ\":\"GTQ\",\"HNL\":\"HNL\",\"MXN\":\"MXN\",\"NIO\":\"NIO\",\"PAB\":\"PAB\",\"PEN\":\"PEN\",\"PYG\":\"PYG\",\"USD\":\"USD\",\"UYU\":\"UYU\",\"VEF\":\"VEF\",\"VES\":\"VES\"}}', NULL, 'BRL', 'BRL', '3715.12000000', '371500000.12000000', '0.00', '0.50000000', '0.06300000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(18, 'coingate', 'Coingate', 7, '5f659e5355859.jpg', 1, '{\"api_key\":\"Ba1VgPx6d437xLXGKCBkmwVCEw5kHzRJ6thbGo-N\"}', '{\"0\":{\"USD\":\"USD\",\"EUR\":\"EUR\"}}', NULL, 'USD', 'USD', '1.00000000', '10000.00000000', '0.00', '0.50000000', '1.00000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(19, 'coinbasecommerce', 'Coinbase Commerce', 3, '5f6703145a5ca.jpg', 1, '{\"api_key\":\"c71152b8-ab4e-4712-a421-c5c7ea5165a2\",\"secret\":\"a709d081-e693-46e0-8a34-61fd785b20b3\"}', '{\"0\":{\"AED\":\"AED\",\"AFN\":\"AFN\",\"ALL\":\"ALL\",\"AMD\":\"AMD\",\"ANG\":\"ANG\",\"AOA\":\"AOA\",\"ARS\":\"ARS\",\"AUD\":\"AUD\",\"AWG\":\"AWG\",\"AZN\":\"AZN\",\"BAM\":\"BAM\",\"BBD\":\"BBD\",\"BDT\":\"BDT\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"BIF\":\"BIF\",\"BMD\":\"BMD\",\"BND\":\"BND\",\"BOB\":\"BOB\",\"BRL\":\"BRL\",\"BSD\":\"BSD\",\"BTN\":\"BTN\",\"BWP\":\"BWP\",\"BYN\":\"BYN\",\"BZD\":\"BZD\",\"CAD\":\"CAD\",\"CDF\":\"CDF\",\"CHF\":\"CHF\",\"CLF\":\"CLF\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"COP\":\"COP\",\"CRC\":\"CRC\",\"CUC\":\"CUC\",\"CUP\":\"CUP\",\"CVE\":\"CVE\",\"CZK\":\"CZK\",\"DJF\":\"DJF\",\"DKK\":\"DKK\",\"DOP\":\"DOP\",\"DZD\":\"DZD\",\"EGP\":\"EGP\",\"ERN\":\"ERN\",\"ETB\":\"ETB\",\"EUR\":\"EUR\",\"FJD\":\"FJD\",\"FKP\":\"FKP\",\"GBP\":\"GBP\",\"GEL\":\"GEL\",\"GGP\":\"GGP\",\"GHS\":\"GHS\",\"GIP\":\"GIP\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"GTQ\":\"GTQ\",\"GYD\":\"GYD\",\"HKD\":\"HKD\",\"HNL\":\"HNL\",\"HRK\":\"HRK\",\"HTG\":\"HTG\",\"HUF\":\"HUF\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"IMP\":\"IMP\",\"INR\":\"INR\",\"IQD\":\"IQD\",\"IRR\":\"IRR\",\"ISK\":\"ISK\",\"JEP\":\"JEP\",\"JMD\":\"JMD\",\"JOD\":\"JOD\",\"JPY\":\"JPY\",\"KES\":\"KES\",\"KGS\":\"KGS\",\"KHR\":\"KHR\",\"KMF\":\"KMF\",\"KPW\":\"KPW\",\"KRW\":\"KRW\",\"KWD\":\"KWD\",\"KYD\":\"KYD\",\"KZT\":\"KZT\",\"LAK\":\"LAK\",\"LBP\":\"LBP\",\"LKR\":\"LKR\",\"LRD\":\"LRD\",\"LSL\":\"LSL\",\"LYD\":\"LYD\",\"MAD\":\"MAD\",\"MDL\":\"MDL\",\"MGA\":\"MGA\",\"MKD\":\"MKD\",\"MMK\":\"MMK\",\"MNT\":\"MNT\",\"MOP\":\"MOP\",\"MRO\":\"MRO\",\"MUR\":\"MUR\",\"MVR\":\"MVR\",\"MWK\":\"MWK\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"MZN\":\"MZN\",\"NAD\":\"NAD\",\"NGN\":\"NGN\",\"NIO\":\"NIO\",\"NOK\":\"NOK\",\"NPR\":\"NPR\",\"NZD\":\"NZD\",\"OMR\":\"OMR\",\"PAB\":\"PAB\",\"PEN\":\"PEN\",\"PGK\":\"PGK\",\"PHP\":\"PHP\",\"PKR\":\"PKR\",\"PLN\":\"PLN\",\"PYG\":\"PYG\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"RUB\":\"RUB\",\"RWF\":\"RWF\",\"SAR\":\"SAR\",\"SBD\":\"SBD\",\"SCR\":\"SCR\",\"SDG\":\"SDG\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"SHP\":\"SHP\",\"SLL\":\"SLL\",\"SOS\":\"SOS\",\"SRD\":\"SRD\",\"SSP\":\"SSP\",\"STD\":\"STD\",\"SVC\":\"SVC\",\"SYP\":\"SYP\",\"SZL\":\"SZL\",\"THB\":\"THB\",\"TJS\":\"TJS\",\"TMT\":\"TMT\",\"TND\":\"TND\",\"TOP\":\"TOP\",\"TRY\":\"TRY\",\"TTD\":\"TTD\",\"TWD\":\"TWD\",\"TZS\":\"TZS\",\"UAH\":\"UAH\",\"UGX\":\"UGX\",\"USD\":\"USD\",\"UYU\":\"UYU\",\"UZS\":\"UZS\",\"VEF\":\"VEF\",\"VND\":\"VND\",\"VUV\":\"VUV\",\"WST\":\"WST\",\"XAF\":\"XAF\",\"XAG\":\"XAG\",\"XAU\":\"XAU\",\"XCD\":\"XCD\",\"XDR\":\"XDR\",\"XOF\":\"XOF\",\"XPD\":\"XPD\",\"XPF\":\"XPF\",\"XPT\":\"XPT\",\"YER\":\"YER\",\"ZAR\":\"ZAR\",\"ZMW\":\"ZMW\",\"ZWL\":\"ZWL\"}}', NULL, 'USD', 'USD', '1.00000000', '10000.00000000', '0.00', '0.50000000', '1.00000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(20, 'monnify', 'Monnify', 12, '5fbca5d05057f.jpg', 1, '{\"api_key\":\"MK_TEST_LB5KJDYD65\",\"secret_key\":\"WM9B4GSW826XRCNABM3NF92K9957CVMU\", \"contract_code\":\"5566252118\"}', '{\"0\":{\"NGN\":\"NGN\"}}', NULL, 'NGN', 'NGN', '1.00000000', '10000.00000000', '0.00', '0.50000000', '408.52000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(21, 'blockio', 'Block.io', 2, '5fe038332ad52.jpg', 1, '{\"api_key\":\"1d97-a9af-6521-a330\",\"api_pin\":\"654abc654opp\"}', '{\"1\":{\"BTC\":\"BTC\",\"LTC\":\"LTC\",\"DOGE\":\"DOGE\"}}', '{\"cron\":\"ipn\"}', 'BTC', 'BTC', '10.10000000', '10000.00000000', '0.00', '0.50000000', '1.00000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(22, 'coinpayments', 'CoinPayments', 6, '5ffd7d962985e1610448278.jpg', 1, '{\"merchant_id\":\"93a1e014c4ad60a7980b4a7239673cb4\"}', '{\"0\":{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\"},\"1\":{\"BTC\":\"Bitcoin\",\"BTC.LN\":\"Bitcoin (Lightning Network)\",\"LTC\":\"Litecoin\",\"CPS\":\"CPS Coin\",\"VLX\":\"Velas\",\"APL\":\"Apollo\",\"AYA\":\"Aryacoin\",\"BAD\":\"Badcoin\",\"BCD\":\"Bitcoin Diamond\",\"BCH\":\"Bitcoin Cash\",\"BCN\":\"Bytecoin\",\"BEAM\":\"BEAM\",\"BITB\":\"Bean Cash\",\"BLK\":\"BlackCoin\",\"BSV\":\"Bitcoin SV\",\"BTAD\":\"Bitcoin Adult\",\"BTG\":\"Bitcoin Gold\",\"BTT\":\"BitTorrent\",\"CLOAK\":\"CloakCoin\",\"CLUB\":\"ClubCoin\",\"CRW\":\"Crown\",\"CRYP\":\"CrypticCoin\",\"CRYT\":\"CryTrExCoin\",\"CURE\":\"CureCoin\",\"DASH\":\"DASH\",\"DCR\":\"Decred\",\"DEV\":\"DeviantCoin\",\"DGB\":\"DigiByte\",\"DOGE\":\"Dogecoin\",\"EBST\":\"eBoost\",\"EOS\":\"EOS\",\"ETC\":\"Ether Classic\",\"ETH\":\"Ethereum\",\"ETN\":\"Electroneum\",\"EUNO\":\"EUNO\",\"EXP\":\"EXP\",\"Expanse\":\"Expanse\",\"FLASH\":\"FLASH\",\"GAME\":\"GameCredits\",\"GLC\":\"Goldcoin\",\"GRS\":\"Groestlcoin\",\"KMD\":\"Komodo\",\"LOKI\":\"LOKI\",\"LSK\":\"LSK\",\"MAID\":\"MaidSafeCoin\",\"MUE\":\"MonetaryUnit\",\"NAV\":\"NAV Coin\",\"NEO\":\"NEO\",\"NMC\":\"Namecoin\",\"NVST\":\"NVO Token\",\"NXT\":\"NXT\",\"OMNI\":\"OMNI\",\"PINK\":\"PinkCoin\",\"PIVX\":\"PIVX\",\"POT\":\"PotCoin\",\"PPC\":\"Peercoin\",\"PROC\":\"ProCurrency\",\"PURA\":\"PURA\",\"QTUM\":\"QTUM\",\"RES\":\"Resistance\",\"RVN\":\"Ravencoin\",\"RVR\":\"RevolutionVR\",\"SBD\":\"Steem Dollars\",\"SMART\":\"SmartCash\",\"SOXAX\":\"SOXAX\",\"STEEM\":\"STEEM\",\"STRAT\":\"STRAT\",\"SYS\":\"Syscoin\",\"TPAY\":\"TokenPay\",\"TRIGGERS\":\"Triggers\",\"TRX\":\" TRON\",\"UBQ\":\"Ubiq\",\"UNIT\":\"UniversalCurrency\",\"USDT\":\"Tether USD (Omni Layer)\",\"VTC\":\"Vertcoin\",\"WAVES\":\"Waves\",\"XCP\":\"Counterparty\",\"XEM\":\"NEM\",\"XMR\":\"Monero\",\"XSN\":\"Stakenet\",\"XSR\":\"SucreCoin\",\"XVG\":\"VERGE\",\"XZC\":\"ZCoin\",\"ZEC\":\"ZCash\",\"ZEN\":\"Horizen\"}}', NULL, 'BTC', 'BTC', '10.00000000', '99999.00000000', '1.00', '0.50000000', '0.00000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(23, 'blockchain', 'Blockchain', 4, '5fe439f477bb7.jpg', 1, '{\"api_key\":\"8df2e5a0-3798-4b74-871d-973615b57e7b\",\"xpub_code\":\"xpub6CXLqfWXj1xgXe79nEQb3pv2E7TGD13pZgHceZKrQAxqXdrC2FaKuQhm5CYVGyNcHLhSdWau4eQvq3EDCyayvbKJvXa11MX9i2cHPugpt3G\"}', '{\"1\":{\"BTC\":\"BTC\"}}', NULL, 'BTC', 'BTC', '100.00000000', '10000.00000000', '0.00', '0.50000000', '1.00000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(24, 'cashmaal', 'Cashmaal', 5, 'cashmaal.jpg', 1, '{\"web_id\": \"3748\",\"ipn_key\": \"546254628759524554647987\"}\r\n', '{\"0\":{\"PKR\":\"PKR\",\"USD\":\"USD\"}}', '{\"ipn_url\":\"ipn\"}', 'PKR', 'PKR', '100.00000000', '10000.00000000', '0.00', '0.50000000', '0.85000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:31:48'),
(25, 'paythrow', 'PayThrow', 17, '60d57a34ba6581624603188.jpg', 1, '{\"client_id\":\"mAoObRUVPWGr4iM6KNz0AagUJaRHlv\", \"client_secret\":\"x0uyby7BCT95Kdl9q5PaqG9DLscPVZxb9ciqCnfoU7QRfhTUeWgXjHJMbRRAkpJwCGztIdN1FVzFYlEoD6Nb43Oe9miSRizPs1Kl\"}', '{\"0\":{\"PKR\":\"PKR\",\"USD\":\"USD\"}}', '{\"ipn_url\":\"ipn\"}', 'USD', 'USD', '100.00000000', '10000.00000000', '0.00', '0.50000000', '157.96000000', NULL, '2020-09-10 09:05:02', '2021-06-25 00:39:48'),
(1000, 'mobile-money', 'Mobile Money', 1, '60d80ca93cf3f1624771753.png', 1, '{\"bill_payment\":{\"field_name\":\"bill_payment\",\"field_level\":\"Bill Payment\",\"type\":\"file\",\"validation\":\"required\"},\"transaction__number\":{\"field_name\":\"transaction__number\",\"field_level\":\"Transaction  Number\",\"type\":\"text\",\"validation\":\"required\"},\"bank_address\":{\"field_name\":\"bank_address\",\"field_level\":\"Bank Address\",\"type\":\"textarea\",\"validation\":\"nullable\"},\"nid\":{\"field_name\":\"nid\",\"field_level\":\"Nid\",\"type\":\"text\",\"validation\":\"required\"}}', NULL, NULL, 'NGN', 'NGN', '10.00000000', '10000.00000000', '2.00', '2.00000000', '411.50000000', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><br></div>', '2021-06-26 22:54:52', '2021-06-26 23:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_name` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = active, 0 = inactive',
  `rtl` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `short_name`, `flag`, `is_active`, `rtl`, `created_at`, `updated_at`) VALUES
(20, 'English', 'US', NULL, 1, 0, '2021-06-01 07:41:56', '2021-06-01 07:41:56'),
(21, 'Espain', 'ES', NULL, 1, 0, '2021-06-15 04:01:39', '2021-06-15 04:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_09_29_074810_create_jobs_table', 1),
(32, '2020_11_12_075639_create_transactions_table', 6),
(36, '2020_10_14_113046_create_admins_table', 9),
(42, '2020_11_24_064711_create_email_templates_table', 11),
(48, '2014_10_12_000000_create_users_table', 13),
(51, '2020_09_16_103709_create_controls_table', 15),
(59, '2021_01_03_061604_create_tickets_table', 17),
(60, '2021_01_03_061834_create_ticket_messages_table', 18),
(61, '2021_01_03_065607_create_ticket_attachments_table', 18),
(62, '2021_01_07_095019_create_funds_table', 19),
(66, '2021_01_21_050226_create_languages_table', 21),
(69, '2020_12_17_075238_create_sms_controls_table', 23),
(70, '2021_01_26_051716_create_site_notifications_table', 24),
(72, '2021_01_26_075451_create_notify_templates_table', 25),
(73, '2021_01_28_074544_create_contents_table', 26),
(74, '2021_01_28_074705_create_content_details_table', 26),
(75, '2021_01_28_074829_create_content_media_table', 26),
(76, '2021_01_28_074847_create_templates_table', 26),
(77, '2021_01_28_074905_create_template_media_table', 26),
(83, '2021_02_03_100945_create_subscribers_table', 27),
(86, '2021_01_21_101641_add_language_to_email_templates_table', 28),
(90, '2021_03_13_132414_create_payout_methods_table', 31),
(91, '2021_03_13_133534_create_payout_logs_table', 32),
(93, '2021_03_18_091710_create_referral_bonuses_table', 33),
(95, '2021_06_08_061111_create_contacts_table', 34),
(96, '2021_06_09_085309_create_escrows_table', 35),
(97, '2021_06_10_183014_create_chat_notifications_table', 36),
(98, '2021_06_17_064637_create_configures_table', 37);

-- --------------------------------------------------------

--
-- Table structure for table `notify_templates`
--

CREATE TABLE `notify_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_keys` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `notify_for` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=> Admin, 0=> User',
  `lang_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notify_templates`
--

INSERT INTO `notify_templates` (`id`, `language_id`, `name`, `template_key`, `body`, `short_keys`, `status`, `notify_for`, `lang_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'SUPPORT TICKET CREATE', 'SUPPORT_TICKET_CREATE', '[[username]] create a ticket\r\nTicket : [[ticket_id]]\r\n\r\n', '{\"ticket_id\":\"Support Ticket ID\",\"username\":\"username\"}', 1, 1, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36'),
(2, 1, 'SUPPORT TICKET REPLIED', 'SUPPORT_TICKET_REPLIED', '[[username]] replied  ticket\r\nTicket : [[ticket_id]]\r\n\r\n', '{\"ticket_id\":\"Support Ticket ID\",\"username\":\"username\"}', 1, 1, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36'),
(3, 1, 'ADMIN REPLIED SUPPORT TICKET ', 'ADMIN_REPLIED_TICKET', 'Admin replied  \r\nTicket : [[ticket_id]]', '{\"ticket_id\":\"Support Ticket ID\"}', 1, 0, 'en', '2021-01-26 04:14:36', '2021-01-26 05:37:30'),
(4, 1, 'ADMIN DEPOSIT NOTIFICATION', 'PAYMENT_COMPLETE', '[[username]] deposited [[amount]] [[currency]] via [[gateway]]\r\n', '{\"gateway\":\"gateway\",\"amount\":\"amount\",\"currency\":\"currency\",\"username\":\"username\"}', 1, 1, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36'),
(5, 1, 'ADD BALANCE', 'ADD_BALANCE', '[[amount]] [[currency]] credited in your account. \r\nYour Current Balance [[main_balance]][[currency]]\r\nTransaction: #[[transaction]]', '{\"transaction\":\"Transaction Number\",\"amount\":\"Request Amount By Admin\",\"currency\":\"Site Currency\", \"main_balance\":\"Users Balance After this operation\"}', 1, 0, 'en', '2021-01-26 04:14:36', '2021-01-26 05:37:30'),
(6, 1, 'DEDUCTED BALANCE', 'DEDUCTED_BALANCE', '[[amount]] [[currency]] debited in your account.\r\nYour Current Balance [[main_balance]][[currency]]\r\nTransaction: #[[transaction]]', '{\"transaction\":\"Transaction Number\",\"amount\":\"Request Amount By Admin\",\"currency\":\"Site Currency\", \"main_balance\":\"Users Balance After this operation\"}', 1, 0, 'en', '2021-01-26 04:14:36', '2021-01-26 05:37:30'),
(7, 1, 'NEW USER ADDED', 'ADDED_USER', '[[username]] has been joined\r\n\r\n', '{\"username\":\"username\"}', 1, 1, 'en', '2021-01-26 04:14:36', '2021-01-26 05:37:30'),
(17, 1, 'WITHDRAW REQUEST NOTIFICATION TO ADMIN', 'PAYOUT_REQUEST', '[[username]] withdraw requested by [[amount]] [[currency]] \r\n\r\n', '{\"amount\":\"amount\",\"currency\":\"currency\",\"username\":\"username\"}', 1, 1, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36'),
(19, 1, 'PAYOUT REJECTED ', 'PAYOUT_REJECTED', '[[amount]] [[currency]]  withdraw requested has been rejected\r\n\r\n', '{\"amount\":\"amount\",\"currency\":\"currency\"}', 1, 1, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36'),
(20, 1, 'PAYOUT APPROVE ', 'PAYOUT_APPROVE ', '[[amount]] [[currency]]  withdraw requested has been approved\r\n\r\n', '{\"amount\":\"amount\",\"currency\":\"currency\"}', 1, 1, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36'),
(22, 1, 'SENT FRIEND REQUEST', 'SENT_FRIEND_REQUEST', '[[username]] wanted to join with you\r\n', '{\"username\":\"username\"}', 1, 0, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36'),
(23, 1, 'ACCEPT FRIEND REQUEST', 'ACCEPT_FRIEND_REQUEST', '[[username]] accept your request.', '{\"username\":\"username\"}', 1, 0, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36'),
(24, 1, 'CANCEL FRIEND REQUEST', 'CANCEL_FRIEND_REQUEST', '[[username]] has been cancel your request.', '{\"username\":\"username\"}', 1, 0, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36'),
(25, 1, 'INVITE TO JOIN NEW DEAL', 'INVITE_TO_JOIN_DEAL', '[[username]] requested to you for accept [[amount]] [[currency]] deal.', '{\"username\":\"username\",\"amount\":\"amount\",\"currency\":\"currency\"}', 1, 0, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36'),
(26, 1, 'ACCEPTED DEAL', 'ACCEPTED_DEAL', '[[username]]  accepted your [[amount]] [[currency]] deal.', '{\"username\":\"username\",\"amount\":\"amount\",\"currency\":\"currency\"}', 1, 0, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36'),
(27, 1, 'REJECTED DEAL', 'REJECTED_DEAL', '[[username]]  rejected your [[amount]] [[currency]] deal.', '{\"username\":\"username\",\"amount\":\"amount\",\"currency\":\"currency\"}', 1, 0, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36'),
(28, 1, 'RELEASED DEAL', 'RELEASED_DEAL', '[[username]]  release your deal [[amount]] [[currency]] . Escrow ID: [[escrow_id]]', '{\"username\":\"username\",\"amount\":\"amount\",\"currency\":\"currency\",\"escrow_id\":\"Invoice No\"}', 1, 0, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36'),
(29, 1, 'REPORTED DEAL', 'REPORTED_DEAL', '[[username]]  reported against you for Escrow ID: [[escrow_id]]', '{\"username\":\"username\",\"escrow_id\":\"Invoice No\"}', 1, 0, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36'),
(30, 1, 'FOR ADMIN ESCROW REPORT NOTIFICATION', 'REPORT_TO_ADMIN', '[[username]] reported against a escrow.\r\nEscrow Id [[escrow_id]]\r\n', '{\"escrow_id\":\"Invoice\",\"amount\":\"amount\",\"currency\":\"currency\",\"username\":\"username\"}', 1, 1, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36'),
(31, 1, 'RESOLVED_DEAL', 'RESOLVED_DEAL', 'Admin resolved your deal [[amount]] [[currency]] . Escrow ID: [[escrow_id]]', '{\"amount\":\"amount\",\"currency\":\"currency\",\"escrow_id\":\"Invoice No\"}', 1, 0, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36'),
(32, 21, 'CANCEL FRIEND REQUEST', 'CANCEL_FRIEND_REQUEST', '[[username]] has been cancel your request.', '{\"username\":\"username\"}', 1, 0, 'ES', '2021-06-21 03:13:46', '2021-06-21 03:13:46'),
(33, 20, 'CANCEL FRIEND REQUEST', 'CANCEL_FRIEND_REQUEST', '[[username]] has been cancel your request.', '{\"username\":\"username\"}', 1, 0, 'US', '2021-06-21 03:13:46', '2021-06-21 03:13:46'),
(34, 1, 'ADMIN DEPOSIT REUQEST NOTIFICATION', 'DEPOSIT_REQUEST', '[[username]] requested to deposit [[amount]] [[currency]] via [[gateway]]\r\n', '{\"gateway\":\"gateway\",\"amount\":\"amount\",\"currency\":\"currency\",\"username\":\"username\"}', 1, 1, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36'),
(35, 1, 'PAYMENT APPROVED', 'PAYMENT_APPROVED', '[[amount]] [[currency]]  deposit requested has been approved\r\n\r\n', '{\"amount\":\"amount\",\"currency\":\"currency\"}', 1, 1, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36'),
(36, 1, 'DEPOSIT REJECTED', 'DEPOSIT_REJECTED', '[[amount]] [[currency]]  deposit has been rejected\r\n\r\n', '{\"amount\":\"amount\",\"currency\":\"currency\"}', 1, 1, NULL, '2021-01-26 04:14:36', '2021-01-26 04:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payout_logs`
--

CREATE TABLE `payout_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `method_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT NULL,
  `charge` decimal(11,2) DEFAULT NULL,
  `net_amount` decimal(11,2) DEFAULT NULL,
  `information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=> pending, 2=> success, 3=> cancel,',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payout_methods`
--

CREATE TABLE `payout_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_amount` decimal(11,2) DEFAULT NULL,
  `maximum_amount` decimal(11,2) DEFAULT NULL,
  `fixed_charge` decimal(11,2) DEFAULT NULL,
  `percent_charge` decimal(11,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `input_form` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payout_methods`
--

INSERT INTO `payout_methods` (`id`, `name`, `image`, `minimum_amount`, `maximum_amount`, `fixed_charge`, `percent_charge`, `status`, `input_form`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'Wire Transfer', '606418e821ad01617172712.jpg', '20.00', '2000.00', '10.00', '0.00', 1, '{\"email\":{\"field_name\":\"email\",\"field_level\":\"Email\",\"type\":\"text\",\"validation\":\"required\"},\"bank_address\":{\"field_name\":\"bank_address\",\"field_level\":\"Bank Address\",\"type\":\"textarea\",\"validation\":\"required\"}}', '1-2 Hours', '2021-03-14 06:45:21', '2021-06-16 13:40:36'),
(2, 'Bank Transfer', '6064181b137c91617172507.jpg', '10.00', '100.00', '10.00', '1.00', 1, '{\"bank_name\":{\"field_name\":\"bank_name\",\"field_level\":\"Bank Name\",\"type\":\"text\",\"validation\":\"required\"},\"transaction__number\":{\"field_name\":\"transaction__number\",\"field_level\":\"Transaction  Number\",\"type\":\"text\",\"validation\":\"required\"}}', '1-2 hours maximum', '2021-03-14 02:16:04', '2021-06-16 13:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `site_notifications`
--

CREATE TABLE `site_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_notificational_id` bigint(20) NOT NULL,
  `site_notificational_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_notifications`
--

INSERT INTO `site_notifications` (`id`, `site_notificational_id`, `site_notificational_type`, `description`, `created_at`, `updated_at`) VALUES
(3, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/sideapp\\/admin\\/user\\/fundLog\\/1\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"demouser deposited 10000 USD via Stripe \\r\\n\"}', '2021-06-16 08:12:43', '2021-06-16 08:12:43'),
(9, 6, 'App\\Models\\User', '{\"icon\":\"fa fa-money-bill-alt\",\"text\":\"demouser requested to you for accept 100 $ deal.\"}', '2021-06-16 08:21:04', '2021-06-16 08:21:04'),
(10, 5, 'App\\Models\\User', '{\"icon\":\"fa fa-money-bill-alt\",\"text\":\"demouser requested to you for accept 100 $ deal.\"}', '2021-06-16 08:26:48', '2021-06-16 08:26:48'),
(12, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/sideapp\\/admin\\/user\\/fundLog\\/2\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"immanuel deposited 1000 USD via Stripe \\r\\n\"}', '2021-06-16 11:55:02', '2021-06-16 11:55:02'),
(19, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/sideapp\\/admin\\/escrow\\/details\\/8\",\"icon\":\"fab fa-hire-a-helper text-white\",\"text\":\"immanuel reported against a escrow.\\r\\nEscrow Id 90116802\\r\\n\"}', '2021-06-16 12:00:15', '2021-06-16 12:00:15'),
(27, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/sideapp\\/admin\\/user\\/fundLog\\/4\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"brakus deposited 300 USD via Stripe \\r\\n\"}', '2021-06-16 13:02:40', '2021-06-16 13:02:40'),
(40, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/sideapp\\/admin\\/escrow\\/details\\/1\",\"icon\":\"fab fa-hire-a-helper text-white\",\"text\":\"zrunolfsson reported against a escrow.\\r\\nEscrow Id 41602163\\r\\n\"}', '2021-06-16 13:20:58', '2021-06-16 13:20:58'),
(42, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/sideapp\\/admin\\/user\\/payoutLog\\/1\",\"icon\":\"fa fa-money-bill-alt \",\"text\":\"demouser withdraw requested by 200 USD \\r\\n\\r\\n\"}', '2021-06-16 13:41:12', '2021-06-16 13:41:12'),
(44, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/sideapp\\/admin\\/user\\/payoutLog\\/1\",\"icon\":\"fa fa-money-bill-alt \",\"text\":\"demouser withdraw requested by 10 USD \\r\\n\\r\\n\"}', '2021-06-16 13:42:11', '2021-06-16 13:42:11'),
(46, 1, 'App\\Models\\Admin', '{\"link\":\"https:\\/\\/localhost\\/payEscrow\\/Files\\/admin\\/user\\/edit\\/12\",\"icon\":\"fas fa-user text-white\",\"text\":\"demouser545 has been joined\\r\\n\\r\\n\"}', '2021-06-25 11:55:37', '2021-06-25 11:55:37'),
(47, 2, 'App\\Models\\Admin', '{\"link\":\"https:\\/\\/localhost\\/payEscrow\\/Files\\/admin\\/user\\/edit\\/12\",\"icon\":\"fas fa-user text-white\",\"text\":\"demouser545 has been joined\\r\\n\\r\\n\"}', '2021-06-25 11:55:38', '2021-06-25 11:55:38'),
(48, 1, 'App\\Models\\Admin', '{\"link\":\"https:\\/\\/localhost\\/payEscrow\\/Files\\/admin\\/user\\/edit\\/13\",\"icon\":\"fas fa-user text-white\",\"text\":\"ronnieareaaa has been joined\\r\\n\\r\\n\"}', '2021-06-25 11:56:06', '2021-06-25 11:56:06'),
(49, 2, 'App\\Models\\Admin', '{\"link\":\"https:\\/\\/localhost\\/payEscrow\\/Files\\/admin\\/user\\/edit\\/13\",\"icon\":\"fas fa-user text-white\",\"text\":\"ronnieareaaa has been joined\\r\\n\\r\\n\"}', '2021-06-25 11:56:07', '2021-06-25 11:56:07'),
(50, 1, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/payEscrow\\/Files\\/admin\\/tickets\\/view\\/1\",\"icon\":\"fas fa-ticket-alt text-white\",\"text\":\"demouser create a ticket\\r\\nTicket : 853595\\r\\n\\r\\n\"}', '2021-06-26 07:36:52', '2021-06-26 07:36:52'),
(51, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/payEscrow\\/Files\\/admin\\/tickets\\/view\\/1\",\"icon\":\"fas fa-ticket-alt text-white\",\"text\":\"demouser create a ticket\\r\\nTicket : 853595\\r\\n\\r\\n\"}', '2021-06-26 07:36:52', '2021-06-26 07:36:52'),
(52, 8, 'App\\Models\\User', '{\"link\":\"#\",\"icon\":\"fa fa-money-bill-alt\",\"text\":\"demouser requested to you for accept 5000 USD deal.\"}', '2021-06-26 08:58:51', '2021-06-26 08:58:51'),
(53, 2, 'App\\Models\\User', '{\"link\":\"#\",\"icon\":\"fa fa-money-bill-alt\",\"text\":\"demouser requested to you for accept 500 USD deal.\"}', '2021-06-26 09:01:47', '2021-06-26 09:01:47'),
(54, 3, 'App\\Models\\User', '{\"link\":\"#\",\"icon\":\"fa fa-money-bill-alt\",\"text\":\"demouser requested to you for accept 500 USD deal.\"}', '2021-06-26 09:10:20', '2021-06-26 09:10:20'),
(55, 11, 'App\\Models\\User', '{\"link\":\"#\",\"icon\":\"fa fa-money-bill-alt\",\"text\":\"demouser requested to you for accept 200 USD deal.\"}', '2021-06-26 09:15:29', '2021-06-26 09:15:29'),
(56, 4, 'App\\Models\\User', '{\"link\":\"#\",\"icon\":\"fa fa-money-bill-alt\",\"text\":\"demouser requested to you for accept 50 USD deal.\"}', '2021-06-26 09:17:32', '2021-06-26 09:17:32'),
(57, 10, 'App\\Models\\User', '{\"link\":\"#\",\"icon\":\"fa fa-money-bill-alt\",\"text\":\"demouser requested to you for accept 30 USD deal.\"}', '2021-06-26 09:31:51', '2021-06-26 09:31:51'),
(58, 4, 'App\\Models\\User', '{\"link\":\"#\",\"icon\":\"fa fa-money-bill-alt\",\"text\":\"demouser requested to you for accept 50 USD deal.\"}', '2021-06-26 09:33:18', '2021-06-26 09:33:18'),
(59, 3, 'App\\Models\\User', '{\"link\":\"#\",\"icon\":\"fa fa-money-bill-alt\",\"text\":\"demouser requested to you for accept 120 USD deal.\"}', '2021-06-26 09:34:23', '2021-06-26 09:34:23'),
(60, 3, 'App\\Models\\User', '{\"link\":\"http:\\/\\/localhost\\/payEscrow\\/Files\\/user\\/escrow\\/reports\\/24\",\"icon\":\"las la-exclamation-triangle\",\"text\":\"demouser  reported against you for Escrow ID: 75140234\"}', '2021-06-26 12:17:43', '2021-06-26 12:17:43'),
(62, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/payEscrow\\/Files\\/admin\\/escrow\\/details\\/24\",\"icon\":\"fab fa-hire-a-helper text-white\",\"text\":\"demouser reported against a escrow.\\r\\nEscrow Id 75140234\\r\\n\"}', '2021-06-26 12:17:43', '2021-06-26 12:17:43'),
(63, 1, 'App\\Models\\User', '{\"link\":\"#\",\"icon\":\"las la-money-bill\",\"text\":\"Admin resolved your deal 120 USD . Escrow ID: 75140234\"}', '2021-06-26 12:46:07', '2021-06-26 12:46:07'),
(64, 4, 'App\\Models\\User', '{\"link\":\"http:\\/\\/localhost\\/payEscrow\\/Files\\/user\\/escrow\\/reports\\/23\",\"icon\":\"las la-exclamation-triangle\",\"text\":\"demouser  reported against you for Escrow ID: 34794152\"}', '2021-06-26 14:01:06', '2021-06-26 14:01:06'),
(66, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/payEscrow\\/Files\\/admin\\/escrow\\/details\\/23\",\"icon\":\"fab fa-hire-a-helper text-white\",\"text\":\"demouser reported against a escrow.\\r\\nEscrow Id 34794152\\r\\n\"}', '2021-06-26 14:01:07', '2021-06-26 14:01:07'),
(68, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/payEscrow\\/Files\\/admin\\/user\\/fundLog\\/1\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"demouser requested to deposit 200 USD via Mobile Money\\r\\n\"}', '2021-06-27 00:18:10', '2021-06-27 00:18:10'),
(69, 1, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/payEscrow\\/Files\\/admin\\/user\\/fundLog\\/1\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"demouser requested to deposit 120 USD via Mobile Money\\r\\n\"}', '2021-06-27 00:23:56', '2021-06-27 00:23:56'),
(70, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/payEscrow\\/Files\\/admin\\/user\\/fundLog\\/1\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"demouser requested to deposit 120 USD via Mobile Money\\r\\n\"}', '2021-06-27 00:23:56', '2021-06-27 00:23:56'),
(71, 1, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/payEscrow\\/Files\\/admin\\/user\\/fundLog\\/1\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"demouser requested to deposit 200 USD via Mobile Money\\r\\n\"}', '2021-06-27 00:24:33', '2021-06-27 00:24:33'),
(72, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/payEscrow\\/Files\\/admin\\/user\\/fundLog\\/1\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"demouser requested to deposit 200 USD via Mobile Money\\r\\n\"}', '2021-06-27 00:24:34', '2021-06-27 00:24:34'),
(74, 1, 'App\\Models\\User', '{\"link\":\"#\",\"icon\":\"las la-money-bill-alt \",\"text\":\"200 USD  deposit has been rejected\\r\\n\\r\\n\"}', '2021-06-27 01:38:34', '2021-06-27 01:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `sms_controls`
--

CREATE TABLE `sms_controls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `actionMethod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actionUrl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headerData` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paramData` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `formData` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms_controls`
--

INSERT INTO `sms_controls` (`id`, `actionMethod`, `actionUrl`, `headerData`, `paramData`, `formData`, `created_at`, `updated_at`) VALUES
(1, 'POST', 'https://rest.nexmo.com/sms/json', '{\"Content-Type\":\"application\\/x-www-form-urlencoded\"}', NULL, '{\"from\":\"Rownak\",\"text\":\"[[message]]\",\"to\":\"[[receiver]]\",\"api_key\":\"930cc608\",\"api_secret\":\"2pijsaMOUw5YKOK5\"}', '2020-12-13 01:45:29', '2021-01-24 04:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `language_id`, `section_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 20, 'about-us', '{\"short_title\":\"Who we are\",\"title\":\"About Us\",\"short_description\":\"<p>Veritatis suscipit nemo aperiam eum dolores ipsa voluptatem ab impedit expedita veniam. Quibusdam nulla quae accusantium ipsum<\\/p><p>\\r\\n\\r\\nCupiditate obcaecati dolorem ratione nam veritatis reiciendis excepturi et? Beatae porro voluptates officiis veritatis, earum nulla eius? Ipsa voluptas id vitae distinctio, nesciunt nihil quaerat blanditiis sunt eius!\\r\\n\\r\\nDolorem maxime? Commodi, voluptas?\\r\\nQuaerat fuga distinctio voluptas iusto exerci\\r\\nPerspiciatis temporibus recusandae labore <\\/p><p><br \\/><\\/p><ul><li><span>Dolorem maxime? Commodi, voluptas?<\\/span><\\/li><li><span>Quaerat fuga distinctio voluptas iusto exerci<\\/span><\\/li><li><span>Perspiciatis temporibus recusandae labore nostrum<\\/span><\\/li><li><span>Laborum aut veritatis enim veniam\\u00a0<\\/span><\\/li><\\/ul><p><br \\/><\\/p>\"}', '2021-06-13 05:09:51', '2021-06-13 05:09:51'),
(2, 20, 'faq', '{\"short_title\":\"FAQs\",\"title\":\"Frequently Asked Questions\",\"short_details\":\"Veritatis suscipit nemo aperiam eum dolores ipsa voluptatem ab impedit expedita veniam. Quibusdam nulla quae accusantium ipsum\"}', '2021-06-13 05:13:09', '2021-06-13 09:20:32'),
(3, 20, 'testimonial', '{\"short_title\":\"Testimonials\",\"title\":\"Our Happy Clients Say\",\"description\":\"Veritatis suscipit nemo aperiam eum dolores ipsa voluptatem ab impedit expedita veniam. Quibusdam nulla quae accusantium ipsum\"}', '2021-06-13 07:17:12', '2021-06-13 07:17:12'),
(4, 1, 'contact-us', '{\"short_title\":\"Get In Touch\",\"title\":\"Send Messages\",\"short_details\":\"Veritatis suscipit nemo aperiam eum dolores ipsa voluptatem ab impedit expedita veniam. Quibusdam nulla quae accusantium ipsum\",\"address\":\"22 Baker Street, London\",\"email\":\"email@website.com\",\"phone\":\"+44-20-4526-2356\",\"footer_short_details\":\"We are a full service like readable english. Many desktop publishing packages and web page editor now use lorem Ipsum sites still in their.\"}', '2021-06-13 07:23:20', '2021-06-13 07:23:20'),
(5, 20, 'contact-us', '{\"short_title\":\"Get In Touch\",\"title\":\"Send Messages\",\"short_details\":\"Veritatis suscipit nemo aperiam eum dolores ipsa voluptatem ab impedit expedita veniam. Quibusdam nulla quae accusantium ipsum\",\"address\":\"858 Lorem Ipsum, Sidney, Australia\",\"email\":\"demo@example.com\",\"phone\":\"+1234567890\",\"footer_left_text\":\"PayEscrow is a secure online payment processing\\u00a0 escrow service for using worldwide.\"}', '2021-06-13 07:24:01', '2021-06-16 12:38:24'),
(6, 20, 'we-accept', '{\"short_title\":\"PAYMENTS\",\"title\":\"We Accept\",\"short_details\":\"Help agencies to define their new business objectives and then create professional software.\"}', '2021-06-13 07:24:57', '2021-06-13 11:25:35'),
(8, 20, 'news-letter', '{\"title\":\"Subscribe Newsletter\",\"sub_title\":\"By subscribing to our mailing list you will always be updated\"}', '2021-06-13 07:27:41', '2021-06-13 23:54:02'),
(9, 20, 'how-it-work', '{\"short_title\":\"Simple Step\",\"title\":\"How It Works\",\"description\":\"Just a few simple steps and it\'s free\"}', '2021-06-13 09:12:58', '2021-06-13 23:14:15'),
(10, 20, 'why-chose-us', '{\"short_title\":\"We explain\",\"title\":\"Why Choose Us?\",\"description\":\"There is no one who loves pain itself, who seeks after it and wants to have it,\"}', '2021-06-13 22:33:59', '2021-06-13 22:33:59'),
(11, 21, 'about-us', '{\"short_title\":\"Quienes somos\",\"title\":\"Sobre nosotros\",\"short_description\":\"<p>Veritatis suscipit nemo aperiam eum dolores ipsa voluptatem ab impedit expedita veniam. Quibusdam nulla quae accusantium ipsum<\\/p><p>Cupiditate obcaecati dolorem ratione nam veritatis reiciendis excepturi et? Beatae porro voluptates officiis veritatis, earum nulla eius? Ipsa voluptas id vitae distinctio, nesciunt nihil quaerat blanditiis sunt eius! Dolorem maxime? Commodi, voluptas? Quaerat fuga distinctio voluptas iusto exerci Perspiciatis temporibus recusandae labore<\\/p><p><br \\/><\\/p><ul><li>Dolorem maxime? Commodi, voluptas?<\\/li><li>Quaerat fuga distinctio voluptas iusto exerci<\\/li><li>Perspiciatis temporibus recusandae labore nostrum<\\/li><li>Laborum aut veritatis enim veniam\\u00a0<\\/li><\\/ul><p><br \\/><\\/p>\"}', '2021-06-15 06:07:41', '2021-06-15 06:07:41'),
(12, 21, 'faq', '{\"short_title\":\"frecuentes\",\"title\":\"Preguntas frecuentes\",\"short_details\":\"<p>Veritatis suscipit nemo aperiam eum dolores ipsa voluptatem ab impedit expedita veniam. Quibusdam nulla quae accusantium ipsum<br \\/><\\/p>\"}', '2021-06-15 06:08:23', '2021-06-15 06:08:23'),
(13, 21, 'testimonial', '{\"short_title\":\"Testimonios\",\"title\":\"Nuestras clientes felices dicen\",\"description\":\"Veritatis suscipit nemo aperiam eum dolores ipsa voluptatem ab impedit expedita veniam. Quibusdam nulla quae accusantium ipsum\"}', '2021-06-15 06:21:51', '2021-06-15 06:21:51'),
(14, 21, 'how-it-work', '{\"short_title\":\"Paso simple\",\"title\":\"C\\u00f3mo funciona\",\"description\":\"Solo unos sencillos pasos y es gratis\"}', '2021-06-15 06:22:47', '2021-06-15 06:22:47'),
(15, 21, 'why-chose-us', '{\"short_title\":\"Nosotras explicamos\",\"title\":\"Por qu\\u00e9 elegirnos?\",\"description\":\"No hay quien ame el dolor mismo, quien lo busque y quiera tenerlo,\"}', '2021-06-15 06:23:34', '2021-06-15 06:23:34'),
(16, 21, 'news-letter', '{\"title\":\"Suscribirse al bolet\\u00edn informativo\",\"sub_title\":\"Al suscribirse a nuestra lista de correo siempre estar\\u00e1 actualizado\"}', '2021-06-15 06:23:56', '2021-06-15 06:23:56'),
(17, 21, 'we-accept', '{\"short_title\":\"PAGOS\",\"title\":\"Nosotras aceptamos\",\"short_details\":\"Ayude a las agencias a definir sus nuevos objetivos comerciales y luego cree software profesional.\"}', '2021-06-15 06:33:46', '2021-06-15 06:33:46'),
(18, 21, 'contact-us', '{\"short_title\":\"Ponerse en contacto\",\"title\":\"Enviar mensajes\",\"short_details\":\"Veritatis suscipit nemo aperiam eum dolores ipsa voluptatem ab impedit expedita veniam. Quibusdam nulla quae accusantium ipsum\",\"address\":\"858 Lorem Ipsum, Sidney, Australia\",\"email\":\"demo@example.com\",\"phone\":\"+1234567890\",\"footer_left_text\":\"PayEscrow es un servicio de dep\\u00f3sito en garant\\u00eda de procesamiento de pagos en l\\u00ednea seguro para usar en todo el mundo.\"}', '2021-06-15 06:47:50', '2021-06-16 12:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `template_media`
--

CREATE TABLE `template_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template_media`
--

INSERT INTO `template_media` (`id`, `section_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'about-us', '{\"youtube_link\":\"https:\\/\\/www.youtube.com\\/embed\\/fZlHcazNMrc\"}', '2021-06-13 05:09:51', '2021-06-13 08:57:11'),
(2, 'contact-us', '{\"image\":\"60c6f81b8980a1623652379.png\"}', '2021-06-14 00:32:59', '2021-06-14 00:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: Open, 1: Answered, 2: Replied, 3: Closed	',
  `last_reply` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_attachments`
--

CREATE TABLE `ticket_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_message_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_messages`
--

CREATE TABLE `ticket_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `charge` decimal(11,2) NOT NULL DEFAULT 0.00,
  `final_balance` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trx_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_id` bigint(20) DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` double(11,2) NOT NULL DEFAULT 0.00,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `two_fa` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: two-FA off, 1: two-FA on	',
  `two_fa_verify` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: two-FA unverified, 1: two-FA verified	',
  `two_fa_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verification` tinyint(1) DEFAULT 1,
  `sms_verification` tinyint(1) DEFAULT 1,
  `verify_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sent_at` datetime DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `chat_notifications`
--
ALTER TABLE `chat_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configures`
--
ALTER TABLE `configures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_name_index` (`name`);

--
-- Indexes for table `content_details`
--
ALTER TABLE `content_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_details_content_id_foreign` (`content_id`),
  ADD KEY `content_details_language_id_foreign` (`language_id`);

--
-- Indexes for table `content_media`
--
ALTER TABLE `content_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_media_content_id_foreign` (`content_id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_templates_language_id_foreign` (`language_id`);

--
-- Indexes for table `escrows`
--
ALTER TABLE `escrows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funds_user_id_foreign` (`user_id`),
  ADD KEY `funds_gateway_id_foreign` (`gateway_id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gateways_code_unique` (`code`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify_templates`
--
ALTER TABLE `notify_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notify_templates_language_id_foreign` (`language_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payout_logs`
--
ALTER TABLE `payout_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payout_methods`
--
ALTER TABLE `payout_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_notifications`
--
ALTER TABLE `site_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_controls`
--
ALTER TABLE `sms_controls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_media`
--
ALTER TABLE `template_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `template_media_section_name_index` (`section_name`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_attachments`
--
ALTER TABLE `ticket_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_attachments_ticket_message_id_foreign` (`ticket_message_id`);

--
-- Indexes for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_messages_ticket_id_foreign` (`ticket_id`),
  ADD KEY `ticket_messages_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chat_notifications`
--
ALTER TABLE `chat_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configures`
--
ALTER TABLE `configures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `content_details`
--
ALTER TABLE `content_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `content_media`
--
ALTER TABLE `content_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `escrows`
--
ALTER TABLE `escrows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funds`
--
ALTER TABLE `funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `notify_templates`
--
ALTER TABLE `notify_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payout_logs`
--
ALTER TABLE `payout_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payout_methods`
--
ALTER TABLE `payout_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `site_notifications`
--
ALTER TABLE `site_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `sms_controls`
--
ALTER TABLE `sms_controls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `template_media`
--
ALTER TABLE `template_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_attachments`
--
ALTER TABLE `ticket_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
