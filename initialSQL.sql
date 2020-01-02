create database webca;

CREATE TABLE users (
    id VARCHAR(20)  PRIMARY KEY,
    pwd VARCHAR(20),
    email VARCHAR(20) UNIQUE KEY, 
    birth DATE
);

insert into users values('admin', '1', 'admin@mail.com', null);


CREATE TABLE moviedetail (
	mid int PRIMARY KEY,
    title VARCHAR(100),
    release_date DATE,
    isAdult Int,
    popularity Float,
    vote_average Float,
    overview TEXT,
    imgsrc Varchar(255)
);


INSERT INTO `moviedetail` (`mid`, `title`, `release_date`, `isAdult`, `popularity`, `vote_average`, `overview`, `imgsrc`) VALUES
(335983, 'Venom', '2018-10-03', 0, 368.719, 6.5, 'Eddie Brock is a reporter, investigating people who want to go unnoticed. But after he makes a terrible discovery at the Life Foundation, he begins to transform into â€˜Venomâ€™.  The Foundation has discovered creatures called symbiotes, and believes theyâ€™re the key to the next step in human evolution. Unwittingly bonded with one, Eddie discovers he has incredible new abilities - and a voice in his head thatâ€™s telling him to embrace the darkness.  One of Marvelâ€™s most celebrated anti-heroes comes to the big screen in â€˜Venomâ€™, starring Tom Hardy, Michelle Williams and Riz Ahmed.', '/2uNW4WbgBXL25BAbXGLnLqX71Sw.jpg'),
(338952, 'Fantastic Beasts: The Crimes of Grindelwald', '2018-11-14', 0, 315.827, 7, 'Gellert Grindelwald has escaped imprisonment and has begun gathering followers to his causeâ€”elevating wizards above all non-magical beings. The only one capable of putting a stop to him is the wizard he once called his closest friend, Albus Dumbledore. However, Dumbledore will need to seek help from the wizard who had thwarted Grindelwald once before, his former student Newt Scamander, who agrees to help, unaware of the dangers that lie ahead. Lines are drawn as love and loyalty are tested, even among the truest friends and family, in an increasingly divided wizarding world.', '/uyJgTzAsp3Za2TaPiZt2yaKYRIR.jpg'),
(346910, 'The Predator', '2018-09-13', 0, 179.214, 5.2, 'When a kid accidentally triggers the universe\'s most lethal hunters\' return to Earth, only a ragtag crew of ex-soldiers and a disgruntled female scientist can prevent the end of the human race.', '/wMq9kQXTeQCHUZOG4fAe5cAxyUA.jpg'),
(353081, 'Mission: Impossible - Fallout', '2018-07-13', 0, 129.802, 7.2, 'When an IMF mission ends badly, the world is faced with dire consequences. As Ethan Hunt takes it upon himself to fulfill his original briefing, the CIA begin to question his loyalty and his motives. The IMF team find themselves in a race against time, hunted by assassins while trying to prevent a global catastrophe.', '/AkJQpZp9WoNdj7pLYSj1L0RcMMN.jpg'),
(360920, 'The Grinch', '2018-11-08', 0, 152.814, 6.2, 'The Grinch hatches a scheme to ruin Christmas when the residents of Whoville plan their annual holiday celebration.', '/rWQVj6Z8kPdsbt7XPjVBCltxq90.jpg'),
(375588, 'Robin Hood', '2018-09-01', 0, 133.976, 6.6, 'A war-hardened Crusader and his Moorish commander mount an audacious revolt against the corrupt English crown.', '/AiRfixFcfTkNbn2A73qVJPlpkUo.jpg'),
(404368, 'Ralph Breaks the Internet', '2018-11-20', 0, 117.495, 7.4, 'Taking place six years following the events of the first film, the story will center on Ralph\'s adventures in the Internet data space when a Wi-Fi router gets plugged into the arcade as he must find a replacement part to fix Sugar Rush.', '/m110vLaDDOCca4hfOcS5mK5cDke.jpg'),
(424694, 'Bohemian Rhapsody', '2018-10-24', 0, 162.23, 8.2, 'Singer Freddie Mercury, guitarist Brian May, drummer Roger Taylor and bass guitarist John Deacon take the music world by storm when they form the rock \'n\' roll band Queen in 1970. Hit songs become instant classics. When Mercury\'s increasingly wild lifestyle starts to spiral out of control, Queen soon faces its greatest challenge yet â€“ finding a way to keep the band together amid the success and excess.', '/lHu1wtNaczFPGFDTrjCSzeLPTKN.jpg'),
(463821, 'The House with a Clock in Its Walls', '2018-09-15', 0, 155.089, 6.4, 'Ten-year-old Lewis goes to live with his uncle in a creaky old house that contains a mysterious ticktock noise. When Lewis accidentally awakens the dead, the town\'s sleepy facade magically springs to life with a secret world of witches and warlocks.', '/qM66Hv4ByAxnilr0jaqCA9uOD4Y.jpg'),
(507569, 'The Seven Deadly Sins: Prisoners of the Sky', '2018-08-18', 0, 252.2, 5.9, 'Traveling in search of the rare ingredient, â€œsky fishâ€  Meliodas and Hawk arrive at a palace that floats above the clouds. The people there are busy preparing a ceremony, meant to protect their home from a ferocious beast that awakens once every 3,000 years. But before the ritual is complete, the Six Knights of Blackâ€”a Demon Clan armyâ€”removes the seal on the beast, threatening the lives of everyone in the Sky Palace.', '/r6pPUVUKU5eIpYj4oEzidk5ZibB.jpg');