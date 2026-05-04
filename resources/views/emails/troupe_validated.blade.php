<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre compte a été validé !</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f8f9fa; color: #333333;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f8f9fa; padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                    <!-- Header -->
                    <tr>
                        <td align="center" style="background-color: #e63946; padding: 40px 0;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 28px; font-weight: bold;">Le Pas Fleuri</h1>
                            <p style="color: rgba(255,255,255,0.8); margin: 5px 0 0 0; font-size: 16px;">Théâtre Ça Respire Encore</p>
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr>
                        <td style="padding: 40px;">
                            <h2 style="margin-top: 0; color: #1a1a1a; font-size: 24px;">Bonjour {{ $user->name }},</h2>
                            
                            <p style="font-size: 16px; line-height: 1.6; color: #4a5568;">
                                Excellente nouvelle ! Votre compte <strong>Troupe / Artiste</strong> vient d'être validé par la direction du théâtre.
                            </p>
                            
                            <div style="background-color: #f0fdf4; border-left: 4px solid #22c55e; padding: 20px; margin: 30px 0; border-radius: 0 8px 8px 0;">
                                <p style="margin: 0; color: #166534; font-size: 16px; font-weight: bold;">✅ Accès Complet Déverrouillé</p>
                                <p style="margin: 10px 0 0 0; color: #15803d; font-size: 15px;">Vous pouvez dès maintenant proposer vos spectacles et événements directement depuis votre tableau de bord.</p>
                            </div>

                            <p style="font-size: 16px; line-height: 1.6; color: #4a5568;">
                                Connectez-vous dès à présent pour soumettre votre premier spectacle à notre programmation :
                            </p>
                            
                            <!-- Button -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 35px 0;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ route('mockups.login') }}" style="display: inline-block; background-color: #e63946; color: #ffffff; text-decoration: none; padding: 15px 35px; border-radius: 30px; font-weight: bold; font-size: 16px; text-transform: uppercase; letter-spacing: 1px;">Accéder à mon espace</a>
                                    </td>
                                </tr>
                            </table>

                            <p style="font-size: 16px; line-height: 1.6; color: #4a5568;">
                                Nous avons hâte de découvrir vos propositions artistiques !
                            </p>
                            
                            <p style="font-size: 16px; line-height: 1.6; color: #4a5568; margin-top: 30px;">
                                Artistiquement vôtre,<br>
                                <strong>L'équipe du Théâtre Ça Respire Encore</strong>
                            </p>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td align="center" style="background-color: #f1f5f9; padding: 20px; border-top: 1px solid #e2e8f0;">
                            <p style="margin: 0; color: #64748b; font-size: 13px;">
                                © {{ date('Y') }} Théâtre Ça Respire Encore. Tous droits réservés.
                            </p>
                            <p style="margin: 5px 0 0 0; color: #64748b; font-size: 13px;">
                                Reillon, Grand Est
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
