-- MySQL dump 10.13  Distrib 8.0.22, for macos10.15 (x86_64)
--
-- Host: 127.0.0.1    Database: boardgame
-- ------------------------------------------------------
-- Server version	8.0.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `adminId` int NOT NULL AUTO_INCREMENT COMMENT '管理員編號',
  `adminAccount` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '管理員帳號',
  `adminPwd` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '管理員密碼',
  `adminName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '管理員姓名',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','Hannah','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `categoryId` int NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `categoryName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '類別名稱',
  `categoryParentId` int DEFAULT '0' COMMENT '上層編號',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時?',
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='類別資料表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (8,'卡牌',0,'2021-05-10 15:00:04','2021-05-10 15:00:04'),(11,'策略',0,'2021-05-10 15:10:22','2021-05-10 15:10:22'),(12,'派對',0,'2021-05-10 15:10:34','2021-05-10 15:10:34'),(13,'情境',0,'2021-05-10 15:10:39','2021-05-10 15:10:39'),(14,'親子',0,'2021-05-10 15:10:42','2021-05-10 15:10:42'),(15,'陣營',0,'2021-05-10 15:10:49','2021-05-10 15:10:49'),(16,'合作',0,'2021-05-10 15:10:56','2021-05-10 15:10:56');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_lists`
--

