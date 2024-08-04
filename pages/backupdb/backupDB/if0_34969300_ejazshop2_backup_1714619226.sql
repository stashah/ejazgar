

CREATE TABLE `cashaccount` (
  `balid` varchar(255) NOT NULL,
  `detail` varchar(200) NOT NULL,
  `custid` int(11) NOT NULL,
  `amount` float NOT NULL,
  `ldate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `cashloanreturned` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pdate` date NOT NULL,
  `details` varchar(500) NOT NULL,
  `amount` float NOT NULL,
  `custid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `categories` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO categories VALUES("1","Clothing ");
INSERT INTO categories VALUES("2","Jewellary");
INSERT INTO categories VALUES("3","Shoe");



CREATE TABLE `customer` (
  `custid` int(11) NOT NULL AUTO_INCREMENT,
  `custname` varchar(200) NOT NULL,
  `custmobile` varchar(15) NOT NULL,
  `custaddress` varchar(200) NOT NULL,
  PRIMARY KEY (`custid`),
  UNIQUE KEY `custid` (`custid`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=latin1;

INSERT INTO customer VALUES("1","Abid k.dur ","","");
INSERT INTO customer VALUES("2","Ahmad carpenter ","","");
INSERT INTO customer VALUES("3","Akbar C.deh ","","");
INSERT INTO customer VALUES("4","Asif awi ","","");
INSERT INTO customer VALUES("5","Bibi rech ","","");
INSERT INTO customer VALUES("6","Dada ","03430972721","Shamashilly Chervellandeh Booni");
INSERT INTO customer VALUES("7","fakhrul ","","");
INSERT INTO customer VALUES("8","Far ","03429527218","Shamashilly Booni");
INSERT INTO customer VALUES("9","Gul nawaz j.koch ","","");
INSERT INTO customer VALUES("10","Imrana kai ","","");
INSERT INTO customer VALUES("11","moeen lomali ","","");
INSERT INTO customer VALUES("12","Muhsin sonoghur ","","");
INSERT INTO customer VALUES("13","nasima kai ","","");
INSERT INTO customer VALUES("14","Navin ","","");
INSERT INTO customer VALUES("15","Nida ishpresi ","","");
INSERT INTO customer VALUES("16","Overi bechi ","","");
INSERT INTO customer VALUES("17","Police k.jinuli ","","");
INSERT INTO customer VALUES("18","Rauf ","","");
INSERT INTO customer VALUES("19","saba ","","");
INSERT INTO customer VALUES("20","Safida kai ","","");
INSERT INTO customer VALUES("21","Safina kai ","","");
INSERT INTO customer VALUES("22","Shafique shopkeeper ","","");
INSERT INTO customer VALUES("23","Shahzad libas  ","","");
INSERT INTO customer VALUES("24","Shuja relative ","","");
INSERT INTO customer VALUES("25","Staff Safina kai ","","");
INSERT INTO customer VALUES("26","Tahir lal ","03469893125","Booni Chitral");
INSERT INTO customer VALUES("27","Dlted","","");
INSERT INTO customer VALUES("28","hamida kai ","","");
INSERT INTO customer VALUES("29","shakila kai muxudur ","","");
INSERT INTO customer VALUES("30","sardar nawaz ","","");
INSERT INTO customer VALUES("31","tajia nan","","");
INSERT INTO customer VALUES("32","nahida ","","");
INSERT INTO customer VALUES("33","daniyar baig ","","");
INSERT INTO customer VALUES("34","khadija kai healthworker ","","");
INSERT INTO customer VALUES("35","pamir teacher ","","");
INSERT INTO customer VALUES("36","imran lala ","","");
INSERT INTO customer VALUES("37","safida kai friend ","","");
INSERT INTO customer VALUES("38","Qaida kai  israr principal ","","");
INSERT INTO customer VALUES("39","Nida Sikander ","","");
INSERT INTO customer VALUES("40","hashima teklasht ","","");
INSERT INTO customer VALUES("41","nazia laspur ","","");
INSERT INTO customer VALUES("42","abid relative ","","");
INSERT INTO customer VALUES("43","subador shisha wala  ","","");
INSERT INTO customer VALUES("44","nazr ali cherun ","","");
INSERT INTO customer VALUES("45","naeem  ","","");
INSERT INTO customer VALUES("46","manager dada ","","");
INSERT INTO customer VALUES("47","halima ","","");
INSERT INTO customer VALUES("48","ejaz w.deh ","","");
INSERT INTO customer VALUES("49","nilma azim ","","");
INSERT INTO customer VALUES("50","shahida kai gahli ","","");
INSERT INTO customer VALUES("51","Bozir kai safdar lal bozir ","","");
INSERT INTO customer VALUES("52","s/o shamsi ","","");
INSERT INTO customer VALUES("53","zaibul kai ","","");
INSERT INTO customer VALUES("54","safina kai staff awi ","","");
INSERT INTO customer VALUES("55","khalil ","","");
INSERT INTO customer VALUES("56","mumtaz lal ","","");
INSERT INTO customer VALUES("57","Sub Major Dada","","");
INSERT INTO customer VALUES("58","af duro nan ","","");
INSERT INTO customer VALUES("59","khalida kai ","","");
INSERT INTO customer VALUES("60","zahid shotar ","","");
INSERT INTO customer VALUES("61","shamim kai gahli ","","");
INSERT INTO customer VALUES("62","s/o shamim kai gahli ","","");
INSERT INTO customer VALUES("63","lone kai dr ansa ","","");
INSERT INTO customer VALUES("64","faryal cherun ","","");
INSERT INTO customer VALUES("65","w/o hasil ","","");
INSERT INTO customer VALUES("66","w/o manzor lashtdur ","","");
INSERT INTO customer VALUES("67","rashid lot dur ","","");
INSERT INTO customer VALUES("68","s/o faiz ","","");
INSERT INTO customer VALUES("69","f/o s/o faiz ","","");
INSERT INTO customer VALUES("70","w/o sultan khan ","","");
INSERT INTO customer VALUES("71","rakhshinda kai teacher govt school ","","");
INSERT INTO customer VALUES("72","W/o tawakal khan ","","");
INSERT INTO customer VALUES("73","Safia kai shams wali","","");
INSERT INTO customer VALUES("74","sarwat kai ","","");
INSERT INTO customer VALUES("75","w/o sajad tek cherun ","","");
INSERT INTO customer VALUES("76","fida cherun ","","");
INSERT INTO customer VALUES("77","Faridun shah","03409508414","");
INSERT INTO customer VALUES("78","ahmad fida ","","");
INSERT INTO customer VALUES("79","irshad c.deh ","","");
INSERT INTO customer VALUES("80","govt teacher(sanam) ","","");
INSERT INTO customer VALUES("81","amira kai nurse ","","");
INSERT INTO customer VALUES("82","amira kai nurse friend ","","");
INSERT INTO customer VALUES("83","nahida brother ","","");
INSERT INTO customer VALUES("84","khalil shakarndeh ","","");
INSERT INTO customer VALUES("85","W/o ali akbar mukhi ","","");
INSERT INTO customer VALUES("86","w/o fayaz ","","");
INSERT INTO customer VALUES("87","ayub hone ","","");
INSERT INTO customer VALUES("88","shirin relative ","","");
INSERT INTO customer VALUES("89","wajahat lal ","03455446337","");
INSERT INTO customer VALUES("90","sajida sheraz ","","");
INSERT INTO customer VALUES("91","fayyaz shopkeeper  ","","");
INSERT INTO customer VALUES("92","walid ","","");
INSERT INTO customer VALUES("93","D/O Muhammad Amin","000","Lasht Booni");
INSERT INTO customer VALUES("94","Ahmad Ghazi Lotdoor","0000","Loot Dur");
INSERT INTO customer VALUES("95","W/o Hamid Dair","","Dair Lomali");
INSERT INTO customer VALUES("96","Asif Warichnandeh","","warichnandeh");
INSERT INTO customer VALUES("97","Fairuza Miss ","","Dok");
INSERT INTO customer VALUES("98","Naveed l.dur","","");
INSERT INTO customer VALUES("99","W/o imtiaz noghorden","","");
INSERT INTO customer VALUES("100","Nida sikandar","","");
INSERT INTO customer VALUES("101","Rajiha kai","","");
INSERT INTO customer VALUES("102","D/o mahboob bulanlasht. ","","Bulanlasht");
INSERT INTO customer VALUES("103","Nasir k.jinuli","","");
INSERT INTO customer VALUES("104","Nasir k.jinuli","","");
INSERT INTO customer VALUES("105","Parcham kai","03038258378","");
INSERT INTO customer VALUES("106","Munir zait","03007055266","");
INSERT INTO customer VALUES("107","Inayat general store","03430024101","");
INSERT INTO customer VALUES("108","jahanzeb hbl","","");
INSERT INTO customer VALUES("109","W/ o shaukat qasmandeh","","");
INSERT INTO customer VALUES("110","Eidul hussain","03439904809","");
INSERT INTO customer VALUES("111","...","","");
INSERT INTO customer VALUES("112","Zar bibi kai safina kai staff","","");
INSERT INTO customer VALUES("113","Khurshid wife","","");
INSERT INTO customer VALUES("114","Khurshid wife","","");
INSERT INTO customer VALUES("115","W/o ishaq rabat","03439598592","");
INSERT INTO customer VALUES("116","Ahmad","","");
INSERT INTO customer VALUES("117","Ejaz Ahmad","","Shamashilly");
INSERT INTO customer VALUES("118","Shazia kai","","");
INSERT INTO customer VALUES("119","Police","","");
INSERT INTO customer VALUES("120","W/ o aleem sub parisnik","","");
INSERT INTO customer VALUES("121","....","","");
INSERT INTO customer VALUES("122","M/o shiza akhss","","");
INSERT INTO customer VALUES("123","Rehmat rasool","","");
INSERT INTO customer VALUES("124","Suhbat dok","","");
INSERT INTO customer VALUES("125","Munira kai relative","","");
INSERT INTO customer VALUES("126","Fazila kai bozir","","");
INSERT INTO customer VALUES("127","Asmat pari kai","","");
INSERT INTO customer VALUES("128","Fida sonoghur","","");
INSERT INTO customer VALUES("129","Rukhsana kai guchodur","","");
INSERT INTO customer VALUES("130","D/o mahboob lagh dok","","");
INSERT INTO customer VALUES("131","Imtiaz qasmandeh","","");
INSERT INTO customer VALUES("132","Dukan safida kai ","","");
INSERT INTO customer VALUES("133","Tawakal khan wife mulkhowichi","","");
INSERT INTO customer VALUES("134","Safida kai family","","");
INSERT INTO customer VALUES("135","Dashman wife jinali","","");
INSERT INTO customer VALUES("136","Biradar","","");
INSERT INTO customer VALUES("137","Razia sultana kai cherun","","");
INSERT INTO customer VALUES("138","Farman nizar","","");
INSERT INTO customer VALUES("139","Shirin baig","","");
INSERT INTO customer VALUES("140","Sahib wali taj","","");
INSERT INTO customer VALUES("141","Ali nawaz  khan miki","","");
INSERT INTO customer VALUES("142","Khonza hostel","","");
INSERT INTO customer VALUES("143","Abid foto copy","","");
INSERT INTO customer VALUES("144","Munira kai","","");
INSERT INTO customer VALUES("145","Suhrab relative","","");
INSERT INTO customer VALUES("146","W/o wakil dokandeh","","");
INSERT INTO customer VALUES("147","Ubaid rophop","","");
INSERT INTO customer VALUES("148","Shabnum miss nani","","");
INSERT INTO customer VALUES("149","Safdar Ali goal","","");
INSERT INTO customer VALUES("150","Mukhtar syedandur","","");
INSERT INTO customer VALUES("151","Mudasir ","","");
INSERT INTO customer VALUES("152","D/o Mohd Amin charvellu","","");
INSERT INTO customer VALUES("153","Batandur kai","","");
INSERT INTO customer VALUES("154","Amin ullah charvellu","","");
INSERT INTO customer VALUES("155","Ulfat kai","","");
INSERT INTO customer VALUES("156","Shamim kai","","");
INSERT INTO customer VALUES("157","Mut dilli sb ","","");
INSERT INTO customer VALUES("158","Teacher wakil wife friend","","");
INSERT INTO customer VALUES("159","Lomali kai s/o ikram","","");
INSERT INTO customer VALUES("160","Latif lal","","");
INSERT INTO customer VALUES("161","Muhsina kai ","","");
INSERT INTO customer VALUES("162","Staff w/o safdar bozir","","");
INSERT INTO customer VALUES("163","W/o inam birmoghjal ","03426785841","");
INSERT INTO customer VALUES("164","W/o ali anwar w.deh","","");
INSERT INTO customer VALUES("165","Mastuj kai silai wala","","");
INSERT INTO customer VALUES("166","Staff safina kai Bibi gul","","");
INSERT INTO customer VALUES("167","Biradar wife","","");
INSERT INTO customer VALUES("168","W/ samad goal","","");
INSERT INTO customer VALUES("169","Latif army teacher","","");
INSERT INTO customer VALUES("170","Shahana bazandeh","","");
INSERT INTO customer VALUES("171","Ghazi sarwar","","");
INSERT INTO customer VALUES("172","Nargis kai","","");
INSERT INTO customer VALUES("173","Mudasir","","");
INSERT INTO customer VALUES("174","Nighat kai","","");
INSERT INTO customer VALUES("175","W/o rab nawaz syedandur","","");
INSERT INTO customer VALUES("176","Rukhsana dok","","");
INSERT INTO customer VALUES("177","Jamila Quat ","","");
INSERT INTO customer VALUES("178","Shazia qayum","","");
INSERT INTO customer VALUES("179","Nazuk kai bmc","","");
INSERT INTO customer VALUES("180","Bibi brizayu ","","");
INSERT INTO customer VALUES("181","Global ecd","","");
INSERT INTO customer VALUES("182","Shahab w.deh","","");
INSERT INTO customer VALUES("183","Biradar wife zakaria mother","","");
INSERT INTO customer VALUES("184","Biradar wife zakaria mother","","");
INSERT INTO customer VALUES("185","Jabin","","");
INSERT INTO customer VALUES("186","Shahana far friend","","");
INSERT INTO customer VALUES("187","Shapdurehman lal relative","","");
INSERT INTO customer VALUES("188","Safidq kai brother","","");
INSERT INTO customer VALUES("189","W/o zahir qasmandeh","","");
INSERT INTO customer VALUES("190","Police kai parisnik","","");
INSERT INTO customer VALUES("191","Faryal friend","","");
INSERT INTO customer VALUES("192","Benazir kai qasmandeh","","");
INSERT INTO customer VALUES("193","Wajid w.deh","","");
INSERT INTO customer VALUES("194","Hazar mohd","","");
INSERT INTO customer VALUES("195","Saira ","","");
INSERT INTO customer VALUES("196","W/O sahib sultan","","");
INSERT INTO customer VALUES("197","Husain mother w.deh","","");
INSERT INTO customer VALUES("198","Manzoor driver ","","");
INSERT INTO customer VALUES("199","Sakina miss dokandeh","","");
INSERT INTO customer VALUES("200","Zia baba lot dur police","","");
INSERT INTO customer VALUES("201","Ali anwar","","");
INSERT INTO customer VALUES("202","Ambarin kai charantek ","","");
INSERT INTO customer VALUES("203","Mastujik kqi silai wala","","");
INSERT INTO customer VALUES("204","Jamila kai ghoru","","");
INSERT INTO customer VALUES("205","Nabi hone","","");
INSERT INTO customer VALUES("206","S/o anwar lal sumaragh","","");
INSERT INTO customer VALUES("207","Khonza hoteli torkhow","","");
INSERT INTO customer VALUES("208","Ejaz hakimandur","","");
INSERT INTO customer VALUES("209","W/ aziz qasmandeh","","");
INSERT INTO customer VALUES("210","Bayaz brep","","");
INSERT INTO customer VALUES("211","W/o muhsin engineer goal","","");
INSERT INTO customer VALUES("212","Ghazala kai amjad","","");
INSERT INTO customer VALUES("213","Nurse kai lasht s/o amjad","","");
INSERT INTO customer VALUES("214","Saeed ullah dashman","","");
INSERT INTO customer VALUES("215","Sajad w.deh","","");
INSERT INTO customer VALUES("216","Dulla","","");
INSERT INTO customer VALUES("217","D/o sabur lal k.jinuli","","");
INSERT INTO customer VALUES("218","W/o shahzad khalfandur","","");
INSERT INTO customer VALUES("219","Sherzada khan","","");
INSERT INTO customer VALUES("220","Kashmala taj","","");
INSERT INTO customer VALUES("221","Rophop kai","","");
INSERT INTO customer VALUES("222","Sadar dada","","");
INSERT INTO customer VALUES("223","Mubark kai","","");
INSERT INTO customer VALUES("224","Rukhsana aunti","","");
INSERT INTO customer VALUES("225","Nasima kai tokhmiran cherun","","");
INSERT INTO customer VALUES("226","Salima kai w.deh","","");
INSERT INTO customer VALUES("227","Musa carpenter lasht","","");
INSERT INTO customer VALUES("228","Sultan khan lasht","","");
INSERT INTO customer VALUES("229","Sharif ring wala","","");
INSERT INTO customer VALUES("230","Najira","","");
INSERT INTO customer VALUES("231","Kabir dada","","");
INSERT INTO customer VALUES("232","Amin kai guchodur","","");
INSERT INTO customer VALUES("233","Bazandeh kai silai wala","","");
INSERT INTO customer VALUES("234","Ihsan bazandeh","","");
INSERT INTO customer VALUES("235","Ashraf nadir","","");
INSERT INTO customer VALUES("236","Suhrab alim","","");
INSERT INTO customer VALUES("237","W/o Mukhtasim ","","");
INSERT INTO customer VALUES("238","Profit Mutual Fund","000","Aaa");
INSERT INTO customer VALUES("239","Raihana abid","","");
INSERT INTO customer VALUES("240","W/o mumtaz c.deh","","");
INSERT INTO customer VALUES("241","W/o inayat daer","","");
INSERT INTO customer VALUES("242","W/o Atta ur rehman daer","","");
INSERT INTO customer VALUES("243","Sabira kai lasht","","");
INSERT INTO customer VALUES("244","W/o ismail set","","");
INSERT INTO customer VALUES("245","Rashida kai lasht","","");
INSERT INTO customer VALUES("246","Ween","","");
INSERT INTO customer VALUES("247","Kabir dada","","");
INSERT INTO customer VALUES("248","Rahim uddin j.koch","","");
INSERT INTO customer VALUES("249","Amna kai nurse ","","");



CREATE TABLE `customeraccount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salid` varchar(255) NOT NULL,
  `paymentdetail` text DEFAULT NULL,
  `custid` int(11) NOT NULL,
  `amount` float NOT NULL,
  `paymentdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `mutualfund` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pdate` date NOT NULL,
  `details` varchar(500) NOT NULL,
  `amount` float NOT NULL,
  `custid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `mutualfundexpense` (
  `mfexid` int(11) NOT NULL AUTO_INCREMENT,
  `mfexdate` date NOT NULL,
  `mfexdetail` text NOT NULL,
  `mfexamount` float NOT NULL,
  PRIMARY KEY (`mfexid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `payables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pdate` date NOT NULL,
  `details` varchar(500) NOT NULL,
  `amount` float NOT NULL,
  `custid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `products` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(200) NOT NULL,
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

INSERT INTO products VALUES("1","Zellbury 3p WUS23X30400","1");
INSERT INTO products VALUES("2","Khaadi 3p beige ALA230610","1");
INSERT INTO products VALUES("3","Zellburry 3pWUC21E30366","1");
INSERT INTO products VALUES("4","Gulahmed khadar WNS#12132","1");
INSERT INTO products VALUES("5","Gulahmed khadar WNS#12131","1");
INSERT INTO products VALUES("6","Gulahmed khadar WNS#12101","1");
INSERT INTO products VALUES("7","Ladies suit woolen 2p","1");
INSERT INTO products VALUES("8","Dhanak buti 3p","1");
INSERT INTO products VALUES("9","Zellburry cambric 3p WUW21X30298","1");
INSERT INTO products VALUES("10","Har bridal ","2");
INSERT INTO products VALUES("11","Har bridal","2");
INSERT INTO products VALUES("12","Mehndi gajra","2");
INSERT INTO products VALUES("13","Hijab bridal ","1");
INSERT INTO products VALUES("14","Jewellary box Large","2");
INSERT INTO products VALUES("15","Jewellary box small","1");
INSERT INTO products VALUES("16","Jacket ladies parachute","1");
INSERT INTO products VALUES("17","Khaadi 3p purple ALA230807","1");
INSERT INTO products VALUES("18","Khaadi 3p green ALA230814","1");
INSERT INTO products VALUES("19","Edenrobe 3p red 23155","1");
INSERT INTO products VALUES("20","Khaadi 3p mustard ALA23261","1");
INSERT INTO products VALUES("21","Zellburry lawn 3p ","1");
INSERT INTO products VALUES("22","Khaadi 3p ALA230607","1");
INSERT INTO products VALUES("23","Shawl karhai swati","1");
INSERT INTO products VALUES("24","Dopatta printed","1");
INSERT INTO products VALUES("25","Dopatta Ara border","1");
INSERT INTO products VALUES("26","Baby bistara","1");
INSERT INTO products VALUES("27","Kataan ready made 3p","1");
INSERT INTO products VALUES("28","Shirt Mr prince 14-22","1");
INSERT INTO products VALUES("29","Shirts wilayat SML","1");
INSERT INTO products VALUES("31","Shirt AKC Baba 14-24","1");
INSERT INTO products VALUES("32","Shirt AKC 16-22","1");
INSERT INTO products VALUES("33","Bridal suit","1");
INSERT INTO products VALUES("34","Jersey uniform black","1");
INSERT INTO products VALUES("35","Kataan 2p","1");
INSERT INTO products VALUES("36","Sweater basharat","1");
INSERT INTO products VALUES("37","Capshawl","1");
INSERT INTO products VALUES("38","Bridal lehnga red","1");
INSERT INTO products VALUES("39","S-820 24/34","1");
INSERT INTO products VALUES("40","S-14730 24/36","1");
INSERT INTO products VALUES("41","S-2414 24/34","1");
INSERT INTO products VALUES("42","Pink baby frock","1");
INSERT INTO products VALUES("43","S-1281 26/36","1");
INSERT INTO products VALUES("44","S-1037 24/28","1");
INSERT INTO products VALUES("45","F hi kids suit 24/34","1");
INSERT INTO products VALUES("46","Starlet shoe IS 501","3");
INSERT INTO products VALUES("47","Shoe k collection sea green color","3");
INSERT INTO products VALUES("48","Khussa fancy","3");
INSERT INTO products VALUES("49","Shoe sneakers white ZSTAR","3");
INSERT INTO products VALUES("50","Shoe jeans","3");
INSERT INTO products VALUES("51","Mehndi set","2");
INSERT INTO products VALUES("52","S-17291","1");
INSERT INTO products VALUES("53","Edenrobe cambric 1p 20345 ","1");
INSERT INTO products VALUES("54","Edenrobe lawn 1p 20610","1");
INSERT INTO products VALUES("55","Edenrobe 23103A 1p","1");
INSERT INTO products VALUES("56","Edenrobe 20763 1p","1");
INSERT INTO products VALUES("57","Cotton 2p readymade","1");
INSERT INTO products VALUES("58","Pant shapose","1");
INSERT INTO products VALUES("59","Bridal maroon bill bottom","1");
INSERT INTO products VALUES("60","Bridal suit matha patti","1");
INSERT INTO products VALUES("61","Bridal readymade maxi red","1");
INSERT INTO products VALUES("62","Bridal suit maxi","1");
INSERT INTO products VALUES("63","Bridal suit maxi base color white","1");
INSERT INTO products VALUES("64","Bridal suit maxi","1");
INSERT INTO products VALUES("65","Bridal suit masoori purple ","1");
INSERT INTO products VALUES("66","Khaadi 3p offwhite ALA230811","1");
INSERT INTO products VALUES("67","Khaadi 3p pink ALA23182","1");
INSERT INTO products VALUES("68","Edenrobe cambric 1p 20337","1");
INSERT INTO products VALUES("69","Edenrobe cambric 1p 20352","1");
INSERT INTO products VALUES("70","Bangle bridal","2");
INSERT INTO products VALUES("71","Clutch bridal ","2");
INSERT INTO products VALUES("72","Clutch bridal ","2");
INSERT INTO products VALUES("73","Mala single gouch","2");
INSERT INTO products VALUES("74","Sweater girls/eidul","1");
INSERT INTO products VALUES("75","Sweater ladies long (eidul)","1");
INSERT INTO products VALUES("76","Sweater ladies (eidul)","1");
INSERT INTO products VALUES("77","Suit Bee gold","1");
INSERT INTO products VALUES("78","Suit US collection(eidul)","1");
INSERT INTO products VALUES("79","Suit FAG","1");
INSERT INTO products VALUES("80","Jacket parachute boys(eidul)","1");
INSERT INTO products VALUES("81","Upper fleece (eidul)","1");
INSERT INTO products VALUES("82","Shirts (gents)","1");
INSERT INTO products VALUES("83","Fleece suit Zero size(eidul)","1");
INSERT INTO products VALUES("84","Baby suit MK 1 (eidul)","1");
INSERT INTO products VALUES("85","Baby suit Zero size ABC","1");
INSERT INTO products VALUES("86","Shits casual (eidul)","1");
INSERT INTO products VALUES("87","Girls suit Mariam (eidul)","1");
INSERT INTO products VALUES("88","Khelo banyan (eidul)","1");
INSERT INTO products VALUES("89","Sox net (eidul)","1");
INSERT INTO products VALUES("90","Jeans boys (eidul)","1");
INSERT INTO products VALUES("91","Khadar 3p readymade (eidul)","1");
INSERT INTO products VALUES("92","Baby suit wasket(eidul)","1");
INSERT INTO products VALUES("93","Suit Gucci (eidul)","1");
INSERT INTO products VALUES("94","Boys suit (eidul)","1");
INSERT INTO products VALUES("95","Fleece suit (eidul)","1");
INSERT INTO products VALUES("96","Suitcase L","1");
INSERT INTO products VALUES("97","Suitcase M","1");
INSERT INTO products VALUES("98","Suitcase S","1");
INSERT INTO products VALUES("99","Starlet jumper","1");
INSERT INTO products VALUES("100","Leggi mix","1");
INSERT INTO products VALUES("101","Hi neck baby","1");
INSERT INTO products VALUES("102","Khadar WNS#12105","1");
INSERT INTO products VALUES("103","Khaadi 3p blue","1");
INSERT INTO products VALUES("104","Khaadi 3p offwhite","1");
INSERT INTO products VALUES("105","Khaadi 3p pink","1");
INSERT INTO products VALUES("106","Ladies suit 2p chambelli","1");
INSERT INTO products VALUES("107","Ladies suit 2p plachi","1");
INSERT INTO products VALUES("108","Ladies suit 2p heater","1");
INSERT INTO products VALUES("109","Ladies suit 2p karhae Chinese","1");
INSERT INTO products VALUES("110","Ladies suit 2p TR WOOL","1");
INSERT INTO products VALUES("111","Shawl swati sada pure","1");
INSERT INTO products VALUES("112","Shawl swati karhai","1");



CREATE TABLE `purchase` (
  `purchaseid` varchar(255) NOT NULL,
  `productid` int(11) NOT NULL,
  `purqty` double NOT NULL,
  `purprice` double NOT NULL,
  `vendor` varchar(200) NOT NULL,
  `purdate` date NOT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO purchase VALUES("pur20231031696327730311","1","1","1990","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696327730311","2","1","2373","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696327730311","3","1","2690","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696327730311","4","1","2243","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696327730311","5","1","2243","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696327730311","6","1","2243","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696327730311","7","6","700","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696327730311","8","5","900","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696327730311","9","1","2390","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696327730311","10","4","600","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696327730311","11","3","650","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696327730311","13","3","390","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696327730311","14","3","320","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696327730311","15","3","230","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696327730311","16","5","1500","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696327730311","17","1","2303","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696327730311","18","1","2303","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696327730311","12","48","50","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329052978","19","1","2594","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329052978","20","1","2163","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329052978","21","1","1990","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329052978","22","1","2373","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329052978","23","1","1000","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329052978","24","2","500","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329052978","25","1","500","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329052978","26","2","325","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329052978","27","8","1120","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329052978","28","5","325","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329052978","29","2","325","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329624332","31","3","215","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329624332","32","3","275","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329624332","33","1","2050","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329624332","34","4","360","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329624332","35","8","320","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329624332","36","2","2000","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329624332","37","2","1150","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329624332","38","3","6000","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329624332","39","5","1165","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329624332","40","5","1455","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329624332","41","4","1595","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329624332","42","2","1580","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329624332","43","5","1185","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696329624332","44","5","930","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330411034","45","4","1375","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330586664","46","6","1577","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330586664","47","5","750","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330586664","48","24","395","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330586664","49","10","770","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330586664","50","7","370","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330586664","51","4","170","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330586664","52","2","615","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330586664","53","1","695","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330586664","54","1","700","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330586664","55","1","695","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330586664","56","1","695","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330586664","57","2","1100","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330586664","58","3","650","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330586664","59","1","2450","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330586664","60","9","4750","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330586664","61","2","6000","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330935722","63","6","5200","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330935722","64","3","4000","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330935722","65","1","2900","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330935722","66","1","2303","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330935722","67","1","2233","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330935722","68","1","645","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330935722","69","1","695","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330935722","70","30","120","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330935722","71","5","500","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696330935722","72","6","305","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696331363409","73","6","650","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231031696331596506","74","4","400","","2023-10-03","");
INSERT INTO purchase VALUES("pur20231041696417533174","74","4","400","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","75","2","1100","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","76","2","400","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","77","2","300","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","78","1","300","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","79","3","300","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","80","3","1100","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","81","3","850","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","82","5","1000","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","83","3","200","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","84","1","350","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","85","3","200","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","86","12","250","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","87","6","350","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","88","16","100","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","89","13","30","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","92","8","800","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","93","3","550","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","94","2","550","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231041696417533174","95","7","200","","2023-10-04","");
INSERT INTO purchase VALUES("pur20231071696697169770","96","3","1900","","2023-10-07","");
INSERT INTO purchase VALUES("pur20231071696697169770","97","4","1800","","2023-10-07","");
INSERT INTO purchase VALUES("pur20231071696697169770","98","4","1700","","2023-10-07","");
INSERT INTO purchase VALUES("pur20231071696697266559","38","1","6000","","2023-10-03","");
INSERT INTO purchase VALUES("pur202310101696937226842","99","6","1785","Starlet  rwp","2023-10-02","");
INSERT INTO purchase VALUES("pur202310101696937531991","100","47","150","","2023-10-02","");
INSERT INTO purchase VALUES("pur202310101696937847896","101","10","120","","2023-10-02","");
INSERT INTO purchase VALUES("pur202310101696958190983","102","1","2243","","2023-10-02","");
INSERT INTO purchase VALUES("pur202310101696958766439","103","1","2333","Khaadi rwp","2023-10-02","");
INSERT INTO purchase VALUES("pur202310101696958766439","104","1","2233","Khaadi rwp","2023-10-02","");
INSERT INTO purchase VALUES("pur202310101696958766439","105","1","2303","Khaadi rwp","2023-10-02","");
INSERT INTO purchase VALUES("pur202310101696959899230","91","4","1300","","2023-10-10","");
INSERT INTO purchase VALUES("pur202310111697007992289","62","6","4500","","2023-10-02","");
INSERT INTO purchase VALUES("pur202310111697018449701","90","42","320","","2023-10-02","");
INSERT INTO purchase VALUES("pur202311121699795956626","106","6","1250","","2023-11-09","");
INSERT INTO purchase VALUES("pur202311121699795956626","107","6","1350","","2023-11-09","");
INSERT INTO purchase VALUES("pur202311121699795956626","108","5","1480","","2023-11-09","");
INSERT INTO purchase VALUES("pur202311121699795956626","109","5","900","","2023-11-09","");
INSERT INTO purchase VALUES("pur202311121699795956626","110","6","1060","","2023-11-09","");
INSERT INTO purchase VALUES("pur202311121699795956626","111","9","800","","2023-11-09","");
INSERT INTO purchase VALUES("pur202311121699795956626","112","0","1200","","2023-11-09","R");
INSERT INTO purchase VALUES("pur202311121699796783923","112","4","1200","","2023-11-12","");
INSERT INTO purchase VALUES("pur202311221700648890439","112","1","1200","","2023-11-12","");



CREATE TABLE `sale` (
  `saleid` varchar(255) NOT NULL,
  `productid` int(11) NOT NULL,
  `salqty` double NOT NULL,
  `salprice` double NOT NULL,
  `purprice` double NOT NULL,
  `saldate` date NOT NULL,
  `custid` int(11) NOT NULL,
  `account` int(11) NOT NULL,
  `remarks` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO sale VALUES("S202310101696959209000","103","1","3590","2333","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202310101696959209000","104","1","3190","2233","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202310101696959209000","105","1","3290","2303","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202310101696959209000","99","2","2500","1785","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202310101696959209000","102","1","3300","2243","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202310101696959209000","7","1","1000","700","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202310101696959209000","100","1","150","150","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202310101696959209000","101","1","150","120","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202310101696959209000","85","0","350","200","2023-10-10","0","0","R");
INSERT INTO sale VALUES("S202310101696959209000","86","1","500","250","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202310101696959471853","101","2","150","120","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202310101696959471853","1","1","3000","1990","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202310101696959471853","85","1","500","200","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202310101696959568703","101","1","250","120","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202310101696959568703","75","1","1500","1100","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202310101696959568703","85","1","500","200","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202310101696959751416","83","1","350","200","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202310101696959799082","46","1","2100","1577","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202310101696959940032","91","1","1800","1300","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202310111697018506735","90","1","500","320","2023-10-10","0","0","");
INSERT INTO sale VALUES("S202311131699869368589","12","4","100","50","2023-10-11","0","0","");
INSERT INTO sale VALUES("S202311131699869368589","101","1","150","120","2023-10-11","0","0","");
INSERT INTO sale VALUES("S202311131699869368589","50","1","800","370","2023-10-11","0","0","");
INSERT INTO sale VALUES("S202311131699869368589","42","1","1580","1580","2023-10-11","0","0","");
INSERT INTO sale VALUES("S202311131699869368589","100","1","150","150","2023-10-11","0","0","");
INSERT INTO sale VALUES("S202311131699869614461","12","3","100","50","2023-10-12","0","0","");
INSERT INTO sale VALUES("S202311131699869657793","7","1","1000","700","2023-10-14","0","0","");
INSERT INTO sale VALUES("S202311131699869692982","98","1","2300","1700","2023-10-16","0","0","");
INSERT INTO sale VALUES("S202311131699869692982","7","1","1000","700","2023-10-16","0","0","");
INSERT INTO sale VALUES("S202311131699869766901","7","1","1000","700","2023-10-17","0","0","");
INSERT INTO sale VALUES("S202311131699869766901","13","1","800","390","2023-10-17","0","0","");
INSERT INTO sale VALUES("S202311131699869766901","61","1","13000","6000","2023-10-17","0","0","");
INSERT INTO sale VALUES("S202311131699869823929","24","1","800","500","2023-10-21","0","0","");
INSERT INTO sale VALUES("S202311131699869862276","80","1","1500","1100","2023-10-22","0","0","");
INSERT INTO sale VALUES("S202311131699869862276","23","1","1600","1000","2023-10-22","0","0","");
INSERT INTO sale VALUES("S202311131699869912411","74","1","650","400","2023-10-25","0","0","");
INSERT INTO sale VALUES("S202311131699869912411","76","1","800","400","2023-10-25","0","0","");
INSERT INTO sale VALUES("S202311131699869912411","24","1","700","500","2023-10-25","0","0","");
INSERT INTO sale VALUES("S202311131699869963952","76","1","800","400","2023-10-26","0","0","");
INSERT INTO sale VALUES("S202311131699869963952","75","1","1400","1100","2023-10-26","0","0","");
INSERT INTO sale VALUES("S202311131699870038011","48","1","800","395","2023-10-27","0","0","");
INSERT INTO sale VALUES("S202311131699870072110","96","1","3400","1900","2023-10-28","0","0","");
INSERT INTO sale VALUES("S202311131699870072110","36","1","2700","2000","2023-10-28","0","0","");
INSERT INTO sale VALUES("S202311131699870152024","49","1","1400","770","2023-10-31","0","0","");
INSERT INTO sale VALUES("S202311211700573050472","18","1","3000","2303","2023-11-10","0","0","");
INSERT INTO sale VALUES("S202311211700573050472","8","1","1800","900","2023-11-10","0","0","");
INSERT INTO sale VALUES("S202311211700573117850","49","1","1400","770","2023-11-11","0","0","");
INSERT INTO sale VALUES("S202311211700573152278","12","2","100","50","2023-11-12","0","0","");
INSERT INTO sale VALUES("S202311211700573207482","7","1","1000","700","2023-11-14","0","0","");
INSERT INTO sale VALUES("S202311211700573245001","17","1","3000","2303","2023-11-15","0","0","");
INSERT INTO sale VALUES("S202311211700573280606","4","1","3100","2243","2023-11-17","0","0","");
INSERT INTO sale VALUES("S202311211700573280606","17","1","3000","2303","2023-11-17","0","0","");
INSERT INTO sale VALUES("S202311211700573515742","8","4","1500","900","2023-11-21","0","0","");
INSERT INTO sale VALUES("S202311211700573515742","48","2","800","395","2023-11-21","0","0","");
INSERT INTO sale VALUES("S202311211700573515742","5","1","3350","2243","2023-11-21","0","0","");
INSERT INTO sale VALUES("S202311211700573515742","6","1","3350","2243","2023-11-21","0","0","");
INSERT INTO sale VALUES("S202311211700573515742","97","2","2500","1800","2023-11-21","0","0","");
INSERT INTO sale VALUES("S202311231700717151124","14","1","600","320","2023-11-21","0","0","");
INSERT INTO sale VALUES("S202311271701066957608","63","1","12000","5200","2023-11-25","0","0","");
INSERT INTO sale VALUES("S202311271701066957608","73","1","1500","650","2023-11-25","0","0","");
INSERT INTO sale VALUES("S202311271701066957608","11","1","1300","650","2023-11-25","0","0","");
INSERT INTO sale VALUES("S202311271701066957608","48","1","600","395","2023-11-25","0","0","");
INSERT INTO sale VALUES("S202311271701066957608","70","1","400","120","2023-11-25","0","0","");
INSERT INTO sale VALUES("S202311271701066957608","97","1","2400","1800","2023-11-25","0","0","");
INSERT INTO sale VALUES("S202311271701066957608","74","1","500","400","2023-11-25","0","0","");
INSERT INTO sale VALUES("S20231251701789289439","16","2","2800","1500","2023-11-23","0","0","");
INSERT INTO sale VALUES("S20231261701869752030","12","22","80","50","2023-11-24","0","0","");
INSERT INTO sale VALUES("S20231261701869852147","81","1","1500","850","2023-11-26","0","0","");
INSERT INTO sale VALUES("S20231261701869885593","100","1","150","150","2023-11-27","0","0","");
INSERT INTO sale VALUES("S20231261701869947571","99","1","2300","1785","2023-12-02","0","0","");
INSERT INTO sale VALUES("S20244281714306534660","41","1","2200","1595","2024-03-24","0","0","");
INSERT INTO sale VALUES("S20244281714306534660","45","1","2000","1375","2024-03-24","0","0","");
INSERT INTO sale VALUES("S20244291714360854069","45","1","2000","1375","2024-03-27","0","0","");
INSERT INTO sale VALUES("S20244291714360854069","40","1","2200","1455","2024-03-27","0","0","");
INSERT INTO sale VALUES("S20244291714360854069","92","2","1500","800","2024-03-27","0","0","");
INSERT INTO sale VALUES("S20244291714360854069","22","1","3190","2373","2024-03-27","0","0","");
INSERT INTO sale VALUES("S20244291714361014643","41","2","2100","1595","2024-04-03","0","0","");
INSERT INTO sale VALUES("S20244291714361014643","40","1","2100","1455","2024-04-03","0","0","");
INSERT INTO sale VALUES("S20244291714361014643","3","1","3000","2690","2024-04-03","0","0","");
INSERT INTO sale VALUES("S20244291714361014643","21","1","3000","1990","2024-04-03","0","0","");
INSERT INTO sale VALUES("S20244291714361014643","9","1","3000","2390","2024-04-03","0","0","");
INSERT INTO sale VALUES("S20244291714361014643","87","1","1400","350","2024-04-03","0","0","");
INSERT INTO sale VALUES("S20244291714361014643","39","1","2200","1165","2024-04-03","0","0","");
INSERT INTO sale VALUES("S20244291714361014643","29","1","500","325","2024-04-03","0","0","");
INSERT INTO sale VALUES("S20244291714361014643","100","1","300","150","2024-04-03","0","0","");
INSERT INTO sale VALUES("S20244291714361014643","46","1","2100","1577","2024-04-03","0","0","");
INSERT INTO sale VALUES("S20244291714361014643","88","1","250","100","2024-04-03","0","0","");
INSERT INTO sale VALUES("S20244291714361014643","28","1","600","325","2024-04-03","0","0","");
INSERT INTO sale VALUES("S20244291714361014643","57","1","1500","1100","2024-04-03","0","0","");
INSERT INTO sale VALUES("S20244291714361014643","45","1","1800","1375","2024-04-03","0","0","");
INSERT INTO sale VALUES("S20244291714361526467","20","1","3000","2163","2024-04-13","0","0","");
INSERT INTO sale VALUES("S20244291714361526467","48","2","900","395","2024-04-13","0","0","");
INSERT INTO sale VALUES("S20244291714361526467","32","1","600","275","2024-04-13","0","0","");
INSERT INTO sale VALUES("S20244291714361526467","12","3","75","50","2024-04-13","0","0","");
INSERT INTO sale VALUES("S20244291714361759501","70","29","120","120","2023-12-19","0","0","");



CREATE TABLE `shopusers` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `usertype` text NOT NULL,
  `password` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO shopusers VALUES("1","Ejaz","ejaz","Admin","1234","03245224915","Booni ");
INSERT INTO shopusers VALUES("3","Tahir","tahir","admin","123","03469893125","Booni");

