Create database fyi_urdu;
use fyi_urdu;  
CREATE TABLE `users` ( 
  `Email` varchar(50) NOT NULL primary key,
  `First_name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Photo` varchar(250) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Function` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `isEmailConfirmed` tinyint(4) NOT NULL,
  `token` varchar(10) COLLATE utf8_unicode_ci NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
CREATE TABLE `news` (
  `id` int(255) NOT NULL AUTO_INCREMENT primary key,
  `title` text NOT NULL,
  `description` longtext NULL,
  `type` varchar(50) NOT NULL,
  `media` tinytext  NULL,
  `content` longtext  NULL,
  `pubDate` datetime NOT NULL,
  `employee` varchar(50) NOT NULL,   
  `status` int(50) NOT NULL DEFAULT '0',
  `thumbnail` text  NULL,
  FOREIGN KEY (employee) REFERENCES users(Email) on DELETE CASCADE on UPDATE CASCADE 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `news_published` (
  `id` int(255) NOT NULL AUTO_INCREMENT primary key,
  `title` text NOT NULL,
  `description` longtext NULL,
  `type` varchar(50) NOT NULL,
  `media` tinytext  NULL,
  `content` longtext  NULL,
  `pubDate` datetime NOT NULL,
  `employee` varchar(50) NOT NULL,
  `status` int(50) NOT NULL DEFAULT '1',
  `thumbnail` text  NULL,
  FOREIGN KEY (employee) REFERENCES users(Email) on DELETE CASCADE on UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 
CREATE TABLE `ads` (
  `id` int(255) NOT NULL AUTO_INCREMENT primary key,
  `title` text NOT NULL,
  `description` longtext NULL, 
  `media` tinytext  NULL,
  `pdf` tinytext  NULL,
  `content` longtext  NULL,
  `pubDate` datetime NOT NULL,
  `finDate` int NOT NULL,
  `employee` varchar(50) NOT NULL,
  `thumbnail` text  NULL,
  FOREIGN KEY (employee) REFERENCES users(Email) on DELETE CASCADE on UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 



 


CREATE TABLE `utilisateurs` (
  `email` varchar(50) NOT NULL  primary key,
  `name` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  `isEmailConfirmed` tinyint(4) NOT NULL,
  `token` varchar(10) COLLATE utf8_unicode_ci NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 



CREATE TABLE comments(
`id` int(255) not null AUTO_INCREMENT PRIMARY key,
    response longtext ,
    media tinytext null,
    time datetime ,
    id_news int(255) not null ,
    email_user varchar(50) not null, 
    FOREIGN key(id_news) REFERENCES news_published(id) on DELETE CASCADE on UPDATE CASCADE ,
    FOREIGN key(email_user) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE  

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE replies(
`id` int(255) not null AUTO_INCREMENT PRIMARY key,
    response longtext ,
    media tinytext null,
    time datetime ,
    id_news int(255) not null ,
    email_user varchar(50) not null,
    id_comment int(255) not null,
    FOREIGN key(id_news) REFERENCES news_published(id) on DELETE CASCADE on UPDATE CASCADE ,
    FOREIGN key(email_user) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE ,
    FOREIGN key(id_comment) REFERENCES comments(id) on DELETE CASCADE on UPDATE CASCADE 

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE report(id int(255) not null AUTO_INCREMENT PRIMARY key,
                    id_news int(255) not null,
                    email_user_report varchar(50) not null,
                    email_user_abuse varchar(50) not null,
                    id_comment int(255) null,
                    id_reply int(255) null,
                    date_report datetime not null,
                    type varchar(50) not null,
                    other longtext null ,
                    FOREIGN KEY(id_news) REFERENCES news_published(id) on DELETE CASCADE on UPDATE CASCADE,
                    FOREIGN KEY(email_user_report) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE,
                    FOREIGN KEY(email_user_abuse) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE,
                    FOREIGN KEY(id_comment) REFERENCES comments(id) on DELETE CASCADE on UPDATE CASCADE ,
                    FOREIGN KEY (id_reply) REFERENCES replies(id) on DELETE CASCADE on UPDATE CASCADE  
                    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
                    

 
CREATE TABLE adscomments(
`id` int(255) not null AUTO_INCREMENT PRIMARY key,
    response longtext ,
    media tinytext null,
    time datetime ,
    id_ads int(255) not null ,
    email_user varchar(50) not null, 
    FOREIGN key(id_ads) REFERENCES ads(id) on DELETE CASCADE on UPDATE CASCADE ,
    FOREIGN key(email_user) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE  

)ENGINE=InnoDB DEFAULT CHARSET=utf8;
 


CREATE TABLE adsreplies(
`id` int(255) not null AUTO_INCREMENT PRIMARY key,
    response longtext ,
    media tinytext null,
    time datetime ,
    id_ads int(255) not null ,
    email_user varchar(50) not null,
    id_comment int(255) not null,
    FOREIGN key(id_ads) REFERENCES ads(id) on DELETE CASCADE on UPDATE CASCADE ,
    FOREIGN key(email_user) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE ,
    FOREIGN key(id_comment) REFERENCES adscomments(id) on DELETE CASCADE on UPDATE CASCADE 

)ENGINE=InnoDB DEFAULT CHARSET=utf8;
 


CREATE TABLE adsreport(id int(255) not null AUTO_INCREMENT PRIMARY key,
                    id_ads int(255) not null,
                    email_user_report varchar(50) not null,
                    email_user_abuse varchar(50) not null,
                    id_comment int(255) null,
                    id_reply int(255) null,
                    date_report datetime not null,
                    type varchar(50) not null,
                    other longtext null ,
                    FOREIGN KEY(id_ads) REFERENCES ads(id) on DELETE CASCADE on UPDATE CASCADE,
                    FOREIGN KEY(email_user_report) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE,
                    FOREIGN KEY(email_user_abuse) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE,
                    FOREIGN KEY(id_comment) REFERENCES adscomments(id) on DELETE CASCADE on UPDATE CASCADE ,
                    FOREIGN KEY (id_reply) REFERENCES adsreplies(id) on DELETE CASCADE on UPDATE CASCADE  
                    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
                    

 CREATE TABLE settings(id int(255) not null PRIMARY key,
                    numberofs int(255) not null  
                    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
  
  
  
 CREATE TABLE account(id int(255) not null PRIMARY key,
                    email varchar(100)  null, 
                    password varchar(100)  null,  
                    host varchar(100)  null,  
                    port int  null,
                    maxsizecomments int  null ,
                    smtpsecure varchar(100)  null  ,
                    link varchar(100)  null 
                    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE dates(date date not null PRIMARY key )ENGINE=InnoDB DEFAULT CHARSET=utf8;

 CREATE TABLE countries(country varchar(100) not null PRIMARY key,
  geoplugin_city text,geoplugin_countryCode varchar(100),
  geoplugin_timezone varchar(100))ENGINE=InnoDB DEFAULT CHARSET=utf8;

 CREATE TABLE visitors(date date ,country varchar(100),nb int(255) DEFAULT 1,
  FOREIGN KEY(date) REFERENCES dates(date) on DELETE CASCADE on UPDATE CASCADE,
  FOREIGN KEY(country) REFERENCES countries(country) on DELETE CASCADE on UPDATE CASCADE,
   primary key (date, country)
  )ENGINE=InnoDB DEFAULT CHARSET=utf8; 

create table total_visitors( 
session varchar(250) primary key,
ip varchar(250),
time int(250),time2 int(250),country varchar(100),
FOREIGN KEY(country) REFERENCES countries(country) on DELETE CASCADE on UPDATE CASCADE  )ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
 
  
CREATE TABLE rss_sources (id int(255) not null PRIMARY key,
                         source varchar(100)  null, 
                         type varchar(100)  null,    
                         status int  null ,country varchar(100)  null
                    )ENGINE=InnoDB DEFAULT CHARSET=utf8;




 CREATE TABLE `rss` (`id` int(200) NOT NULL AUTO_INCREMENT primary key,
                  `title` longtext NOT NULL,
                  `description` longtext  NULL,
                  `link` longtext NOT NULL,
                  `pubDate` text NOT NULL, 
                  `media` text  NULL, 
                  `favorite` int(255) null,
                  `thumbnail` longtext  NULL ,
                  FOREIGN KEY (favorite) REFERENCES rss_sources(id) on DELETE CASCADE on UPDATE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;



 
     CREATE TABLE user_sources (`email` varchar(50) NOT NULL ,
      id int(255) not null ,  PRIMARY key(email,id),  
      FOREIGN KEY(id) REFERENCES rss_sources(id) on DELETE CASCADE on UPDATE CASCADE, 
      FOREIGN KEY(email) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE
      )
     ENGINE=InnoDB DEFAULT CHARSET=utf8;

      
/*****/ 

CREATE TABLE `rss_tmp` (`id` int(200) NOT NULL AUTO_INCREMENT primary key,
                  `title` longtext NOT NULL,
                  `description` longtext  NULL,
                  `link` tinytext NOT NULL,
                  `pubDate` text NOT NULL, 
                  `media` text  NULL, 
                  `favorite` int(255) null,
                  `thumbnail` text  NULL ,
                  FOREIGN KEY (favorite) REFERENCES rss_sources(id) on DELETE CASCADE on UPDATE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* v4 */
  CREATE TABLE user_news (`email` varchar(50) NOT NULL ,
      id int(255) not null ,  PRIMARY key(email,id),  
      FOREIGN KEY(id) REFERENCES news_published(id) on DELETE CASCADE on UPDATE CASCADE, 
      FOREIGN KEY(email) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE
      )ENGINE=InnoDB DEFAULT CHARSET=utf8;  

  CREATE TABLE user_ads (`email` varchar(50) NOT NULL ,
      id int(255) not null ,  PRIMARY key(email,id),  
      FOREIGN KEY(id) REFERENCES ads(id) on DELETE CASCADE on UPDATE CASCADE, 
      FOREIGN KEY(email) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE
      )ENGINE=InnoDB DEFAULT CHARSET=utf8; 

/* v5 */ 
CREATE TABLE rss_comments(
`id` int(255) not null AUTO_INCREMENT PRIMARY key,
    response longtext ,
    media tinytext null,
    time datetime ,
    id_news int(200) not null ,
    email_user varchar(50) not null, 
    FOREIGN key(id_news) REFERENCES rss(id) on DELETE CASCADE on UPDATE CASCADE ,
    FOREIGN key(email_user) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE   
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE rss_replies(
`id` int(255) not null AUTO_INCREMENT PRIMARY key,
    response longtext ,
    media tinytext null,
    time datetime ,
    id_news int(200) not null ,
    email_user varchar(50) not null,
    id_comment int(255) not null,
    FOREIGN key(id_news) REFERENCES rss(id) on DELETE CASCADE on UPDATE CASCADE ,
    FOREIGN key(email_user) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE ,
    FOREIGN key(id_comment) REFERENCES rss_comments(id) on DELETE CASCADE on UPDATE CASCADE 
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE rss_report(id int(255) not null AUTO_INCREMENT PRIMARY key,
                    id_news int(200) not null,
                    email_user_report varchar(50) not null,
                    email_user_abuse varchar(50) not null,
                    id_comment int(255) null,
                    id_reply int(255) null,
                    date_report datetime not null,
                    type varchar(50) not null,
                    other longtext null ,
                    FOREIGN KEY(id_news) REFERENCES rss(id) on DELETE CASCADE on UPDATE CASCADE,
                    FOREIGN KEY(email_user_report) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE,
                    FOREIGN KEY(email_user_abuse) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE,
                    FOREIGN KEY(id_comment) REFERENCES rss_comments(id) on DELETE CASCADE on UPDATE CASCADE ,
                    FOREIGN KEY (id_reply) REFERENCES rss_replies(id) on DELETE CASCADE on UPDATE CASCADE  
                    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
 
CREATE TABLE footer(id int(255) not null PRIMARY key,
                    aboutus longtext  null, 
                    chatsrun text  null,  
                    whatsapp text  null,  
                    email text  null, 
                    fyi_likes int(255)  null , 
                    twitter text  null ,
                    facebook text  null ,
                    youtube text  null 
                    )ENGINE=InnoDB DEFAULT CHARSET=utf8; 
     
/* v6 */ 
CREATE TABLE `language_users` (
  `email` varchar(50) NOT NULL  primary key,
  `name` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  `isEmailConfirmed` tinyint(4) NOT NULL,
  `token` varchar(10) COLLATE utf8_unicode_ci NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;  
 

/* v7 */
CREATE TABLE `messages` (
  `id` bigint(20) not null AUTO_INCREMENT PRIMARY key,
  `email` varchar(50) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(100) NOT NULL,
  `subject` text NOT NULL, 
  `message` text NOT NULL , 
  `phone` varchar(50) NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;  
  
/* temp  */  
CREATE TABLE temp_comments(
    `id` int(255) not null AUTO_INCREMENT PRIMARY key,
    response longtext ,
    media tinytext null,
    time datetime ,
    id_news int(255) not null ,
    email_user varchar(50) not null, 
    FOREIGN key(id_news) REFERENCES news_published(id) on DELETE CASCADE on UPDATE CASCADE ,
    FOREIGN key(email_user) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE  
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE temp_replies(  
    `id` int(255) not null AUTO_INCREMENT PRIMARY key,
    response longtext ,
    media tinytext null,
    time datetime ,
    id_news int(255) not null ,
    email_user varchar(50) not null,
    id_comment int(255) not null,
    FOREIGN key(id_news) REFERENCES news_published(id) on DELETE CASCADE on UPDATE CASCADE ,
    FOREIGN key(email_user) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE 
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE temp_adscomments(
    `id` int(255) not null AUTO_INCREMENT PRIMARY key,
    response longtext ,
    media tinytext null,
    time datetime, 
    id_ads int(255) not null ,
    email_user varchar(50) not null, 
    FOREIGN key(id_ads) REFERENCES ads(id) on DELETE CASCADE on UPDATE CASCADE ,
    FOREIGN key(email_user) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE  
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE temp_adsreplies(
    `id` int(255) not null AUTO_INCREMENT PRIMARY key,
    response longtext ,
    media tinytext null,
    time datetime ,
    id_ads int(255) not null ,
    email_user varchar(50) not null,
    id_comment int(255) not null,
    FOREIGN key(id_ads) REFERENCES ads(id) on DELETE CASCADE on UPDATE CASCADE ,
    FOREIGN key(email_user) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE  
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE temp_rss_comments(
    `id` int(255) not null AUTO_INCREMENT PRIMARY key,
    response longtext ,
    media tinytext null,
    time datetime ,
    id_news int(200) not null ,
    email_user varchar(50) not null, 
    FOREIGN key(id_news) REFERENCES rss(id) on DELETE CASCADE on UPDATE CASCADE ,
    FOREIGN key(email_user) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE   
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
   
CREATE TABLE temp_rss_replies(
`id` int(255) not null AUTO_INCREMENT PRIMARY key,
    response longtext ,
    media tinytext null, 
    time datetime ,
    id_news int(200) not null , 
    email_user varchar(50) not null,
    id_comment int(255) not null,
    FOREIGN key(id_news) REFERENCES rss(id) on DELETE CASCADE on UPDATE CASCADE ,
    FOREIGN key(email_user) REFERENCES utilisateurs(email) on DELETE CASCADE on UPDATE CASCADE  
)ENGINE=InnoDB DEFAULT CHARSET=utf8; 
   

 CREATE TABLE sources_not_open(  
    source varchar(100) not null PRIMARY key
  )ENGINE=InnoDB DEFAULT CHARSET=utf8; 
   

insert into settings values(1,10),(2,2),(3,10);
insert into users values("123@chatsrun.com","Admin","Admin","Male","1.png","$2y$10$ri8gecwi4ceBpDwW2g47XOGtdVzWF0eDNxb91UxjAQZ9MwC6Hfboi","Admin",0,1,'');

insert into account values(1,"noreply@chatsrun.com","@ftre34#kl987La","mail.chatsrun.com",465,20,"ssl","https://www.fyipress.net/urdu"); 
/* ur */
 insert into footer values(1,"ہم ایک انفارمیشن سائٹ ہیں ... ہم سماجی نیٹ ورک (chatsrun) سے تعلق رکھتی ہیں ... ہم اپنے نیٹ ورک پر کسی بھی مذہب، نسل یا رنگ کا حق نہیں دیتے ... ہم ہمیشہ آپ کے تجاویز سے خوش ہیں", 
  "https://www.chatsrun.com/","https://api.whatsapp.com/send?phone=97450279427",
  "contact_us.php",1,"https://twitter.com/","https://www.facebook.com/",
  "https://www.youtube.com");
   
insert into rss_sources values(1,"samaa tv","News",1,"Pakistan"),
 (2,"Daily Adalat","News",1,"Pakistan"), 
 (4,"Asia Times","News",1,"India"),
 (5,"Harpal Online","News",1,"India"), 
 (6,"Daily kashmir","News",1,"Pakistan"),  
 (9,"Express News","News",1,"Pakistan"), (10,"Express News","Sports",1,"Pakistan"),(11,"Express News","Technology",1,"Pakistan"), (12,"Express News","General Culture",1,"Pakistan"),
 (13,"BBC","News",1,"United Kingdom"),
 (14,"The Siasat","News",1,"India"),
 (15,"VOA","Sports",1,"United States"), (16,"VOA","News",1,"United States"),(17,"VOA","Arts",1,"United States"),(18,"VOA","Technology",1,"United States");
 
 
insert into rss_sources values
(3,"dailyaag","News",1,"Pakistan"),
(7,"Bhatkallys","News",1,"India"),
(8,"Chauthi Duniya","News",1,"India"),
(19,"Aaj Kal","News",1,"Pakistan"),
(20,"Zama Swat","News",1,"Pakistan"),
(21,"Jasarat","News",1,"Pakistan"),
(22,"Juraat","News",1,"Pakistan"),
(23,"Daily Mussalman","News",1,"Pakistan"),
(24,"Lahore Post","News",1,"Pakistan"),
(25,"Chitral Times","News",1,"Pakistan"),
(26,"Nawaiwaqt","News",1,"Pakistan"),
(27,"Bolta","News",1,"Pakistan"), 
(28,"Daily Taqat","News",1,"Pakistan"),
(29,"Ummat","News",1,"Pakistan"),
(30,"Daily Universal","News",1,"Pakistan");
 
insert into sources_not_open values('Chauthi Duniya'),('Jasarat');


 create table links  (id int(255) not null PRIMARY key, http_link longtext  null, 
                    https_link longtext  null )ENGINE=InnoDB DEFAULT CHARSET=utf8;  
insert into links(1,'https://www.fyipress.net/urdu','https://www.fyipress.net/urdu');