Drop database if exists villiers;
Create database villiers;
Use villiers;

Create table evenements (
    idevent int(11) not null auto_increment,
    nomevent varchar(50),
    dateevent date,    
    heureevent time,
    lieuevent varchar(50),
    nbievent int(25),
    prixplaceevent float(25),
    placestotal int(25),
    primary key (idevent)
) ENGINE=InnoDB;

Insert into evenements values
(1, "Chasse au trésor", "2021-09-28", "12:00:00", "Urban Gaming", 565, 35, 5000),
(2, "Fête foraine", "2021-03-28", "09:00:00", "Espace Franconi", 15, 25, 10000),
(3, "Pool Party", "2021-04-07", "21:00:00", "Molitor", 989, 75, 15000),
(4, "Golf", "2021-06-15", "10:00:00", "Château de Versaille", 9857, 100, 20000);

Create table participations (
	idpart int(11) not null auto_increment,
	emailuser varchar(255) UNIQUE,
	evenement varchar(255),
	date_heure_inscription datetime,
	primary key (idpart)
) ENGINE=InnoDB;

Create table conservatoires (
	idconserv int(11) not null auto_increment,
	nomconserv varchar(50),
	adresseconserv varchar(255),
	telephone varchar(10) UNIQUE,
	effectifs int(25),
	datecreationconserv date,
	primary key (idconserv)
) ENGINE=InnoDB;

Insert into conservatoires values
(1, "Wolfgand Amadeus Mozart", "7, passage de la Canopée, 75001 Paris", "0142361786", 1800, "2016-09-03"),
(2, "Gabriel Fauré", "12 Rue de Pontoise, 75005 Paris", "0146339798", 1000, "1962-09-03"),
(3, "Jean-Phillipe Rameau", "3 ter rue Mabillon, 75006 Paris", "0155427620", 1200, "1995-09-03"),
(4, "Erik Satie", "135 bis, rue de l'Université, 75007 Paris", "0147053301", 9000, "1984-09-03"),
(5, "Camille Saint-Saëns", "208, rue de Faubourg Saint Honoré, 75008 Paris", "0145635384", 800, "2005-09-03"),
(6, "Nadia et Lili Boulanger", "17, rue de Rochechouart, 75009 Paris", "0144538686", 1000, "1972-09-03"),
(7, "Hector Berlioz", "6, rue de Pierre Bullet, 75010 Paris", "0142383377", 100, "2009-08-26"),
(8, "Charles Munch", "7, rue Duranti, 75011 Paris", "0147008607", 4600, "1999-07-19"),
(9, "Paul Dukas", "51 rue Jorge Semprun, 75012 Paris", "0143411766", 1600, "2014-09-03"),
(10, "Maurice Ravel", "16, rue Nicolas Fortin, 75013 Paris", "0144066320", 1600, "2013-07-29"),
(11, "Darius Milhaud", "2, impasse Vandal, 75014 Paris", "0158142090", 1000, "1954-06-01"),
(12, "Frédéric Chopin", "43, rue Bargue, 75015 Paris", "0142731532", 1300, "2019-11-11"),
(13, "Francis Poulenc", "11, rue Jean de la Fontaine, 75016", "0155747040", 1000, "1988-09-03"),
(14, "Claude Debussy", "222, rue de Courcelles, 75017 Paris", "0147649899", 1000, "2019-09-03"),
(15, "Gustave Charpentier", "29, rue Baudelique, 75018 Paris", "0142642477", 80, "1900-12-25"),
(16, "Jacques Ibert", "81, rue Armand Carrel, 75019 Paris", "0142064270", 1500, "1957-09-03"),
(17, "Georges Bizet", "3, place Carmen, 75020 Paris", "0140335005", 1300, "2000-01-01"),
(18, "Maurice Ravel", "33, rue Gabriel Périe, 92300 Levallois-Perret", "0147157676", 7000, "2019-09-03"),
(19, "Saint-Germain", "44, rue du Commandant Guilbaud, 75016 Paris", "0101010101", 5000, "1967-07-08"),
(20, "Marseillouse", "3, boulevard Michelet, 13008 Marseille", "0000000000", 0, "1800-09-12"),
(21, "Coupe du Monde", "3, rue de CHEPAKOI, 93200 Saint-Denis", "0202020202", 10000, "1998-07-12"),
(22, "IRIS", "6-8 Impasse des 2 Cousins, 75017 Paris", "0144018670", 500, "1998-09-03");

Create table inscrits_conservatoires (
	id_ins int(11) not null auto_increment,
	nom varchar(50),
	prenom varchar(50),
	email varchar(255) UNIQUE,
	tel varchar(10) UNIQUE,
	adresse varchar(255) UNIQUE,
	conservatoire varchar(255),
	date_heure_inscription datetime,
	primary key (id_ins)
) ENGINE=InnoDB;

