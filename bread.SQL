-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 17 nov 2017 kl 15:10
-- Serverversion: 5.6.35
-- PHP-version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databas: `bread`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `categories`
--

CREATE TABLE `categories` (
  `catid` int(11) NOT NULL,
  `catname` varchar(255) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `categories`
--

INSERT INTO `categories` (`catid`, `catname`) VALUES
(1, 'Fish'),
(2, 'Pasta'),
(3, 'Steak');

-- --------------------------------------------------------

--
-- Tabellstruktur `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredientsid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `ingredients`
--

INSERT INTO `ingredients` (`ingredientsid`, `name`) VALUES
(92, 'Rice'),
(93, 'Wheat'),
(94, 'Flour'),
(95, 'Sugar'),
(96, 'Salt'),
(97, 'Olive oil'),
(98, 'Lingonberry'),
(99, 'Pork'),
(100, 'Cod'),
(101, 'Salmon'),
(102, 'Gnocchi'),
(103, 'Spaghetti'),
(104, 'Egg'),
(105, 'Chili'),
(106, 'Beef'),
(107, 'Kale'),
(108, 'Vinegar'),
(109, 'Butter'),
(110, 'Cream'),
(111, 'Buillon'),
(112, 'Mussels'),
(113, 'Spinach'),
(114, 'Cheese'),
(115, 'White wine'),
(116, 'Potato'),
(117, 'Mayonnaise'),
(118, 'Dill'),
(119, 'Chives'),
(120, 'Parsley'),
(121, 'Parsley'),
(122, 'Fennel seeds'),
(123, 'Lemon'),
(124, 'Whitebait'),
(125, 'Pesto'),
(126, 'Chicken breast'),
(127, 'Chicken breast'),
(128, 'Garlic'),
(129, 'Rosemary'),
(130, 'Rapeseed oil'),
(131, 'Red chili'),
(132, 'Cherry tomato'),
(133, 'Green beans'),
(134, 'Basil'),
(135, 'Almonds'),
(136, 'Parmesan'),
(137, 'Baby spinach'),
(138, 'Lasagne sheets'),
(139, 'Dried red chili flakes'),
(140, 'Baby courgettes'),
(141, 'Pine nuts'),
(142, 'Pine nuts'),
(143, 'Cream crackers'),
(144, 'Dijon mustard'),
(145, 'Minced beef'),
(146, 'Oregano'),
(147, 'Onion'),
(148, 'Plum tomatos'),
(149, 'Balsamic Vinegar'),
(150, 'Rib-eye steak'),
(151, 'Mushrooms'),
(152, 'White beans'),
(153, 'White beans'),
(154, 'Fillet of veal'),
(155, 'Leeks'),
(156, 'Baby carrots'),
(157, 'Bay leaves '),
(158, 'Double cream'),
(159, 'Basmati rice'),
(160, 'Green olive tapenade'),
(161, 'White fish filet'),
(162, 'Haddock'),
(163, 'Haddock');

-- --------------------------------------------------------

--
-- Tabellstruktur `recing`
--

CREATE TABLE `recing` (
  `recipeid` int(11) NOT NULL,
  `ingredientsid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `recing`
--

INSERT INTO `recing` (`recipeid`, `ingredientsid`) VALUES
(0, 1),
(0, 1),
(0, 1),
(0, 1),
(0, 1),
(0, 1),
(40, 1),
(40, 1),
(41, 1),
(41, 1),
(42, 1),
(42, 1),
(43, 1),
(43, 1),
(44, 1),
(44, 1),
(45, 1),
(45, 1),
(0, 1),
(0, 1),
(0, 1),
(0, 1),
(46, 1),
(46, 1),
(55, 1),
(55, 2),
(55, 2),
(66, 1),
(66, 4),
(66, 4),
(69, 3),
(69, 3),
(70, 1),
(70, 2),
(70, 3),
(70, 4),
(70, 4),
(75, 1),
(75, 1),
(76, 6),
(76, 6),
(77, 6),
(77, 6),
(78, 4),
(78, 4),
(79, 4),
(79, 4),
(81, 4),
(82, 4),
(82, 4),
(83, 4),
(83, 4),
(84, 2),
(84, 2),
(85, 5),
(85, 5),
(86, 5),
(86, 5),
(93, 4),
(93, 4),
(102, 1),
(102, 4),
(102, 4),
(0, 1),
(0, 4),
(0, 4),
(0, 4),
(0, 5),
(0, 5),
(103, 4),
(103, 5),
(103, 5),
(104, 2),
(104, 3),
(104, 3),
(105, 2),
(105, 3),
(105, 3),
(106, 3),
(106, 3),
(107, 1),
(107, 2),
(107, 2),
(108, 1),
(108, 2),
(108, 2),
(109, 3),
(109, 4),
(109, 4),
(110, 3),
(110, 4),
(110, 4),
(111, 2),
(111, 3),
(111, 3),
(112, 2),
(112, 3),
(112, 3),
(113, 4),
(113, 5),
(113, 5),
(114, 1),
(114, 90),
(114, 90),
(115, 1),
(115, 90),
(115, 90),
(116, 1),
(116, 2),
(117, 1),
(117, 2),
(118, 1),
(118, 2),
(118, 2),
(119, 1),
(119, 1),
(120, 2),
(120, 2),
(122, 3),
(122, 3),
(123, 4),
(123, 4),
(124, 2),
(124, 2),
(125, 1),
(125, 1),
(126, 3),
(126, 3),
(127, 3),
(127, 3),
(128, 4),
(128, 4),
(129, 5),
(129, 5),
(130, 1),
(130, 1),
(131, 1),
(131, 1),
(132, 1),
(132, 2),
(132, 2),
(133, 1),
(133, 2),
(133, 2),
(134, 1),
(134, 2),
(134, 2),
(135, 1),
(135, 2),
(135, 2),
(136, 1),
(136, 1),
(137, 1),
(137, 1),
(138, 1),
(138, 3),
(138, 2),
(139, 1),
(139, 91),
(139, 2),
(140, 1),
(140, 2),
(140, 3),
(141, 1),
(141, 2),
(141, 3),
(142, 1),
(142, 2),
(142, 3),
(142, 4),
(143, 1),
(143, 2),
(143, 3),
(143, 4),
(144, 91),
(144, 6),
(144, 1),
(145, 1),
(145, 2),
(145, 3),
(146, 1),
(146, 2),
(146, 3),
(146, 4),
(146, 5),
(146, 6),
(146, 91),
(147, 1),
(147, 2),
(147, 3),
(148, 2),
(148, 6),
(149, 2),
(149, 6),
(150, 94),
(150, 97),
(150, 113),
(150, 114),
(150, 104),
(150, 102),
(151, 92),
(151, 93),
(152, 92),
(152, 93),
(152, 94),
(152, 95),
(153, 92),
(153, 93),
(153, 94),
(153, 95),
(154, 92),
(154, 93),
(155, 92),
(155, 93),
(155, 94),
(155, 95),
(155, 96),
(155, 97),
(156, 112),
(156, 114),
(156, 110),
(158, 100),
(158, 116),
(158, 94),
(158, 97),
(158, 121),
(158, 120),
(158, 118),
(158, 119),
(158, 117),
(159, 122),
(159, 123),
(159, 124),
(159, 94),
(159, 117),
(159, 118),
(160, 138),
(160, 137),
(160, 136),
(160, 135),
(160, 134),
(160, 133),
(160, 132),
(160, 131),
(160, 130),
(160, 129),
(160, 128),
(160, 127),
(160, 97),
(160, 123),
(161, 97),
(161, 142),
(161, 140),
(161, 139),
(161, 137),
(161, 94),
(161, 128),
(161, 132),
(161, 134),
(161, 136),
(162, 143),
(162, 129),
(162, 144),
(162, 145),
(162, 146),
(162, 104),
(162, 97),
(162, 134),
(162, 147),
(162, 128),
(162, 139),
(162, 148),
(162, 149),
(162, 103),
(163, 143),
(163, 129),
(163, 144),
(163, 145),
(163, 146),
(163, 104),
(163, 97),
(163, 134),
(163, 147),
(163, 128),
(163, 139),
(163, 148),
(163, 149),
(163, 103),
(164, 150),
(164, 129),
(164, 128),
(164, 151),
(164, 153),
(165, 158),
(165, 157),
(165, 156),
(165, 155),
(165, 154),
(165, 115),
(165, 109),
(165, 97),
(165, 147),
(165, 128),
(165, 151),
(166, 159),
(166, 160),
(166, 132),
(166, 134),
(166, 162),
(167, 95);

-- --------------------------------------------------------

--
-- Tabellstruktur `recipe`
--

CREATE TABLE `recipe` (
  `recipeid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `description` text COLLATE utf8_swedish_ci NOT NULL,
  `ingredients` text COLLATE utf8_swedish_ci NOT NULL,
  `catid` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `onloan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `recipe`
--

INSERT INTO `recipe` (`recipeid`, `title`, `description`, `ingredients`, `catid`, `image`, `userid`, `onloan`) VALUES
(158, 'Quick fish cakes', '1. Roughly chop the fish, then peel and grate the potato.\r\n2. Combine with the flour in a bowl, then season with sea salt and black pepper.\r\n3. Bring together with your hands and shape into 12 flat patties, then leave to chill in the fridge.\r\n4. Heat a glug of oil in a heavy-based pan over a medium-high heat. In batches of 4, cook the fish cakes for 2 to 3 minutes on each side, until golden and crisp, then remove to kitchen paper to drain.\r\n5. Pick, chop and stir the herbs through the mayo, then serve with the fish cakes, and some watercress and lemon wedges, if you like.', '', 1, 'fish_cake.jpg', 0, 0),
(159, 'Whitebait & dill mayo', '1. Heat the oil in a deep fryer or pan to 200ºC.\r\n2. Crush the fennel seeds in a pestle and mortar, then combine with the flour and season.\r\n3. Working in batches, coat the fish in the flour mixture then very carefully fry for 3 minutes, or until golden and cooked. Remove with a slotted spoon and drain on kitchen paper.\r\n4. Pick and finely chop the dill, then combine with the mayonnaise, and season.\r\n5. Serve the fish with dill mayo and lemon wedges.', '', 1, 'whitbait.jpg', 0, 1),
(160, 'Pasta pesto', '1. On a large sheet of greaseproof paper, toss the chicken with sea salt, black pepper, fennel seeds and the rosemary leaves. Fold over the paper, then bash and flatten the chicken to 1.5cm thick with a rolling pin. \r\n2. Put the chicken into the frying pan with the rapeseed oil, the bashed unpeeled garlic cloves and halved chillies, turning after about 3 or 4 minutes, until golden and cooked through. \r\n3. Line the beans up and cut off the stalks, put into the casserole pan, cover with boiling salted water and cook for 6 minutes with the lid on.\r\n4. Pick a few basil leaves for garnish, then rip off the stalks and put the rest of the bunch into the processor with the almonds, Parmesan, extra virgin olive oil and lemon juice. \r\n5. Squash in the unpeeled garlic through a garlic crusher. Blitz until smooth, adding a ladle or two of cooking water from the beans to loosen, then season to taste. \r\n6. Slice the lasagne sheets up into random handkerchief shapes and add to the beans to cook for a couple of minutes. Halve or quarter the tomatoes, add to the chicken and give the pan a shake.\r\n7. Stir the spinach into the pasta pan, then drain, reserving a cupful of the starchy cooking water. Return the pasta, beans and spinach to the pan, pour in the pesto from the processor and stir together, loosening with splashes of cooking water until silky.\r\n8. Slice the chicken breasts in half and serve with the tomatoes and chilli spooned over the top. Finely grate a little extra Parmesan over the pasta, then sprinkle everything with basil leaves.', '', 2, 'pesto_pasta.jpg', 0, 0),
(161, 'Spinach pici pasta', '1. In a food processor, blitz the spinach and flour until a ball of dough forms, letting the machine do all the work. Touch the dough – it shouldn’t be sticky, you want a playdough consistency, so add a little more flour, if needed.\r\n2. To make the pici, simply tear off 2cm balls of dough and roll them out into long thin sausage shapes – think fine green beans – on a clean surface (the beauty is that they’re all different, so get little helpers involved, if you can).\r\n3. Cook the pici straight away, or leave them to dry out for a few hours, or even overnight.\r\n4. Put a large pan of salted water on to boil. Put a large frying pan on a medium heat with 2 tablespoons of olive oil. Peel, finely slice and add the garlic, along with the chilli flakes.\r\n5. Finely slice and add the courgettes, then halve and add the tomatoes. Cook it all for 5 minutes, then stir in the pine nuts and add a ladleful of boiling water. Leave on the lowest heat while you cook the pasta.\r\n6. Add the pici to your pan of boiling salted water. If it’s freshly rolled it will only need about 5 minutes, but if you’ve let it dry give it 8 to 10 minutes, checking on it to make sure you get lovely al dente pasta.\r\n7. Drain, reserving a mugful of cooking water, then toss through the veg.\r\n8. Reserving the baby basil leaves, finely slice the bigger ones and stir into the pan with most of the finely grated Parmesan, loosening with a little reserved water, if needed.\r\n9. Divide between your warm plates and serve with a few drips of extra virgin olive oil, with the remaining Parmesan and the baby basil leaves sprinkled over.', '', 2, 'ssp.jpg', 0, 0),
(162, 'Spagetti with meatballs', '1. Wrap the crackers in a tea towel and smash up until fine, breaking up any big bits with your hands, then tip into a large bowl.\r\n2. Pick and finely chop the rosemary, then add to the bowl with the mustard, minced meat and oregano.\r\n3. Crack the egg into the bowl, then add a good pinch of sea salt and black pepper.\r\n4. With clean hands, scrunch and mix everything up well. Divide into 4 large and balls, then with wet hands divide each ball into 6 and roll into little meatballs – you should end up with 24.\r\n5. Place the meatballs onto a plate, drizzle with oil and jiggle about to coat, then cover and place in the fridge until needed – this will help to firm them up.\r\n6. Pick the basil leaves, keeping any smaller ones to one side for later. Peel and finely chop the onion and the garlic, and trim and finely slice or crumble the chilli.\r\n7. Heat 2 tablespoons of oil in a large frying pan over a medium heat, add the onion and cook for 7 minutes, or until softened and lightly golden.\r\n8. Add the garlic and chilli, and as soon as they start to get some colour add the large basil leaves.\r\n9. Tip in the the tomatoes, breaking them up with the back of a spoon, then add the balsamic vinegar, and season to taste. Bring to the boil, then reduce to a simmer until needed, stirring regularly.\r\n10. Meanwhile, heat 1 tablespoon of oil in another large frying pan over a medium heat, add the meatballs and cook for 8 to 10 minutes, or until cooked through, turning regularly To check if they’re cooked, cut one opening – there should be no sign of pink.\r\n11. Once cooked, add the meatballs to the sauce and simmer while you cook the pasta.\r\n12. Cook the pasta in boiling salted water according to the packet instructions, then drain, reserving a mugful of cooking water. Return the pasta to the pan.\r\n13. Spoon half the tomato sauce over the pasta and toss together, adding a little splash of reserved cooking water to loosen, if needed\r\n14. Transfer to a large platter or divide between bowls, serving the remaining sauce and meatballs on top. Add a fine grating of Parmesan and scatter over the reserved basil, then tuck in.', '', 2, 'meatball_pasta.jpg', 0, 0),
(164, 'Epic rib-eye steak', '1. Place a large non-stick frying pan on a medium-high heat. Rub the steak all over with a pinch of sea salt and black pepper, then sear on all sides for 10 minutes in total, so you achieve good colour on the outside but keep it medium rare in the middle, or cook to your liking, turning regularly with tongs.\r\n2. Meanwhile, strip the rosemary leaves off the sprigs, peel and finely slice the garlic, and tear up any larger mushrooms. When the steak’s done, remove to a plate and cover with tin foil. Reduce the heat under the pan to medium, and crisp up the rosemary for 30 seconds, then add the garlic and mushrooms and cook for 8 minutes, or until golden, tossing regularly. 3. Pour in the beans and their juice, add 1 tablespoon of red wine vinegar and simmer for 5 minutes, then season to perfection. Sit the steak on top and pour over any resting juices. Slice and serve at the table, finishing with a little extra virgin olive oil, if you like', '', 3, 'rib_eye.jpg', 0, 1),
(165, 'Braised veal', '1. Place a casserole pan on a medium heat and melt half the butter with a splash of oil. Season and brown the veal on all sides, then remove from pan and set aside.\r\n2. Peel and finely slice the onions and garlic, then trim and cut the leeks into large chunks. Sauté in the same pan until soft but not coloured, then add the carrots and cook for a few minutes.\r\n3. Make a space in the middle, and place in your veal, surrounded by the veg. Tuck the bay into the veal and pour in the wine and 100ml water.\r\n4. Bring to the boil, then cover with a circle of greaseproof paper and simmer for 2 to 2 hours 30 minutes, till the veal is tender. Check the liquid level every 20 minutes or so, adding water as necessary.\r\n5. When the veal is ready, place a frying pan on a medium-high heat with the remaining butter. Tear in the mushrooms and fry until they start to turn golden.\r\n6. Season, and stir into the veal with the double cream. Bring back to the boil then simmer uncovered for 10 minutes, till reduced.\r\n7. Transfer the veal to a board and slice. Serve with braised veg, buttered spätzli or noodles and cabbage gratin.', '', 3, 'braised_veal.jpg', 0, 0),
(166, 'One-pan fabulous fish', '1. In a large shallow casserole pan on a high heat, mix the rice with 2 heaped teaspoons of tapenade, then pour over 600ml of water. Put the lid on and let it come to the boil while you halve the tomatoes and, in a bowl, mix them with 1 tablespoon each of olive oil and red wine vinegar. Taste, season to perfection with sea salt and black pepper, and tear in most of the basil leaves.\r\n2. Cut the fish into four equal-sized pieces and place in the pan, pushing them into the rice. Scatter over the dressed tomatoes. Put the lid back on and boil for 10 minutes, or until the rice is cooked through, then remove the lid and cook for a further 2 minutes until all the liquid has evaporated. Spoon the remaining tapenade over the fish, pick over the remaining basil leaves, drizzle lightly with extra virgin olive oil, and dish up.', '', 1, 'fabulous_fish.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `userpass` varchar(255) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`userid`, `username`, `userpass`) VALUES
(1, 'ellinor', 'db63cdafaa98b689f15a84df7b00a230730682ed'),
(2, 'nhung', '2ed7f8b0ae4c33f7afb55f33b7d7ac07bc2dbac9');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catid`);

--
-- Index för tabell `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredientsid`);

--
-- Index för tabell `recing`
--
ALTER TABLE `recing`
  ADD KEY `recipeid` (`recipeid`),
  ADD KEY `ingredid` (`ingredientsid`);

--
-- Index för tabell `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipeid`),
  ADD KEY `author` (`userid`),
  ADD KEY `category` (`catid`);

--
-- Index för tabell `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `userpass` (`userpass`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `categories`
--
ALTER TABLE `categories`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT för tabell `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredientsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;
--
-- AUTO_INCREMENT för tabell `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT för tabell `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;