<?php 
session_start();
$_SESSION['page'] = "Conditions générales de vente";
require_once '../COMPONENTS/navbar.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require '../COMPONENTS/links.php'; ?>
    <title>BibliotheKa | <?= $_SESSION['page'] ?></title>

    
</head>
<body>
<div class="container">

<svg class="mt-5" xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-flower1" viewBox="0 0 16 16">
=<path d="M6.174 1.184a2 2 0 0 1 3.652 0A2 2 0 0 1 12.99 3.01a2 2 0 0 1 1.826 3.164 2 2 0 0 1 0 3.652 2 2 0 0 1-1.826 3.164 2 2 0 0 1-3.164 1.826 2 2 0 0 1-3.652 0A2 2 0 0 1 3.01 12.99a2 2 0 0 1-1.826-3.164 2 2 0 0 1 0-3.652A2 2 0 0 1 3.01 3.01a2 2 0 0 1 3.164-1.826zM8 1a1 1 0 0 0-.998 1.03l.01.091c.012.077.029.176.054.296.049.241.122.542.213.887.182.688.428 1.513.676 2.314L8 5.762l.045-.144c.248-.8.494-1.626.676-2.314.091-.345.164-.646.213-.887a4.997 4.997 0 0 0 .064-.386L9 2a1 1 0 0 0-1-1zM2 9l.03-.002.091-.01a4.99 4.99 0 0 0 .296-.054c.241-.049.542-.122.887-.213a60.59 60.59 0 0 0 2.314-.676L5.762 8l-.144-.045a60.59 60.59 0 0 0-2.314-.676 16.705 16.705 0 0 0-.887-.213 4.99 4.99 0 0 0-.386-.064L2 7a1 1 0 1 0 0 2zm7 5-.002-.03a5.005 5.005 0 0 0-.064-.386 16.398 16.398 0 0 0-.213-.888 60.582 60.582 0 0 0-.676-2.314L8 10.238l-.045.144c-.248.8-.494 1.626-.676 2.314-.091.345-.164.646-.213.887a4.996 4.996 0 0 0-.064.386L7 14a1 1 0 1 0 2 0zm-5.696-2.134.025-.017a5.001 5.001 0 0 0 .303-.248c.184-.164.408-.377.661-.629A60.614 60.614 0 0 0 5.96 9.23l.103-.111-.147.033a60.88 60.88 0 0 0-2.343.572c-.344.093-.64.18-.874.258a5.063 5.063 0 0 0-.367.138l-.027.014a1 1 0 1 0 1 1.732zM4.5 14.062a1 1 0 0 0 1.366-.366l.014-.027c.01-.02.021-.048.036-.084a5.09 5.09 0 0 0 .102-.283c.078-.233.165-.53.258-.874a60.6 60.6 0 0 0 .572-2.343l.033-.147-.11.102a60.848 60.848 0 0 0-1.743 1.667 17.07 17.07 0 0 0-.629.66 5.06 5.06 0 0 0-.248.304l-.017.025a1 1 0 0 0 .366 1.366zm9.196-8.196a1 1 0 0 0-1-1.732l-.025.017a4.951 4.951 0 0 0-.303.248 16.69 16.69 0 0 0-.661.629A60.72 60.72 0 0 0 10.04 6.77l-.102.111.147-.033a60.6 60.6 0 0 0 2.342-.572c.345-.093.642-.18.875-.258a4.993 4.993 0 0 0 .367-.138.53.53 0 0 0 .027-.014zM11.5 1.938a1 1 0 0 0-1.366.366l-.014.027c-.01.02-.021.048-.036.084a5.09 5.09 0 0 0-.102.283c-.078.233-.165.53-.258.875a60.62 60.62 0 0 0-.572 2.342l-.033.147.11-.102a60.848 60.848 0 0 0 1.743-1.667c.252-.253.465-.477.629-.66a5.001 5.001 0 0 0 .248-.304l.017-.025a1 1 0 0 0-.366-1.366zM14 9a1 1 0 0 0 0-2l-.03.002a4.996 4.996 0 0 0-.386.064c-.242.049-.543.122-.888.213-.688.182-1.513.428-2.314.676L10.238 8l.144.045c.8.248 1.626.494 2.314.676.345.091.646.164.887.213a4.996 4.996 0 0 0 .386.064L14 9zM1.938 4.5a1 1 0 0 0 .393 1.38l.084.035c.072.03.166.064.283.103.233.078.53.165.874.258a60.88 60.88 0 0 0 2.343.572l.147.033-.103-.111a60.584 60.584 0 0 0-1.666-1.742 16.705 16.705 0 0 0-.66-.629 4.996 4.996 0 0 0-.304-.248l-.025-.017a1 1 0 0 0-1.366.366zm2.196-1.196.017.025a4.996 4.996 0 0 0 .248.303c.164.184.377.408.629.661A60.597 60.597 0 0 0 6.77 5.96l.111.102-.033-.147a60.602 60.602 0 0 0-.572-2.342c-.093-.345-.18-.642-.258-.875a5.006 5.006 0 0 0-.138-.367l-.014-.027a1 1 0 1 0-1.732 1zm9.928 8.196a1 1 0 0 0-.366-1.366l-.027-.014a5 5 0 0 0-.367-.138c-.233-.078-.53-.165-.875-.258a60.619 60.619 0 0 0-2.342-.572l-.147-.033.102.111a60.73 60.73 0 0 0 1.667 1.742c.253.252.477.465.66.629a4.946 4.946 0 0 0 .304.248l.025.017a1 1 0 0 0 1.366-.366zm-3.928 2.196a1 1 0 0 0 1.732-1l-.017-.025a5.065 5.065 0 0 0-.248-.303 16.705 16.705 0 0 0-.629-.661A60.462 60.462 0 0 0 9.23 10.04l-.111-.102.033.147a60.6 60.6 0 0 0 .572 2.342c.093.345.18.642.258.875a4.985 4.985 0 0 0 .138.367.575.575 0 0 0 .014.027zM8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
</svg>

