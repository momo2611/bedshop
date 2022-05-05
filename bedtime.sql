-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 09:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bedtime`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(2) NOT NULL,
  `user_id` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(5) NOT NULL,
  `quantity` int(2) NOT NULL,
  `image` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`) VALUES
(14, 1, 'Woodridge Mirror', 649, 1, 'wood-2.png'),
(15, 1, 'Woodridge Panel Headboard', 1499, 1, 'wood-5.png'),
(16, 1, 'Beckham Leather Storage Ottoma', 1599, 1, 'otto-5.png'),
(17, 1, 'Woodridge Chest', 2499, 1, 'wood-3.png');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(2) NOT NULL,
  `user_id` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(19, 1, 'Momosu Mochi', 'momosumochi@gmail.com', '088888604', 'this is a test 12');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(2) NOT NULL,
  `user_id` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `method` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `total_products` varchar(200) NOT NULL,
  `total_price` int(6) NOT NULL,
  `placed_on` varchar(15) NOT NULL,
  `payment_status` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 1, 'Momosu Mochi', '933477284567', 'momosumochi@gmail.com', 'cash on delivery', '33, Lungha Street, Afthainia, Vietnam - 40000', ', Woodridge 3 Drawer Chest (1) , Woodridge Panel Headboard (1) , Everyday Value Shoreline Mirror (1) , MODERN Emilia Mirror (1) , Woodridge Mirror (1) ', 4395, '27-Mar-2022', 'completed'),
(2, 3, 'Alexa Dra', '0874304534', 'lettestthis123@gmail.com', 'paypal', '12, StreetStaray, Stamiata, Vietnam - 60000', ', Woodridge Maple 6 Drawer Dresser (2) , Everyday Value Shoreline Chest (1) ', 9417, '06-Apr-2022', 'pending'),
(3, 1, 'Momosu Mochi', '089482374', 'momosumochi@gmail.com', 'cash on delivery', '07 Hà vinh, Ninh Bình, Việt Nam - 70000', ', Everyday Value Shoreline Night (1) , Everyday Value Shoreline Louve (1) , Benjamin Clock (1) ', 2097, '09-Apr-2022', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(2) NOT NULL,
  `name` varchar(40) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(400) NOT NULL,
  `price` int(6) NOT NULL,
  `image` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `description`, `price`, `image`) VALUES