Create table habitants (
    idhab int(11) not null auto_increment,
    nomhab varchar(50),
    prenomhab varchar(50),
    sexehab varchar(20),
    datenaisshab date,
    adressehab varchar(255),
    professionhab varchar(50),
    primary key (idhab)
) ENGINE=InnoDB;

Insert into habitants values
(1, "NAVAS", "Keylor", "Homme", "1986-12-15", "San Isidro de El General", "Footballeur"),
(2, "RICO", "Sergio", "Homme", "1993-09-01", "Seville", "Footballeur"),
(3, "LETELLIER", "Alexandre", "Homme", "1990-12-11", "Paris", "Footballeur"),
(4, "KIMPEMBE", "Presnel", "Homme", "1995-08-13", "Beaumont-sur-Oise", "Footballeur"),
(5, "KEHRER", "Thilo", "Homme", "1996-09-21", "Tübingen", "Footballeur"),
(6, "", "Marquinhos", "Homme", "1994-05-14", "São Paulo", "Footballeur"),
(7, "BERNAT", "Juan", "Homme", "1993-03-01", "Cullera", "Footballeur"),
(8, "KURZAWA", "Layvin", "Homme", "1992-09-04", "Fréjus", "Footballeur"),
(9, "DIALLO", "Abdou", "Homme", "1996-05-04", "Tours", "Footballeur"),
(10, "FLORENZI", "Alessandro", "Homme", "1991-03-11", "Rome", "Footballeur"),
(11, "BAKKER", "Mitchel", "Homme", "2000-06-20", "Purmerend", "Footballeur"),
(12, "DAGBA", "Colin", "Homme", "1998-09-09", "Béthune", "Footballeur"),
(13, "VERRATI", "Marco", "Homme", "1992-11-05", "Pescara", "Footballeur"),
(14, "PAREDES", "Leandro", "Homme", "1994-06-29", "San Justo", "Footballeur"),
(15, "DI MARIA", "Ángel", "Homme", "1988-02-14", "Rosario", "Footballeur"),
(16, "", "Rafina", "Homme", "1992-02-12", "São Paulo", "Footballeur"),
(17, "PEREIRA", "Danilo", "Homme", "1991-09-09", "Bisseau", "Footballeur"),
(18, "SARABIA", "Pablo", "Homme", "1992-05-11", "Madrid", "Footballeur"),
(19, "HERRERA", "Ander", "Homme", "1989-08-14", "Bilbao", "Footballeur"),
(20, "DRAXLER", "Julian", "Homme", "1993-09-20", "Gladbeck", "Footballeur"),
(21, "GUEYE", "Idrissa", "Homme", "1989-09-26", "Dakar", "Footballeur"),
(22, "MBAPPÉ", "Kylian", "Homme", "1998-12-20", "Bondy", "Footballeur"),
(23, "ICARDI", "Mauro", "Homme", "1993-02-19", "Rosario", "Footballeur"),
(24, "JR", "Neymar", "Homme", "1992-02-05", "Mogi Das Cruzes", "Footballeur"),
(25, "KEAN", "Moise", "Homme", "2000-02-28", "Vercelli", "Footballeur"),
(26, "BOULLEAU", "Laure", "Femme", "1986-10-22", "Parc des Princes", "Footballeuse"),
(27, "KARDASHIAN", "Kim", "Femme", "1980-10-21", "Los Angeles", "Femme d'affaire"),
(28, "JENNER", "Kylie", "Femme", "1997-08-10", "Los Angeles", "Personnalité"),
(29, "", "Beyonce", "Femme", "1981-09-04", "Houston", "Chanteuse"),
(30, "LOPEZ", "Jennifer", "Femme", "1969-07-24", "New York", "Actrice"),
(31, "JOHANSSON", "Scarlett", "Femme", "1984-11-22", "Manhattan", "Actrice"),
(32, "POL", "Alice", "Femme", "1982-12-03", "Saint-Pierre", "Actrice"),
(33, "", "Louane", "Femme", "1996-11-26", "Hénin-Beaumont", "Chanteuse"),
(34, "LE PEN", "Marine", "Femme", "1968-08-05", "Neuilly-sur-Seine", "Polititienne");

Create table associations (
    idassoc int(11) not null auto_increment,
    nomassoc varchar(50),
    siegeassoc varchar(50),
    datecreationassoc date,
	inscrits int(25),
    primary key (idassoc)
) ENGINE=InnoDB;

Insert into associations values
(1, "Parent d'eleves", "1290 avenue Maurice Ravel", "2020-10-22", 151),
(2, "Jeunes talents", "10 rue de Scheider", "2020-09-10", 69);

Create table inscrits_associations (
	id_ins int(11) not null auto_increment,
	nom varchar(50),
	prenom varchar(50),
	email varchar(255) UNIQUE,
	association varchar(255),
	date_heure_inscription datetime,
	primary key (id_ins)
) ENGINE=InnoDB;

