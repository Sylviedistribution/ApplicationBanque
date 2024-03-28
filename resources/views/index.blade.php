@extends('layouts.app')

@section('contents')

    <!-- Carousel -->
    <div id="carousel">
        <div class="carousel">
            <div class="slide">
                <img src="{{asset("img/payer-sans-carte-physique.jpg")}}" alt="Image 1">
                <div class="caption">Dites stop aux cartes physiques et oui aux cartes virtuelles éphémères.</div>
            </div>
            <div class="slide">
                <img src="{{asset("img/epargner.jpg")}}" alt="Image 2">
                <div class="caption">Épargner en toute sécurité.</div>
            </div>
            <div class="slide">
                <img src="{{asset("img/transferer-argent.jpg")}}" alt="Image 3">
                <div class="caption">Transférer de l'argent n'importe où 24h sur 24</div>
            </div>
        </div>
    </div>


    <!-- À Propos de Nous -->
    <div id="about">
        <div class="about">
            <h2>À Propos de Nous</h2>
            <p>Cash Connect est bien plus qu'une simple banque en ligne. Notre objectif est de fournir à nos clients une
                expérience bancaire moderne et sécurisée, adaptée à leurs besoins financiers uniques. Grâce à notre
                gamme complète de services financiers, nous offrons des solutions pour chaque étape de votre vie
                financière.

                Nos cartes éphémères sont conçues pour garantir la sécurité de vos transactions en ligne. Chaque carte
                est générée spécifiquement pour une transaction unique, offrant une tranquillité d'esprit supplémentaire
                lorsque vous effectuez des achats en ligne.

                Pour répondre à la diversité des besoins de nos clients, nous proposons trois packs ou offres
                personnalisées : le Pack Standard pour ceux qui recherchent des fonctionnalités de base, le Pack Premium
                pour ceux qui souhaitent des avantages supplémentaires, et enfin, le Pack Gold pour ceux qui exigent le
                meilleur en termes de services bancaires.

                Mais ce n'est pas tout. Nous comprenons que la gestion de vos finances ne se limite pas à des
                transactions. C'est pourquoi nous offrons également des comptes courants et d'épargne, dotés de
                fonctionnalités pratiques et d'outils de gestion en ligne. Que vous cherchiez à économiser pour un
                projet futur ou à gérer vos dépenses quotidiennes, Cash Connect est là pour vous accompagner à chaque
                étape de votre parcours financier.

                Rejoignez-nous dès aujourd'hui et découvrez une nouvelle façon de gérer votre argent avec confiance et
                tranquillité d'esprit.
            </p>
        </div>
    </div>

    <!-- Packs -->
    <div id="packages"
         style="background-image: url('{{ asset('img/background.jpg') }}');; background-repeat: no-repeat; background-size: 100% 100%;">
        <h2 class="text-center text-white">Packs</h2>
        <div class="row offset-1">
            <div id="standard-pack" class="col-md-4">
                <div class="card blue">
                    <h3>Standard Pack</h3>
                    <p>Le pack standard est conçu pour répondre aux besoins de base des clients.</p>
                    <ul>
                        <li>Agio: 3000</li>
                        <li>Plafond de Transaction: 1.000.000 FCFA</li>
                    </ul>
                </div>
            </div>
            <div id="premium-pack" class="col-md-4">
                <div class="card silver">
                    <h3>Premium Pack</h3>
                    <p>Le pack premium offre des avantages supplémentaires pour les clients qui ont des besoins plus
                        importants.</p>
                    <ul>
                        <li>Agio: 5000</li>
                        <li>Plafond de Transaction: 5.000.000 FCFA</li>
                    </ul>
                </div>
            </div>
            <div id="gold-pack" class="col-md-4">
                <div class="card gold">
                    <h3>Gold Pack</h3>
                    <p>Le pack Gold est le choix ultime pour les clients qui souhaitent des fonctionnalités avancées et
                        aucun plafond de transaction.</p>
                    <ul>
                        <li>Agio: 12.000</li>
                        <li>Plafond de Transaction: Pas de plafond</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Comptes -->
    <div id="account">
        <h2 class="text-center">Comptes</h2>
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Compte Courant
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg ml-2"
                         style="padding-bottom: 15px" ;>
                        <i class="material-icons opacity-10" style="padding-bottom: 20px" ;>account_balance</i>
                    </div>
                </h3>

                <p>Le compte courant offre une grande flexibilité pour les transactions quotidiennes. Voici ce qu'il est
                    possible de faire :</p>
                <ul>
                    <li>Dépôt et retrait d'argent à tout moment</li>
                    <li>Accès aux services bancaires en ligne</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h3>Compte Épargne
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg ml-2"
                         style="padding-bottom: 15px" ;>
                        <i class="material-icons opacity-10" style="padding-bottom: 20px" ;>account_balance_wallet</i>
                    </div>
                </h3>


                <p>Le compte épargne est conçu pour permettre aux clients de mettre de l'argent de côté et de gagner des
                    intérêts. Voici ses caractéristiques :</p>
                <ul>
                    <li>Intérêts sur le solde</li>
                    <li>Options de dépôt programmé</li>
                    <li>Accès aux fonds en tout temps</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Cartes Éphémères -->
    <div id="ephemeral-cards">
        <h2 class="text-center">Cartes</h2>
        <div class="row">
            <div class="col-md-12">
                <p>Les cartes éphémères offrent une sécurité accrue pour les transactions en ligne. Elles sont générées
                    pour chaque transaction individuelle et sont automatiquement détruite une fois qu'elles sont vidées.
                    De plus nos cartes sont gratuites et vous pouvez en générer autant que vous le souhaitez.
                </p>

                <img src="{{ asset('img/carte-virtuelle.jpg') }}" alt="Image de cartes éphémères" style="width: 50%; height: auto; display: block; margin: 0 auto;">

            </div>
        </div>
    </div>

@endsection
