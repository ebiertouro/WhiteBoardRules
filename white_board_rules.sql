-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 09:49 PM
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
-- Database: `white_board_rules`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(11) NOT NULL,
  `assignment_name` varchar(50) NOT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignment_id`, `assignment_name`, `subject_id`) VALUES
(123, 'Science Fair', 6),
(124, 'Homework 1', 6),
(125, 'Lab Report 1', 6),
(126, 'Plant Observation', 6),
(127, 'Cell Model Project', 6),
(128, 'DNA Extraction Lab', 6),
(129, 'Field Trip Reflection', 6),
(130, 'Animal Behavior Report', 6),
(131, 'Microscope Quiz', 6),
(132, 'Test 1', 6),
(133, 'Class Presentation', 6),
(134, 'Homework 2', 6),
(135, 'Homework 3', 6),
(136, 'Lab Report 2', 6),
(137, 'Test 2', 6),
(138, 'Test 3', 6),
(139, 'Colonial America Report', 5),
(140, 'Revolutionary War Essay', 5),
(141, 'Civil War Timeline', 5),
(142, 'Great Depression Analysis', 5),
(143, 'World War II Summary', 5),
(144, 'Civil Rights Movement Project', 5),
(145, 'Presidential Biographies', 5),
(146, 'Cold War Presentation', 5),
(147, 'Native American History', 5),
(148, 'Current Events Report', 5),
(149, 'Periodic Table Quiz', 3),
(150, 'Chemical Reactions Lab', 3),
(151, 'Acid-Base Titration', 3),
(152, 'Organic Compounds Study', 3),
(153, 'Electrochemistry Assignment', 3),
(154, 'Molecular Geometry', 3),
(155, 'Stoichiometry Problems', 3),
(156, 'Thermodynamics Report', 3),
(157, 'Gas Laws Experiment', 3),
(158, 'Kinetics Homework', 3),
(159, 'Book Report', 2),
(160, 'Shakespeare Analysis', 2),
(161, 'Poetry Anthology', 2),
(162, 'Persuasive Essay', 2),
(163, 'Narrative Writing', 2),
(164, 'Literature Review', 2),
(165, 'Research Paper', 2),
(166, 'Creative Writing', 2),
(167, 'Grammar Exercises', 2),
(168, 'Vocabulary Quiz', 2),
(169, 'Triangles Worksheet', 7),
(170, 'Circle Theorems', 7),
(171, 'Coordinate Geometry', 7),
(172, 'Proofs Assignment', 7),
(173, 'Volume Calculation', 7),
(174, 'Surface Area Problems', 7),
(175, 'Angles and Lines', 7),
(176, 'Transformation Quiz', 7),
(177, 'Congruence Theorems', 7),
(178, 'Similarity Study', 7),
(179, 'Ancient Civilizations Report', 4),
(180, 'Medieval Europe Essay', 4),
(181, 'Renaissance Presentation', 4),
(182, 'Exploration Timeline', 4),
(183, 'Industrial Revolution Analysis', 4),
(184, 'World War I Study', 4),
(185, 'Cold War Research', 4),
(186, 'Post-Colonialism Essay', 4),
(187, 'Globalization Impact', 4),
(188, 'Current Global Issues', 4),
(189, 'Cooking Basics', 9),
(190, 'Sewing Project', 9),
(191, 'Budgeting Assignment', 9),
(192, 'Nutrition Study', 9),
(193, 'Child Development', 9),
(194, 'Household Management', 9),
(195, 'Interior Design', 9),
(196, 'Family Dynamics', 9),
(197, 'Health and Wellness', 9),
(198, 'Culinary Arts', 9),
(199, 'Algebra Problems', 1),
(200, 'Calculus Homework', 1),
(201, 'Statistics Project', 1),
(202, 'Trigonometry Quiz', 1),
(203, 'Probability Exercises', 1),
(204, 'Number Theory', 1),
(205, 'Geometry Proofs', 1),
(206, 'Graphing Equations', 1),
(207, 'Matrix Operations', 1),
(208, 'Linear Algebra', 1),
(209, 'Angle Measures', 8),
(210, 'Trigonometric Functions', 8),
(211, 'Unit Circle Quiz', 8),
(212, 'Graphing Trig Functions', 8),
(213, 'Trigonometric Identities', 8),
(214, 'Law of Sines', 8),
(215, 'Law of Cosines', 8),
(216, 'Polar Coordinates', 8),
(217, 'Complex Numbers', 8),
(218, 'Vectors Assignment', 8),
(219, 'Vertical Angles Proof', 7);

-- --------------------------------------------------------

--
-- Table structure for table `authorizedusers`
--

CREATE TABLE `authorizedusers` (
  `au_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` enum('administrator','teacher') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authorizedusers`
