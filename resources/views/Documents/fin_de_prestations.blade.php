<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rapport de fin de prestations </title>
</head>
<style>
      body {
            font-family: DejaVu Sans, 'Calibri', sans-serif !important;
        }
    .franklin{
        font-family:"Franklin Gothic Medium" !important;
        color: white;
        text-align: center;
        margin-top:80px;
    }
    .franklin p{
        font-size: 20px;
        font-weight: bold;
    }
    p{
        font-size:13px;
    }
    .green-block{
        background-color: #90ce4e;
        color: white;
        padding: 13px;
        margin: 9px;
        width: 120%;
        position: absolute;
        z-index: 99;
    }
    .bleu-block{
        background-color: #001e5e;
        height: 55%;
        width: 200%;
        position: absolute;
        left:-10%;
        top:24%
    }
    .title{
        background-color: #90ce4e;
        color: white;
        font-size: 17px;
        font-weight: bold;

    }
    .dotted-line{
        border-bottom: dotted 1px;
        margin-top: 30px;
    }
    @page{
        margin-left:60px;
        margin-right:60px;
    }
</style>
<body>
    <div>
        <div>
            <img src="{{resource_path('images/empty_logo.jpg')}}"  style="width: 160px;height:110;"></img>
            <p>
                <b>Accompagnateur Rénov :
                    {{$project->company->trade_name}}
                    <br>Raison sociale :
                    {{$project->company->trade_name}}
                    <br>SIRET :
                    {{$project->company->siret}}
                </b>
            </p>
        </div>
    </div>
    <div>
        <section class="green-block"></section>
        <section class="bleu-block"></section>
    </div>

    <div class="franklin" style="margin: 10px auto;margin-top:85px;">
        <p style="border-bottom: 1px solid #5061d4">Nom du client :
            {{$project->client->last_name.' '.$project->client->first_name}}
        </p>
        <p>Téléphone du client :
            {{$project->client->phone_number_1}}
        </p>
        <p>Adresse du projet :
            {{$project->address}}
        </p>
        <p>Code postal et ville :
            {{$project->zip_code.' '.$project->city}}
        </p>
        <p style="border-bottom: 1px solid #5061d4">Rapport de fin de prestations</p>
    </div>

    <div style="text-align: center;margin-top:300px;">
        <img src="{{resource_path('images/logo_MAR1.jpg')}}" style="width: 180px;height:120px;">
    </div>

    <div style="page-break-before: always;text-align:center;margin-top:30px;">
        <p class="title">Rapport de fin de prestations de Mon Accompagnateur Rénov</p>
    </div>

    <div>
        <p style="margin-top:20px;">
            Conformément aux recommandations de l'ANAH (Agence nationale de l'habitat) concernant les missions
            de Mon Accompagnateur Rénov, qui consistaient à informer, conseiller et guider le ménage tout au long
            du processus de rénovation énergétique, nous avons mis en œuvre les principales étapes de la prestation
            suivantes :
        </p>
        <p style="font-weight:bold;margin-left:20px;margin-top:20px;">
            1‐ Information et Évaluation :
        </p>
        <p style="margin-left:90px;margin-top:20px;">
            Au cours de notre prestation, nous avons pris l'initiative de fournir au client des
            informations exhaustives relatives à l'accompagnement offert, ainsi qu'aux éventuelles
            aides financières et aux obligations qui incombent au ménage. En parallèle, une
            évaluation approfondie de la situation économique du ménage, intégrant sa capacité de
            financement, a été minutieusement réalisée par nos soins. Ces démarches visaient à
            garantir au client une compréhension complète et personnalisée de son contexte
            financier et des opportunités qui s'offrent à lui dans le cadre du processus de rénovation
            MPR.
        </p>
        <p style="font-weight:bold;margin-left:20px;margin-top:20px;">
            2‐ Audit Énergétique :
        </p>
        <p style="margin-left:90px;margin-top:20px;">
            Nous avons procédé à la réalisation d'un audit énergétique, examinant de manière
            approfondie les différents aspects de la consommation énergétique du domicile. Ensuite,
            nous avons fourni des conseils personnalisés pour orienter le choix du ménage vers un
            scénario de travaux spécifique, basé sur les recommandations découlant de cet audit.
        </p>
        <p style="font-weight:bold;margin-left:20px;margin-top:20px;">
            3‐ Analyse des Devis et Plan de Financement
        </p>
        <p style="margin-left:90px;margin-top:20px;margin-top:20px;">
            Nous avons apporté notre soutien en analysant les devis proposés par les entreprises,
            veillant à ce que le ménage puisse prendre des décisions éclairées lors du choix des
            prestataires. Par la suite, nous avons élaboré un plan de financement détaillé, aligné sur
            les besoins spécifiques du projet de rénovation. Enfin, nous avons fourni une assistance
            dédiée dans le processus de dépôt des demandes d'aides financières, garantissant ainsi
            que toutes les opportunités d'assistance financière étaient explorées et maximisées.
        </p>
        <p style="font-weight:bold;margin-left:20px;margin-top:20px;">
            4‐ Suivi de Chantier et Réception des Travaux
        </p>
        <p style="margin-left:90px;margin-top:20px;">
            Nous avons offert des conseils avisés au client pour assurer un suivi efficace du chantier,
            garantissant ainsi le bon déroulement des travaux. Notre présence a été assurée lors de
            la réception des travaux, permettant une inspection minutieuse pour s'assurer de leur
            conformité aux normes et aux attentes du client. De plus, nous avons joué un rôle
            essentiel dans la validation de la conformité des factures et des travaux réalisés,
            assurant ainsi la transparence et la justesse des coûts engagés tout au long du processus
            de rénovation.
        </p>
        <p style="page-break-before:always;font-weight:bold;margin-left:20px;">
            5‐ Sensibilisation aux Usages et Éco‐gestes
        </p>
        <p style="margin-left:90px;">
            Dans le cadre de notre engagement, nous avons pris l'initiative de sensibiliser le ménage
            aux bonnes pratiques et aux éco‐gestes associés à l'utilisation des nouveaux
            équipements. Nous avons partagé avec eux des conseils pratiques visant à optimiser
            l'efficacité énergétique et à encourager des habitudes responsables. Cette phase de
            sensibilisation s'est avérée être un élément clé de notre prestation, visant à assurer une
            transition en douceur vers l'utilisation des installations rénovées tout en favorisant des
            comportements respectueux de l'environnement au sein du ménage.
        </p>
    </div>

</body>
</html>