(1, 'Woodridge 3 Drawer Nightstand', 'Woodridge', 'Add a touch of modern rustic elegance to your bedroom with the Woodridge 3-Drawer Nightstand in Cavern Black finish, Antiqued Pewter Hardware, and lots of convenient storage. Top drawer features raised diamond pattern and knob pull. Bottom drawers with ring pulls. Includes power strip with outlet and 2 USB charging ports, plus wire management. 30\"Wx19\"Dx30\"H', 1099, 'item-1.png'),
(4, 'Woodridge Mirror', 'Woodridge', 'Top your Woodridge Dresser with this handsome beveled mirror in our Cavern Black finish, featuring a raised diamond pattern at the brim and platform base. Can be mounted to your dresser or to the wall with supplied hardware. 48\"Wx2\"Dx38\"H', 649, 'wood-2.png'),
(5, 'Woodridge Chest', 'Woodridge', 'Add a touch of modern rustic elegance to your bedroom with the Woodridge 7-Drawer Chest in Cavern Black finish, Antiqued Pewter Hardware, and lots of convenient storage. 2 felt-lined top drawers with knob pulls and raised diamond pattern. 5 cedar-lined bottom drawers of varying depths with ring pulls. 44\"Wx19\"Dx55\"H', 2499, 'wood-3.png'),
(6, 'Woodridge 3 Drawer Chest', 'Woodridge', 'Classic design meets modern touches and rustic finishes in this Woodridge 2-Drawer Chest in Cavern Black finish. This chest features a diamond drawer-front pattern, traditional tapered legs, and antiqued pewter hardware with a soft-close drawer feature. This chest makes a beautiful accent in your bedroom, dining room, entry, hallway or sitting room. 42\"Wx18\"Dx32\"H', 1649, 'wood-4.png'),
(7, 'Woodridge Panel Headboard', 'Woodridge', 'Add a touch of modern rustic elegance to your bedroom with the Woodridge Panel Headboard in Cavern Black finish, including 6-panel headboard with raised diamond pattern at top, 6-panel footboard, and wood rails. Headboard can be used as stand-alone with bed frame. 68\"Wx88\"Dx62\"H', 1499, 'wood-5.png'),
(8, 'Woodridge Upholstered Headboard', 'Woodridge', 'Add a touch of modern rustic elegance to your bedroom with the Woodridge Upholstered Headboard in Cavern Black finish and Mushroom natural linen blend fabric. Double-frame headboard features Antiqued Pewter nail head trim and gimp welting around the fabric. Raised diamond pattern at top, geometric arrow-pattern footboard, and wood rails. Headboard can be used as stand-alone with bed frame. 64\"Wx86', 1399, 'wood-6.png'),
(9, 'Woodridge Upholstered Bed', 'Woodridge', 'Add a touch of modern rustic elegance to your bedroom with the Woodridge Upholstered Bed in Cavern Black finish and Mushroom natural linen blend fabric. Double-frame headboard features Antiqued Pewter nail head trim and gimp welting around the fabric. Raised diamond pattern at top, geometric arrow-pattern footboard, and wood rails. Headboard can be used as stand-alone with bed frame. 80\"Wx86\"Dx60\"', 2299, 'wood-7.png'),
(10, 'Everyday Value Shoreline Nightstand', 'Shoreline', 'The perfect bedside storage! This Sea Salt finish, 2-drawer nightstand has a textured, ribbed top drawer, oil-rubbed bronze pull knobs plus soft, self-closing drawer guides. This table is easily adaptable to use beside your bed, as a hall table or in a living room.', 799, 'shore-1.png'),
(11, 'Everyday Value Shoreline Chest', 'Shoreline', 'A cozy cottage tall chest fits your storage solution needs! This Sea Salt finish, 5-drawer tall chest has two textured, ribbed top drawers, oil-rubbed bronze pull knobs, and custom oval ring pulls featuring soft, self-closing drawer guides.', 1299, 'shore-2.png'),
(12, 'Everyday Value Shoreline Mirror', 'Shoreline', 'A reflection you will love! This Ocean Grey finish, distressed, rectangular, white-framed mirror adds a touch of rustic, coastal chic to your bedroom. Hang it above your dresser or buy a second mirror or a pair of mirrors for a coordinating bathroom.', 299, 'shore-3.png'),
(13, 'Everyday Value Shoreline Panel Bed', 'Shoreline', 'A simple, straightforward panel queen storage bed complements the case pieces in this Shoreline Collection, including side rails, low footboard & 2 storage drawers. A storage bed perfect for sweaters or extra blanket, this white Sea Salt finish bed fits a queen-size mattress and brightens any bedroom space.', 999, 'shore-4.png'),
(14, 'Everyday Value Shoreline Louvered Bed', 'Shoreline', 'A simple, straightforward louvered bed complements the case pieces in this Shoreline Collection, including side rails, low footboard & optional 2 storage drawers. Available as headboard only. This Ocean Grey finish bed fits a queen-size mattress and brightens any bedroom space.', 999, 'shore-5.png'),
(15, 'MODERN Astor Nightstand', 'Modern', 'The MODERN Astor Nightstand with wood base provides sleek, clean lines for a modern or retro-style bedroom. This all-wood nightstand also has a convenient shelf to keep all of your electronics, reading books, and other items handy while keeping your nightstand top clutter free. Plus enjoy the modern convenience of deep, soft-close drawers, a power strip with outlet and 2 USB charging ports.', 1149, 'modern-1.png'),
(16, 'MODERN Rivoli 6 Drawer Dresser', 'Modern', 'Bassett MODERN Rivoli 6-Drawer Dresser provides all of the modern, simple elegance you want. This all-wood dresser has six soft-close drawers and ribbed, metallic hardware. Plus, the deep, dimensional oak is available in two nuanced finishes. More design options available in store 70\"Wx30\"Dx22\"H.', 2599, 'modern-2.png'),
(17, 'MODERN Rivoli Tall Chest', 'Modern', 'The MODERN Rivoli Five-Drawer Chest dresser exudes elegance and minimalism, allowing it to enhance nearly any decor. The oak, which has a multi-step dimensional finish, comes in either Lyon Brown or Normandy Gray. Soft, self-closing mechanisms keep drawers neatly closed, and the ribbed, metallic hardware offers beautiful finishing touches. Dimensions: H52\", W38\", D20\".', 2599, 'modern-3.png'),
(18, 'MODERN Emilia Mirror', 'Modern', 'This MODERN Emilia Mirror in Cacao Brown with Caviar Shagreen calls to mind the 1900s-1920s with its embossed, metal-framed leather strip on all four sides and straight-grain oak veneers. Available in two exquisite finishes: a darker, refined caviar grey and a fresh and light ivory white. 36\"Wx2\"Dx40\"H', 299, 'modern-4.png'),
(19, 'MODERN Astor Bed', 'Modern', 'Bassett MODERN Astor Bed makes modern living a breeze. Fall asleep every night in this trim-lined bed with a fully enclosed wood base and extra tall, upholstered headboard in a neutral fabric. Suitable for just a mattress or a box spring and mattress if you want a higher bed. The deep, dimensional oak available in two nuanced finishes.', 1999, 'modern-6.png'),
(20, 'MODERN Rivoli Bed', 'Modern', 'Easy elegance. Clean lines. With quality materials and this timeless design, the Rivoli Queen Bed will become the focal point of your bedroom. Choose from a Lyon Brown or a Normandy Grey finish; both offer a dimensional oak that showcases the beauty of the natural grain. Dimensions: H60\", W64\", D88\".', 1999, 'modern-7.png'),
(21, 'Charlotte 5 Drawer Chest', 'Charlotte', 'An updated take on old world elegance, the Charlotte 5 Drawer Chest brings the timeless look of lasting quality to the bedroom. Details like understated carved rosettes, recessed lines, and metal ferrules accent this tall chest`s tapered legs.', 1599, 'lotte-1.png'),
(22, 'Charlotte Nightstand', 'Charlotte', 'Rest easy with the timelessly beautiful Charlotte Nightstand close at hand. Choose a dark Tavern finish or soft Washed Elm - both highlight the details and grain of the elm veneer with moderate distressing and glaze. Includes a power strip with USB ports and electrical outlet.', 849, 'lotte-2.png'),
(23, 'Charlotte Bedside Table', 'Charlotte', 'Classic details like understated carved rosettes, recessed lines, metal ferrules, and tapered legs make this table an instant classic. Updated finishes include dark Tavern or soft Washed Elm. Both highlight the details and grain of the elm veneer with moderate distressing and glaze. Other modern updates include a soft-close drawer and a wire management hole in the opening.', 699, 'lotte-3.png'),
(24, 'Charlotte Upholstered Bed w/Low Ftbd', 'Charlotte', 'The Charlotte Queen Upholstered Bed has all the charm of old world design with a modern twist. Traditional details include the understated carved rosettes and recessed lines in the bed`s gently tapered legs. Bedposts with simple turned finials and carved rosettes accent the gently curved arch.', 1499, 'lotte-4.png'),
(25, 'Charlotte Upholstered Bed', 'Charlotte', 'Modern finishes highlight the details and grain of the elm veneer with moderate distressing and glaze. The upholstered headboard softens the look with heathered texture fabric in neutral Oatmeal. Choose dark Tavern finish or soft Washed Elm, and select a low wood footboard or tall, arched upholstered footboard to complete the look.', 1699, 'lotte-5.png'),
(26, 'Charlotte Upholstered Headboard', 'Charlotte', 'Modern finishes highlight the details and grain of the elm veneer with moderate distressing and glaze. The upholstered headboard softens the look with heathered texture fabric in neutral Oatmeal. Choose dark Tavern finish or soft Washed Elm, and select a low wood footboard or tall, arched upholstered footboard to complete the look.', 949, 'lotte-6.png'),
(27, 'Delway Round Ottoman', 'Ottoman', 'Webbed seating construction means you can comfortably settle your feet or a decorative tray, or even use it as a seat. A smooth, top-stitched top and tall, tapered wood legs in walnut finish give it a clean look. Choose your fabric from a range of possibilities.\r\n25\"D 25\"W 19\"H', 779, 'otto-1.png'),
(28, 'Dover Rectangle Storage Ottoman', 'Ottoman', 'A smooth, top-stitched top gives it a clean look. Stash blankets, games, or whatever you like in its roomy concealed storage, with sturdy spring-loaded hinges and a soft fabric lining. Select either concealed wood legs in walnut finish or easy-rolling concealed casters. Choose your upholstery fabric from a range of possibilities.', 979, 'otto-2.png'),
(29, 'Preston Parsons Ottoman', 'Ottoman', 'An ottoman completes the room. Completely customized to your liking, this ottoman complements your sofa or sectional, or adds a playful contrast that ties it all together. Preston seating construction means you can comfortably settle your feet or a decorative tray, or even use it as a seat.', 1099, 'otto-3.png'),
(30, 'Benchmade Ellery Storage Ottoman', 'Ottoman', 'This roomy Casual ottoman is a multi-tasker on wheels, with plenty of easy storage space. And sturdy casters allow you to easily move it from place to place, whether you need a foot rest or a place to set a snack tray. With hundreds of fabric options, you`re sure to find one to fit your room. Stop by a Bassett Furniture showroom for more designer options, like nail head trim. W52\" D24\" H19\"', 1099, 'otto-4.png'),
(31, 'Beckham Leather Storage Ottoman', 'Ottoman', 'With a clean lined avant-garde inspiration, the Beckham collection fits neatly into modern living. More than just stylish, modular design is the ultimate in flexibility. With pieces that can be rearranged, the large scaled luxurious seating moves to suit your purpose, from friends and play to cozy nights in.', 1599, 'otto-5.png'),
(32, 'Bassett Shag Midnight', 'Decor', 'The Bassett Shag collection offers the perfect combination of beautiful colors and a fluffy, soft touch. Made in China.', 329, 'decor-1.png'),
(33, 'Bassett Shag Mushroom', 'Decor', 'The Bassett Shag collection offers the perfect combination of beautiful colors and a fluffy, soft touch. Made in China.', 329, 'decor-2.png'),
(34, 'Thiago Table Lamp', 'Decor', 'Distinctive details and transitional styling make our Thiago table lamp a striking addition to any décor. Its wide round base features a subtle hammered texture and is finished in a rich antique nickel. Topped with a subtly tapered linen shade and capped with a globe finial, Thiago`s bold silhouette is designed to warm up a room.', 219, 'decor-3.png'),
(35, 'Bristol Floor Lamp', 'Decor', 'An English bronze steel foundation showcases an overscale arch, which presents an off-white linen shade with off-white cotton lining. Bracket details join the two-part frame for an architectural and unexpected modern touch. Effortlessly exhibited on an oval faux-marble resin base for an ultra-luxe appeal. Complete with a taupe cloth cord. Finish will vary.', 439, 'decor-4.png'),
(36, 'Farrah Table Lamp', 'Decor', 'Two small dark marks to one shade. This item has been verified to be in working condition at the time of consignment. Although we cannot guarantee that electrical components will function upon receipt due to shipping, transit, and installation, we do take every measure to ensure the safe delivery of our products. We recommend that a qualified electrician reconnect all electrical products.', 279, 'decor-5.png'),
(37, 'Samantha 6 Light Pendant', 'Decor', 'The Pendant Light Samantha 6 features the delicate scroll arm design in satin nickel finish and etched white bell shaped glass. Perfect for almost any room in the home from bedrooms and living rooms to hallways and kitchens.', 449, 'decor-6.png'),
(38, 'Gianna Multi Pillow', 'Decor', 'Experts at merging form with function, we translate the most relevant apparel and home decor trends into fashion-forward products across a range of styles, price points and categories - including rugs, pillows, throws, wall decor, lighting, accent furniture, decorative accessories and bedding. From classic to contemporary, our selection of inspired products provides fresh, colorful and on-trend op', 59, 'decor-7.png'),
(39, 'In Victoria Night Blue Pillow', 'Decor', 'Hand-finished with embroidery and decorative beading, this pillow creates a polished, traditional look with multiple textural elements. A lush, velvety blue background adds dimension and a touch of glam. Hand Embroidered Design with hand applied beading. 100% cotton back.', 109, 'decor-8.png'),
(40, 'Benjamin Clock', 'Decor', 'Imposing 45\" round Benjamin metal wall clock is inspired by 19th-century industrial steam-powered machinery. Stylized Arabic numerals, hands and timepiece in aged iron becomes the focal point of any deserving room. Center time disk easily removes for changing batteries or adjusting the time. 45\"', 299, 'decor-9.png'),
(41, 'McDaniel Clock', 'Decor', 'Oversized Bulova clock offers a rustic appeal that`s timeless. Aged iron hands and Arabic numbers are offset from the knotty pine base to add a sense of depth to this focal point of almost any well-appointed room, including trendy farmhouse decor. Casual look features large, easy-to-read numbers and clean-lined hands. 29\"', 189, 'decor-10.png'),
(42, 'Charlotte Upholstered Panel Bed', 'Charlotte', 'Like the frame of a classic painting, the Charlotte Upholstered Panel Bed adds old world charm to the room with its pared down traditional lines. The shape of the arched wood panel headboard pairs with the simplicity of a low wood footboard.', 1709, 'lotte-7.png'),
(43, 'Woodridge Mirror 2 ', 'Woodridge', 'Top your Woodridge Dresser with this handsome beveled mirror in our Sierra Brown finish, featuring a raised diamond pattern at the brim and platform base. Can be mounted to your dresser or to the wall with supplied hardware. 48\"Wx2\"Dx38\"H', 689, 'wood-8.png'),
(44, 'Woodridge Maple 6 Drawer Dresser', 'Woodridge', 'Made in the USA with solid Appalachian red leaf Maple, it showcases the beauty of the red leaf maple with simple squared shapes and bold proportions. Make a statement with the classic features that bring a nod to tradition, but feature overall clean lines and a contemporary vibe.', 4059, 'wood-9.png'),
(45, 'Dipylon Pendant', 'Decor', 'Inspired by the geodesic domes popularized in the 50`s and 60`s, the Dypilon Chandelier is a superb architectural design. Slender iron rods are meticulously welded creating this classic minimalist pattern.\r\nThe hand applied authentic silver leaf finish adds a polished luster.', 679, 'decor-11.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(36) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Momosu Mochi', 'momosumochi@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(2, 'Admin', 'admin01@gmail.com', '18c6d818ae35a3e8279b5330eda01498', 'admin'),
(3, 'Alexa Dra', 'lettestthis123@gmail.com', '202cb962ac59075b964b07152d234b70', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