--

INSERT INTO `authorizedusers` (`au_id`, `username`, `password`, `user_type`) VALUES
(1, 'user1', 'pass1', 'administrator'),
(18, 'slyfox', 'trickyfox', 'teacher'),
(21, 'newteacher', 'newteachernow', 'teacher'),
(22, 'lielshkap', 'lielliel', 'teacher'),
(24, 'chaimboruch', 'chaya5888', 'teacher'),
(30, 'calico', 'critterland', 'teacher'),
(31, 'slitherysnake', 'scaleysnake', 'teacher'),
(32, 'chanamenucha', '1342avem', 'teacher'),
(33, 'SuperMorah', 'Roshchodesh1', 'teacher'),
(37, 'rachelbier22', 'thelazyrestofus', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `subject_id` int(11) NOT NULL,
  `snark_level` varchar(50) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`subject_id`, `snark_level`, `comment`, `grade`, `comment_id`) VALUES
(1, 'Neutral', 'Demonstrating satisfactory progress in Math.', 'C', 1),
(1, 'Neutral', 'Grasping mathematical concepts effectively.', 'B', 2),
(1, 'Neutral', 'Understanding fundamental Math principles.', 'A', 3),
(1, 'Neutral', 'Struggling a bit with Math concepts.', 'D', 4),
(1, 'Neutral', 'Facing challenges in Math. Keep pushing!', 'F', 5),
(1, 'Sweet', 'Making strides in Math! Keep up the great work!', 'C', 6),
(1, 'Sweet', 'Impressive improvement in Math. Well done!', 'B', 7),
(1, 'Sweet', 'Thriving in Math! Your efforts are paying off!', 'A', 8),
(1, 'Sweet', 'Showing determination in Math. Let\'s keep pushing!', 'D', 9),
(1, 'Sweet', 'Struggling a bit with Math. Keep pushing, you\'ll get there!', 'F', 10),
(1, 'Gushing', 'Showing great improvement in Math. Keep up the hard work!', 'D', 11),
(1, 'Gushing', 'Despite challenges, your efforts in Math are truly commendable!', 'F', 12),
(1, 'Snarky', 'Looks like Math isn\'t your cup of tea. Keep trying!', 'C', 13),
(1, 'Snarky', 'Math is a challenge, but you\'ll get there eventually!', 'B', 14),
(1, 'Snarky', 'Math? More like \"Math-ematical\" mysteries!', 'A', 15),
(1, 'Snarky', 'Looks like you missed the boat on this one.', 'D', 16),
(1, 'Snarky', 'Looks like you missed the boat on this one.', 'F', 17),
(1, 'Acidic', 'Did you even attempt the test or just doodle on the paper?', 'C', 18),
(1, 'Acidic', 'Did you copy from the smart kid or just cheat off Google?', 'B', 19),
(1, 'Acidic', 'Did you bribe the teacher or blackmail them?', 'A', 20),
(1, 'Acidic', 'Did you confuse numbers with letters or just give up?', 'D', 21),
(1, 'Acidic', 'Did you study with a calculator or a magic 8-ball?', 'F', 22),
(2, 'Sweet', 'Thriving in English! Your efforts are paying off!', 'A', 23),
(2, 'Sweet', 'Impressive improvement in English. Well done!', 'B', 24),
(2, 'Sweet', 'Making strides in English! Keep up the great work!', 'C', 25),
(2, 'Sweet', 'Showing determination in English. Let\'s keep pushing!', 'D', 26),
(2, 'Sweet', 'Struggling a bit with English. Keep pushing, you\'ll get there!', 'F', 27),
(2, 'Gushing', 'English prowess at its finest! Well done!', 'A', 28),
(2, 'Gushing', 'Your command of English is extraordinary. Keep it up!', 'B', 29),
(2, 'Gushing', 'You\'re mastering English like Shakespeare himself! Bravo!', 'C', 30),
(2, 'Gushing', 'Even in adversity, your English shines brightly! Well done!', 'D', 31),
(2, 'Gushing', 'Despite challenges, your English proficiency remains admirable!', 'F', 32),
(2, 'Neutral', 'Understanding fundamental English principles.', 'A', 33),
(2, 'Neutral', 'Grasping literary concepts effectively.', 'B', 34),
(2, 'Neutral', 'Demonstrating satisfactory progress in English.', 'C', 35),
(2, 'Neutral', 'Struggling a bit with English concepts.', 'D', 36),
(2, 'Neutral', 'Facing challenges in English. Keep pushing!', 'F', 37),
(2, 'Snarky', 'English can be quite the puzzle, but you\'re navigating it well!', 'A', 38),
(2, 'Snarky', 'Looks like English isn\'t your cup of tea. Keep trying!', 'B', 39),
(2, 'Snarky', 'English? More like \"English\" mysteries!', 'C', 40),
(2, 'Snarky', 'Seems like English poses a bit of a challenge for you!', 'D', 41),
(2, 'Snarky', 'Looks like you missed the mark on this one.', 'F', 42),
(2, 'Acidic', 'Did you bribe the teacher or blackmail them?', 'A', 43),
(2, 'Acidic', 'Did you copy from the smart kid or just cheat off Wikipedia?', 'B', 44),
(2, 'Acidic', 'Did you even attempt the essay or just doodle on the paper?', 'C', 45),
(2, 'Acidic', 'Did you confuse Shakespeare with Dr. Seuss or just give up?', 'D', 46),
(2, 'Acidic', 'Did you study with a dictionary or a comic book?', 'F', 47),
(5, 'Sweet', 'Nailing American History! Your dedication is admirable!', 'A', 48),
(5, 'Sweet', 'Impressive mastery of American History. Well done!', 'B', 49),
(5, 'Sweet', 'Making great progress in American History! Keep it up!', 'C', 50),
(5, 'Sweet', 'Demonstrating determination in American History. Keep pushing!', 'D', 51),
(5, 'Sweet', 'Struggling with American History? Keep pushing, you\'ll get there!', 'F', 52),
(5, 'Gushing', 'Your understanding of American History is outstanding! Bravo!', 'A', 53),
(5, 'Gushing', 'Exceptional performance in American History. Keep it up!', 'B', 54),
(5, 'Gushing', 'You\'re mastering American History like a pro! Well done!', 'C', 55),
(5, 'Gushing', 'Despite challenges, your American History skills shine bright!', 'D', 56),
(5, 'Gushing', 'Your perseverance in American History is truly commendable!', 'F', 57),
(5, 'Neutral', 'Grasping American History concepts effectively.', 'A', 58),
(5, 'Neutral', 'Understanding basic American History principles.', 'B', 59),
(5, 'Neutral', 'Making satisfactory progress in American History.', 'C', 60),
(5, 'Neutral', 'Encountering difficulties with American History concepts.', 'D', 61),
(5, 'Neutral', 'Facing challenges in American History. Keep pushing!', 'F', 62),
(5, 'Snarky', 'Achieving an A in American History without knowing who the Founding Fathers were? Impressive.', 'A', 63),
(5, 'Snarky', 'Struggling with American History? It\'s like forgetting the lyrics to the national anthem.', 'B', 64),
(5, 'Snarky', 'Looks like you need a history lesson.', 'C', 65),
(5, 'Snarky', 'Looks like you missed the mark on this one. Did you think the Boston Tea Party was a picnic?', 'D', 66),
(5, 'Snarky', 'Looks like you missed the mark on this one. Maybe try watching more historical documentaries.', 'F', 67),
(5, 'Acidic', 'Did you mistake George Washington for a character in a movie?', 'A', 68),
(5, 'Acidic', 'Did you think the Civil War was fought over whose turn it was to cook dinner?', 'B', 69),
(5, 'Acidic', 'Did you get your history from a fortune cookie or a reliable source?', 'C', 70),
(5, 'Acidic', 'Did you confuse the Declaration of Independence with your shopping list?', 'D', 71),
(5, 'Acidic', 'Did you think the Statue of Liberty was holding a smartphone?', 'F', 72),
(6, 'Sweet', 'The analysis of cellular processes in this paper is truly commendable. Keep up the stellar work!', 'A', 73),
(6, 'Sweet', 'Solid effort in discussing genetic variation. Well done!', 'B', 74),
(6, 'Sweet', 'You\'ve covered the basics of biological diversity quite well. Keep building on this foundation!', 'C', 75),
(6, 'Sweet', 'There\'s potential in your discussion of ecological interactions. Keep studying to strengthen your understanding.', 'D', 76),
(6, 'Sweet', 'You\'re starting to grasp the basics of biological classification. Keep working at it!', 'F', 77),
(6, 'Gushing', 'Your grasp of complex biological concepts is impressive! Your analysis of cellular processes demonstrates a deep understanding.', 'A', 78),
(6, 'Gushing', 'Your understanding of genetic variation is evident in your detailed analysis. Great job!', 'B', 79),
(6, 'Gushing', 'Your understanding of biological diversity is coming along nicely. Keep up the good work!', 'C', 80),
(6, 'Gushing', 'Your effort in discussing ecological interactions is noted. Continue to work on expanding your understanding.', 'D', 81),
(6, 'Gushing', 'With more practice, you\'ll improve your understanding of biological classification. Keep pushing forward!', 'F', 82),
(6, 'Neutral', 'Your analysis of cellular processes shows good understanding.', 'A', 83),
(6, 'Neutral', 'Your discussion of genetic variation is well-presented.', 'B', 84),
(6, 'Neutral', 'Your exploration of biological diversity is adequately addressed.', 'C', 85),
(6, 'Neutral', 'Your understanding of ecological interactions is developing.', 'D', 86),
(6, 'Neutral', 'Your attempt at biological classification is acknowledged.', 'F', 87),
(7, 'Sweet', 'Nailing Geometry! Your dedication is admirable!', 'A', 98),
(7, 'Sweet', 'Impressive mastery of Geometry. Well done!', 'B', 99),
(7, 'Sweet', 'Making great progress in Geometry! Keep it up!', 'C', 100),
(7, 'Sweet', 'Demonstrating determination in Geometry. Keep pushing!', 'D', 101),
(7, 'Sweet', 'Struggling with Geometry? Keep pushing, you\'ll get there!', 'F', 102),
(7, 'Gushing', 'Your understanding of Geometry is outstanding! Bravo!', 'A', 103),
(7, 'Gushing', 'Exceptional performance in Geometry. Keep it up!', 'B', 104),
(7, 'Gushing', 'You\'re mastering Geometry like a pro! Well done!', 'C', 105),
(7, 'Gushing', 'Despite challenges, your Geometry skills shine bright!', 'D', 106),
(7, 'Gushing', 'Your perseverance in Geometry is truly commendable!', 'F', 107),
(7, 'Neutral', 'Grasping Geometry concepts effectively.', 'A', 108),
(7, 'Neutral', 'Understanding basic Geometry principles.', 'B', 109),
(7, 'Neutral', 'Making satisfactory progress in Geometry.', 'C', 110),
(7, 'Neutral', 'Encountering difficulties with Geometry concepts.', 'D', 111),
(7, 'Neutral', 'Facing challenges in Geometry. Keep pushing!', 'F', 112),
(7, 'Snarky', 'Achieving an A in Geometry without knowing the difference between a triangle and a trapezoid? Impressive.', 'A', 113),
(7, 'Snarky', 'Struggling with Geometry? It\'s like trying to fold a map.', 'B', 114),
(7, 'Snarky', 'Geometry? More like \"Geo-maybetry\". Looks like you need a compass and a map.', 'C', 115),
(7, 'Snarky', 'Looks like you missed the mark on this one. Did you think a rhombus was a rare exotic fruit?', 'D', 116),
(7, 'Snarky', 'Looks like you missed the mark on this one. Maybe try building a fort out of shapes.', 'F', 117),
(7, 'Acidic', 'Did you think the Pythagorean theorem was a new form of pizza?', 'A', 118),
(7, 'Acidic', 'Did you confuse a protractor with a frisbee?', 'B', 119),
(7, 'Acidic', 'Did you think \"congruent\" meant \"coincidental\"?', 'C', 120),
(7, 'Acidic', 'Did you mistake an angle for a corner?', 'D', 121),
(7, 'Acidic', 'Did you try to measure the area of a circle with a ruler?', 'F', 122),
(4, 'Sweet', 'Nailing Global History! Your dedication is admirable!', 'A', 123),
(4, 'Sweet', 'Impressive mastery of Global History. Well done!', 'B', 124),
(4, 'Sweet', 'Making great progress in Global History! Keep it up!', 'C', 125),
(4, 'Sweet', 'Demonstrating determination in Global History. Keep pushing!', 'D', 126),
(4, 'Sweet', 'Struggling with Global History? Keep pushing, you\'ll get there!', 'F', 127),
(4, 'Gushing', 'Your understanding of Global History is outstanding! Bravo!', 'A', 128),
(4, 'Gushing', 'Exceptional performance in Global History. Keep it up!', 'B', 129),
(4, 'Gushing', 'You\'re mastering Global History like a pro! Well done!', 'C', 130),
(4, 'Gushing', 'Despite challenges, your Global History skills shine bright!', 'D', 131),
(4, 'Gushing', 'Your perseverance in Global History is truly commendable!', 'F', 132),
(4, 'Neutral', 'Grasping Global History concepts effectively.', 'A', 133),
(4, 'Neutral', 'Understanding basic Global History principles.', 'B', 134),
(4, 'Neutral', 'Making satisfactory progress in Global History.', 'C', 135),
(4, 'Neutral', 'Encountering difficulties with Global History concepts.', 'D', 136),
(4, 'Neutral', 'Facing challenges in Global History. Keep pushing!', 'F', 137),
(4, 'Snarky', 'Achieving an A in Global History without knowing the difference between the Renaissance and the Middle Ages? Impressive.', 'A', 138),
(4, 'Snarky', 'Struggling with Global History? It\'s like trying to decipher hieroglyphs without a Rosetta Stone.', 'B', 139),
(4, 'Snarky', 'Global History? More like \"Glo-baloney\". Looks like you need a world tour.', 'C', 140),
(4, 'Snarky', 'Looks like you missed the mark on this one. Did you think Genghis Khan was a contemporary fashion designer?', 'D', 141),
(4, 'Snarky', 'Looks like you missed the mark on this one. Maybe try watching more historical documentaries.', 'F', 142),
(4, 'Acidic', 'Did you think the fall of Rome was a new reality TV show?', 'A', 143),
(4, 'Acidic', 'Did you confuse Napoleon Bonaparte with Napoleon Dynamite?', 'B', 144),
(4, 'Acidic', 'Did you think the Magna Carta was a Starbucks order?', 'C', 145),
(4, 'Acidic', 'Did you mistake the Silk Road for a clothing store?', 'D', 146),
(4, 'Acidic', 'Did you try to build a time machine with a history textbook?', 'F', 147),
(3, 'Sweet', 'Nailing Chemistry! Your dedication is admirable!', 'A', 148),
(3, 'Sweet', 'Impressive mastery of Chemistry. Well done!', 'B', 149),
(3, 'Sweet', 'Making great progress in Chemistry! Keep it up!', 'C', 150),
(3, 'Sweet', 'Demonstrating determination in Chemistry. Keep pushing!', 'D', 151),
(3, 'Sweet', 'Struggling with Chemistry? Keep pushing, you\'ll get there!', 'F', 152),
(3, 'Gushing', 'Your understanding of Chemistry is outstanding! Bravo!', 'A', 153),
(3, 'Gushing', 'Exceptional performance in Chemistry. Keep it up!', 'B', 154),
(3, 'Gushing', 'You\'re mastering Chemistry like a pro! Well done!', 'C', 155),
(3, 'Gushing', 'Despite challenges, your Chemistry skills shine bright!', 'D', 156),
(3, 'Gushing', 'Your perseverance in Chemistry is truly commendable!', 'F', 157),
(3, 'Neutral', 'Grasping Chemistry concepts effectively.', 'A', 158),
(3, 'Neutral', 'Understanding basic Chemistry principles.', 'B', 159),
(3, 'Neutral', 'Making satisfactory progress in Chemistry.', 'C', 160),
(3, 'Neutral', 'Encountering difficulties with Chemistry concepts.', 'D', 161),
(3, 'Neutral', 'Facing challenges in Chemistry. Keep pushing!', 'F', 162),
(3, 'Snarky', 'Achieving an A in Chemistry without even causing an explosion? That takes skill.', 'A', 163),
(3, 'Snarky', 'Struggling with Chemistry? It\'s like speaking a foreign language - except you\'re not fluent.', 'B', 164),
(3, 'Snarky', 'Chemistry? More like \"Chemystery\"! Looks like you\'ve got a puzzle to solve.', 'C', 165),
(3, 'Snarky', 'Looks like you missed the mark on this one. Chemistry isn\'t just about mixing random substances - or is it?', 'D', 166),
(3, 'Snarky', 'Looks like you missed the mark on this one. Maybe you should stick to making lava lamps - less room for error.', 'F', 167),
(3, 'Acidic', 'Did you mix up your chemicals or your brain cells?', 'A', 168),
(3, 'Acidic', 'Did you copy from the smart kid or just hope for the best?', 'B', 169),
(3, 'Acidic', 'Did you even attempt the experiment or just enjoy the explosions?', 'C', 170),
(3, 'Acidic', 'Did you confuse the periodic table with a restaurant menu?', 'D', 171),
(3, 'Acidic', 'Did you study with a chemistry set or a toy set? Maybe it\'s time to upgrade.', 'F', 172),
(8, 'Sweet', 'Nailing Trigonometry! Your dedication is admirable!', 'A', 173),
(8, 'Sweet', 'Impressive mastery of Trigonometry. Well done!', 'B', 174),
(8, 'Sweet', 'Making great progress in Trigonometry! Keep it up!', 'C', 175),
(8, 'Sweet', 'Demonstrating determination in Trigonometry. Keep pushing!', 'D', 176),
(8, 'Sweet', 'Struggling with Trigonometry? Keep pushing, you\'ll get there!', 'F', 177),
(8, 'Gushing', 'Your understanding of Trigonometry is outstanding! Bravo!', 'A', 178),
(8, 'Gushing', 'Exceptional performance in Trigonometry. Keep it up!', 'B', 179),
(8, 'Gushing', 'You\'re mastering Trigonometry like a pro! Well done!', 'C', 180),
(8, 'Gushing', 'Despite challenges, your Trigonometry skills shine bright!', 'D', 181),
(8, 'Gushing', 'Your perseverance in Trigonometry is truly commendable!', 'F', 182),
(8, 'Neutral', 'Grasping Trigonometry concepts effectively.', 'A', 183),
(8, 'Neutral', 'Understanding basic Trigonometry principles.', 'B', 184),
(8, 'Neutral', 'Making satisfactory progress in Trigonometry.', 'C', 185),
(8, 'Neutral', 'Encountering difficulties with Trigonometry concepts.', 'D', 186),
(8, 'Neutral', 'Facing challenges in Trigonometry. Keep pushing!', 'F', 187),
(8, 'Snarky', 'Achieving an A in Trigonometry without knowing the difference between sine and cosine? Impressive.', 'A', 188),
(8, 'Snarky', 'Struggling with Trigonometry? It\'s like trying to find your way out of a circular maze.', 'B', 189),
(8, 'Snarky', 'Trigonometry? More like \"Tri-gonna-fail-ometry\". Looks like you need a compass and a protractor.', 'C', 190),
(8, 'Snarky', 'Looks like you missed the mark on this one. Did you think tangent was just another word for \"leaning\"?', 'D', 191),
(8, 'Snarky', 'Looks like you missed the mark on this one. Maybe try thinking of triangles as delicious slices of pie.', 'F', 192),
(8, 'Acidic', 'Did you think the unit circle was a clock? Well, at least you can tell time.', 'A', 193),
(8, 'Acidic', 'Did you confuse radians with radiation?  Don\'t worry, your lack of precision won\'t cause a meltdown. Probably.', 'B', 194),
(8, 'Acidic', 'Did you think \"sin\" was just a typo of \"sun\"?', 'C', 195),
(8, 'Acidic', 'Did you mistake a right triangle for a rectangle?', 'D', 196),
(8, 'Acidic', 'Did you try to use Pythagoras\' theorem to find your way out of a maze?', 'F', 197),
(9, 'Sweet', 'Nailing Home Economics! Your dedication is admirable!', 'A', 198),
(9, 'Sweet', 'Impressive mastery of Home Economics. Well done!', 'B', 199),
(9, 'Sweet', 'Making great progress in Home Economics! Keep it up!', 'C', 200),
(9, 'Sweet', 'Demonstrating determination in Home Economics. Keep pushing!', 'D', 201),
(9, 'Sweet', 'Struggling with Home Economics? Keep pushing, you\'ll get there!', 'F', 202),
(9, 'Gushing', 'Your understanding of Home Economics is outstanding! Bravo!', 'A', 203),
(9, 'Gushing', 'Exceptional performance in Home Economics. Keep it up!', 'B', 204),
(9, 'Gushing', 'You\'re mastering Home Economics like a pro! Well done!', 'C', 205),
(9, 'Gushing', 'Despite challenges, your Home Economics skills shine bright!', 'D', 206),
(9, 'Gushing', 'Your perseverance in Home Economics is truly commendable!', 'F', 207),
(9, 'Neutral', 'Grasping Home Economics concepts effectively.', 'A', 208),
(9, 'Neutral', 'Understanding basic Home Economics principles.', 'B', 209),
(9, 'Neutral', 'Making satisfactory progress in Home Economics.', 'C', 210),
(9, 'Neutral', 'Encountering difficulties with Home Economics concepts.', 'D', 211),
(9, 'Neutral', 'Facing challenges in Home Economics. Keep pushing!', 'F', 212),
(9, 'Snarky', 'Achieving an A in Home Economics without knowing how to boil water? Impressive.', 'A', 213),
(9, 'Snarky', 'Struggling with Home Economics? It\'s like trying to fold a fitted sheet.', 'B', 214),
(9, 'Snarky', 'Home Economics? More like \"Huh?-Economics\". Looks like you need a cooking class.', 'C', 215),
(9, 'Snarky', 'Looks like you missed the mark on this one. Did you think \"bake\" meant to take a nap?', 'D', 216),
(9, 'Snarky', 'Looks like you missed the mark on this one. Maybe try reading a recipe before attempting to cook.', 'F', 217),
(9, 'Acidic', 'Did you mistake a spatula for a fly swatter? It\'s a wonder you haven\'t injured yourself yet.', 'A', 218),
(9, 'Acidic', 'Did you think \'simmer\' was just a suggestion? Congratulations, you\'ve managed to avoid complete disaster. So far.', 'B', 219),
(9, 'Acidic', 'Did you confuse baking soda with flour?', 'C', 220),
(9, 'Acidic', 'Did you mistake the oven for a storage closet?', 'D', 221),
(9, 'Acidic', 'Did you try to use the blender without putting the lid on?', 'F', 222),
(1, 'Gushing', 'Your proficiency in Math is exemplary! Keep up the great work.', 'A', 223),
(1, 'Gushing', 'Your performance in Math shows consistent effort and understanding.', 'B', 224),
(1, 'Gushing', 'Mathematics is challenging, but you are making steady progress.', 'C', 225),
(6, 'Acidic', 'Your grasp of Biology concepts is adequate. Aim for deeper understanding.', 'A', 226),
(6, 'Snarky', 'Biology seems to be a bit of a puzzle for you. Let\'s work on that.', 'A', 227),
(6, 'Acidic', 'You\'re getting there in Biology, but there\'s room for improvement.', 'B', 228),
(6, 'Snarky', 'Navigating Biology is a challenge, but you\'re making strides.', 'B', 229),
(6, 'Acidic', 'Understanding Biology concepts requires more effort from you.', 'C', 230),
(6, 'Snarky', 'Biology is a complex subject, and your understanding needs refinement.', 'C', 231),
(6, 'Acidic', 'There are gaps in your Biology understanding that need attention.', 'D', 232),
(6, 'Snarky', 'Biology concepts are slipping through the cracks. Let\'s address this.', 'D', 233),
(6, 'Acidic', 'Your Biology performance needs significant improvement. Seek additional help.', 'F', 234),
(6, 'Snarky', 'Biology seems to be a struggle. Let\'s focus on improving your grasp.', 'F', 235),
(1, 'Neutral', 'Your understanding of Math concepts is solid.', 'A', 236),
(1, 'Neutral', 'You\'re maintaining a good grasp on Math.', 'B', 237),
(1, 'Neutral', 'Mathematics can be challenging, but you\'re handling it well.', 'C', 238),
(1, 'Neutral', 'Math requires more attention to detail from you.', 'D', 239),
(1, 'Neutral', 'Mathematics is posing significant challenges. Seek extra help.', 'F', 240);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `birthday`) VALUES
(253, 'Yaakov', 'Gerstein', '2014-10-14'),
(613, 'Yisroel', 'Taryag', '2006-05-02'),
(909, 'Alan', 'Kahan', '1968-05-12'),
(2369, 'Rina', 'Gross', '2010-04-11'),
(7981, 'Ilana', 'Shkap', '2024-06-13'),
(9119, 'Nechama', 'Dahan', '2005-11-18'),
(12345, 'Boruch', 'Klein', '2024-03-20'),
(12349, 'Jonah', 'Holland', '2010-06-23'),
(23456, 'Netzach', 'Alphabet', '1999-10-28'),
(90471, 'Victoria', 'Dweck', '2012-11-11'),
(259408, 'Shira', 'Yellen', '1990-06-15'),
(574938, 'Meir', 'Nobakov', '2008-09-27'),
(574941, 'Samantha', 'Friedman', '2000-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `student_assignments`
--

CREATE TABLE `student_assignments` (
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `Grade` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_assignments`
--

INSERT INTO `student_assignments` (`student_id`, `assignment_id`, `Grade`) VALUES
(253, 132, 87),
(253, 151, 81),
(253, 160, 92),
(253, 197, 90),
(613, 123, 99),
(613, 137, 100),
(613, 141, 80),
(613, 147, 96),
(613, 150, 90),
(613, 153, 105),
(613, 158, 89),
(613, 160, 98),
(613, 163, 96),
(613, 166, 89),
(613, 170, 100),
(613, 172, 100),
(613, 179, 95),
(613, 183, 98),
(613, 189, 97),
(613, 191, 98),
(613, 193, 110),
(613, 199, 89),
(613, 200, 67),
(613, 204, 102),
(613, 210, 68),
(613, 215, 72),
(2369, 123, 79),
(7981, 126, 4),
(12345, 123, 100),
(12349, 123, 78),
(90471, 123, 83),
(574938, 123, 90),
(574938, 157, 97),
(574938, 206, 78);

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_subject`
--

INSERT INTO `student_subject` (`student_id`, `subject_id`) VALUES
(253, 9),
(613, 1),
(613, 2),
(613, 3),
(613, 9),
(2369, 1),
(2369, 2),
(2369, 3),
(2369, 4),
(2369, 9),
(7981, 2),
(7981, 3),
(7981, 4),
(12345, 5),
(12349, 9),
(23456, 1),
(23456, 7),
(23456, 8),
(90471, 1),
(259408, 3),
(574938, 1),
(574938, 3),
(574941, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_name` varchar(50) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_name`, `subject_id`) VALUES
('Math', 1),
('English', 2),
('Chemistry', 3),
('Global History', 4),
('American History', 5),
('Biology', 6),
('Geometry', 7),
('Trigonometry', 8),
('Home Economics', 9);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `au_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `t_first_name` varchar(50) NOT NULL,
  `t_last_name` varchar(50) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `grade_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `au_id`, `email`, `username`, `t_first_name`, `t_last_name`, `school_name`, `grade_level`) VALUES
(6065, 30, 'calico@critterland.com', 'calico', 'Ruby', 'Rabbit', 'Bunny Acadamy', 'Middle School'),
(6066, 24, 'chaimb.shapiro99@gmail.com', 'chaimboruch', 'Chaim Boruch', 'Shapiro', 'Chaim Berlin', 'Undergraduate'),
(6067, 1, 'estherbier6@gmail.com', 'user1', 'Esther', 'Shapiro', 'Touro', 'Under Graduate'),
(6068, 18, 'sly@gmail.com', 'slyfox', 'Rusty', 'Whitetail', 'Bunny Academy', 'High School'),
(6070, 21, 'new@gmail.com', 'newteacher', 'Shira', 'Burnstein', 'Toras Emes', 'Middle School'),
(6071, 22, 'liel.shkap@gmail.com', 'lielshkap', 'Liel', 'Shkap', 'Bnos Yisroel', 'Elementary School'),
(6072, 31, 'snake@critterland.com', 'slitherysnake', 'Irene', 'Viper', 'Bunny Acadamy', 'Graduate'),
(6073, 32, 'chanam.shapiro@gmail.com', 'chanamenucha', 'Chana Menucha', 'Shapiro', 'Toras Emes', 'Elementary School'),
(6074, 33, 'csmtj145@gmail.com', 'SuperMorah', 'Chaya', 'Shapiro', 'Toras Emes', 'Elementary School'),
(6075, 37, 'rachelbier22@gmail.com', 'rachelbier22', 'Rachel', 'Bier', 'Cardozo Law', 'Graduate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `fk_subject_id` (`subject_id`);

--
-- Indexes for table `authorizedusers`
--
ALTER TABLE `authorizedusers`
  ADD PRIMARY KEY (`au_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_assignments`
--
ALTER TABLE `student_assignments`
  ADD PRIMARY KEY (`student_id`,`assignment_id`),
  ADD KEY `assignment_id_assignments` (`assignment_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`student_id`,`subject_id`),
  ADD KEY `subject_id_subjects` (`subject_id`),
  ADD KEY `student_id_students` (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `x_au_id` (`au_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `authorizedusers`
--
ALTER TABLE `authorizedusers`
  MODIFY `au_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=574942;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6076;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `fk_subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);

--
-- Constraints for table `student_assignments`
--
ALTER TABLE `student_assignments`
  ADD CONSTRAINT `assignment_id_assignments` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`assignment_id`),
  ADD CONSTRAINT `student_assignments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `au_id_au` FOREIGN KEY (`au_id`) REFERENCES `authorizedusers` (`au_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