Create table ecoles (
    idec int(11) not null auto_increment,
    nomec varchar(50),
    adresseec varchar(50),
	eleves int(25),
    primary key (idec)
) ENGINE=InnoDB;

Insert into ecoles values
(1, "Maurice Ravel", "10 rue de RAVEL", 500),
(2, "Georges Sand", "12 rue de Bercy", 852);

Create table inscrits_ecoles (
	id_ins int(11) not null auto_increment,
	nom varchar(50),
	prenom varchar(50),
	email varchar(255) UNIQUE,
	ecole varchar(255),
	date_heure_inscription datetime,
	primary key (id_ins)
) ENGINE=InnoDB;

Create table enfants (
    idenf int(11) not null auto_increment,
    nomenf varchar(50),
    prenomenf varchar(50),
    datenaissenf date,
    sexenf varchar(20),
    classedage varchar(50),
    tuteur varchar(50),
    primary key (idenf)
) ENGINE=InnoDB;

Insert into enfants values
(1, "SALL", "Coralie", "2015-02-09", "Fille", "De 2 a 3 ans", "M. JUAN"),
(2, "MANE", "Sadio", "2016-07-10", "Garcon", "De 5 a 7 ans", "M. JOHN");

Create table deces (
    idd int(11) not null auto_increment,
    dated date,
    motifd varchar(50),
    idhab int,
    primary key (idd),
    foreign key (idhab) references habitants (idhab)
	on delete cascade
) ENGINE=InnoDB;

Insert into deces values
(1, "2018-07-28", "COVID-19", 1),
(2, "2019-05-15", "Ashme", 2);

Create view viewDeces as (
    SELECT h.idhab, h.nomhab, h.prenomhab, d.idd, d.dated, d.motifd
    FROM deces d, habitants h
    WHERE d.idhab = h.idhab
);

Create table marier (
    idhab1 int,
    idhab2 int,
    datem date,
    heurem time,
    datediv varchar(10),
    primary key (idhab1, idhab2),
    foreign key (idhab1) references habitants (idhab)
	on delete cascade,
    foreign key (idhab2) references habitants (idhab)
	on delete cascade
) ENGINE=InnoDB;

Insert into marier values
(1, 2, "2018-08-18", "15:50:10", "2019-10-04"),
(3, 4, "2019-01-17", "16:30:20", "2020-12-31");

Create view viewMariage as (
    SELECT hab1.idhab AS idhab1, hab1.nomhab AS nomhab1, hab1.prenomhab AS prenomhab1, hab2.idhab AS idhab2, hab2.nomhab AS nomhab2, hab2.prenomhab AS prenomhab2, ma.datem, ma.heurem, ma.datediv
    FROM habitants hab1, habitants hab2, marier ma
    WHERE hab1.idhab = ma.idhab1 AND hab2.idhab = ma.idhab2
);

Create table utilisateurs (
    id int(11) not null auto_increment,
    nom varchar(50),
    prenom varchar(50),
    pseudo varchar(25) UNIQUE,
    email varchar(255) UNIQUE,
    motdepasse varchar(255),
    date_inscription date,
    heure_inscription time,
    numero_confirmation varchar(255),
    confirme int not null default 0,
    lvl int not null default 1,
    primary key (id)
) ENGINE=InnoDB;

Insert into utilisateurs values
(1, "BRUAIRE", "Tom", "tombruaire", "tom@gmail.com", "107d348bff437c999a9ff192adcb78cb03b8ddc6", "2021-01-04", "10:30:00", null, 0, 1),
(2, "NASALAN", "Giscard", "giscardnasalan", "giscard@gmail.com", "107d348bff437c999a9ff192adcb78cb03b8ddc6", "2021-01-05", "11:58:52", null, 0, 1),
(3, "PHAM", "Son Tung", "phamsontung", "sontung@gmail.com", "107d348bff437c999a9ff192adcb78cb03b8ddc6", "2021-01-10", "19:25:32", null, 0, 1);

Create table recuperation (
	idrecup int(11) not null auto_increment,
	email varchar(255),
	code int(11),
	confirme int not null default 0,
	primary key (idrecup)
) ENGINE=InnoDB;

Create table commentaires (
	idcom int(11) not null auto_increment,
  	contenu varchar(255),
  	posted_date date,
    	posted_time time,
    	user_id int(11),
  	primary key (idcom)
) ENGINE=InnoDB;

Insert into commentaires values
(1, "J'adore cette ville !", "2021-01-20", "12:46:21", 1),
(2, "Il fait beau à Villiers sur Marne !", "2021-01-06", "16:44:21", 2),
(3, "Cette ville est magnifique !", "2021-01-15", "21:45:21", 3);

-- Deuxième partie de la base dans https://github.com/tombruaire/PPE-ADMIN
