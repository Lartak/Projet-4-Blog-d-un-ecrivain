-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 04 juil. 2018 à 13:03
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `alaska`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `login`, `password`) VALUES
(1, 'Forteroche', '8663865b11ab78b40cc824d0ccf7d99518e41c5e');

-- --------------------------------------------------------

--
-- Structure de la table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `content` text CHARACTER SET latin1,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Chapitre 1 - New York', '<p>New York ! D\'abord j\'ai &eacute;t&eacute; confondu par ta beaut&eacute;, ces grandes filles d\'or aux jambes longues.<br /> Si timide d\'abord devant tes yeux de m&eacute;tal bleu, ton sourire de givre<br /> Si timide. Et l\'angoisse au fond des rues &agrave; gratte-ciel<br /> Levant des yeux de chouette parmi l\'&eacute;clipse du soleil.<br /> Sulfureuse ta lumi&egrave;re et les f&ucirc;ts livides, dont les t&ecirc;tes foudroient le ciel<br /> Les gratte-ciel qui d&eacute;fient les cyclones sur leurs muscles d\'acier et leur peau patin&eacute;e de pierres.<br /> Mais quinze jours sur les trottoirs chauves de Manhattan<br /> &ndash; C\'est au bout de la troisi&egrave;me semaine que vous saisit la fi&egrave;vre en un bond de jaguar<br /> Quinze jours sans un puits ni p&acirc;turage, tous les oiseaux de l\'air<br /> Tombant soudain et morts sous les hautes cendres des terrasses.<br /> Pas un rire d\'enfant en fleur, sa main dans ma main fra&icirc;che<br /> Pas un sein maternel, des jambes de nylon. Des jambes et des seins sans sueur ni odeur.<br /> Pas un mot tendre en l\'absence de l&egrave;vres, rien que des c&oelig;urs artificiels pay&eacute;s en monnaie forte<br /> Et pas un livre o&ugrave; lire la sagesse. La palette du peintre fleurit des cristaux de corail.<br /> Nuits d\'insomnie &ocirc; nuits de Manhattan ! si agit&eacute;es de feux follets, tandis que les klaxons hurlent des heures vides<br /> Et que les eaux obscures charrient des amours hygi&eacute;niques, tels des fleuves en crue des cadavres d\'enfants.<br /> <br /> [...]<br /> <br /> Extrait de A New York - L&eacute;opold S&eacute;dar Senghor</p>', '2018-04-20 15:24:14'),
(2, 'Chapitre 2 - La panne', '«Vous vous êtes mis à écrire parce que vous deviez écrire un livre et non pas pour donner du sens à votre vie? Faire pour faire n\'a jamais eu de sens: il n\'y avait donc rien d\'étonnant à ce que vous ayez été incapable d\'écrire la moindre ligne. Le don de l\'écriture est un don non pas parce que vous écrivez correctement, mais parce que vous pouvez donner du sens à votre vie. (...) Les écrivains vivent plus intensément que les autres, je crois. N\'écrivez pas au nom de notre amitié, Marcus. Ecrivez parce que c\'est le seul moyen pour vous de faire de cette minuscule chose insignifiante qu\'on appelle vie une expérience valable et gratifiante.»\r\n\r\nLa Vérité sur l\'Affaire Harry Quebert\r\nJoël Dicker', '2018-04-22 14:18:05'),
(4, 'Chapitre 4 - Un jour de pluie', 'Cum autem commodis intervallata temporibus convivia longa et noxia coeperint apparari vel distributio sollemnium sportularum, anxia deliberatione tractatur an exceptis his quibus vicissitudo debetur, peregrinum invitari conveniet, et si digesto plene consilio id placuerit fieri, is adhibetur qui pro domibus excubat aurigarum aut artem tesserariam profitetur aut secretiora quaedam se nosse confingit.<br />Emensis itaque difficultatibus multis et nive obrutis callibus plurimis ubi prope Rauracum ventum est ad supercilia fluminis Rheni, resistente multitudine Alamanna pontem suspendere navium conpage Romani vi nimia vetabantur ritu grandinis undique convolantibus telis, et cum id inpossibile videretur, imperator cogitationibus magnis attonitus, quid capesseret ambigebat.<br />Excitavit hic ardor milites per municipia plurima, quae isdem conterminant, dispositos et castella, sed quisque serpentes latius pro viribus repellere moliens, nunc globis confertos, aliquotiens et dispersos multitudine superabatur ingenti, quae nata et educata inter editos recurvosque ambitus montium eos ut loca plana persultat et mollia, missilibus obvios eminus lacessens et ululatu truci perterrens.<br />Quam quidem partem accusationis admiratus sum et moleste tuli potissimum esse Atratino datam. Neque enim decebat neque aetas illa postulabat neque, id quod animadvertere poteratis, pudor patiebatur optimi adulescentis in tali illum oratione versari. Vellem aliquis ex vobis robustioribus hunc male dicendi locum suscepisset; aliquanto liberius et fortius et magis more nostro refutaremus istam male dicendi licentiam. Tecum, Atratine, agam lenius, quod et pudor tuus moderatur orationi meae et meum erga te parentemque tuum beneficium tueri debeo.<br />Eminuit autem inter humilia supergressa iam impotentia fines mediocrium delictorum nefanda Clematii cuiusdam Alexandrini nobilis mors repentina; cuius socrus cum misceri sibi generum, flagrans eius amore, non impetraret, ut ferebatur, per palatii pseudothyrum introducta, oblato pretioso reginae monili id adsecuta est, ut ad Honoratum tum comitem orientis formula missa letali omnino scelere nullo contactus idem Clematius nec hiscere nec loqui permissus occideretur.<br />Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim, quod tibi ita videri necesse est, non satis politus iis artibus, quas qui tenent, eruditi appellantur aut ne deterruisset alios a studiis. quamquam te quidem video minime esse deterritum.<br />Cyprum itidem insulam procul a continenti discretam et portuosam inter municipia crebra urbes duae faciunt claram Salamis et Paphus, altera Iovis delubris altera Veneris templo insignis. tanta autem tamque multiplici fertilitate abundat rerum omnium eadem Cyprus ut nullius externi indigens adminiculi indigenis viribus a fundamento ipso carinae ad supremos usque carbasos aedificet onerariam navem omnibusque armamentis instructam mari committat.<br />Eodem tempore etiam Hymetii praeclarae indolis viri negotium est actitatum, cuius hunc novimus esse textum. cum Africam pro consule regeret Carthaginiensibus victus inopia iam lassatis, ex horreis Romano populo destinatis frumentum dedit, pauloque postea cum provenisset segetum copia, integre sine ulla restituit mora.<br />Circa hos dies Lollianus primae lanuginis adulescens, Lampadi filius ex praefecto, exploratius causam Maximino spectante, convictus codicem noxiarum artium nondum per aetatem firmato consilio descripsisse, exulque mittendus, ut sperabatur, patris inpulsu provocavit ad principem, et iussus ad eius comitatum duci, de fumo, ut aiunt, in flammam traditus Phalangio Baeticae consulari cecidit funesti carnificis manu.<br />Quapropter a natura mihi videtur potius quam ab indigentia orta amicitia, applicatione magis animi cum quodam sensu amandi quam cogitatione quantum illa res utilitatis esset habitura. Quod quidem quale sit, etiam in bestiis quibusdam animadverti potest, quae ex se natos ita amant ad quoddam tempus et ab eis ita amantur ut facile earum sensus appareat. Quod in homine multo est evidentius, primum ex ea caritate quae est inter natos et parentes, quae dirimi nisi detestabili scelere non potest; deinde cum similis sensus exstitit amoris, si aliquem nacti sumus cuius cum moribus et natura congruamus, quod in eo quasi lumen aliquod probitatis et virtutis perspicere videamur.', '2018-06-07 17:40:42'),
(5, 'Chapitre 5 - Un autre jour :))', 'Cognitis enim pilatorum caesorumque funeribus nemo deinde ad has stationes appulit navem, sed ut Scironis praerupta letalia declinantes litoribus Cypriis contigui navigabant, quae Isauriae scopulis sunt controversa.<br />His cognitis Gallus ut serpens adpetitus telo vel saxo iamque spes extremas opperiens et succurrens saluti suae quavis ratione colligi omnes iussit armatos et cum starent attoniti, districta dentium acie stridens adeste inquit viri fortes mihi periclitanti vobiscum.<br />Latius iam disseminata licentia onerosus bonis omnibus Caesar nullum post haec adhibens modum orientis latera cuncta vexabat nec honoratis parcens nec urbium primatibus nec plebeiis.<br />Huic Arabia est conserta, ex alio latere Nabataeis contigua; opima varietate conmerciorum castrisque oppleta validis et castellis, quae ad repellendos gentium vicinarum excursus sollicitudo pervigil veterum per oportunos saltus erexit et cautos. haec quoque civitates habet inter oppida quaedam ingentes Bostram et Gerasam atque Philadelphiam murorum firmitate cautissimas. hanc provinciae inposito nomine rectoreque adtributo obtemperare legibus nostris Traianus conpulit imperator incolarum tumore saepe contunso cum glorioso marte Mediam urgeret et Parthos.<br />Quam quidem partem accusationis admiratus sum et moleste tuli potissimum esse Atratino datam. Neque enim decebat neque aetas illa postulabat neque, id quod animadvertere poteratis, pudor patiebatur optimi adulescentis in tali illum oratione versari. Vellem aliquis ex vobis robustioribus hunc male dicendi locum suscepisset; aliquanto liberius et fortius et magis more nostro refutaremus istam male dicendi licentiam. Tecum, Atratine, agam lenius, quod et pudor tuus moderatur orationi meae et meum erga te parentemque tuum beneficium tueri debeo.<br />Iam virtutem ex consuetudine vitae sermonisque nostri interpretemur nec eam, ut quidam docti, verborum magnificentia metiamur virosque bonos eos, qui habentur, numeremus, Paulos, Catones, Galos, Scipiones, Philos; his communis vita contenta est; eos autem omittamus, qui omnino nusquam reperiuntur.<br />Quam quidem partem accusationis admiratus sum et moleste tuli potissimum esse Atratino datam. Neque enim decebat neque aetas illa postulabat neque, id quod animadvertere poteratis, pudor patiebatur optimi adulescentis in tali illum oratione versari. Vellem aliquis ex vobis robustioribus hunc male dicendi locum suscepisset; aliquanto liberius et fortius et magis more nostro refutaremus istam male dicendi licentiam. Tecum, Atratine, agam lenius, quod et pudor tuus moderatur orationi meae et meum erga te parentemque tuum beneficium tueri debeo.<br />Quid? qui se etiam nunc subsidiis patrimonii aut amicorum liberalitate sustentant, hos perire patiemur? An, si qui frui publico non potuit per hostem, hic tegitur ipsa lege censoria; quem is frui non sinit, qui est, etiamsi non appellatur, hostis, huic ferri auxilium non oportet? Retinete igitur in provincia diutius eum, qui de sociis cum hostibus, de civibus cum sociis faciat pactiones, qui hoc etiam se pluris esse quam collegam putet, quod ille vos tristia voltuque deceperit, ipse numquam se minus quam erat, nequam esse simularit. Piso autem alio quodam modo gloriatur se brevi tempore perfecisse, ne Gabinius unus omnium nequissimus existimaretur.<br />Intellectum est enim mihi quidem in multis, et maxime in me ipso, sed paulo ante in omnibus, cum M. Marcellum senatui reique publicae concessisti, commemoratis praesertim offensionibus, te auctoritatem huius ordinis dignitatemque rei publicae tuis vel doloribus vel suspicionibus anteferre. Ille quidem fructum omnis ante actae vitae hodierno die maximum cepit, cum summo consensu senatus, tum iudicio tuo gravissimo et maximo. Ex quo profecto intellegis quanta in dato beneficio sit laus, cum in accepto sit tanta gloria.<br />Quanta autem vis amicitiae sit, ex hoc intellegi maxime potest, quod ex infinita societate generis humani, quam conciliavit ipsa natura, ita contracta res est et adducta in angustum ut omnis caritas aut inter duos aut inter paucos iungeretur.<br />Post emensos insuperabilis expeditionis eventus languentibus partium animis, quas periculorum varietas fregerat et laborum, nondum tubarum cessante clangore vel milite locato per stationes hibernas, fortunae saevientis procellae tempestates alias rebus infudere communibus per multa illa et dira facinora Caesaris Galli, qui ex squalore imo miseriarum in aetatis adultae primitiis ad principale culmen insperato saltu provectus ultra terminos potestatis delatae procurrens asperitate nimia cuncta foedabat. propinquitate enim regiae stirpis gentilitateque etiam tum Constantini nominis efferebatur in fastus, si plus valuisset, ausurus hostilia in auctorem suae felicitatis, ut videbatur.<br />Sed fruatur sane hoc solacio atque hanc insignem ignominiam, quoniam uni praeter se inusta sit, putet esse leviorem, dum modo, cuius exemplo se consolatur, eius exitum expectet, praesertim cum in Albucio nec Pisonis libidines nec audacia Gabini fuerit ac tamen hac una plaga conciderit, ignominia senatus.<br />Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.<br />Hac ex causa conlaticia stipe Valerius humatur ille Publicola et subsidiis amicorum mariti inops cum liberis uxor alitur Reguli et dotatur ex aerario filia Scipionis, cum nobilitas florem adultae virginis diuturnum absentia pauperis erubesceret patris.<br />Exsistit autem hoc loco quaedam quaestio subdifficilis, num quando amici novi, digni amicitia, veteribus sint anteponendi, ut equis vetulis teneros anteponere solemus. Indigna homine dubitatio! Non enim debent esse amicitiarum sicut aliarum rerum satietates; veterrima quaeque, ut ea vina, quae vetustatem ferunt, esse debet suavissima; verumque illud est, quod dicitur, multos modios salis simul edendos esse, ut amicitiae munus expletum sit.<br />Adolescebat autem obstinatum propositum erga haec et similia multa scrutanda, stimulos admovente regina, quae abrupte mariti fortunas trudebat in exitium praeceps, cum eum potius lenitate feminea ad veritatis humanitatisque viam reducere utilia suadendo deberet, ut in Gordianorum actibus factitasse Maximini truculenti illius imperatoris rettulimus coniugem.<br />Ego vero sic intellego, Patres conscripti, nos hoc tempore in provinciis decernendis perpetuae pacis habere oportere rationem. Nam quis hoc non sentit omnia alia esse nobis vacua ab omni periculo atque etiam suspicione belli?<br />Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Verum ad istam omnem orationem brevis est defensio. Nam quoad aetas M. Caeli dare potuit isti suspicioni locum, fuit primum ipsius pudore, deinde etiam patris diligentia disciplinaque munita. Qui ut huic virilem togam dedit&scaron;nihil dicam hoc loco de me; tantum sit, quantum vos existimatis; hoc dicam, hunc a patre continuo ad me esse deductum; nemo hunc M. Caelium in illo aetatis flore vidit nisi aut cum patre aut mecum aut in M. Crassi castissima domo, cum artibus honestissimis erudiretur.<br />In his tractibus navigerum nusquam visitur flumen sed in locis plurimis aquae suapte natura calentes emergunt ad usus aptae multiplicium medelarum. verum has quoque regiones pari sorte Pompeius Iudaeis domitis et Hierosolymis captis in provinciae speciem delata iuris dictione formavit.', '2018-06-11 11:56:37'),
(7, 'Chapitre 6 - Et le soleil revient', '<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><img src=\"https://jack35.files.wordpress.com/2013/04/alaska-3.jpg\" alt=\"\" width=\"800\" height=\"549\" /></p>\r\n<p>Comme la nuit approchait, je redescendis en courant le long des pentes fleuries, revigor&eacute;. Le soleil couchant embrasait les nuages. On aurait dit que le monde entier venait de na&icirc;tre une seconde fois. Chaque chose, m&ecirc;me la plus banale, paraissait &eacute;clair&eacute;e d\'un lumi&egrave;re nouvelle. Chaque plante, de la plus petite fleur aux plus grands arbres, semblait m&ecirc;ler sa joie &agrave; la mienne, tandis que chaque d&eacute;tail de la montagne, chacun de ses rochers, &eacute;pousaient mon all&eacute;gresse, comme s\'ils avaient su lire sur mon visage. [....]</p>\r\n<p>Extrait de \"Voyages en Alaska\" de John Muir</p>', '2018-06-23 19:11:19'),
(8, 'Chapitre 3 - Les enfants du Froid- Jack London ', '<p>De son aventure au Klondike &agrave; l\'&eacute;poque de la ru&eacute;e vers l\'or, London rapportera quelques grammes de m&eacute;tal jaune et le scorbut. Mais aussi, mais surtout une brass&eacute;e d\'histoires violentes qui immortaliseront ce coin d&eacute;sh&eacute;rit&eacute; du monde...bient&ocirc;t abandonn&eacute; &agrave; sa solitude de toujours.<br /> <br /> Dans \"les enfants du froid\" (1902), l\'&eacute;crivain d&eacute;cide de raconter cette chronique de l\'humaine folie \"du point de vue indien, comme &agrave; travers les yeux des indiens\". Lui-m&ecirc;me dira un jour de l\'un des textes ici rassembl&eacute;s (\"la ligue des vieux\") : \"c\'est la meilleure nouvelle que j\'aie jamais &eacute;crite\". L\'une des plus terribles assur&eacute;ment.</p>', '2018-07-03 13:04:20');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_id` int(11) NOT NULL,
  `author` varchar(255) CHARACTER SET latin1 NOT NULL,
  `comment` text CHARACTER SET latin1 NOT NULL,
  `comment_date` datetime NOT NULL,
  `signal_comment` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `chapter_id`, `author`, `comment`, `comment_date`, `signal_comment`) VALUES
(1, 1, 'Juliet', '\r\nLe début de l\'intrigue.... Envie d\'aller de faire un voyage à New York. J\'ai hâte de lire la suite! ', '2018-05-24 07:12:21', NULL),
(2, 2, 'Juliet', ':(', '2018-05-24 14:18:34', 1),
(4, 1, 'Roméo', 'Une superbe description de New York!', '2018-05-09 17:04:55', 1),
(5, 1, 'Paulo', 'Superbe! Continuez!\r\n', '2018-05-10 17:30:52', NULL),
(6, 2, 'L\'auteur', 'Merci! :)', '2018-05-14 18:28:05', NULL),
(7, 2, 'Romeo', 'Un beau texte!\r\n', '2018-05-20 13:05:25', 1),
(8, 1, 'L\'auteur', 'Merci!', '2018-05-20 18:56:33', NULL),
(9, 1, 'L\'auteur', 'Encore merci :)', '2018-05-20 19:13:43', NULL),
(10, 1, 'Foued', 'La ville qui ne dort jamais??', '2018-05-20 19:41:29', 1),
(11, 2, 'Marc', 'Je suis d\'accord avec Romeo, un beau texte sur la page blanche ;)', '2018-05-21 10:17:07', 1),
(15, 1, 'Jean-Pierre', 'Super! Bravo!', '2018-05-23 17:12:10', 1),
(16, 1, 'Schmolette', 'Vous savez déjà combien il y aura de chapitres???', '2018-06-07 11:17:38', 1),
(17, 1, 'L\'auteur', 'Non pas encore....\r\nMais je connais déjà la fin ;)', '2018-06-14 15:09:11', 1),
(19, 1, 'Louise', 'Une ville frénétique! ', '2018-06-23 11:00:42', NULL),
(20, 1, 'Moi', 'Bofffffffff!!!!!!', '2018-06-23 18:59:02', 1),
(21, 7, 'Nin', 'J\'espère qu\'il va revenir!!!! ;)', '2018-07-02 19:14:23', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
