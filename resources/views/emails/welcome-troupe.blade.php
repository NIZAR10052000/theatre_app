<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue Troupe - Ça Respire Encore</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #FDFDFC; color: #18181b;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #FDFDFC; padding: 40px 20px;">
        <tr>
            <td align="center">
                <!-- Main Card -->
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width: 600px; background-color: #ffffff; border-radius: 40px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.05); border: 1px solid #f1f1f1;">
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #C62828; padding: 60px 40px; text-align: center;">
                            <h1 style="color: #ffffff; font-size: 32px; margin: 0; font-family: 'Georgia', serif; font-style: italic;">Bienvenue, {{ $user->name }} !</h1>
                            <p style="color: #ffffff; opacity: 0.8; font-weight: bold; text-transform: uppercase; letter-spacing: 3px; font-size: 10px; margin-top: 10px;">Espace Troupe & Création</p>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 60px 50px;">
                            <h2 style="font-size: 24px; color: #18181b; margin-bottom: 20px;">Votre inscription est bien enregistrée.</h2>
                            <p style="font-size: 18px; line-height: 1.6; color: #3f3f46; margin-bottom: 30px;">
                                Pour garantir la qualité des contenus sur notre plateforme, chaque troupe est validée manuellement par notre équipe d'administration.
                            </p>
                            
                            <div style="background-color: #fafafa; padding: 30px; border-radius: 30px; margin-bottom: 40px; border: 1px dashed #e4e4e7;">
                                <p style="font-size: 15px; color: #71717a; margin: 0; line-height: 1.6;">
                                    <strong>Que faire en attendant ?</strong><br>
                                    Vous pouvez déjà parcourir le site et vous familiariser avec l'agenda. Dès que votre compte sera validé, vous recevrez un nouvel email et vous pourrez :
                                </p>
                                <ul style="font-size: 14px; color: #71717a; margin-top: 15px; padding-left: 20px;">
                                    <li>Publier vos prochains spectacles</li>
                                    <li>Partager vos tutoriels et formations</li>
                                    <li>Gérer vos médias (vidéos, photos, documents)</li>
                                </ul>
                            </div>

                            <!-- CTA Button -->
                            <table border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 50px;">
                                <tr>
                                    <td align="center" bgcolor="#18181b" style="border-radius: 20px;">
                                        <a href="{{ url('/') }}" target="_blank" style="font-size: 14px; font-weight: bold; color: #ffffff; text-decoration: none; padding: 20px 40px; display: inline-block; text-transform: uppercase; letter-spacing: 1px;">Visiter le site</a>
                                    </td>
                                </tr>
                            </table>

                            <p style="font-size: 14px; color: #a1a1aa; line-height: 1.6; font-style: italic;">
                                "Le théâtre est un lieu de vie et de partage."<br>
                                Nous avons hâte de découvrir vos créations.
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #fafafa; padding: 30px 50px; text-align: center;">
                            <p style="font-size: 12px; color: #a1a1aa; margin: 0;">
                                &copy; {{ date('Y') }} Théâtre Ça Respire Encore. <br>
                                Espace Modérateur - Administration.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
