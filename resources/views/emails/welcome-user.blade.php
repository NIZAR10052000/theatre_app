<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue chez Ça Respire Encore</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #FDFDFC; color: #18181b;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #FDFDFC; padding: 40px 20px;">
        <tr>
            <td align="center">
                <!-- Main Card -->
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width: 600px; background-color: #ffffff; border-radius: 40px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.05); border: 1px solid #f1f1f1;">
                    <!-- Header with Image -->
                    <tr>
                        <td style="background-color: #18181b; padding: 60px 40px; text-align: center; position: relative;">
                            <div style="margin-bottom: 20px;">
                                <img src="https://images.unsplash.com/photo-1503091315242-cb8bb2321c8d?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Theatre" style="width: 80px; height: 80px; border-radius: 20px; object-cover;">
                            </div>
                            <h1 style="color: #ffffff; font-size: 32px; margin: 0; font-family: 'Georgia', serif; font-style: italic;">Bienvenue, {{ $user->name }} !</h1>
                            <p style="color: #C62828; font-weight: bold; text-transform: uppercase; letter-spacing: 3px; font-size: 10px; margin-top: 10px;">Théâtre Ça Respire Encore</p>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 60px 50px;">
                            <p style="font-size: 18px; line-height: 1.6; color: #3f3f46; margin-bottom: 30px;">
                                Quel plaisir de vous compter parmi nos spectateurs ! Votre compte a été créé avec succès.
                            </p>
                            <p style="font-size: 16px; line-height: 1.6; color: #71717a; margin-bottom: 40px;">
                                Vous pouvez dès maintenant parcourir notre agenda, découvrir nos prochaines résidences et réserver vos places pour nos spectacles et ateliers.
                            </p>

                            <!-- CTA Button -->
                            <table border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 50px;">
                                <tr>
                                    <td align="center" bgcolor="#C62828" style="border-radius: 20px;">
                                        <a href="{{ url('/') }}" target="_blank" style="font-size: 14px; font-weight: bold; color: #ffffff; text-decoration: none; padding: 20px 40px; display: inline-block; text-transform: uppercase; letter-spacing: 1px;">Découvrir l'Agenda</a>
                                    </td>
                                </tr>
                            </table>

                            <div style="border-top: 1px solid #f1f1f1; pt: 40px;">
                                <p style="font-size: 14px; color: #a1a1aa; line-height: 1.6;">
                                    "Un théâtre où l'on sent le souffle des comédiens."<br>
                                    À très bientôt dans notre salle de Reillon.
                                </p>
                            </div>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #fafafa; padding: 30px 50px; text-align: center;">
                            <p style="font-size: 12px; color: #a1a1aa; margin: 0;">
                                &copy; {{ date('Y') }} Théâtre Ça Respire Encore. <br>
                                Reillon, Meurthe-et-Moselle.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