<u><h2 class="mt-3">Conditions générales de vente des produits réalisés et prestations numériques du site "Bibliotheka"</h2></u>

    <h5 class="mt-5">Les présentes conditions générales d’utilisation du site Bibliotheka
, dont l’adresse est https://www.Bibliotheka.fr/  et ci-après désigné « le Site », définissent les conditions d’utilisation du Site par les internautes.
En navigant sur le Site, l’internaute du Site (ci-après désigné « l’internaute ») reconnaît avoir pris connaissance des mentions légales du Site et accepter les présentes conditions générales d’utilisation (ci-après désignées « les CGU »). Les CGU applicables sont celles qui sont accessibles en ligne sur le Site au jour de la connexion des internautes au Site.
Bibliotheka se réserve le droit de modifier à tout moment les CGU pour les adapter aux évolutions législatives et règlementaires ou aux nouvelles fonctionnalités du Site qui pourraient être proposées aux internautes, en en publiant une nouvelle version sur le Site. La date de dernière mise à jour des CGU est indiquée à la première ligne des présentes.</h5>

    <h5 class="mt-5">Article 1 : OBJET :</h5>
    <p class="mt-3">Les présentes CGU ont pour objet de déterminer et d’encadrer les modalités d’utilisation du Site Bibliotheka par les internautes.</p>

<h5 class="mt-5">DESCRIPTION DU SITE :</h5>
<p class="mt-3">Le Site permet aux internautes de consulter en ligne un ensemble d’informations relatives à Bibliotheka, à ses collections de livres mis en ligne.
    <ul>
        <li style="text-align: left;">Accéder aux différents catalogues en ligne de Bibliotheka</li>
        <li style="text-align: left;">Contacter certains services de Bibliotheka par courrier électronique</li>
        <li style="text-align: left;">Réserver des livres</li>
        <li style="text-align: left;">Acheter des livres</li>
        <li style="text-align: left;">Visualiser des livres en ligne</li>
        <li style="text-align: left;">Être redirigé vers les sites internet des partenaires ou commerciaux de Bibliotheka</li>
        <li style="text-align: left;">Contacter les administrateurs du site Bibliotheka</li>
    </ul>
</p>

<p class="mt-5">Ces services sont les suivants :
    <ul style="text-align: left;">
        <li>Un Service « Mon espace personnel » :</li>
        <p class="mt-3">Ce service permet aux internautes d’enregistrer leurs recherches favorites, de classer des notices issues du catalogue général, d’emprunter ou d’acheter des reproductions en ligne, de réserver des livres.
            Ce service est lui-même encadré par des conditions d’utilisation particulières que l’internaute doit respecter s’il souhaite en bénéficier.
        </p>
        <li>Un service « Connexion » :</li>
        <p>Ce service permet aux internautes d’emprunter ou d’acheter des livres chez Bibliotheka en ligne.
            Ce service est lui-même encadré par des conditions générales de vente que l’internaute doit respecter s’il souhaite en bénéficier.
        </p>
    </ul>
