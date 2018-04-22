<?php
/**
 * Created by PhpStorm.
 * User: Sami Hadouaj
 * Date: 18/04/2018
 * Time: 08:23
 */
$cinn = 1; //$cinn prendra comme valeur le contenu d'une cockille qui contient la cin du client et qui vient de la page d'avant
$bdd = new PDO('mysql:host=localhost;dbname=hotel;charset=utf8', 'root', '');
/*recuperation des donnees sur le client ainsi que la reservation qu'il a effecter*/
$bdd->query('use hotel');
$req = $bdd->prepare('select * from client , reservation WHERE  client.cin=:cin and reservation.cin=:cin ');
$req->execute(array('cin' => $cinn));
$reser = $req->fetch();
$num_chambre = $reser['num_chambre'];

/*recueration des consommation de ce client : ce qu'il a consomme et
 les details sur chauque produit consomme*/
$req1 = $bdd->prepare('select * from consommation , consommable  where consommation.num_chambre=:num_chambre and consommation.num_consommable=consommable.num_consommable');
$req1->execute(array('num_chambre' => $num_chambre));
$cons = $req1->fetchAll(PDO::FETCH_BOTH);


/*recuperation des information sur la chambre */
$req2 = $bdd->prepare('select * from chambre  where num_chambre=:num_chambre');
$req2->execute(array('num_chambre' => $num_chambre));
$chambre = $req2->fetchAll(PDO::FETCH_BOTH);

$cin = $reser['cin'];
$numres = $reser['num_reservation'];
$date_deb = $reser['date_deb'];
$date_fin = $reser['date_fin'];

//calcul du nombre de jour passer dans l'hotel
$date1 = date_create($date_deb);
$date2 = date_create($date_fin);
$diff = date_diff($date1, $date2);
$diffrence = (int)($diff->format("%a "));

$prix_nuit = $chambre[0]["prix_nuit"];
$montant = $diffrence * $prix_nuit; //c'est le montant du sejours

//calcul du montant de la consommation totale
$montantcos = 0;
foreach ($cons as $c) {
    $montantcos += $c['total'];
}

$etat = 'Non Payee';


/*ajout d'une facture dans la table facrture*/
$req3 = $bdd->prepare('INSERT  into facture(facture.cin , facture.date_facture,facture.num_reservation,facture.etat) VALUES (:cin,now(),:numres,:etat)');
$req3->execute(array('cin' => $cin, 'numres' => $numres, 'etat' => $etat));

//ou recupere la facture qu'on a insere ci dessus pour pouvoir recuper son id
$req4 = $bdd->prepare('select num_facture from facture WHERE cin=:cin');
$req4->execute(array('cin' => $cin));
$fact = $req4->fetchAll(PDO::FETCH_BOTH);

$now = date("d-m-Y");//la date actuelle pour la mettre dans la facture
?>


<html>
<head>
    <meta charset="UTF-8">
    <title>Facture</title>
    <link rel="stylesheet" type="text/css" href="checkout.css">

</head>
<body>
<h1>Golden Hotel</h1> <br>
<div id="date"><?php echo "le " . $now ?></div>
<h3>Numero facture <?php echo $fact[0]["num_facture"] ?></h3>
<div id="info">


    <label>Nom : </label>
    <?php echo $reser["nom"] ?> <br>

    <label>Numero de reservation : </label>
    <?php echo $reser["num_reservation"] ?><br>

    <label>Numero de chambre : </label>
    <?php echo $reser["num_chambre"] ?><br>


    <label>Vous avez L'offre : </label>
    <?php echo $reser["offre"] ?><br>

    <label>Date d'entree:</label>
    <?php echo date_format($date1, ' l jS F Y'); ?><br>

    <label>Date de sortie : </label>
    <?php echo date_format($date2, ' l jS F Y'); ?><br><br>

</div>
<h2>vos consommation : </h2>
<table id="cons">
    <thead>

    <th>id</th>
    <th>libelle</th>
    <th>prix unite</th>
    <th>quantite</th>

    </thead>
    <tbody>
    
    <?php foreach ($cons as $c) { ?>
        <tr>
            <td>
                <?php echo $c['num_consommable'] ?>
            </td>


            <td>
                <?php echo $c['libelle'] ?>
            </td>

            <td>
                <?php echo $c['prix'] ?>
            </td>

            <td>
                <?php echo $c['qte'] ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>

</table>
<br>
<h2>Votre sejour </h2>
<div id="apayer">
    vous avez serjournee <?php echo $diffrence ?> jours
    qui coutent <?php echo $montant . "Dinars." ?>
    <br><br>
    <h2 id="tot">Totale </h2>
    Total a payer : <?php echo $montantcos + $montant . ' Dinars TTC' ?>
    <br><br>
    <em>Signature</em>
</div>
</body>
<footer>
    <br><br> <br><br>
    <hr>
    adresse : Rue de la Republique, La Marsa 2078 <br>
    numero fix : 71142000 &nbsp; &nbsp;

    adresse email : goldenhotel@golden.com
    <a href="lien pour impression">Imprimer</a>
</footer>
</html>

<?php
//on met a jour l'etat de la facture
$req5 = $bdd->prepare('update facture set etat=:etat where num_facture=:id');
$req5->execute(array('etat' => 'Paye', 'id' => $fact[0]["num_facture"]));

//cette requette efface la reservation apres que le peyement soit effectuer
$req6 = $bdd->prepare('delete from reservation where reservation.num_reservation=:n');
$req6->execute(array('n' => $numres));
?>
