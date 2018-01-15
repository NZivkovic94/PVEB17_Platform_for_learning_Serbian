

-- adding admin and proffessor
INSERT INTO `administrator`(`id_administrator`) VALUES (1);
INSERT INTO `professor`(`id_professor`) VALUES (2);



-- adding new tags

INSERT INTO `tag`(`id_tag`, `tag_content`) VALUES 
("programming",null),
("serbian",null),
("motivation",null),
("ai",null),
("hacking",null);

-- adding new lessons

INSERT INTO `lesson`(`id_lesson`, `title`, `description_lesson`, `level`, `date_created`, `id_author`, `video_url`, `validated`, `longitude`, `latitude`) VALUES 
(	1,
	"Future of hacking - Sunny Vaghela",
	"Sunny is a 28 year old countries' pioneer Information Security & Cyber Crime Consultant. The young and dynamic personality of Sunny has not only assisted in solving complex cyber crime cases but has also played an instrumental role in creating awareness about information security and cyber crimes. Sunny is a 28 year old countries' pioneer Information Security & Cyber Crime Consultant. The young and dynamic pesonality of Sunny has not only assisted in solving complex cyber crime cases but has also played an instrumental role in creating awareness about information security and cyber crimes. This talk was given at a TEDx event using the TED conference format but independently organized by a local community. ",
	null,
	null,
	1,
	"https://www.youtube.com/embed/0kz9XQCumNU",null,null,null
),
(	2,
	"Understanding Artificial Intelligence",
	"Neil Nie demonstrates how artificial intelligence--and particularly, object recognition--works... and how it will effect the future. Neil Nie is a computer science student at Deerfield Academy. He started programming when he was 13 and has developed many applications for iPhones and Macs. Neil currently has several apps on the App Store and is researching neural networks and machine learning. This talk was given at a TEDx event using the TED conference format but independently organized by a local community.",
	null,
	null,
	1,
	"https://www.youtube.com/embed/SN2BZswEWUA",null,null,null
),
(	3,
	"How I taught myself to code ",
	"In this delightfully choreographed presentation, Litha Soyizwapi tells the story of how his innate curiosity and natural chutzpah led him initially into graphic design and then, remarkably, onto a path where he taught himself to code and ultimately create one of the most successful apps in South Africa. Litha Soyizwapi is a graphic designer and a self-taught app developer. His popular GauRider app is the quickest and most elegant way to manage commutes on Gautrain—the rapid transit railway system linking Johannesburg, Pretoria and OR Tambo International Airport in Gauteng Province, South Africa. ",
	null,
	null,
	1,
	"https://www.youtube.com/embed/nmZR_JsLCfg",null,null,null
),
(	4,
	"The Art of Code",
	"I believe, if we continue down the path were currently on, yes, we can teach every young person to code. But I also think, that were going to teach them that coding is something thats learned through memorization and that coding is something where theres one right answer. Zach offers a new perspective. Zach Latta is the co-founder and executive director of Hack Club, where he works to bring coding clubs to high schools worldwide. Before Hack Club, he built the backend architecture for Yo – an app with more than 3 million users. Before that he helped launch and grow a game to over 1 million users, reaching #1 in the games category on the App Store.",
	null,
	null,
	2,
	"https://www.youtube.com/embed/GqgTwkTP6PM",null,null,null
),
(	5,
	"Coding Is for everyone ",
	"You could solve your own problem better if you would have learned coding already! 'Software innovation' in your own discipline can bring faster and better changes. Taus is a high school student, software developer and entrepreneur based in Dhaka. Starting to code at the age of 10 he soon became the youngest Zend Certified Engineer in the world of that time. He's been involved in founding a few tech startups so far. He is the Founder and President of ITTW Conferences and the National Olympiad in Software Innovation (NOSI) through which he promotes computer programming and entrepreneurship in IT amongst high school, college and university students. Beside that, he is also the co-founder and CEO of a tech startup called Incogmito, that focuses on anonymous social networking.",
	null,
	null,
	2,
	"https://www.youtube.com/embed/RhpOAymsUkc",null,null,null
);



INSERT INTO `lesson_has_tag`(`id_tag`, `id_lesson`, `id_professor`, `id_administrator`) 
VALUES 
("programming",1,null,1),
("motivation",1,null,1),
("hacking",1,null,1),

("programming",2,null,1),
("ai",2,null,1),

("programming",3,null,1),
("ai",3,null,1),

("programming",4,2,null),
("motivation",4,2,null),

("ai",5,2,null),
("motivation",5,2,null);

