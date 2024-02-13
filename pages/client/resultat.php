<?php
    
?>
<div class="body double-col">
        <section class="left">
            <h1 class="section__title">Historique des resultats</h1>

            <hr class="section__sep">

            <div class="section__content">
                <table id="table">
                    <tr>
                        <th class="id number">Poids total cueillette</th>
                        <th class="id number">Poids parcelles</th>
                        <th class="id number">Montant ventes</th>
                        <th class="id number">Montant depense</th>
                        <th class="id number">Benefice</th>
                        <th class="date">Cout de revient</th>
                    </tr>

                    <tr>
                        <td class="id number">100kg</td>
                        <td class="id number">50kg</td>
                        <td class="id number">30000</td>
                        <td class="id number">20000</td>
                        <td class="id number">10000</td>
                        <td class="id number">10000</td>
                    </tr>

                </table>
            </div>
        </section>

        <section class="right">
            <form action="../../handler/client/resultat_handler.php" method="post" id="login-form" class="form">
                <h1 class="form__title">Check Historique</h1>

                <hr class="form__sep">

                <div class="form__content" >
                    <div class="form__input horizontal" style="display: flex;">
                        <div class="form__input vertical">
                            <label for="date_debut" class="form__label">Date debut:</label>

                            <input type="date" name="date_debut" id="date_debut" class="form__input-field" />
                        </div>
                        <div class="form__input vertical">
                            <label for="date_fin" class="form__label">Date fin:</label>

                            <input type="date" name="date_fin" id="date_fin" class="form__input-field" />
                        </div>
                    </div>
                </div>

                <input type="submit" value="Check" class="form__submit btn" id="form__submit-btn" />
            </form>
        </section>
    </div>