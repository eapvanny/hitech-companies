-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2025 at 06:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_website_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `title_kh` longtext DEFAULT NULL,
  `title_en` longtext DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for active and 0 for inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `img`, `title_kh`, `title_en`, `active_status`, `created_at`, `updated_at`) VALUES
(2, 'uploads/images/iHa2q4XDXlBZk8kL0IjN6rdFIp9pRUvu4K9mPOqG.jpg', '<div>គុណភាពទឹកមានសារៈសំខាន់បំផុតចំពោះ SL HI-TECH ហើយប្រតិបត្តិករដែលខិតខំប្រឹងប្រែងរបស់ក្រុមហ៊ុនត្រូវយកចិត្តទុកដាក់លើការងារ និងភារកិច្ចរបស់ខ្លួនយ៉ាងយកចិត្តទុកដាក់ ដើម្បីធានាបាននូវគុណភាពទឹកស្អាត និងស្របតាមស្តង់ដារក្នុងស្រុក និងអន្តរជាតិ។ យើងជឿជាក់យ៉ាងមុតមាំថា សុខភាពគឺជាទ្រព្យសម្បត្តិ ដូច្នេះហើយ យើងប្តេជ្ញាផ្តល់ទឹកដបគុណភាពខ្ពស់បំផុតដល់អតិថិជនដែលមានតម្លៃរបស់យើងសម្រាប់ប្រើប្រាស់ប្រចាំថ្ងៃ។</div><div><br></div><div>ទឹករបស់យើងមាននៅលើទីផ្សារកម្ពុជាជាងពីរទស្សវត្សមកហើយ ដែលបន្តគាំទ្រ និងប្រើប្រាស់ដោយអតិថិជនក្នុងស្រុក និងអន្តរជាតិ យើងសូមថ្លែងអំណរគុណចំពោះអតិថិជនរបស់យើង និងលះបង់ដើម្បីរក្សាស្តង់ដារ។</div>', '<p style=\"margin-bottom: 1.5em; color: rgb(16, 16, 16); font-size: 16px; font-family: Poppins, Battambang, sans-serif !important;\">Water quality is of the utmost importance to SL HI-TECH and the company’s dedicated operators take their job and duties very seriously to ensure the quality of drinking water and to meet local &amp; international standard. We strongly believe that Health is Wealth, therefore we are determined to deliver the highest quality bottled water to our value customer for daily consumption.</p><p style=\"margin-bottom: 1.5em; color: rgb(16, 16, 16); font-size: 16px; font-family: Poppins, Battambang, sans-serif !important;\">Our water has been on Cambodia market for more than two decades, continuously supported and consumed by local and international customers, we would like to show our gratitude to our customer and devoted to maintaining the standard.</p>', 1, '2025-03-28 07:53:11', '2025-04-04 08:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `accreditations`
--

CREATE TABLE `accreditations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_kh` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `active_status` varchar(255) NOT NULL DEFAULT '1' COMMENT '1 for active and 0 for inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accreditations`
--

INSERT INTO `accreditations` (`id`, `name_kh`, `name_en`, `logo`, `active_status`, `created_at`, `updated_at`) VALUES
(5, 'វិញ្ញាបនប័ត្រនៃប្រព័ន្ធគ្រប់គ្រងគុណភាព', 'Certificate of Quality Management System', 'uploads/images/accreditations/WNXt1JEbh7BHrG24qmHoONMGlpMig5BLzsgnwrWt.jpg', '1', '2025-03-25 09:54:17', '2025-03-25 10:31:59'),
(6, 'វិញ្ញាបនប័ត្រនៃប្រព័ន្ធគ្រប់គ្រងគុណភាពអាហារ', 'Certificate of Food Quality Management System', 'uploads/images/accreditations/CgkHNCECtD8k6e7yKHetwC7RG51eAtoABFVpV7p5.jpg', '1', '2025-03-25 10:04:30', '2025-03-25 10:36:53'),
(8, 'វិញ្ញាបនប័ត្រប្រព័ន្ធគ្រប់គ្រងគុណភាពអាហារ', 'Certificate of Food Quality Management System', 'uploads/images/accreditations/dU1z9IXaP0cHZ6a5Hxog1ZvBd6n0arYx6wC5mAGW.jpg', '1', '2025-03-25 10:36:29', '2025-03-25 10:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_kh` varchar(255) DEFAULT NULL,
  `short_text` text DEFAULT NULL,
  `short_text_kh` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `description_kh` longtext DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `active_status` varchar(255) NOT NULL DEFAULT '1' COMMENT '1 for active and 0 for inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `img`, `title`, `title_kh`, `short_text`, `short_text_kh`, `description`, `description_kh`, `author`, `seo_title`, `seo_description`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 'uploads/images/blogs/UjxEMAo0hTq2pd9B8XB35og8RUhgDKbIqAgtX5SD.jpg', 'Drinking Water is One of The Most Important Ways for Losing Weight', 'ការផឹកទឹកគឺជាវិធីសំខាន់បំផុតមួយសម្រាប់ការសម្រកទម្ងន់', 'Losing weight so you can look and feel better is a form of self-love that you can practice to maintain a healthy lifestyle. Your weight can be a reflection of your health, but losing weight in a healthy manner can be a struggle.', 'ការសម្រកទម្ងន់ ដូច្នេះអ្នកអាចមើលទៅ និងមានអារម្មណ៍ប្រសើរជាងមុន គឺជាទម្រង់នៃការស្រឡាញ់ខ្លួនឯង ដែលអ្នកអាចអនុវត្តដើម្បីរក្សារបៀបរស់នៅដែលមានសុខភាពល្អ។ ទម្ងន់របស់អ្នកអាចជាការឆ្លុះបញ្ចាំងពីសុខភាពរបស់អ្នក ប៉ុន្តែការសម្រកទម្ងន់ប្រកបដោយសុខភាពល្អអាចជាការតស៊ូ។', '<p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><span style=\"box-sizing: inherit;\">Losing weight so you can look and feel better is a form of self-love that you can practice to maintain a healthy lifestyle. Your weight can be a reflection of your health, but losing weight in a healthy manner can be a struggle. However, multiple studies have shown that drinking water can benefit your health and your weight loss journey tremendously.  That is why 30–59% of US adults who try to lose weight increase their water intake! </span></p><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><span style=\"box-sizing: inherit;\">Water can be part of a weight-loss journey that energizes you and makes you feel proud of yourself. Here are 3 interesting reasons why drinking water is the most important way to lose weight.</span></p><h2 class=\"\"><h2 class=\"\"><h2 class=\"\"><h1 style=\"box-sizing: inherit; margin-bottom: 1.5em;\" class=\"\"><span style=\"text-align: var(--bs-body-text-align);\">1. Water is a zero-calorie substance</span></h1><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><span style=\"box-sizing: inherit; font-weight: normal;\">Since water is naturally calorie-free, it is often considered to be an integral component of a weight loss journey. A health and examination survey conducted in the US showed that people who drink mostly water have up to a 9% lower calorie intake!</span></p><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><span style=\"box-sizing: inherit; font-weight: normal;\">Moreover, those who are trying to lose weight should also substitute high-calorie beverages with water. By drinking water instead of those sugary beverages or soft drinks, you can decrease your calorie consumption by a significant amount. Drinking water as a substitute for sugar-added beverages also reduces the level of glucose in your blood, which can provide long term benefits for your health such as reducing the chance of diabetes, heart disease and weakened immune system. Plus, drinking water before a meal can also suppress appetite and prevent overconsumption.</span></p><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><span style=\"box-sizing: inherit; font-weight: normal;\">Given these benefits, children should also strongly be encouraged to drink a lot of water and develop a water drinking habit in order to lower their chance of obesity. A study conducted in Germany has shown that, only by installing drinking fountains and providing education on water consumption, the risk of obesity is reduced by a whopping 31%!</span></p></h2></h2></h2><h1 style=\"box-sizing: inherit; clear: both; margin: 0px;\" class=\"\"><span style=\"box-sizing: inherit;\">2. Drinking water benefits your workout routine</span></h1><h2 class=\"\"><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><span style=\"box-sizing: inherit; font-weight: normal;\">Not only does it help substitute high calories beverages, water can also improve your workout routine. Generally, working out and going to the gym is recommended for those who are looking to improve their health and physique. It is also advised by physicians that people who practice energy-consuming activities should have good hydration. It should also be noted that water can help your body function better by providing water to cool the body during a workout, allow you to work out for a longer period of time, helps the body burn calories better, and prevent symptoms of dehydration.</span></p><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><span style=\"box-sizing: inherit; font-weight: normal;\">When working out, your body releases a lot of water to prevent symptoms of heat exhaustion such as heat cramps and heatstroke. However, this process depletes your water supply and can lead to dehydration. This is why getting enough water before, during, and after exercising can prevent dizziness, nausea, muscle cramps, and more. This is why it is usually believed that a body that is properly hydrated can perform at its best.</span></p></h2><h1 style=\"box-sizing: inherit; clear: both; margin: 0px;\" class=\"\"><span style=\"box-sizing: inherit;\">3. Drinking water helps your body burn fat</span></h1><h2 class=\"\"><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><span style=\"box-sizing: inherit; font-weight: normal;\">Water is also an integral ingredient in metabolism – a process in which the body turns food into energy. Even more, drinking water helps reduce the percentage of body fat by increasing the rate at which body fat is burned in a process called lipolysis. That is why maintaining proper hydration on a daily will help you burn both old and new body fat. Without the presence of H20, the process of metabolism and burning down fat simply cannot occur! Even more so, getting enough water also helps your body eliminate waste through the urinary and digestive tract.</span></p><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><span style=\"font-weight: normal;\"> </span><span style=\"font-weight: normal; font-size: 1.07rem; color: var(--bs-heading-color); text-align: var(--bs-body-text-align);\">As evidenced by the benefits pointed out above, water can significantly improve your weight loss journey. A proper amount of water intake will help you achieve a healthy weight loss that will make you feel good about both your body and your health. After all, losing weight should be directed towards looking good for yourself and being happy with who you are. The next time you think losing weight might just be the hardest thing to do, start by grabbing a bottle or a glass of water!</span></p></h2>', '<p><span style=\"font-size: 14.98px;\">ការសម្រកទម្ងន់ ដូច្នេះអ្នកអាចមើលទៅ និងមានអារម្មណ៍ប្រសើរជាងមុន គឺជាទម្រង់នៃការស្រឡាញ់ខ្លួនឯង ដែលអ្នកអាចអនុវត្តដើម្បីរក្សារបៀបរស់នៅដែលមានសុខភាពល្អ។ ទម្ងន់របស់អ្នកអាចជាការឆ្លុះបញ្ចាំងពីសុខភាពរបស់អ្នក ប៉ុន្តែការសម្រកទម្ងន់ប្រកបដោយសុខភាពល្អអាចជាការតស៊ូ។ ទោះបីជាយ៉ាងណាក៏ដោយ ការសិក្សាជាច្រើនបានបង្ហាញថា ការផឹកទឹកអាចផ្តល់អត្ថប្រយោជន៍ដល់សុខភាពរបស់អ្នក និងដំណើរនៃការសម្រកទម្ងន់របស់អ្នកយ៉ាងខ្លាំង។ នោះហើយជាមូលហេតុដែល 30-59% នៃមនុស្សពេញវ័យអាមេរិកដែលព្យាយាមសម្រកទម្ងន់បង្កើនការទទួលទានទឹករបស់ពួកគេ!</span></p><p><span style=\"font-size: 14.98px;\"><br></span></p><p><span style=\"font-size: 14.98px;\">ទឹកអាចជាផ្នែកមួយនៃដំណើរសម្រកទម្ងន់ដែលផ្តល់ថាមពលដល់អ្នក និងធ្វើឱ្យអ្នកមានមោទនភាពចំពោះខ្លួនឯង។ នេះគឺជាហេតុផលគួរឱ្យចាប់អារម្មណ៍ចំនួន 3 ដែលហេតុអ្វីបានជាការផឹកទឹកគឺជាវិធីសំខាន់បំផុតក្នុងការសម្រកទម្ងន់។</span></p><p><span style=\"font-size: 14.98px;\"><br></span></p><p><span style=\"font-size: 14.98px;\">1. ទឹកគឺជាសារធាតុគ្មានកាឡូរី</span></p><p><span style=\"font-size: 14.98px;\">ដោយសារទឹកមិនមានកាឡូរីពីធម្មជាតិ វាត្រូវបានចាត់ទុកថាជាសមាសធាតុសំខាន់នៃការធ្វើដំណើរសម្រកទម្ងន់។ ការស្ទង់មតិសុខភាព និងការពិនិត្យដែលធ្វើឡើងនៅសហរដ្ឋអាមេរិក បានបង្ហាញថា អ្នកដែលផឹកទឹកភាគច្រើនមានបរិមាណកាឡូរីទាបរហូតដល់ 9%!</span></p><p><span style=\"font-size: 14.98px;\"><br></span></p><p><span style=\"font-size: 14.98px;\">ជាងនេះទៅទៀត អ្នកដែលកំពុងព្យាយាមសម្រកទម្ងន់ក៏គួរតែជំនួសភេសជ្ជៈដែលមានកាឡូរីខ្ពស់ជាមួយនឹងទឹក។ ដោយការផឹកទឹកជំនួសឱ្យភេសជ្ជៈដែលមានជាតិស្ករ ឬភេសជ្ជៈទាំងនោះ អ្នកអាចកាត់បន្ថយការប្រើប្រាស់កាឡូរីរបស់អ្នកបានយ៉ាងច្រើន។ ការផឹកទឹកជំនួសភេសជ្ជៈបន្ថែមជាតិស្ករក៏ជួយកាត់បន្ថយកម្រិតជាតិគ្លុយកូសក្នុងឈាមរបស់អ្នក ដែលអាចផ្តល់អត្ថប្រយោជន៍រយៈពេលវែងសម្រាប់សុខភាពរបស់អ្នក ដូចជាកាត់បន្ថយឱកាសនៃជំងឺទឹកនោមផ្អែម ជំងឺបេះដូង និងប្រព័ន្ធការពាររាងកាយចុះខ្សោយ។ លើសពីនេះ ការផឹកទឹកមុនពេលញ៉ាំអាហារក៏អាចកាត់បន្ថយចំណង់អាហារ និងការពារការទទួលទានច្រើនពេកផងដែរ។</span></p><p><span style=\"font-size: 14.98px;\"><br></span></p><p><span style=\"font-size: 14.98px;\">ដោយទទួលបានអត្ថប្រយោជន៍ទាំងនេះ កុមារក៏គួរត្រូវបានលើកទឹកចិត្តយ៉ាងខ្លាំងឱ្យផឹកទឹកឱ្យបានច្រើន និងបង្កើតទម្លាប់ទទួលទានទឹក ដើម្បីកាត់បន្ថយឱកាសនៃការធាត់។ ការសិក្សាមួយដែលធ្វើឡើងនៅប្រទេសអាឡឺម៉ង់បានបង្ហាញថា មានតែការដំឡើងប្រភពទឹកផឹក និងផ្តល់ការអប់រំស្តីពីការប្រើប្រាស់ទឹកប៉ុណ្ណោះ ហានិភ័យនៃការធាត់ត្រូវបានកាត់បន្ថយចំនួន 31%!</span></p><p><span style=\"font-size: 14.98px;\"><br></span></p><p><span style=\"font-size: 14.98px;\">2. ការផឹកទឹកផ្តល់អត្ថប្រយោជន៍ដល់ទម្លាប់នៃការហាត់ប្រាណរបស់អ្នក។</span></p><p><span style=\"font-size: 14.98px;\">វាមិនត្រឹមតែជួយជំនួសភេសជ្ជៈដែលមានកាឡូរីខ្ពស់ប៉ុណ្ណោះទេ ទឹកក៏អាចធ្វើអោយទម្លាប់នៃការហាត់ប្រាណរបស់អ្នកប្រសើរឡើងផងដែរ។ ជាទូទៅ ការហាត់ប្រាណ និងទៅកន្លែងហាត់ប្រាណត្រូវបានណែនាំសម្រាប់អ្នកដែលចង់ពង្រឹងសុខភាព និងរាងកាយរបស់ពួកគេ។ វាក៏ត្រូវបានណែនាំដោយគ្រូពេទ្យថា អ្នកដែលអនុវត្តសកម្មភាពប្រើប្រាស់ថាមពលគួរតែមានជាតិទឹកល្អ។ វាគួរតែត្រូវបានគេកត់សម្គាល់ផងដែរថាទឹកអាចជួយឱ្យរាងកាយរបស់អ្នកដំណើរការបានល្អប្រសើរដោយការផ្តល់នូវទឹកដើម្បីធ្វើឱ្យរាងកាយត្រជាក់ក្នុងអំឡុងពេលហាត់ប្រាណ, អនុញ្ញាតឱ្យអ្នកធ្វើការបានយូរ, ជួយឱ្យរាងកាយដុតកាឡូរីបានល្អប្រសើរ, និងការពាររោគសញ្ញានៃការខះជាតិទឹក។</span></p><p><span style=\"font-size: 14.98px;\"><br></span></p><p><span style=\"font-size: 14.98px;\">នៅពេលហាត់ប្រាណ រាងកាយរបស់អ្នកបញ្ចេញទឹកច្រើន ដើម្បីការពាររោគសញ្ញានៃការហត់នឿយក្នុងកំដៅ ដូចជា រមួលក្រពើ និងកម្តៅ។ ទោះជាយ៉ាងណាក៏ដោយ ដំណើរការនេះធ្វើឱ្យការផ្គត់ផ្គង់ទឹករបស់អ្នកអស់ ហើយអាចនាំឱ្យខ្សោះជាតិទឹក។ នេះ​ជា​មូលហេតុ​ដែល​ការ​ទទួល​បាន​ជាតិ​ទឹក​គ្រប់គ្រាន់​មុន កំឡុង​ពេល និង​ក្រោយ​ការ​ហាត់ប្រាណ​អាច​ការពារ​ការ​វិលមុខ ចង្អោរ រមួល​សាច់ដុំ និង​ច្រើន​ទៀត​។ នេះ​ហើយ​ជា​មូលហេតុ​ដែល​គេ​ជឿ​ថា​រាងកាយ​ដែល​មាន​ជាតិ​ទឹក​ត្រឹមត្រូវ​អាច​ដំណើរការ​បាន​ល្អ​បំផុត។</span></p><p><span style=\"font-size: 14.98px;\"><br></span></p><p><span style=\"font-size: 14.98px;\">3. ការផឹកទឹកជួយឱ្យរាងកាយរបស់អ្នកដុតបំផ្លាញជាតិខ្លាញ់</span></p><p><span style=\"font-size: 14.98px;\">ទឹក​ក៏​ជា​ធាតុផ្សំ​សំខាន់​មួយ​ក្នុង​ការ​បំប្លែង​សារជាតិ​មេតាបូលីស ដែល​ជា​ដំណើរការ​ដែល​រាងកាយ​បំប្លែង​អាហារ​ទៅ​ជា​ថាមពល។ លើសពីនេះ ការផឹកទឹកជួយកាត់បន្ថយភាគរយនៃជាតិខ្លាញ់ក្នុងរាងកាយដោយបង្កើនអត្រាដែលជាតិខ្លាញ់ក្នុងខ្លួនត្រូវបានដុតក្នុងដំណើរការហៅថា lipolysis។ នោះហើយជាមូលហេតុដែលការរក្សាជាតិទឹកបានត្រឹមត្រូវជារៀងរាល់ថ្ងៃ នឹងជួយឱ្យអ្នកដុតបំផ្លាញទាំងខ្លាញ់ចាស់ និងរាងកាយថ្មី។ បើគ្មានវត្តមានរបស់ H20 ទេ ដំណើរការមេតាបូលីស និងការដុតបំផ្លាញជាតិខ្លាញ់ មិនអាចកើតឡើងបានទេ! ជាងនេះទៅទៀត ការទទួលបានទឹកគ្រប់គ្រាន់ក៏អាចជួយឱ្យរាងកាយរបស់អ្នកកម្ចាត់កាកសំណល់តាមទឹកនោម និងផ្លូវរំលាយអាហារផងដែរ។</span></p><p><span style=\"font-size: 14.98px;\"><br></span></p><p><span style=\"font-size: 14.98px;\">&nbsp;ដូចដែលបានបង្ហាញដោយអត្ថប្រយោជន៍ដែលបានចង្អុលបង្ហាញខាងលើទឹកអាចធ្វើអោយប្រសើរឡើងនូវដំណើរសម្រកទម្ងន់របស់អ្នក។ ការទទួលទានទឹកក្នុងបរិមាណត្រឹមត្រូវនឹងជួយអ្នកឱ្យសម្រេចបាននូវការសម្រកទម្ងន់ដែលមានសុខភាពល្អ ដែលនឹងធ្វើឱ្យអ្នកមានអារម្មណ៍ល្អទាំងរាងកាយ និងសុខភាពរបស់អ្នក។ យ៉ាងណាមិញ ការ​សម្រក​ទម្ងន់​គួរតែ​ត្រូវ​តម្រង់​ទៅរក​ការ​សម្លឹង​មើល​ល្អ​សម្រាប់​ខ្លួន​ឯង និង​រីករាយ​ជាមួយ​នឹង​អ្នក​ជា​នរណា។ លើកក្រោយដែលអ្នកគិតថាការសម្រកទម្ងន់អាចជារឿងពិបាកបំផុតក្នុងការធ្វើ ចូរចាប់ផ្តើមដោយការចាប់ដប ឬកែវទឹក!</span></p>', 'Mr.Sokheng', 'Drinking Water is One of The Most Important Ways for Losing Weight', 'Losing weight so you can look and feel better is a form of self-love that you can practice to maintain a healthy lifestyle. Your weight can be a reflection of your health, but losing weight in a healthy manner can be a struggle. However, multiple studies have shown that drinking water can benefit your health and your weight loss journey tremendously.  That is why 30–59% of US adults who try to lose weight increase their water intake! \r\n\r\nWater can be part of a weight-loss journey that energizes you and makes you feel proud of yourself. Here are 3 interesting reasons why drinking water is the most important way to lose weight.', '1', '2025-03-26 07:31:48', '2025-04-07 03:37:47'),
(5, 'uploads/images/blogs/KEGVlKF0IyHN0Ypnna1oCT2bQe1XUIaahP1Jw9wd.jpg', 'Drinking Water is One of The Most Important Ways for Losing Weight', 'ការផឹកទឹកគឺជាវិធីសំខាន់បំផុតមួយសម្រាប់ការសម្រកទម្ងន់', 'Losing weight so you can look and feel better is a form of self-love that you can practice to maintain a healthy lifestyle. Your weight can be a reflection of your health, but losing weight in a healthy manner can be a struggle.', 'ការសម្រកទម្ងន់ ដូច្នេះអ្នកអាចមើលទៅ និងមានអារម្មណ៍ប្រសើរជាងមុន គឺជាទម្រង់នៃការស្រឡាញ់ខ្លួនឯង ដែលអ្នកអាចអនុវត្តដើម្បីរក្សារបៀបរស់នៅដែលមានសុខភាពល្អ។ ទម្ងន់របស់អ្នកអាចជាការឆ្លុះបញ្ចាំងពីសុខភាពរបស់អ្នក ប៉ុន្តែការសម្រកទម្ងន់ប្រកបដោយសុខភាពល្អអាចជាការតស៊ូ។', '<p style=\"box-sizing: inherit; margin-bottom: 1.5em; color: rgba(0, 0, 0, 0.87);\"><span style=\"box-sizing: inherit;\">Losing weight so you can look and feel better is a form of self-love that you can practice to maintain a healthy lifestyle. Your weight can be a reflection of your health, but losing weight in a healthy manner can be a struggle. However, multiple studies have shown that drinking water can benefit your health and your weight loss journey tremendously.&nbsp; That is why 30–59% of US adults who try to lose weight increase their water intake!&nbsp;</span></p><p style=\"box-sizing: inherit; margin-bottom: 1.5em; color: rgba(0, 0, 0, 0.87);\"><span style=\"box-sizing: inherit;\">Water can be part of a weight-loss journey that energizes you and makes you feel proud of yourself. Here are 3 interesting reasons why drinking water is the most important way to lose weight.</span></p><h2 class=\"\" style=\"margin-top: calc(-0.142857em + 2rem); line-height: 1.28571em; color: rgba(0, 0, 0, 0.87); font-size: 1.71429rem;\"></h2><h2 class=\"\" style=\"margin-top: calc(-0.142857em + 2rem); line-height: 1.28571em; color: rgba(0, 0, 0, 0.87); font-size: 1.71429rem;\"></h2><h2 class=\"\" style=\"margin-top: calc(-0.142857em + 2rem); line-height: 1.28571em; color: rgba(0, 0, 0, 0.87); font-size: 1.71429rem;\"></h2><h1 class=\"\" style=\"box-sizing: inherit; margin-top: calc(-0.142857em + 2rem); margin-bottom: 1.5em; line-height: 1.28571em; color: rgba(0, 0, 0, 0.87);\"><span style=\"text-align: var(--bs-body-text-align);\">1. Water is a zero-calorie substance</span></h1><p style=\"box-sizing: inherit; margin-bottom: 1.5em; color: rgba(0, 0, 0, 0.87);\"><span style=\"box-sizing: inherit;\">Since water is naturally calorie-free, it is often considered to be an integral component of a weight loss journey. A health and examination survey conducted in the US showed that people who drink mostly water have up to a 9% lower calorie intake!</span></p><p style=\"box-sizing: inherit; margin-bottom: 1.5em; color: rgba(0, 0, 0, 0.87);\"><span style=\"box-sizing: inherit;\">Moreover, those who are trying to lose weight should also substitute high-calorie beverages with water. By drinking water instead of those sugary beverages or soft drinks, you can decrease your calorie consumption by a significant amount. Drinking water as a substitute for sugar-added beverages also reduces the level of glucose in your blood, which can provide long term benefits for your health such as reducing the chance of diabetes, heart disease and weakened immune system. Plus, drinking water before a meal can also suppress appetite and prevent overconsumption.</span></p><p style=\"box-sizing: inherit; margin-bottom: 1.5em; color: rgba(0, 0, 0, 0.87);\"><span style=\"box-sizing: inherit;\">Given these benefits, children should also strongly be encouraged to drink a lot of water and develop a water drinking habit in order to lower their chance of obesity. A study conducted in Germany has shown that, only by installing drinking fountains and providing education on water consumption, the risk of obesity is reduced by a whopping 31%!</span></p><h1 class=\"\" style=\"box-sizing: inherit; margin: 0px; line-height: 1.28571em; color: rgba(0, 0, 0, 0.87); clear: both;\"><span style=\"box-sizing: inherit;\">2. Drinking water benefits your workout routine</span></h1><h2 class=\"\" style=\"margin-top: calc(-0.142857em + 2rem); line-height: 1.28571em; color: rgba(0, 0, 0, 0.87); font-size: 1.71429rem;\"><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><span style=\"box-sizing: inherit; font-weight: normal;\">Not only does it help substitute high calories beverages, water can also improve your workout routine. Generally, working out and going to the gym is recommended for those who are looking to improve their health and physique. It is also advised by physicians that people who practice energy-consuming activities should have good hydration. It should also be noted that water can help your body function better by providing water to cool the body during a workout, allow you to work out for a longer period of time, helps the body burn calories better, and prevent symptoms of dehydration.</span></p><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><span style=\"box-sizing: inherit; font-weight: normal;\">When working out, your body releases a lot of water to prevent symptoms of heat exhaustion such as heat cramps and heatstroke. However, this process depletes your water supply and can lead to dehydration. This is why getting enough water before, during, and after exercising can prevent dizziness, nausea, muscle cramps, and more. This is why it is usually believed that a body that is properly hydrated can perform at its best.</span></p></h2><h1 class=\"\" style=\"box-sizing: inherit; margin: 0px; line-height: 1.28571em; color: rgba(0, 0, 0, 0.87); clear: both;\"><span style=\"box-sizing: inherit;\">3. Drinking water helps your body burn fat</span></h1><h2 class=\"\" style=\"margin-top: calc(-0.142857em + 2rem); line-height: 1.28571em; color: rgba(0, 0, 0, 0.87); font-size: 1.71429rem;\"><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><span style=\"box-sizing: inherit; font-weight: normal;\">Water is also an integral ingredient in metabolism – a process in which the body turns food into energy. Even more, drinking water helps reduce the percentage of body fat by increasing the rate at which body fat is burned in a process called lipolysis. That is why maintaining proper hydration on a daily will help you burn both old and new body fat. Without the presence of H20, the process of metabolism and burning down fat simply cannot occur! Even more so, getting enough water also helps your body eliminate waste through the urinary and digestive tract.</span></p><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><span style=\"font-weight: normal;\">&nbsp;</span><span style=\"font-weight: normal; font-size: 1.07rem; color: var(--bs-heading-color); text-align: var(--bs-body-text-align);\">As evidenced by the benefits pointed out above, water can significantly improve your weight loss journey. A proper amount of water intake will help you achieve a healthy weight loss that will make you feel good about both your body and your health. After all, losing weight should be directed towards looking good for yourself and being happy with who you are. The next time you think losing weight might just be the hardest thing to do, start by grabbing a bottle or a glass of water!</span></p></h2>', '<p><span style=\"font-size: 14.98px;\">ការសម្រកទម្ងន់ ដូច្នេះអ្នកអាចមើលទៅ និងមានអារម្មណ៍ប្រសើរជាងមុន គឺជាទម្រង់នៃការស្រឡាញ់ខ្លួនឯង ដែលអ្នកអាចអនុវត្តដើម្បីរក្សារបៀបរស់នៅដែលមានសុខភាពល្អ។ ទម្ងន់របស់អ្នកអាចជាការឆ្លុះបញ្ចាំងពីសុខភាពរបស់អ្នក ប៉ុន្តែការសម្រកទម្ងន់ប្រកបដោយសុខភាពល្អអាចជាការតស៊ូ។ ទោះបីជាយ៉ាងណាក៏ដោយ ការសិក្សាជាច្រើនបានបង្ហាញថា ការផឹកទឹកអាចផ្តល់អត្ថប្រយោជន៍ដល់សុខភាពរបស់អ្នក និងដំណើរនៃការសម្រកទម្ងន់របស់អ្នកយ៉ាងខ្លាំង។ នោះហើយជាមូលហេតុដែល 30-59% នៃមនុស្សពេញវ័យអាមេរិកដែលព្យាយាមសម្រកទម្ងន់បង្កើនការទទួលទានទឹករបស់ពួកគេ!</span></p><p><span style=\"font-size: 14.98px;\"><br></span></p><p><span style=\"font-size: 14.98px;\">ទឹកអាចជាផ្នែកមួយនៃដំណើរសម្រកទម្ងន់ដែលផ្តល់ថាមពលដល់អ្នក និងធ្វើឱ្យអ្នកមានមោទនភាពចំពោះខ្លួនឯង។ នេះគឺជាហេតុផលគួរឱ្យចាប់អារម្មណ៍ចំនួន 3 ដែលហេតុអ្វីបានជាការផឹកទឹកគឺជាវិធីសំខាន់បំផុតក្នុងការសម្រកទម្ងន់។</span></p><p><span style=\"font-size: 14.98px;\"><br></span></p><h2 class=\"\"><span style=\"font-size: 14.98px;\">1. ទឹកគឺជាសារធាតុគ្មានកាឡូរី</span></h2><p><span style=\"font-size: 14.98px;\">ដោយសារទឹកមិនមានកាឡូរីពីធម្មជាតិ វាត្រូវបានចាត់ទុកថាជាសមាសធាតុសំខាន់នៃការធ្វើដំណើរសម្រកទម្ងន់។ ការស្ទង់មតិសុខភាព និងការពិនិត្យដែលធ្វើឡើងនៅសហរដ្ឋអាមេរិក បានបង្ហាញថា អ្នកដែលផឹកទឹកភាគច្រើនមានបរិមាណកាឡូរីទាបរហូតដល់ 9%!</span></p><p><span style=\"font-size: 14.98px;\"><br></span></p><p><span style=\"font-size: 14.98px;\">ជាងនេះទៅទៀត អ្នកដែលកំពុងព្យាយាមសម្រកទម្ងន់ក៏គួរតែជំនួសភេសជ្ជៈដែលមានកាឡូរីខ្ពស់ជាមួយនឹងទឹក។ ដោយការផឹកទឹកជំនួសឱ្យភេសជ្ជៈដែលមានជាតិស្ករ ឬភេសជ្ជៈទាំងនោះ អ្នកអាចកាត់បន្ថយការប្រើប្រាស់កាឡូរីរបស់អ្នកបានយ៉ាងច្រើន។ ការផឹកទឹកជំនួសភេសជ្ជៈបន្ថែមជាតិស្ករក៏ជួយកាត់បន្ថយកម្រិតជាតិគ្លុយកូសក្នុងឈាមរបស់អ្នក ដែលអាចផ្តល់អត្ថប្រយោជន៍រយៈពេលវែងសម្រាប់សុខភាពរបស់អ្នក ដូចជាកាត់បន្ថយឱកាសនៃជំងឺទឹកនោមផ្អែម ជំងឺបេះដូង និងប្រព័ន្ធការពាររាងកាយចុះខ្សោយ។ លើសពីនេះ ការផឹកទឹកមុនពេលញ៉ាំអាហារក៏អាចកាត់បន្ថយចំណង់អាហារ និងការពារការទទួលទានច្រើនពេកផងដែរ។</span></p><p><span style=\"font-size: 14.98px;\"><br></span></p><p><span style=\"font-size: 14.98px;\">ដោយទទួលបានអត្ថប្រយោជន៍ទាំងនេះ កុមារក៏គួរត្រូវបានលើកទឹកចិត្តយ៉ាងខ្លាំងឱ្យផឹកទឹកឱ្យបានច្រើន និងបង្កើតទម្លាប់ទទួលទានទឹក ដើម្បីកាត់បន្ថយឱកាសនៃការធាត់។ ការសិក្សាមួយដែលធ្វើឡើងនៅប្រទេសអាឡឺម៉ង់បានបង្ហាញថា មានតែការដំឡើងប្រភពទឹកផឹក និងផ្តល់ការអប់រំស្តីពីការប្រើប្រាស់ទឹកប៉ុណ្ណោះ ហានិភ័យនៃការធាត់ត្រូវបានកាត់បន្ថយចំនួន 31%!</span></p><p><span style=\"font-size: 14.98px;\"><br></span></p><h2 class=\"\"><span style=\"font-size: 14.98px;\">2. ការផឹកទឹកផ្តល់អត្ថប្រយោជន៍ដល់ទម្លាប់នៃការហាត់ប្រាណរបស់អ្នក។</span></h2><p><span style=\"font-size: 14.98px;\">វាមិនត្រឹមតែជួយជំនួសភេសជ្ជៈដែលមានកាឡូរីខ្ពស់ប៉ុណ្ណោះទេ ទឹកក៏អាចធ្វើអោយទម្លាប់នៃការហាត់ប្រាណរបស់អ្នកប្រសើរឡើងផងដែរ។ ជាទូទៅ ការហាត់ប្រាណ និងទៅកន្លែងហាត់ប្រាណត្រូវបានណែនាំសម្រាប់អ្នកដែលចង់ពង្រឹងសុខភាព និងរាងកាយរបស់ពួកគេ។ វាក៏ត្រូវបានណែនាំដោយគ្រូពេទ្យថា អ្នកដែលអនុវត្តសកម្មភាពប្រើប្រាស់ថាមពលគួរតែមានជាតិទឹកល្អ។ វាគួរតែត្រូវបានគេកត់សម្គាល់ផងដែរថាទឹកអាចជួយឱ្យរាងកាយរបស់អ្នកដំណើរការបានល្អប្រសើរដោយការផ្តល់នូវទឹកដើម្បីធ្វើឱ្យរាងកាយត្រជាក់ក្នុងអំឡុងពេលហាត់ប្រាណ, អនុញ្ញាតឱ្យអ្នកធ្វើការបានយូរ, ជួយឱ្យរាងកាយដុតកាឡូរីបានល្អប្រសើរ, និងការពាររោគសញ្ញានៃការខះជាតិទឹក។</span></p><p><span style=\"font-size: 14.98px;\"><br></span></p><p><span style=\"font-size: 14.98px;\">នៅពេលហាត់ប្រាណ រាងកាយរបស់អ្នកបញ្ចេញទឹកច្រើន ដើម្បីការពាររោគសញ្ញានៃការហត់នឿយក្នុងកំដៅ ដូចជា រមួលក្រពើ និងកម្តៅ។ ទោះជាយ៉ាងណាក៏ដោយ ដំណើរការនេះធ្វើឱ្យការផ្គត់ផ្គង់ទឹករបស់អ្នកអស់ ហើយអាចនាំឱ្យខ្សោះជាតិទឹក។ នេះ​ជា​មូលហេតុ​ដែល​ការ​ទទួល​បាន​ជាតិ​ទឹក​គ្រប់គ្រាន់​មុន កំឡុង​ពេល និង​ក្រោយ​ការ​ហាត់ប្រាណ​អាច​ការពារ​ការ​វិលមុខ ចង្អោរ រមួល​សាច់ដុំ និង​ច្រើន​ទៀត​។ នេះ​ហើយ​ជា​មូលហេតុ​ដែល​គេ​ជឿ​ថា​រាងកាយ​ដែល​មាន​ជាតិ​ទឹក​ត្រឹមត្រូវ​អាច​ដំណើរការ​បាន​ល្អ​បំផុត។</span></p><p><span style=\"font-size: 14.98px;\"><br></span></p><h2 class=\"\"><span style=\"font-size: 14.98px;\">3. ការផឹកទឹកជួយឱ្យរាងកាយរបស់អ្នកដុតបំផ្លាញជាតិខ្លាញ់</span></h2><p><span style=\"font-size: 14.98px;\">ទឹក​ក៏​ជា​ធាតុផ្សំ​សំខាន់​មួយ​ក្នុង​ការ​បំប្លែង​សារជាតិ​មេតាបូលីស ដែល​ជា​ដំណើរការ​ដែល​រាងកាយ​បំប្លែង​អាហារ​ទៅ​ជា​ថាមពល។ លើសពីនេះ ការផឹកទឹកជួយកាត់បន្ថយភាគរយនៃជាតិខ្លាញ់ក្នុងរាងកាយដោយបង្កើនអត្រាដែលជាតិខ្លាញ់ក្នុងខ្លួនត្រូវបានដុតក្នុងដំណើរការហៅថា lipolysis។ នោះហើយជាមូលហេតុដែលការរក្សាជាតិទឹកបានត្រឹមត្រូវជារៀងរាល់ថ្ងៃ នឹងជួយឱ្យអ្នកដុតបំផ្លាញទាំងខ្លាញ់ចាស់ និងរាងកាយថ្មី។ បើគ្មានវត្តមានរបស់ H20 ទេ ដំណើរការមេតាបូលីស និងការដុតបំផ្លាញជាតិខ្លាញ់ មិនអាចកើតឡើងបានទេ! ជាងនេះទៅទៀត ការទទួលបានទឹកគ្រប់គ្រាន់ក៏អាចជួយឱ្យរាងកាយរបស់អ្នកកម្ចាត់កាកសំណល់តាមទឹកនោម និងផ្លូវរំលាយអាហារផងដែរ។</span></p><p><span style=\"font-size: 14.98px;\"><br></span></p><p><span style=\"font-size: 14.98px;\">&nbsp;ដូចដែលបានបង្ហាញដោយអត្ថប្រយោជន៍ដែលបានចង្អុលបង្ហាញខាងលើទឹកអាចធ្វើអោយប្រសើរឡើងនូវដំណើរសម្រកទម្ងន់របស់អ្នក។ ការទទួលទានទឹកក្នុងបរិមាណត្រឹមត្រូវនឹងជួយអ្នកឱ្យសម្រេចបាននូវការសម្រកទម្ងន់ដែលមានសុខភាពល្អ ដែលនឹងធ្វើឱ្យអ្នកមានអារម្មណ៍ល្អទាំងរាងកាយ និងសុខភាពរបស់អ្នក។ យ៉ាងណាមិញ ការ​សម្រក​ទម្ងន់​គួរតែ​ត្រូវ​តម្រង់​ទៅរក​ការ​សម្លឹង​មើល​ល្អ​សម្រាប់​ខ្លួន​ឯង និង​រីករាយ​ជាមួយ​នឹង​អ្នក​ជា​នរណា។ លើកក្រោយដែលអ្នកគិតថាការសម្រកទម្ងន់អាចជារឿងពិបាកបំផុតក្នុងការធ្វើ ចូរចាប់ផ្តើមដោយការចាប់ដប ឬកែវទឹក!</span></p>', 'Mr.Sokheng', 'Drinking Water is One of The Most Important Ways for Losing Weight', 'Losing weight so you can look and feel better is a form of self-love that you can practice to maintain a healthy lifestyle. Your weight can be a reflection of your health, but losing weight in a healthy manner can be a struggle.', '1', '2025-04-07 03:41:29', '2025-04-07 03:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `company_informations`
--

CREATE TABLE `company_informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `location_link` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `company_phone` varchar(255) DEFAULT NULL,
  `copy_right` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_informations`
--

INSERT INTO `company_informations` (`id`, `logo`, `address`, `location_link`, `company_email`, `company_phone`, `copy_right`, `created_at`, `updated_at`) VALUES
(2, 'uploads/images/muCYNuMX0xfq1JLtOSJQIdo8GzuvUvINXHBhti2X.png', '#354 biz, St.369, Prek pra, Chba ompov, Phnom Penh, Cambodia', 'https://maps.app.goo.gl/pxoKSzn9VCGKH5FP6', 'info@hitech.com.kh', '012-995-552 011-796-182 070-212-400', 'HI-Tech Drinking Water @2022 Copyrights', '2025-03-28 08:07:25', '2025-04-05 07:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_kh` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `description_kh` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for active and 0 for inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_values`
--

CREATE TABLE `core_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_kh` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `description_kh` varchar(255) NOT NULL,
  `description_en` varchar(255) NOT NULL,
  `active_status` varchar(255) NOT NULL DEFAULT '1' COMMENT '1 for active and 0 for inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_values`
--

INSERT INTO `core_values` (`id`, `title_kh`, `title_en`, `description_kh`, `description_en`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 'សុចរិតភាព', 'Integrity', 'ការកសាងទំនុកចិត្តតាមរយៈការប្រាស្រ័យទាក់ទងដោយស្មោះត្រង់ និងធ្វើអ្វីដែលត្រឹមត្រូវ។', 'Building trust through honest communications and doing what is right', '1', '2025-03-25 07:40:07', '2025-03-25 08:38:22'),
(3, 'ការងារជាក្រុម', 'Teamwork', 'ប្រសិទ្ធភាពអតិបរមាតាមរយៈការសហការ និងកម្លាំងបុគ្គល', 'Maximizing efficiency through collaboration and individual strengths', '1', '2025-04-05 04:16:46', '2025-04-05 04:16:46'),
(4, 'គោរព', 'Respect', 'ផ្តល់តម្លៃលើភាពចម្រុះ និងប្រព្រឹត្តចំពោះអតិថិជនទាំងអស់ដោយយុត្តិធម៌ និងភាពរួសរាយរាក់ទាក់', 'Valuing diversity and treating all customer with fairness, and friendliness', '1', '2025-04-05 04:17:21', '2025-04-05 04:17:21'),
(5, 'ឧត្តមភាពក្នុងសេវាកម្ម', 'Excellence in Service', 'ខិតខំដើម្បីឧត្តមភាព និងគុណភាពនៅក្នុងអ្វីគ្រប់យ៉ាងដែលយើងធ្វើ', 'Striving for excellence and quality in everything we do', '1', '2025-04-05 04:17:56', '2025-04-05 04:17:56'),
(6, 'គណនេយ្យភាព', 'Accountability', 'Taking ownership of one’s actions', 'Taking ownership of one’s actions', '1', '2025-04-05 04:18:28', '2025-04-05 04:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `em_massages`
--

CREATE TABLE `em_massages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `em_name` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `message_kh` longtext DEFAULT NULL,
  `message_en` longtext DEFAULT NULL,
  `active_status` varchar(255) NOT NULL DEFAULT '1' COMMENT '1 for active and 0 for inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `em_massages`
--

INSERT INTO `em_massages` (`id`, `em_name`, `img`, `message_kh`, `message_en`, `active_status`, `created_at`, `updated_at`) VALUES
(4, 'Lok Chumteav Khleoung Chandy', 'uploads/images/execute-managers/Ce8mRkKrRFnLzTgXl8B2eVVyaoYSFeMRj5XeJby1.png', '<p class=\"\"><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">យើងមានសេចក្តីសោមនស្សរីករាយក្នុងការបម្រើអតិថិជននូវផលិតផលរបស់យើង ហើយរីករាយយ៉ាងខ្លាំងចំពោះការគាំទ្រជាបន្តបន្ទាប់នូវទឹកពិសា Hi-Tech របស់អ្នក។ យើងប្តេជ្ញារក្សាស្តង់ដារ គុណភាព និងសេវាកម្មរបស់យើងជូនអតិថិជនដ៏មានតម្លៃរបស់យើង។</span></p>', '<p class=\"\"><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">We are delighted to serve customer our product and very happy for your continuously support of Hi-tech drinking water. We’re dedicated to maintain our standard, quality and service to our value customer.</span></p>', '1', '2025-03-24 10:54:40', '2025-04-07 04:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_03_14_015135_create_roles_table', 1),
(6, '2025_03_14_015800_create_company_informations_table', 1),
(7, '2025_03_14_020351_create_slide_shows_table', 1),
(8, '2025_03_14_022413_create_abouts_table', 1),
(9, '2025_03_14_022903_create_products_table', 1),
(10, '2025_03_14_024824_create_societys_table', 1),
(11, '2025_03_14_025745_create_contacts_table', 1),
(12, '2025_03_15_081944_create_socials_table', 1),
(13, '2025_03_18_033709_create_our_waters_table', 1),
(14, '2025_03_18_085928_create_slides_table', 1),
(15, '2025_03_18_090130_create_societies_table', 1),
(16, '2025_03_14_024824_create_societies_table', 2),
(17, '2025_03_20_015207_add_seo_to_societies', 2),
(18, '2025_03_20_133921_create_slides_table', 3),
(19, '2025_03_21_132555_create_ourcompanys_table', 4),
(20, '2025_03_24_163202_create_em_massages_table', 5),
(21, '2025_03_25_103646_create_vissionmissions_table', 6),
(22, '2025_03_25_140025_create_core_values_table', 7),
(23, '2025_03_25_160158_create_accreditations_table', 8),
(24, '2025_03_26_084442_create_blogs_table', 9),
(25, '2025_03_27_091307_create_contacts_table', 10),
(26, '2025_03_29_085351_create_permission_tables', 11),
(27, '2025_04_01_114659_create_user_visits_table', 12),
(28, '2025_04_05_152914_create_them_settings_table', 13),
(29, '2025_04_05_155830_add_active_status_to_theme_setting_table', 14),
(30, '2025_04_07_091628_add_field_to_our_waters_table', 15),
(31, '2025_04_07_091838_add_field_to_blogs_table', 15),
(32, '2025_04_07_100623_add_feild_to_them_settings_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ourcompanys`
--

CREATE TABLE `ourcompanys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description_kh` longtext DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `active_status` varchar(255) NOT NULL DEFAULT '1' COMMENT '1 for active and 0 for inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ourcompanys`
--

INSERT INTO `ourcompanys` (`id`, `description_kh`, `description_en`, `active_status`, `created_at`, `updated_at`) VALUES
(1, '<p><span style=\"font-size: 14.98px;\"><b>ទឹកពិសា HI TECH </b>ត្រូវបានបង្កើតឡើងក្នុងឆ្នាំ 2001 និងទទួលបានអាជ្ញាប័ណ្ណពីក្រសួងពាណិជ្ជកម្ម និងក្រសួងឧស្សាហកម្ម រ៉ែ និងថាមពល។ នៅឆ្នាំ 2005 <b>HI TECH DRINKING WATER</b> បានក្លាយជាក្រុមហ៊ុនទឹកដំបូងដែលទទួលស្គាល់ដោយស្តង់ដារកម្ពុជា (CS009:2005)។</span></p><p><span style=\"font-size: 14.98px;\">ដោយសារទីផ្សារកាន់តែមានការប្រកួតប្រជែង និងការប្រកួតប្រជែងកាន់តែខ្លាំង ក្រុមហ៊ុនបានសម្រេចចិត្តដាក់ពាក្យសុំការធានាគុណភាពស្តង់ដារអន្តរជាតិដែលគេស្គាល់ថាជាអង្គការស្តង់ដារអន្តរជាតិ (ISO) និងចំណុចត្រួតពិនិត្យសំខាន់ៗនៃការវិភាគគ្រោះថ្នាក់ក្នុងឆ្នាំ 2009។ ក្រុមហ៊ុនក៏បានទទួលស្គាល់វិញ្ញាបនបត្រនៃប្រព័ន្ធគ្រប់គ្រងគុណភាព (ISO9001:2015) ដោយការគ្រប់គ្រងគុណភាព UKAS ប្រព័ន្ធគ្រប់គ្រងគុណភាព 100IS (Certificate of food1022) អង្គការ JAS-ANZ ។</span></p>', '<p style=\"margin-bottom: 1.5em;\"><b>HI TECH DRINKING WATER</b> was established in 2001 and licensed by Ministry of Commerce and Ministry of Industry, Mine and Energy. In 2005,<b> HI TECH DRINKING WATER</b> became the first water company accredited by Cambodian Standard (CS009:2005).</p><p style=\"margin-bottom: 1.5em;\">Since the market was increasingly more competitive and more challenging, the company decided to apply for international quality standard assurance known as International Standard Organization (ISO) and Hazard Analysis Critical Control Points in 2009. The company has also accredited Certificate of quality management system (ISO9001:2015) by UKAS quality management, Certificate of food quality management system (ISO22000:2018) by JAS-ANZ organization.</p>', '1', NULL, '2025-03-28 08:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `our_waters`
--

CREATE TABLE `our_waters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bottle` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_kh` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `description_kh` varchar(255) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for active and 0 for inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_waters`
--

INSERT INTO `our_waters` (`id`, `bottle`, `title`, `title_kh`, `description`, `description_kh`, `active_status`, `created_at`, `updated_at`) VALUES
(1, '250ml', 'For casual day', 'សម្រាប់ថ្ងៃធម្មតា', '350ml water is suitable for daily consumption as well as in any occasions such as meeting, wedding ceremony, party, travelling, sports and other purposes. Hi-tech drinking water fulfills your need of pure water in every moment.', 'ទឹក 350ml សាកសមសម្រាប់ប្រើប្រាស់ប្រចាំថ្ងៃ ក៏ដូចជាក្នុងឱកាសណាមួយដូចជា កិច្ចប្រជុំ ពិធីមង្គលការ ជប់លៀង ការធ្វើដំណើរ កីឡា និងគោលបំណងផ្សេងៗទៀត។ ទឹកពិសាបច្ចេកវិទ្យាទំនើបបំពេញតម្រូវការទឹកសុទ្ធរបស់អ្នកគ្រប់ពេល។', 1, '2025-03-21 01:57:02', '2025-04-07 02:37:20'),
(2, '350ml', 'For more compact\n', NULL, '350ml water is suitable for daily consumption as well as in any occasions such as meeting, wedding ceremony, party, travelling, sports and other purposes. Hi-tech drinking water fulfills your need of pure water in every moment.', NULL, 1, '2025-03-31 04:42:48', '2025-04-04 08:40:04'),
(3, '600ml', 'For travelling', NULL, 'description', NULL, 1, '2025-03-31 04:45:54', '2025-04-04 08:40:31'),
(4, '1500ml', 'For travelling', NULL, 'description', NULL, 1, '2025-03-31 04:47:54', '2025-04-04 08:40:48'),
(5, '20L', 'For home and office', NULL, '20 L water', NULL, 1, '2025-03-31 04:48:17', '2025-04-04 08:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'create our waters', 'Mr.Black', '2025-03-29 03:52:02', '2025-03-29 04:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `title_kh` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `sub_title_kh` varchar(255) DEFAULT NULL,
  `sub_title_en` varchar(255) DEFAULT NULL,
  `description_kh` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for active and 0 for inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `title_kh` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 0 COMMENT '1 for active and 0 for inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `img`, `title_kh`, `title_en`, `active_status`, `created_at`, `updated_at`) VALUES
(6, 'uploads/images/slides/AF8QBMhMIUNTEoN6jQ2DKmYRVzILGDBy4y8hZBCA.png', 'HI-Tech សម្រាប់សុខភាពរបស់អ្នក និងសុខុមាលភាព។', 'HI-Tech for your health and well-being.', 1, '2025-03-20 07:59:42', '2025-03-20 08:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social` varchar(255) DEFAULT NULL,
  `link_social` varchar(255) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for active and 0 for inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `social`, `link_social`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 'facebook', 'https://www.facebook.com/hitechforhealth', 1, '2025-03-25 10:39:44', '2025-03-25 10:39:44'),
(2, 'instagram', 'https://www.instagram.com/hitech_drinkingwater/', 1, '2025-03-25 10:40:03', '2025-03-25 10:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `societies`
--

CREATE TABLE `societies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `title_kh` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `description_kh` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for active and 0 for inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `societies`
--

INSERT INTO `societies` (`id`, `img`, `title_kh`, `title_en`, `description_kh`, `description_en`, `seo_title`, `seo_description`, `active_status`, `created_at`, `updated_at`) VALUES
(2, 'uploads/images/qzWz2V0fbCG3SCtcUlprHZTK0MOwjtLI3K5unbXq.jpg', 'ទំនួលខុសត្រូវសង្គមសាជីវកម្ម', 'Corporate social responsibility', 'ក្នុងកំឡុងពេលមានវិបត្តិ Covid-19 យើងបានបរិច្ចាគទឹកស្អាតរបស់យើងដល់ក្រសួងសុខាភិបាល និងខណ្ឌនានាក្នុងរាជធានីភ្នំពេញ ដល់ប្រជាពលរដ្ឋដែលមានតម្រូវការ ជាពិសេសអ្នកជំងឺ Covid-19។', 'During Covid-19 crisis, we have contributed our drinking water to Ministry of health and districts in Phnom Penh city to those who in needs and particularly Covid-19 patient.', 'Corporate social responsibility', 'During Covid-19 crisis, we have contributed our drinking water to Ministry of health and districts in Phnom Penh city to those who in needs and particularly Covid-19 patient.', 1, '2025-03-19 21:06:36', '2025-03-20 06:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `them_settings`
--

CREATE TABLE `them_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `decor` varchar(255) DEFAULT NULL,
  `water_bg` varchar(255) DEFAULT NULL,
  `footer_decor` varchar(255) DEFAULT NULL,
  `active_status` varchar(255) NOT NULL DEFAULT '1' COMMENT '1 for active and 0 for inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `them_settings`
--

INSERT INTO `them_settings` (`id`, `decor`, `water_bg`, `footer_decor`, `active_status`, `created_at`, `updated_at`) VALUES
(2, 'uploads/images/themes/05q5AX2TZs3QVpg37rI9NPSbCQEKBgDlWFmPBheB.png', 'uploads/images/themes/I1qUigUwCYTFQ1KGBTfi09q1CVq3eifDwYyns7Hz.png', 'uploads/images/themes/ZhEVY12Kv2hqvdeUxMKUczrZkADcVHeWQaHTPQpg.jpg', '1', '2025-04-05 09:12:23', '2025-04-07 04:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile`, `name`, `email`, `role`, `email_verified_at`, `password`, `active_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Mr.Black', 'admin@gmail.com', 'superadmin', NULL, '$2y$12$gNdIzOKif2G48KWow1BMjOkUU8Uava.jiYqcdoGwAVh710WZlK.pm', 1, NULL, '2025-03-18 03:53:00', '2025-04-01 02:59:57'),
(3, NULL, 'Mr.puthda', 'puthda@123', 'admin', NULL, '$2y$12$.HMZ0G3yl7Ohy6i0pknhSe5PniIVhLg7x6OQw2CFiTg5Ao/Ck5pRO', 1, NULL, '2025-03-28 01:52:39', '2025-04-07 04:20:03'),
(6, NULL, 'Voeurn Sokheng', 'sokheng3301', 'superadmin', NULL, '$2y$12$S9iHLLCVkIl/ofHu.tqEYOk3twJp36ZkuWnE7xS3zP9zfjXRLtCDe', 1, NULL, '2025-04-01 02:54:56', '2025-04-01 02:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_contacts`
--

CREATE TABLE `user_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_contacts`
--

INSERT INTO `user_contacts` (`id`, `name`, `email`, `subject`, `phone`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Mr.Black', 'mrblack@gmail.com', 'Hello superadmin', '01245866', 'Hello superadmin', '2025-04-05 07:07:39', '2025-04-05 07:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_visits`
--

CREATE TABLE `user_visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `visited_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vissionmissions`
--

CREATE TABLE `vissionmissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_kh` longtext DEFAULT NULL,
  `text_en` longtext DEFAULT NULL,
  `active_status` varchar(255) NOT NULL DEFAULT '1' COMMENT '1 for active and 0 for inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vissionmissions`
--

INSERT INTO `vissionmissions` (`id`, `text_kh`, `text_en`, `active_status`, `created_at`, `updated_at`) VALUES
(1, '<h3 class=\"\">ចក្ខុវិស័យ</h3><p class=\"\">ដើម្បីក្លាយជាទឹកផឹកឈានមុខគេ និងមានការទទួលស្គាល់ជាអន្តរជាតិនៅកម្ពុជា ដើម្បីផ្តល់ទឹកគុណភាពខ្ពស់ សេវាកម្មដឹកជញ្ជូនលឿនបំផុត និងតម្លៃសមរម្យ។</p><h3 class=\"\">បេសកកម្ម</h3><p class=\"\">ដើម្បីក្លាយជាទឹកផឹកឈានមុខគេ និងមានការទទួលស្គាល់ជាអន្តរជាតិនៅកម្ពុជា ដើម្បីផ្តល់ទឹកគុណភាពខ្ពស់ សេវាកម្មដឹកជញ្ជូនលឿនបំផុត និងតម្លៃសមរម្យ។</p>', '<h3 class=\"\">Vision</h3><p style=\"margin-bottom: 1.5em;\">To be one of the leading and internationally recognized drinking water in Cambodia <span style=\"font-size: 1.07rem; font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">To provide highest quality water, fastest delivery service and a</span><span style=\"font-size: 1.07rem; font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">ffordable price</span></p><h3 class=\"\" style=\"margin-top: 0em; line-height: 1.28571em;\">Mission</h3><p style=\"margin-bottom: 1.5em;\">To be one of the leading and internationally recognized drinking water in Cambodia <span style=\"font-size: 1.07rem; font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">To provide highest quality water, fastest delivery service and a</span><span style=\"font-size: 1.07rem; font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">ffordable price</span></p>', '1', NULL, '2025-03-28 08:21:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accreditations`
--
ALTER TABLE `accreditations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_informations`
--
ALTER TABLE `company_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_values`
--
ALTER TABLE `core_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_massages`
--
ALTER TABLE `em_massages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `ourcompanys`
--
ALTER TABLE `ourcompanys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_waters`
--
ALTER TABLE `our_waters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `societies`
--
ALTER TABLE `societies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `them_settings`
--
ALTER TABLE `them_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_contacts`
--
ALTER TABLE `user_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_visits`
--
ALTER TABLE `user_visits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vissionmissions`
--
ALTER TABLE `vissionmissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `accreditations`
--
ALTER TABLE `accreditations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company_informations`
--
ALTER TABLE `company_informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_values`
--
ALTER TABLE `core_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `em_massages`
--
ALTER TABLE `em_massages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ourcompanys`
--
ALTER TABLE `ourcompanys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `our_waters`
--
ALTER TABLE `our_waters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `societies`
--
ALTER TABLE `societies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `them_settings`
--
ALTER TABLE `them_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_contacts`
--
ALTER TABLE `user_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_visits`
--
ALTER TABLE `user_visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vissionmissions`
--
ALTER TABLE `vissionmissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