</p>

<h5 class="mt-5">3. CONDITIONS D’ACCÈS AU SITE :</h5>
<p class="mt-3">L’ utilisation du Site nécessite une connexion à Internet, de préférence à haut débit, fibre. Il est précisé que cette connexion n’est pas prise en charge par Bibliotheka. L’ internaute pourra naviguer sur le Site Bibliotheka sur un ordinateur personnel ou tout autre appareil mobile (tel que tablette, téléphone…) permettant d’accéder à internet.</p>

<h5 class="mt-5">4. ENGAGEMENTS ET RESPONSABILITÉ DE L’INTERNAUTE :</h5>
<p class="mt-3">L’internaute s’engage, lors de l’utilisation qu’il fera du Site, à ne pas contrevenir aux dispositions législatives et réglementaires en vigueur et aux présentes CGU. L’internaute est informé que toute violation desdites dispositions est susceptible d’entraîner des poursuites judiciaires et sanctions à son encontre.
L’internaute prend acte de ce que Bibliotheka se réserve, pour le cas où son utilisation du Site serait contraire aux présentes CGU et plus généralement aux lois et dispositions règlementaires en vigueur, la possibilité de procéder immédiatement et sans préavis au blocage de son accès au Site.
De manière générale, Bibliotheka ne saurait être tenue responsable en cas d’utilisation du Site par un internaute non conforme aux présentes CGU.</p>

<h5 class="mt-5">5. DONNÉES À CARACTÈRE PERSONNEL ET COOKIES :</h5>
<h5 class="mt-3">5.1 Données à caractère personnel collectées sur le Site Bibliotheka directement auprès des utilisateurs</h5>
<p class="mt-3">L’utilisation de certaines fonctionnalités du Site, et notamment la possibilité d’écrire à Bibliotheka ou de manifester en ligne s’abonner à des lettres d’information, suppose la collecte de données à caractère personnel des internautes. Ces données collectées sur le Site font l’objet d’un traitement ayant une finalité de gestion administrative, de statistiques et d’études d’usages, dont le responsable de traitement est Bibliotheka.</p>
<p class="mt-3">Conformément au règlement européen du 27 avril 2016 relatif à la protection des personnes physiques à l’égard du traitement des données à caractère personnel et à la libre circulation de ces données, chaque utilisateur dispose d’un droit d’accès et de rectification aux informations qui le concernent. Il dispose également d’un droit d’opposition, pour des motifs légitimes, au traitement des données le concernant. Ce droit peut être exercé sans motif légitime lorsqu’il s’agit de prospection commerciale.
L’utilisateur peut dès lors exiger que les données le concernant détenues par Bibliotheka lui soient communiquées et soient rectifiées, complétées, clarifiées, mises à jour ou effacées.

Ces droits peuvent être exercés en contactant le délégué à la protection des données de Bibliotheka à l’adresse suivante : accueilBibliotheka@gmail.com.
Bibliotheka s’engage à mettre en œuvre et à faire appliquer les mesures de sécurité qu’elle juge nécessaires en vue d’assurer la confidentialité des données collectées sur le Site pendant la durée nécessaire à leur traitement, conformément au règlement européen précité.</p>

<h5 class="mt-5">5.2 Données collectées de manière indirecte auprès des utilisateurs du Site (« Cookies »)</h5>
<p class="mt-3">Un cookie est une information déposée sur le disque dur de l’ordinateur, du mobile ou de la tablette de l’utilisateur par le serveur du site visité ou par un serveur tiers. Il contient plusieurs données : le nom du serveur qui l’a déposé, un identifiant sous forme de numéro unique et éventuellement une date d’expiration.
L’uitilisateur est informé que les cookies utilisés par le Site sont des cookies nécessaires au fonctionnement du Site, à la réalisation de statistiques ou d’études d’usages, à la notification de messages d’alerte, et au fonctionnement des boutons de partage sur les réseaux sociaux.
Certains cookies utilisés impliquent toutefois le consentement préalable de l’utilisateur avant leur dépôt sur le disque dur. Le paramétrage des cookies présents sur le site peut se faire à tout moment via le bandeau spécifique, situé en bas de l’écran ou directement par l’intermédiaire du module de gestion des cookies ci-dessous. L’utilisateur a la possibilité d’accepter et/ou de s’opposer à l’usage de tout ou partie des cookies en suivant les indications lui étant communiquées.
Pour connaître et gérer les traceurs ou « cookies » liés au Site de Bibliotheka, consultez le lien suivant ou en cliquant sur le gestionnaire des recueils de consentement présent sur les pages de www.bibliotheka.fr et joint ci-après :
ACCÉDER AU MODULE DE GESTION DES COOKIES
Les cookies peuvent également être gérés par le navigateur internet de l’utilisateur (Internet Explorer, Firefox, Safari, Google Chrome…).</p>

