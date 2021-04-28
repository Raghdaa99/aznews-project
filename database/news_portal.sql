-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 06:34 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `full_name`) VALUES
(4, 'admin@gmail.com', '1234', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `featured` varchar(100) NOT NULL,
  `active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `pic`, `featured`, `active`) VALUES
(9, 'Fachion', 'all_images/1330article1.jpg', 'No', 'No'),
(17, 'Spotrs', 'all_images/3853section3.jpg', 'No', 'Yes'),
(19, 'Lifestyle', 'all_images/2923book1.jpg', 'Yes', 'Yes'),
(20, 'Travel', 'all_images/3475book3.jpg', 'No', 'Yes'),
(21, 'Technology', 'all_images/2205back.jpg', 'Yes', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `message` text NOT NULL,
  `comment_date` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `id_news`, `message`, `comment_date`, `id_user`) VALUES
(53, 6, 'wwww', 'Apr 10,2021 08:59 pm', 3),
(54, 6, 'orem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum d', 'Apr 10,2021 11:15 pm', 3),
(58, 8, 'rrrr', 'Apr 11,2021 01:00 am', 3),
(59, 14, 'hello every one', 'Apr 11,2021 07:10 pm', 3),
(60, 14, 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do ei', 'Apr 11,2021 07:23 pm', 4),
(62, 8, 'mmmmmmmmmmmmmm', 'Apr 11,2021 10:23 pm', 4),
(63, 12, 'ooooooooooo', 'Apr 11,2021 10:23 pm', 4),
(66, 27, 'Logic gates take two electric signals ', 'Apr 27,2021 08:32 pm', 4),
(68, 29, 'sed do eiusmod ipsum', 'Apr 28,2021 05:03 am', 7);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `full_name`, `email`, `message`, `subject`) VALUES
(1, 'Raghdaa', 'roroter199@gmail.com', 'Buttonwood, California.\r\nRosemead, CA 91770', 'welcome'),
(2, 'Raghdaa', 'raghdaa.s.abueida@gmail.com', 'Buttonwood, California.\r\nRosemead, CA 91770', 'welcome'),
(3, 'Raghdaa', 'roroter199@gmail.com', 'wwwwwwwww', 'welcome');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `featured` varchar(11) NOT NULL,
  `active` varchar(11) NOT NULL,
  `date_news` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `category_id`, `featured`, `active`, `date_news`) VALUES
(2, 'welcome to gaza welcome to gaza ', 'welcome to pal\r\nwelcome to pal\r\n\r\nwelcome to pal\r\n\r\nwelcome to pal\r\n', 'all_images/8367book2.jpg', 9, 'Yes', 'No', 'Apr,09 2021'),
(6, 'Welcome To The Best Model Winner Contest At Look of the year', 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum \r\nLorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum \r\nLorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum ', 'all_images/3940', 9, 'Yes', 'Yes', 'Apr,09 2021'),
(8, 'Welcome To The Best Model Winner Contest At Look of the year', 'My hero when I was a kid was my mom. Same for everyone I knew. Moms are untouchable. They’re elegant, smart, beautiful, kind…everything we want to be. At 29 years old, my favorite compliment is being told that I look like my mom. Seeing myself in her image, like this daughter up top, makes me so proud of how far I’ve come, and so thankful for where I come from. the refractor telescope uses a convex lens to focus the light on the eyepiece. The reflector telescope has a concave lens which means it bends in. It uses mirrors to focus the image that you eventually see. Collimation is a term for how well tuned the telescope is to give you a good clear image of what you are looking at. You want your telescope to have good collimation so you are not getting a false image of the celestial body. Aperture is a fancy word for how big the lens of your telescope is. But it’s an important word because the aperture of the lens is the key to how powerful your telescope is. Magnification has nothing to do with it, its all in the aperture. Focuser is the housing that keeps the eyepiece of the telescope, or what you will look through, in place. The focuser has to be stable and in good repair for you to have an image you can rely on. Mount and Wedge. Both of these terms refer to the tripod your telescope sits on. The mount is the actual tripod and the wedge is the device that lets you attach the telescope to the mount. Moms are like…buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen—from birth to school lunch.', 'all_images/5096back.jpg', 21, 'Yes', 'Yes', 'Apr,03 2019'),
(10, '12 best Mother’s Day flowers and bouquets to put a spring in her step', 'Welcome To The Best Model Winner Contest At Look of the year\r\nWelcome To The Best Model Winner Conte12 best Mother’s Day flowers and bouquets to put a spring in her stepv\r\n12 best Mother’s Day flowers and bouquets to put a spring in her step\r\n12 best Mother’s Day flowers and bouquets to put a spring in her step12 best Mother’s Day flowers and bouquets to put a spring in her step\r\n12 best Mother’s Day flowers and bouquets to put a spring in her step', 'all_images/4102', 9, 'Yes', 'Yes', 'Apr,09 2020'),
(12, 'Tahiti To Reopen To International Travel in May', 'Welcome To The Best Model Winner Contest At Look of the year\r\nWelcome To The Best Model Winner Conte\r\nTahiti To Reopen To International Travel in May\r\nTahiti To Reopen To International Travel in May\r\nTahiti To Reopen To International Travel in May', 'all_images/8196', 20, 'Yes', 'Yes', 'Apr,09 2021'),
(13, 'Every avid independent filmmaker', 'Every avid independent filmmaker has Bold about making that Italic interest documentary, or short film to show off their creative prowess. Many have great ideas and want to “wow” theSuperscript scene, or video renters with their big project. But once you have theSubscript “in the can” (no easy feat), how do you move from a Strike through of master DVDs with the “Underline” marked hand-written title inside a secondhand CD case, to a pile of cardboard boxes full of shiny new, retail-ready DVDs, with UPC barcodes and polywrap sitting on your doorstep? You need to create eye-popping artwork and have your project replicated. Using a reputable full service DVD Replication company like PacificDisc, Inc. to partner with is certainly a helpful option to ensure a professional end result, but to help with your DVD replication project, here are 4 easy steps to follow for good DVD replication results:', 'all_images/7306g8.jpg', 21, 'No', 'Yes', 'Apr,09 2021'),
(14, 'Get the Illusion of Fuller Lashes by “Mascng.”', 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit lorem ipsum dolor sitLorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit lorem ipsum dolor sit', 'all_images/4348g3.jpg', 19, 'Yes', 'Yes', 'Apr,10 2021'),
(15, 'IPL 2021: Rishabh Pant’s DC open season with seven-wicket win over MS Dhoni’s CSK', 'Your GX browser has been upgraded. Enjoy the web with these new features. Your GX browser has been upgraded. Enjoy the web with these new features.\r\nYour GX browser has been upgraded. Enjoy the web with these new features.\r\nYour GX browser has been upgraded. Enjoy the web with these new features.\r\nYour GX browser has been upgraded. Enjoy the web with these new features.', 'all_images/5417', 17, 'No', 'Yes', 'Apr,10 2021'),
(16, '. Moms are the ones who make sure things happen—from birth to school lunch.', 'My hero when I was a kid was my mom. Same for everyone I knew. Moms are untouchable. They’re elegant, smart, beautiful, kind…everything we want to be. At 29 years old, my favorite compliment is being told that I look like my mom. Seeing myself in her image, like this daughter up top, makes me so proud of how far I’ve come, and so thankful for where I come from. the refractor telescope uses a convex lens to focus the light on the eyepiece. The reflector telescope has a concave lens which means it bends in. It uses mirrors to focus the image that you eventually see. Collimation is a term for how well tuned the telescope is to give you a good clear image of what you are looking at. You want your telescope to have good collimation so you are not getting a false image of the', 'all_images/2840', 19, 'Yes', 'Yes', 'Apr,11 2021'),
(17, 'Every avid independent filmmaker has ', 'Every avid independent filmmaker has Bold about making that Italic interest documentary, or short film to show off their creative prowess. Many have great ideas and want to “wow” theSuperscript scene, or video renters with their big project. But once you have theSubscript “in the can” (no easy feat), how do you move from a Strike through of master DVDs with the “Underline” marked hand-written title inside a secondhand CD case, to a pile of cardboard boxes full of shiny new, retail-ready DVDs, with UPC barcodes and polywrap sitting on your doorstep? You need to create eye-popping artwork and have your project replicated. Using a reputable full service DVD Replication company like PacificDisc, Inc. to partner with is certainly a helpful option to ensure a professional end result, but to help with your DVD replication project, here are 4 easy steps to follow for good DVD replication results:', 'all_images/8427', 9, 'Yes', 'Yes', 'Apr,11 2021'),
(18, 'IPL 2021, SRH vs KKR Highlights: Nitish Rana stars in KKR’s 10-run win over SRH', 'IPL 2021, SRH vs KKR Highlights: Eoin Morgan’s Kolkata Knight Riders (KKR) beat Sunrisers Hyderabad (SRH) by 10 runs in their first game of the tournament. SRH’s run chase got off to a poor start as skipper David Warner and wicketkeeper-batsman Wriddhiman Saha got out for single-digit scores. Manish Pandey and Jonny Bairstow helped SRH recover with a 92-run partnership for the third wicket. Bairstow got out for 55 whereas Pandey remained unbeaten for 61. Despite Abdul Samad’s cameo, SRH fell short of the target by 10 runs. Prasidh Krishna picked up two wickets whereas Andre Russell, Pat Cummins and Shakib Al Hasan picked one wicket each.\r\n\r\nEarlier SRH skipper Warner won the toss and elected to field first. The plan did not work for Warner’s bowling unit as they leaked runs from the start. Nitish Rana dominated SRH bowlers and shared a 93-run partnership for the second wicket with Rahul Tripathi. Rana scored 80 whereas Tripathi scored 53. Rashid Khan was the pick of the bowlers as he took two wickets for just 24 runs. After the wicket of Rana, KKR’s lost the plot before the death overs. Morgan, Russell and Shakib managed to register single-digit scores. However, Dinesh Karthik was explosive in the end delivering for KKR with an unbeaten 9-ball 22. Karthik’s late cameo helped KKR post a total of 187 for the loss of six wickets. This is KKR’s highest total against SRH. Bhuvneshwar Kumar turned out to be the most expensive bowler giving 45 runs from his quota of four overs.', 'all_images/9854IPL-2021-Match-3-feature-Image.jpg', 17, 'Yes', 'Yes', 'Apr,11 2021'),
(19, 'Inter beats Cagliari 1-0 to continue march towards first Serie A title in more than a decade', 'Inter Milan continued its march to its first Serie A title in more than a decade as it beat relegation-threatened Cagliari 1-0 on Sunday.\r\n\r\nDefender Matteo Darmian scored the only goal of the match in the 77th minute as Inter found it tougher than expected against a side fighting for Serie A survival.\r\n\r\nCoach Antonio Conte ran onto the pitch to celebrate with his players as the goal restored Inter’s 11-point advantage over second-place AC Milan, which won 3-1 at Parma on Saturday.\r\n\r\nInter Milan continued its march to its first Serie A title in more than a decade as it beat relegation-threatened Cagliari 1-0 on Sunday.\r\n\r\nDefender Matteo Darmian scored the only goal of the match in the 77th minute as Inter found it tougher than expected against a side fighting for Serie A survival.\r\n\r\nCoach Antonio Conte ran onto the pitch to celebrate with his players as the goal restored Inter’s 11-point advantage over second-place AC Milan, which won 3-1 at Parma on Saturday.', 'all_images/8478opoyi__7KKsItC4.png', 17, 'Yes', 'Yes', 'Apr,11 2021'),
(20, 'Safe Motherhood Day: How to prepare for a safe IVF pregnancy', 'You may be told there is not much difference between a natural pregnancy and one through assisted reproductive technology (ART). One of the biggest differences is that in the case of a natural pregnancy, the woman may not be aware for about a month after conceiving the baby. In the case of an ART process, however, such as in-vitro fertilization (IVF), getting pregnant is a very conscious process, right from preparing your body for ovulation, implantation of the embryo and complete term pregnancy.\r\n\r\nPrepare your body for IVF\r\n\r\nThere are few thumb rules to follow when you decide to opt for IVF or any other route to get pregnant through ART, says Dr Gauri Agarwal, Founder, Seeds of Innocence and IVF Expert. These are:\r\n\r\n1. Quit smoking, and stop alcohol consumption or any other substance abuse. According to the American Journal of Epidemiology, nicotine concentration in the uterine fluid is ten times higher than the rest of your body. The component is also known to hasten ageing of the ovaries and hampers eggs’ capability to fertilize. Studies have also shown correlations between alcohol consumption and a reduced likelihood of both successes and live birth after IVF treatment.', 'all_images/4441pregnancy-1200_getty.jpg', 19, 'Yes', 'Yes', 'Apr,11 2021'),
(21, 'Young Knights win the day', 'Uncelebrated batsmen Nitish Rana and Rahul Tripathi produced stellar knocks to fuel Kolkata Knight Riders to a steep total of 187/6 on a slow surface before they consigned Sunrisers Hyderabad to a 10-run defeat, in the process exposing their vulnerabilities. Though the margin of victory was relatively slim, the gulf in quality between the sides was sizeable.\r\n\r\nFinding new strength\r\nA perceivably low-profile top order was suggested as Kolkata Knight Riders’ glaring vulnerability in the build-up. Most other sides have stacked the top three with big names and bigger hitters.\r\n\r\nBut Kolkata’s top order wears a thin look — a talented youngster who is yet to blossom into the world-conquering batsman he’s touted to be, paired by a pugnacious but not prolific left-hander, followed by a stylish but woefully inconsistent stroke-maker. Their real batting, even their ardent fans would admit, begins with the middle order — with the proven quartet of Eoin Morgan, Shakib Al Hasan, Dinesh Karthik and Andre Russell.', 'all_images/4472rana-gill-pti.jpg', 17, 'Yes', 'Yes', 'Apr,11 2021'),
(22, 'World Pet Day 2021: Five wonderful reasons why you should adopt and not shop', 'When you see stray puppies, kittens, cats and dogs on the road, don’t you feel like petting them? Most of us do; we wish for them to get loving homes, and if the thought of having a pet at home has crossed your mind at least once, then this is your chance. The next time you wish to bring a pet home, remind yourself of these five reasons that Anushka Iyer, founder and CEO of Wiggles states, as to why adopting would be better than buying.\r\n\r\nLove at first woof \r\n\r\nOr meow!\r\n\r\n“You know you fell in love the moment a stray laid eyes on you. That feeling of adoration makes our heart full, so take that leap of faith and bring them home and spread this feeling called to love with the rest of your family members,” she shares. \r\n\r\nPaws for some happiness \r\n\r\nBefore you go on to bring a pet at home, Iyer says, “Take a moment, pause and reflect.” This is important because the happiness of knowing you saved a life will be unparalleled. The pet you will bring home will share the same sentiment. They will know you saved them and you may not realise this, but they saved you, too!', 'all_images/8715puppy-1903313_1280.jpg', 19, 'Yes', 'Yes', 'Apr,11 2021'),
(23, 'Former FDA Chief Suggests Safe Bubble for Cruise Lines', 'Dr. Scott Gottlieb, the former chief of the Food and Drug Administration who helped advise the cruise lines on shaping their health and safety protocols for returning to the sea, says ships could return to sailing with one extra proviso.\r\n\r\n“I believe you can create a safe bubble around that experience,” the former FDA chief told CNBC in an interview.\r\n\r\nGottlieb’s comments came one day after Florida Gov. Ron DeSantis said the state has sued the Centers for Disease Control and Prevention, demanding the public health agency allow cruise lines to immediately resume sailing from the U.S. ports.\r\nDr. Scott Gottlieb, the former chief of the Food and Drug Administration who helped advise the cruise lines on shaping their health and safety protocols for returning to the sea, says ships could return to sailing with one extra proviso.\r\n\r\n“I believe you can create a safe bubble around that experience,” the former FDA chief told CNBC in an interview.\r\n\r\nGottlieb’s comments came one day after Florida Gov. Ron DeSantis said the state has sued the Centers for Disease Control and Prevention, demanding the public health agency allow cruise lines to immediately resume sailing from the U.S. ports.', 'all_images/7104630x355 (1).jpg', 20, 'Yes', 'Yes', 'Apr,11 2021'),
(24, 'JetBlue Defends Political Donation That Prompted Boycott Calls', 'Saying it donates equally to both major political parties, JetBlue Airways defended its decision to contribute $1,000 to New York Republican Congresswoman Nicole Malliotakis – a move that prompted a social media backlash against the airline earlier this week.\r\n\r\nHashtags of #BoycottJetBlue and #JetRed were trending after news of the donation came out. Malliotakis is one of the lawmakers who objected to the November 2020 presidential election results, which later resulted in the Jan. 6 riot at the United States Capitol.\r\nSaying it donates equally to both major political parties, JetBlue Airways defended its decision to contribute $1,000 to New York Republican Congresswoman Nicole Malliotakis – a move that prompted a social media backlash against the airline earlier this week.\r\n\r\nHashtags of #BoycottJetBlue and #JetRed were trending after news of the donation came out. Malliotakis is one of the lawmakers who objected to the November 2020 presidential election results, which later resulted in the Jan. 6 riot at the United States Capitol.', 'all_images/4205630x355 (2).jpg', 20, 'Yes', 'Yes', 'Apr,11 2021'),
(25, 'It’s Time We Come Together as a Cruise Industry', 'All eyes are on the travel industry, and we are waging a yearlong battle with not only our own health but the health of our clients, our travel agencies and our supplier partners. As a former employee of a major cruise line, and a current travel agency owner, I wanted to take a moment to voice my concern with the lack of progress we are making in the cruise sector and the CDC during the COVID-19 pandemic.\r\n\r\nThe cruise industry is either on the brink of a comeback or on the cusp of a North American exit. While I know that the CDC has our best interests at the center of everything they do, the perception is that they have not been treating the cruise industry equally. It’s like we are all a music group on the ropes\r\nAll eyes are on the travel industry, and we are waging a yearlong battle with not only our own health but the health of our clients, our travel agencies and our supplier partners. As a former employee of a major cruise line, and a current travel agency owner, I wanted to take a moment to voice my concern with the lack of progress we are making in the cruise sector and the CDC during the COVID-19 pandemic.\r\n\r\nThe cruise industry is either on the brink of a comeback or on the cusp of a North American exit. While I know that the CDC has our best interests at the center of everything they do, the perception is that they have not been treating the cruise industry equally. It’s like we are all a music group on the ropes', 'all_images/2907630x355.jpg', 20, 'Yes', 'No', 'Apr,11 2021'),
(26, 'Artificial intelligence can accelerate clinical diagnosis of fragile X syndrome', 'Researchers from the Waisman Center at the University of Wisconsin–Madison found that people with fragile X are more likely than the general population to also have diagnoses for a variety of circulatory, digestive, metabolic, respiratory, and genital and urinary disorders. Their study, published recently in the journal Genetics in Medicine, the official journal of the American College of Medical Genetics and Genomics, shows that machine learning algorithms may help identify undiagnosed cases of fragile X syndrome based on diagnoses of other physical and mental impairments.\r\n\r\n“Machine learning is providing new opportunities to look at huge amounts of data,” says lead author Arezoo Movaghar, a postdoctoral fellow at the Waisman Center. “There’s no way that we can look at 2 million records and just go through them one by one. We need those tools to help us to learn from what is in the data.”\r\n\r\nMachine learning is a form of artificial intelligence that uses computers to analyze large amounts of data quickly and efficiently. Movaghar and Marsha Mailick, emeritus vice-chancellor of research and graduate education at UW–Madison and a Waisman investigator, employed machine learning to identify patterns among the various health conditions of a huge pool of records collected over 40 years by Marshfield Clinic Health System, which serves northern and central Wisconsin.\r\n\r\nThough fragile X symptoms vary, the AI-generated model successfully predicted diagnoses of fragile X as much as five years earlier than receipt of a clinical diagnosis of FXS in patients with symptoms such as developmental delay, speech and language disorders, attention deficit hyperactivity disorder, anxiety disorder, and intellectual disability.\r\n\r\nThe algorithm could alert physicians to the risk of fragile X and reduce the time to reach a clinical diagnosis. The typical path to a genetic test confirming a fragile X diagnosis can take as long as two years after initial concerns arise.', 'all_images/8645artificial-intelligence-3382507_960_720-720x480.jpg', 21, 'Yes', 'Yes', 'Apr,11 2021'),
(27, 'Scientists harness chaos to protect devices from hackers', '“In our system, chaos is very, very good,” said Daniel Gauthier, senior author of the study and professor of physics at The Ohio State University.\r\n\r\nThe study was recently published online in the journal IEEE Access.\r\n\r\nThe researchers created a new version of an emerging technology called physically unclonable functions, or PUFs, that are built into computer chips.\r\n\r\nGauthier said these new PUFs could potentially be used to create secure ID cards, to track goods in supply chains and as part of authentication applications, where it is vital to know that you’re not communicating with an impostor.\r\n\r\n“The SolarWinds hack that targeted the U.S. government really got people thinking about how we’re going to be doing authentication and cryptography,” Gauthier said.\r\n\r\n“We’re hopeful that this could be part of the solution.”\r\n\r\nThe new solution makes use of PUFs, which take advantage of tiny manufacturing variations found in each computer chip – variations so small that they aren’t noticeable to the end user, said Noeloikeau Charlot, lead author of the study and a doctoral student in physics at Ohio State.\r\n\r\n“There’s a wealth of information in even the smallest differences found on computers chips that we can exploit to create PUFs,” Charlot said.\r\n\r\nThese slight variations – sometimes seen only at the atomic level – are used to create unique sequences of 0s and 1s that researchers in the field call, appropriately enough, “secrets.”\r\n\r\nOther groups have developed what they thought were strong PUFs, but research showed that hackers could successfully attack them. The problem is that current PUFs contain only a limited number of secrets, Gauthier said.\r\n\r\n“If you have a PUF where this number is 1,000 or 10,000 or even a million, a hacker with the right technology and enough time can learn all the secrets on the chip,” Gauthier said.\r\n\r\n“We believe we have found a way to produce an uncountably large number of secrets to use that will make it next to impossible for hackers to figure them out, even if they had direct access to the computer chip.”\r\n\r\nThe key to creating the improved PUF is chaos, a topic that Gauthier has studied for decades. No other PUFs have used the chaos in the way demonstrated in this study, he said.\r\n\r\nThe researchers created a complex network in their PUFs using a web of randomly interconnected logic gates. Logic gates take two electric signals and use them to create a new signal.', 'all_images/33971920_hiddenbehaviorsinapps-720x480.webp', 21, 'Yes', 'Yes', 'Apr,11 2021'),
(29, 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum', 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum\r\nLorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsumLorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsumLorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsumLorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsumLorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsumLorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsumLorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsumLorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum', 'all_images/659355.jpg', 9, 'Yes', 'Yes', 'Apr,27 2021'),
(30, 'At Look of the year Welcome To The Best Model Winner Contest ', 'Welcome To The Best Model Winner Contest At Look of the yearWelcome To The Best Model Winner Contest At Look of the yearWelcome To The Best Model Winner Contest At Look of the yearWelcome To The Best Model Winner Contest At Look of the yearWelcome To The Best Model Winner Contest At Look of the yearWelcome To The Best Model Winner Contest At Look of the year Welcome To The Best Model Winner Contest At Look of the yearWelcome To The Best Model Winner Contest At Look of the yearWelcome To The Best Model Winner Contest At Look of the year', 'all_images/679333.jpg', 9, 'Yes', 'Yes', 'Apr,28 2021');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(1, 'raghdaa.s.abueida@gmail.com', 'raghda', '9f6e6800cfae7749eb6c486619254b9c'),
(3, 'roroter199@gmail.com', 'www', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'roroter999@gmail.com', 'Salsabeel', 'cf79ae6addba60ad018347359bd144d2'),
(5, 'roroter990@gmail.com', 'asma', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'mmm@gmail.com', 'mmm', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'asma@gmail.com', 'asma', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_news` (`id_news`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_news`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
