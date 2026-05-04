<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;

class RealContentSeeder extends Seeder
{
    public function run()
    {
        $admin = User::where('role', 'admin')->first() ?? User::first();
        if (!$admin) {
            $admin = User::factory()->create(['role' => 'admin', 'name' => 'Admin']);
        }
        $userId = $admin->id;

        $events = [
            // AMUSE-GUEULES
            [
                'title' => 'Cuisine et dépendances',
                'category' => 'amuse-gueule',
                'event_date' => '2016-10-17 19:00:00',
                'description' => "Jacques et Martine invitent à dîner Charlotte et son mari, devenu présentateur vedette à la télévision, qu’ils n’ont pas revu depuis dix ans, en compagnie d’autres amis. Bien vite, la tension monte, la présence de celui qui a réussi déchaîne admiration, envie, jalousie. Tout se dit en cuisine, entre deux plats.\n(L'avant-scène théâtre, 2005)\nTarif: 6€",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => 'Le joueur d’échec',
                'category' => 'amuse-gueule',
                'event_date' => '2016-11-21 19:00:00',
                'description' => "Qui est cet inconnu capable de gagner face au champion mondial des échecs ? Peut-on croire, comme il l'affirme, qu'il n'a pas joué depuis plus de vingt ans ? Voilà un mystère que les passagers de ce paquebot de luxe aimeraient bien percer.\nTarif: 6€",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "L'être ou pas (Pour en finir avec la question juive)",
                'category' => 'amuse-gueule',
                'event_date' => '2016-12-12 19:00:00',
                'description' => "Deux voisins se croisent plusieurs fois dans l'escalier. Chaque rencontre est l'occasion pour l'un de questionner l'autre : « C’est quoi être juif ? »\nUne comédie qui écorne avec humour de nombreux préjugés.\nTarif: 6€",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "Je suis un être exquis",
                'category' => 'amuse-gueule',
                'event_date' => '2017-01-09 19:00:00',
                'description' => "Parole de Jean Yanne (extraits). Il en a dit des conneries. Beaucoup d’intelligentes...\nJean Yanne nous manque. Son regard acerbe sur la société, son sens de la dérision, sa mauvaise foi irrésistible sont encore dans toutes les mémoires.\nTarif: 6€",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => 'Une partie du tout',
                'category' => 'amuse-gueule',
                'event_date' => '2017-02-06 19:00:00',
                'description' => "de Steve Toltz. Stupéfiant d'imagination, de drôlerie et de profondeur, un premier roman époustouflant, finaliste du prestigieux Man Booker Prize.\nTarif: 6€",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => 'Je t’aime coquin !',
                'category' => 'amuse-gueule',
                'event_date' => '2017-02-14 19:00:00',
                'description' => "Des mots pour vous mettre en bouche et fêter coquinement la Saint-Valentin...\nTarif: 6€",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => 'Au bout de la langue (Printemps des poètes)',
                'category' => 'amuse-gueule',
                'event_date' => '2017-03-06 19:00:00',
                'description' => "Saviez-vous que la bergerie peut abriter des « bouquins » (vieux boucs) ? Pour le Printemps des Poètes, un amuse-gueule où l’on déshabillerait les formules, où l’on jouerait avec les mots...\nTarif: 6€",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => 'Le dieu du carnage',
                'category' => 'amuse-gueule',
                'event_date' => '2017-04-03 19:00:00',
                'description' => "de Yasmina Reza. Dans un jardin public, deux enfants de onze ans se bagarrent et se blessent. Les parents de la victime demandent à s'expliquer avec les parents du coupable.\nTarif: 6€",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => 'La campagne',
                'category' => 'amuse-gueule',
                'event_date' => '2017-05-15 19:00:00',
                'description' => "de Martin Crimp. Richard est médecin et, un soir, il a trouvé une très jeune femme étendue sur un bas-côté de la petite route. Aux interrogations de Corinne, il répond souvent évasivement...\nTarif: 6€",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => 'Rixe et Les Vacances',
                'category' => 'amuse-gueule',
                'event_date' => '2017-06-12 19:00:00',
                'description' => "de Jean-Claude Grumberg. La bêtise xénophobe et raciste que dénonçait Grumberg il y a un demi-siècle sévit toujours. A s’étrangler de rire !\nTarif: 6€",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => 'La leçon',
                'category' => 'amuse-gueule',
                'event_date' => '2017-10-09 19:00:00',
                'description' => "d’Eugène Ionesco. Un cours particulier, qui commence comme une farce, une satire hilarante de l’enseignement et qui, très vite, dérape...\nTarif: 8€",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => 'CHRONIQUES 68 [Humour]',
                'category' => 'amuse-gueule',
                'event_date' => '2021-09-27 19:00:00',
                'description' => "Alexandre Vialatte. Au coeur des événements considérables qui ont marqué l’année 1968, Alexandre Vialatte pose la question essentielle : «Que peut faire l’homme sans auto à laver ?»\nTarif: 10€",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => 'IMPORTUNS SOUVENIRS [Roman]',
                'category' => 'amuse-gueule',
                'event_date' => '2021-10-18 19:00:00',
                'description' => "Sylvaine Arrivé. Un enterrement, un train, une voyageuse … qui repense à son passé. Le paysage défile et la mémoire est capricieuse…\nTarif: 10€",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => 'Boris Vian',
                'category' => 'amuse-gueule',
                'event_date' => '2026-02-02 19:30:00',
                'description' => "Amuse-gueule autour de Boris Vian. Reporté suite spectacle Stephanie.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => 'Coquin Valentin',
                'category' => 'amuse-gueule',
                'event_date' => '2026-02-14 19:30:00',
                'description' => "Amuse-gueule avec Gilles Losseroy pour fêter la Saint-Valentin avec des mots coquins.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => 'A mon frère le Paysan',
                'category' => 'amuse-gueule',
                'event_date' => '2026-03-14 19:00:00',
                'description' => "A mon frère le Paysan de Elisée Reclus par Claire de la Guinguette. Suivi de Modeste proposition de Jonathan Swift par Daniel Pierson.",
                'status' => 'published',
                'user_id' => $userId,
            ],

            // SPECTACLES
            [
                'title' => "C’est pas moi, j’ai rien fait !",
                'category' => 'spectacle',
                'event_date' => '2017-01-14 16:00:00',
                'description' => "Théâtre jeune public. Cie Incognito. Vous connaissez tous Le Petit Chaperon rouge, Les Trois Petits Cochons et Pierre et le Loup ? Le loup y est méchant et cruel, n’est-ce pas ? Pas du tout !",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "Un cri",
                'category' => 'spectacle',
                'event_date' => '2017-02-10 20:30:00',
                'description' => "Said Izem et Waki. C’est une histoire comme une autre, une histoire de migrant. C’est un cri beau comme un poème, fort et bouleversant.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "Baleine",
                'category' => 'spectacle',
                'event_date' => '2017-03-17 20:30:00',
                'description' => "de Paul Gadenne. Cie ça respire encore. Une baleine, d'une blancheur de pierre, s'est échouée sur la plage...",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "Manuel de survie dans l’isoloir",
                'category' => 'spectacle',
                'event_date' => '2017-04-29 20:30:00',
                'description' => "de et avec Frédérick Sigrist. Corrosif, drôle et engagé, Frédérick dresse un portrait au vitriol de notre société.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "Concert Jazz Duo Fabrice Bez - Michael Cuvillon",
                'category' => 'spectacle',
                'event_date' => '2017-05-06 20:30:00',
                'description' => "Fabrice Bez et Michael Cuvillon entremêlent les timbres de l’accordéon et du saxophone soprano et nous livrent une musique narrative.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "Ma vie en prison",
                'category' => 'spectacle',
                'event_date' => '2017-10-06 20:30:00',
                'description' => "de Djibril Siby. J’ai écrit une histoire, de l’entrée jusqu’à la sortie, le quotidien, le parloir, la violence... sans pathos.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "FRÉDÉRICK SIGRIST, SUPER HEROS",
                'category' => 'spectacle',
                'event_date' => '2021-09-17 20:30:00',
                'description' => "Demain, tous masqués ? Une plongée dans les personnages de la pop culture, reliés avec les grands moments de l’époque contemporaine !",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "MORAINES",
                'category' => 'spectacle',
                'event_date' => '2021-11-26 20:30:00',
                'description' => "Cie ça respire encore. Sous une forme littéraire originale et par des chemins escarpés, ces textes vous mèneront au cœur de la vie.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "LOUISE, ELLE EST FOLLE",
                'category' => 'spectacle',
                'event_date' => '2021-12-03 20:30:00',
                'description' => "Cie Acte II scène 2. Elles deux s’accusent, se cherchent, se perdent, s’amusent et utilisent une troisième, absente, pour dire ce qu’elles ne voudraient surtout pas être.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "LE 20 NOVEMBRE",
                'category' => 'spectacle',
                'event_date' => '2022-01-12 20:30:00',
                'description' => "Cie ça respire encore. Le 20 novembre 2006, Sebastian Bosse ouvrait le feu sur les élèves et les professeurs de son ancien collège...",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "ARGENTINE 78",
                'category' => 'spectacle',
                'event_date' => '2022-01-17 19:00:00',
                'description' => "Monique Seemann et Luc Schillinger. 3 buts, 30 000 morts et disparus. C’est le Mundial de foot, entre liesse populaire et dictature sanglante.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "RECONSTITUTION",
                'category' => 'spectacle',
                'event_date' => '2022-02-21 19:00:00',
                'description' => "Pascal Rambert. Ils se sont aimés, ont fait un enfant, puis se sont séparés. Trente ans plus tard, elle lui propose de se retrouver pour reconstituer leur première rencontre.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "VERTIGE/SÉPARATION",
                'category' => 'spectacle',
                'event_date' => '2022-02-25 20:30:00',
                'description' => "Cie La Mazurka du Sang Noir. Qu’est-ce qui se sépare en nous quand nous nous séparons ? Une dynamique physique et disloquée de la séparation.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "UNE SEMAINE AVEC PHILIPPE GOUDARD ET SANDY SUN",
                'category' => 'spectacle',
                'event_date' => '2022-03-07 19:00:00',
                'description' => "Trapèze-Existence-Ciel & Du côté de la vie. Cirque parlé et documentaire exceptionnel.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "HÉROÏNE[S]#2",
                'category' => 'spectacle',
                'event_date' => '2022-03-19 20:30:00',
                'description' => "Cie Les Passeurs. Une femme se cherche, ivre de désir d’amour et d’absence, et prend le temps de délacer les fils emmêlés de sa vie amoureuse.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "CABARET POÉTIQUE",
                'category' => 'spectacle',
                'event_date' => '2022-03-21 19:00:00',
                'description' => "Cie Incognito. ...avec Brassens, Eluard, Barbara, Grand Corps Malade ...ces poètes qui nous rassemblent. Il se pourrait même que ça chante !",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "QUI A TUÉ MON PÈRE",
                'category' => 'spectacle',
                'event_date' => '2022-04-04 19:00:00',
                'description' => "Edouard Louis. Sans point d’interrogation, comme une accusation. Le fils revient voir son père. Il découvre un corps malade, usé, soumis à la violence sociale.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "2 FEMMES, 1 FORD",
                'category' => 'spectacle',
                'event_date' => '2022-04-29 20:30:00',
                'description' => "Cie Acte II scène 2. Deux femmes, un Ford en route vers Kaboul en juin 1939 … de Suisse jusqu’en Afghanistan.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "PRIMO BASSO, UNE VIE D’ÉCRITURE",
                'category' => 'spectacle',
                'event_date' => '2022-05-02 19:00:00',
                'description' => "Extraits de nouvelles, romans, théâtre. Lorrain de Pont-à-Mousson, Italien de père, Irlandais de cœur et de théâtre...",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "CABARET TSIGANE",
                'category' => 'spectacle',
                'event_date' => '2022-05-13 20:30:00',
                'description' => "Ladislava. Ils revisitent les musiques traditionnelles d’Europe de l’Est, nous emportent vers les grands classiques du jazz manouche.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "LA PLUS PRÉCIEUSE DES MARCHANDISES",
                'category' => 'spectacle',
                'event_date' => '2022-05-23 19:00:00',
                'description' => "Jean Claude Grumberg. Il était une fois, dans un grand bois, une pauvre bûcheronne et un pauvre bûcheron...",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "PRÉSENTATION DU TRAVAIL DE L’ATELIER RÉALISATION",
                'category' => 'spectacle',
                'event_date' => '2022-06-10 20:30:00',
                'description' => "L’artiste se forge dans cet aller-retour perpétuel de lui aux autres... Présentation de l'atelier réalisation adultes.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "Ensembles, la musique et la Poésie",
                'category' => 'spectacle',
                'event_date' => '2026-05-26 20:30:00',
                'description' => "Jean Curt Keller et Isabelle. Mise en espace par Gilles Losseroy.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "Les Passeurs de masques",
                'category' => 'spectacle',
                'event_date' => '2026-06-06 20:30:00',
                'description' => "Hodofolia théâtre. Deux comédiens passionnés revisitent l’art du masque en proposant un spectacle interactif.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "Fête des voisins (lecture de «A tous ceux qui»)",
                'category' => 'spectacle',
                'event_date' => '2026-06-26 19:00:00',
                'description' => "Animations du P'tit marché. Fête des voisins avec lecture de 'A tous ceux qui'.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "La Tant qu'il y aura des Brebis",
                'category' => 'spectacle',
                'event_date' => '2026-09-26 17:00:00',
                'description' => "Spectacle La Tant qu'il y aura des Brebis.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "Le Goûter du S",
                'category' => 'spectacle',
                'event_date' => '2026-11-07 15:00:00',
                'description' => "Cie SAYN. Marc Goujot.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "39 / 45 l’âge de la déconstruction",
                'category' => 'spectacle',
                'event_date' => '2026-12-04 20:30:00',
                'description' => "Frédérick Sigrist. Entrescènes Aurore Marette. 2 représentations.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "Les Pieds Tanqués",
                'category' => 'spectacle',
                'event_date' => '2027-06-26 20:30:00',
                'description' => "Cie Incognito.",
                'status' => 'published',
                'user_id' => $userId,
            ],

            // RESIDENCES
            [
                'title' => "Par les morceaux de cette ville (Résidence)",
                'category' => 'residence',
                'event_date' => '2017-02-20 10:00:00',
                'description' => "Cie La Voyageuse. Deux semaines de résidence entre le 20 février et le 19 mai 2017.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "Projet Delphine",
                'category' => 'residence',
                'event_date' => '2026-04-22 10:00:00',
                'description' => "Accueil résidence projet Delphine (vacances Pâques).",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "Philippe Goudard et Sandy Sun",
                'category' => 'residence',
                'event_date' => '2026-06-07 10:00:00',
                'description' => "Résidence et présentation de Trapèze-Existence-Ciel / Cirque Documentaire Sandy Sun.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            
            // ATELIERS
            [
                'title' => "Atelier jeunes et adultes",
                'category' => 'formation',
                'event_date' => '2026-09-01 18:00:00', // Generic future date for display
                'description' => "Travail d’improvisation et d’interprétation à partir de textes classiques et contemporains, français et étrangers. C’est ouvert à tous ! Encadrés par des comédiens professionnels.",
                'status' => 'published',
                'user_id' => $userId,
            ],
            [
                'title' => "Préparation aux concours des écoles nationales",
                'category' => 'formation',
                'event_date' => '2026-09-01 10:00:00',
                'description' => "Préparation intensive pour les concours des grandes écoles de théâtre (TNS, Comédie de Saint-Etienne, etc.).",
                'status' => 'published',
                'user_id' => $userId,
            ],
        ];

        foreach ($events as &$event) {
            $event['capacity'] = 50;
            $event['location'] = 'Le Lieu (Reillon)';
            
            $year = (int) substr($event['event_date'], 0, 4);
            $month = (int) substr($event['event_date'], 5, 2);
            
            if ($year === 2026 && $month <= 7) {
                $event['period'] = '1er semestre 2026';
            } elseif ($year === 2026 && $month > 7) {
                $event['period'] = '2è semestre 2026';
            } elseif ($year === 2027) {
                $event['period'] = 'Année 2027';
            } else {
                $seasonYear = $month >= 8 ? $year : $year - 1;
                $event['period'] = 'Saison ' . $seasonYear . '/' . ($seasonYear + 1);
            }
            
            $event['event_time'] = substr($event['event_date'], 11, 8); // Extract time from datetime
        }

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