<h5 class="mt-5">6. DROITS DE LA PROPRIÉTÉ INTELLECTUELLE :</h5>
<h5 class="mt-5" >6.1 Droits de propriété intellectuelle afférents au Site</h5>
<p class="mt-3">Bibliotheka est titulaire de l’ensemble des droits de propriété intellectuelle afférents au Site. Bibliotheka est notamment titulaire des droits du producteur de la base de données que constitue le Site en vertu des articles L. 341B-1 à L. 343-7 du code de la propriété intellectuelle.
Les internautes s’engagent à ne pas utiliser le Site d’une manière qui serait constitutive d’une violation ou d’une atteinte aux lois et règlements de droit français.</p>
<h5 class="mt-5">6.2 Droits de propriété intellectuelle afférents aux marques et logos</h5>
<p class="mt-3">Bibliotheka est propriétaire des marques « Bibliothèque nationale de France », et de leurs logos respectifs qui figurent sur le Site. Les marques précitées ont été déposées par Bibliotheka à l’INPI et ne peuvent pas être utilisées sans l’autorisation écrite et préalable de Bibliotheka.
Tout usage ou apposition totale ou partielle de ces marques verbales, semi-figuratives ou figuratives sans l’autorisation expresse et préalable de Bibliotheka est sanctionnée par l’article L. 716-1 du Code de la propriété intellectuelle.</p>

<h5 class="mt-5">6.3 Droits de propriété intellectuelle afférents aux contenus du Site</h5>
<p class="mt-3">Certains documents numérisés diffusés sur le Site sont soumis à des droits de propriété intellectuelle. Leur réutilisation est soumise à l’autorisation préalable des titulaires de droits.</p>
<h5 class="mt-5">7. LOI APPLICABLE - LITIGES :</h5>
<p class="mt-3">Le Site et les présentes Conditions Générales d’Utilisation sont soumis à la législation française. En cas de litige, les tribunaux français seront compétents.</p>
<h5 class="mt-5">Contact</h5>
<p class="mt-3">Pour tout renseignement, vous pouvez adresser un courriel à l’adresse suivante  : contactbibliotheka@gmail.com.</p>

<p class="mt-5">Conditions générales de vente des produits réalisés et prestations numériques mis à jour le 23 juillet 2023</p>

