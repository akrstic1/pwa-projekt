-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2020 at 10:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwa-projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(3, 'Arno', 'Krstić', 'admin', '$2y$10$YdaCUFK9xT12.4km3ur8remOo.IKPqSklD1IhAHk70RZNqZPTB0Ki', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `naslov` varchar(64) COLLATE utf8_croatian_ci NOT NULL,
  `datum` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `sazetak` mediumtext COLLATE utf8_croatian_ci NOT NULL,
  `tekst` mediumtext COLLATE utf8_croatian_ci NOT NULL,
  `slika` varchar(64) COLLATE utf8_croatian_ci NOT NULL,
  `kategorija` varchar(64) COLLATE utf8_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `naslov`, `datum`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(28, 'POGOĐEN JE EUROJACKPOT!', '29/05/2020 22:19', 'Sretnik iz Italije osvojio više od 250 milijuna kn', 'U 22 . kolu Eurojackpota izvučeni su brojevi 8. 22. 31. 32. 36 – 6. 10. , koji su donijeli dobitak od 252.483.719,44kn igraču iz Italije.\r\n\r\nVečeras je pogođeno 3 dobitka druge vrste, odnosno 5+1 broj, vrijednih po 5.320.086,14kn i 4 dobitka treće vrste 5+0, vrijednih po 1.408.257,83kn.\r\n\r\nNajveći dobitak osvojen u Hrvatskoj je 4+1 u iznosu od 2.587,74, a osvojeno je 5 dobitaka.\r\n\r\nSljedeće izvlačenje za igru Eurojackpot je u petak, 5.lipnja 2020., a glavni dobitak Eurojackpota iznosi 75.000.000,00 kuna.', 'upload_img/Eurojackpot kuglice.jpg', 'svijet', 0),
(29, 'Talijanski BDP pred kolapsom!', '29/05/2020 22:21', 'Talijanskom gospodarstvu prijeti pad BDP-a od 13 posto.', '- Prema osnovnom scenariju, pad gospodarstva ove bi godine iznosio devet posto - izjavio je guverner Ignazio Visco.\r\n\r\n- Drugi scenarij, koji se temelji na pesimističnijim, iako ne na ekstremnim pretpostavkama, predviđa pad BDP-a u ovoj godini za 13 posto i znatno sporiji oporavak u 2021. godini - upozorio je.\r\n\r\nNjegovo upozorenje vremenski se poklopilo s Istatovom izmjenom procjene rasta u prvom tromjesečju.\r\n\r\nTalijanski BDP pao je u prva tri ovogodišnja mjeseca za 5,3 posto na kvartalnoj razini, prema sezonski i kalendarski prilagođenim podacima statističkog ureda. Prva procjena pokazivala je pad od 4,7 posto.\r\n\r\nPola talijanske recesije posljedica je mjera karantene, a druga polovina pada svjetske trgovine i oštrog pada turizma, rekao je guverner.\r\n\r\nPo njegovim procjenama, talijanski manjak u proračunu skočit će ove godine na 10,4 posto BDP-a, s prošlogodišnjih 1,6 posto. Javni dug iskazan udjelom u BDP-u porast će za 21 postotni bod, na 156 posto BDP-a.\r\n\r\n- Jedno je sigurno - nakon pandemije razina javnog i duga privatnog sektora bit će puno veća, a nejednakost izraženija, i to ne samo na području ekonomije - poručio je guverner talijanske središnje banke.', 'upload_img/Ignazio Visco.jpg', 'svijet', 0),
(30, 'KAMO IDE SLOVENIJA NA ČELU S JANEZOM JANŠOM?', '29/05/2020 22:24', 'Novinarku naziva ku**m koja naplaćuje 35 eura i predvodi desnicu', 'Treći mandat Janeza Janše bi mogao biti turbulentniji nego prethodni. Zemlja se sve više polarizira, a u vanjskoj politici su veze s Orbanovom Mađarskom sve jače.\r\n\r\n\"Uskoro ćemo biti najbolji u korona borbi\", poručila je preko Twittera novinarka Eugenija Carl. I nastavila u istom, sarkastičnom tonu: \"99,9 posto stanovnika podržava vladu. Postajemo druga Švicarska, bez korupcije, bez nezaposlenosti\". Povod ovom Tweetu nisu velika očekivanja od nove slovenske vlade nego činjenica da Janšina vlada kadrovskim promjenama u Državnom statističkom zavodu sebi očito želi stvoriti izglede za, ne samo jednu novu i lijepu Sloveniju nego i nove, lijepe statistike.', 'upload_img/Janez Janša.jpg', 'svijet', 0),
(31, 'TVRDI DA NIJE JEO I PIO 80 GODINA, A UMRO JE OD STAROSTI', '29/05/2020 22:25', 'Preminuo Indijac koji je bio predmet i medicinskih istraživanja', 'Indijski jogi koji je tvrdio da 80 godina nije ni jeo ni pio, a bio je predmet medicinskih istraživanja kao i sumnji, umro je u dobi od 90 godina, objavio je njegov susjed, a prenose mediji.\r\n\r\nPrahlad Jani, asket s dugom bradom i prstenom u nosu po uzoru na hindusku božicu, rodio se u seocetu Charada u saveznoj državi Gujarat (zapad Indije) i za života je tvrdio da je prestao piti vodu i jesti u dobi od 11 godina.\r\n\r\n\"Umro je u utorak ujutro od starosti u svome domu\", rekao je za agenciju AFP njegov susjed Sheetal Chaudhary.\r\n\r\n\"Bio je odveden u bolnicu iza ponoći no dežurni liječnik proglasio ga je mrtvim\", rekao je susjed.\r\n\r\nJani je tvrdio da ga je u djetinjstvu blagoslovila božica i dodijelila mu posebne moći.\r\n\r\n\"Primam eliksir života preko rupice u mom nepcu što mi omogućuje da živim bez hrane i vode\", ustvrdio je za agenciju France presse još 2003. godine.\r\n\r\nNemoguće je provjeriti je li jogi uzimao hranu i vodu tijekom tih desetljeća.\r\n\r\nZa liječnike je nemoguće da ljudsko tijelo tako dugo posti.\r\n\r\nSvojim asketizmom uspio je osnovati malenu zajednicu vjernika, a privukao je i pozornost znanstvenika.  Indijske medicinske ekipe promatrale su ga u dva navrata 2003. te 2010. godine.\r\n\r\nTijekom provedbe druge studije bio je neprestance nadziran kamerama koje su pokazale da je bez hrane i pića izdržao dva tjedna i u tom razdoblju nije niti mokrio niti vršio veliku nuždu što je zapanjilo liječnike koji su ga promatrali.\r\n\r\n\"Taj fenomen ostaje tajnom\", rekao je tom prigodom neurolog u ekipi liječnika koja ga je promatrala.\r\n\r\nPoznati hrvatski alternativac Drago Plečko rekao je te 2010. godine za hrvatske novine da jogi može zadržavati tekućinu unutar tijela koja se u određenom smislu reciklira, i to mjesecima za vrijeme tzv. stanja samadhija, odnosno potpune koncentracije.', 'upload_img/000_HKG2003112432567.jpg', 'svijet', 0),
(32, 'Rekordan pad potrošnje u travnju', '29/05/2020 22:28', 'Oštro pala i industrijska proizvodnja', 'U Hrvatskoj je u travnju potrošnja u maloprodaji potonula rekordnih 25,5 posto u odnosu na isti lanjski mjesec, a velik pad zabilježila je i industrijska proizvodnja, što najavljuje oštar pad hrvatskog gospodarstva u drugom tromjesečju.\r\nDržavni zavod za statistiku (DZS) objavio je u petak izvješće o prometu u trgovini na malo, a prema kalendarski prilagođenim podacima, potrošnja je u travnju pala 19,8 posto u odnosu na prethodni mjesec, dok je u odnosu na travanj prošle godine potonula 25,5 posto.\r\n\r\nTo je drugi mjesec zaredom kako je potrošnja pod utjecajem koronakrize pala, s obzirom da je u ožujku bila 7 posto manja nego u istom lanjskom mjesecu.\r\n\r\n\"Godišnja stopa pada potrošnje od 25,5 posto predstavlja najveći pad od kada pratimo podatke i jasno odražava trenutne i potencijalne posljedice pandemije koronavirusa\", ističu analitičari Raiffeisenbank Austria (RBA).\r\n\r\nPritom je promet od trgovine neprehrambenim proizvodima, osim trgovine motornim gorivima i mazivima, pao za 40,5 posto, dok je promet od trgovine na malo hranom, pićem i duhanskim proizvodima pao za 6,2 posto, pokazuju podaci DZS-a.', 'upload_img/dzs_20151106131154.jpg', 'ekonomija', 0),
(33, 'Hrvatskoj u idućih sedam godina duplo više novca iz EU', '29/05/2020 22:30', 'Premijer Andrej Plenković hvalisa članstvo EU', 'Osvrnuvši se na početku sjednice Vlade na plan pod nazivom \"EU sljedeće generacije\", koji je Europska komisija predstavila u srijedu, Plenković je kazao da je riječ o izrazito važnom dokumentu za gospodarski oporavak, koji je nastajao zadnjih nekoliko tjedana i mjeseci, i plod je intenzivnih konzultacija s EK Hrvatske i ostalih članica EU.\r\n\r\nTim dokumentom planirano je 750 milijardi eura potpore članicama za poticanje oporavka nakon pandemije Covida-19, pri čemu je za Hrvatsku predviđeno nešto više od 10 milijardi eura, od čega 7,3 milijarde bespovratna sredstva, a 2,65 milijardi kroz moguće zajmove. EK će izaći i s prijedlogom za alociranje 1.100 milijardi eura u okviru višegodišnjeg financijskog okvira.\r\n\r\nNakon pandemije promijenili su se prioriteti u radu Europske komisije, izjavio je Plenković te dodao da je važan izraz političke volje država članica da se usvoje dokumenti koji će povrh onoga što nosi idući 7-godišnji proračun (VFO) dati dodatnu financijsku mogućnost za provođenje projekata, planova i mjera za brz oporavak svih članica.', 'upload_img/plenkovic3_20161110112006.jpg', 'ekonomija', 0),
(34, 'Obujam građevinskih radova u ožujku pao za 11,7 posto', '29/05/2020 22:31', 'U odnosu na ožujak 2019. za 0,9 posto, podaci su DZS', 'Prema kalendarski prilagođenim indeksima, obujam građevinskih radova u ožujku ove u odnosu na isti lanjski mjesec pao je 0,9 posto. Pritom je obujam građevinskih radova na zgradama smanjen za 0,2 posto, a za 1,9 posto na ostalim građevinama (kao što je prometna infrastruktura, cjevovodi, komunikacijski i energetski vodovi, složene građevine na industrijskim prostorima i sl.).\r\n\r\n\"Padom obujma građevinskih radova u ovogodišnjem ožujku prekinut je trend godišnjega rasta toga pokazatelja, koji je kontinuirano trajao od ožujka 2018. godine. Taj je pad rezultat mjera u borbi protiv širenja koronavirusa, koje su bile u primjeni od 19. ožujka, a utjecale su na znatno smanjenje poslovnih aktivnosti velikoga dijela gospodarstva\", navode analitičari Hrvatske gospodarske komore u analizi najnovijih statističkih podataka.\r\n\r\nPodaci DZS-a za prva tri mjeseca ove godine pokazuju da je obujam građevinskih radova porastao za 6 posto u odnosu na prvo tromjesečje prošle godine.\r\n\r\nPritom je obujam građevinskih radova na zgradama veći za 5,6 posto, a na ostalim građevinama 6,7 posto.', 'upload_img/gradnja1_20160211144700.jpg', 'ekonomija', 0),
(35, 'Porezni prihodi u svibnju na polovini prošlogodišnjih', '29/05/2020 22:33', 'Vrijednost fiskaliziranih računa18 posto manja u odnosu na lani', 'S jučerašnjim danom, po podacima iz sustava fiskalizacije, kada se gleda samo svibanj, vrijednost fiskaliziranih računa je oko 18 posto manja u odnosu na isto lanjsko razdoblje. Postoje razlike i između djelatnosti, pa je tako ugostiteljstvo, unatoč mjerama relaksacije i otvaranja terasa, na indeksu 40 u odnosu na isto lanjsko doba, što u prijevodu znači da je vrijednost izdanih računa manja za oko 60 posto, izjavio je Marić.\r\n\r\nS druge strane, trgovina na malo, poglavito prehrambenim potrepštinama, svo vrijeme je puno bliža indeksu 100 (istoj razini kao i lani), kaže Marić, dodajući da ti podaci služe i za promišljanje te daljnje donošenje odluka.\r\n\r\nRekao je i da su s jučerašnjim danom porezni prihodi u petom mjesecu na polovini prošlogodišnjih. \"PDV je do jučerašnjeg dana bio opet u negativnom apsolutnom iznosu. Znači da su nam povrati PDV-a iz državnog proračuna prema obveznicima bili veći nego što smo uprihodovali. A doprinosi su negdje 25 posto manji\", izjavio je Marić.\r\n\r\nKao iole pozitivno kada su koronakriza i turizam u pitanju, Marić navodi činjenicu da se pandemija Covida-19 odvijala i odvija u razdoblju dok su turistički prihodi još relativno mali. \"Ali sada dolazimo u razdoblje kada idemo prema špici i onda će situacija i kod nas i u drugim zemljama imati puno efekata\", kaže Marić.', 'upload_img/kune_2_20141104114856.jpg', 'ekonomija', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