DROP TABLE IF EXISTS `item_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item_lists` (
  `itemListId` int NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `orderId` int NOT NULL COMMENT '訂單編號',
  `itemId` int NOT NULL COMMENT '商品編號',
  `checkPrice` int NOT NULL COMMENT '結帳時單價',
  `checkQty` tinyint NOT NULL COMMENT '結帳時數量',
  `checkSubtotal` int NOT NULL COMMENT '結帳時小計',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  PRIMARY KEY (`itemListId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='訂單中的商品列表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_lists`
--

LOCK TABLES `item_lists` WRITE;
/*!40000 ALTER TABLE `item_lists` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `items` (
  `itemId` int NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `itemName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品名稱',
  `itemImg` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品照片路徑',
  `itemPrice` int NOT NULL COMMENT '商品價格',
  `itemQty` tinyint NOT NULL COMMENT '商品數量',
  `itemCategoryId` int NOT NULL COMMENT '商品種類編號',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  `itemDescription` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '	商品內容',
  PRIMARY KEY (`itemId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='商品列表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'妙語說書人','item_20210511044849.jpg',1480,5,8,'2021-05-10 15:12:48','2021-05-11 10:54:10','屏氣凝神！插圖即將掀開了！ 這些插圖都圍繞著一個主題：一段令人費解的句子。但是，這段句子實際上是源於這五張插圖之一，到底是哪一張呢？ 你要利用天生的才華以及直覺來找到它，同時也要躲開其他玩家所設下的陷阱。  Dixit是一款令人感到驚奇、歡樂以及興奮的遊戲，適合讓你與你的家人以及朋友們一起遊戲。'),(2,'卡坦島','item_20210511044943.jpg',1490,5,11,'2021-05-10 15:13:56','2021-05-11 10:49:43','自1995年榮獲德國年度遊戲冠軍以來，卡坦島讓全世界無數的人為之瘋狂，流連於這個充滿益智與趣味的遊戲當中。 現在，我們歡迎你的加入！  扮演勇敢的拓荒者，來到這座不知名的島上，你們叫它卡坦島。 創立了第一批的村莊，收集資源，鋪設道路，興建城市，並且透過交易各取所需，解決資源分佈不均的問題。然而卡坦島畢竟是個小島，土地與資源都很有限；當勢力越來越強大，衝突也隨之而來。 你是否能從群雄中脫穎而出，稱霸卡坦島？  想進入桌上遊戲的世界，一定不能錯過卡坦島！'),(3,'卡坦島 騎士擴充','item_20210511044953.jpg',1490,20,12,'2021-05-10 15:14:38','2021-05-11 10:49:53','卡坦島保衛戰！  ‍大約在第一批移民來到卡坦島定居的670年後，滿載戰士的卡拉維爾帆船艦隊在島嶼北岸登陸。卡坦島的軍事統帥托嬈必須號召騎士們共同抵禦外侮！ 將騎士進化為砲兵或騎兵來提高戰力，只要大家同心協力，便能阻擋敵人的挺進。你們能夠在敵人的援軍到達前，殲滅他們的要塞嗎？這是卡坦島危急存亡之秋。  本劇本包含三個連續的章節，每個章節必須克服不同的困境，才能保住卡坦島的自由！許多新元素相繼加入，玩家們必須不斷調整策略，才能在激烈的戰況中，擊敗征服者的大軍！  戰鬥於焉展開！  本擴充並非獨立遊戲須搭配：卡坦島基本版及卡坦島騎士擴充方能進行遊戲。'),(4,'卡坦島 大盒版','item_20210511045002.jpg',2480,8,13,'2021-05-10 15:15:13','2021-05-11 10:50:02','經驗更遼闊的卡坦世界！  卡坦島基本版、卡坦島5-6人擴充、4個精彩的卡坦島劇本擴充加上卡坦島骰子版，都收藏在這盒卡坦島大盒版之中！  基本版和各劇本皆可加入卡坦島5-6人擴充，供3-6名玩家一同遊玩！ 每款擴充都為遊戲帶來新的可能性，豐富了卡坦體驗的多樣化！  卡坦島帶給數以百萬計的卡坦迷無限的歡樂與刺激！ 現在全新的卡坦世界正對您敞開大門，邀您一同遨遊！'),(5,'矮人十兄弟','item_20210511045010.jpg',1490,20,14,'2021-05-10 15:25:20','2021-05-11 16:38:56','這些礦工矮人們整天在坑道中挖掘寶石，雖然累積的財富無數，但長年灰頭土臉，生活習慣相當糟糕，衛生兩字他們從沒聽過。自從白雪公主來了以後，豐盛的晚餐上桌前，必定要求他們將手洗淨，但是，頑固的矮人們由於長相穿著都很相似，經常魚目混珠、瞞騙公主。聰明的公主在他們的帽子繡上編號，一個個點名檢查，一旦排序錯誤，公主就會大發雷霆，矮人們就甭想吃晚餐了！快幫幫這些糊塗又頑固的矮人們依序排隊洗手，上桌吃頓豐盛的晚餐吧！  這是一款團隊合作遊戲，所有的玩家要在有限的回合中，傳達有效的資訊給其他玩家，讓矮人們依編號出現，贏得一頓豐盛的晚餐。'),(6,'504','item_20210511045020.jpg',5490,20,15,'2021-05-10 15:25:46','2021-05-12 09:31:19','本遊戲提供504種不同的玩法！ 九個不同的遊戲模組，造就504種不同的規則組合！  每次遊戲請依序選擇三個不同的模組，第一個模組將決定你的獲勝方式，第二個模組決定你賺錢的方式，最後一個模組則勾勒遊戲的大致走向，這一共有9x8x7=504種組合！  遊戲提供的九個模組為：物流–在城市之間奔走，運送貨物、競速–試圖先於你的對手達陣、特權–藉由不同特權獲取優勢、軍事–充滿衝突與戰爭的世界、探索–探索未知的世界、道路–建構你個人的交通網、多數–試著取得多數席次，進行區域控制、生產–成為貨物生產大王、股權–爭奪各股份有限公司的所有權。'),(7,'滿腦子番茄','item_20210511045031.jpg',3490,20,16,'2021-05-10 15:26:24','2021-05-12 09:31:37','馬克思與艾瑪這對夫婦經營一座很大很大的農場，大到轉眼間你就會迷了路呢！ 櫻桃怎麼會在雞窩裡？ 馬怎麼睡在床上？ 奶油上叉的竟然是乾草叉！？ 噢～真是一團亂！ 你可以幫馬克思和艾瑪把所有東西物歸原位嗎？'),(8,'動物疊疊樂','item_20210511045039.jpg',1290,20,8,'2021-05-10 15:26:57','2021-05-12 09:31:54','動物們想來場特技表演，牠們要堆疊成一座巨大的金字塔，這需要高超的技巧與過人的勇氣！ 誰能將企鵝放在鱷魚上面，把綿羊放在企鵝上面，再把蛇放在綿羊身上呢？大熊想要站上這金字塔頂端，但是這高度著實使牠頭暈目眩！  一款搖搖晃晃的堆疊遊戲，也可以一個人玩喔！'),(9,'諾亞鬧方舟','item_20210511045056.jpg',14900,20,11,'2021-05-10 16:42:53','2021-05-12 16:47:34','每位玩家都擁有一艘自己的方舟，並要盡量載運最多的動物。  不幸的是，一位叫諾亞的傢伙堅持所有成對的動物都屬於他。因此，任何玩家在遊戲結束時，若船上有2隻相同的動物就必須送給諾亞。但是，如果你能收集三隻、四隻甚至五隻相同的動物，不但能規避此規則，而且將為你帶來更高的價值。然而，知易行難︰動物要形成一群之前，通常免不了先湊成一對......  ‍  當方舟啟航時，你的船上會擁有最有價值的單隻動物和動物群來贏得這場比賽嗎？');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `members` (
  `memberId` int NOT NULL AUTO_INCREMENT COMMENT '會員編號',
  `memberAccount` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員帳號',
  `memberPwd` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員密碼',
  `memberName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員姓名',
  `memberNickname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員暱稱',
  `memberGender` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員性別',
  `memberEmail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員電子郵件',
  `memberPhone` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員手機號碼',
  `memberImg` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員大頭貼',
  `memberBirthday` date NOT NULL COMMENT '會員出生年月日',
  `memberAddress` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員住址',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  PRIMARY KEY (`memberId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,'hannah','675dc611bafb0b7348dd3baf7e005b6916fb954d','方漢娜','Hannah8','女','hannah0807@gmail.com','0988888888','20210511101824.jpg','2021-01-13','台北市大安區和平東路二段106號9樓','2021-05-11 16:18:24','2021-05-11 16:18:24'),(2,'rinn888','ce2cffb7c758775c971317bfd9e7af1cb87fb51d','蔡志珊','阿志','男','asdfg1234@gmail.com','0958982411','20210511050618.jpg','0000-00-00','台北市萬華區西寧南路49號','2021-05-11 15:11:26','2021-05-11 15:11:26'),(3,'hahaha999','7fed65b07bf4ca955a2870efa3ecda62abe1615c','王寶旺','旺旺','男','kioo84@gmail.com','0958982411','20210511050353.jpg','1991-12-20','台北市信義區中坡北路195號','2021-05-11 15:11:28','2021-05-11 15:11:28'),(4,'apple0918','c46056d49b3657abd1ba90e0d2af444ee44dc7a2','張佩璇','佩璇','女','apple0918@gmail.com','0928474076','20210511101842.jpg','1995-08-06','新北市土城區中央路三段254號','2021-05-11 16:18:43','2021-05-11 16:18:43'),(5,'bssardino123','aec5064fff3a6ebe2137ee3875f7ebdc7249864f','陳羿水','水水','女','bssardino123@gmail.com','091564876','20210511051016.jpg','1999-01-03','台中市西屯區國安一路268號','2021-05-11 15:11:32','2021-05-11 15:11:32'),(6,'karniola0910','7cd474797f716639348c0d389702f452fe45e546','夏佩君','夏夏','女','karniola0910@gmail.com','0929748837','20210511051219.jpeg','2001-09-10','桃園市楊梅區高上路一段254號','2021-05-11 15:11:34','2021-05-11 15:11:34'),(7,'batra0423','a6623fa422dfb8b976eeb08ecf61930ea93dc002','王麗雯','Batra','女','batra0423@gmail.com','0956339454','20210511051359.jpg','2005-04-23','新北市新店區碧潭路262號','2021-05-11 15:11:36','2021-05-11 15:11:36'),(8,'dfef488151','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3','吳力丹','丹丹','男','dfef488151@gmail.com','0972431011','20210511063127.jpg','1992-07-09','桃園市龜山區文化三路90號','2021-05-11 15:11:43','2021-05-11 15:11:43'),(12,'test000','d214aab71e69595e42083fbe5662dd7f575d49ae','林志財','財哥','男','test000@gmail.com','0956701197','20210511091339.jpg','1997-08-25','台北市信義區虎林街119號','2021-05-11 15:13:39','2021-05-11 15:13:39');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message` (
  `messageId` int NOT NULL AUTO_INCREMENT COMMENT '留言編號',
  `memberId` int NOT NULL COMMENT '會員編號',
  `storeId` int NOT NULL COMMENT '分店編號',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '留言內容',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  PRIMARY KEY (`messageId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (1,2,1,'安安大家好\r\n明天下午2:00矮人礦坑缺2','2021-05-10 14:17:56','2021-05-12 10:08:29'),(2,8,1,'留言板測試','2021-05-13 10:18:22','2021-05-13 10:18:22');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multiple_images`
--

DROP TABLE IF EXISTS `multiple_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `multiple_images` (
  `multipleImageId` int NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `multipleImageImg` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '圖片名稱',
  `itemId` int NOT NULL COMMENT '商品編號',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  PRIMARY KEY (`multipleImageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='商品圖片';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multiple_images`
--

LOCK TABLES `multiple_images` WRITE;
/*!40000 ALTER TABLE `multiple_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `multiple_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `orderId` int NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `memberAccount` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '使用者帳號',
  `paymentTypeId` int NOT NULL COMMENT '付款方式',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  PRIMARY KEY (`orderId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='結帳資料表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'user',0,'2021-05-12 15:28:56','2021-05-12 15:28:56'),(2,'user',2,'2021-05-12 15:49:59','2021-05-12 15:49:59'),(3,'user',1,'2021-05-12 16:50:37','2021-05-12 16:50:37'),(4,'hannah',2,'2021-05-13 09:40:49','2021-05-13 09:40:49'),(5,'hannah',2,'2021-05-13 09:45:02','2021-05-13 09:45:02'),(6,'hannah',2,'2021-05-13 09:46:36','2021-05-13 09:46:36'),(7,'hannah',2,'2021-05-13 09:47:40','2021-05-13 09:47:40'),(8,'hannah',3,'2021-05-13 09:52:00','2021-05-13 09:52:00'),(9,'hannah',3,'2021-05-13 09:52:56','2021-05-13 09:52:56'),(10,'hannah',3,'2021-05-13 10:02:28','2021-05-13 10:02:28');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_types`
--

DROP TABLE IF EXISTS `payment_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_types` (
  `paymentTypeId` int NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `paymentTypeName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '付款方式名稱',
  `paymentTypeImg` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '付款方式圖片名稱',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  PRIMARY KEY (`paymentTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='付款方式';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_types`
--

LOCK TABLES `payment_types` WRITE;
/*!40000 ALTER TABLE `payment_types` DISABLE KEYS */;
INSERT INTO `payment_types` VALUES (1,'apple pay','payment_type_20210513094932.png','2021-04-23 10:40:44','2021-05-13 09:49:32'),(2,'Line pay','payment_type_20210513095005.jpg','2021-04-23 14:38:58','2021-05-13 09:50:05'),(3,'超商付款','payment_type_20210513094906.png','2021-05-13 09:49:06','2021-05-13 09:49:06');
/*!40000 ALTER TABLE `payment_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reply` (
  `replyId` int NOT NULL AUTO_INCREMENT COMMENT '回文編號',
  `messageId` int NOT NULL COMMENT '留言編號',
  `memberId` int NOT NULL COMMENT '會員編號',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '留言內容',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  PRIMARY KEY (`replyId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reply`
--

LOCK TABLES `reply` WRITE;
/*!40000 ALTER TABLE `reply` DISABLE KEYS */;
INSERT INTO `reply` VALUES (1,1,4,'我要+1','2021-05-11 13:48:14','2021-05-12 10:09:26'),(2,1,3,'不要玩矮人礦坑那種糞GAME啦','2021-05-11 14:01:03','2021-05-12 10:09:42'),(8,2,1,'87','2021-05-12 15:22:39','2021-05-12 15:22:39'),(12,2,1,'哈','2021-05-13 23:48:30','2021-05-13 23:48:30');
/*!40000 ALTER TABLE `reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservations` (
  `reservationId` int NOT NULL AUTO_INCREMENT COMMENT '預約編號',
  `memberId` int NOT NULL COMMENT '會員編號',
  `date` date NOT NULL COMMENT '預約時間',
  `startTime` int NOT NULL COMMENT '開始時間,24小時制',
  `duration` tinyint(1) NOT NULL DEFAULT '3' COMMENT '預約時數, 3-8hrs',
  `storeId` int NOT NULL COMMENT '分店編號',
  `numberOfPeople` tinyint(1) NOT NULL COMMENT '預約人數4-8',
  `priceEstimated` int NOT NULL COMMENT '金額預算',
  `notes` varchar(50) DEFAULT NULL COMMENT '客人備註',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`reservationId`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (1,1,'2021-05-08',13,3,2,6,1800,'hahahaha','2021-05-13 11:37:03','2021-05-13 11:37:03'),(2,2,'2021-05-12',13,3,2,6,1800,'yeyeyeyeyeye','2021-05-13 11:37:09','2021-05-13 11:37:09'),(3,3,'2021-05-31',13,4,2,4,1600,'yeah','2021-05-13 11:37:19','2021-05-13 11:37:19'),(4,4,'2021-05-28',13,3,1,6,1800,NULL,'2021-05-13 11:37:23','2021-05-13 11:37:23'),(5,1,'2021-06-30',13,3,1,6,1800,'我們有六個人','2021-05-13 11:37:26','2021-05-13 11:37:26'),(6,3,'2021-06-30',13,3,2,6,1800,'hahahahah','2021-05-13 11:42:37','2021-05-13 11:42:37'),(7,6,'2021-05-31',13,3,2,6,1800,'hahahahah','2021-05-13 11:37:33','2021-05-13 11:37:33'),(8,2,'2021-06-03',13,8,1,3,2400,'hey','2021-05-13 11:38:25','2021-05-13 11:38:25'),(10,3,'2021-10-27',13,8,1,3,2400,'','2021-05-13 11:42:23','2021-05-13 11:42:23'),(11,4,'2021-10-06',15,3,1,3,900,'','2021-05-13 11:43:21','2021-05-13 11:43:21'),(12,5,'2021-05-25',13,3,1,3,900,'','2021-05-13 11:44:01','2021-05-13 11:44:01'),(13,5,'2021-04-04',13,8,1,8,6400,'八人八小時八八八','2021-05-13 11:44:28','2021-05-13 11:44:28'),(14,7,'2021-05-31',19,3,2,8,2400,'','2021-05-13 11:45:33','2021-05-13 11:45:33'),(15,7,'2021-05-16',13,8,2,8,6400,'qqq','2021-05-13 11:45:53','2021-05-13 11:45:53'),(16,12,'2021-05-19',13,3,1,3,900,'','2021-05-13 11:46:47','2021-05-13 11:46:47'),(17,12,'2021-05-25',13,3,1,8,2400,'bahahahaha','2021-05-13 11:47:03','2021-05-13 11:47:03'),(19,2,'2021-05-25',13,3,1,3,900,'嘿嘿嘿嘿嘿','2021-05-13 23:40:37','2021-05-13 23:40:37');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store`
--

DROP TABLE IF EXISTS `store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `store` (
  `storeId` int NOT NULL AUTO_INCREMENT COMMENT '分店編號',
  `storeName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分店名稱',
  `phoneNum` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '手機號碼',
  `cityTalk` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '市話',
  `socialMedia` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '社交軟體',
  `address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '地址',
  `storePhoto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '照片名稱',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  PRIMARY KEY (`storeId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store`
--

LOCK TABLES `store` WRITE;
/*!40000 ALTER TABLE `store` DISABLE KEYS */;
INSERT INTO `store` VALUES (1,'高雄楠梓店','0986878027','(07)366-3313','https://www.facebook.com/%E7%98%8B%E6%A1%8C%E9%81%','高雄市楠梓區宏昌街2號','store_20210511084005.jpg','2021-05-11 14:40:05','2021-05-11 14:40:05'),(3,'台北大安店','0906666265','(02)2703-600','https://www.facebook.com/PHDAAN02/?fref=ts','台北市大安區通化街28巷2號','store_20210511090827.jpg','2021-05-11 15:08:27','2021-05-11 15:08:27'),(4,'台北新店店','','(02)2218-006','https://www.facebook.com/phantasia04/','新北市新店區民權路161號2樓','store_20210511091227.jpg','2021-05-11 15:12:27','2021-05-11 15:12:27'),(5,'台中逢甲店','','(04)2706-520','https://www.facebook.com/%E7%98%8B%E6%A1%8C%E9%81%','台中市西屯區文華路162巷32號','store_20210511091516.jpg','2021-05-11 15:15:16','2021-05-11 15:15:16'),(6,'桃園桃園店','','(03)369-9600','https://www.facebook.com/phantasia05','桃園市桃園區宏昌八街124號','store_20210511091719.jpg','2021-05-11 15:17:19','2021-05-11 15:17:19'),(7,'台中忠孝店','','(04)2280-466','https://www.facebook.com/phantasia028/','台中市東區忠孝路242號','store_20210511092152.jpg','2021-05-11 15:21:52','2021-05-11 15:21:52'),(8,'新北三重店','','(02)2979-166','https://www.facebook.com/CBGSanchong/','新北市三重區中央南路62-2號1樓','store_20210511092634.jpg','2021-05-11 15:26:34','2021-05-11 15:26:34');
/*!40000 ALTER TABLE `store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voucher`
--

DROP TABLE IF EXISTS `voucher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `voucher` (
  `voucherId` int NOT NULL AUTO_INCREMENT COMMENT '折價券編號',
  `voucherName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '折價券名稱',
  `voucherPrice` int NOT NULL COMMENT '折價券面額',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  PRIMARY KEY (`voucherId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voucher`
--

LOCK TABLES `voucher` WRITE;
/*!40000 ALTER TABLE `voucher` DISABLE KEYS */;
INSERT INTO `voucher` VALUES (1,'小遊戲優惠券',20,'2021-05-10 10:26:23','2021-05-10 10:26:23'),(2,'會員生日優惠券',50,'2021-05-10 10:26:23','2021-05-10 10:27:55'),(3,'員工優惠券',99,'2021-05-10 10:27:33','2021-05-10 10:27:33'),(4,'會員周年優惠券',50,'2021-05-10 10:33:59','2021-05-10 10:33:59'),(5,'測試優惠券',100,'2021-05-10 10:55:13','2021-05-10 11:28:07');
/*!40000 ALTER TABLE `voucher` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-14  0:14:16