<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-flower1" viewBox="0 0 16 16">
=<path d="M6.174 1.184a2 2 0 0 1 3.652 0A2 2 0 0 1 12.99 3.01a2 2 0 0 1 1.826 3.164 2 2 0 0 1 0 3.652 2 2 0 0 1-1.826 3.164 2 2 0 0 1-3.164 1.826 2 2 0 0 1-3.652 0A2 2 0 0 1 3.01 12.99a2 2 0 0 1-1.826-3.164 2 2 0 0 1 0-3.652A2 2 0 0 1 3.01 3.01a2 2 0 0 1 3.164-1.826zM8 1a1 1 0 0 0-.998 1.03l.01.091c.012.077.029.176.054.296.049.241.122.542.213.887.182.688.428 1.513.676 2.314L8 5.762l.045-.144c.248-.8.494-1.626.676-2.314.091-.345.164-.646.213-.887a4.997 4.997 0 0 0 .064-.386L9 2a1 1 0 0 0-1-1zM2 9l.03-.002.091-.01a4.99 4.99 0 0 0 .296-.054c.241-.049.542-.122.887-.213a60.59 60.59 0 0 0 2.314-.676L5.762 8l-.144-.045a60.59 60.59 0 0 0-2.314-.676 16.705 16.705 0 0 0-.887-.213 4.99 4.99 0 0 0-.386-.064L2 7a1 1 0 1 0 0 2zm7 5-.002-.03a5.005 5.005 0 0 0-.064-.386 16.398 16.398 0 0 0-.213-.888 60.582 60.582 0 0 0-.676-2.314L8 10.238l-.045.144c-.248.8-.494 1.626-.676 2.314-.091.345-.164.646-.213.887a4.996 4.996 0 0 0-.064.386L7 14a1 1 0 1 0 2 0zm-5.696-2.134.025-.017a5.001 5.001 0 0 0 .303-.248c.184-.164.408-.377.661-.629A60.614 60.614 0 0 0 5.96 9.23l.103-.111-.147.033a60.88 60.88 0 0 0-2.343.572c-.344.093-.64.18-.874.258a5.063 5.063 0 0 0-.367.138l-.027.014a1 1 0 1 0 1 1.732zM4.5 14.062a1 1 0 0 0 1.366-.366l.014-.027c.01-.02.021-.048.036-.084a5.09 5.09 0 0 0 .102-.283c.078-.233.165-.53.258-.874a60.6 60.6 0 0 0 .572-2.343l.033-.147-.11.102a60.848 60.848 0 0 0-1.743 1.667 17.07 17.07 0 0 0-.629.66 5.06 5.06 0 0 0-.248.304l-.017.025a1 1 0 0 0 .366 1.366zm9.196-8.196a1 1 0 0 0-1-1.732l-.025.017a4.951 4.951 0 0 0-.303.248 16.69 16.69 0 0 0-.661.629A60.72 60.72 0 0 0 10.04 6.77l-.102.111.147-.033a60.6 60.6 0 0 0 2.342-.572c.345-.093.642-.18.875-.258a4.993 4.993 0 0 0 .367-.138.53.53 0 0 0 .027-.014zM11.5 1.938a1 1 0 0 0-1.366.366l-.014.027c-.01.02-.021.048-.036.084a5.09 5.09 0 0 0-.102.283c-.078.233-.165.53-.258.875a60.62 60.62 0 0 0-.572 2.342l-.033.147.11-.102a60.848 60.848 0 0 0 1.743-1.667c.252-.253.465-.477.629-.66a5.001 5.001 0 0 0 .248-.304l.017-.025a1 1 0 0 0-.366-1.366zM14 9a1 1 0 0 0 0-2l-.03.002a4.996 4.996 0 0 0-.386.064c-.242.049-.543.122-.888.213-.688.182-1.513.428-2.314.676L10.238 8l.144.045c.8.248 1.626.494 2.314.676.345.091.646.164.887.213a4.996 4.996 0 0 0 .386.064L14 9zM1.938 4.5a1 1 0 0 0 .393 1.38l.084.035c.072.03.166.064.283.103.233.078.53.165.874.258a60.88 60.88 0 0 0 2.343.572l.147.033-.103-.111a60.584 60.584 0 0 0-1.666-1.742 16.705 16.705 0 0 0-.66-.629 4.996 4.996 0 0 0-.304-.248l-.025-.017a1 1 0 0 0-1.366.366zm2.196-1.196.017.025a4.996 4.996 0 0 0 .248.303c.164.184.377.408.629.661A60.597 60.597 0 0 0 6.77 5.96l.111.102-.033-.147a60.602 60.602 0 0 0-.572-2.342c-.093-.345-.18-.642-.258-.875a5.006 5.006 0 0 0-.138-.367l-.014-.027a1 1 0 1 0-1.732 1zm9.928 8.196a1 1 0 0 0-.366-1.366l-.027-.014a5 5 0 0 0-.367-.138c-.233-.078-.53-.165-.875-.258a60.619 60.619 0 0 0-2.342-.572l-.147-.033.102.111a60.73 60.73 0 0 0 1.667 1.742c.253.252.477.465.66.629a4.946 4.946 0 0 0 .304.248l.025.017a1 1 0 0 0 1.366-.366zm-3.928 2.196a1 1 0 0 0 1.732-1l-.017-.025a5.065 5.065 0 0 0-.248-.303 16.705 16.705 0 0 0-.629-.661A60.462 60.462 0 0 0 9.23 10.04l-.111-.102.033.147a60.6 60.6 0 0 0 .572 2.342c.093.345.18.642.258.875a4.985 4.985 0 0 0 .138.367.575.575 0 0 0 .014.027zM8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
</svg>

</body>
</html>