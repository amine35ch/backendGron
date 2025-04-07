<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ENGAGEMENTS COMPLÉMENTAIRES</title>
    <style>
        p { font-family: Verdana, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight :400; line-height: 20px; } 
        @page{
            margin: 80px;
        }
    </style>
</head>
<body>
    <div>
        <div style=" width: 100%; position:relative; top:-30px;">
            <table style="width: 100%">
                <td style="width: 17.5%"><img style="height: 90px;" src="{{ resource_path('images/agence-nationale.png') }}" alt="agence-nationale"></td>
                <td style="width: 5%"></td>
                <td style="width: 17.5%"><img style="height: 90px;" src="{{ resource_path('images/republic-fr.png') }}" alt="repFrancaise"></td>
                <td style="width: 60%"></td>
                <td><img style="height: 90px" src="{{ resource_path('images/cee.png') }}"
                        alt="agenceNationale"></td>
            </table>
        </div>
    
    
        <h3 class="title" style="background-color:#f1f1f1 !important;padding:-30px; height:70px;margin-top:30px;text-align:center;font-family: Trebuchet MS, sans-serif;">
            <span style="margin-left:35px;position: relative; top:23px; font-size:19px; ">
                ENGAGEMENTS COMPLÉMENTAIRES
            </span>
        </h3>
    </div>
    <div>
        <p>
            Les travaux financés par l’Anah dans le cadre du dispositif MaPrimeRénov’ Parcours accompagné
            peuvent donner lieu à la délivrance de <b>certificats d’économies d’énergie (CEE).</b>
        </p>
        <p>
            Le dispositif des CEE constitue l’un des instruments principaux de la politique de maîtrise de la
            demande énergétique. Il repose sur une obligation de réalisation d’économie d’énergie imposée par
            les pouvoirs publics aux vendeurs d’énergie appelés les « obligés » (électricité, gaz, chaleur, froid,
            fioul domestique, carburants pour automobiles). Ceux-ci sont ainsi incités à promouvoir activement
            l’efficacité énergétique auprès des consommateurs d’énergie : ménages, collectivités territoriales ou
            professionnels.
        </p>
        <p>
            Un objectif est défini et réparti entre les obligés en fonction de leurs volumes de ventes respectifs.
            Chacun d’eux doit justifier de l’accomplissement de ses obligations par la détention d’un montant
            de CEE équivalent. Les certificats sont obtenus à la suite d’actions entreprises en propre par l’obligé
            ou par l’achat à d’autres acteurs ayant mené des opérations d’économie d’énergie ou à travers des
            contributions financières à des programmes d’accompagnement. En cas de non-respect de ses obligations, l’obligé est soumis au versement d’une pénalité.
        </p>
        <p>
            Dans ce contexte, un accord a été signé entre l’État et l’Anah, permettant à l’Anah de valoriser les
            CEE générés par les travaux de MaPrimeRénov’ Parcours accompagné et d’accroître le montant des
            primes allouées aux ménages dans le cadre de ce dispositif. Les fonds ainsi versés à l’Anah par les
            obligés sont entièrement affectés à la réalisation de MaPrimeRénov’ Parcours accompagné, de sorte
            que vous bénéficiez indirectement – à travers l’aide accordée par l’Anah pour le financement de
            votre projet – du soutien de ces entreprises. 
        </p>
        <p>
            C’est pourquoi, pour pouvoir bénéficier de l’aide MaPrimeRénov’ Parcours accompagné, il est impératif que vous signiez l’engagement complémentaire figurant en page suivante. Vous reconnaissez
            ainsi être informé que l’Anah valorise des CEE issus de votre projet et que vous ne pouvez donc pas
            directement, ou par l’intermédiaire de vos entreprises de travaux, valoriser des CEE pour ce même
            projet.
        </p>
        <p style="margin-top:-10px;">
            Nous vous recommandons de conserver une copie du présent formulaire.
        </p>
        <p style="margin-top:-10px;">
            L’Accompagnateur Rénov’ vous accompagnant dans la réalisation de votre projet a connaissance
            des procédures à respecter. Il saura vous assister efficacement à toutes les étapes, notamment dans
            vos rapports avec les entreprises réalisant les travaux, qui devront mettre en œuvre des matériaux
            respectant des critères de performance énergétique et fournir les justificatifs nécessaires à la délivrance des CEE.
        </p>
    </div>
    <div style="position: absolute;top:103%;left:102%;font-size:10px;">
        <span>1/2</span>
    </div>
    <div style="page-break-before: always;">
        <p>
            <b>Je soussigné(e)</b> (nom et prénom de la personne ayant signé la demande d’aide) <br>
            M. et/ou Mme :  {{ $project->client->first_name }} {{ $project->client->last_name }}<br>
            Numéro du dossier : {{ $project->anah_folder }} <br>
            Adresse du logement à rénover : {{ $project->address. ' '. $project->zip_code . ' '. $project->city}}
        </p>
        <p>
            <b>ayant formulé une demande d’aide MaPrimeRénov’ Parcours accompagné</b> (cochez la case correspondant à votre situation) : <br>
            <input style="position: relative; top:8px;" type="checkbox" @if (true)
                checked
            @endif> en tant que <b>propriétaire occupant</b>, pour des travaux <br>
            <input style="position: relative; top:8px;" type="checkbox" @if (false)
                checked
            @endif> en tant que propriétaire bailleur, pour des travaux <br>
        </p>
        <p>
            <b> <span style="font-family: 'DejaVu Sans', sans-serif;font-size:11px;"> √</span> reconnais être informé</b> que, en cas d’octroi d’une aide MaPrimeRénov’ Parcours accompagné,
            &nbsp;&nbsp;l’Anah <b>dispose d’un droit d’exclusivité pour l’enregistrement des certificats d’économies &nbsp;&nbsp;d’énergie
            (CEE)</b> générés par le projet de travaux subventionné. Je <b>m’engage</b> donc à <b>ne pas &nbsp;&nbsp;permettre l’enregistrement des CEE par moi-même ou un tiers <sup>1</sup></b>
            . S’il était établi, à &nbsp;&nbsp;l’instruction  de la demande de
            paiement de la subvention ou ultérieurement, que les CEE ont été &nbsp;&nbsp;enregistrés par un tiers autre
            que l’Anah, l’aide de l’Anah pourrait être retirée, ce qui entraînerait &nbsp;&nbsp;le reversement des sommes
            perçues.
        </p>

        <p>
            <b> <span style="font-family: 'DejaVu Sans', sans-serif;font-size:11px"> √</span></b> m’engage, le cas échéant avec l’assistance de Mon Accompagnateur Rénov’ chargé de &nbsp;&nbsp;m’accompagner dans la réalisation de mon projet2,<b> à exiger des entreprises réalisant les &nbsp;&nbsp;travaux</b> qu’elles : <br>
            &nbsp;&nbsp;• mettent en œuvre des matériaux et équipements en respectant les critères techniques prévus
            &nbsp;&nbsp;par la réglementation ; <br>
                &nbsp;&nbsp;• fournissent les documents nécessaires à la délivrance de CEE (notamment les factures).
        </p>
        <p>
            <b> <span style="font-family: 'DejaVu Sans', sans-serif;font-size:11px"> √</span> m’engage</b> également <b>à remplir et signer</b> l’attestation de projet de travaux et l’attestation de fin
            &nbsp;&nbsp;de travaux, le cas échéant contresignées par Mon Accompagnateur Rénov' chargé de &nbsp;&nbsp;l’accompagnement de mon projet<sup>2</sup>, et à transmettre à <b>l’Anah les documents nécessaires au &nbsp;&nbsp;dépôt d’une
            demande de CEE.</b>
        </p>
    </div>
    <div>
        @php
            $signatureDate=\Carbon\Carbon::parse($project?->visits->where('type',0)->first()?->visit_date)->format('d/m/Y') ?? now()->format('d/m/Y')
        @endphp
        <p>
            Fait à : {{ $project->client->city}} <br>
            le {{ $signatureDate  }} 
        </p>
        <h4>
            Signature du demandeur :
        </h4>
    </div>
    <div style="position: absolute;top:94%">
        <p style="font-size: 9px;line-height: 10.5px;font-weight:bold;">
            <sup>1</sup> Soyez attentif aux documents que vous êtes invité à signer dans le cadre de démarches commerciales (bon d’achat, réduction, etc.), en particulier
            lorsque cela concerne les travaux ou les équipements mis en œuvre dans le cadre du projet objet de la demande d’aide : le fait de souscrire aux conditions attachées à certaines offres peut aboutir à l’enregistrement des CEE par un tiers autre que l’Anah, et entraîner une inéligibilité de votre projet
            ou une annulation et un reversement de l’aide. N’hésitez pas à demander conseil auprès de l’Accompagnateur Rénov’ chargé de vous accompagner
            dans votre projet.
        </p>
        <p style="font-size: 9px;line-height: 10.5px;font-weight:bold;">
            <sup>2</sup> Pour pouvoir bénéficier d’une aide MaPrimeRénov’ Parcours accompagné, un propriétaire doit être assisté par un Accompagnateur Rénov’ mettant
            en œuvre un ensemble complet de prestations d’ingénierie (aide à la décision, à l’élaboration du projet et au montage des dossiers de financement
            et de paiement des subventions).
        </p>
    </div>
    <div style="position: absolute;top:103%;left:102%;font-size:10px;">
        <span>2/2</span>
    </div>
</body>
</html>