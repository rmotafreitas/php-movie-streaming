-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Set-2022 às 01:17
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pacotetv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `quality` int(2) NOT NULL DEFAULT 2,
  `title` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `cover` varchar(200) DEFAULT NULL,
  `poster` varchar(200) DEFAULT NULL,
  `arrPhotos` text DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL,
  `duration` time NOT NULL DEFAULT '01:24:36',
  `director` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `categories` varchar(50) DEFAULT NULL,
  `stars` int(11) NOT NULL,
  `active` int(2) NOT NULL DEFAULT 1,
  `clicks` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `movies`
--

INSERT INTO `movies` (`id`, `quality`, `title`, `year`, `cover`, `poster`, `arrPhotos`, `file`, `duration`, `director`, `description`, `categories`, `stars`, `active`, `clicks`) VALUES
(154, 1, 'The Intouchables', 2011, 'covers_fd4ck.jpg', 'posters_snao8.jpg', 'photos_2u6vxf.webp,photos_uo626.jpg,photos_uk4x8.jpg,photos_2ythe.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Olivier Nakache, Eric Toledano', '<p>After he becomes a quadriplegic from a paragliding accident, an aristocrat hires a young man from the projects to be his caregiver.</p>', '1,7,8', 2, 1, 3),
(155, 2, 'Inception', 2010, 'covers_nt8pp.jpg', 'posters_nd53z.jpeg', 'photos_ik68v.jpeg,photos_pmwyt.jpg,photos_ckj3x.jpg,photos_ngfzm.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Christopher Nolan', '<p>A thief, who steals corporate secrets through use of dream-sharing technology, is given the inverse task of planting an idea into the mind of a CEO.</p>', '1,2,6,8', 5, 1, 12),
(156, 2, 'Django Unchained', 2012, 'covers_rbgxs.jpg', 'posters_rolun.jpg', 'photos_8yvsj.jpg,photos_k76m5.jpg,photos_pah7n.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Quentin Tarantino', '<p>With the help of a German bounty hunter, a freed slave sets out to rescue his wife from a brutal Mississippi plantation owner.</p>', '1,8', 4, 1, 1),
(157, 2, 'Shutter Island', 2010, 'covers_hfb0u.jpg', 'posters_8zmdm.jpg', 'photos_5icpy.jpg,photos_wcwnr.jpg,photos_hzli7.jpg,photos_rqks2.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Martin Scorsese', '<p>In 1954, a U.S. marshal investigates the disappearance of a murderess who escaped from a hospital for the criminally insane.</p>', '1,2,6,8', 5, 1, 3),
(158, 2, 'The Great Beauty', 2013, 'covers_3viet.jpg', 'posters_8dypg.jpg', 'photos_47p6d.jpg,photos_ib0i7.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Paolo Sorrentino', '<p>Jep Gambardella has seduced his way through the lavish nightlife of Rome for decades, but after his 65th birthday and a shock from the past, Jep looks past the nightclubs and parties to find a timeless landscape of absurd, exquisite beauty.</p>', '1,6,8', 3, 1, 3),
(159, 2, 'Flight', 2012, 'covers_cotff.jpg', 'posters_7672s.jpg', 'photos_evp4xi.jpg,photos_5bejb.jpg,photos_5j987.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Robert Zemeckis', '<p>An airline pilot saves almost all his passengers on his malfunctioning airliner which eventually crashed, but an investigation into the accident reveals something troubling.</p>', '1,2,8', 2, 1, 2),
(160, 2, 'The Artist', 2011, 'covers_g261b.jpg', 'posters_7yxrs.jpg', 'photos_gi4ju.jpg,photos_3k25y.jpg,photos_g748d.jpg,photos_43bay.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Michel Hazanavicius', '<p>A silent movie star meets a young dancer, but the arrival of talking pictures sends their careers in opposite directions.</p>', '1,2,6,8', 1, 1, 3),
(161, 2, 'The Hobbit: The Desolation of Smaug', 2013, 'covers_eex4c.jpg', 'posters_1t33u.jpg', 'photos_hotnrk.jpg,photos_xv21yf.jpg,photos_9n9v6.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Peter Jackson', '<p>The dwarves, along with Bilbo Baggins and Gandalf the Grey, continue their quest to reclaim Erebor, their homeland, from Smaug. Bilbo Baggins is in possession of a mysterious and magical ring.</p>', '1,2,6', 2, 1, 3),
(162, 2, 'God Bless America', 2011, 'covers_m333d.jpg', 'posters_0i36g.jpg', 'photos_o1ol5.jpg,photos_6mi21.jpg,photos_n5ylq.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Bobcat Goldthwait', '<p>On a mission to rid society of its most repellent citizens, terminally ill Frank makes an unlikely accomplice in 16-year-old Roxy.</p>', '1,2,4,8', 3, 1, 1),
(163, 2, 'The Social Network', 2010, 'covers_0ep3f.jpg', 'posters_ndb0o.jpeg', 'photos_yvxzcg.jpeg,photos_fffam.jpg,photos_ort39.webp,photos_ad261g.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'David Fincher', '<p>Harvard student Mark Zuckerberg creates the social networking site that would become known as Facebook, but is later sued by two brothers who claimed he stole their idea, and the co-founder who was later squeezed out of the business.</p>', '1,2,4,6', 5, 1, 5),
(164, 2, 'Pirates of the Caribbean: On Stranger Tides', 2011, 'covers_2cqwt.jpg', 'posters_an8r2.jpg', 'photos_4uge2.jpg,photos_b0ehaj.jpg,photos_4g7cf.gif', 'movies_1bi4mi.mp4', '01:24:36', 'Rob Marshall', '<p>Jack Sparrow and Barbossa embark on a quest to find the elusive fountain of youth, only to discover that Blackbeard and his daughter are after it too.</p>', '2,4,7,8', 1, 1, 0),
(165, 2, 'The Wolf of Wall Street', 2013, 'covers_01bda.jpg', 'posters_9guy5j.webp', 'photos_0g11c.webp,photos_z6yg6.jpg,photos_4zvea.webp', 'movies_1bi4mi.mp4', '01:24:36', 'Martin Scorsese', '<p>Based on the true story of Jordan Belfort, from his rise to a wealthy stock-broker living the high life to his fall involving crime, corruption and the federal government.</p>', '1,6,7', 3, 1, 0),
(166, 2, 'The Grand Budapest Hotel', 2014, 'covers_aggmb.jpg', 'posters_jud8b.jpg', 'photos_2g302.jpg,photos_r307i.jpg,photos_lkicn.jpg,photos_8p4c1.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Wes Anderson', '<p>The adventures of Gustave H, a legendary concierge at a famous hotel from the fictional Republic of Zubrowka between the first and second World Wars, and Zero Moustafa, the lobby boy who becomes his most trusted friend.</p>', '1,7,8', 5, 1, 1),
(167, 2, 'Silver Linings Playbook', 2012, 'covers_740f1l.jpg', 'posters_jkue.jpg', 'photos_cxz9l.jpg,photos_3gye6.jpg,photos_5jlmbf.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'David O. Russell', '<p>After a stint in a mental institution, former teacher Pat Solitano moves back in with his parents and tries to reconcile with his ex-wife. Things get more challenging when Pat meets Tiffany, a mysterious girl with problems of her own.</p>', '1', 4, 1, 2),
(168, 2, 'Pacific Rim', 2013, 'covers_ewe08.jpg', 'posters_p0q7.jpg', 'photos_ipxiu.jpg,photos_0mp6i.webp,photos_dszhc.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Guillermo del Toro', '<p>As a war between humankind and monstrous sea creatures wages on, a former pilot and a trainee are paired up to drive a seemingly obsolete special weapon in a desperate effort to save the world from the apocalypse.</p>', '6,8', 1, 1, 18),
(169, 2, 'Cloud Atlas', 2012, 'covers_04491.jpg', 'posters_ux7wh.jpg', 'photos_hmbfo.jpeg,photos_2c193.jpg,photos_psjaz.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Tom Tykwer, Lana Wachowski, Lilly Wachowski', '<p>An exploration of how the actions of individual lives impact one another in the past, present and future, as one soul is shaped from a killer into a hero, and an act of kindness ripples across centuries to inspire a revolution.</p>', '4,6,8', 1, 1, 4),
(170, 2, 'The Impossible', 2012, 'covers_e3jaw.jpg', 'posters_o1wjm.jpg', 'photos_h3lsw.jpg,photos_uogr9.jpg,photos_8t2qr.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'J.A. Bayona', '<p>The story of a tourist family in Thailand caught in the destruction and chaotic aftermath of the 2004 Indian Ocean tsunami.</p>', '1,4,7', 4, 1, 3),
(171, 2, 'Dallas Buyers Club', 2013, 'covers_v2d6w.jpg', 'posters_ro3nd.jpg', 'photos_6v038.jpg,photos_didos.jpg,photos_pa60d.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Jean-Marc Vallée', '<p>In 1985 Dallas, electrician and hustler Ron Woodroof works around the system to help AIDS patients get the medication they need after he is diagnosed with the disease.</p>', '1,6,7', 2, 1, 1),
(172, 2, 'The Rum Diary', 2011, 'covers_vo7hh.jpg', 'posters_6ydm.jpg', 'photos_or484.jpg,photos_bn2em.jpg,photos_vkfpnj.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Bruce Robinson', '<p>American journalist Paul Kemp takes on a freelance job in Puerto Rico for a local newspaper during the 1960s and struggles to find a balance between island culture and the expatriates who live there.</p>', '1,4,7', 1, 1, 1),
(173, 2, 'Calvary', 2014, 'covers_17yqh.jpg', 'posters_hor0o.jpg', 'photos_gl12ug.jpg,photos_kex6j.jpg,photos_k1w5s.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'John Michael McDonagh', '<p>After he is threatened during a confession, a good-natured priest must battle the dark forces closing in around him.</p>', '1,6,7', 5, 1, 0),
(174, 2, 'Boyhood', 2014, 'covers_19lvt.jpg', 'posters_9cmps.jpg', 'photos_6n92g.jpg,photos_6thcw.jpg,photos_okw1v.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Richard Linklater', '<p>The life of Mason, from early childhood to his arrival at college.</p>', '1,7', 5, 1, 0),
(175, 2, 'The Imitation Game', 2014, 'covers_g9ezg.jpg', 'posters_w767th.jpeg', 'photos_3j8jr.jpeg,photos_ju0oo.jpg,photos_pot03.webp,photos_s0qk1.jpg,photos_ap2vk.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Morten Tyldum', '<p>During World War II, mathematician Alan Turing tries to crack the enigma code with help from fellow mathematicians.</p>', '1,6,8', 4, 1, 2),
(176, 2, 'Nebraska', 2013, 'covers_ywq2il.jpg', 'posters_uml5kl.jpg', 'photos_b5koa.jpg,photos_oxkvr.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Alexander Payne', '<p>An aging, booze-addled father makes the trip from Montana to Nebraska with his estranged son in order to claim a million-dollar Mega Sweepstakes Marketing prize.</p>', '1,2,4,6', 2, 1, 2),
(177, 2, 'Shrek Forever After', 2010, 'covers_43egs.jpg', 'posters_idfjm.jpg', 'photos_gecyv.jpg,photos_69fvm.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Mike Mitchell', '<p>Rumpelstiltskin tricks a mid-life crisis burdened Shrek into allowing himself to be erased from existence and cast in a dark alternate timeline where Rumpel rules supreme.</p>', '1,4,6,7', 5, 1, 2),
(178, 3, 'Steins;Gate Movie: Fuka Ryouiki no Déjà vu', 2013, 'covers_4dwhf.jpg', 'posters_srhh1.jpg', 'photos_odpf5.jpg,photos_rurlg.jpg,photos_to9wf.webp,photos_nio7c.jpg,photos_yld43.jpg,photos_kti1bl.jpeg,photos_n8qdt.jpg,photos_km1by.jpg,photos_d3n6d.jpg', 'movies_1bi4mi.mp4', '01:24:36', 'Kanji Wakabayashi', '<p>After the events of the anime, Rintarou begins to feel the repercussions of extensive time travel, and eventually completely fades from reality. Kurisu, being the only companion to remember him, now must find a way to bring him back.</p>', '1,4,6', 5, 1, 14),
(188, 3, 'Gambito de Dama', 2020, 'covers_8mfwv.jpg', 'posters_alyaij.jpg', 'photos_rz1pd.jpg,photos_vzkfn.jpg,photos_fo9v9.jpg,photos_haysj.jpg,photos_mvjde.jpg', 'movies_1bi4mi.mp4', '01:11:27', ' Scott Frank', '<p>Orphaned at the tender age of nine, prodigious introvert Beth Harmon discovers and masters the game of chess in 1960s USA. But child stardom comes at a price.</p>', '1,6', 5, 1, 11);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
